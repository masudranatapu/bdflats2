<?php

namespace App\Models;

use DB;
use Str;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table        = 'ss_area';
    protected $primaryKey   = 'id';
    protected $fillable     = ['area_name'];

    use RepoResponse;

    protected $status;
    protected $msg;

    public function getArea($id)
    {
        return Area::where('f_city_no', $id)->whereNull('f_parent_area_no')->pluck('area_name', 'id');
    }



    public function getAreas($limit = 2000): object
    {
        $areas = [];
        $area = Area::orderBy('order_id', 'desc')->where('is_parent',1)->get();

        if($area){
            $i = 0;
            foreach ($area as $value) {
                $areas[$i]['id'] = $value->id;
                $areas[$i]['order_id'] = $value->order_id;
                $areas[$i]['area_name'] = $value->area_name;
                $areas[$i]['city_name'] = $value->city_name;
                $areas[$i]['lat'] = $value->LAT;
                $areas[$i]['lon'] = $value->LON;
                $areas[$i]['sub_area_name'] = null;
                $sub_area = Area::orderBy('order_id', 'desc')->where('is_parent',0)->where('f_parent_area_no',$value->id)->get();
                if($sub_area && count($sub_area) > 0 ){
                    foreach ($sub_area as $value1) {
                        $i++;
                        $areas[$i]['id'] = $value1->id;
                        $areas[$i]['order_id'] = $value1->order_id;
                        $areas[$i]['area_name'] = null;
                        $areas[$i]['city_name'] = $value1->city_name;
                        $areas[$i]['lat'] = $value1->LAT;
                        $areas[$i]['lon'] = $value1->LON;
                        $areas[$i]['sub_area_name'] = $value1->area_name;

                    }
                }

                $i++;
             }
        }


        return $this->formatResponse(true, '', 'admin.area.list', $areas);
    }



    public function postStore($request): object
    {
        $this->status = false;
        $this->msg = 'Area could not be added!';

        DB::beginTransaction();
        try {
            $city = new Area();
            $city->area_name = $request->area_name;
            $city->url_slug = Str::slug($request->area_name);
            $city->f_parent_area_no = $request->parent_area > 0 ? $request->parent_area : null;
            $city->is_parent = $request->parent_area == 0;
            $city->order_id = $request->order;
            $city->f_city_no = $request->city;
            $city->lat = $request->latitude;
            $city->lon = $request->longitude;
            $city->save();

            $this->status = true;
            $this->msg = 'Area added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.area.list');
    }

    public function postUpdate($request, int $id): object
    {
        $this->status = false;
        $this->msg = 'Area could not be updated!';

        DB::beginTransaction();
        try {
            $city = Area::find($id);
            $city->area_name = $request->area_name;
            $city->url_slug = Str::slug($request->area_name);
            $city->f_parent_area_no = $request->parent_area > 0 ? $request->parent_area : null;
            $city->is_parent = $request->parent_area == 0;
            $city->order_id = $request->order;
            $city->f_city_no = $request->city;
            $city->lat = $request->latitude;
            $city->lon = $request->longitude;
            $city->save();

            $this->status = true;
            $this->msg = 'Area added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.area.list');
    }

    public function getCityAreas(int $id)
    {
        return City::with(['areas'])->find($id);
    }

    public function getSubArea(int $id)
    {
        return Area::where('f_parent_area_no', $id)->get();
    }




}
