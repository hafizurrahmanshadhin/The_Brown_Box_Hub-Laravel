<?php

use App\Http\Controllers\ResetController;
use App\Http\Controllers\Web\Frontend\AboutController;
use App\Http\Controllers\Web\Frontend\ContactController;
use App\Http\Controllers\Web\Frontend\DynamicPageController;
use App\Http\Controllers\Web\Frontend\FAQController;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\PricingController;
use App\Http\Controllers\Web\Frontend\StripeController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\ManagePlanController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\PackageController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\PartnerAccessController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\PaymentController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\PersonalDetailsController;
use App\Http\Controllers\Web\Frontend\User_Dashboard\SecurityController;
use App\Models\Content;
use Illuminate\Support\Facades\Route;

//! Route for Reset Database and Optimize Clear
Route::get('/reset', [ResetController::class, 'RunMigrations'])->name('reset');

//~ Route for Non Authenticate and Web Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/subscription-details/{id}', [StripeController::class, 'subscriptionDetails'])->name('subscription-details');
Route::get('/faq', [FAQController::class, 'index'])->name('faq');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'store')->name('contact.store');
});

//# Route for User Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/package', [PackageController::class, 'index'])->name('user.dashboard.package');
    Route::get('/manage-plan', [ManagePlanController::class, 'index'])->name('user.dashboard.manage-plan');
    Route::get('/payment', [PaymentController::class, 'index'])->name('user.dashboard.payment');

    Route::controller(PersonalDetailsController::class)->group(function () {
        Route::get('/personal-details', 'index')->name('user.dashboard.personal-details');
        Route::patch('/update-user-profile', 'UpdateUserProfile')->name('update.user-profile');
    });

    Route::controller(SecurityController::class)->group(function () {
        Route::get('/security', 'index')->name('user.dashboard.security');
        Route::put('/update-user-password', 'UpdateUserPassword')->name('update.user-Password');
    });

    Route::get('/partner-access', [PartnerAccessController::class, 'index'])->name('user.dashboard.partner-access');
});

//$ Route for Stripe Payment
Route::middleware('auth')->group(function () {
    Route::post('/subscription/checkout', [StripeController::class, 'checkout'])->name('subscription.checkout');
});
Route::get('/subscription/success', [StripeController::class, 'success'])->name('subscription.success');
Route::get('/subscription/cancel', [StripeController::class, 'cancel'])->name('subscription.cancel');

//^ Route for Terms and Conditions
Route::get('/terms-and-conditions', function () {
    $terms_and_conditions = Content::where('type', 'termsAndConditions')->first();
    return view('frontend.layouts.terms_and_conditions.index', compact('terms_and_conditions'));
})->name('terms-and-conditions');

//& Route for Privacy Policy
Route::get('/privacy-policy', function () {
    $privacyPolicy = Content::where('type', 'privacyPolicy')->first();
    return view('frontend.layouts.privacy_policy.index', compact('privacyPolicy'));
})->name('privacy-policy');

//* This Route is for Dynamic Page in the frontend footer
Route::get('/page/{page_slug}', [DynamicPageController::class, 'index'])->name('custom.page');

require __DIR__ . '/auth.php';
