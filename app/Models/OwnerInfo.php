<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerInfo extends Model
{
    protected $table = 'users_info';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
