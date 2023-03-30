<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingFeatures extends Model
{
    public $timestamps = false;
    protected $table = 'PRD_LISTING_FEATURES';
    protected $primaryKey = 'PK_NO';
    protected $fillable = ['TITLE', 'URL_SLUG', 'IS_ACTIVE', 'ORDER_ID'];

    public function getListingFeature()
    {
        return ListingFeatures::where('IS_ACTIVE', 1)->pluck('TITLE', 'PK_NO');
    }



}
