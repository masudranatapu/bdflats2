<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PropertyCondition;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PropertyConditionRequest;
use App\Http\Requests\PropertyConditionEditRequest;
use Brian2694\Toastr\Facades\Toastr;

class PropertyConditionController extends Controller
{
    protected $condition;
    protected $resp;

    public function __construct(PropertyCondition $condition)
    {
        $this->condition = $condition;
    }

    public function getIndex()
    {
        $data['conditions'] = $this->condition->getPropertyConditions()->data;
        return view('admin.property_condition.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.property_condition.create');
    }

    public function postStore(PropertyConditionRequest $request)
    {
        $this->resp = $this->condition->postStore($request);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['condition'] = $this->condition->getPropertyCondition($id)->data;
        return view('admin.property_condition.edit', compact('data'));
    }

    public function getDelete($id)
    {
        dd($id);
    }

    public function postUpdate(PropertyConditionEditRequest $request, $id)
    {
        $this->resp = $this->condition->postUpdate($request, $id);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);

        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
