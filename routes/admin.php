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

Route::resource('posts', 'PostController', ['names' => [
    'index' => 'admin.posts.index',
    'create' => 'admin.posts.create',
    'store' => 'admin.posts.store',
    'show' => 'admin.posts.show',
    'edit' => 'admin.posts.edit',
    'update' => 'admin.posts.update',
    'destroy' => 'admin.posts.destroy',
]])->parameters([
    'posts' => 'post'
]);

Route::resource('tags', 'TagController', ['names' => [
    'index' => 'admin.tags.index',
    'create' => 'admin.tags.create',
    'store' => 'admin.tags.store',
    'show' => 'admin.tags.show',
    'edit' => 'admin.tags.edit',
    'update' => 'admin.tags.update',
    'destroy' => 'admin.tags.destroy',
]])->parameters([
    'tags' => 'tag'
]);

Route::resource('categories', 'CategoryController', ['names' => [
    'index' => 'admin.categories.index',
    'create' => 'admin.categories.create',
    'store' => 'admin.categories.store',
    'show' => 'admin.categories.show',
    'edit' => 'admin.categories.edit',
    'update' => 'admin.categories.update',
    'destroy' => 'admin.categories.destroy',
]])->parameters([
    'categories' => 'category'
]);