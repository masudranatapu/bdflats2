<?php

use OpenAI\Laravel\Facades\OpenAI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;


Route::get('cc', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');

    return 'DONE';
});

Route::get('ask/{question}', function($question){
    $result = OpenAI::completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $question,
        'max_tokens' => 20,
        'temperature' => 0,
        'n' => 2,

    ]);


    print_r($result['choices'][0]['text']);
});


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('web.home');
Route::get('ads/{type?}/{cat?}/{city?}/{area?}', 'HomeController@properties')->name('web.property');
Route::get('ad/{slug}', 'HomeController@details')->name('web.property.details');
Route::get('owner/{slug}', 'HomeController@owner')->name('web.owner');
Route::post('newsletter', 'HomeController@storeNewsLetter')->name('newsletter.store');
Route::get('/api/get-area', 'HomeController@getArea')->name('api.get.area');
Route::post('post-registration', 'Auth\AuthController@postRegistration')->name('register.post');
Route::post('post-login', 'Auth\AuthController@postLogin')->name('login.post');
Route::post('post-otp-verify', 'Auth\AuthController@postOtpVerify')->name('register.otp_verify');



//common routes
Route::get('make-suggested-property', 'CornController@makeSuggProperty')->name('make-suggested-property');
Route::get('make-lead', 'CornController@makeLead')->name('make-lead');
Route::get('expaired-property', 'CornController@makeExpairedProperty')->name('make-expaired-property');

Route::get('about-us', 'CommonController@getAboutUs')->name('about-us');
Route::get('contact-us', 'CommonController@getContactUs')->name('contact-us');
Route::post('contact-us', 'CommonController@storeContactUs');
Route::get('terms-conditions', 'CommonController@getTermsConditions')->name('terms-conditions');
Route::get('site-map', 'CommonController@getSiteMap')->name('site-map');
Route::get('privacy-policy', 'CommonController@getPrivacyPolicy')->name('privacy-policy');
Route::get('post-requirement', 'CommonController@getPostRequirement')->name('post-requirement');
Route::post('store-requirement', 'CommonController@storePostRequirement')->name('store-requirement');

Route::get('account_verification', 'CommonController@account_verification')->name('account_verification');
// Route::get('seeker_reg', 'Auth\RegisterController@seeker_register')->name('seeker_register');
// Route::post('seeker_reg', 'Seeker\LoginController@seeker_register_submit')->name('seeker_register_submit');
Route::post('seeker_reg_ajax', 'Seeker\LoginController@seeker_reg_ajax')->name('seeker_reg_ajax');
Route::get('get-user-phone', 'Seeker\LoginController@get_user_phone')->name('get-user-phone');
// Route::get('check-otp-before-submit', 'Seeker\LoginController@check_otp_before_submit')->name('check-otp-before-submit');
// Route::post('regOtp', 'Seeker\LoginController@regOtp')->name('regOtp');
// Route::post('send_Otp','Seeker\LoginController@send_OTP')->name('send_otp');
// Route::post('seeking-resend-otp','Seeker\LoginController@seeking_resend_otp')->name('seeking-resend-otp');
Route::post('verify-otp', 'Seeker\LoginController@verifyOTP')->name('verify-otp');
Route::post('loginWithOtp', 'Seeker\LoginController@loginWithOtp')->name('loginWithOtp');
// Route::post('sendOtp', 'UserController@sendOtp');

Route::group(['middleware' => ['auth']], function () {
    Route::get('recharge-balance', 'CommonUserController@getRechargeBalance')->name('recharge-balance');

});

Route::group(['namespace' => 'Developer', 'middleware' => ['auth']], function () {
    Route::get('developer-listings', 'DeveloperController@getDevListings')->name('developer-listings');
    Route::get('developer-leads', 'DeveloperController@getdeveloperLeads')->name('developer-leads');
    Route::get('developer-leads/{id}/details', 'DeveloperController@getdeveloperLeadsDetails')->name('developer-leads-details');
    Route::get('developer-buy-leads', 'DeveloperController@getdeveloperBuyLeads')->name('developer-buy-leads');
    // Route::get('developer-buy-leads/{id}/details', 'DeveloperController@getdeveloperBuyLeadsDetails')->name('developer-buy-leads-details');
    Route::get('developer-payments', 'DeveloperController@getdeveloperPayments')->name('developer-payments');
    Route::post('developer-lead-pay/{id}', 'DeveloperController@developerLeadPay')->name('developer.lead.pay');

    Route::get('developer-listings/create', 'ListingController@create')->name('developer.listings.create');
    Route::post('developer-listings/store', 'ListingController@store')->name('developer.listings.store');
    Route::get('developer-listings/{id}/edit', 'ListingController@edit')->name('developer.listings.edit');
    Route::post('developer-listings/{id}/update', 'ListingController@update')->name('developer.listings.update');
    Route::get('developer-listings/{id}/delete', 'ListingController@delete')->name('developer.listings.delete');
    Route::get('developer-listings/{id}/pay', 'ListingController@pay')->name('developer.listings.pay');
    Route::post('developer-listings/{id}/pay', 'ListingController@payStore')->name('developer.listings.pay');

});

Route::group(['namespace' => 'Agency', 'middleware' => ['auth']], function () {
    Route::get('agency-listings', 'AgencyController@getListings')->name('agency-listings');

    Route::get('agency-leads', 'AgencyController@getLeads')->name('agency-leads');
    Route::get('agency-buy-leads', 'AgencyController@getBuyLeads')->name('agency-buy-leads');
    Route::get('agency-leads/{id}/details', 'AgencyController@getLeadsDetails')->name('agency-leads-details');

    Route::get('agency-payments', 'AgencyController@getPayments')->name('agency-payments');

    Route::get('agency-listings/create', 'ListingController@create')->name('agency.listings.create');
    Route::post('agency-listings/store', 'ListingController@store')->name('agency.listings.store');
    Route::get('agency-listings/{id}/edit', 'ListingController@edit')->name('agency.listings.edit');
    Route::post('agency-listings/{id}/update', 'ListingController@update')->name('agency.listings.update');
    Route::get('agency-listings/{id}/delete', 'ListingController@delete')->name('agency.listings.delete');
    Route::get('agency-listings/{id}/pay', 'ListingController@pay')->name('agency.listings.pay');
    Route::post('agency-listings/{id}/pay', 'ListingController@payStore')->name('agency.listings.pay');
});

Route::group(['namespace' => 'Agent', 'middleware' => ['auth']], function () {
    Route::get('agent-listings', 'AgentController@getListings')->name('agent-listings');
    Route::get('agent-leads', 'AgentController@getLeads')->name('agent-leads');
    Route::get('agent-leads/{id}/details', 'AgentController@getLeadDetails')->name('agent-lead-details');
    Route::get('agent-buy-leads', 'AgentController@getBuyLeads')->name('agent-buy-leads');
    Route::get('agent-payments', 'AgentController@getPayments')->name('agent-payments');
    Route::get('agent-earnings', 'AgentController@getEarnings')->name('agent-earnings');
    Route::get('agent-withdraw', 'AgentController@getWithdraw')->name('agent-withdraw');

    Route::get('agent-listings/create', 'ListingController@create')->name('agent.listings.create');
    Route::post('agent-listings/store', 'ListingController@store')->name('agent.listings.store');
    Route::get('agent-listings/{id}/edit', 'ListingController@edit')->name('agent.listings.edit');
    Route::post('agent-listings/{id}/update', 'ListingController@update')->name('agent.listings.update');
    Route::get('agent-listings/{id}/delete', 'ListingController@delete')->name('agent.listings.delete');
    Route::get('agent-listings/{id}/pay', 'ListingController@pay')->name('agent.listings.pay');
});

Route::group(['namespace' => 'Seeker', 'middleware' => ['auth']], function () {
    Route::get('property-requirements', 'RequirementController@getMyRequirement')->name('property-requirements');
    Route::post('property-requirements/store_or_update', 'RequirementController@storeOrUpdate')->name('property-requirements.store_or_update');
    Route::get('property-requirements/get_area/{id}', 'RequirementController@getArea')->name('property-requirements.get_area');
    Route::get('suggested-properties', 'SeekerController@getSuggestedProperties')->name('suggested-properties');
    Route::get('contacted-properties', 'SeekerController@getContactedProperties')->name('contacted-properties');
    Route::get('browsed-properties', 'SeekerController@getBrowsedProperties')->name('browsed-properties');
    Route::get('recharge-request', 'SeekerController@getRechargeRequest')->name('recharge-request');
    Route::post('recharge-request', 'SeekerController@postRechargeRequest');
    Route::get('refund-request/{id}', 'SeekerController@getRefundRequest')->name('refund-request');
    Route::post('refund-request/store', 'SeekerController@customerRefundStore')->name('refund-request.store');
    Route::get('payment-history', 'SeekerController@paymentHistory')->name('payment-history');
    Route::get('ajax-get-variants/{id}', 'SeekerController@getVariants')->name('get-variants');
    Route::post('lead-pay/{id}', 'SeekerController@leadPay')->name('lead.pay');

});

Route::group(['namespace' => 'Owner', 'middleware' => ['auth']], function () {

    Route::get('owner-listings', 'OwnerController@getMyListings')->name('owner-listings');
    Route::get('owner-buy-leads', 'OwnerController@getOwnerBuyLeads')->name('buy-leads');
    Route::get('owner-buy-leads/{id}/details', 'OwnerController@getOwnerBuyLeadsDetails')->name('buy-leads-details');
    Route::get('owner-leads', 'OwnerController@getOwnerLeads')->name('owner-leads');

    Route::get('listings/create', 'ListingController@create')->name('listings.create');
    Route::post('listings/store', 'ListingController@store')->name('listings.store');
    Route::get('listings/{id}/edit', 'ListingController@edit')->name('listings.edit');
    Route::post('listings/{id}/update', 'ListingController@update')->name('listings.update');
    Route::get('listings/{id}/delete', 'ListingController@delete')->name('listings.delete');
    Route::get('listings/{id}/pay', 'ListingController@pay')->name('listings.pay');
    Route::post('listings/{id}/pay', 'ListingController@payStore')->name('listings.pay');

    Route::get('ajax-listings-delete_img/{id}', 'ListingController@deleteListingImage')->name('listings.delete_img');
    Route::get('ajax-get-property-type/{id}', 'ListingController@getPropertyType')->name('get.property_type');
    Route::get('ajax-get-available-floor', 'ListingController@getAvailableFloor')->name('get.available.floor');
    Route::get('ajax-add-listing-variant', 'ListingController@addListingVariant')->name('add-listing-variant');
    Route::get('ajax-add-listing-phone', 'ListingController@addListingPhone')->name('add-listing-phone');
    Route::get('ajax-get-area/{id}', 'OwnerController@getArea')->name('get.area');
    Route::get('ajax-get-subarea/{id}', 'OwnerController@getSubArea')->name('get.subarea');
});

Route::group([ 'middleware' => ['auth','IsVerified']], function () {
    Route::get('my-account', 'UserController@getMyAccount')->name('my-account');
});

Route::get('profile/edit', 'UserController@getEditProfile')->name('profile.edit');
Route::post('profile/store_or_update', 'UserController@updateProfile')->name('profile.store_or_update');
Route::post('profile/password_update', 'UserController@updatePass')->name('profile.password_update');

Auth::routes();
// Route::post('seeker-login', 'Seeker\LoginController@login')->name('seeker.login');

Route::get('home', 'HomeController@index')->name('home');


// SSLCOMMERZ Start
Route::post('pay', [SslCommerzPaymentController::class, 'index'])->name('ssl.pay');
//Route::post('pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('success', [SslCommerzPaymentController::class, 'success'])->name('ssl.success');
Route::post('fail', [SslCommerzPaymentController::class, 'fail'])->name('ssl.fail');
Route::post('cancel', [SslCommerzPaymentController::class, 'cancel'])->name('ssl.cancel');

//Route::post('ipn', [SslCommerzPaymentController::class, 'ipn'])->name('ssl.ipn');
//SSLCOMMERZ END
