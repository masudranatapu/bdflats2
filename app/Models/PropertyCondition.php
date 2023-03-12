<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyCondition extends Model
{
    protected $table        = 'prd_property_condition';
    protected $primaryKey   = 'id';
    protected $fillable     = ['prod_condition'];

    public function getConditions()
    {
        return PropertyCondition::where('is_active', 1)
            ->orderByDesc('order_id')
            ->get();
    }


    public function getPropertyCondition()
    {
        return PropertyCondition::where('is_active', 1)->pluck('prod_condition', 'id');
    }

}
