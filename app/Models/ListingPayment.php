<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ListingPayment extends Model
{
    protected $table = 'acc_listing_payments';
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'modified_at';
    protected $fillable = ['f_listing_no', 'f_user_no', 'amount'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::id();
        });
    }
}
