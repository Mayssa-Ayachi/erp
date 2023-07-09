<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UsersController;
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
    return redirect()->route('profile.edit');
})->middleware(['auth', 'verified'])->name('profile.edit');


// =========== Elimination du /dashboard actuellement ===============
// =========== Le code demeure existant =============================
// =========== En cas de besoin future pour un page d'accueil =======
// =========== pour chaque utilisateur, le code est là ==============

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','verified','role:admin')->group(function () {
    Route::get('/users', [UsersController::class, 'show'])->name('showusers');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('showusers.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','verified','role:commercial')->group(function () {
    Route::get('/commercial/add_organizations',[SubdomainController::class,'showpage'])->name('subdomain.showpage');
    Route::get('/commercials/add_organizations',[SubdomainController::class,'showForm'])->name('subdomain.showForm');
    Route::post('subdomain',[SubdomainController::class,'store'])->name('subdomain.store');
    /*Route::post('/commercial/email',[EmailController::class,'send'])->name('subdomain.send');*/
});

Route::middleware('auth','verified','role:support')->group(function () {
    Route::get('/support/packages',[PackageController::class,'showpage'])->name('package.showpage');
    Route::get('/support/packages',[PackageController::class,'show'])->name('package.show');
    Route::get('/support/add_package',[PackageController::class,'showaddpackage'])->name('package.showaddpackage');
    Route::post('/support/add_package',[PackageController::class,'store'])->name('package.store');
    Route::delete('/support/packages/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
});

Route::middleware('auth','verified','role:financier')->group(function () {
    Route::get('/finance/add_payment',[PaymentController::class,'showpayment'])->name('payment.showpayment');
    Route::get('/finance/add_payment',[PaymentController::class,'showinfo'])->name('payment.showinfo');
    Route::post('/finance/add_payment',[PaymentController::class,'store'])->name('payment.store');

    /*Route::get('/finance/payments',[PaymentController::class,'showlistpayment'])->name('payment.showlistpayment');*/
    Route::get('/finance/payments',[PaymentController::class,'show'])->name('payment.show');
    Route::delete('/finance/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy'); 
});


require __DIR__.'/auth.php';


