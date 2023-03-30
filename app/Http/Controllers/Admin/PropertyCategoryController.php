<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\PropertyCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\PropertyCategoryRequest;
use Brian2694\Toastr\Facades\Toastr;

class PropertyCategoryController extends BaseController
{
    protected $category;
    protected $resp;

    public function __construct(PropertyCategory $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->category->getPaginatedList($request, 20);
        return view('admin.property_category.index')->withRows($this->resp->data);
    }

    public function getCreate()
    {
        return view('admin.property_category.create');
    }

    public function postStore(PropertyCategoryRequest $request)
    {
        //dd($request->All());
        $this->resp = $this->category->postStore($request);
        //dd($this->resp);
        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);

        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->category->findOrThrowException($id);
        //dd($this->resp->data);
        return view('admin.property_category.edit')->withCategory($this->resp->data);
    }

    public function postUpdate(PropertyCategoryRequest $request, $id)
    {
        $this->resp = $this->category->postUpdate($request, $id);

        Toastr::success($this->resp->msg);

        return redirect()->route($this->resp->redirect_to);

        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $is_use_property_type_on = DB::table('prd_listings')->where('f_property_type_no', $id)->first();

        if($is_use_property_type_on) {
            Toastr::success('You can not delete this property category. At fist delete listings where used this property condition.');
            return redirect()->back();
        }else {

            $property_type = DB::table('prd_property_type')->where('id', $id)->first();
            // dd($property_type);
            if(file_exists($property_type->img_path)) {
                unlink($property_type->img_path);
            }
            if(file_exists($property_type->icon_path)) {
                unlink($property_type->icon_path);
            }

            DB::table('prd_property_type')->where('id', $id)->delete();

            Toastr::success('Property category successfully deleted');
            return redirect()->back();
        }
    }
}
