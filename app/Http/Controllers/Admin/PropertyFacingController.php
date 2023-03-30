<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ListingFeatures;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PropertyFacingRequest;
use Brian2694\Toastr\Facades\Toastr;

class PropertyFacingController extends Controller
{
    protected $features;
    protected $resp;

    public function __construct(ListingFeatures $features)
    {
        $this->features = $features;
    }

    public function getIndex()
    {
        $data['facings'] = $this->features->getFacings()->data;
        return view('admin.property_facing.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.property_facing.create');
    }

    public function postStore(PropertyFacingRequest $request): RedirectResponse
    {
        $this->resp = $this->features->storeFacing($request);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['facing'] = $this->features->getFacing($id)->data;
        return view('admin.property_facing.edit', compact('data'));
    }

    public function postUpdate(PropertyFacingRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->features->updateFacing($request, $id);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
