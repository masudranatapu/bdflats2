<?php

namespace App\Models;


use App\Models\AdsPosition;
use App\Models\WebAdsImage;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class WebAds extends Model
{
    use RepoResponse;

    protected $table = 'prd_ads';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::id();
        });
    }

    public function position()
    {
        return $this->hasOne('App\Models\AdsPosition', 'position_id', 'f_ad_position_no');
    }

    public function images()
    {
        return $this->hasMany('App\Models\AdsImages', 'f_ads_no', 'id')->orderByDesc('order_id');
    }



    public function getRandomAd($position_id)
    {
        return WebAds::with(['images'])
            ->where('f_ad_position_no', '=', $position_id)
            ->where('status', '=', 1)
            ->whereDate('available_from', '<=', DB::raw('current_date()'))
            ->whereDate('available_to', '>=', DB::raw('current_date()'))
            ->inRandomOrder(time())
            ->first();
    }


    public function getPaginatedList($request)
    {
        $data = WebAds::with(['position', 'images'])->orderBy('id', 'asc')->get();
        return $this->formatResponse(true, '', 'admin.ads', $data);
    }

    public function storeAd($request)
    {
        $status = false;
        $msg = 'Ad could not be added!';

        DB::beginTransaction();
        try {
            $ad = new WebAds();
            $ad->f_ad_position_no       = $request->position;
            $ad->available_to           = date('Y-m-d', strtotime($request->end_date));
            $ad->available_from         = date('Y-m-d', strtotime($request->start_date));
            $ad->status                 = $request->status;
            $ad->save();

            $status     = true;
            $msg        = 'Add added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads');
    }

    public function editAd($id)
    {
        $data['positions'] = AdsPosition::orderBy('id', 'asc')->pluck('name', 'position_id');
        $data['ad'] = WebAds::find($id);
        return $this->formatResponse(true, '', 'admin.ads', $data);
    }

    public function updateAd($request, $id)
    {
        $status = false;
        $msg    = 'Ad could not be updated!';

        DB::beginTransaction();
        try {
            $ad = WebAds::find($id);
            $ad->f_ad_position_no   = $request->position;
            $ad->available_to       = date('Y-m-d', strtotime($request->end_date));
            $ad->available_from     = date('Y-m-d', strtotime($request->start_date));
            $ad->status             = $request->status;
            $ad->save();

            $status     = true;
            $msg        = 'Add updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads');
    }

    public function getAdsPositions($request)
    {
        $data = AdsPosition::orderBy('id', 'asc')->get();
        return $this->formatResponse(true, '', 'admin.ads_position', $data);
    }

    public function getAdsPosition(int $id)
    {
        return AdsPosition::find($id);
    }

    public function storeAdsPosition($request)
    {
        $status     = false;
        $msg        = 'Could not add ads position!';

        DB::beginTransaction();
        try {
            $adsPosition = new AdsPosition();
            $adsPosition->name          = $request->name;
            $adsPosition->position_id   = $request->position;
            $adsPosition->is_active     = $request->status;
            $adsPosition->save();

            $status     = true;
            $msg        = 'Ads position added';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads_position');
    }

    public function updateAdsPosition($request, $id)
    {
        $status     = false;
        $msg        = 'Could not update ads position!';

        DB::beginTransaction();
        try {
            $adsPosition = $this->getAdsPosition($id);
            $adsPosition->name          = $request->name;
            $adsPosition->position_id   = $request->position;
            $adsPosition->is_active     = $request->status;
            $adsPosition->save();

            $status     = true;
            $msg        = 'Ads position updated';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads_position');
    }

    public function getAdsImages($id)
    {
        $data = WebAdsImage::where('f_ads_no', $id)->orderByDesc('order_id')->get();

        return $this->formatResponse(true, '', 'admin.ads-image', $data);
    }

    public function storeAdsImages($request, $id)
    {
        $status     = false;
        $msg        = 'Data could not be added!';

        DB::beginTransaction();
        try {
            $adImg = new AdsImages();
            $adImg->f_ads_no    = $id;
            $adImg->order_id    = $request->order_id;
            $adImg->url         = $request->url;

            $image      = $request->file('images')[0];
            $imageName  = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath  = '/uploads/ads/' . $id . '/';
            $image->move(public_path($imagePath), $imageName);

            $adImg->image_path = $imagePath . $imageName;
            $adImg->save();

            $status     = true;
            $msg        = 'Image added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads-image');
    }

    public function updateAdsImage($request)
    {
        $status     = false;
        $msg        = 'Image order could not be update!';

        DB::beginTransaction();
        try {
            $adImg = AdsImages::find($request->id);
            $adImg->order_id    = $request->order_id;
            $adImg->url         = $request->url;
            $adImg->save();

            $status     = true;
            $msg        = 'Image order updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads-image');
    }



    public function deleteAd(int $id)
    {
        $status     = false;
        $msg        = 'Data could not be deleted!';

        DB::beginTransaction();
        try {
            $data = WebAds::find($id);
            if($data){
                $adImgs = AdsImages::where('f_ads_no',$id)->get();
                if($adImgs){
                    foreach ($adImgs as $key => $value) {
                        $adImg = AdsImages::find($value->id);
                        $imageFile = $adImg->image_path;
                        $adImg->delete();
                        if (file_exists(public_path($imageFile))){
                            unlink(public_path($imageFile));
                        }
                    }
                }
            }
            $data->delete();
            $status     = true;
            $msg        = 'Ad deleted successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);

        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads');
    }


    public function deleteAdsImage(int $id)
    {
        $status     = false;
        $msg        = 'Data could not be deleted!';

        DB::beginTransaction();
        try {
            $adImg = AdsImages::find($id);
            if($adImg){
                $imageFile = $adImg->image_path;
                $adImg->delete();
                if (file_exists(public_path($imageFile))){
                    unlink(public_path($imageFile));
                }
            }
            $status     = true;
            $msg        = 'Image deleted successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.ads');
    }


    public function deleteAdsPosition(int $id)
    {
        $status     = false;
        $msg        = 'Data could not be deleted!';

        DB::beginTransaction();
        try {
            $adImg = AdsPosition::find($id);

            dd($adImg);

            $adImg->delete();


            $status     = true;
            $msg        = 'Image deleted successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'web.ads.image');
    }



}
