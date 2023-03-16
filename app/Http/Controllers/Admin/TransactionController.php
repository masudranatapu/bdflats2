<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
        // $date_from = $request->query->get('from_date');
        // $date_to = $request->query->get('to_date');
        // $type = $request->query->get('transaction_type');
        // $data['rows'] = $this->paymentCustomer->gettransaction($date_from, $date_to, $type);
        return view('admin.transaction.index');
    }

    public function getTransactionList(Request $request)
    {
        $transaction = DB::table('acc_customer_transaction');

        // dd($request->transaction_type ?? 'all');

        if ($request->transaction_type) {

            if ($request->transaction_type == "all") {
                $transaction->$transaction->get();
            } elseif ($request->transaction_type == "listing_ad") {
                $transaction->$transaction->where('transaction_type', 3)->get();
            } elseif ($request->transaction_type == "contact_view") {
                $transaction->$transaction->where('transaction_type', 2)->get();
            } elseif ($request->transaction_type == "recharge") {
                $transaction->$transaction->where('transaction_type', 1)->get();
            } else {
                $transaction->$transaction->where('transaction_type', 3)->get();
            }

        }

        if ($request->from_date) {
            $transaction->whereDate('transaction_date', '>=', date('Y-m-d', strtotime($request->from_date)));
        }

        if ($request->to_date) {
            $transaction->whereDate('transaction_date', '<=', date('Y-m-d', strtotime($request->to_date)));
        }

        $transaction = $transaction->get();

        return DataTables::of($transaction)
            ->addColumn('id', function ($transaction) {
                return $transaction->id;
            })
            ->addColumn('user_id', function ($transaction) {
                return $transaction->f_customer_no;
            })
            ->addColumn('tid', function ($transaction) {
                return $transaction->code;
            })
            ->addColumn('date', function ($transaction) {
                return date('M d, Y', strtotime($transaction->transaction_date));
            })
            ->addColumn('transaction_type', function ($transaction) {
                $transactiontype = '';
                if ($transaction->transaction_type == 1) {
                    $transactiontype = "Recharge";
                } elseif ($transaction->transaction_type == 2) {
                    $transactiontype = "Property Payment";
                } elseif ($transaction->transaction_type == 3) {
                    $transactiontype = "Listing Purchase Payment";
                } elseif ($transaction->transaction_type == 4) {
                    $transactiontype = "Agent Commisiion";
                } else {
                    $transactiontype = "Lead Purchase Payment";
                }
                return $transactiontype;
            })
            ->addColumn('note', function ($transaction) {
                $note = "";

                if($transaction->in_out == 1) {
                    $note = "In";
                }else {
                    $note = "out payment by bdflat";
                }

                return $note ;

            })
            ->addColumn('amount', function ($transaction) {
                return number_format($transaction->amount, 2);
            })
            ->make(true);
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
