<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\EventController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAdminNotLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::middleware([CheckAdminNotLogin::class])->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/admin/login/process', [AuthController::class, 'login'])->name('admin.auth.login');
});

Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::post('/admin/events/status', [EventController::class, 'status'])->name('admin.events.status');
    Route::get('admin/events/search', [EventController::class, 'search'])->name('admin.events.search');

    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events/create/process', [EventController::class, 'store'])->name('admin.events.create.process');

    Route::post('/admin/events/delete', [EventController::class, 'delete'])->name('admin.events.delete');

    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::post('/admin/events/{id}/edit/process', [EventController::class, 'update'])->name('admin.events.edit.process');
});
