<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class ListingPrice extends Model
{
    use RepoResponse;
    protected $table = 'SS_LISTING_PRICE';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function postUpdate($request)
    {
//        dd($request->all());
        try{
            $listing_name1                                  = ListingType::where('id',1)->first();
            $listing_name1->name                            = $request->gl_sale_name0;
            $listing_name1->duration                        = $request->gl_duration0;
            $listing_name1->update();

            $listing_name2                                  = ListingType::where('id',2)->first();
            $listing_name2->name                            = $request->gl_sale_name1;
            $listing_name2->duration                        = $request->gl_duration1;
            $listing_name2->update();

            $listing_name3                                  = ListingType::where('id',3)->first();
            $listing_name3->name                            = $request->gl_sale_name2;
            $listing_name3->duration                        = $request->gl_duration2;
            $listing_name3->update();

            $listing_name4                                  = ListingType::where('id',4)->first();
            $listing_name4->name                            = $request->gl_sale_name3;
            $listing_name4->duration                        = $request->gl_duration3;
            $listing_name4->update();



            $listing_price1                                 = ListingPrice::where('f_listing_type_no',1)->first();
            $listing_price1->sell_price                    = $request->gl_sale_price0;
            $listing_price1->rent_price                     = $request->gl_rent_price0;
            $listing_price1->roommat_price                  = $request->gl_roommate_price0;
            $listing_price1->update();

            $listing_price2                                 = ListingPrice::where('f_listing_type_no',2)->first();
            $listing_price2->sell_price                    = $request->gl_sale_price1;
            $listing_price2->rent_price                     = $request->gl_rent_price1;
            $listing_price2->roommat_price                  = $request->gl_roommate_price1;
            $listing_price2->update();

            $listing_price3                                 = ListingPrice::where('f_listing_type_no',3)->first();
            $listing_price3->sell_price                    = $request->gl_sale_price2;
            $listing_price3->rent_price                     = $request->gl_rent_price2;
            $listing_price3->roommat_price                  = $request->gl_roommate_price2;
            $listing_price3->update();

            $listing_price4                                 = ListingPrice::where('f_listing_type_no',4)->first();
            $listing_price4->sell_price                    = $request->gl_sale_price3;
            $listing_price4->rent_price                     = $request->gl_rent_price3;
            $listing_price4->roommat_price                  = $request->gl_roommate_price3;
            $listing_price4->update();

            return $this->formatResponse(true, 'Price Updated Successfully', 'admin.listing_price.list');
        }catch (\Exception $e){
//            dd($e);
            return $this->formatResponse(false, 'Something Wrong', 'admin.listing_price.list');
        }
    }
}
