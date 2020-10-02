<?php

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

Route::get('/', function () {
    return view('welcome');
});


/////---User Routes---

//Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', "App\Http\Controllers\UserController@dashboard");

//All Users
Route::middleware(['auth:sanctum', 'verified'])->get('/allusers', "App\Http\Controllers\UserController@allusers");

//Show Student's Details
Route::middleware(['auth:sanctum', 'verified'])->get('/show/{user_id}', "App\Http\Controllers\UserController@show");


/////--Book Routes---

//All Books
Route::middleware(['auth:sanctum', 'verified'])->get('/allbooks', "App\Http\Controllers\BooksController@allbooks");

//Add a Book
Route::middleware(['auth:sanctum', 'verified'])->get('/add', "App\Http\Controllers\BooksController@addbooks");

//Submit the Added book
Route::middleware(['auth:sanctum', 'verified'])->get('/submit', "App\Http\Controllers\BooksController@submitbook");

//Edit book's detail
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{books_id}',  "App\Http\Controllers\BooksController@editbook");

//Update button
Route::middleware(['auth:sanctum', 'verified'])->get('/update/{books_id}', "App\Http\Controllers\BooksController@update");

//Delete
Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{books_id}', "App\Http\Controllers\BooksController@delete");

//Borrow Button
Route::middleware(['auth:sanctum', 'verified'])->get('/return/{id}', "App\Http\Controllers\BooksController@borrow");

//Return Date and Time
Route::middleware(['auth:sanctum', 'verified'])->get('/date_time/{books_id}', "App\Http\Controllers\BooksController@return");

//Borrowed Books
 Route::middleware(['auth:sanctum', 'verified'])->get('/borrowedbooks', "App\Http\Controllers\BooksController@borrowed");
 
// Return Button
Route::middleware(['auth:sanctum', 'verified'])->get('/borrowedbooks/{id}', "App\Http\Controllers\BooksController@returnbutton");

////

