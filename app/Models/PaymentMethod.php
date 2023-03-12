<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RepoResponse;
use DB;

class PaymentMethod extends Model
{
    use RepoResponse;

    protected $table = 'acc_payment_methods';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
