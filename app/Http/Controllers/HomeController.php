<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Categories;
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
            return redirect()->back()->with('message', 'Buku sudah habis');
        }
    }

    public function book_history()
    {
        if(Auth::id()){
            $user_id = Auth::user()->id;
            $books = Borrow::where('user_id', $user_id)->get();
            return view('home.book_history', compact('books'));
        }else {
            return redirect()->back();
        }
    }

    public function cancel_request($id)
    {
        $data = Borrow::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Request telah dibatalkan');
    }

    public function explore()
    {
        $categories = Categories::all();
        $books = Book::all();
        return view('home.explore', compact('books', 'categories'));
    }
    
    public function search(Request $request)
    {
        $categories = Categories::all();
        $searchText = $request->search;
        $books = Book::where('title', 'LIKE', "%$searchText%")->orWhere('author_name', 'LIKE', "%$searchText%")->get();
        return view('home.explore', compact('books', 'categories'));
    }

    public function category_search($id)
    {
        $categories = Categories::all();
        $books = Book::where('category_id', $id)->get();
        return view('home.explore', compact('books', 'categories'));
    }
}
