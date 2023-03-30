<?php

namespace App\Http\Controllers\Admin;

use App\Models\FloorList;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PropertyFloorRequest;

class PropertyFloorController extends Controller
{
    protected $floors;
    protected $resp;

    public function __construct(FloorList $floors)
    {
        $this->floors = $floors;
    }

    public function getIndex()
    {
        $data['floors'] = $this->floors->getFloors()->data;
        return view('admin.property_floor.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.property_floor.create');
    }

    public function postStore(PropertyFloorRequest $request): RedirectResponse
    {
        $this->resp = $this->floors->storeFloor($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['floor'] = $this->floors->getFloor($id)->data;
        return view('admin.property_floor.edit', compact('data'));
    }

    public function postUpdate(PropertyFloorRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->floors->updateFloor($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
