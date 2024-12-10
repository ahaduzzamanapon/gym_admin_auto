<?php

Route::resource('members', 'MemberController');

Route::resource('packages', 'PackageController');

Route::resource('products', 'ProductController');

Route::resource('healthmetrics', 'HealthmetricsController');

Route::resource('requisitions', 'RequisitionController');



Route::resource('expenses', 'ExpensesController');

Route::resource('incomes', 'IncomeController');

Route::resource('schedulebookings', 'SchedulebookingController');

Route::resource('coupons', 'CouponController');

Route::resource('groups', 'GroupController');

Route::resource('permissions', 'PermissionController');

Route::resource('groupPermitions', 'GroupPermitionController');

Route::resource('purchasePackages', 'PurchasePackageController');


Route::resource('assetsManagements', 'AssetsManagementController');

Route::resource('assetsManagements', 'AssetsManagementController');

Route::resource('assetsCategories', 'AssetsCategoryController');

// Route::resource('attendences', 'AttendenceController');

Route::resource('siteSettings', 'SiteSettingController');

Route::resource('siteProfiles', 'SiteProfileController');

Route::resource('siteFeatures', 'SiteFeatureController');

Route::resource('aboutuses', 'AboutUsController');

Route::resource('siteTrainers', 'SiteTrainerController');
Route::resource('contactMassages', 'ContactMassageController');




Route::resource('notices', 'NoticeController');

Route::resource('termAndConditions', 'TermAndConditionController');

Route::resource('admissionQuestions', 'AdmissionQuestionsController');

Route::resource('multiBranches', 'MultiBranchController');

Route::resource('workoutCategories', 'WorkoutCategoryController');

Route::resource('dailyWorkouts', 'DailyWorkoutsController');