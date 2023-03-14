<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Transaction;
use App\Traits\RepoResponse;
use App\Models\PaymentCustomer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, RepoResponse;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getPaginatedList($request)
    {
        $data = User::with(['propertyRequirement'])
            ->where('status', '!=', 3)
            ->where('user_type', 1)
            ->orderBy('name', 'asc')
            ->get();
        return $this->formatResponse(true, '', 'admin.customer.index', $data);
    }



    public function getEdit(int $id)
    {
        $data = User::where('id', $id)->first();

        if (!empty($data)) {

            return $this->formatResponse(true, '', 'admin.seeker.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.seeker.list', null);
    }

    public function postUpdate($request): object
    {
        DB::beginTransaction();
        try {
            if ($request->id) {
                $list = ProductRequirements::find($request->id);
            } else {
                $list = new ProductRequirements();
                $list->created_by = Auth::id();
            }

            $rc = $request->condition;
            $cond = [];
            $condF = [];
            if (!$rc) {
                $rc = [];
            }
            foreach ($rc as $item) {
                $item = explode(',', $item);
                //      $condF[] = intval($item[0]);
                $condF[] = "$item[0]";
                $cond[] = $item[1];
            }

            $list->property_for         = $request->itemCon;
            $list->f_city_no            = $request->city;
            $list->f_areas              = json_encode($request->area);
            $list->f_property_type_no   = $request->property_type;
            $list->min_size             = $request->minimum_size;
            $list->max_size             = $request->maximum_size;
            $list->min_budget           = $request->minimum_budget;
            $list->max_budget           = $request->maximum_budget;
            $list->bedroom              = json_encode($request->rooms);
            $list->property_condition   = json_encode($cond);
            $list->f_property_condition = json_encode($condF);
            $list->requirement_details  = $request->requirement_details;
            $list->prep_cont_time       = $request->time;
            $list->max_sharing_permission = $request->max_sharing_permission;
            $list->email_alert          = $request->alert;
            $list->is_verified          = $request->v_status;
            $list->modified_by          = Auth::id();
            $list->f_user_no            = $request->user_id;
            $list->lead_price    = $request->lead_price;

            if ($request->v_status == 1 && $request->acc_status == 1) {
                $list->f_verified_by    = Auth::id();
                $list->verified_at      = date('Y-m-d H:i:s');
            }

            $list->save();

            $user = User::where('id', $request->user_id)->first();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->address      = $request->address;
            $user->mobile_no    = $request->mobile;
            $user->status       = $request->acc_status;
            $user->update();

            //share to developer company
            if ($request->v_status == 1 && $request->acc_status == 1) {
                $req = ProductRequirements::find($list->id);
                $property_for       = $req->PROPERTY_FOR;
                $property_type      = $req->f_property_type_no;
                $size_min           = $req->min_size - 1000;
                $size_max           = $req->max_size + 1000;
                $property_condition = json_decode($req->f_property_condition);
                $area_nos = json_decode($req->f_areas);


                $listings =  Product::select('prd_listings.id', 'prd_listings.f_user_no', 'prd_listing_variants.property_size')
                    ->join('prd_listing_variants', 'prd_listing_variants.f_listing_no', 'prd_listings.id')
                    ->join('users', 'users.id', 'prd_listings.f_user_no')
                    ->where('prd_listings.status', 10)
                    ->where('prd_listings.payment_status', 1)
                    ->where('prd_listings.property_for', $property_for)
                    ->where('prd_listings.f_property_type_no', $property_type)
                    ->whereIn('prd_listings.f_area_no', $area_nos)
                    ->whereBetween('prd_listing_variants.property_size', [$size_min, $size_max]);
                if ($property_condition) {
                    $listings->whereIn('prd_listings.f_property_condition', $property_condition);
                }
                $listings = $listings->where('users.status', 1)
                    ->groupBy('prd_listings.id')
                    ->orderBy('prd_listings.modified_at', 'desc')
                    ->get();
                if ($listings && count($listings) > 0) {
                    $max_share = 0;
                    foreach ($listings as $key => $value) {
                        DB::table('prd_lead_share_map')->where('f_user_no', $list->f_user_no)->where('f_company_no', $value->f_user_no)->where('status', 0)->where('lead_type', 0)->delete();
                        $check_old = DB::table('prd_lead_share_map')->where('f_user_no', $list->f_user_no)->where('f_company_no', $value->f_user_no)->first();
                        if ($check_old == null) {
                            $order_id = 1 + $key;
                            $max_share++;
                            DB::table('prd_lead_share_map')->insert([
                                'f_requirement_no'  => $req->id,
                                'f_user_no'         => $req->f_user_no,
                                'created_at'        => date('Y-m-d H:i:s'),
                                'created_by'        => Auth::id(),
                                'f_company_no'      => $value->f_user_no,
                                'f_listing_no'      => $value->id,
                                'status'            => 0,
                                'order_id'          => $order_id
                            ]);

                            if ($max_share > $list->max_sharing_permission) {
                                break;
                            }
                        }
                    }
                }
            }
            //END share to developer company


        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            if ($request->id) {
                return $this->formatResponse(false, 'Property Seeker not updated successfully !', 'admin.seeker.list');
            } else {
                return $this->formatResponse(false, 'Property Seeker not created successfully !', 'admin.seeker.list');
            }
        }

        DB::commit();
        if ($request->id) {
            return $this->formatResponse(true, 'Property Seeker Updated successfully !', 'admin.seeker.list');
        } else {
            return $this->formatResponse(true, 'Property Seeker Created successfully !', 'admin.seeker.list');
        }
    }

    public function getCustomerPayment($id)
    {
        try {
            $data = Transaction::where('F_CUSTOMER_NO', $id)->get();
        } catch (\Throwable $th) {
            return $this->formatResponse(fasle, 'Data not found', 'admin.seeker.list');
        }
        return $this->formatResponse(true, 'Payment list found successfully !', 'admin.seeker.list', $data);
    }

    public function postRecharge($request, int $id): object
    {
        $status = false;
        $msg = 'Recharge not successful!';

        DB::beginTransaction();
        try {
            $payment = new PaymentCustomer();
            $payment->f_customer_no = $id;
            $payment->amount = $request->amount;
            $payment->f_acc_payment_bank_no = $request->payment_account ?? 4;
            $payment->payment_confirmed_status = 1;
            $payment->payment_note = $request->note;
            $payment->payment_date = date('Y-m-d', strtotime($request->payment_date));
            $payment->payment_type = $request->payment_type;
            $payment->slip_number = $request->slip_number;

            if ($request->hasFile('images')) {
                $file = $request->file('images')[0];
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                $file_path = 'uploads/attachments/' . $id . '/';
                $file->move(public_path($file_path), $file_name);

                $payment->attachment_path = $file_path . $file_name;
            }
            $payment->save();

            $status = true;
            $msg = 'Recharge successful!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.seeker.payment');
    }

    public function getCustomerTxn($id): object
    {
        try {
            $data = Transaction::with(['payment'])->where('f_customer_no', $id)->get();
        } catch (\Throwable $th) {
            return $this->formatResponse(false, 'Data not found', 'admin.seeker.list');
        }
        return $this->formatResponse(true, 'Payment list found successfully !', 'admin.seeker.list', $data);
    }
}
