<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');

// Default
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

// Admin
Route::add(['GET', 'POST'], '/employees', [Controller\Site::class, 'employees'])
   ->middleware('auth', "admin");

// HR
Route::add(['GET', 'POST'], '/emp', [Controller\Site::class, 'emp'])
   ->middleware('auth', "hr");
Route::add(['GET', 'POST'], '/subunit', [Controller\Site::class, 'subunit'])
   ->middleware('auth', "hr");
Route::add(['GET', 'POST'], '/calculate', [Controller\Site::class, 'calculate'])
   ->middleware('auth', "hr");
Route::add(['GET', 'POST'], '/subunit_sel', [Controller\Site::class, 'subunit_sel'])
   ->middleware('auth', "hr");
// Route::add(['GET', 'POST'], '/department', [Controller\Site::class, 'department'])
// ->middleware('auth', "hr");