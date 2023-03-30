<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{
    protected $city;
    protected $resp;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function getIndex()
    {
        $data['cities'] = $this->city->getCities()->data;
        return view('admin.city.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.city.create');
    }

    public function postStore(CityRequest $request): RedirectResponse
    {
        $this->resp = $this->city->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $row = City::find($id);

        return view('admin.city.edit', compact('row'));
    }

    public function postUpdate(CityRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->city->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
