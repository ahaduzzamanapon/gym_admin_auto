<?php

use App\Http\Controllers\Backend\FeaturesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\DeviceController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DemuRequestController;
use App\Http\Controllers\GymDietChartController;
use App\Http\Controllers\ContactMassageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\SalesProductController;
use App\Http\Controllers\PurchasePackageController;
use App\Http\Controllers\DailyWorkoutsController;
use App\Http\Controllers\AccountReport;
use App\Http\Controllers\MealPlanController;


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

use Illuminate\Support\Facades\Password;

Route::get('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
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

// Route::get('/welcome', [HomeController::class, 'index'])->name('home');








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
    Route::get('diet_charts/{dietChart}/print', [GymDietChartController::class, 'print_diet_chart'])->name('diet_charts.print');
    Route::resource('meal_plans', MealPlanController::class);
    Route::get('meal_plans/{mealPlan}/print', [MealPlanController::class, 'print_meal_plan'])->name('meal_plans.print');
    route::post('get_data_by_user_id', 'GymDietChartController@getDataByUserId')->name('diet_charts.get_data_by_user_id');



    // backend routes for frontend content

        Route::get('features', [FeaturesController::class, 'index'])->name('features.index');
        Route::get('features/create', [FeaturesController::class, 'create'])->name('features.create');
        Route::post('features/store', [FeaturesController::class, 'store'])->name('features.store');
        Route::get('features/edit/{id}', [FeaturesController::class, 'edit'])->name('features.edit');
        Route::post('features/update/{id}', [FeaturesController::class, 'update'])->name('features.update');
        Route::delete('features/delete/{id}', [FeaturesController::class, 'destroy'])->name('features.destroy');


        //upload member
        Route::get('upload/upload_excel_page_member', [UploadController::class, 'excel_upload_member_page'])->name('upload.upload_excel_page');
        Route::post('upload/upload_excel_member', [UploadController::class, 'upload_excel_member'])->name('upload.upload_excel_member');


        //Attendance
        Route::get('upload/upload_excel_page_attendance', [UploadController::class, 'upload_excel_page_attendance'])->name('upload.upload_excel_page_attendance');
        Route::post('upload/upload_excel_attendance', [UploadController::class, 'upload_excel_attendance'])->name('upload.upload_excel_attendance');
        Route::get('attendance/index', [AttendenceController::class, 'index'])->name('attendences.index');
        Route::get('attendance/process_attendence', [AttendenceController::class, 'process_attendence'])->name('attendences.process_attendence');
        Route::get('attendance/get_member', [AttendenceController::class, 'get_member'])->name('attendences.get_member');
        Route::post('attendance/get_daily_attendence', [AttendenceController::class, 'get_daily_attendence'])->name('attendences.get_daily_attendence');
        

        //sales_product

        Route::resource('sales', SalesProductController::class);
        Route::get('sales/{sale}/invoice', [SalesProductController::class, 'invoice'])->name('sales.invoice');


        //PurchasePackageController
        Route::get('purchase_packages/{purchasePackage}/invoice', [PurchasePackageController::class, 'invoice'])->name('purchasePackages.invoice');
        Route::get('purchase_packages/{purchasePackage}/renew', [PurchasePackageController::class, 'renew'])->name('purchasePackages.renew');


        Route::get('members_admission_form', [MemberController::class, 'admission_form'])->name('members.admission_form');
        Route::post('member_admission_store', [MemberController::class, 'member_admission_store'])->name('admission.store');
        Route::get('get_dailyWorkouts', [DailyWorkoutsController::class, 'getDailyWorkouts'])->name('dailyWorkouts.getDailyWorkouts');
        Route::get('daily_work_out_print/{id}/', [DailyWorkoutsController::class, 'print_daily_work_out'])->name('dailyWorkouts.print');
        Route::get('daily_work_out_details/{id}/', [DailyWorkoutsController::class, 'details'])->name('dailyWorkouts.details');
        Route::get('daily_work_out_update/{id}', [DailyWorkoutsController::class, 'daily_work_out_update'])->name('dailyWorkouts.update_info');
        Route::get('daily_work_out_delete/{id}', [DailyWorkoutsController::class, 'daily_work_out_delete'])->name('dailyWorkouts.delete_info');
        Route::post('daily_work_out_update', [DailyWorkoutsController::class, 'update_data'])->name('dailyWorkouts.update_data');


        // account_report

        Route::get('account_report', [AccountReport::class, 'index'])->name('account_report.index');
        Route::post('account_report/getAccountReportIncome', [AccountReport::class, 'getAccountReportIncome'])->name('account_report.getAccountReportIncome');
        Route::post('account_report/fetchAccountReportDeu', [AccountReport::class, 'fetchAccountReportDeu'])->name('account_report.fetchAccountReportDeu');
        Route::post('account_report/getAccountReportExpense', [AccountReport::class, 'getAccountReportExpense'])->name('account_report.getAccountReportExpense');
        Route::get('/manual_command', [AccountReport::class, 'manual_command'])->name('manual_command');

        //member
        Route::get('get-branches', [MemberController::class, 'getBranches']);

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{name?}', 'JoshController@showView');
Route::post('contactMassages/store', [ContactMassageController::class, 'store'])->name('contactMassages.store');
Route::get('icons', function () {
    return view('icons');
});
Route::get('attendance/auto', [AttendenceController::class, 'auto_from_machine']);



