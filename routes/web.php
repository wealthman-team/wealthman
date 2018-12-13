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

Route::get('/', 'IndexController@index')->name('home');

//Auth::routes();

Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::get('/home', 'HomeController@index')->name('home');

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
});