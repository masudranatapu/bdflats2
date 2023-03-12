<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccLeadPayment extends Model
{
    use RepoResponse;

    protected $table = 'acc_lead_payments';
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'modified_at';

    public function developerLeadPay($request, $id): object
    {

        DB::beginTransaction();
        try {
            $listing = Listings::find($id);

            $payment = new AccLeadPayment();
            $payment->f_company_no      = $listing->f_user_no;
            $payment->f_user_no         = Auth::id();
            $payment->f_lead_share_no   = $request->f_lead_share_no;
            $payment->f_requirement_no  = $request->f_requirement_no;
            $payment->amount            = $request->price;
            $payment->purchase_date     = date('Y-m-d H:i:s');
            $payment->created_by        = Auth::id();
            $payment->modified_by       = Auth::id();
            $payment->save();

        }catch (\Exception $e){
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Payment not successful !', 'home');
        }
        DB::commit();
        return $this->formatResponse(true, 'Payment successful !', 'home');

    }

}
