<?php

Route::resource('members', 'MemberController');

Route::resource('packages', 'PackageController');

Route::resource('products', 'ProductController');

Route::resource('healthmetrics', 'HealthmetricsController');

Route::resource('requisitions', 'RequisitionController');



Route::resource('expenses', 'ExpensesController');

Route::resource('incomes', 'IncomeController');

Route::resource('schedulebookings', 'SchedulebookingController');