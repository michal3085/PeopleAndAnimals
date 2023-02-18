<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', [PeopleController::class, 'index'])->name('index');
Route::get('/people/new/', [PeopleController::class, 'newPeople'])->name('new.people');
Route::post('/people/add/', [PeopleController::class, 'addNewPeople'])->name('add.people');
Route::get('/people/show/{id}', [PeopleController::class, 'showPeople'])->name('show.people');
Route::post('/animal/add/{id}', [AnimalController::class, 'addAnimal'])->name('add.animal');
