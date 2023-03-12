<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrowsedProperty extends Model
{
    protected $table = 'prd_browsing_history';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function listing(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Listings', 'f_listing_no', 'id');
    }
}
