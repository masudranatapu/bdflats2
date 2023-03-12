<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\LeadPrice;
use App\Models\ListingPrice;
use App\Models\ListingType;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AgentRequest;
use App\Repositories\Admin\Agent\AgentInterface;

class ListingPriceController extends BaseController
{
    protected $listing_price;
    protected $listing_lead_price;
    protected $listing_type;

    public function __construct(ListingType $listing_type, ListingPrice $listing_price,LeadPrice $listing_lead_price)
    {
        $this->listing_type = $listing_type;
        $this->listing_price = $listing_price;
        $this->listing_lead_price = $listing_lead_price;
    }

    public function getIndex()
    {
        $this->resp = $this->listing_type->getPaginatedList();
        $this->resp2 = $this->listing_lead_price->getPaginatedList();
        return view('admin.listing_price.index')->withData($this->resp)->withData2($this->resp2);
    }

    public function postUpdate(Request $request)
    {
//        dd($request->all());
        $this->resp = $this->listing_price->postUpdate($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postLeadPriceUpdate(Request $request)
    {
//        dd($request->all());
        $this->resp = $this->listing_lead_price->postUpdate($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
