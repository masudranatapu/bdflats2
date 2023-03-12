<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class LeadShare extends Model
{
    public $timestamps      = false;
    protected $table        = 'prd_lead_share_map';
    protected $primaryKey   = 'id';
    protected $fillable     = ['name', 'f_requirement_no'];

    public function getRequirements()
    {
        return $this->belongsTo('App\Models\ProductRequirements', 'f_requirement_no', 'id')->where('is_active', 1);
    }

    public function getSuggestedLead($request){
        $user_id = Auth::id();
        return LeadShare::with(['getRequirements'])
            ->where('f_company_no', $user_id)
            ->where('status', 0)
            ->orderBy('order_id')
            ->paginate(10);
    }

    public function getLeads($request){
        $user_id = Auth::id();
        return LeadShare::with(['getRequirements'])
            ->where('f_company_no', $user_id)
            ->where('status', 1)
            ->paginate(10);
    }

    public function getLeadDetails($id){
        return LeadShare::with(['getRequirements'])
            ->where('id',$id)
            ->where('f_company_no',Auth::id())
            ->first();
    }

    public function getdeveloperLeads(){
        return LeadShare::with(['getRequirements'])
            ->where('status',1)
            ->where('f_company_no',Auth::id())
            ->orderBy('order_id')
            ->paginate(10);
    }





}
