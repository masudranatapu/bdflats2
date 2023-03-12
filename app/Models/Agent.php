<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use RepoResponse;
    protected $table = 'users';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

      protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function info(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\OwnerInfo', 'f_user_no', 'id');
    }

    public function getAgentCombo()
    {
        return Agent::where('is_active', 1)->pluck('name', 'id');
    }

    public function getAgentComboCustomer(Type $var = null)
    {
        $response = '';
        $data = Agent::select('name', 'id')->where('is_active', 1)->get();

        if ($data) {
            foreach ($data as $value) {
                $response .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        } else {
            $response .= '<option value="">No data found</option>';
        }
        return $response;
    }


    public function getPaginatedList($request, int $per_page = 5): object
    {
        $data = $this->agent->orderBy('name', 'ASC')->get();
        return $this->formatResponse(true, '', 'admin.agent.index', $data);
    }

    public function getAgent(int $id): object
    {
        $agent = Agent::with(['info'])->find($id);
        return $this->formatResponse(true, '', '', $agent);
    }

    public function postStore($request): object
    {
        DB::beginTransaction();
        try {
            $agent = new Agent();
            $agent->name = $request->name;
            $agent->mobile_no = $request->phone;
            $agent->email = $request->email;
            $agent->status = $request->status;
            $agent->is_feature = $request->is_feature;
            $agent->password = Hash::make($request->pass);

            if ($request->hasFile('images')) {
                $image = $request->file('images')[0];
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = 'uploads/agents/';
                $image->move(public_path($image_path), $image_name);
                $agent->profile_pic = $image_name;
                $agent->profile_pic_url = $image_path . $image_name;
            }

            $agent->save();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, $e->getMessage(), 'admin.agents.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Agent has been created successfully !', 'admin.agents.index');
    }

    public function postUpdate($request, $id): object
    {
        DB::beginTransaction();
        try {
            $agent = Agent::find($id);
            $agent->user_type = 5;
            $agent->name = $request->name;
            $agent->mobile_no = $request->phone;
            $agent->email = $request->email;
            $agent->status = $request->status;
            $agent->is_feature = $request->is_feature;

            if ($request->hasFile('images')) {
                $image = $request->file('images')[0];
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = 'uploads/agents/';
                $image->move(public_path($image_path), $image_name);
                $agent->profile_pic = $image_name;
                $agent->profile_pic_url = $image_path . $image_name;
            }

            if (isset($request->pass)) {
                $agent->password = Hash::make($request->pass);
            }
            $agent->save();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, $e->getMessage(), 'admin.agents.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Agent Information has been updated successfully', 'admin.agents.index');
    }



    // public function getDelete($id)
    // {
    //     $agent = Agent::where('id', $id)->first();
    //     $agent->is_active = 0;
    //     if ($agent->update()) {
    //         return $this->formatResponse(true, 'Successfully deleted Agent Information', 'admin.agent.list');
    //     }
    //     return $this->formatResponse(false, 'Unable to delete Agent Information', 'admin.agent.list');
    // }


}
