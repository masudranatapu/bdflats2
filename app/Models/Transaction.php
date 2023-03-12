<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    protected $table = 'acc_customer_transaction';

    protected $primaryKey   = 'id';
    const CREATED_AT        = 'ss_created_on';
    const UPDATED_AT        = 'ss_modified_on';
    protected $fillable     = ['code', 'customer_name'];

    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->f_ss_created_by = $user->id ?? $model->getsetApiAuthId();
       });

       static::updating(function($model)
       {
           $user = Auth::user();
           $model->f_ss_modified_by = $user->id ?? $model->getsetApiAuthId();
       });
   }

    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo('App\Models\PaymentCustomer', 'f_customer_payment_no', 'id');
    }

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo('App\Models\Owner', 'f_customer_no', 'id');
    }




}
