<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class LeadPrice extends Model
{
    use RepoResponse;
    protected $table = 'ss_lead_price';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function getPaginatedList()
    {
        return LeadPrice::find(1);
    }

    public function postUpdate($request)
    {
        try{
            $lead_price                                      = LeadPrice::find(1);
            $lead_price->agent_prop_view_sales_price         = $request->apv_sale_price;
            $lead_price->agent_prop_view_rent_price          = $request->apv_rent_price;
            $lead_price->agent_prop_view_roommate_price      = $request->apv_roommate_price;
            $lead_price->agent_comm_sales_price              = $request->ac_sale_price;
            $lead_price->agent_comm_rent_price               = $request->ac_rent_price;
            $lead_price->agent_comm_roommate_price           = $request->ac_roommate_price;
            $lead_price->lead_view_sales_price               = $request->lv_sale_price;
            $lead_price->lead_view_rent_price                = $request->lv_rent_price;
            $lead_price->lead_view_roommate_price            = $request->lv_roommate_price;
            $lead_price->update();

            return $this->formatResponse(true, 'Price Updated Successfully', 'admin.listing_price.list');
        }catch (\Exception $e){
//            dd($e);
            return $this->formatResponse(false, 'Something Wrong', 'admin.listing_price.list');
        }
    }
}
