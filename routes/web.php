<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/service', [PagesController::class, 'service']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
To generate the route code for adding resources using Laravel resourceful routing, 
you can define a resource route in your routes/web.php file. 
Assuming you have a PostsController and you want to create CRUD routes for posts, 
you can use the Route::resource method.
*/
Route::resource('posts', App\Http\Controllers\PostsController::class);