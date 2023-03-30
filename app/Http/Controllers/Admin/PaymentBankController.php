<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentBank;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentBankAcc;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\PaymentBankRequest;
use Brian2694\Toastr\Facades\Toastr;

class PaymentBankController extends BaseController
{
    protected $paymentbank;

    protected $resp;

    public function __construct(PaymentBankAcc  $paymentbank)
    {
        parent::__construct();
        $this->paymentbank         = $paymentbank;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->paymentbank->getPaginatedList($request, 50);
        return view('admin.paymentbank.index')->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['methods'] = PaymentMethod::where('is_active', '=', 1)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');
        $data['status'] = [
            1 => 'Active',
            0 => 'Inactive'
        ];
        return view('admin.paymentbank.create', compact('data'));
    }

    public function postStore(PaymentBankRequest $request)
    {
        $this->resp = $this->paymentbank->postStore($request);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['methods'] = PaymentMethod::where('is_active', '=', 1)
            ->orderBy('name')
            ->pluck('name', 'id');
        $data['status'] = [
            1 => 'Active',
            0 => 'Inactive'
        ];
        $data['account'] = PaymentBankAcc::find($id);
        return view('admin.paymentbank.edit', compact('data'));
    }

    public function postUpdate(PaymentBankRequest $request, $id)
    {
        $this->resp = $this->paymentbank->postUpdate($request, $id);
        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    // public function putUpdate(AccountRequest $request, $id)
    // {

    //     $this->resp = $this->account->postUpdate($request, $id);

    //     return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    // }

    // public function getDelete($id)
    // {

    //     $this->resp = $this->account->delete($id);

    //     return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    // }

}
