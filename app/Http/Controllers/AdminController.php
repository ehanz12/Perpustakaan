<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
           $usertype = Auth::user()->usertype;

           if($usertype == 'admin')
           {
            return view('admin.index');
           } 
           else if($usertype == 'user')
           {
            $books = Book::all();
            return view('home.index', compact('books'));
           }
        }

        else
        {
            return redirect()->back();
        }
    }

    public function categories_page()
    {
        $datas = Categories::all();
        return view('admin.categories_page', compact('datas'));
    }

    public function add_category(Request $request)
    { 
        $data = new Categories;
        $data->title = $request->category;
        $data->save();
        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function edit_category($id)
    {
        $data = Categories::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Categories::find($id);
        $data->title = $request->title;
        $data->save();
        return redirect('/categories_page')->with('success', 'Category updated successfully');
    }


    public function delete_category($id)
    {
        $data = Categories::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function add_book()
    {
        $datas = Categories::all();
        return view('admin.add_book', compact('datas'));
    }

    public function store_book(Request $request)
    {
        $data = new Book;
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->prince = $request->prince;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $book_img = $request->book_img;
        
        if($book_img){
          $book_img_name = time().'.'.$book_img->getClientOriginalExtension();
          $request->book_img->move('book_img', $book_img_name);
          $data->book_img = $book_img_name;  
        }

        $author_img = $request->author_img;

        if($author_img){
          $author_img_name = time().'.'.$author_img->getClientOriginalExtension();
          $request->author_img->move('author_img', $author_img_name);
          $data->author_img = $author_img_name;
        }

        $data->save();
        return redirect()->back()->with('success', 'Book added successfully');
    }

    public function show_book()
    {
        $books = Book::all();
        return view('admin.show_book', compact('books'));
    }

    public function delete_book($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Book deleted successfully');
    }

    public function edit_book($id)
    {
        $datas = Categories::all();
        $book = Book::find($id);
        return view('admin.edit_book', compact('datas', 'book'));
    }

    public function update_book(Request $request, $id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->prince = $request->prince;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $book_img = $request->book_img;

        if($book_img){

          $book_img_name = time().'.'.$book_img->getClientOriginalExtension();
          $request->book_img->move('book_img', $book_img_name);
          $data->book_img = $book_img_name;
        }
        $author_img = $request->author_img;
        if($author_img){
          $author_img_name = time().'.'.$author_img->getClientOriginalExtension();
          $request->author_img->move('author_img', $author_img_name);
          $data->author_img = $author_img_name;
        }
        $data->save();
        return redirect('/show_book')->with('success', 'Book added successfully');
    }

    public function borrow_request()
    {
        $borrows = Borrow::all();
        return view('admin.borrow_request', compact('borrows'));
    }

    public function update_borrow($id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if($status == 'approved'){
           return redirect()->back(); 
        }else {
            $data->status = 'approved';
            $data->save();
                // $data->status = 'approved';
                $book = Book::find($data->book_id);
                $quantity = $book->quantity - 1;
                $book->quantity = $quantity;
                $book->save();
                return redirect()->back();
        }
        
    }

    public function return_borrow($id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if($status == 'returned'){
           return redirect()->back(); 
        }else {
            $data->status = 'returned';
            $data->save();
                // $data->status = 'approved';
                $book = Book::find($data->book_id);
                $quantity = $book->quantity + 1;
                $book->quantity = $quantity;
                $book->save();
                return redirect()->back();
        }
    }

    public function rejected_borrow($id)
    {
        $data = Borrow::find($id);
        $data->status = 'rejected';
        $data->save();
        return redirect()->back();
    }
}
