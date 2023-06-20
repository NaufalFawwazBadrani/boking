<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\JadwalDetailController;
use App\Http\Controllers\PenontonController;
use App\Http\Controllers\JadwalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home', ['title' => 'Beranda']);
    })->name('home');

    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    // Route position
    Route::resource('positions', PositionController::class);

    // Route departement
    Route::get('departements/exportpdf', [DepartementController::class, 'exportpdf'])->name('exportpdf');
    Route::resource('departements', DepartementController::class);

    // Route user
    Route::get('users/exportpdf', [UserController::class, 'exportPdf'])->name('users.exportpdf');
    Route::resource('users', UserController::class);

    Route::get('position/exportexcel', [PositionController::class, 'exportExcel'])->name('exporExcel');


    
 //route dokters


 //route chart
 Route::get('chart-line', [JadwalController::class, 'chartLine'])->name('jadwals.chartLine');
 Route::get('chart-line-ajax', [JadwalController::class, 'chartLineAjax'])->name('jadwals.chartLineAjax');
    

    Route::resource('penontons', PenontonController::class);
    Route::resource('jadwals', JadwalController::class);
    Route::get('search/penonton', [PenontonController::class, 'autocomplete'])->name('search.penonton');
});
