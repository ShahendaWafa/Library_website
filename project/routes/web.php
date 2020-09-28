<?php

use Illuminate\Support\Facades\Route;
use App\Models\Books;
use App\Models\User;
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


//Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//All Books
Route::middleware(['auth:sanctum', 'verified'])->get('/allbooks', function () {
    $books = Books::all();
    return view('allbooks',['books'=>$books]);
})->name('allbooks');


//All Users
Route::middleware(['auth:sanctum', 'verified'])->get('/allusers', function () {
    $users = User::all();
    return view('allusers',['users'=>$users]);
})->name('allusers');


//Add a Book
Route::middleware(['auth:sanctum', 'verified'])->get('/add', function () {
    return view('add');
})->name('add');


//Submit the Added book
Route::middleware(['auth:sanctum', 'verified'])->get('/submit', function () {
    $name = request("name");
    $author = request("author");
    $edition = request("edition");
    $books = new books;
    $books->name = $name;
    $books->author = $author;
    $books->edition_no = $edition;
    $books->save();
    return redirect('/allbooks');
})->name('submit');


//Edit book's detail
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{books_id}', function ($books_id) {
    $book_data = Books::findOrFail($books_id);
    return view('edit',["books"=>$book_data]);
})->name('edit');


//Update button
Route::middleware(['auth:sanctum', 'verified'])->get('/update/{books_id}', function ($books_id) {
        $books = Books::findOrFail($books_id);
        $books->name = request('name');
        $books->author = request('author');
        $books->edition_no = request('edition');
        $books->save();
        return redirect ("allbooks/");
})->name('update');


//Delete
Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{books_id}', function ($books_id) {
    $books = Books::findOrFail($books_id);
    $books->delete($books->id);
    return redirect ("allbooks");
})->name('delete');


//Show Student's Details
Route::middleware(['auth:sanctum', 'verified'])->get('/show/{user_id}', function ($user_id) {
    $user_data = User::findOrFail($user_id);
    return view('show',["user"=>$user_data]);
})->name('show');


//Borrow Button
Route::middleware(['auth:sanctum', 'verified'])->get('/return/{id}', function ($id) { 
    $books_data = Books::findOrFail($id);
    return view('return',["books"=>$books_data]);
})->name('return');

//Return Date and Time
Route::middleware(['auth:sanctum', 'verified'])->get('/date_time/{books_id}', function ($books_id) {
    $books = Books::findOrFail($books_id);
    $user_name = Auth::user()->name;
    $books->borrowed_by = $user_name;
    $books->return_date = request('date');
    $books->return_time = request('time');
    $books->save();
    $books = Books::find($books_id)->delete();
    return redirect ("/borrowedbooks");
})->name('date_time');


//Borrowed Books
 Route::middleware(['auth:sanctum', 'verified'])->get('/borrowedbooks', function () {
    $books = Books::onlyTrashed()->latest()->paginate();
    $books2 = Books::onlyTrashed()->latest()->paginate();
    return view('borrowedbooks',["books"=>$books],["books2"=>$books2]); 
})->name('borrowedbooks');
 

// Return Button
Route::middleware(['auth:sanctum', 'verified'])->get('/borrowedbooks/{id}', function ($id) {
    $books = Books::onlyTrashed()->where('id',$id)->first()->restore();
    $books = Books::findOrFail($id);
    $books->borrowed_by = null;
    $books->return_date = null;
    $books->return_time = null;
    $books->save();
    return redirect('borrowedbooks');
})->name('borrowedbooks');

////

