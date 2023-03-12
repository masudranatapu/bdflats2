<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RechargeRequest extends Model
{
    use RepoResponse;
    protected $table        = 'acc_recharge_request';
    protected $primaryKey   = 'id';
    public $timestamps      = false;

    public function getPaymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod',  'id','f_acc_payment_method_no');
    }



    public function postRechargeRequest($request)
    {
        DB::beginTransaction();
        try {
            $list = new RechargeRequest();
            $list->f_customer_no            = Auth::id();
            $list->amount                   = $request->amount;
            $list->f_acc_payment_method_no  = $request->payment_method;
            if($request->payment_method == 2){
                $list->f_payment_bank_acc       = $request->bkash_no;
            }elseif($request->payment_method == 3){
                $list->f_payment_bank_acc       = $request->rocket_no;
            }
            $list->payment_note             = $request->note;
            $list->slip_number              = $request->txn_id;
            $list->status                   = 0;
            $list->payment_date             = Carbon::parse($request->recharge_date)->format('Y-m-d H:i:s');
            $list->f_ss_created_by          = Auth::id();
            $list->ss_created_on            = Carbon::now();
            $list->f_ss_modified_by         = Auth::id();
            $list->ss_created_on            = Carbon::now();

            if($request->hasfile('image')){
                if (\File::exists(public_path($list->attachment_path))) {
                    \File::delete(public_path($list->attachment_path));
                }
                $image = $request->file('image');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = '/uploads/recharge_request/' . Auth::user()->id . '/' . $name;
                $image->move(public_path('/uploads/recharge_request/' . Auth::user()->id), $name);
                $list->attachment_path = $path;
            }

            $list->save();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Recharge Request is not Submitted !', 'recharge-request');
        }
        DB::commit();
        return $this->formatResponse(true, 'Recharge Request Submitted Successfully !', 'payment-history');
    }


    public function getRechargeReq($userID)
    {
        return RechargeRequest::where('f_customer_no', '=', $userID)
            ->whereIn('status',[0,2])
            ->get();
    }
}
