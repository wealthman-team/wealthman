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
Route::get('/robo-advisors/{roboAdvisor}', 'RoboAdvisorsController@show')->name('roboAdvisorsShow');
Route::get('/compare', 'RoboAdvisorsController@compare')->name('roboAdvisorsCompare');
Route::post('/toggle-compare', 'RoboAdvisorsController@toggleCompare')->name('toggleCompare');
Route::post('/remove-compare', 'RoboAdvisorsController@removeCompare')->name('removeCompare');
Route::post('/clear-compare', 'RoboAdvisorsController@clearCompare')->name('clearCompare');

/*
 * Service routes
 */

Route::get('/redirect', 'RedirectController@index')->name('redirect');
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

/*
 * Auth routes
 */

Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

/*
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('/admin/', 'AdminController@index')->name('admin.index')->middleware('auth:admin', 'revalidate');

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
});

