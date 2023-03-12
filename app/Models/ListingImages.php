<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingImages extends Model
{
    public $timestamps = false;
    protected $table = 'prd_listing_images';
    protected $primaryKey = 'id';
    protected $fillable = ['f_listing_no', 'image_path', 'image','thumb_path', 'thumb', 'is_default'];


    public function getListingImages($id)
    {
        return ListingImages::where('f_listing_no', $id)->get();
    }


}
