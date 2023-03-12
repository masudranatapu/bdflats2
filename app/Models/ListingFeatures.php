<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingFeatures extends Model
{
    public $timestamps = false;
    protected $table = 'prd_listing_features';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'url_slug', 'is_active', 'order_id'];

    public function getListingFeature()
    {
        return ListingFeatures::where('is_active', 1)->pluck('title', 'id');
    }

}
