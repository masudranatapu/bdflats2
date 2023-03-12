<?php

namespace App\Models;

use App\Models\City;
use App\Models\PropertyCondition;
use Carbon\Carbon;
use App\Models\Area;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listings extends Model
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

    public function getDefaultThumb()
    {
        return $this->hasOne('App\Models\ListingImages', 'f_listing_no', 'id')->where('is_default', 1);
    }

      public function getDefaultVariant()
    {
        return $this->hasOne('App\Models\ListingVariants', 'f_listing_no', 'id')->where('is_default', 1);
    }

    public function images()
    {
        return $this->hasMany('App\Models\ListingImages', 'f_listing_no', 'id');
    }

    public function additionalInfo()
    {
        return $this->hasOne('App\Models\ListingAdditionalInfo', 'f_listing_no', 'id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner', 'f_user_no', 'id');
    }

    public function getListingVariant()
    {
        return $this->hasOne('App\Models\ListingVariants', 'f_listing_no', 'id')->where('prd_listing_variants.is_default', 1);
    }

    public function viewCount()
    {
        return $this->hasMany('App\Models\ListingView', 'F_PRD_LISTING_NO', 'id');
    }

    public function getListingVariants()
    {
        return $this->hasMany('App\Models\ListingVariants', 'f_listing_no', 'id');
    }

    // Variants except default
    public function variants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ListingVariants', 'f_listing_no', 'id')
            ->where('is_default', '=', 0);
    }

    public function listingType(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ListingType', 'id', 'f_listing_type')
            ->leftJoin('ss_listing_price', 'ss_listing_price.f_listing_type_no', '=', 'prd_listing_type.id');
    }

    public function seoInfo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ListingSEO', 'f_listing_no', 'id');
    }

    public function getFeatureListings()
    {
        $limit = WebSetting::where('id', 1)->first('feature_property_limit')->feature_property_limit;
        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('status', '=', 10)
            ->whereIn('f_listing_type', [2, 4])
            ->take($limit)
            ->get();
    }

    public function getVerifiedListings()
    {
        $limit = WebSetting::where('id', 1)->first('verified_property_limit')->verified_property_limit;
        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('status', '=', 10)
            ->where('is_verified', '=', 1)
            ->take($limit)
            ->get();
    }

    public function getListings($for)
    {
        $limit = WebSetting::where('id', 1)->first(['sale_property_limit', 'rent_property_limit', 'roommate_property_limit']);
        switch ($for) {
            case 'sale':
                $limit = $limit->salte_property_limit;
                break;
            case 'rent':
                $limit = $limit->rent_property_limit;
                break;
            default:
                $limit = $limit->roommate_property_limit;
        }

        return Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('status', '=', 10)
            ->where('property_for', '=', $for)
            ->take($limit)
            ->get();
    }

    public function getSimilarListings($for, $id)
    {
        $limit = WebSetting::where('id', 1)->first('similar_property_limit')->similar_property_limit;
        $listings = Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('status', '=', 10)
            ->where('id', '!=', $id)
            ->where('property_for', '=', $for)
            ->take($limit)
            ->orderByDesc('id')
            ->get();

        if ($listings->count() < $limit) {
            $type = $this->getListing($id);
            $same_type = Listings::with(['getDefaultThumb', 'getListingVariant'])
                ->where('status', '=', 10)
                ->where('f_property_type_no', '=', $type->f_property_type_no)
                ->whereNotIn('id', $listings->pluck('id'))
                ->orderByDesc('id')
                ->take($limit - $listings->count())
                ->get();

            if ($same_type->count()) {
                $listings = $listings->merge($same_type);
            }

//            dd('ok');
            $this->listingByArea($type->f_area_no, $limit, $listings);
        }


        return $listings;
    }

    private function listingByArea($area_id, $limit, &$listing)
    {
        if ($listing->count() >= $limit) {
            return;
        }

        $listings = Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('status', '=', 10)
            ->where('f_area_no', '=', $area_id)
            ->get();

        if ($listings->count()) {
            $listing = $listing->merge($listings);
        }

        $parent = Area::where('id', $area_id)->first();
        if (!$parent) {
            return;
        }

        $parent = $parent->F_PARENT_AREA_NO;
        $this->listingByArea($parent, $limit, $listing);
    }

    public function getListingDetails($url_slug)
    {

        if (Auth::check() && Auth::user()->user_type == 1) {
            $user_id = Auth::id();
            $listing = Listings::with(['images', 'getListingVariant', 'variants', 'additionalInfo', 'owner'])
                ->select('prd_listings.*', 'acc_listing_lead_payments.purchase_date')
                ->leftJoin('acc_listing_lead_payments', function ($join) use ($user_id) {
                    $join->on('prd_listings.id', '=', 'acc_listing_lead_payments.f_listing_no');
                    $join->where('acc_listing_lead_payments.f_user_no', $user_id);
                })
                ->where('status', '=', 10)
                ->where('url_slug', '=', $url_slug)
                ->first();
        } else {
            $listing = Listings::with(['images', 'getListingVariant', 'variants', 'additionalInfo', 'owner'])
                ->select('prd_listings.*')
                ->where('status', '=', 10)
                ->where('url_slug', '=', $url_slug)
                ->first();
        }

        if (!$listing) {
            abort(404);
        }
        if (Auth::check()) {
            $today = date('Y-m-d');
            // dd($today);
            $user_id = Auth::id();
            $check_old = BrowsedProperty::where('f_user_no', $user_id)->where('f_listing_no', $listing->id)->orderBy('id', 'DESC')->first();
            if ($check_old) {
                $last_date = date('Y-m-d', strtotime($check_old->last_browes_time));
                if ($last_date == $today) {
                    BrowsedProperty::where('id', $check_old->id)->increment('counter', 1);
                } else {
                    $bp = new BrowsedProperty();
                    $bp->f_user_no = $user_id;
                    $bp->f_listing_no = $listing->id;
                    $bp->counter = 1;
                    $bp->last_browes_time = date('Y-m-d H:i:s');
                    $bp->save();
                }

            } else {
                $bp = new BrowsedProperty();
                $bp->f_user_no = $user_id;
                $bp->f_listing_no = $listing->id;
                $bp->counter = 1;
                $bp->last_browes_time = date('Y-m-d H:i:s');
                $bp->save();
            }


        }

        return $listing;
    }

    public function getListingFeatures($features)
    {
        return ListingFeatures::query()->whereIn('id', json_decode($features) ?? [])->get();
    }

    public function getProperties(Request $request, $type = null, $cat = null, $city = null): LengthAwarePaginator
    {
        $listings = Listings::with(['getDefaultThumb', 'getListingVariant'])
            ->where('prd_listings.status', '=', 10)
            ->select('prd_listings.id', 'prd_listings.property_type', 'prd_listings.code', 'prd_listings.property_for', 'prd_listings.address', 'prd_listings.property_condition', 'prd_listings.title', 'prd_listings.city_name', 'prd_listings.area_name', 'v.total_price', 'prd_listings.user_type', 'prd_listings.is_verified', 'prd_listings.is_top', 'prd_listings.url_slug', 'prd_listings.f_listing_type')
            ->leftJoin('prd_listing_variants as v', function ($join) {
                $join->on('v.f_listing_no', '=', 'prd_listings.id');
                $join->on('v.is_default', '=', DB::raw(1));
            });

        $search = $request->query->get('search');
        if ($search) {
            $listings->where('prd_listings.title', 'LIKE', '%' . $search . '%');
            $listings->orWhere('prd_listings.city_name', 'LIKE', '%' . $search . '%');
            $listings->orWhere('prd_listings.area_name', 'LIKE', '%' . $search . '%');
            $listings->orWhere('prd_listings.code', 'LIKE', '%' . $search . '%');
        }

        if ($type && in_array($type, ['sale', 'rent', 'roommate'])) {
            $listings->where('property_for', '=', $type);
        }

        if ($cat) {
            $categories = PropertyType::query()->where('is_active', '=', 1)
                ->orderByDesc('order_id')
                ->pluck('id', 'url_slug');
            if (isset($categories[$cat])) {
                $listings->where('prd_listings.f_property_type_no', $categories[$cat]);
            }
        }

        if ($city) {
            $cities = City::query()->pluck('id', 'city_name');
            if (isset($cities[$city])) {
                $listings->where('f_city_no', '=', $cities[$city]);
            }
        }

        $sortBy = $request->query('sort_by');
        $condition = $request->query('condition');
        $priceMin = $request->query('min_price');
        $priceMax = $request->query('max_price');
        $postedBy = $request->query('posted_by');
        $verified = $request->query('verified');
        $area = $request->query('area');

        if ($area > 0) {
            $listings->where('f_area_no', '=', $area);
        }

        if ($sortBy == 'desc') {
            $listings->orderByDesc('v.total_price');
        } else if ($sortBy == 'asc') {
            $listings->orderBy('v.total_price');
        }
        if ($verified == 1) {
            $listings->where('prd_listings.is_verified', '=', 1);
        }
        if ($condition) {
            $condition = explode(',', $condition);
            $listings->whereIn('prd_listings.f_property_condition', $condition);
        }
        if ($priceMin) {
            $listings->where('v.total_price', '>=', $priceMin);
        }
        if ($priceMax) {
            $listings->where('v.total_price', '<=', $priceMax);
        }
        if ($postedBy) {
            $postedBy = explode(',', $postedBy);
            $listings->whereIn('prd_listings.user_type', $postedBy);
        }

        $listings->orderByDesc('prd_listings.is_top')->orderByDesc('prd_listings.f_listing_type');
        return $listings->paginate(12);
    }

    public function getCreate($request): object
    {

        if(Auth::user()->user_type == '5'){
            $agent_area = DB::table('ss_agent_area')
                ->join('users', 'users.id', '=', 'ss_agent_area.f_user_no')
                ->select('f_city_no')
                ->groupBy('f_city_no')
                ->get();

            $cityArray = [];
            foreach ($agent_area as $key => $value) {
                $cityArray[$key] = $value->f_city_no;
            }
            $data['city'] = DB::table('ss_city')->orderBy('city_name','asc')->whereIn('id', $cityArray)->pluck('city_name', 'id');
        }else{
            $data['city'] = City::orderBy('city_name','asc')->pluck('city_name', 'id');
        }

        $data['property_type']      = PropertyType::orderBy('order_id', 'DESC')->pluck('property_type', 'id');
        $data['property_condition'] = PropertyCondition::where('is_active', 1)->pluck('prod_condition', 'id');
        $data['property_facing']    = PropertyFacing::where('is_active', 1)->pluck('title', 'id');
        $data['property_listing_type'] = PropertyListingType::where('is_active', 1)->pluck('name', 'id');
        $data['listing_feature']    = ListingFeatures::where('is_active', 1)->get();
        $data['nearby']             = NearBy::where('is_active', 1)->get();
        $data['floor_list']         = FloorList::where('is_active', 1)->pluck('name', 'id');

        return $this->formatResponse(true, '', '', $data);
    }

    public function store($request): object
    {
        if (Auth::user()->total_listing >= Auth::user()->listing_limit) {
            return $this->formatResponse(false, 'Your listings limit is overed !', 'listings.create');
        }

        DB::beginTransaction();
        try {

            if ($request->p_type == 'A') {
                $floors = $request->floor;
                $floor_available = json_encode($request->floor_available);
            } else if ($request->p_type == 'B') {
                $floors = $request->floor;
                $floor_available = json_encode($request->floor_available);
            } else {
                $floors = null;
                $floor_available = null;
            }

            $slug = Str::slug($request->property_title);
            $check = Listings::where('url_slug', $slug)->first();
            if ($check) {
                $sku = Listings::max('CODE') + 1;
                $slug = $slug . '-' . $sku;
            }

            $list = new Listings();
            $list->f_user_no = Auth::id();
            $list->user_type = Auth::user()->user_type;
            $list->property_for = $request->property_for;
            $list->f_property_type_no = $request->property_type;
            $list->f_city_no = $request->city;
            $list->f_area_no = $request->area;
            $list->f_subarea_no = $request->sub_area;
            $list->address = $request->address;
            $list->house = $request->house;
            $list->road = $request->road;
            $list->f_property_condition = $request->condition;
            $list->title = $request->property_title;
            $list->url_slug = $slug;
            $list->price_type = $request->property_price;
            $list->contact_person1 = $request->contact_person;
            $list->contact_person2 = $request->contact_person_2;
            $list->mobile1 = $request->mobile;
            $list->mobile2 = $request->mobile_2;
            $list->mobile3 = $request->mobile_3;
            $list->f_listing_type = $request->listing_type;
            $list->total_floors = $floors; $list->FLOORS_AVAIABLE = $floor_available;
            $list->created_at = Carbon::now();
            $list->created_by = Auth::id();
            $list->save();

            //for store listing variants
            $property_size = $request->size;
            foreach ($property_size as $key => $item) {

                if ($request->p_type == 'A') {
                    $bedroom = $request->bedroom[$key];
                    $bathroom = $request->bathroom[$key];
                    // $balcony = $request->balcony[$key];
                } elseif ($request->p_type == 'B') {
                    $bedroom = 0;
                    $bathroom = 0;
                    // $balcony = 0;
                } else {
                    $bedroom = 0;
                    $bathroom = 0;
                    // $balcony = 0;
                }

                if ($key == 0) {
                    $is_default = 1;
                } else {
                    $is_default = 0;
                }

                $data = array(
                    'f_listing_no' => $list->id,
                    'property_size' => $request->size[$key],
                    // 'BALCONY' => $balcony,
                    'bedroom' => $bedroom,
                    'bathroom' => $bathroom,
                    'total_price' => $request->price[$key],
                    'car_parking' => $request->car_parking[$key],
                    'land_area' => $request->land_area[$key],
                    'total_price' => $request->price[$key],
                    'is_default' => $is_default,
                );
                ListingVariants::insert($data);
            }

            //            for image upload
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name2 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name3 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name4 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $waterMarkUrl = public_path('assets/img/logo.png');

                    $destinationPath = public_path('/uploads/listings/' . $list->id . '/');
                    $destinationPath2 = public_path('/uploads/listings/' . $list->id . '/thumb');
                    $destinationPath3 = public_path('/uploads/listings/' . $list->id . '/og_image');
                    $destinationPath4 = public_path('/uploads/listings/' . $list->id . '/small_img');

                    if (!file_exists($destinationPath2)) {
                        mkdir($destinationPath2, 0755, true);
                    }
                    if (!file_exists($destinationPath3)) {
                        mkdir($destinationPath3, 0755, true);
                    }
                    if (!file_exists($destinationPath4)) {
                        mkdir($destinationPath4, 0755, true);
                    }

                    $thumb_img = Image::make($image->getRealPath());

                    $thumb_img->backup();

                    $thumb_img->resize(226, 151, function ($constraint) {
                    });
                    $thumb_img->save($destinationPath2 . '/' . $name2);

                    $thumb_img->reset();

                    $thumb_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $thumb_img->save($destinationPath . '/' . $name);

                    $og_img = Image::make($image->getRealPath());

                    $og_img->backup();

                    $og_img->resize(300, 180, function ($constraint) {
                    });
                    $og_img->save($destinationPath3 . '/' . $name3);

                    $og_img->reset();

                    $og_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $og_img->save($destinationPath . '/' . $name);

                    $sm_img = Image::make($image->getRealPath());

                    $sm_img->backup();

                    $sm_img->resize(200, 130, function ($constraint) {
                    });
                    $sm_img->save($destinationPath4 . '/' . $name4);

                    $sm_img->reset();

                    $sm_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $sm_img->save($destinationPath . '/' . $name);

                    if ($key == 0) {
                        $is_default = 1;
                    } else {
                        $is_default = 0;
                    }

                    ListingImages::create([
                        'f_listing_no' => $list->id,
                        'image_path' => '/uploads/listings/' . $list->id . '/' . $name,
                        'image' => $name,
                        'thumb_path' => '/uploads/listings/' . $list->id . '/thumb/' . $name2,
                        'thumb' => $name2,
                        'og_path' => '/uploads/listings/' . $list->id . '/og_image/' . $name3,
                        'og_image' => $name3,
                        'sm_path' => '/uploads/listings/' . $list->id . '/small_img/' . $name4,
                        'sm_image' => $name4,
                        'is_default' => $is_default,
                    ]);
                }
            }

            //            for features
            $features = new ListingAdditionalInfo();
            $features->f_listing_no = $list->id;
            $features->f_facing_no = $request->facing;
            $features->handover_date = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->description = $request->description;
            $features->location_map = $request->map_url;
            $features->video_code = $request->videoURL;
            $features->f_feature_nos = json_encode($request->features);
            $features->f_nearby_nos = json_encode($request->nearby);
            $features->save();

        } catch (\Exception $e) {
//                         dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not added successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings added successfully !', 'owner-listings');
    }

    public function postUpdate($request, $id): object
    {
        DB::beginTransaction();
        try {
            $list = $this->getListing($id);
            $list->property_for = $request->property_for;
            $list->f_property_type_no = $request->property_type;
            $list->payment_auto_renew = $request->payment_auto_renew;
            $list->f_city_no = $request->city;
            $list->f_area_no = $request->area;;
            $list->f_subarea_no = $request->sub_area;;
            $list->address = $request->address;
            $list->f_property_condition = $request->condition;
            $list->title = $request->property_title;
            $list->price_type = $request->property_price;
            $list->contact_person1 = $request->contact_person;
            $list->contact_person2 = $request->contact_person_2;
            $list->mobile1 = $request->mobile;
            $list->mobile2 = $request->mobile_2;
            $list->f_listing_type = $request->listing_type;
            $list->total_floors = $request->floor; $list->FLOORS_AVAIABLE = json_encode($request->floor_available);
            $list->modified_by = Auth::user()->id;
            $list->modified_at = Carbon::now();
            $list->update();

            //            for store listing variants



            $property_size = $request->size;
            ListingVariants::where('f_listing_no', $id)->delete();
            foreach ($property_size as $key => $item) {
                if ($key == 0) {
                    $is_default = 1;
                } else {
                    $is_default = 0;
                }

                $data = array(
                    'f_listing_no'  => $id,
                    'property_size' => $request->size[$key],
                    'bedroom'       => $request->bedroom[$key],
                    'bathroom'      => $request->bathroom[$key],
                    'total_price'   => $request->price[$key],
                    'is_default'    => $is_default,
                );
                ListingVariants::insert($data);
            }

            $check_def_img = ListingImages::where('f_listing_no', $id)->where('is_default',1)->first();

            //            for image upload
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    //                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    //                    $image->move(public_path() . '/uploads/listings/'.$id.'/', $name);

                    $name = uniqid() . '.' . $image->getClientOriginalExtension();
                    $name2 = uniqid() . '.' . $image->getClientOriginalExtension();
                    $waterMarkUrl = public_path('assets/img/logo.png');

                    $destinationPath = public_path('/uploads/listings/' . $id . '/');
                    $destinationPath2 = public_path('/uploads/listings/' . $id . '/thumb');

                    if (!file_exists($destinationPath2)) {
                        mkdir($destinationPath2, 0755, true);
                    }

                    $thumb_img = Image::make($image->getRealPath());

                    $thumb_img->backup();

                    $thumb_img->resize(226, 151, function ($constraint) {
                    });
                    $thumb_img->save($destinationPath2 . '/' . $name2);

                    $thumb_img->reset();

                    $thumb_img->insert($waterMarkUrl, 'bottom-left', 5, 5);
                    $thumb_img->save($destinationPath . '/' . $name);

                    if($check_def_img == null ){
                        $is_default = 1;

                    }else{
                        if ($key == 0) {
                            $is_default = 1;
                        } else {
                            $is_default = 0;
                        }
                    }


                    ListingImages::create([
                        'f_listing_no' => $id,
                        'image_path' => '/uploads/listings/' . $id . '/' . $name,
                        'image' => $name,
                        'thumb_path' => '/uploads/listings/' . $id . '/thumb/' . $name2,
                        'thumb' => $name2,
                        'is_default'    => $is_default,
                    ]);
                }
            }

            // for features
            $features = ListingAdditionalInfo::where('f_listing_no', $id)->first();
            $features->f_facing_no   = $request->facing;
            $features->handover_date = Carbon::parse($request->handover_date)->format('Y-m-d H:i:s');
            $features->description   = $request->description;
            $features->location_map  = $request->map_url;
            $features->video_code    = $request->videoURL;
            $features->f_feature_nos = json_encode($request->features);
            $features->f_nearby_nos  = json_encode($request->nearby);
            $features->update();
        } catch (\Exception $e) {
            DB::rollback();
            //  dd($e);
            return $this->formatResponse(false, 'Your listings not updated !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings updated successfully !', 'owner-listings');
    }

    public function getEdit($id): object
    {
        $data['row'] = Listings::find($id);
        $data['row2'] = ListingAdditionalInfo::where('f_listing_no', $id)->first();
        $data['row3'] = ListingVariants::where('f_listing_no', $id)->get();
        $data['row4'] = ListingImages::where('f_listing_no', $id)->get();
        $data['property_type'] = PropertyType::pluck('property_type', 'id');
        $data['city'] = City::pluck('city_name', 'id');
        $data['area'] = Area::where('f_city_no', $data['row']->f_city_no)->pluck('area_name', 'id');
        $data['subarea'] = Area::where('f_parent_area_no', $data['row']->f_area_no)->pluck('area_name', 'id');
        $data['property_condition'] = PropertyCondition::where('is_active', 1)->pluck('prod_condition', 'id');
        $data['property_facing'] = PropertyFacing::where('is_active', 1)->pluck('title', 'id');
        $data['property_listing_type'] = PropertyListingType::where('is_active', 1)->pluck('name', 'id');
        $data['listing_feature'] = ListingFeatures::where('is_active', 1)->pluck('title', 'id');
        $data['nearby'] = NearBy::where('is_active', 1)->pluck('title', 'id');
        $data['floor_list'] = FloorList::where('is_active', 1)->pluck('name', 'id');
        return $this->formatResponse(true, '', '', $data);
    }

    public function postDelete($id): object
    {
        DB::beginTransaction();
        try {
            $listing = $this->getListing($id);
            $listing->STATUS = 4;
            $listing->save();

            //            ListingVariants::where('f_listing_no',$id)->delete();

            //            $images = ListingImages::where('f_listing_no', $id)->get();
            //            foreach ($images as $item) {
            //                if (\File::exists(public_path($item->IMAGE_PATH))) {
            //                    \File::delete(public_path($item->IMAGE_PATH));
            //                }
            //                if (\File::exists(public_path($item->THUMB_PATH))) {
            //                    \File::delete(public_path($item->THUMB_PATH));
            //                }
            //            }
            //            ListingImages::where('f_listing_no', $id)->delete();
            //
            //            ListingAdditionalInfo::where('f_listing_no', $id)->delete();

        } catch (\Exception $e) {
            //             dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your listings not updated successfully !', 'listings.create');
        }
        DB::commit();

        return $this->formatResponse(true, 'Your listings updated successfully !', 'owner-listings');
    }

    public function getLatest(int $limit)
    {
        return Listings::with(['getDefaultThumb', 'listingType', 'getDefaultVariant'])
            ->where('f_user_no', '=', Auth::id())
            ->where('status', '!=', 4)
            ->latest()
            ->paginate($limit);
    }

    public function getListing($id)
    {
        return Listings::with(['listingType'])
            ->where('status', '!=', 4)
            ->find($id);
    }

    public function storePayment($id)
    {
        $status = false;
        $msg = 'Payment unsuccessful !';

        $user = Auth::user();
        DB::beginTransaction();
        try {
            $listing = $this->getListing($id);
            $type = $listing->property_for;
            $price = 0;
            if ($type == 'sale') {
                $price = $listing->listingType->sell_price ?? 0;
            } else if ($type == 'rent') {
                $price = $listing->listingType->rent_price ?? 0;
            } else if ($type == 'roommate') {
                $price = $listing->listingType->roommate_price ?? 0;
            }

            if ($user->unused_topup - $price >= 0) {
                $payment = new PaymentUsed();
                $payment->f_customer_no = Auth::id();
                $payment->f_listing_no = $listing->id;
                $payment->amount = $price;
                $payment->start_date = Carbon::now();
                $payment->end_date = Carbon::now()->addDays($listing->listingType->duration);
                $payment->save();

                $status = true;
                $msg = 'Payment successful !';
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();

        $url = 'owner-listings';
        if ($user->user_type == 3) {
            $url = 'developer-listings';
        }
        return $this->formatResponse($status, $msg, $url);
    }
}
