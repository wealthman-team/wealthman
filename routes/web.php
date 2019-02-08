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
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');
// group post
Route::post('/toggle-compare', 'RoboAdvisorsController@toggleCompare')->name('toggleCompare');
Route::post('/remove-compare', 'RoboAdvisorsController@removeCompare')->name('removeCompare');
Route::post('/clear-compare', 'RoboAdvisorsController@clearCompare')->name('clearCompare');
Route::post('/reviews/create', 'ReviewsController@create')->name('reviews.create');
Route::post('/reviews/like', 'ReviewsController@like')->name('reviews.like');
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
