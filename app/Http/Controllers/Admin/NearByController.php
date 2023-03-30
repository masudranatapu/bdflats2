<?php

namespace App\Http\Controllers\Admin;

use App\Models\NearBy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NearByController extends Controller
{
    public function getIndex(){
        $nearby_area = NearBy::orderBy('id','desc')->get();
        return view('admin.nearby.index',compact('nearby_area'));
    }
    public function getCreate(){
        return view('admin.nearby.create');
    }
    public function postStore(Request $request){
        $this->status = false;
        $this->msg = 'Feature not added!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title);
            $check = NearBy::where('url_slug', '=', $slug)->first();
            if ($check) {
                $slug .= '-' . (NearBy::max('id') + 1);
            }

            $feature = new NearBy();
            $feature->title = $request->title;
            $feature->order_id = $request->order_id;
            $feature->is_active = $request->status;
            $feature->url_slug = $slug;
            if ($request->hasFile('icon')) {
                $image = $request->file('icon');
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = 'uploads/listings/features/';
                $image->move($image_path, $image_name);
                $feature->icon = $image_path . $image_name;
            }
            $feature->save();

            $this->status = true;
            $this->msg = 'NearBy added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return redirect()->route('admin.nearbyarea.list')->with('flashMessageSuccess', $this->msg);
    }
    public function getEdit($id)
    {
        $data = NearBy::find($id);
        return view('admin.nearby.edit',compact('data'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->status = false;
        $this->msg = 'Feature not updated!';

        DB::beginTransaction();
        try {
            $feature = NearBy::find($id);
            $feature->title = $request->title;
            $feature->order_id = $request->order_id;
            $feature->is_active = $request->status;
            if ($request->hasFile('icon')) {
                $image = $request->file('icon');
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = 'uploads/listings/features/';
                $image->move($image_path, $image_name);
                $feature->icon = $image_path . $image_name;
            }
            $feature->save();

            $this->status = true;
            $this->msg = 'NearBy updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return redirect()->route('admin.nearbyarea.list')->with('flashMessageSuccess', $this->msg);
    }
}
