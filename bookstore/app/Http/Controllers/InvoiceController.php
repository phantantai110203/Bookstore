<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Data;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Author;
use App\Models\Cart;
use App\Models\InvoiceDetail;
use App\Models\User;
use App\Policies\InvoiceDetailPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
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

    // Phương thức để hủy đơn hàng
    public function cancel($id)
    {
        // Tìm đơn hàng theo ID
        $order = Invoice::findOrFail($id);

        // Kiểm tra nếu đơn hàng không phải là 'Chờ xác nhận' thì không cho phép hủy
        if ($order->status !== 'Chờ xác nhận') {
            return redirect()->back()->with('error', 'Không thể hủy đơn hàng đã được xử lý hoặc hủy.');
        }

        // Cập nhật trạng thái của đơn hàng thành 'Đã huỷ'
        $order->status = 'Đã huỷ';
        $order->save();

        // Redirect về trang chi tiết đơn hàng với thông báo thành công
        return redirect()->back()->with('success', 'Đã hủy đơn hàng thành công.');
    }


    public function index()
    {
        $count = Invoice::all();
        $count_invoice = count($count);
        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        $invoices = Invoice::orderBy('created_at', 'desc')->get();
        $books = Book::orderBy('name', 'ASC')->get();
        $total = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });
        foreach ($books as $p) {
            $this->fixImage($p);
        }

        return view('pages.invoice', compact('carts', 'books', 'total', 'invoices', 'count_invoice'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([

            'name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'ShippingAddress' => 'required|string|max:255',
            'ShippingPhone' => 'required|numeric',
            'invoiceMethod' => 'required|string'
        ]);

        $invoice = new Invoice();

        $invoice->name = $request->name;
        $invoice->ShippingAddress = $request->ShippingAddress;
        $invoice->ShippingPhone = $request->ShippingPhone;
        // $invoice->payment_method = $request->invoiceMethod;
        $invoice->total = $request->total; // Make sure to pass the total amount in the form
        $invoice->user_id = Auth::id();
        $invoice->status = 'Chờ xác nhận';
        $invoice->save();




        $carts = Cart::where('user_id', Auth::id())->get(); // Assuming you have a Cart model

        foreach ($carts as $cart) {

            $invoiceDetail = InvoiceDetail::create([
                'invoice_id' => $invoice->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,

            ]);
        }
        // dd($invoiceDetail->invoice_id);
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('index')->with('success', 'Invoice created successfully!');




    }
    public function transactionHistory()
    {
        $userId = Auth::id();


        $invoices = Invoice::where('user_id', $userId)
            ->with('invoicedetails.book')
            ->orderBy('created_at', 'desc')
            ->get();

        // Truyền dữ liệu qua view
        return view('pages.history', compact('invoices', 'userId'));
    }


    // public function show($id)
    // {
    //     $userId = auth()->user()->id;

    //     // Lấy hóa đơn và chi tiết hóa đơn theo id
    //     $invoices = Invoice::where('user_id', $userId)->with('invoicedetails.book')->get();

    //     // Lấy danh sách sách
    //     // $books = $invoices[0]->invoicedetails[0]->Book;


    //     return view('pages.invoice-detail', compact('invoices', 'books'));
    // }
    public function show($id)
    {
        $oders_details = InvoiceDetail::where('invoice_id', $id)->get();
        $oders = Invoice::where('id', $id)->get();
        foreach ($oders as $key => $ord) {
            $user_id = $ord->user_id;
            $book_id = $ord->book_id;
        }
        $user = User::where('id', $user_id)->first();
        if ($oders->isEmpty()) {
            // Xử lý khi không tìm thấy hóa đơn
            abort(404);
        }
        // Load chi tiết hóa đơn (InvoiceDetail) thông qua quan hệ trong mô hình Invoice
        // Lấy danh sách sản phẩm (books) dựa trên book_id trong chi tiết hóa đơn
        $books = [];
        foreach ($oders_details as $detail) {
            $book = Book::find($detail->book_id);
            if ($book) {
                $books[] = $book;
            }
        }
        //return $oders_details;
        return view('pages.invoice-detail')->with(compact('oders_details', 'user', 'oders', 'books'));
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}