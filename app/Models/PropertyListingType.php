<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyListingType extends Model
{
    protected $table        = 'prd_listing_type';
    protected $primaryKey   = 'id';
    protected $fillable     = ['name'];

    public function getPropertyListingType()
    {
        return $data = PropertyListingType::select('prd_listing_type.id','prd_listing_type.name','prd_listing_type.duration','ss_listing_price.sell_price','ss_listing_price.rent_price','ss_listing_price.roommat_price')->leftJoin('ss_listing_price', 'ss_listing_price.f_listing_type_no','prd_listing_type.id')->where('prd_listing_type.is_active', 1)->get();
    }
}
