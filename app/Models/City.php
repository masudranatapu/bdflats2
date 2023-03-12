<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'ss_city';
    protected $primaryKey = 'id';
    protected $fillable = ['city_name'];
    public $timestamps = false;

    public function getPopularCities()
    {
        return City::where('is_active', 1)
            ->where('is_populated', 1)
            ->get(['id', 'url_slug', 'city_name', 'total_listing']);
    }

    public function getCity()
    {
        return City::pluck('city_name', 'id');
    }

    public function areas()
    {
        return $this->hasMany('App\Models\Area', 'f_city_no', 'id');
    }

}
