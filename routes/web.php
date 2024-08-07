<?php

use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// super admin view
Route::get('superadmin/login', function(){
    return view('SuperAdmin/superAdmin-login-registration');
})->name('superamdin.login');


// Super Admin Controller Group 
Route::controller(SuperAdminController::class)->group(function(){
    Route::post('/superadmin/add', 'SuperAdminRegistration')->name('superadmin.register'); // data insert
    Route::get('/dashboard/superadmin', 'dashboardPage')->name('logincheck'); // dashborad view
    Route::post('/login', 'SuperAdminLogin')->name('superadmin.login'); // super admin login
    Route::get('/logout', 'superAdminLogout')->name('superadmin.logout'); // super admin logout
});