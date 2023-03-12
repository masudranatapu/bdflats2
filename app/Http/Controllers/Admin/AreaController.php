<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\City;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;

class AreaController extends Controller
{
    protected $area;
    protected $city;
    protected $resp;

    public function __construct(Area $area, City $city)
    {
        $this->area = $area;
        $this->city = $city;
    }

    public function getIndex()
    {

        $data['areas'] = $this->area->getAreas()->data;
        return view('admin.area.index', compact('data'));
    }

    public function getCreate()
    {
        $data['cities'] = $this->city->getCities()->data->pluck('city_name', 'id');
        return view('admin.area.create', compact('data'));
    }

    public function postStore(AreaRequest $request): RedirectResponse
    {
        $this->resp = $this->area->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['area'] = $this->area->getArea($id)->data;
        $data['cities'] = $this->city->getCities()->data->pluck('city_name', 'id');
        return view('admin.area.edit', compact('data'));
    }

    public function postUpdate(AreaRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->area->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getArea(Request $request)
    {

        $status = false;
        $data = [];

        if ($request->city) {
            $city = $this->area->getCityAreas($request->city);
            if ($city && $city->areas) {
                $data = $city->areas->pluck('area_name', 'id');
                $status = true;
            }
        }

        if ($request->area) {
            $area = $this->area->getSubArea($request->area);
            if ($area) {
                $data = $area->pluck('area_name', 'id');
                $status = true;
            }
        }
        return Response::json([
            'status' => $status,
            'data' => $data
        ]);
    }
}
