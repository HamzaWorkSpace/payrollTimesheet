<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\TimesheetController;
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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/change/password', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
        Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
        Route::post('/admin/users', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

        // User CRUD routes for admin
        Route::get('admin/users/list', [UserController::class, 'index'])->name('admin.users.list');
        Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        Route::resource('employees', EmployeeController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('contracts', ContractController::class);




        Route::get('timesheets/index', [TimesheetController::class, 'index'])->name('timesheets.index');
        Route::get('timesheets/create/{user_id}', [TimesheetController::class, 'create'])->name('timesheets.create');
        Route::post('timesheets', [TimesheetController::class, 'store'])->name('timesheets.store');
        Route::get('timesheets/{id}', [TimesheetController::class, 'show'])->name('timesheets.show');
        Route::get('userTimesheets/edit/{id}', [TimesheetController::class, 'edit'])->name('userTimesheets.edit');
        Route::put('timesheets/{id}', [TimesheetController::class, 'update'])->name('timesheets.update');
        Route::delete('userTimesheets/{id}', [TimesheetController::class, 'destroy'])->name('timesheets.destroy');
        Route::put('userTimesheets/{timesheet}', [TimesheetController::class, 'changeTimesheetStatus'])->name('timesheets.changeTimesheetStatus');
        Route::get('userTimesheets/{user_id}', [TimesheetController::class, 'viewSpecificEmployeeTimesheets'])->name('timesheets.viewEmployeeTimesheets');
        Route::post('/timesheets/copy', [TimesheetController::class, 'copy'])->name('timesheets.copy');

    }
); // end group admin

Route::middleware(['auth', 'role:user'])->group(
    function () {
       // Route::get('userTimesheets/{user_id}', [TimesheetController::class, 'viewSpecificEmployeeTimesheets'])->name('userTimesheets.viewTimesheets');
        Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
        Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
        Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    }
); // end group user
Route::middleware(['auth', 'role:manager'])->group(
    function () {
        Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
        Route::post('/manager/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
        Route::post('/manager/update/password', [ManagerController::class, 'ManagerUpdatePassword'])->name('manager.update.password');

        // User CRUD routes for manager
        Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    }
);
// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
require __DIR__.'/auth.php';
