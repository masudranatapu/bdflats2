<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingAdditionalInfo extends Model
{
    public $timestamps = false;
    protected $table = 'prd_listing_additional_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'f_listing_no',
        'facing',
        'handover_date',
        'description',
        'f_feature_nos',
        'features',
        'f_nearby_nos',
        'nearby',
        'location_map',
        'video_code',
    ];


    public function getAdditionalInfo($id)
    {
        return ListingAdditionalInfo::where('f_listing_no', $id)->first();
    }

}
