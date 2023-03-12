<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table        = 'prd_property_type';
    protected $primaryKey   = 'id';
    protected $fillable     = ['property_type'];

    public function getPropertyTypes()
    {
        return PropertyType::where('is_active', 1)
            ->orderByDesc('order_id')
            ->get();
    }


    public function getProperty()
    {
        return $data = PropertyType::pluck('property_type', 'id');

    }

}
