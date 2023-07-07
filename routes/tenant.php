<?php

declare(strict_types=1);


use App\Http\Controllers\AuthTenant\AuthenticatedSessionTenantController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AuthTenant\RegisteredUsertenantController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\UserstenantController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        dd(\App\Models\Userstenant::all());
    });

    Route::middleware('authTenant','verified')->group(function () {
    
       Route::get('users/create',[UserstenantController::class,'create'])->name('userstenant.create');
        
        Route::post('users/store',[UserstenantController::class,'store'])->name('userstenant.store');
    });

    Route::get('register', [RegisteredUsertenantController::class, 'create'])
    ->name('register');
    Route::post('register', [RegisteredUsertenantController::class, 'store']);
    /*Route::middleware('auth','verified','role:admin')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });*/
    
    Route::middleware('guest')->group(function () {
    
        Route::get('login', [AuthenticatedSessionTenantController::class, 'create'])
                    ->name('logintenant');
    
        Route::post('login', [AuthenticatedSessionTenantController::class, 'store']);
    
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('password.request');
    
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('password.email');
    
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');
    
        Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('verify-email', EmailVerificationPromptController::class)
                    ->name('verification.notice');
    
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                    ->middleware(['signed', 'throttle:6,1'])
                    ->name('verification.verify');
    
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware('throttle:6,1')
                    ->name('verification.send');
    
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->name('password.confirm');
    
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    
        Route::post('logout', [AuthenticatedSessionTenantController::class, 'destroy'])
                    ->name('logout');
    });
    
});





