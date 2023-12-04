<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\BalanceController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SocialLoginController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([ 'middleware'=> ['admin', 'auth']], function(){


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // mail body controller

    Route::get('mail/index', [MailController::class, 'index'])->name('mail.index');
    Route::post('mail/store', [MailController::class, 'store'])->name('mail.store');
    Route::post('update_mail/{id}', [MailController::class, 'update_mail'])->name('mail.update');

    // Profile route

    Route::get('profile/index', [ProfileController::class, 'profile_index'])->name('profile.index');
    Route::post('profile/image/change', [ProfileController::class, 'profile_image_change'])->name('profile.image.edit');
    Route::post('profile/content/change', [ProfileController::class, 'profile_content_change'])->name('profile.content.edit');
    Route::post('password/change', [ProfileController::class, 'password_change'])->name('password.change');

    // User route

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/role/change/{id}', [UserController::class, 'admin_role_change'])->name('admin.role.change');
    Route::get('customer/role/change/{id}', [UserController::class, 'customer_role_change'])->name('customer.role.change');
    Route::get('supplier/role/change/{id}', [UserController::class, 'supplier_role_change'])->name('supplier.role.change');




    Route::get('user/active/{id}', [UserController::class, 'user_active'])->name('user.active');
    Route::get('user/banned/{id}', [UserController::class, 'user_banned'])->name('user.banned');


    // Client route
    Route::resource('client', ClientController::class);
    Route::get('client/delete/{id}', [ClientController::class, 'delete'])->name("client.delete");
    Route::get('trash/clients', [ClientController::class, 'all_trash_clients'])->name('trash.client');
    Route::get('client/restore/{id}', [ClientController::class, 'client_restore'])->name('trash.restore');
    Route::get('/client/permanent-delete/{id}', [ClientController::class, 'client_permanent_delete'])->name('client.permanent.delete');


    // Balance route
    Route::resource('balance', BalanceController::class);
    Route::get('balance/delete/{id}', [BalanceController::class, 'delete'])->name("balance.delete");



});
 // Google auth route
 Route::get('google/redirect', [SocialLoginController::class, 'LoginWithGoogle'])->name("google.login");
 Route::get('google/callback', [SocialLoginController::class, 'CallbackFronGoogle'])->name("google.callback");
