<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function fixImage(Book $p)
    {
        //tự dowdload hình ảnh bất kỳ vào và để vào thư mục public/img
        if ($p->img && Storage::disk('public')->exists($p->img)) {
            $p->img = Storage::url($p->img);
        }
        // else {
        //     $p->img = '/img/sgktoan.jpg';
        // }
    }
    public function index()
    {
        //tim kiếm ở trang home
        $cats = Category::orderBy('name', 'ASC')->get();
        $book = Book::orderBy('created_at', 'DESC')->get();
        if ($key = request()->key) {
            $book = Book::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $key . '%')->get();
        }
        foreach ($book as $p) {
            $this->fixImage($p);
        }
        return view('pages.home', compact('book', 'cats'));
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
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
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
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
