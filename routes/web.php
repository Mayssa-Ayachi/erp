<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\PackageController;

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

Route::get('/commercial', function () {
    return view('subdomain');
});

Route::post('subdomain',[SubdomainController::class,'store'])->name('subdomain.store');

Route::get('/support/add_package', function () {
    return view('packages');
});

Route::post('/support/add_package',[PackageController::class,'store'])->name('package.store');
