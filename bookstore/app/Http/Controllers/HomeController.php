<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('layouts.app', compact('cats'));
    }
    public function book(Book $book)
    {
        $comments = Comment::where('book_id', $book->id)->orderBy('created_at', 'asc')->get();
        $cats = Category::orderBy('name', 'ASC')->get();
        $aut = Author::orderBy('name', 'ASC')->get();
        $lst = Book::where('category_id', $book->category_id)->limit(4)->get();
        $this->fixImage($book);
        return view('pages.products-detail', compact('book', 'cats', 'lst', 'aut', 'comments'));
    }
    //tim kiếm ở trang danh sách
    public function category(String $slug)
    {
        $cats = Category::orderBy('name', 'ASC')->get();
        $cat = Category::where('slug', $slug)->first();
        $book = Book::where('category_id', $cat->id)->get();
        if ($key = request()->key) {
            $book = Book::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $key . '%')->get();
        }

        foreach ($book as $p) {
            $this->fixImage($p);
        }
        return view('pages.category', compact('cats','cat', 'book'));
    }
    // public function categoryapp()
    // {
    //     $cats = Category::orderBy('id', 'ASC')->get();
    //     return view('layouts.app',['cats'=>$cats]);
    // }
}
