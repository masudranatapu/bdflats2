<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyFacing extends Model
{
    protected $table        = 'prd_property_facing';
    protected $primaryKey   = 'id';
    protected $fillable     = ['title'];


    public function getPropertyFacing()
    {
        return PropertyFacing::where('is_active', 1)->pluck('title', 'id');
    }

}
