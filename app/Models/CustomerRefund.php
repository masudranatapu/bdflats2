<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class CustomerRefund extends Model
{
    use RepoResponse;

    protected $table        = 'acc_customer_refund';
    protected $primaryKey   = 'id';
    public $timestamps = false;
    protected $fillable     = ['f_user_no','f_request_reason_no','request_reason'];

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $row = ListingLeadPayment::where('id',$request->id)->where('is_claim',0)->where('f_user_no',Auth::id())->first();
            if($row){
                $reson = DB::table('refund_request_reason')->where('id',$request->refund_reason)->first();
                $list                                   = new CustomerRefund();
                $list->f_user_no                        = Auth::id();
                $list->f_request_reason_no              = $request->refund_reason;
                $list->request_reason                   = $reson->title;
                $list->request_at                       = Carbon::now();
                $list->request_amount                   = $row->AMOUNT;
                $list->comment                          = $request->comment;
                $list->f_listing_lead_payment_no	    = $row->id;
                $list->f_listing_no	                    = $row->f_listing_no;
                $list->status                           = 1;
                $list->refund_type                      = 1;
                $list->created_at                       = Carbon::now();
                $list->save();

                ListingLeadPayment::where('id',$request->id)->update(['is_claim' => 1]);
            }


        }catch (\Exception $e){
            DB::rollback();
            return $this->formatResponse(false, 'Your Claiming is not submitted successfully !', 'contacted-properties');
        }

        DB::commit();
        return $this->formatResponse(true, 'Your Claiming is submitted successfully !', 'contacted-properties');
    }
}
