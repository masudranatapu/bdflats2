<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table        = 'web_about';
    protected $primaryKey   = 'id';

    public function getAbout()
    {
        return AboutUs::where('is_active',1)->first();
    }
}
