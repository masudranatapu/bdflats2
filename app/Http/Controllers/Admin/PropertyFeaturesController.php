<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ListingFeatures;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PropertyFeaturesRequest;

class PropertyFeaturesController extends Controller
{
    protected $features;
    protected $resp;

    public function __construct(ListingFeatures $features)
    {
        $this->features = $features;
    }

    public function getIndex()
    {
        $data['features'] = $this->features->getFeatures()->data;
        return view('admin.property-features.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.property-features.create');
    }

    public function postStore(PropertyFeaturesRequest $request): RedirectResponse
    {
        $this->resp = $this->features->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['feature'] = $this->features->getFeature($id)->data;
        return view('admin.property-features.edit', compact('data'));
    }

    public function postUpdate(PropertyFeaturesRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->features->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
