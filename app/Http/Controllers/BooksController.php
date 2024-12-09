<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::with('creator', 'editor')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'author' => 'required',
            'published_at' => 'required',
        ]);

        $imagePath = $request->file('image')->store('books', 'public');

        Books::create([
            'title' => $request->title,
            'image' => $imagePath,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Books::with('creator', 'editor')->find($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'author' => 'required',
            'published_at' => 'required',
        ]);

        $book = Books::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        } else {
            $imagePath = $book->image;
        }

        $book->update([
            'title' => $request->title,
            'image' => $imagePath,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
