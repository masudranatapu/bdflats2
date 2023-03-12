<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'SS_COUNTRY';

    public function getCountryCombo(){
        return Country::pluck('NAME', 'PK_NO');
    }

    public function state() {
        return $this->hasOne('App\Models\State', 'F_COUNTRY_NO', 'PK_NO');
    }

    public function getCountryComboWithCode()
    {
         $data = Country::select('PK_NO','NAME','DIAL_CODE')->get();
        //  $response = '<option value="">Select Country</option>';

        //     if ($data) {
        //         foreach ($data as $value) {
        //             $response .= '<option value="'.$value->PK_NO.'">'.$value->NAME.' ('.$value->DIAL_CODE.')</option>';
        //         }
        //     }else{
        //         $response .= '<option value="">No data found</option>';
        //     }
        return $data;
    }
}
