@extends('layouts.index')

@section('title', 'Neoliterature - Home')

@section('content')
    <div class='title_container'>
        <div class="title_box">
            <h2>Welcome to Neoliterature</h2>
        </div>
        <div class="save_parent">
            <div class="save_site" id="toggleButton">
                <h1>View Saves!</h1>
            </div>

            <div id="dropdown" class="dropdown_content">
                <div class="dropdown_text">
                    @foreach ($savedBooks as $book)
                    <p>{{ $book->title }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main_box box1">
        <h class="box1_title">Search for your Books!</h>
        <input type="text" name="query" class="form-control" placeholder="Novels, Literature, Manga etc..." required>
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <form action="{{ route('search.books') }}" method="GET" class="search_bar"></form>


            @if(isset($books) && count($books) > 0)
                <div class="row">
                    @foreach($books as $book)
                        <div class="book_card">
                            <div class="book">
                                <a href="{{ $book['volumeInfo']['infoLink'] }}" target="_blank" style="text-decoration: none;">
                                    <img src="{{ $book['volumeInfo']['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/150' }}" class="Book-img-top" alt="Book Cover">
                                </a>
                                <div class="book-body">
                                    <h5 class="book_title">{{ $book['volumeInfo']['title'] }}</h5>
                                    <p class="book_text">{{ $book['volumeInfo']['authors'][0] ?? ' ' }}</p>
                                    <form action="{{ route('books.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="title" value="{{ $book['volumeInfo']['title'] }}">
                                        <input type="hidden" name="author" value="{{ $book['volumeInfo']['authors'][0] ?? ' ' }}">
                                        <input type="hidden" name="image" value="{{ $book['volumeInfo']['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/150' }}">
                                        <button type="submit" class="btn btn-primary">Save to Library</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
