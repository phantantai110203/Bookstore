<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favoritebook;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFavoritebookRequest;
use App\Http\Requests\UpdateFavoritebookRequest;
use Illuminate\Support\Facades\Storage;

class FavoritebookController extends Controller
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
        $book = Book::orderBy('name', 'ASC')->get();
        $userId = auth()->user()->id;
        $favoritebookItems = Favoritebook::where('user_id', $userId)->get();
        foreach ($book as $p) {
            $this->fixImage($p);
        }
        return view('pages.favoritebook', compact('favoritebookItems', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bookId = $request->input('book_id');
        $price = $request->input('price');
        // $quantity = $request->input('quantity');
        $userId = auth()->user()->id; // Lấy ID của người dùng đã đăng nhập

        $existingFavoritebookItem = Favoritebook::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();
        if ($existingFavoritebookItem) {
            return redirect()->back()->with('error', 'book already exists in the favorite.');
        }
        $favoritebookItems = new Favoritebook();
        $favoritebookItems->user_id = $userId;
        $favoritebookItems->book_id = $bookId;
        $favoritebookItems->price = $price;
        // $favoritebookItems->quantity = $quantity;
        $favoritebookItems->save();
        return redirect()->back()->with('success', 'book added to favorite successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoritebookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favoritebook $favoritebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favoritebook $favoritebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $favoritebookItems = Favoritebook::where('book_id', $id)->first();

        if ($favoritebookItems) {
            $favoritebookItems->delete();
            // Chuyển hướng trở lại bằng thông báo thành công hoặc thực hiện các hành động khác nếu cần
            return redirect()->back()->with('success', ' favoritebook Items deleted successfully');
        }

        // Chuyển hướng trở lại với thông báo lỗi nếu không tìm thấy mục
        return redirect()->back()->with('error', ' favoritebook Items item not found');
    }
}
