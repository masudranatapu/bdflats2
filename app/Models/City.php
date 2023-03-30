<?php

namespace App\Models;

use DB;
use Str;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use RepoResponse;

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


    public function getCities($limit = 2000): object
    {
        $cities = City::orderBy('order_id', 'desc')->paginate($limit);
        return $this->formatResponse(true, '', 'admin.city.list', $cities);
    }


    public function postStore($request): object
    {
        $this->status = false;
        $this->msg = 'City could not be added!';

        DB::beginTransaction();
        try {
            $city = new City();
            $city->city_name = $request->city_name;
            $city->url_slug = Str::slug($request->city_name);
            $city->order_id = $request->order;
            $city->lat = $request->latitude;
            $city->lon = $request->longitude;
            $city->is_populated = $request->populate;
            $city->is_active = $request->status;
            $city->save();

            $this->status = true;
            $this->msg = 'City added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.city.list');
    }

    public function postUpdate($request, int $id): object
    {
        $this->status = false;
        $this->msg = 'City could not be update!';

        DB::beginTransaction();
        try {
            $city = City::find($id);
            $city->city_name = $request->city_name;
            $city->url_slug = Str::slug($request->city_name);
            $city->order_id = $request->order;
            $city->lat = $request->latitude;
            $city->lon = $request->longitude;
            $city->is_populated = $request->populate;
            $city->is_active = $request->status;
            $city->save();

            $this->status = true;
            $this->msg = 'City updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.city.list');
    }


}
