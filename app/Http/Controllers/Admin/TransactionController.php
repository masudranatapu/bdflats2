<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class TransactionController extends BaseController
{
    protected $paymentCustomer;

    public function __construct(PaymentCustomer $paymentCustomer)
    {
        parent::__construct();
        $this->paymentCustomer = $paymentCustomer;
    }

    public function getIndex(Request $request)
    {
        $date_from = $request->query->get('from_date');
        $date_to = $request->query->get('to_date');
        $type = $request->query->get('transaction_type');
        $data['rows'] = $this->paymentCustomer->getTransactions($date_from, $date_to, $type);
        return view('admin.transaction.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.transaction.create');
    }

    public function getEdit($request)
    {
        return view('admin.transaction.create');
    }

    public function postStore()
    {

    }

    public function postUpdate()
    {

    }

    public function getRefundRequest(Request $request)
    {
        $data['rows'] = $this->paymentCustomer->getRefundRequest($request);
        return view('admin.transaction.refund_request', compact('data'));
    }

    public function editRefundRequest($id)
    {
        $data['refund'] = $this->paymentCustomer->getRefund($id);
        return view('admin.transaction.edit_refund_request', compact('data'));
    }

    public function updateRefundRequest(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|min:1|max:3'
        ]);

        $this->resp = $this->paymentCustomer->updateRefund($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getRechargeRequest(Request $request)

    {
        $data['rows'] = $this->paymentCustomer->getRechargeRequests($request);
        return view('admin.transaction.recharge_request', compact('data'));
    }

    public function editRechargeRequest($id)
    {
        $data['recharge'] = $this->paymentCustomer->getRechargeRequest($id);
        return view('admin.transaction.edit_recharge_request', compact('data'));
    }

    public function updateRechargeRequest(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|min:1|max:3'
        ]);

        $this->resp = $this->paymentCustomer->updateRechargeRequest($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getAgentCommission()
    {
        return view('admin.transaction.agent_commission');
    }


}
