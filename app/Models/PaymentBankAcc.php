<?php

namespace App\Models;

use Str;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentBankAcc extends Model
{
    use RepoResponse;

    protected $table = 'acc_payment_bank_acc';
    protected $fillable = ['code', 'bank_name'];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }

    public function entryBy()
    {
        return $this->belongsTo('App\Models\Auth', 'f_ss_created_by');
    }

    public function method()
    {
        return $this->belongsTo('App\Models\AccountMethod', 'f_payment_method_no');
    }

    public static function getAllPaymentBanks()
    {
        $data = PaymentBankAcc::select('id', 'bank_name', 'bank_acc_name')
            ->where('IS_ACTIVE', 1)
            // ->where('F_USER_NO','!=',Auth::user()->id)
            ->get();
        $array = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $array[$value->id] = $value->bank_acc_name . ' (' . $value->bank_name . ')';
            }
        }
        return $array;
    }

    public static function getFilterPaymentBanks()
    {
        $data = PaymentBankAcc::select('id', 'bank_name', 'bank_acc_name');
        if (Auth::user()->f_parent_user_id > 0) {
            $data = $data->where('f_user_no', Auth::user()->f_parent_user_id);
        }
        $data = $data->get();

        $array = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $array[$value->id] = $value->bank_acc_name . ' (' . $value->bank_name . ')';
            }
        }
        return $array;
    }


    public function getPaginatedList($request, int $per_page = 5): object
    {
        $data = PaymentBankAcc::orderBy('bank_name', 'asc')->get();
        //dd($data);
        return $this->formatResponse(true, '', 'admin.payment_bank.list', $data);
    }

    public function postStore($request): object
    {
        DB::beginTransaction();
        try {
            $code = PaymentBankAcc::max('code');

            if (!$code) {
                $code = 100;
            }
            $code++;
            $account = new PaymentBankAcc();
            $account->code = $code;
            $account->bank_name = $request->bank_name;
            $account->bank_acc_name = $request->bank_acc_name;
            $account->bank_acc_no = $request->bank_acc_no;
            $account->is_active = $request->status;
            $account->comments = $request->comment;
            $account->f_payment_method_no = $request->payment_method;
            $account->save();
        } catch (\Exception $e) {

            DB::rollback();
            dd($e);
            return $this->formatResponse(false, $e->getMessage(), 'admin.payment_acc.list');
        }

        DB::commit();
        return $this->formatResponse(true, 'Payment account has been created successfully !', 'admin.payment_acc.list');
    }

    public function postUpdate($request, $id)
    {
        DB::beginTransaction();
        try {
            $account = PaymentBankAcc::find($id);
            $account->bank_name = $request->bank_name;
            $account->bank_acc_name = $request->bank_acc_name;
            $account->bank_acc_no = $request->bank_acc_no;
            $account->is_active = $request->status;
            $account->comments = $request->comment;
            $account->f_payment_method_no = $request->payment_method;
            $account->save();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, $e->getMessage(), 'admin.payment_acc.list');
        }

        DB::commit();
        return $this->formatResponse(true, 'Payment account has been updated successfully !', 'admin.payment_acc.list');
    }
}
