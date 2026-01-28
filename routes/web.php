<?php

use App\Livewire\CamperConsultation;
use App\Livewire\CreateRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', CreateRegistration::class)->name('registration');
Route::get('/consulta', CamperConsultation::class)->name('consultation');
Route::get('/ticket/scan', [App\Http\Controllers\TicketController::class, 'scanner'])->name('tickets.scan');
Route::get('/ticket/validate/{user}', [App\Http\Controllers\TicketController::class, 'validateUser'])->name('tickets.validate')->middleware('signed');

Route::get('/ticket/view/{user}', [App\Http\Controllers\TicketController::class, 'show'])->name('ticket.show')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/ticket/download/{user}', [App\Http\Controllers\TicketController::class, 'download'])->name('ticket.download');
});