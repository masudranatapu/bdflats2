<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table        = 'PRD_LISTINGS';
    protected $primaryKey   = 'PK_NO';
    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'MODIFIED_AT';


    protected $fillable = [
        'CODE',
        'PROPERTY_FOR',
        'F_PROPERTY_TYPE_NO',
        'PROPERTY_TYPE',
        'ADDRESS',
        'PROPERTY_CONDITION',
        'F_PROPERTY_CONDITION',
        'PROPERTY_SIZE',
        'BEDROOM',
        'BATHROOM',
        'TOTAL_PRICE',
        'PRICE_TYPE',
        'TITLE',
        'URL_SLUG',
        'F_CITY_NO',
        'CITY_NAME',
        'F_AREA_NO',
        'AREA_NAME',
        'F_USER_NO',
        'USER_TYPE',
        'IS_EXPAIRED',
        'EXPAIRED_AT',
        'CONTACT_PERSON1',
        'CONTACT_PERSON2',
        'MOBILE1',
        'MOBILE2',
        'F_LISTING_TYPE',
        'LISTING_TYPE',
        'F_PREP_TENANT_NO',
        'PREP_TENANT',
        'AVAILABLE_FROM',
        'GENDER',
        'IS_VERIFIED',
        'VERIFIED_BY',
        'VERIFIED_AT',
        'CREATED_AT',
        'CREATED_BY',
        'MODIFIED_AT',
        'MODIFIED_BY',
        'TOTAL_FLOORS',
        'FLOORS_AVAIABLE',
        'IS_FEATURE',
    ];

    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->CREATED_BY = $user->PK_NO;
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->MODIFIED_BY = $user->PK_NO;
           });
       }


    public function getUser() {
        return $this->belongsTo('App\Models\User', 'CREATED_BY')->withDefault();
    }

    public function listingOwner() {
        return $this->belongsTo('App\Models\User', 'F_USER_NO');
    }

    public function getListingView()
    {
        return $this->hasMany('App\Models\ListingView', 'F_PRD_LISTING_NO');
    }

    public function listingSEO(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ListingSEO', 'F_LISTING_NO', 'PK_NO');
    }



    // public function subcategory() {
    //     return $this->belongsTo('App\Models\SubCategory', 'F_PRD_SUB_CATEGORY_ID')->where('IS_ACTIVE',1)->orderBy('NAME','ASC');
    // }

    // public function brand() {
    //     return $this->belongsTo('App\Models\Brand', 'F_BRAND')->where('IS_ACTIVE',1)->orderBy('NAME','ASC');
    // }

    // public function productModel() {
    //     return $this->belongsTo('App\Models\ProductModel', 'F_MODEL')->where('IS_ACTIVE',1)->orderBy('NAME','ASC');
    // }

    // public function allDefaultPhotos() {
    //     return $this->hasMany('App\Models\ProdImgLib', 'F_PRD_MASTER_NO');
    // }


    // public function allVariantsProduct() {
    //     return $this->hasMany('App\Models\ProductVariant', 'F_PRD_MASTER_SETUP_NO')->where('IS_ACTIVE',1)->orderBy('VARIANT_NAME','ASC');
    // }

    // public function vatclass() {
    //     return $this->belongsTo('App\Models\VatClass', 'F_DEFAULT_VAT_CLASS')->where('IS_ACTIVE',1)->orderBy('NAME','ASC');
    // }










}
