<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFloorRequest;
use App\Repositories\Admin\PropertyFeatures\PropertyFeaturesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PropertyFloorController extends Controller
{
    protected $features;
    protected $resp;

    public function __construct(PropertyFeaturesInterface $features)
    {
        $this->features = $features;
    }

    public function getIndex()
    {
        $data['floors'] = $this->features->getFloors()->data;
        return view('admin.property-floor.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.property-floor.create');
    }

    public function postStore(PropertyFloorRequest $request): RedirectResponse
    {
        $this->resp = $this->features->storeFloor($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['floor'] = $this->features->getFloor($id)->data;
        return view('admin.property-floor.edit', compact('data'));
    }

    public function postUpdate(PropertyFloorRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->features->updateFloor($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
