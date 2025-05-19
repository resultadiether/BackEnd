<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return Book::all();
    }
    
    public function borrow($id) {
        $book = Book::findOrFail($id);
        $book->update(['status' => 'Borrowed']);
        return response()->json($book);

    }
    
    public function return($id) {
        $book = Book::findOrFail($id);
        $book->update(['status' => 'Available']);
        return response()->json($book);
    }
    

}