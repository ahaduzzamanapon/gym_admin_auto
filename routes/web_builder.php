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