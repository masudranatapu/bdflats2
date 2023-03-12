<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    protected $table 		= 'refund_request_reason';
    protected $primaryKey   = 'id';
    public $timestamps      = false;
}
