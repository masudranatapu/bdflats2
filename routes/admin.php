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
use App\Http\Controllers\Admin\NearByController;
use App\Http\Controllers\Admin\SeekerController;
use App\Http\Controllers\Admin\WebAdsController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataTableController;
use App\Http\Controllers\Admin\PaymentBankController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ListingPriceController;
use App\Http\Controllers\Admin\PagesCategoryController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PropertyFloorController;
use App\Http\Controllers\Admin\PropertyFacingController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use App\Http\Controllers\Admin\PropertyFeaturesController;
use App\Http\Controllers\Admin\PropertyConditionController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

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
    // Route::get('listing-price', [ListingPriceController::class, 'getIndex'])->name('listing_price');
    // Route::post('listing-price/update', [ListingPriceController::class, 'postUpdate'])->name('listing_price.update');
    // Route::post('listing-lead-price/update', [ListingPriceController::class, 'postLeadPriceUpdate'])->name('listing_lead_price.update');
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
    Route::post('seeker/{id}/recharge', [SeekerController::class, 'postRecharge'])->name('seeker.rechargestore');
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
    // transaction
    Route::get('transaction', [TransactionController::class, 'getIndex'])->name('transaction.index');
    Route::post('transaction_list', [DataTableController::class, 'getTransactionList'])->name('transaction_list');
    Route::get('transaction/create', [TransactionController::class, 'getCreate'])->name('transaction.create');
    Route::post('transaction/store', [TransactionController::class, 'postStore'])->name('transaction.store');
    Route::get('transaction/{id}/edit', [TransactionController::class, 'getEdit'])->name('transaction.edit');
    Route::post('transaction/{id}/update', [TransactionController::class, 'postUpdate'])->name('transaction.update');
    Route::post('transaction/{id}/destroy', [TransactionController::class, 'getDelete'])->name('transaction.destroy');
    // refund-reques
    Route::get('refund-request', [TransactionController::class,'getRefundRequest'])->name('refund_request');
    Route::get('refund-request/{id}/edit', [TransactionController::class,'editRefundRequest'])->name('refund_request.edit');
    Route::post('refund-request/{id}/update', [TransactionController::class,'updateRefundRequest'])->name('refund_request.update');
    Route::post('refund-request', [DataTableController::class, 'getRefundRequest'])->name('refund_request.list');
    // recharge-request
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
    Route::get('ads',[WebAdsController::class, 'getIndex'])->name('ads');
    Route::get('ads/create',[WebAdsController::class, 'createAd'])->name('ads.create');
    Route::post('ads/store',[WebAdsController::class, 'storeAd'])->name('ads.store');
    Route::get('ads/{id}/edit',[WebAdsController::class, 'editAd'])->name('ads.edit');
    Route::post('ads/{id}/update',[WebAdsController::class, 'updateAd'])->name('ads.update');
    Route::get('ads/{id}/delete',[WebAdsController::class, 'deleteAd'])->name('ads.delete');
    // getAdsImages
    Route::get('ads/{id}/images',[WebAdsController::class, 'getAdsImages'])->name('ads-image');
    Route::post('ads/{id}/images/store',[WebAdsController::class, 'storeAdsImage'])->name('ads-image.store');
    Route::post('ads/{id}/images/update',[WebAdsController::class, 'updateAdsImage'])->name('ads-image.update');
    Route::get('ads/{id}/images/delete',[WebAdsController::class, 'deleteAdsImage'])->name('ads-image.delete');
    // ads_position
    Route::get('ads_position',[WebAdsController::class, 'getAdsPosition'])->name('ads_position');
    Route::get('ads_position/create',[WebAdsController::class, 'createAdsPosition'])->name('ads_position.create');
    Route::post('ads_position/store',[WebAdsController::class, 'storeAdsPosition'])->name('ads_position.store');
    Route::get('ads_position/{id}/edit',[WebAdsController::class, 'editAdsPosition'])->name('ads_position.edit');
    Route::post('ads_position/{id}/update',[WebAdsController::class, 'updateAdsPosition'])->name('ads_position.update');
    Route::post('ads_position/{id}/delete',[WebAdsController::class, 'deleteAdsPosition'])->name('ads_position.delete');
    // city
    Route::get('city', [CityController::class, 'getIndex'])->name('city.list');
    Route::get('city/create', [CityController::class, 'getCreate'])->name('city.create');
    Route::post('city/store', [CityController::class, 'postStore'])->name('city.store');
    Route::get('city/{id}/edit', [CityController::class, 'getEdit'])->name('city.edit');
    Route::post('city/{id}/update', [CityController::class, 'postUpdate'])->name('city.update');
    Route::get('city_list', [CityController::class, 'getCity'])->name('city.get');
    // area
    Route::get('area', [AreaController::class, 'getIndex'])->name('area.list');
    Route::get('area/create', [AreaController::class, 'getCreate'])->name('area.create');
    Route::post('area/store', [AreaController::class, 'postStore'])->name('area.store');
    Route::get('area/{id}/edit', [AreaController::class, 'getEdit'])->name('area.edit');
    Route::post('area/{id}/update', [AreaController::class, 'postUpdate'])->name('area.update');
    Route::get('area_list', [AreaController::class, 'getArea'])->name('area.get');
    //property category
    Route::get('propertycategory', [PropertyCategoryController::class, 'getIndex'])->name('propertycategory.list');
    Route::get('propertycategory/new', [PropertyCategoryController::class, 'getCreate'])->name('propertycategory.create');
    Route::post('propertycategory/store', [PropertyCategoryController::class, 'postStore'])->name('propertycategory.store');
    Route::get('propertycategory/{id}/edit', [PropertyCategoryController::class, 'getEdit'])->name('propertycategory.edit');
    Route::post('propertycategory/{id}/update', [PropertyCategoryController::class, 'postUpdate'])->name('propertycategory.update');
    Route::get('propertycategory/{id}/delete', [PropertyCategoryController::class, 'getDelete'])->name('propertycategory.delete');
    //property Condition
    Route::get('propertycondition', [PropertyConditionController::class, 'getIndex'])->name('propertycondition.list');
    Route::get('propertycondition/new', [PropertyConditionController::class, 'getCreate'])->name('propertycondition.create');
    Route::post('propertycondition/store', [PropertyConditionController::class, 'postStore'])->name('propertycondition.store');
    Route::get('propertycondition/{id}/edit', [PropertyConditionController::class, 'getEdit'])->name('propertycondition.edit');
    Route::post('propertycondition/{id}/update', [PropertyConditionController::class, 'postUpdate'])->name('propertycondition.update');
    Route::get('propertycondition/{id}/delete', [PropertyConditionController::class, 'getDelete'])->name('propertycondition.delete');
    //property Features
    Route::get('propertyfeatures', [PropertyFeaturesController::class, 'getIndex'])->name('propertyfeatures.list');
    Route::get('propertyfeatures/new', [PropertyFeaturesController::class, 'getCreate'])->name('propertyfeatures.create');
    Route::post('propertyfeatures/store', [PropertyFeaturesController::class, 'postStore'])->name('propertyfeatures.store');
    Route::get('propertyfeatures/{id}/edit', [PropertyFeaturesController::class, 'getEdit'])->name('propertyfeatures.edit');
    Route::post('propertyfeatures/{id}/update', [PropertyFeaturesController::class, 'postUpdate'])->name('propertyfeatures.update');
    Route::post('propertyfeatures/{id}/delete', [PropertyFeaturesController::class, 'getDelete'])->name('propertyfeatures.delete');
    //property Floor
    Route::get('propertyfloor', [PropertyFloorController::class, 'getIndex'])->name('propertyfloor.list');
    Route::get('propertyfloor/new', [PropertyFloorController::class, 'getCreate'])->name('propertyfloor.create');
    Route::post('propertyfloor/store', [PropertyFloorController::class, 'postStore'])->name('propertyfloor.store');
    Route::get('propertyfloor/{id}/edit', [PropertyFloorController::class, 'getEdit'])->name('propertyfloor.edit');
    Route::post('propertyfloor/{id}/update', [PropertyFloorController::class, 'postUpdate'])->name('propertyfloor.update');
    Route::post('propertyfloor/{id}/delete', [PropertyFloorController::class, 'getDelete'])->name('propertyfloor.delete');
    //property Floor
    Route::get('propertyfacing', [PropertyFacingController::class, 'getIndex'])->name('propertyfacing.list');
    Route::get('propertyfacing/new', [PropertyFacingController::class, 'getCreate'])->name('propertyfacing.create');
    Route::post('propertyfacing/store', [PropertyFacingController::class, 'postStore'])->name('propertyfacing.store');
    Route::get('propertyfacing/{id}/edit', [PropertyFacingController::class, 'getEdit'])->name('propertyfacing.edit');
    Route::post('propertyfacing/{id}/update', [PropertyFacingController::class, 'postUpdate'])->name('propertyfacing.update');
    Route::post('propertyfacing/{id}/delete', [PropertyFacingController::class, 'getDelete'])->name('propertyfacing.delete');
    //nearbyarea
    Route::get('nearbyarea', [NearByController::class, 'getIndex'])->name('nearbyarea.list');
    Route::get('nearbyarea/new', [NearByController::class, 'getCreate'])->name('nearbyarea.create');
    Route::post('nearbyarea/store', [NearByController::class, 'postStore'])->name('nearbyarea.store');
    Route::get('nearbyarea/{id}/edit', [NearByController::class, 'getEdit'])->name('nearbyarea.edit');
    Route::post('nearbyarea/{id}/update', [NearByController::class, 'postUpdate'])->name('nearbyarea.update');
    Route::post('nearbyarea/{id}/delete', [NearByController::class, 'getDelete'])->name('nearbyarea.delete');
    // generalinfo
    Route::get('generalinfo', [NearByController::class, 'getDelete'])->name('generalinfo');
    Route::get('contact_message', [NearByController::class, 'getDelete'])->name('contact_message');
    Route::get('aboutus', [NearByController::class, 'getDelete'])->name('aboutus');
    Route::get('testimonial', [NearByController::class, 'getDelete'])->name('testimonial');
    Route::get('team_members', [NearByController::class, 'getDelete'])->name('team_members');
    Route::get('slider', [NearByController::class, 'getDelete'])->name('slider');
    Route::get('newsletter', [NearByController::class, 'getDelete'])->name('newsletter');
    Route::get('page_category', [NearByController::class, 'getDelete'])->name('page_category');
    Route::get('Pages', [NearByController::class, 'getDelete'])->name('Pages');
    Route::get('blog_category', [NearByController::class, 'getDelete'])->name('blog_category');
    Route::get('blog_article', [NearByController::class, 'getDelete'])->name('blog_article');
    Route::get('faq', [NearByController::class, 'getDelete'])->name('faq');
    // //city
    // Route::get('city', [CityController::class, 'getIndex'])->name('city.list');
    // Route::get('city/new', [CityController::class, 'getCreate'])->name('city.create');
    // Route::post('city/store', [CityController::class, 'postStore'])->name('city.store');
    // Route::get('city/{id}/edit', [CityController::class, 'getEdit'])->name('city.edit');
    // Route::post('city/{id}/update', [CityController::class, 'postUpdate'])->name('city.update');
    // Route::post('city/{id}/delete', [CityController::class, 'getDelete'])->name('city.delete');

    // //city
    // Route::get('area', [AreaController::class, 'getIndex'])->name('area.list');
    // Route::get('area/new', [AreaController::class, 'getCreate'])->name('area.create');
    // Route::post('area/store', [AreaController::class, 'postStore'])->name('area.store');
    // Route::get('area/{id}/edit', [AreaController::class, 'getEdit'])->name('area.edit');
    // Route::post('area/{id}/update', [AreaController::class, 'postUpdate'])->name('area.update');
    // Route::post('area/{id}/delete', [AreaController::class, 'getDelete'])->name('area.delete');

    //listing pricing
    Route::get('listing_price', [ListingPriceController::class, 'getIndex'])->name('listing_price.list');
    Route::post('listing_price/update', [ListingPriceController::class, 'postUpdate'])->name('listing_price.update');
    Route::post('listing_lead_price/update', [ListingPriceController::class, 'postLeadPriceUpdate'])->name('listing_lead_price.update');
     //Payment Method
     Route::get('payment_method', [PaymentMethodController::class, 'getIndex'])->name('payment_method.list');
    //  Route::get('payment_method/new', [PaymentMethodController::class, 'getCreate'])->name('payment_method.create');
    //  Route::post('payment_method/store', [PaymentMethodController::class, 'postStore'])->name('payment_method.store');
     Route::get('payment_method/{id}/edit', [PaymentMethodController::class, 'getEdit'])->name('payment_method.edit');
     Route::post('payment_method/{id}/update', [PaymentMethodController::class, 'postUpdate'])->name('payment_method.update');
    //  Route::post('payment_method/{id}/delete', [PaymentMethodController::class, 'getDelete'])->name('payment_method.delete');
    //Payment Acc
    Route::get('payment_acc', [PaymentBankController::class, 'getIndex'])->name('payment_acc.list');
    Route::get('payment_acc/new', [PaymentBankController::class, 'getCreate'])->name('payment_acc.create');
    Route::post('payment_acc/store', [PaymentBankController::class, 'postStore'])->name('payment_acc.store');
    Route::get('payment_acc/{id}/edit', [PaymentBankController::class, 'getEdit'])->name('payment_acc.edit');
    Route::post('payment_acc/{id}/update', [PaymentBankController::class, 'postUpdate'])->name('payment_acc.update');
    Route::post('payment_acc/{id}/delete', [PaymentBankController::class, 'getDelete'])->name('payment_acc.delete');
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
    // product-search
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
