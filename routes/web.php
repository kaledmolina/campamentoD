<?php

use App\Livewire\CamperConsultation;
use App\Livewire\CreateRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', CreateRegistration::class)->name('registration');
Route::get('/consulta', CamperConsultation::class)->name('consultation');