<?php

use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class,'welcome']);

Route::get('get-db1',[TestController::class,'getFromdb1'])->name('getFromdb1');
Route::get('get-db2',[TestController::class,'getFromdb2'])->name('getFromdb2');
Route::get('insert-db2',[TestController::class,'insertIntoDb2'])->name('insertIntoDb2');
Route::post('insert-salary',[TestController::class,'insertSalary'])->name('insertSalary');
