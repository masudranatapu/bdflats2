<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CustomerTxn extends Model
{
    protected $table = 'acc_customer_transaction';
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

    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\CustomerPayment', 'f_customer_payment_no', 'id');
    }

    public function getTxnHistory($userID = null)
    {
        if (!$userID) {
            $userID = Auth::id();
        }

        return CustomerTxn::with(['payment'])
            ->where('f_customer_no', '=', $userID)
            ->paginate(10);


    }
}
