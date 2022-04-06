<?php

use App\Http\Controllers\StudentsController;
use App\Http\Livewire\Crud\IndexComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Crud\EditStudentComponent;

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
    return view('welcome');
});

//route student
Route::get('/students', [StudentsController::class,'students'])->name('students');


//route add student

Route::get('/addstudents', [StudentsController::class, 'addstudents'])->name('addstudents');

// Route for edit
Route::get('/editstudents/{id}', [StudentsController::class, 'editstudents'])->name('editstudents');


// Route for delete
Route::get('/delete/{id}', [StudentsController::class, 'delete'])->name('delete');


Route::get('/base64', function () {
    $image = file_get_contents(public_path('/image/lWBozh1fk2y6yRu8OnhNyX4R5IOIH75lvAA7ztM4.jpg'));

    return base64_encode($image);
});