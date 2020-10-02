<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function allbooks(){
        $books = Books::all();
        return view('allbooks',['books'=>$books]);
    }

    public function addbooks(){
        return view('add');
    }

    public function submitbook(){
        $name = request("name");
        $author = request("author");
        $edition = request("edition");
        $books = new books;
        $books->name = $name;
        $books->author = $author;
        $books->edition_no = $edition;
        $books->save();
        return redirect('/allbooks');
    }

    public function editbook($books_id){
        $book_data = Books::findOrFail($books_id);
        return view('edit',["books"=>$book_data]);
    }

    public function update($books_id) {
        $books = Books::findOrFail($books_id);
        $books->name = request('name');
        $books->author = request('author');
        $books->edition_no = request('edition');
        $books->save();
        return redirect ("allbooks/");
    }

    public function delete($books_id) {
        $books = Books::findOrFail($books_id);
        define("db_host", "localhost");
        define("db_user", "root");
        define("db_pass", "");
        define("db_db", "project");
        $db = mysqli_connect(db_host, db_user, db_pass, db_db,3307);
        $sql = "DELETE FROM project.books WHERE ID=$books_id"; 
        mysqli_query($db, $sql); 
        return redirect ("allbooks");
    }

    public function borrow($id) { 
        $books_data = Books::findOrFail($id);
        return view('return',["books"=>$books_data]);
    }

    function return ($books_id) {
        $books = Books::findOrFail($books_id);
        $user_name = Auth::user()->name;
        $books->borrowed_by = $user_name;
        $books->return_date = request('date');
        $books->return_time = request('time');
        $books->save();
        $books = Books::find($books_id)->delete();
        return redirect ("/borrowedbooks");
    }

    public function borrowed(){
        $books = Books::onlyTrashed()->latest()->paginate();
        $books2 = Books::onlyTrashed()->latest()->paginate();
        return view('borrowedbooks',["books"=>$books],["books2"=>$books2]); 
    }
     
    public function returnbutton($id) {
        $books = Books::onlyTrashed()->where('id',$id)->first()->restore();
        $books = Books::findOrFail($id);
        $books->borrowed_by = null;
        $books->return_date = null;
        $books->return_time = null;
        $books->save();
        return redirect('borrowedbooks');
    }
}