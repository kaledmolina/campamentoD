<?php

use App\Livewire\CamperConsultation;
use App\Livewire\CreateRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', CreateRegistration::class)->name('registration');
Route::get('/consulta', CamperConsultation::class)->name('consultation');

Route::middleware('auth')->group(function () {
    Route::get('/ticket/download', [App\Http\Controllers\TicketController::class, 'download'])->name('ticket.download');
    Route::get('/ticket/scan', [App\Http\Controllers\TicketController::class, 'scanner'])->name('tickets.scan');
    Route::get('/ticket/validate/{user}', [App\Http\Controllers\TicketController::class, 'validateUser'])->name('tickets.validate');
});