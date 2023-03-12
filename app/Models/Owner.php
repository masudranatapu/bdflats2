<?php

namespace App\Models;

use DB;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use RepoResponse;
    protected $table = 'users';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function info()
    {
        return $this->hasOne('App\Models\OwnerInfo', 'f_user_no', 'id');
    }

    public function listings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Listings', 'f_user_no', 'id')
            ->with(['getDefaultThumb', 'getListingVariant']);
    }


    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Property', 'f_user_no', 'id');
    }



    public function getFeatured($type, $limit = 12)
    {
        return Owner::with(['info'])
            ->where('user_type', '=', $type)
            ->where('is_feature', '=', 1)
            ->take($limit)
            ->get();
    }

    public function getOwner($slug)
    {
        return Owner::with(['info', 'listings' => function ($query) {
            $query->orderByDesc('id');
            $query->where('status', '=', 10);
            $query->take(8);
        }])
//            ->where('url_slug', '=', $slug) // Maybe later
            ->where('id', '=', $slug)
            ->first();
    }


    public function getPaginatedList($request)
    {
        $data = Owner::where('status', '!=', 3);
        if ($request->owner) {
            $data->where('user_type', $request->owner);
        } else {
            $data->whereNotIn('user_type', [1, 5]);
        }
        $data = $data->orderBy('name', 'asc')->get();
        return $this->formatResponse(true, '', 'admin.owner.index', $data);
    }

    public function getShow(int $id)
    {
        $owner = Owner::with(['properties', 'info'])->find($id);
        return $this->formatResponse(true, '', '', $owner);
    }

    public function postUpdate($request, $id): object
    {
        $status = false;
        $msg = 'User not updated!';

        DB::beginTransaction();
        try {
            $user = Owner::with(['info'])->find($id);
            if ($user->user_type == 2) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile_no = $request->mobile_no;
                $user->listing_limit = $request->listing_limit;

                $info = $user->info;
                if (!$info) {
                    $info = new OwnerInfo();
                    $info->f_user_no = $user->id;
                }

                $info->shop_open_time = $request->open_time;
                $info->shop_close_time = $request->close_time;
                $info->working_days = json_encode($request->working_days);
                $info->save();

                if ($request->hasFile('images')) {
                    $user->profile_pic_url = $this->uploadImage($request->file('images')[0], $user->id);
                }
            } else {
                $user->name = $request->company_name;
                $user->email = $request->email;
                $user->mobile_no = $request->mobile_no;
                $user->listing_limit = $request->listing_limit;
                $user->designation = $request->designation;
                $user->contact_per_name = $request->contact_person_name;
                $user->address = $request->office_address;

                $info = $user->info;
                if (!$info) {
                    $info = new OwnerInfo();
                    $info->f_user_no = $user->id;
                }

                $info->meta_title = $request->meta_title;
                $info->meta_description = $request->meta_description;
                $info->site_url = $request->site_url;
                $info->about_company = $request->about_company;
                $info->shop_open_time = $request->open_time;
                $info->shop_close_time = $request->close_time;
                $info->working_days = json_encode($request->working_days);

                if ($request->hasFile('images')) {
                    $imgMap = ['LOGO', 'BANNER'];
                    foreach ($request->file('images') as $key => $image) {
                        if ($key >= count($imgMap)) {
                            break;
                        }
                        $info->{$imgMap[$key]} = $this->uploadImage($image, $user->id);
                    }
                }

                $info->save();
            }

            $user->payment_auto_renew = $request->auto_payment_renew;
            $user->is_feature = $request->feature;
            $user->user_type = $request->user_type;

            if ($request->auto_payment_renew == 1) {
                $user->properties()->update([
                    'payment_auto_renew' => 1
                ]);
            }

            if($user->user_type != $request->user_type){
                Product::where('f_user_no',$id)->update(['user_type' => $request->user_type]);
            }
            $user->save();
            $status = true;
            $msg = 'User updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.owner.index');
    }

    public function updatePassword($request, $id)
    {
        $status = false;
        $msg = 'Password could not be updated!';

        DB::beginTransaction();
        try {
            $user = Owner::find($id);
            $user->password = Hash::make($request->password);
            $user->save();

            $status = true;
            $msg = 'Password updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.owner.index');
    }

    private function uploadImage($image, $id = null): string
    {
        $imageUrl = '';
        if ($image) {
            $file_name = 'img_' . date('dmY') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imageUrl = '/uploads/images/owner/' . ($id ? $id . '/' : '');
            $image->move(public_path($imageUrl), $file_name);
            $imageUrl .= $file_name;
        }
        return $imageUrl;
    }

    public function getPayments(int $id)
    {
        $payments = PaymentCustomer::with('customer')
            ->where('f_customer_no', '=', $id)
            ->get();
        return $this->formatResponse(true, '', 'admin.owner.payment', $payments);
    }

    public function getCustomerTxn($id)
    {
        try {
            $data = Transaction::with(['payment', 'customer'])->where('f_customer_no', $id)->get();
        } catch (\Throwable $th) {
            return $this->formatResponse(false, 'Data not found', 'admin.owner.index');
        }
        return $this->formatResponse(true, 'Payment list found successfully !', 'admin.owner.index', $data);

    }

    public function storePayment($request, int $id)
    {
        $status = false;
        $msg = 'Payment not successful!';

        DB::beginTransaction();
        try {
            $payment = new PaymentCustomer();
            $payment->f_customer_no = $id;
            $payment->amount = $request->amount;
            $payment->f_acc_payment_bank_no = 3;
            $payment->payment_confirmed_status = 1;
            $payment->payment_note = $request->note;
            $payment->payment_date = date('Y-m-d');
            $payment->payment_type = 2;
            $payment->save();

            $status = true;
            $msg = 'Payment successful!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'admin.owner.payment');
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
        return $this->formatResponse($status, $msg, 'admin.owner.payment');
    }

    public function getTransaction($id): object
    {
        $transaction = Transaction::with(['customer', 'payment'])->find($id);
        return $this->formatResponse(true, '', '', $transaction);
    }




}
