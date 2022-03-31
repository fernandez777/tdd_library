<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function store(BookRequest $request){
        return Book::create($request->validated());
    }

    public function update(Book $book,BookRequest $request){
        return $book->update($request->validated());
    }
}
