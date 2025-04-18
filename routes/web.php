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
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TestimoniController;

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

// Public routes don't have 'mindo' prefix
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{news}', [HomeController::class, 'newsDetail'])->name('news.detail');
Route::get('/gallery/{galeri}', [HomeController::class, 'galeriDetail'])->name('galeri.detail');
Route::get('/galleryAll', [GaleriController::class, 'galleryAll'])->name('gallery.all');
Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/vision-mission', [HomeController::class, 'visionMission'])->name('vision-mission');
Route::get('/sectors', [HomeController::class, 'sectors'])->name('sectors');
Route::get('/dpk-apindo-jabar', [HomeController::class, 'dpkApindoJabar'])->name('dpkApindoJabar');
Route::get('/managements', [HomeController::class, 'managements'])->name('managements');
Route::get('/regulations', [HomeController::class, 'regulations'])->name('regulations');
Route::get('/news', [HomeController::class, 'news'])->name('allNews');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar.index');
Route::get('/activity/{activity}', [HomeController::class, 'activityShow'])->name('activity.show');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/news', [NewsController::class, 'allNews'])->name('news.index');

Auth::routes(['verify' => true]);

// Admin routes (prefixed with 'mindo')
Route::middleware(['auth', 'can:DASHBOARD'])->prefix('mindo')->name('mindo.')->group(function () {
    // Dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    // Resource controllers
    Route::resources([
        'roles'                   => RoleController::class,
        'users'                   => UserController::class,
        'permissions'             => PermissionController::class,
        'members'                 => MemberController::class,
        'news'                    => NewsController::class,
        'organizational-positions' => OrganizationalPositionController::class,
        'sectors'                 => SectorController::class,
        'regulations'             => RegulationController::class,
        'councils'                => CouncilController::class,
        'managements'            => ManagementController::class,
        'galeri'                 => GaleriController::class,
        'pesan'                => PesanController::class,
        'activities'                => ActivityController::class,
        'testimoni'                => TestimoniController::class,
    ]);

    // Activity logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
    Route::get('activity-logs/{activity}', [ActivityLogController::class, 'show'])->name('activity-logs.show');
});
