<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registroPacienteController;
use App\Http\Controllers\registroDoctorController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\pacienteController;

Route::get('/', function () {
    return view('index');
});

// LOGIN
Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// DOCTORES
Route::get('/registroDoctor', function () {
    return view('registroDoctor');
})->name('registroDoctor');

Route::get('/listaDoctores', function () {
    return view('listaDoctores');
})->name('listaDoctores');

Route::get('/doctores', [registroDoctorController::class, 'index'])->name('doctores.index');
Route::get('/doctores/crear', [registroDoctorController::class, 'create'])->name('doctores.create');
Route::post('/doctores', [registroDoctorController::class, 'store'])->name('doctores.store');
Route::get('/doctor/{id_doctor}', [doctorController::class, 'index'])->name('mainDoctor');

// PACIENTES
Route::get('/registroPaciente', function () {
    return view('registroPaciente');
})->name('registroPaciente');

Route::get('/paciente/{id_paciente}', [pacienteController::class, 'index'])->name('mainPaciente');
Route::get('/paciente', [registroPacienteController::class, 'index'])->name('paciente.index');
Route::get('/paciente/crear', [registroPacienteController::class, 'create'])->name('paciente.create');
Route::post('/paciente', [registroPacienteController::class, 'store'])->name('paciente.store');