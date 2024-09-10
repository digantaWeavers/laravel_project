<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// super admin view
// Route::get('superadmin/projects', function(){
//     return view('SuperAdmin/projects-add');
// })->name('superamdin.projects.view.list');

// super admin view
// Route::get('team-leads', function(){
//     return view('SuperAdmin/teamLead');
// })->name('superamdin.teamleads');


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

    // =====================================manager protflio details=========================================== //
    
    Route::post('/superadmin/user/add', 'SuperAdminOtherUsersRegistration')->name('superadmin.others.user.add'); // others user registartion by super admin

    Route::get('/managers', 'managerListSuperAdmin')->name('superadmin.manager.list.view');    // super admin manager list view

    Route::get('superadmin/manager/{id}/view', 'ManagerSingleView')->name('single.manager.view.superadmin');    // single manager profile view

    Route::get('superadmin/manager/{id}/delete', 'ManagerDelete')->name('superamdin.manager.delete');    // manager delete

    Route::get('superadmin/projects', 'managerList')->name('superamdin.projects.view.list');    // super admin manager list view

    // =====================================manager protflio details=========================================== //



    // =====================================manager protflio details=========================================== //

    Route::get('superadmin/teamlead', 'TeamLeadDisplay')->name('superamdin.teamleads');   // team lead list view

    Route::post('superadmin/teamlead/add', 'TeamLeadAdd')->name('teamLead.add.superadmin');    // team lead add


    // =====================================manager protflio details=========================================== //

});

Route::resource('/projects', ProjectController::class); // project controller