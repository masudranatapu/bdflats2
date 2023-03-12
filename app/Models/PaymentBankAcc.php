<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PaymentBankAcc extends Model
{
    protected $table = 'ACC_PAYMENT_BANK_ACC';

    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'SS_CREATED_ON';
    const UPDATED_AT = 'SS_MODIFIED_ON';
    protected $fillable = ['CODE', 'BANK_NAME'];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->F_SS_CREATED_BY = Auth::id();
        });

        static::updating(function ($model) {
            $model->F_SS_MODIFIED_BY = Auth::id();
        });
    }


    public function entryBy()
    {
        return $this->belongsTo('App\Models\Auth', 'F_SS_CREATED_BY');
    }

    public function method()
    {
        return $this->belongsTo('App\Models\AccountMethod', 'F_PAYMENT_METHOD_NO');
    }

    public static function getAllPaymentBanks()
    {
        $data = PaymentBankAcc::select('PK_NO', 'BANK_NAME', 'BANK_ACC_NAME')
            ->where('IS_ACTIVE', 1)
            // ->where('F_USER_NO','!=',Auth::user()->PK_NO)
            ->get();
        $array = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $array[$value->PK_NO] = $value->BANK_ACC_NAME . ' (' . $value->BANK_NAME . ')';
            }
        }
        return $array;
    }

    public static function getFilterPaymentBanks()
    {
        $data = PaymentBankAcc::select('PK_NO', 'BANK_NAME', 'BANK_ACC_NAME');
        if (Auth::user()->F_PARENT_USER_ID > 0) {
            $data = $data->where('F_USER_NO', Auth::user()->F_PARENT_USER_ID);
        }
        $data = $data->get();

        $array = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $array[$value->PK_NO] = $value->BANK_ACC_NAME . ' (' . $value->BANK_NAME . ')';
            }
        }
        return $array;
    }
}
