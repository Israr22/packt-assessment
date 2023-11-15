<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->paginate(10);
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create($request->post());
        return response()->json([
            'message'=>'Book Created Successfully!!',
            'book'=>$book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->fill($request->post())->save();
        return response()->json([
            'message'=>'Book Updated Successfully!!',
            'book'=>$book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message'=>'Book Deleted Successfully!!'
        ]);
    }

    public function search(Request $request){
        $searchQuery = $request;

        $book = Book::where('title','like','%'.$searchQuery['query'].'%')
        ->orWhere('author','like','%'.$searchQuery['query'].'%')
        ->orWhere('genre','like','%'.$searchQuery['query'].'%')
        ->orWhere('description','like','%'.$searchQuery['query'].'%')
        ->orWhere('isbn','like','%'.$searchQuery['query'].'%')
        ->orWhere('published','like','%'.$searchQuery['query'].'%')
        ->orWhere('publisher','like','%'.$searchQuery['query'].'%')->get();
        return response()->json($book);
    }
}
