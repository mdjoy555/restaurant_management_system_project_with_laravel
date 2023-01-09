<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/users',[AdminController::class,'users']);
Route::get('/userdelete/{id}',[AdminController::class,'userdelelte']);
Route::get('/foods',[AdminController::class,'foods']);
Route::post('/uploadfood',[AdminController::class,'uploadfood']);
Route::get('/fooddelete/{id}',[AdminController::class,'fooddelete']);
Route::get('/foodupdate/{id}',[AdminController::class,'foodupdate']);
Route::post('/foodedit/{id}',[AdminController::class,'foodedit']);
Route::post('/reservation',[AdminController::class,'reservation']);
Route::get('/reservations',[AdminController::class,'reservations']);
Route::get('/chefs',[AdminController::class,'chefs']);
Route::post('/uploadchef',[AdminController::class,'uploadchef']);
Route::get('/chefupdate/{id}',[AdminController::class,'chefupdate']);
Route::post('/chefedit/{id}',[AdminController::class,'chefedit']);
Route::get('/chefdelete/{id}',[AdminController::class,'chefdelete']);
Route::post('/addcart/{id}',[HomeController::class,'addcart']);
Route::get('/showcart/{id}',[HomeController::class,'showcart']);
Route::get('/deletecart/{id}',[HomeController::class,'deletecart']);
Route::post('/order',[HomeController::class,'order']);
Route::get('/orders',[AdminController::class,'orders']);
Route::get('/search',[AdminController::class,'search']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
