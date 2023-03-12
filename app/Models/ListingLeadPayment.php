<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListingLeadPayment extends Model
{
    use RepoResponse;

    protected $table = 'acc_listing_lead_payments';
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'modified_at';

    public function leadPay($id): object
    {


        DB::beginTransaction();
        try {
            $listing = Listings::find($id);
            $browsed = DB::table('prd_browsing_history')->where('f_user_no', Auth::user()->id)->orderByDesc('last_browes_time')->first();

            if ($browsed) {
                $browsed->is_pay_attempt = 1;
                $browsed->save();
            }

            $payment = new ListingLeadPayment();
            $payment->f_listing_no  = $id;
            $payment->f_user_no     = Auth::id();
            $payment->amount        = $listing->CI_PRICE;
            $payment->purchase_date = date('Y-m-d H:i:s');
            $payment->created_by    = Auth::id();
            $payment->modified_by   = Auth::id();
            $payment->save();

            $check = DB::table('prd_suggested_property')->where('f_listing_no',$id)->where('f_user_no',Auth::id())->first();
            if($check){
                DB::table('prd_suggested_property')->where('f_listing_no',$id)->where('f_user_no',Auth::id())->update(['status' => 1]);
            }else{
                DB::table('prd_suggested_property')->insert([
                        'f_listing_no'  => $id,
                        'f_company_no'  => $listing->f_user_no,
                        'f_user_no'     => Auth::id(),
                        'created_at'    => date('Y-m-d H:i:s'),
                        'created_by'    => Auth::id(),
                        'property_for'  => $listing->property_for,
                        'property_type' => $listing->property_type,
                        'area'          => $listing->f_area_no,
                        'size'          => '',
                        'bedroom'       => '',
                        'bathroom'      => '',
                        'total_price'   => '',
                        'property_condition' => '',
                        'status'        => 1,
                        'order_id'      => 1
                ]);
            }

            $check_sugg = SuggestedProperty::where('f_listing_no',$id)->where('f_user_no', Auth::id())->first();
            if($check_sugg){
                SuggestedProperty::where('f_listing_no',$id)->where('f_user_no',Auth::id())->update(['status' => 1]);
            }

            // Remove attempt if paid
            if ($browsed) {
                $browsed->is_pay_attempt = 0;
                $browsed->save();
            }
        }catch (\Exception $e){
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Payment not successful !', 'home');
        }
        DB::commit();
        return $this->formatResponse(true, 'Payment successful !', 'home');

    }

    public function listing() {
        return $this->belongsTo('App\Models\Listings', 'f_listing_no');
      }

    public function getContactedProperties($request){
        $user_id = Auth::id();
        $data = ListingLeadPayment::select('acc_listing_lead_payments.id','acc_listing_lead_payments.f_listing_no','acc_listing_lead_payments.amount as paid_amount','acc_listing_lead_payments.purchase_date', 'acc_listing_lead_payments.create_at', 'acc_listing_lead_payments.is_claim')->where('acc_listing_lead_payments.f_user_no', $user_id)->paginate(20);
        return $data;

    }

}
