<?php

namespace App\Http\Controllers;

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
            return view('home.index');
           }
        }

        else
        {
            return redirect()->back();
        }
    }

    public function categories_page()
    {
        return view('admin.categories_page');
    }

    public function add_category(Request $request)
    { 
        $data = new Categories;
        $data->title = $request->category;
        $data->save();
        return redirect()->back()->with('success', 'Category added successfully');
    }
}
