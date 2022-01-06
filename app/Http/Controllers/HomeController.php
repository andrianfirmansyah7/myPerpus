<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Books::all();
        return view('home',compact('data'));
    }

    public function adminHome()
    {
        return view('admin');
    }

    public function librarianHome()
    {
        return view('librarianHome');
    }
}
