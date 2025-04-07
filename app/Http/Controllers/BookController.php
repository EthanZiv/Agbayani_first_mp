<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect('/')->with('error', 'Please enter a search term.');
        }

        $apiKey = env('BOOK_API');
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&key=$apiKey";

        $response = Http::get($url);

        if ($response->failed()) {
            return redirect('/')->with('error', 'Failed to retrieve books.');
        }

        $books = $response->json()['items'] ?? [];

        $savedBooks = \App\Models\Book::all();

        return view('project.home', compact('books', 'savedBooks'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|url',
        ]);

        $book = new Book();
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->image = $validated['image'];
        $book->save();

        return redirect()->back()->with('success', 'Book saved successfully!');
    }

    public function index() {
        $savedBooks = Book::all();
        return view('project.home', compact('savedBooks'));
    }
}
