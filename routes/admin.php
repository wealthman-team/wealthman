<?php

/*
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {

    });
});

Route::get('/', 'AdminController@index')->name('admin.index');
Route::get('/users', 'UserController@index')->name('admin.users.index');

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
]);

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
]);

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
]);

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
]);