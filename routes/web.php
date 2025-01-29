<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizationalPositionController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PesanController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/public/news/{news}', [HomeController::class, 'newsDetail'])->name('public.news.detail');
Route::get('/public/galeri/{galeri}', [HomeController::class, 'galeriDetail'])->name('public.galeri.detail');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('members', MemberController::class);
    Route::resource('news', NewsController::class);
    Route::resource('news', NewsController::class);
    Route::resource('organizational-positions', OrganizationalPositionController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('regulations', RegulationController::class);
    Route::resource('councils', CouncilController::class);
    Route::resource('managements', ManagementController::class);
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
    Route::get('activity-logs/{activity}', [ActivityLogController::class, 'show'])->name('activity-logs.show');
    Route::resource('galeri', GaleriController::class);
    Route::resource('pesan', PesanController::class);
});
