<?php


use App\Models\DataTbl;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AgentsController;
use App\Http\Controllers\Admin\SeekerController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataTableController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ListingPriceController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\PagesCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Authentication
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
// admin
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/cc', 'DashboardController@cacheClear')->name('cacheClear');
    Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@settings']);
    // Route::post('postDashboardNote', ['as' => 'admin.dashboard.note.post', 'uses' => 'DashboardController@postDashboardNote']);
    //property
    Route::get('property', [PropertyController::class, 'getIndex'])->name('property.index');
    Route::post('property_list', [DataTableController::class, 'getProperty'])->name('property.list');
    Route::get('property/new', [PropertyController::class, 'getCreate'])->name('property.create');
    Route::post('property/store', [PropertyController::class, 'postStore'])->name('property.store');
    Route::get('property/{id}/edit', [PropertyController::class, 'getEdit'])->name('property.edit');
    Route::post('property/{id}/update', [PropertyController::class, 'putUpdate'])->name('property.update');
    Route::get('property/{id}/view', [PropertyController::class, 'getView'])->name('property.view');
    Route::get('property/{id}/activity', [PropertyController::class, 'getaAtivity'])->name('property.activity');
    // listing price
    Route::get('listing-price', [ListingPriceController::class, 'getIndex'])->name('listing_price.list');
    Route::post('listing-price/update', [ListingPriceController::class, 'postUpdate'])->name('listing_price.update');
    Route::post('listing-lead-price/update', [ListingPriceController::class, 'postLeadPriceUpdate'])->name('listing_lead_price.update');
    // owner
    Route::get('owner', [OwnerController::class, 'getIndex'])->name('owner.index');
    Route::get('owner/{id}/view', [OwnerController::class, 'getView'])->name('owner.view');
    Route::get('owner/{id}/edit', [OwnerController::class, 'getEdit'])->name('owner.edit');
    Route::post('owner/{id}/update', [OwnerController::class, 'postUpdate'])->name('owner.update');
    Route::get('owner/{id}/payment', [OwnerController::class, 'getPayment'])->name('owner.payment');
    Route::post('owner/{id}/payment', [OwnerController::class, 'postPayment'])->name('owner.payment.store');
    Route::get('owner/{id}/payment/{pay_id}/', [OwnerController::class, 'getPaymentView'])->name('owner.payment.view');
    Route::get('owner/{id}/password', [OwnerController::class, 'getPasswordEdit'])->name('owner.password.edit');
    Route::post('owner/{id}/password/update', [OwnerController::class, 'postPasswordUpdate'])->name('owner.password.update');
    Route::get('owner/{id}/recharge', [OwnerController::class, 'getRecharge'])->name('owner.recharge');
    Route::post('owner/{id}/recharge', [OwnerController::class, 'postRecharge'])->name('owner.recharge.store');
    Route::post('owner_list', [DataTableController::class, 'getOwner'])->name('owner.list');
    //Seeker
    Route::get('seeker', [SeekerController::class, 'getIndex'])->name('seeker.index');
    Route::get('seeker/{id}/view', [SeekerController::class, 'getView'])->name('seeker.view');
    Route::get('seeker/{id}/edit', [SeekerController::class, 'getEdit'])->name('seeker.edit');
    Route::post('seeker/update', [SeekerController::class, 'postUpdate'])->name('seeker.update');
    Route::get('seeker/{id}/payment', [SeekerController::class, 'getPayment'])->name('seeker.payment');
    Route::get('seeker/{id}/recharge', [SeekerController::class, 'getRecharge'])->name('seeker.recharge');
    Route::post('seeker/{id}/recharge', [SeekerController::class, 'postRecharge'])->name('seeker.recharge');
    Route::get('seeker/get_area/{id}', [SeekerController::class, 'getArea'])->name('seeker.get_area');
    Route::post('seeker_list', [DataTableController::class, 'getSeeker'])->name('seeker.list');
    Route::get('seeker/payment-account', [SeekerController::class, 'paymentAccount'])->name('seeker.payment-account.list');
    //Agent
    Route::get('agents', [AgentsController::class, 'getIndex'])->name('agents.index');
    Route::get('agents/new', [AgentsController::class, 'getCreate'])->name('agents.create');
    Route::post('agents/store', [AgentsController::class, 'postStore'])->name('agents.store');
    Route::get('agents/{id}/edit', [AgentsController::class, 'getEdit'])->name('agents.edit');
    Route::post('agents/{id}/update', [AgentsController::class, 'postUpdate'])->name('agents.update');
    Route::get('agents/{id}/delete', [AgentsController::class, 'getDelete'])->name('agents.delete');
    Route::get('agents-earnings/{id}', [AgentsController::class, 'getEarnings'])->name('agents.earnings');
    Route::get('agents-withdraw_credit', [AgentsController::class, 'getWithdrawCredit'])->name('agents.withdraw_credit');
    Route::post('agents_list', [DataTableController::class, 'getAgents'])->name('agents.list');

    Route::get('transaction', [TransactionController::class, 'getIndex'])->name('transaction.index');
    Route::get('transaction_list', [TransactionController::class, 'getTransactionList'])->name('transaction_list');
    Route::get('transaction/create', [TransactionController::class, 'getCreate'])->name('transaction.create');
    Route::post('transaction/store', [TransactionController::class, 'postStore'])->name('transaction.store');
    Route::get('transaction/{id}/edit', [TransactionController::class, 'getEdit'])->name('transaction.edit');
    Route::post('transaction/{id}/update', [TransactionController::class, 'postUpdate'])->name('transaction.update');
    Route::post('transaction/{id}/destroy', [TransactionController::class, 'getDelete'])->name('transaction.destroy');

    Route::get('refund-request', [TransactionController::class,'getRefundRequest'])->name('refund_request');
    Route::get('refund-request/{id}/edit', [TransactionController::class,'editRefundRequest'])->name('refund_request.edit');
    Route::post('refund-request/{id}/update', [TransactionController::class,'updateRefundRequest'])->name('refund_request.update');
    Route::post('refund-request', [DataTableController::class, 'getRefundRequest'])->name('refund_request.list');

    Route::get('recharge-request', [TransactionController::class,'getRechargeRequest'])->name('recharge_request');
    Route::get('recharge-request/{id}/edit', [TransactionController::class,'editRechargeRequest'])->name('recharge_request.edit');
    Route::post('recharge-request/{id}/update', [TransactionController::class,'updateRechargeRequest'])->name('recharge_request.update');
    Route::post('recharge_request', [DataTableController::class, 'getRechargeRequest'])->name('recharge_request.list');
    Route::get('agent-commission', [TransactionController::class, 'getAgentCommission'])->name('agent_commission');
    //Pages
    Route::get('pages', [PagesController::class, 'getIndex'])->name('pages.index');
    Route::get('pages/create', [PagesController::class, 'getCreate'])->name('pages.create');
    Route::post('pages/store', [PagesController::class, 'postStore'])->name('pages.store');
    Route::get('pages/{id}/edit', [PagesController::class, 'getEdit'])->name('pages.edit');
    Route::post('pages/{id}/update', [PagesController::class, 'postUpdate'])->name('pages.update');
    Route::get('pages/{id}/delete', [PagesController::class, 'getDelete'])->name('pages.delete');
    //Pages Category
    Route::get('pages-category', [PagesCategoryController::class, 'getIndex'])->name('pages-category.list');
    Route::get('pages-category/create', [PagesCategoryController::class, 'getCreate'])->name('pages-category.create');
    Route::post('pages-category/store', [PagesCategoryController::class, 'postStore'])->name('pages-category.store');
    Route::get('pages-category/{id}/edit', [PagesCategoryController::class, 'getEdit'])->name('pages-category.edit');
    Route::post('pages-category/{id}/update', [PagesCategoryController::class, 'postUpdate'])->name('pages-category.update');
    Route::get('pages-category/{id}/delete', [PagesCategoryController::class, 'getDelete'])->name('pages-category.delete');
    // Ads
    Route::get('ads',[AdsController::class, 'getIndex'])->name('ads');
    Route::get('ads/create',[AdsController::class, 'createAd'])->name('ads.create');
    Route::post('ads/store',[AdsController::class, 'storeAd'])->name('ads.store');
    Route::get('ads/{id}/edit',[AdsController::class, 'editAd'])->name('ads.edit');
    Route::post('ads/{id}/update',[AdsController::class, 'updateAd'])->name('ads.update');
    Route::get('ads/{id}/images',[AdsController::class, 'getAdsImages'])->name('ads-image');
    Route::post('ads/{id}/images/store',[AdsController::class, 'storeAdsImage'])->name('ads-image.store');
    Route::post('ads/{id}/images/update',[AdsController::class, 'updateAdsImage'])->name('ads-image.update');
    Route::get('ads/{id}/images/delete',[AdsController::class, 'deleteAdsImage'])->name('ads-image.delete');
    Route::get('ads_position',[AdsController::class, 'getAdsPosition'])->name('ads_position');
    Route::get('ads_position/create',[AdsController::class, 'createAdsPosition'])->name('ads_position.create');
    Route::post('ads_position/store',[AdsController::class, 'storeAdsPosition'])->name('ads_position.store');
    Route::get('ads_position/{id}/edit',[AdsController::class, 'editAdsPosition'])->name('ads_position.edit');
    Route::post('ads_position/{id}/update',[AdsController::class, 'updateAdsPosition'])->name('ads_position.update');
    // city
    Route::get('city', [CityController::class, 'getIndex'])->name('city.list');
    Route::get('city/create', [CityController::class, 'getCreate'])->name('city.create');
    Route::post('city/store', [CityController::class, 'postStore'])->name('city.store');
    Route::get('city/{id}/edit', [CityController::class, 'getEdit'])->name('city.edit');
    Route::post('city/{id}/update', [CityController::class, 'postUpdate'])->name('city.update');
    Route::get('city_list', [CityController::class, 'getCity'])->name('city.list');
    // area
    Route::get('area', [AreaController::class, 'getIndex'])->name('area.list');
    Route::get('area/create', [AreaController::class, 'getCreate'])->name('area.create');
    Route::post('area/store', [AreaController::class, 'postStore'])->name('area.store');
    Route::get('area/{id}/edit', [AreaController::class, 'getEdit'])->name('area.edit');
    Route::post('area/{id}/update', [AreaController::class, 'postUpdate'])->name('area.update');
    Route::get('area_list', [AreaController::class, 'getArea'])->name('area.get');
    // property
    // Route::get('area_list', [AreaController::class, 'getArea'])->name('area.list');
    // Route::get('property/new', ['middleware' => 'acl:new_product', 'as' => 'admin.product.create', 'uses' => 'ProductController@getCreate']);
    // Route::post('property/store', ['middleware' => 'acl:new_product', 'as' => 'admin.product.store', 'uses' => 'ProductController@postStore']);
    // Route::get('property/{id}/edit', ['middleware' => 'acl:edit_product', 'as' => 'admin.product.edit', 'uses' => 'ProductController@getEdit']);
    // Route::get('property/{id}/activity', ['middleware' => 'acl:edit_product_activity', 'as' => 'admin.product.activity', 'uses' => 'ProductController@getaAtivity']);
    // Route::get('property/{id}/view', ['middleware' => 'acl:view_product', 'as' => 'admin.product.view', 'uses' => 'ProductController@getView']);
    // Route::post('property/{id}/update', ['middleware' => 'acl:edit_product', 'as' => 'admin.product.update', 'uses' => 'ProductController@putUpdate']);
    // property
    Route::post('property-delete_img', [PropertyController::class, 'postDeleteImage'])->name('property.delete_image');
    Route::get('property/ajax-listing-variant', [PropertyController::class, 'addListingVariant'])->name('property.get_variant');
    Route::get('property/ajax-property-type/{id}', [PropertyController::class, 'getPropertyType'])->name('property.get_property_type');
    // Route::post('product_variant/store', [, 'uses' => 'ProductController@postStoreProductVariant'])->name('admin.product_variant.store');
    // Route::post('product_variant/{id}/update', [ , 'uses' => 'ProductController@putUpdateProductVariant'])->name('admin.product_variant.update');
    // Route::get('product_variant/{id}/delete', [, 'uses' => 'ProductController@getDeleteProductVariant'])->name('admin.product_variant.delete');
    // //ajax route for product module
    // Route::get('prod_img_delete/{id}', [, 'uses' => 'ProductController@getDeleteImage'])->name('admin.product.img_delete');
    // Route::get('prod_subcategory/{id}', [, 'uses' => 'ProductController@getSubcat'])->name('product.prod_subcategory.');
    // Route::get('prod_model/{id}', [, 'uses' => 'ProductController@getProdModel'])->name('product.prod_model');

    // Route::post('product-search', ['admin.product_search', 'uses' => 'ProductController@getProductSearchList'])->name();
    // Route::post('product/search-back', ['admin.add_to_mother_page', 'uses' => 'ProductController@getProductSearchGoBack'])->name();
    // Users
    Route::get('roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/show', [RolesController::class, 'show'])->name('roles.show');
    Route::get('roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('roles/{id}/update', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
    // permissions
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
    Route::post('permissions/store', [PermissionsController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/show', [PermissionsController::class, 'show'])->name('permissions.show');
    Route::get('permissions/{id}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
    Route::post('permissions/{id}/update', [PermissionsController::class, 'update'])->name('permissions.update');
    Route::post('permissions/{id}/destroy', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
    // user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // profile
    Route::get('profile', 'DashboardController@adminProfile')->name('profile');

    // franchises list
    // Route::get('franchises', 'FranchisesController@index')->name('franchises.index');
    // Route::get('franchise/create', 'FranchisesController@create')->name('franchises.create');
    // Route::post('franchise/store', 'FranchisesController@store')->name('franchises.store');
    // Route::get('franchise/{slug}/edit', 'FranchisesController@edit')->name('franchises.edit');
    // Route::post('franchise/{slug}/update', 'FranchisesController@update')->name('franchises.update');
    // Route::get('franchise/view/{slug}', 'FranchisesController@view')->name('franchises.view');
    // Route::get('franchise/delete/{id}', 'FranchisesController@delete')->name('franchises.delete');

    //Category
    //  Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    //     Route::get('/', 'CategoryController@index')->name('index');
    //     Route::post('/store', 'CategoryController@store')->name('store');
    //     Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
    //     Route::post('/{id}/update', 'CategoryController@update')->name('update');
    //     Route::get('/{id}/delete', 'CategoryController@delete')->name('delete');
    // });

    //SubCategory
    // Route::group(['prefix' => 'subcategory', 'as' => 'subcategory.'], function () {
    //     Route::get('/', 'SubCategoryController@index')->name('index');
    //     Route::post('/store', 'SubCategoryController@store')->name('store');
    //     Route::get('/{id}/edit', 'SubCategoryController@edit')->name('edit');
    //     Route::post('/{id}/update', 'SubCategoryController@update')->name('update');
    //     Route::get('/{id}/delete', 'SubCategoryController@delete')->name('delete');
    // });
    //Blog Category
    // Route::group(['prefix' => 'blog-category', 'as' => 'blog-category.'], function () {
    //     Route::get('/', 'BlogCategoryController@index')->name('index');
    //     Route::post('/store', 'BlogCategoryController@store')->name('store');
    //     Route::get('/{id}/edit', 'BlogCategoryController@edit')->name('edit');
    //     Route::post('/{id}/update', 'BlogCategoryController@update')->name('update');
    //     Route::get('/{id}/delete', 'BlogCategoryController@delete')->name('delete');
    // });

    //Blog Post
    // Route::group(['prefix' => 'blog-post', 'as' => 'blog-post.'], function () {
    //     Route::get('/', 'BlogPostController@index')->name('index');
    //     Route::get('create', 'BlogPostController@create')->name('create');
    //     Route::post('store', 'BlogPostController@store')->name('store');
    //     Route::get('{id}/edit', 'BlogPostController@edit')->name('edit');
    //     Route::post('{id}/update', 'BlogPostController@update')->name('update');
    //     Route::get('{id}/view', 'BlogPostController@view')->name('view');
    //     Route::get('{id}/delete', 'BlogPostController@delete')->name('delete');
    // });

    //Contact
    // Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    //     Route::get('/', 'ContactController@index')->name('index');
    //     Route::get('create', 'ContactController@create')->name('create');
    //     Route::post('store', 'ContactController@store')->name('store');
    //     Route::get('{id}/edit', 'ContactController@edit')->name('edit');
    //     Route::post('{id}/update', 'ContactController@update')->name('update');
    //     Route::get('{id}/view', 'ContactController@view')->name('view');
    //     Route::get('{id}/delete', 'ContactController@delete')->name('delete');
    // });


    //Country
    // Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
    //     Route::get('/', 'CountryController@index')->name('index');
    //     Route::get('create', 'CountryController@create')->name('create');
    //     Route::post('store', 'CountryController@store')->name('store');
    //     Route::get('{id}/edit', 'CountryController@edit')->name('edit');
    //     Route::post('{id}/update', 'CountryController@update')->name('update');
    //     Route::get('{id}/view', 'CountryController@view')->name('view');
    //     Route::get('{id}/delete', 'CountryController@delete')->name('delete');
    // });

    //Region
    // Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
    //     Route::get('/', 'RegionController@index')->name('index');
    //     Route::get('create', 'RegionController@create')->name('create');
    //     Route::post('store', 'RegionController@store')->name('store');
    //     Route::get('{id}/edit', 'RegionController@edit')->name('edit');
    //     Route::post('{id}/update', 'RegionController@update')->name('update');
    //     Route::get('{id}/view', 'RegionController@view')->name('view');
    //     Route::get('{id}/delete', 'RegionController@delete')->name('delete');
    // });

    //City
    // Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
    //     Route::get('/', 'CityController@index')->name('index');
    //     Route::get('create', 'CityController@create')->name('create');
    //     Route::post('store', 'CityController@store')->name('store');
    //     Route::get('{id}/edit', 'CityController@edit')->name('edit');
    //     Route::post('{id}/update', 'CityController@update')->name('update');
    //     Route::get('{id}/view', 'CityController@view')->name('view');
    //     Route::get('{id}/delete', 'CityController@delete')->name('delete');
    // });

});
