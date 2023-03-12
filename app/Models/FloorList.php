<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FloorList extends Model
{
    public $timestamps = false;
    protected $table = 'prd_floor_list';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'is_active'];

    public function getFloorList() {
        return FloorList::where('is_active', 1)->pluck('name', 'id');
    }
}
