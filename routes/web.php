<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\AdministratorDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminLogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/report', [AccidentController::class, 'create'])->name('report');
Route::get('/history', [HomeController::class, 'accident_history'])->name('history');
Route::get('/profile', [UserDashboardController::class, 'index'])->name('profile');
Route::post('/update-profile', [UserDashboardController::class, 'update'])->name('update_profile');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'adminLoginForm'])->name('admin.admin');
    Route::post('/login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');
//    Route::post('/logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin',[AdminLogoutController::class, 'admin_logout'])->name('admin.logout');

    Route::get('/dashboard', [AdministratorDashboardController::class, 'index'])->name('dashboard');

    Route::get('/institutions',[InstitutionsController::class, 'index'])->name('institutions.list');
    Route::post('/add-institutions',[InstitutionsController::class, 'store'])->name('institutions.add');
    Route::get('/edit-institution/{id}',[InstitutionsController::class,'edit'])->name('edit_institution');
    Route::post('/update-institution',[InstitutionsController::class,'update'])->name('update_institution');
    Route::post('/delete-institution', [InstitutionsController::class, 'destroy'])->name('delete_institution');

//    display new accident report
    Route::get('/new-reports',[AdministratorDashboardController::class, 'new_accident'])->name('new_reports');
    Route::get('/pending-reports',[AdministratorDashboardController::class, 'pending_accident'])->name('pending_reports');
    Route::get('/completed-reports',[AdministratorDashboardController::class, 'completed_accident'])->name('completed_reports');

//    assign
    Route::get('/reports/{id}',[AdministratorDashboardController::class,'assign_new'])->name('assign.new');
    Route::post('/assigned',[AdministratorDashboardController::class,'assignment_new'])->name('assign.institution');
    Route::get('/pending-reports/{id}',[AdministratorDashboardController::class,'complete_report'])->name('complete.assign');
    Route::post('/update_complete',[AdministratorDashboardController::class,'update_complete'])->name('assign.completed');

//    users section
    Route::get('all-users', [AdministratorDashboardController::class,'display_users'])->name('all_users');
    Route::get('inactive-users', [AdministratorDashboardController::class,'display_inactive_users'])->name('all_inactive_users');
    Route::get('user_detail/{id}', [AdministratorDashboardController::class,'view_user'])->name('user_detail');
    Route::get('user_update/{id}', [AdministratorDashboardController::class,'getuser_updates'])->name('user_update');
    Route::post('user_updates', [AdministratorDashboardController::class,'update_user'])->name('user_updates');

//    admin profile section
    Route::get('/my_profile',[AdministratorDashboardController::class,'view_my_profile'])->name('admin.profile');
    Route::post('/update_profile',[AdministratorDashboardController::class,'update_my_profile'])->name('update.profile');
});
