<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RepoResponse;
use DB;

class PaymentMethod extends Model
{
    use RepoResponse;

    protected $table = 'acc_payment_methods';
    protected $primaryKey = 'id';
    public $timestamps = false;


    // public function postStore($request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $about              = new PaymentMethod();
    //         $about->NAME        = $request->payment_method_name;
    //         $about->IS_ACTIVE   = $request->status;
    //         $about->save();

    //     } catch (\Exception $e) {
    //         dd($e);
    //         DB::rollback();
    //         return $this->formatResponse(false, 'Unable to create Payment Method !', 'web.payment_method');
    //     }
    //     DB::commit();

    //     return $this->formatResponse(true, 'Payment Method been created successfully !', 'web.payment_method');
    // }

    public function postUpdate($request, $id)
    {

        DB::beginTransaction();
        try {
            $about              = PaymentMethod::where('id',$id)->first();
            $about->name        = $request->payment_method_name;
            $about->is_active   = $request->status;
            $about->update();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update Payment Method !', 'admin.payment_method.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Payment Method been updated successfully !', 'admin.payment_method.list');
    }

}
