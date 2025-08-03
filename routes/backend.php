<?php

use App\Http\Controllers\Web\Backend\ClientsFeedbackController;
use App\Http\Controllers\Web\Backend\ContactController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\EstablishPhiladelphiaPresenceController;
use App\Http\Controllers\Web\Backend\FAQController;
use App\Http\Controllers\Web\Backend\GrowPhiladelphiaBusinessController;
use App\Http\Controllers\Web\Backend\SubscriptionController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\WorkProcessController;
use Illuminate\Support\Facades\Route;

//! Route for Admin Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//! Route for Users Page
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/status/{id}', 'status')->name('user.status');
});

//! Route for Calendly Events
// Route::get('/calendly-events', [CalendlyController::class, 'index'])->name('calendly.index');

//! Route for FAQ Page
Route::controller(FAQController::class)->group(function () {
    Route::get('/faq', 'index')->name('faq.index');
    Route::get('/faq/create', 'create')->name('faq.create');
    Route::post('/faq/store', 'store')->name('faq.store');
    Route::get('/faq/edit/{id}', 'edit')->name('faq.edit');
    Route::put('/faq/update/{id}', 'update')->name('faq.update');
    Route::get('/faq/status/{id}', 'status')->name('faq.status');
    Route::delete('/faq/destroy/{id}', 'destroy')->name('faq.destroy');
});

//! Route for ClientsFeedback Backend
Route::controller(ClientsFeedbackController::class)->group(function () {
    Route::get('/clients-feedback', 'index')->name('clients-feedback.index');
    Route::get('/clients-feedback/create', 'create')->name('clients-feedback.create');
    Route::post('/clients-feedback/store', 'store')->name('clients-feedback.store');
    Route::get('/clients-feedback/edit/{id}', 'edit')->name('clients-feedback.edit');
    Route::put('/clients-feedback/update/{id}', 'update')->name('clients-feedback.update');
    Route::get('/clients-feedback/status/{id}', 'status')->name('clients-feedback.status');
    Route::delete('/clients-feedback/destroy/{id}', 'destroy')->name('clients-feedback.destroy');
});

//! Route for Contacts Page
Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'index')->name('contacts.index');
    Route::get('/contacts/status/{id}', 'status')->name('contacts.status');
    Route::delete('/contacts/destroy/{id}', 'destroy')->name('contacts.destroy');
});

//! Route for Work Process Page
Route::controller(WorkProcessController::class)->group(function () {
    Route::get('/work-process', 'index')->name('work-process.index');
    Route::patch('/work-process', 'update')->name('work-process.update');
});

//! Route for Work Grow Philadelphia Business Page
Route::controller(GrowPhiladelphiaBusinessController::class)->group(function () {
    Route::get('/grow-philadelphia-business', 'index')->name('grow-philadelphia-business.index');
    Route::patch('/grow-philadelphia-business', 'update')->name('grow-philadelphia-business.update');
});

//! Route for Establish Philadelphia Presence Page
Route::controller(EstablishPhiladelphiaPresenceController::class)->group(function () {
    Route::get('/establish-philadelphia-presence', 'index')->name('establish-philadelphia-presence.index');
    Route::patch('/establish-philadelphia-presence', 'update')->name('establish-philadelphia-presence.update');
});

//! Route for Subscription Backend
Route::controller(SubscriptionController::class)->group(function () {
    Route::get('/subscription', 'index')->name('subscription.index');
    // Route::get('/subscription/create', 'create')->name('subscription.create');
    // Route::post('/subscription/store', 'store')->name('subscription.store');
    Route::get('/subscription/edit/{id}', 'edit')->name('subscription.edit');
    Route::put('/subscription/update/{id}', 'update')->name('subscription.update');
    Route::get('/subscription/status/{id}', 'status')->name('subscription.status');
    Route::delete('/subscription/destroy/{id}', 'destroy')->name('subscription.destroy');
});
