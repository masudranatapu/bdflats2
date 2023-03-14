<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use RepoResponse;
    protected $table = 'web_search_pages';
    protected $primaryKey = 'id';



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->f_created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->f_modified_by = Auth::id();
        });
    }

    public function pagesCategory()
    {
        return $this->belongsTo('App\Models\PageCategory', 'f_page_category_no', 'id');
    }


    public function getPages($limit = 2000): object
    {
        $pages = Page::with('pagesCategory')->orderByDesc('order_id')->paginate($limit);
        return $this->formatResponse(true, '', '', $pages);
    }

    public function getPage(int $id): object
    {
        $page = Page::with('pagesCategory')->find($id);
        return $this->formatResponse(true, '', '', $page);
    }

    public function storePage($request): object
    {
        $this->status = false;
        $this->msg = 'Page could not be added!';

        DB::beginTransaction();
        try {
            $page = new Page();
            $page->f_page_category_no   = $request->page_category;
            $page->title                = $request->page_title;
            $page->url_slug             = $request->page_url;
            $page->search_url           = $request->search_url;
            $page->order_id             = $request->order_id;
            $page->meta_description     = $request->meta_description;
            $page->meta_keywards        = $request->meta_keywords;
            $page->is_active            = $request->status;
            $page->is_bottom_view       = $request->view_on_bottom_list ? 1 : 0;

            if ($request->hasFile('images')) {
                $image      = $request->file('images')[0];
                $imageName  = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath  = '/uploads/pages/';
                $image->move(public_path($imagePath), $imageName);

                $page->image_path = $imagePath . $imageName;
            }
            $page->save();

            $this->status   = true;
            $this->msg      = 'Page added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages.index');
    }

    public function updatePage($request, int $id)
    {
        $this->status   = false;
        $this->msg      = 'Page could not be updated!';

        DB::beginTransaction();
        try {
            $page = Page::find($id);
            $page->f_page_category_no   = $request->page_category;
            $page->title                = $request->page_title;
            $page->url_slug             = $request->page_url;
            $page->search_url           = $request->search_url;
            $page->order_id             = $request->order_id;
            $page->meta_description     = $request->meta_description;
            $page->meta_keywards        = $request->meta_keywords;
            $page->is_active            = $request->status;
            $page->is_bottom_view       = $request->view_on_bottom_list ? 1 : 0;

            if ($request->hasFile('images')) {
                $image      = $request->file('images')[0];
                $imageName  = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath  = '/uploads/pages/';
                $image->move(public_path($imagePath), $imageName);
                $page->image_path = $imagePath . $imageName;
            }
            $page->save();

            $this->status   = true;
            $this->msg      = 'Page updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages.index');
    }

    public function deletePage(int $id): object
    {
        $this->status   = false;
        $this->msg      = 'Page could not be deleted!';

        DB::beginTransaction();
        try {
            $category = Page::find($id);
            $category->delete();
            $this->status = true;
            $this->msg = 'Page deleted successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages.index');
    }

    public function getPagesCategories($limit = 2000): object
    {
        $categories = PageCategory::orderByDesc('property_for')->paginate($limit);
        return $this->formatResponse(true, '', '', $categories);
    }

    public function getPagesCategory($id)
    {
        $category = PageCategory::find($id);
        return $this->formatResponse(true, '', '', $category);
    }

    public function storePagesCategory($request): object
    {
        $this->status   = false;
        $this->msg      = 'Page category could not be added!';

        DB::beginTransaction();
        try {
            $category = new PageCategory();
            $category->name             = $request->category_name;
            $category->is_active        = $request->status;
            $category->meta_keywards    = $request->meta_keywords;
            $category->meta_description = $request->meta_description;
            $category->order_id         = $request->order_id;
            $category->property_for     = $request->property_for;
            $category->save();

            $this->status   = true;
            $this->msg      = 'Page category added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages-category.list');
    }

    public function updatePagesCategory($request, int $id)
    {
        $this->status   = false;
        $this->msg      = 'Page category could not be updated!';

        DB::beginTransaction();
        try {
            $category = PageCategory::find($id);
            $category->name             = $request->category_name;
            $category->is_active        = $request->status;
            $category->meta_keywards    = $request->meta_keywords;
            $category->meta_description = $request->meta_description;
            $category->order_id         = $request->order_id;
            $category->property_for     = $request->property_for;
            $category->save();

            $this->status = true;
            $this->msg = 'Page category updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages-category.list');
    }

    public function deletePagesCategory(int $id)
    {
        $this->status = false;
        $this->msg = 'Page category could not be deleted!';

        DB::beginTransaction();
        try {
            $category = PageCategory::find($id);
            $category->delete();

            $this->status   = true;
            $this->msg      = 'Page category deleted successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.pages-category.list');
    }
}
