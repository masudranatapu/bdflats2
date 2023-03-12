<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'web_slider';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    public function getSliders()
    {
        return Slider::where('is_active', '=', 1)
            ->orderByDesc('order_by')
            ->get();
    }
}
