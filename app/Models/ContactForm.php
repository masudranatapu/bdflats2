<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class ContactForm extends Model
{
    use RepoResponse;

    protected $table        = 'web_contact_message';
    protected $primaryKey   = 'id';
    public $timestamps      = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->ss_created_by = $user->id ?? null;
        });

        static::updating(function($model)
        {
            $user = Auth::user();
            $model->ss_modified_by = $user->id ?? null;
        });
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $list                           = new ContactForm();
            $list->name                     = $request->name;
            $list->email                    = $request->email;
            $list->subject                  = $request->subject;
            $list->message_text             = $request->message;
            $list->ss_created_on            = Carbon::now();
            $list->ss_modified_on           = Carbon::now();
            $list->save();

        }catch (\Exception $e){
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your Message is not submitted successfully !', 'contact-us');
        }
        DB::commit();
        return $this->formatResponse(true, 'Thanks For Contacting With Us !', 'contact-us');
    }
}
