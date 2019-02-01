<?php

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

use App\Services\Sitemap;

/*
 * Site routes
 */
Route::get('/', 'IndexController@index')->name('home');
Route::get('/robo-advisors', 'RoboAdvisorsController@index')->name('roboAdvisors');
Route::get('/robo-advisors/{slug}', 'RoboAdvisorsController@show')->name('roboAdvisorsShow');
Route::get('/compare', 'RoboAdvisorsController@compare')->name('roboAdvisorsCompare');
// group post
Route::post('/toggle-compare', 'RoboAdvisorsController@toggleCompare')->name('toggleCompare');
Route::post('/remove-compare', 'RoboAdvisorsController@removeCompare')->name('removeCompare');
Route::post('/clear-compare', 'RoboAdvisorsController@clearCompare')->name('clearCompare');
Route::post('/reviews/create', 'ReviewsController@create')->name('reviews.create')->middleware(['auth:web', 'revalidate']);
/*
 * Service routes
 */
Route::get('/redirect', 'RedirectController@index')->name('redirect');
Route::post('/refresh-csrf', function (){
    return csrf_token();
});
Route::get('/sitemap-create', function (){
    Sitemap::generate();
    return 'sitemap created';
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');

    return 'all cache cleared';
});

// User Auth Routes...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/ajax-login', 'Auth\LoginController@ajaxUserLogin')->name('ajax.login');
Route::post('/auth-form', 'Auth\LoginController@getLoginForm')->name('login.form');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// User Registration Routes...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/ajax-register', 'Auth\RegisterController@ajaxUserRegister')->name('ajax.register');
// User Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.forgot');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');;
// Admin Auth Routes...
Route::get('/admin/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


/*
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('/admin/', 'AdminController@index')->name('admin.index')->middleware('auth:admin', 'revalidate');
    Route::get('/users', 'UserController@index')->name('admin.users.index')->middleware('auth:admin', 'revalidate');

    Route::prefix('admin')->group(function () {
        Route::resource('robo-advisors', 'RoboAdvisorController', ['names' => [
            'index' => 'admin.roboAdvisors.index',
            'create' => 'admin.roboAdvisors.create',
            'store' => 'admin.roboAdvisors.store',
            'show' => 'admin.roboAdvisors.show',
            'edit' => 'admin.roboAdvisors.edit',
            'update' => 'admin.roboAdvisors.update',
            'destroy' => 'admin.roboAdvisors.destroy',
        ]])->parameters([
            'robo-advisors' => 'roboAdvisor'
        ])->middleware(['auth:admin', 'revalidate']);
    });

    Route::prefix('admin')->group(function () {
        Route::resource('account-types', 'AccountTypeController', ['names' => [
            'index' => 'admin.accountTypes.index',
            'create' => 'admin.accountTypes.create',
            'store' => 'admin.accountTypes.store',
            'show' => 'admin.accountTypes.show',
            'edit' => 'admin.accountTypes.edit',
            'update' => 'admin.accountTypes.update',
            'destroy' => 'admin.accountTypes.destroy',
        ]])->parameters([
            'account-types' => 'accountType'
        ])->middleware(['auth:admin', 'revalidate']);
    });

    Route::prefix('admin')->group(function () {
        Route::resource('usage-types', 'UsageTypeController', ['names' => [
            'index' => 'admin.usageTypes.index',
            'create' => 'admin.usageTypes.create',
            'store' => 'admin.usageTypes.store',
            'show' => 'admin.usageTypes.show',
            'edit' => 'admin.usageTypes.edit',
            'update' => 'admin.usageTypes.update',
            'destroy' => 'admin.usageTypes.destroy',
        ]])->parameters([
            'usage-types' => 'usageType'
        ])->middleware(['auth:admin', 'revalidate']);
    });

    Route::prefix('admin')->group(function () {
        Route::resource('reviews', 'ReviewsController', ['names' => [
            'index' => 'admin.reviews.index',
            'create' => 'admin.reviews.create',
            'store' => 'admin.reviews.store',
            'show' => 'admin.reviews.show',
            'edit' => 'admin.reviews.edit',
            'update' => 'admin.reviews.update',
            'destroy' => 'admin.reviews.destroy',
        ]])->parameters([
            'reviews' => 'review'
        ])->middleware(['auth:admin', 'revalidate']);
    });
});

