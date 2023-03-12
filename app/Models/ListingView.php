<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingView extends Model
{
    protected $table = 'prd_listing_view';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['date', 'counter'];
}
