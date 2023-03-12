<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table        = 'web_testimonials';
    protected $primaryKey   = 'id';

    public function getTestimonials()
    {
        return Testimonials::where('is_active',1)->get();
    }
}
