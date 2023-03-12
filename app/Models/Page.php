<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'web_search_pages';
    protected $primaryKey = 'id';
    const CREATED_AT = 'ss_created_on';
    const UPDATED_AT = 'ss_modified_on';
}
