<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AgentRequest;


class AgentsController extends BaseController
{
    protected $agent;
    protected $resp;

    public function __construct(Agent $agent)
    {
        parent::__construct();
        $this->agent = $agent;
    }

    public function getIndex(Request $request)
    {
        return view('admin.agents.index');
    }

    public function getCreate()
    {
        return view('admin.agents.create');
    }

    public function postStore(AgentRequest $request)
    {
        $this->resp = $this->agent->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $agent = Agent::find($id);
        $payment_method = PaymentMethod::orderBy('name')->pluck('name', 'id');

        if (!$agent) {
            return redirect()->route('admin.agents.list');
        }
        return view('admin.agents.edit')->withAgent($agent)->withPayment($payment_method);
    }

    public function postUpdate(AgentRequest $request, $id)
    {
        $this->resp = $this->agent->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->agent->getDelete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEarnings($id)
    {
        $data['agent'] = $this->agent->getAgent($id)->data;
        return view('admin.agents.earnings', compact('data'));
    }

    public function getWithdrawCredit()
    {
        $data = [];
        $data['payment_method'] = PaymentMethod::where('is_active', 1)->pluck('name', 'id');
        return view('admin.agents.withdraw', compact('data'));
    }


}
