<?php 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthorMonitorController;
use App\Http\Controllers\Admin\BookMonitorController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth','auth.session', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/authors', [AuthorMonitorController::class, 'index'])->name('admin.authors');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/books', [BookMonitorController::class, 'index'])->name('admin.books');
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
});