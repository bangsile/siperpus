<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('pages.book.index');
    }

    public function create()
    {
        return view('pages.book.create');
    }

    public function edit($id)
    {
        return view('pages.book.edit', compact('id'));
    }
}
