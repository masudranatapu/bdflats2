<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebAds extends Model
{
    protected $table = 'prd_ads';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\WebAdsImage', 'f_ads_no', 'id')
            ->inRandomOrder(time());
    }

    public function getRandomAd($position_id)
    {
        return WebAds::with(['images'])
            ->where('f_ad_position_no', '=', $position_id)
            ->where('status', '=', 1)
            ->whereDate('available_from', '<=', DB::raw('current_date()'))
            ->whereDate('available_to', '>=', DB::raw('current_date()'))
            ->inRandomOrder(time())
            ->first();
    }
}
