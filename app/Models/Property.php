<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use Illuminate\Support\Str;
use App\Traits\RepoResponse;
use Illuminate\Http\Request;
use App\Models\PropertyCondition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Property extends Model
{
    use RepoResponse;

    protected $table = 'prd_listings';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';

    protected $fillable = [
        'code',
        'property_for',
        'f_property_type_no',
        'property_type',
        'address',
        'house',
        'road',
        'property_condition',
        'f_property_condition',
        'property_size',
        'bedroom',
        'bathroom',
        'balcony',
        'total_price',
        'price_type',
        'title',
        'url_slug',
        'f_city_no',
        'city_name',
        'f_area_no',
        'area_name',
        'f_user_no',
        'user_type',
        'is_expaired',
        'expaired_at',
        'contact_person1',
        'contact_person2',
        'mobile1',
        'mobile2',
        'mobile3',
        'f_listing_type',
        'listing_type',
        'f_prep_tenant_no',
        'prep_tenant',
        'available_from',
        'gender',
        'is_verified',
        'verified_by',
        'verified_at',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'total_floors', 'floors_avaiable',
    ];

    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->created_by = $user->id;
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->modified_by = $user->id;
           });
       }


    public function getUser() {
        return $this->belongsTo('App\Models\User', 'created_by')->withDefault();
    }

    public function listingOwner() {
        return $this->belongsTo('App\Models\User', 'f_user_no');
    }

    public function getListingView()
    {
        return $this->hasMany('App\Models\ListingView', 'f_prd_listing_no');
    }

    public function listingSEO(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ListingSEO', 'f_listing_no', 'id');
    }



    public function getPaginatedList($request, int $per_page = 2000)
    {
        //4=DELETED
        $data['listings']       = [];
        $data['user_type']      = DB::table('ss_user_type')->where('type_no', '!=', 1)->orderBy('id', 'asc')->pluck('title', 'id');
        $data['listing_type']   = DB::table('prd_listing_type')->where('is_active', '=', 1)->orderBy('order_id', 'asc')->pluck('name', 'id');
        $data['cities']         = DB::table('ss_city')->pluck('city_name', 'id');
        return $this->formatResponse(true, '', 'admin.property.index', $data);
    }

    public function getShow(int $id)
    {
        $data = Property::select('prd_listings.*', 'a.sell_price', 'a.rent_price', 'a.roommat_price', 'b.duration')
            ->leftJoin('ss_listing_price as a', 'a.f_listing_type_no', 'prd_listings.f_listing_type')
            ->leftJoin('prd_listing_type as b', 'b.id', 'prd_listings.f_listing_type')
            ->where('prd_listings.id', $id)
            ->first();

        if (!empty($data)) {
            return $this->formatResponse(true, 'Data found', 'admin.property.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.property.index', null);
    }



    public function postUpdate($request, int $id): object
    {

        DB::beginTransaction();
        try {
            $area = $request->area;
            if ($request->sub_area && $request->sub_area > 0) {
                $area = $request->sub_area;
            }

            $list = Property::with(['listingSEO', 'getUser'])->find($id);
            $list->property_for = $request->property_for;
            $list->f_property_type_no = $request->propertyType;
            $list->f_city_no = $request->city;
            $list->f_area_no = $area;
            $list->address = $request->address;
            $list->f_property_condition = $request->condition;
            $list->title = $request->ad_title;
            $list->price_type = $request->property_priceChek;
            $list->contact_person1 = $request->contact_person;
            $list->contact_person2 = $request->contact_person_2;
            $list->mobile1 = $request->mobile;
            $list->mobile2 = $request->mobile_2;
            $list->f_listing_type = $request->listing_type;
            $list->total_floors = $request->floor;
            $list->floors_avaiable = json_encode($request->floor_available);
            $list->modified_by = Auth::id();
            $list->modified_at = Carbon::now();
            $list->url_slug_locked = 1;
            $list->is_verified = $request->is_verified ? 1 : 0;
            $list->ci_payment = $request->ci_payment ? 1 : 0;
            $list->ci_price = $request->contact_view_price;
            $list->agent_commission_amt = $request->agent_commission_amt ?? 0;
            $list->payment_auto_renew = $request->auto_payment_renew ? 1 : 0;
            $list->max_sharing_permission = $request->max_sharing_permission;
            if ($request->billing == 'paid') {
                $price = ListingPrice::where('f_listing_type_no', $request->listing_type)->first();
                $list_type = ListingType::where('id', $request->listing_type)->first();
                $property_price = 0;
                if ($request->property_for == 'roommate') {
                    $property_price = $price->roommat_price;
                } elseif ($request->property_for == 'sale') {
                    $property_price = $price->sell_price;
                } elseif ($request->property_for == 'rent') {
                    $property_price = $price->rent_price;
                }
                if ($property_price <= $list->getUser->unused_topup) {
                    $list->PAYMENT_STATUS = 1;
                    $pay = new ListingPayment();
                    $pay->f_listing_no = $id;
                    $pay->f_user_no = $list->F_USER_NO;
                    $pay->start_date = date('Y-m-d');
                    $pay->end_date = date('Y-m-d', strtotime($list_type->duration . ' days'));
                    $pay->amount = $property_price;
                    $pay->save();
                    if ($request->status == 10) {
                        $list->status = $request->status;
                    }
                } else {
                    return $this->formatResponse(false, 'Insufficient balance !', 'admin.property.index');
                }

            }

            if ($request->status != 10) {
                $list->status = $request->status;
            } else if ($list->payment_status == 1 || $list->getUser->user_type == 5) {
                $list->status = $request->status;
                $list->payment_status = 1;
            } else {
                return $this->formatResponse(false, 'Payment required !', 'admin.property.index');
            }

            $list->update();

            $property_size = $request->size;
            ListingVariants::where('f_listing_no', $id)->delete();
            foreach ($property_size as $key => $item) {
                $data = array(
                    'f_listing_no' => $list->id,
                    'property_size' => $request->size[$key],
                    'bedroom' => $request->bedroom[$key],
                    'bathroom' => $request->bathroom[$key],
                    'total_price' => $request->price[$key],
                    'is_default' => $key == 0,
                );
                ListingVariants::insert($data);
            }

            // SEO
            $seo = $list->listingSEO;
            if (!$seo) {
                $seo = new ListingSEO();
                $seo->f_listing_no = $list->id;
            }
            $seo->meta_title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_url = $request->meta_url;

            if ($request->hasFile('seo_image')) {
                if ($seo->og_image_path) {
                    $this->removeFile($seo->OG_IMAGE_PATH);
                }
                $image = $request->file('seo_image')[0];
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = 'uploads/listings/' . $list->id . '/seo/';
                $image->move($image_path, $image_name);
                $seo->og_image_path = $image_path . $image_name;
            }
            $seo->save();

            // for image upload
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name2 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $waterMarkUrl = public_path('assets/img/logo.png');

                    $destinationPath = public_path('/uploads/listings/' . $list->id . '/');
                    $destinationPath2 = public_path('/uploads/listings/' . $list->id . '/thumb');

                    if (!file_exists($destinationPath2)) {
                        mkdir($destinationPath2, 0755, true);
                    }
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $thumb_img = Image::make($image->getRealPath());
                    $thumb_img->backup();
                    $thumb_img->resize(172, 115, function ($constraint) {
                    });
                    $thumb_img->save($destinationPath2 . '/' . $name2);
                    $thumb_img->reset();
                    $thumb_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $thumb_img->save($destinationPath . '/' . $name);

                    ListingImages::create([
                        'f_listing_no' => $list->id,
                        'image_path' => '/uploads/listings/' . $id . '/' . $name,
                        'image' => $name,
                        'thumb_path' => '/uploads/listings/' . $list->id . '/thumb/' . $name2,
                        'thumb' => $name2,
                    ]);
                }
            }

            //  for features
            $features = ListingAdditionalInfo::where('f_listing_no', $request->id)->first();
            $features->f_listing_no = $list->id;
            $features->f_facing_no = $request->facing;
            $features->handover_date = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->description = $request->description;
            $features->location_map = $request->map_url;
            $features->video_code = $request->videoURL;
            $features->f_feature_nos = json_encode($request->features);
            $features->f_nearby_nos = json_encode($request->nearby);
            $features->update();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Listings not updated !', 'admin.property.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Listings has been updated successfully !', 'admin.property.index');

    }



}
