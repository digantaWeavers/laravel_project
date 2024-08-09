<?php

use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// super admin view
// Route::get('superadmin/login', function(){
//     return view('SuperAdmin/superAdmin-login-registration');
// })->name('superamdin.login');


// Super Admin Controller Group 
Route::controller(SuperAdminController::class)->group(function(){
    Route::get('superadmin/login', 'superAdminView')->name('superamdin.login'); // super admin view

    Route::post('/superadmin/add', 'SuperAdminRegistration')->name('superadmin.register'); // data insert

    Route::get('/superadmin/dashboard', 'dashboardPage')->name('logincheck'); // dashborad view

    Route::post('/login', 'SuperAdminLogin')->name('superadmin.login'); // super admin login

    Route::get('/logout', 'superAdminLogout')->name('superadmin.logout'); // super admin logout

    Route::get('superadmin/settings/profile', 'profileSettingsView')->name('superamdin.prodile.settings'); // super admin profile settings view

    Route::get('superadmin/profile', 'profileView')->name('superamdin.prodile'); // super admin view

    Route::post('superadmin/{id}/profile/update', 'superAdminProfileUpdate')->name('superadmin.profile.update');    // super admin profile update

    Route::post('superadmin/{id}/password/update', 'superAdminPasswordUpdate')->name('superadmin.password.update');    // super admin profile update
});