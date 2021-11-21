<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentController;

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
    
    return view('home');
})->middleware('auth');

Auth::routes();

Route::resource('firms', FirmController::class)->middleware('auth');


Route::resource('employees', EmployeeController::class)->middleware('auth');

Route::post('employments', [EmploymentController::class, 'store'])->middleware('auth')->name('employments.store');
Route::delete('employments/{employment}', [EmploymentController::class, 'destroy'])->middleware('auth')->name('employments.destroy');