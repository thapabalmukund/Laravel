<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\StudentController;
 

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
// Route::resource('/student', StudentController::class);
Auth::routes();
Route::middleware('auth')->group(function () {
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students',[StudentController::class,'store'])->name('students');
Route::get('/students',[StudentController::class,'index'])->name('students.index');

Route::get('/students/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::put('/students/{id}',[StudentController::class, 'update'])->name('students.update');
Route::get('/students/delete/{id}',[StudentController::class,"destroy"])->name('students.delete');
// Route::match(['put', 'patch'], '/students/update/{id}','StudentController@update');
});
Route::get('/', function () {
    return view('welcome');
});