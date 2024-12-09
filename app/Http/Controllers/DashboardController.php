<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Books::all()->count();
        return view('index', compact('books'));
    }
}
