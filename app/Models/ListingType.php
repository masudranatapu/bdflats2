<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    protected $table = 'prd_listing_type';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function listingPrice()
    {
        return $this->hasOne('App\Models\ListingPrice', 'f_listing_type_no');
    }

    public function getPaginatedList()
    {
        return ListingType::get();
    }





}
