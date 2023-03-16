<?php

namespace App\Models;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class DataTbl extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    const CREATED_AT = 'ss_created_on';
    const UPDATED_AT = 'ss_modified_on';


    public function getSeeker(Request $request)
    {
        $dataSet = DB::table("users as c")->select('c.*')
        ->leftJoin('prd_requirements as b', function($join){
            $join->on('c.id', '=', 'b.f_user_no');
            $join->on('b.is_active','=',DB::raw("'1'"));
        })->where('c.status', '!=', 3)->where('c.user_type', 1);

        if($request->property_for != ''){
            $dataSet->where('b.property_for', $request->property_for);
        }
        if($request->property_type != ''){
            $dataSet->where('b.f_property_type_no', $request->property_type);
        }

        if($request->lead_status != ''){
            $dataSet->where('b.is_verified', $request->lead_status);
        }

        if($request->city != ''){
            $dataSet->where('b.f_city_no', $request->city);
        }
        if($request->area != ''){
            $dataSet->whereJsonContains('b.f_areas', $request->area);
        }

        $dataSet = $dataSet->orderBy('c.id', 'desc')->get();

        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                $status = '';
                if ($dataSet->status == 1) {
                    $status = '<span class="t-pub">Active</span>';
                } else {
                    $status = '<span class="t-del">Inactive</span>';
                }
                return $status;

            })
            ->addColumn('leadStatus', function ($dataSet) {
                $requirement = ProductRequirements::select('is_verified')->where('f_user_no', $dataSet->id)->where('is_active', 1)->first();
                if ($requirement) {
                    $verify = Config::get('static_array.seeker_verification_status');
                    return $verify[$requirement->is_verified] ?? '';
                }
                return 'N/A';
            })
            ->addColumn('leadInfo', function ($dataSet) {
                $info = '';
                $requirement = ProductRequirements::where('f_user_no', $dataSet->id)->where('is_active', 1)->first();
                if ($requirement) {

                    $area_no = json_decode($requirement->f_areas);
                    $areas = DB::table('ss_area')->whereIn('id',$area_no)->pluck('area_name')->implode(', ');

                    $info .= '<div>For : '.$requirement->property_for.'</div>';
                    $info .= '<div>City : '.$requirement->city_name.'</div>';
                    $info .= '<div>Area : '.$areas.'</div>';
                    $info .= '<div>Type : '.$requirement->property_type.'</div>';
                    return $info;

                }
                return 'N/A';
            })
            ->addColumn('action', function ($dataSet) {

                $edit = $view = $payment = '';

                if (Auth::user()->can('admin.seeker.view')){
                    $view = ' <a href="' . route("admin.seeker.view", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-info mb-05 mr-05" title="View">View</a>';
                }

                if (Auth::user()->can('admin.seeker.edit')){
                    $edit = ' <a href="' . route("admin.seeker.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-warning mb-05 mr-05" title="Edit">Edit</a>';
                }

                if (Auth::user()->can('admin.seeker.payment')){
                    $payment = ' <a href="' . route("admin.seeker.payment", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="View Payment">Payment</a>';
                }

                return $view . $edit . $payment;

            })
            ->rawColumns(['action', 'status','leadInfo'])
            ->make(true);

    }

    public function getOwner(Request $request)
    {
        $userType = [2, 3, 4];
        if ($request->get('owner')) {
            $userType = [$request->get('owner')];
        }

        $dataSet = DB::table("users as c")
            ->where('status', '!=', 3)
            ->whereIn('user_type', $userType)
            ->orderBy('id', 'DESC')
            ->get();
        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                if ($dataSet->status == 1) {
                    $status = '<span class="t-pub">Active</span>';
                } else {
                    $status = '<span class="t-del">Inactive</span>';
                }
                return $status;
            })
            ->addColumn('user_type', function ($dataSet) {
                $user_type = '';
                if ($dataSet->user_type == 2) {
                    $user_type = 'Owner';
                } else if ($dataSet->user_type == 3) {
                    $user_type = 'Builder';
                } else if ($dataSet->user_type == 4) {
                    $user_type = 'Agency';
                }
                return $user_type;
            })
            ->addColumn('action', function ($dataSet) {

                $edit = $cp = $view = $payment = '';

                    $view = ' <a href="' . route("admin.owner.view", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-info mb-05 mr-05" title="View">View</a>';


                    $edit = ' <a href="' . route("admin.owner.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Edit">Edit</a>';


                    $payment = ' <a href="' . route("admin.owner.payment", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="View Payment">Payment</a>';


                    $cp = ' <a href="' . route("admin.owner.password.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Change Password">CP</a>';

                return $view . $edit . $payment . $cp;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function getAgents($request)
    {
        $dataSet = DB::table("users as c")
            ->where('status', '!=', 3)
            ->where('user_type', '=', 5)
            ->orderBy('id', 'desc')
            ->get();
        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                $status = [
                    0 => 'Pending',
                    1 => 'Active',
                    2 => 'Inactive',
                    3 => 'Deleted'
                ];
                return $status[$dataSet->status] ?? '';
            })
            ->addColumn('action', function ($dataSet) {

                $edit = $payment = '';

                    $edit = ' <a href="' . route("admin.agents.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Edit">Edit</a>';


                    $payment = ' <a href="' . route("admin.agents.earnings", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="View Earnings">Earnings</a>';

                return $edit . $payment;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function getProperty(Request $request)
    {
        $dataSet = DB::table('prd_listings as p')
            ->orderBy('id', 'DESC');
        if ($request->user_type != '' ) {
            $dataSet->where('p.user_type', $request->user_type);
        }
        if ($request->property_for != '') {
            $dataSet->where('p.property_for', $request->property_for);
        }
        if ($request->listing_type != '') {
            $dataSet->where('p.f_listing_type', $request->listing_type);
        }
        if ($request->payment_status != '') {
            $dataSet->where('p.payment_status', $request->payment_status);
        }

        if ($request->property_status != '' ) {
            $dataSet->where('p.status', $request->property_status);
        }
        if ($request->city != '' ) {
            $dataSet->where('p.f_city_no', $request->city);
        }

        $dataSet = $dataSet->get();


        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                $status = Config::get('static_array.property_status');
                return $status[$dataSet->status] ?? '';
            })
            ->addColumn('user_id', function ($dataSet) {
                return DB::table('users')->where('id', '=', $dataSet->f_user_no)
                    ->first('code')->code;
            })
            ->addColumn('user_name', function ($dataSet) {
                $user_name = '';
                $user = DB::table('users')->where('id', '=', $dataSet->f_user_no)->first('name');
                if (Auth::user()->can('admin.owner.view')){
                    $user_name = '<a href="'.route('admin.owner.view', [$dataSet->f_user_no]).'">'.$user->name.'</a>';
                }else{

                    $user_name = '<a href="javascript:void(0)">'.$user->name.'</a>';
                }
                return $user_name;
            })
            ->addColumn('payment_status', function ($dataSet) {
                $status = [
                    0 => 'Due',
                    1 => 'Paid'
                ];
                return $status[$dataSet->payment_status];
            })
            ->addColumn('user_type', function ($dataSet) {
                $status = [
                    2 => 'Owner',
                    3 => 'Builder',
                    4 => 'Agency',
                    5 => 'Agent'
                ];
                return $status[$dataSet->user_type];
            })
            ->addColumn('mobile', function ($dataSet) {
                $mobile = '';
                if ($dataSet->mobile1) {
                    $mobile = '<span>' . $dataSet->mobile1 . '</span>';
                }
                if ($dataSet->mobile2) {
                    $mobile .= '<br><span>' . $dataSet->mobile2 . '</span>';
                }
                return $mobile;
            })
            ->addColumn('action', function ($dataSet) {

                $edit = $view = $activity = '';

                if (Auth::user()->can('admin.property.activity')){
                    $activity = ' <a href="' . route("admin.property.activity", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Activities">Activities</a>';
                }

                if (Auth::user()->can('admin.property.edit')){
                    $edit = ' <a href="' . route("admin.property.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-warning mb-05 mr-05" title="Edit">Edit</a>';
                }

                if(Auth::user()->can('admin.property.view')){
                    $view = ' <a href="' . route("admin.property.view", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-info mb-05 mr-05" title="View">View</a>';
                }



                return $activity . $edit . $view;
            })
            ->rawColumns(['action', 'status', 'mobile','user_name'])
            ->make(true);

    }

    public function getRefundRequest(Request $request)
    {
        $status = $request->filter;

        $dataSet = DB::table('acc_customer_refund')
            ->select('acc_customer_refund.*', 'users.code as user_code', 'users.name as user_name', 'users.mobile_no as user_mobile_no', 'acc_customer_transaction.code as tid')
            ->leftJoin('users', 'users.id', 'acc_customer_refund.F_USER_NO')
            ->leftJoin('acc_customer_transaction', 'acc_customer_transaction.f_listing_lead_payment_no', 'acc_customer_refund.f_listing_lead_payment_no');
        if ($status) {
            $dataSet = $dataSet->where('acc_customer_refund.status', '=', $status);
        }

        $dataSet = $dataSet->get();

        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                if ($dataSet->status == 1) {
                    $status = '<span class="text-warning">Pending</span>';
                } else if ($dataSet->status == 2) {
                    $status = '<span class="text-success">Approved</span>';
                } else {
                    $status = '<span class="text-danger">Denied</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($dataSet) {
                $edit = '';
                if (Auth::user()->can('admin.refund_request.edit')){
                    $edit = ' <a href="' . route("admin.refund_request.edit", ['id' => $dataSet->id]) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Edit">Edit</a>';
                }
                return $edit;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function getRechargeRequest(Request $request)
    {
        $status = $request->filter;
        $dataSet = DB::table('acc_recharge_request')
            ->select('acc_recharge_request.*', 'c.name as c_name', 'c.code as c_code', 'c.mobile_no as c_mobile_no')
            ->leftJoin('users AS c', 'c.id', '=', 'acc_recharge_request.f_customer_no')
            ->orderByDesc('acc_recharge_request.id');
        if ($status) {
            if ($status == 3) $status = 0;
            $dataSet = $dataSet->where('acc_recharge_request.status', '=', $status);
        }
        $dataSet = $dataSet->get();

        return Datatables::of($dataSet)
            ->addColumn('status', function ($dataSet) {
                if ($dataSet->status == 0) {
                    $status = '<span class="text-warning">Pending</span>';
                } else if ($dataSet->status == 1) {
                    $status = '<span class="text-success">Approved</span>';
                } else {
                    $status = '<span class="text-danger">Denied</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($dataSet) {

                $edit = '';
                if (Auth::user()->can('admin.recharge_request.edit')){
                    $edit = ' <a href="' . route('admin.recharge_request.edit', $dataSet->id) . '" class="btn btn-xs btn-success mb-05 mr-05" title="Edit">Edit</a>';
                }
                return $edit;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function getTransactionList(Request $request)
    {
        $status = $request->filter;
        $dataSet = DB::table('acc_customer_transaction')
            ->select('acc_customer_transaction.*', 'c.name as c_name', 'c.code as c_code', 'c.mobile_no as c_mobile_no')
            ->leftJoin('users AS c', 'c.id', '=', 'acc_customer_transaction.f_customer_no')
            ->orderByDesc('acc_customer_transaction.id');

        dd($request->all());

        $dataSet = $dataSet->get();

        return Datatables::of($dataSet)


            ->addColumn('transaction_type', function ($dataSet) {
                if ($dataSet->transaction_type == 1) {
                    $transaction_type = '<span class="text-warning">recharge</span>';
                } else if ($dataSet->transaction_type == 2) {
                    $transaction_type = '<span class="text-success">property payment</span>';
                }else if ($dataSet->transaction_type == 3) {
                    $transaction_type = '<span class="text-success">listing lead purchase payment</span>';
                }else if ($dataSet->transaction_type == 4) {
                    $transaction_type = '<span class="text-success">agent commisiion</span>';
                }else if ($dataSet->transaction_type == 5) {
                    $transaction_type = '<span class="text-success">lead purchase payment</span>';
                }

                return $transaction_type;
            })

            ->addColumn('action', function ($dataSet) {

                $edit = '';

                return $edit;
            })
            ->rawColumns(['action', 'transaction_type'])
            ->make(true);

    }





    // public function all_customer()
    // {
    //     $this->resp = $this->datatable->getDatatableCustomer();
    //     return $this->resp;
    // }
    // public function all_reseller()
    // {
    //     $this->resp = $this->datatable->getDatatableReseller();
    //     return $this->resp;
    // }

    // public function getAllOrder(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableOrder($request);
    //     return $this->resp;
    // }

    // public function getCancelOrder(Request $request)
    // {
    //     $this->resp = $this->datatable->getCancelOrder($request);
    //     return $this->resp;
    // }


    // public function getAlteredOrder(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableAlteredOrder($request);
    //     return $this->resp;
    // }

    // public function getDefaultOrder(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableDefaultOrder($request);
    //     return $this->resp;
    // }

    // public function getDefaultOrderAction(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableDefaultOrderAction($request);
    //     return $this->resp;
    // }

    // public function getDefaultOrderPenalty(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableDefaultOrderPenalty($request);
    //     return $this->resp;
    // }

    // public function all_product_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableProduct($request);
    //     return $this->resp;
    // }

    // public function unshelved_product_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableUnshelved($request);
    //     return $this->resp;
    // }

    // public function boxed_product_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableBoxed($request);
    //     return $this->resp;
    // }

    // public function shelved_product_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableShelved($request);
    //     return $this->resp;
    // }

    // public function notBoxed_product_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableNotBoxed($request);
    //     return $this->resp;
    // }

    // public function sales_comission_report(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableSalesComission($request);
    //     return $this->resp;
    // }

    // public function sales_comission_report_list(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableSalesComissionList($request);
    //     return $this->resp;
    // }

    // public function getOrderCollection(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableOrderCollection($request);
    //     return $this->resp;
    // }

    // public function getItemCollection(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableItemCollection($request);
    //     return $this->resp;
    // }

    // public function getItemCollectedList(Request $request)
    // {
    //     $this->resp = $this->datatable->getDatatableItemCollectedList($request);
    //     return $this->resp;
    // }
    // public function customerRefundlist(Request $request)
    // {
    //     $this->resp = $this->datatable->customerRefundlist($request);
    //     return $this->resp;
    // }
    // public function customerRefunded(Request $request)
    // {
    //     $this->resp = $this->datatable->customerRefunded($request);
    //     return $this->resp;
    // }
    // public function customerRefundedRequestList(Request $request)
    // {
    //     $this->resp = $this->datatable->customerRefundedRequestList($request);
    //     return $this->resp;
    // }
    // public function ajaxbankToOther()
    // {
    //     $this->resp = $this->datatable->ajaxbankToOther();
    //     return $this->resp;
    // }

    // public function ajaxbankToBank()
    // {
    //     $this->resp = $this->datatable->ajaxbankToBank();
    //     return $this->resp;
    // }


}

