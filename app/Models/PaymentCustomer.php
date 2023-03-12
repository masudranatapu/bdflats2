<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class PaymentCustomer extends Model
{
    use RepoResponse;
    protected $table = 'acc_customer_payments';

    protected $primaryKey = 'id';
    const CREATED_AT = 'ss_created_on';
    const UPDATED_AT = 'ss_modified_on';
    protected $fillable = ['code', 'customer_name'];

    private $user_id;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->f_ss_created_by = $user->id ?? $model->getsetApiAuthId();
        });

        static::updating(function ($model) {
            $user = Auth::user();
            $model->f_ss_modified_by = $user->id ?? $model->getsetApiAuthId();
        });
    }

    public function setApiAuthId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getsetApiAuthId()
    {
        return $this->user_id;
    }

    public function entryBy()
    {
        return $this->belongsTo('App\Models\Auth', 'f_ss_created_by');
    }


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'f_customer_no');
    }

    public function bankTxn()
    {
        return $this->hasOne('App\Models\AccBankTxn', 'f_customer_payment_no', 'id');
    }

    public function allOrderPayments()
    {
        return $this->hasMany('App\Models\OrderPayment', 'f_acc_customer_payment_no', 'id');
    }

    public function getRefundRequest($request)
    {
        return DB::table('acc_customer_refund')
            ->select('acc_customer_refund.*', 'users.code as user_code', 'users.name as user_name', 'users.mobile_no as user_mobile_no', 'acc_customer_transaction.code as tid')
            ->leftJoin('users', 'users.id', 'acc_customer_refund.f_user_no')
            ->leftJoin('acc_customer_transaction', 'acc_customer_transaction.f_listing_lead_payment_no', 'acc_customer_refund.f_listing_lead_payment_no')
            ->paginate(10);
    }

    public function getRefund($id)
    {
        return RefundRequest::query()
            ->select('acc_customer_refund.*', 'l.title', 'l.code as property_id', 'u.name as owner_name', 'llp.purchase_date')
            ->leftJoin('acc_listing_lead_payments as llp', 'llp.id', '=', 'acc_customer_refund.f_listing_lead_payment_no')
            ->leftJoin('prd_listings as l', 'l.id', '=', 'llp.f_listing_no')
            ->leftJoin('users as u', 'u.id', '=', 'l.f_user_no')
            ->find($id);
    }

    public function updateRefund(Request $request, $id): object
    {
        DB::beginTransaction();
        try {
            $refund = $this->getRefund($id);
            if ($refund->status == 2) {
                throw new \Exception('Can not change');
            }

            $refund->status = $request->status;
            $refund->admin_note = $request->note;

            if ($request->status == 2) {
                $refund->approved_at = date('Y-m-d H:i:s');
                $refund->approved_by = Auth::id();
            }
            $refund->save();
            DB::table('acc_listing_lead_payments')->where('id', $refund->f_listing_lead_payment_no)->delete();

        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return $this->formatResponse(true, 'Refund request updated', 'admin.refund_request');
    }

    public function getTransactions($date_from = null, $date_to = null, $type = 'all')
    {
        $data = DB::table('acc_customer_transaction')
            ->select('acc_customer_transaction.code', 'users.code as customer_no', 'acc_customer_transaction.transaction_date', 'acc_customer_transaction.transaction_type', 'acc_customer_transaction.amount', 'acc_customer_transaction.in_out')
            ->leftJoin('users', 'users.id', 'acc_customer_transaction.f_customer_no');

        // $transactions = PaymentCustomer::with(['customer' => function ($query) {
        //     $query->select('CODE');
        // }])->take($limit);
        // if ($date_from) {
        //     $transactions->whereDate('PAYMENT_DATE', '>=', date('Y-m-d', strtotime($date_from)));
        // }
        // if ($date_to) {
        //     $transactions->whereDate('PAYMENT_DATE', '<=', date('Y-m-d', strtotime($date_to)));
        // }

        return $data->orderBy('acc_customer_transaction.id', 'desc')->get();
    }

    public function getRechargeRequests($request){
        $data =  DB::table('acc_recharge_request')->get();
        return $data;
    }

    public function getRechargeRequest($id)
    {
        return RechargeRequest::query()
            ->select('acc_recharge_request.*', 'c.name as c_name', 'c.code as c_code', 'c.mobile_no as c_mobile_no', 'c.user_type')
            ->leftJoin('users AS C', 'C.id', '=', 'ACC_RECHARGE_REQUEST.F_CUSTOMER_NO')
            ->where('ACC_RECHARGE_REQUEST.id', '=', $id)
            ->first();
    }

    public function updateRechargeRequest($request, $id)
    {

        DB::beginTransaction();
        try {
            $recharge = RechargeRequest::find($id);
            if ($recharge->status == 1) {
                throw new \Exception('Can not change');
            }

            $recharge->status = $request->status;
            $recharge->update();

            if($request->status == 1){

                DB::table('acc_customer_payments')->insert(['f_customer_no' => $recharge->f_customer_no , 'amount' => $recharge->amount, 'f_acc_payment_bank_no' => $recharge->f_payment_bank_acc, 'payment_note' => $recharge->payment_note, 'slip_number' => $recharge->slip_number, 'payment_date' => $recharge->payment_date, 'is_active' => 1, 'f_ss_created_by' => Auth::id(),'ss_created_on' => date('Y-m-d H:i:s'), 'payment_type' => 1 ]);

            }

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse(true, 'Refund request updated', 'admin.recharge_request');
    }


}
