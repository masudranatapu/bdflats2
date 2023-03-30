<?php

namespace App\Models;

use DB;
use Str;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class ListingFeatures extends Model
{
    use RepoResponse;
    public $timestamps = false;
    protected $table = 'prd_listing_features';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'url_slug', 'is_active', 'order_id'];

    public function getListingFeature()
    {
        return ListingFeatures::where('is_active', 1)->pluck('title', 'id');
    }


    public function getFeatures($limit = 2000): object
    {
        $features = ListingFeatures::orderBy('order_id', 'desc')->paginate($limit);
        return $this->formatResponse(true, '', '', $features);
    }

    public function getFeature(int $id): object
    {
        $feature = ListingFeatures::find($id);
        return $this->formatResponse(true, '', '', $feature);
    }

    public function postStore($request)
    {
        $this->status = false;
        $this->msg = 'Feature not added!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title);
            $check = ListingFeatures::where('url_slug', '=', $slug)->first();
            if ($check) {
                $slug .= '-' . (ListingFeatures::max('id') + 1);
            }

            $feature = new ListingFeatures();
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
            $this->msg = 'Feature added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfeatures.list');
    }

    public function postUpdate($request, int $id): object
    {
        $this->status = false;
        $this->msg = 'Feature not updated!';

        DB::beginTransaction();
        try {
            $feature = ListingFeatures::find($id);
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
            $this->msg = 'Feature updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfeatures.list');
    }

    public function getFacings($limit = 2000): object
    {
        $facings = PropertyFacing::orderBy('order_id', 'desc')->paginate($limit);
        return $this->formatResponse(true, '', '', $facings);
    }

    public function getFacing(int $id): object
    {
        $facing = PropertyFacing::find($id);
        return $this->formatResponse(true, '', '', $facing);
    }

    public function storeFacing($request)
    {
        $this->status = false;
        $this->msg = 'Facing not added!';

        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title);
            $check = PropertyFacing::where('url_slug', '=', $slug)->first();
            if ($check) {
                $slug .= '-' . (PropertyFacing::max('id') + 1);
            }

            $facing = new PropertyFacing();
            $facing->title = $request->title;
            $facing->order_id = $request->order_id;
            $facing->is_active = $request->status;
            $facing->url_slug = $slug;
            $facing->save();

            $this->status = true;
            $this->msg = 'Facing added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfacing.list');
    }

    public function updateFacing($request, int $id): object
    {
        $this->status   = false;
        $this->msg      = 'Facing not updated!';

        DB::beginTransaction();
        try {
            $facing = PropertyFacing::find($id);
            $facing->title = $request->title;
            $facing->order_id = $request->order_id;
            $facing->is_active = $request->status;
            $facing->save();

            $this->status = true;
            $this->msg = 'Facing updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfacing.list');
    }



}
