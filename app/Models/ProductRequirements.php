<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRequirements extends Model
{
    use RepoResponse;

    protected $table = 'prd_requirements';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'f_city_no',
        'f_areas',
        'city_name',
        'area_names',
        'property_for',
        'f_property_type_no',
        'property_type',
        'min_size',
        'max_size',
        'min_budget',
        'max_budget',
        'bedroom',
        'property_condition',
        'requirement_details',
        'prep_cont_time',
        'email_alert',
        'created_at',
        'created_by',
        'modifyed_at',
        'modifyed_by',
        'is_verified',
        'is_active',
        'f_verified_by',
        'verified_at',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\Models\Owner', 'f_user_no', 'id')->where('status', 1);
    }

    public function storeOrUpdate($request): object
    {
        DB::beginTransaction();
        try {
            if (!$request->auth_id) {
                assert(Auth::user()->user_type == 1);
            }

            $update = true;
            $list = ProductRequirements::where('f_user_no', Auth::id())
                ->where('is_active', 1)
                ->first();

            $rc = $request->condition;

            $cond = [];
            $condF = [];
            foreach ($rc as $item) {
                $item = explode(',', $item);
//                $condF[] = intval($item[0]);
                $condF[] = "$item[0]";

                $cond[] = $item[1];
            }

            if ($list) {
                if ($list->F_CITY_NO != $request->city) {
                    $update = false;
                }

                $areas = json_decode($list->f_areas);
                $ra = $request->area;
                if ($update && !$this->isEqual($areas, $ra)) {
                    $update = false;
                }

                if ($update && $request->itemCon != $list->property_for) {
                    $update = false;
                }

                if ($update && ($request->minimum_size != $list->min_size || $request->maximum_size != $list->max_size)) {
                    $update = false;
                }

                if ($update && ($request->minimum_budget != $list->min_budget || $request->maximum_budget != $list->max_budget)) {
                    $update = false;
                }

                $bedrooms = json_decode($list->bedroom);
                $rr = $request->rooms;
                if ($update && !$this->isEqual($bedrooms, $rr)) {
                    $update = false;
                }

                $conditions = json_decode($list->f_property_condition);
                if (!$conditions) $conditions = [];
                if ($update && !$this->isEqual($conditions, $cond)) {
                    $update = false;
                }
            } else {
                $update = false;
            }

            if (!$update) {
                $list = new ProductRequirements();
                $is_verified = 3;
            }
            $list->f_user_no                = Auth::id() ?? $request->auth_id;
            $list->property_for             = $request->itemCon;
            $list->f_city_no                = $request->city;
            $list->f_areas                  = json_encode($request->area);
            $list->f_property_type_no       = $request->property_type;
            $list->min_size                 = $request->minimum_size;
            $list->max_size                 = $request->maximum_size;
            $list->min_budget               = $request->minimum_budget;
            $list->max_budget               = $request->maximum_budget;
            $list->bedroom                  = json_encode($request->rooms);
            $list->property_condition       = json_encode($cond);
            $list->f_property_condition     = json_encode($condF);
            $list->requirement_details      = $request->requirement_details;
            $list->prep_cont_time           = $request->time;
            $list->email_alert              = $request->alert;
            $list->created_by               = Auth::id() ?? $request->auth_id;
            $list->modified_by              = Auth::id() ?? $request->auth_id;
            $list->is_verified              = $is_verified ?? 0;
            $list->is_active = 1;
            $list->save();

            DB::table('prd_requirements')
                ->where('f_user_no', '=', $list->f_user_no)
                ->where('id', '!=', $list->id)
                ->update(['is_active' => 0]);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Property Requirements not added successfully !', 'property-requirements');
        }

        DB::commit();
        return $this->formatResponse(true, 'Property Requirements added successfully !', 'property-requirements');
    }

    private function isEqual(array $a, array $b): bool
    {
        if (count($a) == count($b)) {
            sort($a);
            sort($b);

            foreach ($a as $key => $v) {
                if ($b[$key] != $v) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}

