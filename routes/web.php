<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , 'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/home');
    })->name('dashboard');

});
Route::get('/home' , [HomeController:: class, 'redirect'])->name('home');
Route::get('/about-Us' , [HomeController:: class, 'aboutUs'])->name('aboutUs');
Route::get('/doctor-Page' , [HomeController:: class, 'doctorPage'])->name('doctorPage');
Route::get('/contactUs' , [HomeController:: class, 'contactUs'])->name('contactUs');
Route::get('/news' , [HomeController:: class, 'news'])->name('news');



//For Admin
Route::get('/add_doctor_view' , [AdminController:: class, 'addView'])->name('addView');
Route::post('/upload_doctor' , [AdminController:: class, 'uploadDoctor'])->name('uploadDoctor');
Route::get('/show_appointments' , [AdminController:: class, 'showAppointments'])->name('showAppointments');
Route::get('/approved/{id}' , [AdminController:: class, 'approveAppointments'])->name('approveAppointments');
Route::get('/cancel/{id}' , [AdminController:: class, 'cancelAppointments'])->name('cancelAppointments');
Route::get('/show-doctor' , [AdminController:: class, 'showDoctor'])->name('showDoctor');
Route::get('/delete-doctor/{id}' , [AdminController:: class, 'deleteDoctor'])->name('deleteDoctor');
Route::get('/update-doctor/{id}' , [AdminController:: class, 'updateDoctor'])->name('updateDoctor');
Route::post('/edit-Doctor/{id}' , [AdminController:: class, 'editDoctor'])->name('editDoctor');


//For user
Route::post('appointment' , [HomeController::class, 'appointment'])->name('appointment');
Route::get('my-appointment' , [HomeController::class, 'myAppointment'])->name('myAppointment');
Route::get('cancel-appointment/{id}' , [HomeController::class, 'cancelAppointment'])->name('cancelAppointment');
