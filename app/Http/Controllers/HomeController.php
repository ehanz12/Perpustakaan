<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home.index', compact('books'));
    }

    public function borrow_books($id)
    {
        $books = Book::find($id);
        $book_id = $id;
        $quantity = $books->quantity;
        if($quantity >= '1'){

            if(Auth::id()){
               $user = Auth::user()->id; 
               $borrow = new Borrow;
               $borrow->book_id = $book_id;
               $borrow->user_id = $user;
               $borrow->save();
               return redirect()->back()->with('message', 'request telah dikirimkan ke admin');
            }else {
                return redirect('/login');
            }

        }else {
            return redirect()->back()->with('message', 'Buku tidak cukup');
        }
    }
}
