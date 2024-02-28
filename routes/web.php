<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('/hello', function () {
    return '<h1>Hello World~</h1>';
});

/*use post when submitting via form
Route::post('/hello', function () {
    return '<h1>Hello World~</h1>';
});*/

/*Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/users/{id}', function ($id) {
    return 'This is a user ' . $id;
});
*/