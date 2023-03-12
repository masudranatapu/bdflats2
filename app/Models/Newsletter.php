<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'web_newsletter';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
