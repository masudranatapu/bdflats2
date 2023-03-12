<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingVariants extends Model
{
    protected $table = 'prd_listing_variants';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['f_listing_no', 'property_size', 'bedroom', 'bathroom','total_price'];

    public function getListingVariants($id)
    {
        return ListingVariants::where('f_listing_no', $id)->get();
    }

}
