<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DemuRequestController;
use App\Http\Controllers\Frontend\DeviceController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Frontend\HomeController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
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



// Authentication route here

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/admin/hrsheba/register', [AuthController::class, 'register_view'])->name('register.view');
        Route::post('/admin/register', [AuthController::class, 'register'])->name('register');
        Route::get('/admin/insert', [AuthController::class, 'admin_insert_view'])->name('admin.insert.view');
        Route::post('/admin/insert/user', [AuthController::class, 'admin_insert'])->name('admin.insert');
        Route::get('/admin/index', [AuthController::class, 'index'])->name('all.admin.index');
        Route::delete('/admin/delete/{id}', [AuthController::class, 'delete'])->name('admin.delete');
        
    });
    
    Route::get('/admin/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/dashboard/profile/image/update', [ProfileController::class, 'image_update'])->name('profile.image_update');
    Route::get('/dashboard/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('/dashboard/profile/password/update', [ProfileController::class, 'password_update'])->name('profile.password_update');
    Route::get('/admin/hrsheba/logout', [AuthController::class, 'logout'])->name('logout');

    // demu request route
    Route::get('/admin/demu_request', [DemuRequestController::class, 'admin_index'])->name('admin.demu_request');
    Route::get('/admin/demu_request/{id}', [DemuRequestController::class, 'request_view'])->name('admin.demu_request.view');
    Route::get('/admin/demu_request/accept/{id}', [DemuRequestController::class, 'accept_demu'])->name('admin.demu_request.accept');
    Route::get('/admin/pendding/demu_request/', [DemuRequestController::class, 'pendding_demu'])->name('admin.pendding_demu');
    Route::get('/admin/accepted/demu_request/', [DemuRequestController::class, 'accepted_demu'])->name('admin.accepted_demu');

    // contact request route
    Route::get('/admin/contact_request', [ContactController::class, 'contact_request'])->name('admin.contact_request');
    Route::get('/admin/contact_request/accept/{id}', [ContactController::class, 'accept_contact'])->name('admin.contact_request.accept');
    Route::get('/admin/pendding/contact_request', [ContactController::class, 'pendding_contact'])->name('admin.pendding_contact');
    Route::get('/admin/accepted/contact_request', [ContactController::class, 'accepted_contact'])->name('admin.accepted_contact');
    Route::delete('/admin/contact_request/delete/{id}', [ContactController::class, 'contact_request_delete'])->name('admin.contact_request.delete');

    // blogs route start
    Route::get('/admin/blogs/index', [BlogController::class, 'admin_index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs/store', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/show/{id}', [BlogController::class, 'show'])->name('admin.blogs.show');
    Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('/admin/blogs/update/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/delete/{id}', [BlogController::class, 'delete'])->name('admin.blogs.delete');

    // setting route
    Route::get('/admin/setting', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::post('/admin/setting/edit/{id?}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    
});

Route::get('/admin/hrsheba/login', [AuthController::class, 'login_view'])->name('login.view')->middleware('guest');
Route::post('/admin/hrsheba/login', [AuthController::class, 'login'])->name('login');








