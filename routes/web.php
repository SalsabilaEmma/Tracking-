<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\EmployeesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/try', function () {
    return view('tracking.index');
});

Route::resource('/posts', App\Http\Controllers\CrudController::class);

Route::resource('category', CategoryController::class, ['except' => [
    'create', 'update','show'
]]);
// Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
// Route::get('/category', [CategoryController::class, 'data'])->name('crud.category');
// Route::get('/category-store', [CategoryController::class, 'store'])->name('category.store');

// Route::get('/','EmployeesController@index');
// Route::get('/', [EmployeesController::class, 'index']);
// Route::get('/employees/getEmployees/', [EmployeesController::class, 'getEmployees'])->name('employees.getEmployees');
// Route::get('/employees/getEmployees/','EmployeesController@getEmployees')->name('employees.getEmployees');

Route::get('/', [CrudController::class, 'index'])->name('index');
Route::get('/getUsers', [CrudController::class, 'getUsers'])->name('getUsers');
Route::post('/addUser', [CrudController::class, 'addUser'])->name('addUser');
Route::post('/updateUser', [CrudController::class, 'updateUser'])->name('updateUser');
Route::get('/deleteUser/{id}', [CrudController::class, 'deleteUser'])->name('deleteUser');
