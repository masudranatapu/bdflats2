<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerPayment extends Model
{
    use RepoResponse;

    protected $table = 'acc_customer_payments';
    protected $primaryKey = 'id';
    const CREATED_AT = 'ss_created_on';
    const UPDATED_AT = 'ss_modified_on';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->f_ss_created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->f_ss_modified_by = Auth::id();
        });
    }

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User', 'f_customer_no', 'id');
    }

    public function getPayments($userId)
    {
        return CustomerPayment::with('customer')
            ->where('f_customer_no', '=', $userId)
            ->get();
    }

    public function getPayment($id)
    {
        return CustomerPayment::with('customer')
            ->find($id);
    }

    public function storePayment(Request $request): object
    {
        $status = false;
        $msg = 'Payment unsuccessful !';
        $payment = null;

        DB::beginTransaction();
        try {
            $payment = new CustomerPayment();
            $payment->f_customer_no = Auth::id();
            $payment->amount = $request->amount;
            $payment->f_acc_payment_bank_no = 1; // SSL id
            $payment->payment_confirmed_status = 1; // NOT CONFIRMED
            $payment->payment_note = $request->card_type;
            $payment->slip_number = $request->tran_id;
            $payment->payment_date = date('Y-m-d H:i:s');
            $payment->is_cod = 0;
            $payment->save();

            $status = true;
            $msg = 'Payment successful !';
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'recharge-balance', $payment);
    }
}
