<?php

namespace App\Http\Controllers;

use App\Models\FontSize;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminIndex()
    {
        $fonts = FontSize::all();
        return view('admin.admin-dashboard', compact('fonts'));
    }
}
