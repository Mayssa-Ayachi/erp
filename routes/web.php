<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/commercial',[SubdomainController::class,'showForm'])->name('subdomain.showForm');
    Route::post('subdomain',[SubdomainController::class,'store'])->name('subdomain.store');

    Route::get('/support/packages',[PackageController::class,'show'])->name('package.show');
    Route::get('/support/add_package',[PackageController::class,'showaddpackage'])->name('package.showaddpackage');
    Route::post('/support/add_package',[PackageController::class,'store'])->name('package.store');
    Route::delete('/support/packages/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

    Route::get('/finance/add_payment',[PaymentController::class,'showpayment'])->name('payment.showpayment');
    Route::get('/finance/add_payment',[PaymentController::class,'showinfo'])->name('payment.showinfo');
    Route::post('/finance/add_payment',[PaymentController::class,'store'])->name('payment.store');

    Route::get('/finance/payments',[PaymentController::class,'showlistpayment'])->name('payment.showlistpayment');
    Route::get('/finance/payments',[PaymentController::class,'show'])->name('payment.show');
    Route::delete('/finance/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
});

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
*/

Route::get('/commercial', function () {
    return view('subdomain');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/commercial',[SubdomainController::class,'showForm'])->name('subdomain.showForm');

//Route::post('subdomain',[SubdomainController::class,'store'])->name('subdomain.store');

//Route::get('/support/add_package',[PackageController::class,'showaddpackage'])->name('package.showaddpackage');
//Route::post('/support/add_package',[PackageController::class,'store'])->name('package.store');


Route::get('/support/packages', function () {
    return view('packages');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/support/packages',[PackageController::class,'show'])->name('package.show');
//Route::delete('/support/packages/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

//Route::get('/finance/add_payment',[PaymentController::class,'showpayment'])->name('payment.showpayment');
//Route::get('/finance/add_payment',[PaymentController::class,'showinfo'])->name('payment.showinfo');
//Route::post('/finance/add_payment',[PaymentController::class,'store'])->name('payment.store');

//Route::get('/finance/payments',[PaymentController::class,'showlistpayment'])->name('payment.showlistpayment');
//Route::get('/finance/payments',[PaymentController::class,'show'])->name('payment.show');
//Route::delete('/finance/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
