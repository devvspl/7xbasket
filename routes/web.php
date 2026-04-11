<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Frontend Routes
 * |--------------------------------------------------------------------------
 */
Route::middleware(['block.ip', 'track.visitor'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dark', [HomeController::class, 'dark'])->name('dark');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/investment-calculator', [HomeController::class, 'calculator'])->name('calculator');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/apply-franchise', [FranchiseController::class, 'apply'])->name('apply');
    Route::post('/apply-franchise', [FranchiseController::class, 'store'])->name('apply.store')->middleware('throttle:3,60');
    Route::get('/download-brochure', [HomeController::class, 'brochure'])->name('brochure.download');
});

// Sitemap
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

/*
 * |--------------------------------------------------------------------------
 * | Admin Routes
 * |--------------------------------------------------------------------------
 */
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('/login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
        // Blogs
        Route::resource('blogs', Admin\BlogController::class);
        Route::post('/blogs/upload-image', [Admin\BlogController::class, 'uploadImage'])->name('blogs.upload-image');
        // Applications
        Route::get('/applications', [Admin\ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/export', [Admin\ApplicationController::class, 'export'])->name('applications.export');
        Route::get('/applications/{application}', [Admin\ApplicationController::class, 'show'])->name('applications.show');
        Route::patch('/applications/{application}/status', [Admin\ApplicationController::class, 'updateStatus'])->name('applications.status');
        Route::delete('/applications/{application}', [Admin\ApplicationController::class, 'destroy'])->name('applications.destroy');
        // SEO
        Route::get('/seo', [Admin\SeoController::class, 'index'])->name('seo.index');
        Route::get('/seo/{page}/edit', [Admin\SeoController::class, 'edit'])->name('seo.edit');
        Route::put('/seo/{page}', [Admin\SeoController::class, 'update'])->name('seo.update');
        // Visitors & IP Blocking
        Route::get('/visitors', [Admin\VisitorController::class, 'index'])->name('visitors.index');
        Route::get('/blocked-ips', [Admin\VisitorController::class, 'blockedIps'])->name('blocked-ips.index');
        Route::post('/blocked-ips', [Admin\VisitorController::class, 'blockIp'])->name('blocked-ips.store');
        Route::patch('/blocked-ips/{blockedIp}/unblock', [Admin\VisitorController::class, 'unblockIp'])->name('blocked-ips.unblock');
        Route::delete('/blocked-ips/{blockedIp}', [Admin\VisitorController::class, 'destroyBlockedIp'])->name('blocked-ips.destroy');
    });
});
