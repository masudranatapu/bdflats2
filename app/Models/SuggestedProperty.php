<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class SuggestedProperty extends Model
{
    protected $table = 'prd_suggested_property';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modifyed_at';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->modifyed_by = Auth::id();
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo('App\Models\Owner', 'f_company_no', 'id');
    }

    public function seeker(): BelongsTo
    {
        return $this->belongsTo('App\Models\Owner', 'f_user_no', 'id')
            ->where('USER_TYPE', '=', 1);
    }

    public function listing(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Listings', 'id', 'F_LISTING_NO');
    }

    public function getProperties($request)
    {

        $userID = Auth::id();

        return SuggestedProperty::select('prd_listings.id', 'prd_listings.url_slug','prd_listings.title', 'prd_listings.is_verified','prd_listings.is_top','prd_listings.ci_price','prd_listings.area_name','prd_listings.city_name','prd_listing_images.thumb_path','prd_listing_variants.property_size','prd_listing_variants.bedroom','prd_listing_variants.total_price','prd_listing_variants.bathroom')
        ->leftJoin('prd_listings', 'prd_listings.id', 'prd_suggested_property.f_listing_no')
        ->leftJoin('prd_listing_images', function($join)
         {
             $join->on('PRD_LISTINGS.id', '=', 'prd_listing_images.f_listing_no');
             $join->on('prd_listing_images.is_default','=',DB::raw("'1'"));

         })
         ->leftJoin('prd_listing_variants', function($join)
         {
             $join->on('prd_listings.id', '=', 'prd_listing_variants.f_listing_no');
             $join->on('prd_listing_variants.IS_DEFAULT','=',DB::raw("'1'"));

         })

        ->where('prd_suggested_property.status', '=', 0)
        ->where('prd_suggested_property.f_user_no', '=', $userID)
        ->orderByDesc('order_id')
        ->paginate(10);
    }
}
