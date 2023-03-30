<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountMethod extends Model
{
    protected $table 		= 'acc_payment_methods';


    protected $fillable = [
        'NAME'
    ];

    public function AccountSource() {
        return $this->belongsTo('App\Models\AccountSource');
    }


    public function getAllPaymentMethod($acc_source_id = null, $type=null){
        $response   = '';
        if($type == 'combo'){
            if ($acc_source_id != null) {
                $data = AccountMethod::where('f_acc_source_no',$acc_source_id)->where('is_active',1)->get();
            }else{
                $data  = AccountMethod::get();
            }

            if ($data && $data->count() > 0 ) {
                foreach ($data as $value) {
                    $code = '';
                    if($value->code){ $code = $value->code;}
                    $response .= '<option value="'.$value->id.'"  title="'.$value->code.'">'.$value->name.'</option>';
                }
            }else{

                $response .= '<option value="">No data found</option>';
            }

        }else{

            if ($acc_source_id != null) {
                $response = AccountMethod::where('is_active',1)->where('f_acc_source_no',$acc_source_id)->pluck('name', 'id');

            }else{
                $response = AccountMethod::where('is_active',1)->pluck('name', 'id');
            }


        }

        return $response;
    }







}
