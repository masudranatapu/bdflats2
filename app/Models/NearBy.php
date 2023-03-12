<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NearBy extends Model
{
    public $timestamps = false;
    protected $table = 'prd_nearby';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'url_slug', 'is_active', 'order_id'];


    public function getNearBy()
    {
        return NearBy::where('is_active', 1)->pluck('title', 'id');
    }

}
