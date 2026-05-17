<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Redirect /public/* URLs to clean URLs (strip /public prefix)
Route::get('/public', fn() => redirect('/', 301));
Route::get('/public/{any}', function (string $any) {
    return redirect('/' . $any, 301);
})->where('any', '.*');

/*
 * |--------------------------------------------------------------------------
 * | Frontend Routes
 * |--------------------------------------------------------------------------
 */
Route::middleware(['block.ip', 'track.visitor'])->group(function () {
    Route::get('/', [HomeController::class, 'dark'])->name('home');
    Route::get('/light', [HomeController::class, 'light'])->name('dark');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/investment-calculator', [HomeController::class, 'calculator'])->name('calculator');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/apply-franchise', [FranchiseController::class, 'apply'])->name('apply');
    Route::get('/landing', [FranchiseController::class, 'landing'])->name('landing');
    Route::post('/apply-franchise', [FranchiseController::class, 'store'])->name('apply.store')->middleware('throttle:20,60');
    Route::get('/thank-you', [FranchiseController::class, 'thankYou'])->name('thank-you');
    Route::get('/download-brochure', [HomeController::class, 'brochure'])->name('brochure.download');
});

// Sitemap
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

/*
 * |--------------------------------------------------------------------------
 * | URL Redirects (from 7x_Basket_Redirection_Sheet)
 * | Old bare slugs + old /blogs/ slugs → new /blogs/{new-slug}
 * |--------------------------------------------------------------------------
 */
$sheetRedirects = [
    // bare slug → new blog slug
    '/indian-grocery-store-franchises'                     => '/blogs/the-rise-of-indian-grocery-store-franchises',
    '/grocery-retail-in-india'                             => '/blogs/grocery-retail-trends-in-india',
    '/grocery-retail-market'                               => '/blogs/midlife-career-change-with-7xbasket',
    '/grocery-franchise-in-india'                          => '/blogs/7xbasket-pan-india-grocery-vision',
    '/grocery-store'                                       => '/blogs/top-reasons-why-opening-a-grocery-store-in-india-is-a-smart-investment',
    '/grocery-store-in-india'                              => '/blogs/top-mistakes-to-avoid-when-launching-a-grocery-store-in-india',
    '/grocery-store-franchise-in-india'                    => '/blogs/scale-business-with-7xbasket-grocery-store-franchise',
    '/franchise-grocery-store'                             => '/blogs/grocery-franchise-vs-independent-grocery-store',
    '/supermarket-business-franchise'                      => '/blogs/top-reasons-to-invest-in-a-supermarket-franchise-business',
    '/top-5-reasons-to-start-a-supermarket-business-in-2025' => '/blogs/reasons-to-start-a-supermarket-business',
    '/best-franchise-grocery-store'                        => '/blogs/invest-smartly-in-best-grocery-store-franchise',
    '/supermarket-franchise-cost'                          => '/blogs/7xbasket-affordable-supermarket-franchise',
    '/best-grocery-store-franchise'                        => '/blogs/step-into-success-with-best-grocery-store-franchise',
    '/indian-grocery-franchise'                            => '/blogs/path-to-success-with-7xbasket',
    '/supermarket-franchise-in-india'                      => '/blogs/how-to-start-a-supermarket-franchise-with-7xbasket',
    '/grocery-mart-franchise'                              => '/blogs/best-investment-for-profitable-retail-growth',
    '/super-market-franchise'                              => '/blogs/your-gateway-to-profitable-retail-business',
    '/grocery-store-franchise-cost'                        => '/blogs/grocery-store-franchise-investment-breakdown',
    '/mini-grocery-store-franchise'                        => '/blogs/why-mini-grocery-store-franchise-is-a-smart-investment',
    '/best-grocery-franchise'                              => '/blogs/best-grocery-franchise-business-opportunity-with-7xbasket',
    '/mini-supermarket-franchise'                          => '/blogs/mini-supermarket-franchise-opportunity-with-7xbasket',
    '/top-5-supermarket-franchises-growing-in-india'       => '/blogs/top-growing-supermarket-franchises-in-india',
    '/best-supermarket-franchise-in-india'                 => '/blogs/why-7xbasket-is-best-supermarket-franchise',
    '/grocery-store-franchise'                             => '/blogs/7xbasket-premier-grocery-store-franchise-opportunity',
    '/supermarket-franchise'                               => '/blogs/comprehensive-guide-to-supermarket-franchise',
    '/supermarket-business-franchises-in-india'            => '/blogs/popularity-of-supermarket-business-franchises',
    '/cost-of-opening-a-supermarket'                       => '/blogs/true-cost-of-opening-a-supermarket',

    // old /blogs/{slug} → new /blogs/{new-slug}
    '/blogs/indian-grocery-store-franchises'                     => '/blogs/the-rise-of-indian-grocery-store-franchises',
    '/blogs/grocery-retail-in-india'                             => '/blogs/grocery-retail-trends-in-india',
    '/blogs/grocery-retail-market'                               => '/blogs/midlife-career-change-with-7xbasket',
    '/blogs/grocery-franchise-in-india'                          => '/blogs/7xbasket-pan-india-grocery-vision',
    '/blogs/grocery-store'                                       => '/blogs/top-reasons-why-opening-a-grocery-store-in-india-is-a-smart-investment',
    '/blogs/grocery-store-in-india'                              => '/blogs/top-mistakes-to-avoid-when-launching-a-grocery-store-in-india',
    '/blogs/grocery-store-franchise-in-india'                    => '/blogs/scale-business-with-7xbasket-grocery-store-franchise',
    '/blogs/franchise-grocery-store'                             => '/blogs/grocery-franchise-vs-independent-grocery-store',
    '/blogs/supermarket-business-franchise'                      => '/blogs/top-reasons-to-invest-in-a-supermarket-franchise-business',
    '/blogs/top-5-reasons-to-start-a-supermarket-business-in-2025' => '/blogs/reasons-to-start-a-supermarket-business',
    '/blogs/best-franchise-grocery-store'                        => '/blogs/invest-smartly-in-best-grocery-store-franchise',
    '/blogs/supermarket-franchise-cost'                          => '/blogs/7xbasket-affordable-supermarket-franchise',
    '/blogs/best-grocery-store-franchise'                        => '/blogs/step-into-success-with-best-grocery-store-franchise',
    '/blogs/indian-grocery-franchise'                            => '/blogs/path-to-success-with-7xbasket',
    '/blogs/supermarket-franchise-in-india'                      => '/blogs/how-to-start-a-supermarket-franchise-with-7xbasket',
    '/blogs/grocery-mart-franchise'                              => '/blogs/best-investment-for-profitable-retail-growth',
    '/blogs/super-market-franchise'                              => '/blogs/your-gateway-to-profitable-retail-business',
    '/blogs/grocery-store-franchise-cost'                        => '/blogs/grocery-store-franchise-investment-breakdown',
    '/blogs/mini-grocery-store-franchise'                        => '/blogs/why-mini-grocery-store-franchise-is-a-smart-investment',
    '/blogs/best-grocery-franchise'                              => '/blogs/best-grocery-franchise-business-opportunity-with-7xbasket',
    '/blogs/mini-supermarket-franchise'                          => '/blogs/mini-supermarket-franchise-opportunity-with-7xbasket',
    '/blogs/top-5-supermarket-franchises-growing-in-india'       => '/blogs/top-growing-supermarket-franchises-in-india',
    '/blogs/best-supermarket-franchise-in-india'                 => '/blogs/why-7xbasket-is-best-supermarket-franchise',
    '/blogs/grocery-store-franchise'                             => '/blogs/7xbasket-premier-grocery-store-franchise-opportunity',
    '/blogs/supermarket-franchise'                               => '/blogs/comprehensive-guide-to-supermarket-franchise',
    '/blogs/supermarket-business-franchises-in-india'            => '/blogs/popularity-of-supermarket-business-franchises',
    '/blogs/cost-of-opening-a-supermarket'                       => '/blogs/true-cost-of-opening-a-supermarket',
];

foreach ($sheetRedirects as $from => $to) {
    // Register both with and without trailing slash
    Route::get($from, fn() => redirect($to, 301));
    Route::get($from . '/', fn() => redirect($to, 301));
}

/*
 * |--------------------------------------------------------------------------
 * | Legacy URL Redirects (old 7xbasket.com WordPress URLs → new /blogs/{slug})
 * | These slugs redirect to the same slug under /blogs/
 * |--------------------------------------------------------------------------
 */
$legacySlugs = [
    'top-7-grocery-franchise-in-india',
    '7xbasket-is-revolutionizing-indian-grocery',
    'how-to-maximize-profit-in-mini-supermarket-franchise',
    'grocery-franchise-business-in-india',
    'grocery-shopping-in-india',
    'market-research-your-first-step-to-grocery-franchise-success',
    'small-budget-grocery-business',
    'cheapest-grocery-store-franchise',
];

foreach ($legacySlugs as $slug) {
    Route::get('/' . $slug, fn() => redirect('/blogs/' . $slug, 301));
    Route::get('/' . $slug . '/', fn() => redirect('/blogs/' . $slug, 301));
}

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
        Route::put('/seo-global', [Admin\SeoController::class, 'updateGlobal'])->name('seo.global.update');
        // Visitors & IP Blocking
        Route::get('/visitors', [Admin\VisitorController::class, 'index'])->name('visitors.index');
        Route::get('/blocked-ips', [Admin\VisitorController::class, 'blockedIps'])->name('blocked-ips.index');
        Route::post('/blocked-ips', [Admin\VisitorController::class, 'blockIp'])->name('blocked-ips.store');
        Route::patch('/blocked-ips/{blockedIp}/unblock', [Admin\VisitorController::class, 'unblockIp'])->name('blocked-ips.unblock');
        Route::delete('/blocked-ips/{blockedIp}', [Admin\VisitorController::class, 'destroyBlockedIp'])->name('blocked-ips.destroy');
        // Redirects
        Route::resource('redirects', Admin\RedirectController::class);
        Route::patch('/redirects/{redirect}/toggle', [Admin\RedirectController::class, 'toggle'])->name('redirects.toggle');
    });
});