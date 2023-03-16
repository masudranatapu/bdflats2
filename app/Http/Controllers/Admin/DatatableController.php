<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\DataTbl;

class DatatableController extends BaseController
{
    protected $datatable;
    protected $resp;

    public function __construct(DataTbl $datatable)
    {
        parent::__construct();
        $this->datatable = $datatable;
    }

    public function getSeeker(Request $request)
    {
        $this->resp = $this->datatable->getSeeker($request);
        return $this->resp;
    }

    public function getOwner(Request $request)
    {
        $this->resp = $this->datatable->getOwner($request);
        return $this->resp;
    }

    public function getAgents(Request $request)
    {
        $this->resp = $this->datatable->getAgents($request);
        return $this->resp;
    }

    public function getProperty(Request $request)
    {
        $this->resp = $this->datatable->getProperty($request);
        return $this->resp;
    }

    public function getRefundRequest(Request $request)
    {
        $this->resp = $this->datatable->getRefundRequest($request);
        return $this->resp;
    }

    public function getRechargeRequest(Request $request)
    {
        $this->resp = $this->datatable->getRechargeRequest($request);
        return $this->resp;
    }


    public function getTransactionList(Request $request)
    {
        $this->resp = $this->datatable->getTransactionList($request);
        return $this->resp;
    }


    /*

    public function all_customer()
    {
        $this->resp = $this->datatable->getDatatableCustomer();
        return $this->resp;
    }
    public function all_reseller()
    {
        $this->resp = $this->datatable->getDatatableReseller();
        return $this->resp;
    }

    public function getAllOrder(Request $request)
    {
        $this->resp = $this->datatable->getDatatableOrder($request);
        return $this->resp;
    }

    public function getCancelOrder(Request $request)
    {
        $this->resp = $this->datatable->getCancelOrder($request);
        return $this->resp;
    }


    public function getAlteredOrder(Request $request)
    {
        $this->resp = $this->datatable->getDatatableAlteredOrder($request);
        return $this->resp;
    }

    public function getDefaultOrder(Request $request)
    {
        $this->resp = $this->datatable->getDatatableDefaultOrder($request);
        return $this->resp;
    }

    public function getDefaultOrderAction(Request $request)
    {
        $this->resp = $this->datatable->getDatatableDefaultOrderAction($request);
        return $this->resp;
    }

    public function getDefaultOrderPenalty(Request $request)
    {
        $this->resp = $this->datatable->getDatatableDefaultOrderPenalty($request);
        return $this->resp;
    }

    public function all_product_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableProduct($request);
        return $this->resp;
    }

    public function unshelved_product_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableUnshelved($request);
        return $this->resp;
    }

    public function boxed_product_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableBoxed($request);
        return $this->resp;
    }

    public function shelved_product_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableShelved($request);
        return $this->resp;
    }

    public function notBoxed_product_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableNotBoxed($request);
        return $this->resp;
    }

    public function sales_comission_report(Request $request)
    {
        $this->resp = $this->datatable->getDatatableSalesComission($request);
        return $this->resp;
    }

    public function sales_comission_report_list(Request $request)
    {
        $this->resp = $this->datatable->getDatatableSalesComissionList($request);
        return $this->resp;
    }

    public function getOrderCollection(Request $request)
    {
        $this->resp = $this->datatable->getDatatableOrderCollection($request);
        return $this->resp;
    }

    public function getItemCollection(Request $request)
    {
        $this->resp = $this->datatable->getDatatableItemCollection($request);
        return $this->resp;
    }

    public function getItemCollectedList(Request $request)
    {
        $this->resp = $this->datatable->getDatatableItemCollectedList($request);
        return $this->resp;
    }
    public function customerRefundlist(Request $request)
    {
        $this->resp = $this->datatable->customerRefundlist($request);
        return $this->resp;
    }
    public function customerRefunded(Request $request)
    {
        $this->resp = $this->datatable->customerRefunded($request);
        return $this->resp;
    }
    public function customerRefundedRequestList(Request $request)
    {
        $this->resp = $this->datatable->customerRefundedRequestList($request);
        return $this->resp;
    }
    public function ajaxbankToOther()
    {
        $this->resp = $this->datatable->ajaxbankToOther();
        return $this->resp;
    }

    public function ajaxbankToBank()
    {
        $this->resp = $this->datatable->ajaxbankToBank();
        return $this->resp;
    }

    */



}

