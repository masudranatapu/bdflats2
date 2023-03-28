<?php

namespace App\Models;

use Str;
use DB;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use RepoResponse;
    protected $table        = 'prd_property_type';
    protected $primaryKey   = 'id';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'modified_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['property_type'];

    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->created_by = $user->id;
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->modified_by = $user->id;
           });
       }


       public function getPaginatedList($request, int $per_page = 20)
       {
           $data = PropertyCategory::where('is_active',1)->orderBy('order_id', 'desc')->get();
           return $this->formatResponse(true, '', 'admin.propertycategory.list', $data);
       }
       public function getSlugByText($txt){
           $str = strtolower($txt);
           $slug = Str::slug($str);
            // $slug  =str_replace(" ", "-", preg_replace('/([%\$!-_;:,.#\'"@*]+)/','-', $str));
           return $slug;
       }
       public function postStore($request)
       {
           //dd($request->All());
           DB::beginTransaction();
           try {
               $category                           = new PropertyCategory();
               $category->property_type            = $request->category_name;
               if(!empty($request->category_name)){
                   $category->url_slug             = $this->getSlugByText($request->category_name);
               }
               if(!is_null($request->file('image')))
               {
                   $category->img_path       = $this->uploadImage($request->image);
               }
               if(!is_null($request->file('icon')))
               {
                   $category->icon_path          = $this->uploadImage($request->icon);
               }
               $category->meta_title               = $request->meta_title;
               $category->meta_desc                = $request->meta_description;
               $category->body_desc                = $request->body_description;
               $category->category_url             = $request->url;
               $category->order_id                 = $request->order;
               $category->save();
           } catch (\Exception $e) {
               dd($e);
                        DB::rollback();
               return $this->formatResponse(false, $e, 'admin.propertycategory.list');
           }
           DB::commit();
           return $this->formatResponse(true, 'Property category has been created successfully !', 'admin.propertycategory.list');
       }


       public function uploadImage($image)
       {
           $imageUrl = null;
         if($image)
         {
           $file_name  = 'img_'. date('dmY'). '_' .uniqid(). '.' . $image->getClientOriginalExtension();
           $imageUrl   = '/media/images/property-category/'.$file_name;
           $image->move(public_path().'/media/images/property-category/',$file_name);
         }
         return $imageUrl;
       }

       public function findOrThrowException($id)
       {
           $data = PropertyCategory::where('id', '=', $id)->first();
           if (!empty($data)) {
               return $this->formatResponse(true, '', 'property.category.edit', $data);
           }
           return $this->formatResponse(false, 'Did not found data !', 'admin.propertycategory.list', null);
       }
       public function postUpdate($request, $id)
       {
           DB::beginTransaction();
           try {
               $category = PropertyCategory::find($id);
               $category->property_type            = $request->category_name;
               if(!empty($request->category_name)){
                   $category->url_slug             = $this->getSlugByText($request->category_name);
               }
               if(!is_null($request->file('image')))
               {
                   $category->img_path       = $this->uploadImage($request->image);
               }
               if(!is_null($request->file('icon')))
               {
                   $category->icon_path          = $this->uploadImage($request->icon);
               }
               $category->meta_title               = $request->meta_title;
               $category->meta_desc                = $request->meta_description;
               $category->body_desc                = $request->body_description;
               $category->category_url             = $request->url;
               $category->order_id                 = $request->order;
               $category->update();
           } catch (\Exception $e) {
               DB::rollback();
               dd($e);
               return $this->formatResponse(false, 'Unable to update category !', 'admin.propertycategory.list');
           }
           DB::commit();
           return $this->formatResponse(true, 'Property category has been updated successfully !', 'admin.propertycategory.list');
       }
       public function propertyDelete($id)
       {
           DB::begintransaction();
           try {
               $category = Category::find($id)->delete();
               // $category->IS_ACTIVE = 0;
               // $category->update();
           } catch (\Exception $e) {
               DB::rollback();
               return $this->formatResponse(false, 'Unable to delete this category !', 'admin.productcategory.list');
           }
           DB::commit();
           return $this->formatResponse(true, 'Successfully delete this category !', 'admin.productcategory.list');
       }




}
