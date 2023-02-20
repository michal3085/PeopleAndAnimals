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

/*
 *  People routes
 */
Route::get('/', [PeopleController::class, 'index'])->name('index');
Route::get('/people/new/', [PeopleController::class, 'newPeople'])->name('new.people');
Route::post('/people/add/', [PeopleController::class, 'addNewPeople'])->name('add.people');
Route::get('/people/show/{id}', [PeopleController::class, 'showPeople'])->name('show.people');
Route::post('/people/edit/save/{id}', [PeopleController::class, 'editPeople'])->name('edit.people');
Route::delete('/people/delete/{id}', [PeopleController::class, 'deletePeople'])->name('delete.people');
Route::get('/people/edit/{id}', [PeopleController::class, 'editPeopleView'])->name('edit.people.view');
Route::get('people/data/{id}', [PeopleController::class, 'peopleData']);

/*
 * Animals routes
 */
Route::post('/animal/add/{id}', [AnimalController::class, 'addAnimal'])->name('add.animal');
Route::post('/animal/edit/{id}', [AnimalController::class, 'editAnimal'])->name('edit.animal');
Route::delete('/animal/delete/{id}', [AnimalController::class, 'deleteAnimal'])->name('delete.animal');
