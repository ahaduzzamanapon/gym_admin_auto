<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\DeviceController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DemuRequestController;
use App\Http\Controllers\GymDietChartController;

include 'web_builder.php';
include 'demo.php';

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

Auth::routes();

// login2, register2 pages
Route::view('login2', 'auth.login2');
Route::view('login3', 'auth.login3');
Route::view('register2', 'auth.register2');
Route::view('register3', 'auth.register3');

Route::get('/welcome', [HomeController::class, 'index'])->name('home');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms_conditions', [HomeController::class, 'terms_conditions'])->name('terms_conditions');
Route::get('/solutions', [DeviceController::class, 'index'])->name('solutions');
// Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog_details/{slug}', [BlogController::class, 'details'])->name('blog_details');
Route::get('/contact_us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact_us', [ContactController::class, 'request_sent'])->name('contact.sent');
Route::get('/demo/request', [DemuRequestController::class, 'index'])->name('demu_request');
Route::post('/demo/request', [DemuRequestController::class, 'request_sent'])->name('demu_request.sent');
Route::get('/about_us', [AboutController::class, 'index'])->name('about');
Route::get('/no_access_page', [HomeController::class, 'no_access'])->name('no_access'); // No access page



// Route::view('welcome', 'auth.register3');







Route::get('/', function () {
    return view('index');
})->middleware('auth');

// Route::resource('users', 'UsersController');

// GUI crud builder routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    // Model checking
    Route::post('tableCheck', 'AppBaseController@tableCheck');


    route::post('couponsCheck', 'CouponController@couponsCheck')->name('coupons.check');
    route::post('packageCheck', 'PackageController@packageCheck')->name('packages.check');
    route::get('details/{id}', 'MemberController@details')->name('members.details');


    Route::resource('diet_charts', GymDietChartController::class);



});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{name?}', 'JoshController@showView');
