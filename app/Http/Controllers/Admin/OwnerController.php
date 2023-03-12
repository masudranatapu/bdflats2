<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Agent;
use App\Models\Owner;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Requests\OwnerRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RechargeRequest;
use App\Http\Controllers\BaseController;



class OwnerController extends BaseController
{
    protected $agent;
    protected $country;
    protected $owner;
    protected $resp;

    public function __construct(Owner $owner, Agent $agent, Country $country)
    {
        parent::__construct();
        $this->owner = $owner;
        $this->agent = $agent;
        $this->country = $country;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->owner->getPaginatedList($request);
        $data['rows'] = $this->resp->data;
        return view('admin.owner.index', compact('data'));
    }

    public function getView($id)
    {
        $this->resp = $this->owner->getShow($id);
        $data['owner'] = $this->resp->data;
        return view('admin.owner.view', compact('data'));
    }

    public function getEdit($id)
    {
        $this->resp = $this->owner->getShow($id);
        $data['owner'] = $this->resp->data;
        return view('admin.owner.edit', compact('data'));
    }

    public function postUpdate(OwnerRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->owner->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getPasswordEdit($id)
    {
        $this->resp = $this->owner->getshow($id);
        $data['row'] = $this->resp->data;
        return view('admin.owner.edit-password', compact('data'));
    }

    public function postPasswordUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6'
        ]);
        $this->resp = $this->owner->updatePassword($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getPayment($id)
    {
        $data['rows'] = $this->owner->getCustomerTxn($id)->data;
        $data['total'] = $data['rows']->sum('AMOUNT');
        return view('admin.owner.payment', compact('data'));
    }

    public function getRecharge($id)
    {

        $data['paymentMethods'] = PaymentMethod::all()
            ->whereNotIn('id', [1, 5, 7])
            ->where('is_active', '=', 1)
            ->pluck('name', 'id');
        $data['owner'] = User::find($id);
        return view('admin.owner.recharge', compact('data'));
    }

    public function postRecharge(RechargeRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->owner->postRecharge($request, $id);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postPayment(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required',
            'note' => 'required'
        ]);
        $this->resp = $this->owner->storePayment($request, $id);
        return redirect()->route($this->resp->redirect_to, $id)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getPaymentView($id, $payment)
    {
        $data['payment'] = $this->owner->getTransaction($payment)->data;
        return view('admin.owner.view-payment', compact('data'));
    }

    /*

        public function getCreate() {
            $agentCombo    = $this->agent->getAgentCombo();
            $country       = $this->country->getCountryComboWithCode();
            return view('admin.reseller.create')->withAgentCombo($agentCombo)->withCountry($country);
        }

        public function postStore(ResellerRequest $request)
        {
            $this->resp = $this->owner->postStore($request);
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        public function getView(Request $request, $id)
        {
            $this->resp             = $this->owner->getShow($id);
            $data['agent_combo']    = $this->agent->getAgentCombo();
            $data['country']        = $this->country->getCountryComboWithCode();
            $data['city']           = PoCode::where('PO_CODE',$this->resp->data->POST_CODE)->groupBy('F_CITY_NO')->pluck('CITY_NAME','F_CITY_NO');
            $data['state']          = City::where('id',$this->resp->data->CITY)->groupBy('F_STATE_NO')->pluck('STATE_NAME','F_STATE_NO');

            if (!$this->resp->status) {
                return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
            }
            return view('admin.reseller.view')->withReseller($this->resp->data)->withData($data);
        }


        public function getEdit(Request $request, $id)
        {
            $this->resp             = $this->owner->getShow($id);
            $data['agent_combo']    = $this->agent->getAgentCombo();
            $data['country']        = $this->country->getCountryComboWithCode();
            $data['city']           = PoCode::where('PO_CODE',$this->resp->data->POST_CODE)->groupBy('F_CITY_NO')->pluck('CITY_NAME','F_CITY_NO');
            $data['state']          = City::where('id',$this->resp->data->CITY)->groupBy('F_STATE_NO')->pluck('STATE_NAME','F_STATE_NO');

            if (!$this->resp->status) {
                return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
            }
            return view('admin.reseller.edit')->withReseller($this->resp->data)->withData($data);
        }

        public function postUpdate(ResellerRequest $request, $id)
        {
            $this->resp = $this->owner->postUpdate($request, $id);

            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        public function getDelete($id)
        {
            $this->resp = $this->owner->delete($id);

            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        */

}
