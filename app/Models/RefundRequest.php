<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    protected $table 		= 'acc_customer_refund';
    protected $primaryKey   = 'id';
    public $timestamps      = false;


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::id();
        });
    }

    public function refundType(): string
    {
        $type = $this->getOriginal('refund_type');
        switch ($type) {
            case 1:
                $txt = 'Listing Lead Payment';
                break;
            case 2:
                $txt = 'LEAD PAYMENT';
                break;
            default:
                $txt = '';
        }
        return $txt;
    }

}
