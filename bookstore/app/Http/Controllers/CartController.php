<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Request $request)
    {
        $userId = auth()->id(); // Assuming you're using authentication
        $bookId = $request->input('book_id');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Add new item to cart
            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'price' => $price,
                'quantity' => $quantity
            ]);
        }

        return response()->json(['message' => 'Item added to cart successfully']);
    }

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
        $cartItems = Cart::where('user_id', $userId)->get();
        foreach ($book as $p) {
            $this->fixImage($p);
        }
        return view('pages.cart', compact('cartItems', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bookId = $request->input('book_id');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $userId = auth()->user()->id; // Lấy ID của người dùng đã đăng nhập

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $existingCartItem = Cart::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, bạn có thể thực hiện các hành động khác hoặc trả về thông báo lỗi nếu cần
            return redirect()->back()->with('error', 'book already exists in the cart.');
        }

        // Tạo một bản ghi mới trong bảng "cart"

        $cartItem = new Cart();
        $cartItem->user_id = $userId;
        $cartItem->book_id = $bookId;
        $cartItem->price = $price;
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'book added to cart successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        // bỏ
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        // bỏ
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        // Lấy ID sách và số lượng mới từ biểu mẫu
        $bookId = $id;
        $newQuantity = request('quantity');

        // Cập nhật mục giỏ hàng trong cơ sở dữ liệu
        $cartItem = Cart::where('book_id', $bookId)->first();
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $newQuantity,
            ]);

            // Chuyển hướng trở lại bằng thông báo thành công hoặc thực hiện các hành động khác nếu cần
            return redirect()->back()->with('success', 'Cart item updated successfully');
        }
        // Chuyển hướng trở lại với thông báo lỗi nếu không tìm thấy mục giỏ hàng
        return redirect()->back()->with('error', 'Cart item not found');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = Cart::where('book_id', $id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => 0]);
            $cartItem->delete();
            // Chuyển hướng trở lại bằng thông báo thành công hoặc thực hiện các hành động khác nếu cần
            return redirect()->back()->with('success', 'Cart item deleted successfully');
        }

        // // Chuyển hướng trở lại với thông báo lỗi nếu không tìm thấy mục giỏ hàng
        // return redirect()->back()->with('error', 'Cart item not found');
        $product = Cart::findOrFail($id);
        $product->delete();


        return response()->json(['message' => 'Xóa sản phẩm thành công']);
    }
}