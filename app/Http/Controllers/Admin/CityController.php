<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Repositories\Admin\City\CityInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $city;
    protected $resp;

    public function __construct(CityInterface $city)
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
        $data['city'] = $this->city->getCity($id)->data;
        return view('admin.city.edit', compact('data'));
    }

    public function postUpdate(CityRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->city->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
