<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebAds;
use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdsPositionRequest;


class WebAdsController extends Controller
{

    protected $ads;
    protected $resp;

    public function __construct(WebAds $ads)
    {
        $this->ads = $ads;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->ads->getPaginatedList($request);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.index', compact('data'));
    }

    public function createAd(Request $request)
    {
        $data['positions'] = $this->ads->getAdsPositions($request)->data->pluck('NAME', 'POSITION_ID');
        return view('admin.ads.add_ad', compact('data'));
    }

    public function storeAd(AdsRequest $request)
    {
        $this->resp = $this->ads->storeAd($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function editAd($id)
    {
        $data = $this->ads->editAd($id)->data;
        return view('admin.ads.edit_ad', compact('data'));
    }

    public function updateAd(AdsRequest $request, $id)
    {
        $this->resp = $this->ads->updateAd($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    // Ads Position
    public function getAdsPosition(Request $request)
    {
        $this->resp = $this->ads->getAdsPositions($request);
        // dd($this->resp);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.ad_position', compact('data'));
    }

    public function createAdsPosition()
    {
        return view('admin.ads.add_ad_position');
    }

    public function storeAdsPosition(AdsPositionRequest $request)
    {
        $this->resp = $this->ads->storeAdsPosition($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function editAdsPosition($id)
    {
        $data['position'] = $this->ads->getAdsPosition($id);
        return view('admin.ads.edit_ad_position', compact('data'));
    }

    public function updateAdsPosition(AdsPositionRequest $request, $id)
    {
        $this->resp = $this->ads->updateAdsPosition($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    // Ads Image
    public function getAdsImages($id)
    {
        $this->resp = $this->ads->getAdsImages($id);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.images', compact('data','id'));
    }

    public function storeAdsImage(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required',
            'url' => 'max:150',
            'images' => 'required|min:1|max:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $this->resp = $this->ads->storeAdsImages($request, $id);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function updateAdsImage(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required',
            'url' => 'max:150',
            'id' => 'required'
        ]);

        $this->resp = $this->ads->updateAdsImage($request);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function deleteAd($id)
    {
        $this->resp = $this->ads->deleteAd($id);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function deleteAdsImage($id)
    {
        $this->resp = $this->ads->deleteAdsImage($id);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }


    public function deleteAdsPosition($id)
    {
        $this->resp = $this->ads->deleteAdsPosition($id);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }




}
