<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use DB;
use Str;

class PropertyCondition extends Model
{
    protected $table        = 'prd_property_condition';
    protected $primaryKey   = 'id';
    protected $fillable     = ['prod_condition'];

    use RepoResponse;

    public function getConditions()
    {
        return PropertyCondition::where('is_active', 1)
            ->orderByDesc('order_id')
            ->get();
    }


    public function getPropertyConditionArr()
    {
        return PropertyCondition::where('is_active', 1)->pluck('prod_condition', 'id');
    }

    public function getPropertyConditions($limit = 2000)
    {
        $conditions = PropertyCondition::orderBy('order_id', 'desc')->paginate($limit);
        return $this->formatResponse(true, '', 'admin.propertycondition.list', $conditions);
    }

    public function getPropertyCondition(int $id)
    {
        $conditions = PropertyCondition::find($id);
        return $this->formatResponse(true, '', 'admin.propertycondition.list', $conditions);
    }

    public function postStore($request)
    {
        $this->status = false;
        $this->msg = 'Property condition could not be added!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->property_condition);
            $check = PropertyCondition::where('url_slug', $slug)->orderByDesc('id')->first();

            if ($check) {
                $slug = $slug . ('-' . ($check->id + 1));
            }

            $condition = new PropertyCondition();
            $condition->prod_condition = $request->property_condition;
            $condition->url_slug = $slug;
            $condition->is_active = $request->status;
            $condition->order_id = $request->order_id;
            $condition->save();

            $this->status = true;
            $this->msg = 'Property condition added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertycondition.list');
    }

    public function postUpdate($request, int $id)
    {
        $this->status = false;
        $this->msg = 'Property condition could not be updated!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->property_condition);
            $check = PropertyCondition::where('url_slug', $slug)->where('id','!=',$id)->orderByDesc('id')->first();

            if ($check) {
                $slug = $slug . ('-' . ($check->id + 1));
            }

            $condition = PropertyCondition::find($id);
            $condition->prod_condition = $request->property_condition;
            $condition->url_slug = $slug;
            $condition->is_active = $request->status;
            $condition->order_id = $request->order_id;
            $condition->save();

            $this->status = true;
            $this->msg = 'Property condition updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertycondition.list');
    }

    public function getDelete(int $id)
    {
        // TODO: Implement getDelete() method.
    }

}
