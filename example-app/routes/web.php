<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students',[StudentController::class,'store'])->name('students');
Route::get('/dashboard',[StudentController::class,'index'])->name('dashboard');
Route::get('/students/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::put('/students/{id}',[StudentController::class, 'update'])->name('students.update');
Route::get('/students/delete/{id}',[StudentController::class,"destroy"])->name('students.delete');
});

require __DIR__.'/auth.php';
