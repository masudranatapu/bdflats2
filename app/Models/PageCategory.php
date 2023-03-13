<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $table = 'web_page_category';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    public function pages()
    {
        return $this->hasMany('App\Models\Page', 'f_page_category_no', 'id');
    }

    public function getPageCategories($type, $limit = 6)
    {
        return PageCategory::with(['pages' => function ($query) {
            $query->where('is_bottom_view', '=', 1);
        }])
            ->where('property_for', '=', $type)
            ->where('is_active', '=', 1)
            ->orderByDesc('order_id')
            ->take($limit)
            ->get();
    }


}
