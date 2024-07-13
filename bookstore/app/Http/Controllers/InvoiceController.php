<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Data;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Cart;
use App\Models\InvoiceDetail;
use App\Policies\InvoiceDetailPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{


    public function index()
    {
        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        $books = Book::orderBy('name', 'ASC')->get();
        $total = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });

        return view('pages.invoice', compact('carts', 'books', 'total'));
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
            'firstName' => 'required|string|max:255',
            'user_firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'ShippingAddress' => 'required|string|max:255',
            'ShippingPhone' => 'required|numeric',
            'invoiceMethod' => 'required|string'
        ]);
        // $total = $request->input('total');
        // $name = $request->input('name');
        // $ShippingPhone = $request->input('ShippingPhone');
        // $ShippingAddress = $request->input('ShippingAddress');
        // $userId = auth()->user()->id; // Lấy ID của người dùng đã đăng nhập
        $status = 'Chờ xác nhận';
        $invoice = new Invoice();

        $invoice->name = $request->name;
        $invoice->ShippingAddress = $request->ShippingAddress;
        $invoice->ShippingPhone = $request->ShippingPhone;
        // $invoice->payment_method = $request->invoiceMethod;
        $invoice->total = $request->total; // Make sure to pass the total amount in the form
        $invoice->status =$status;
        $invoice->user_id = Auth::id();
        $invoice->save();

        // lưu id vao sesstioni
        session(['invoice_id' => $invoice->id]);







        $carts = Cart::where('user_id', Auth::id())->get(); // Assuming you have a Cart model

        foreach ($carts as $cart) {
            $book = Book::find($cart->book_id); // Assuming you have a Book model
            if ($book) {
                $invoiceDetail = new InvoiceDetail();
                $invoiceDetail->invoice_id = $invoice->user_id;
                $invoiceDetail->book_id  = $book->id;
                // $invoiceDetail->price = $cart->price;
                $invoiceDetail->quantity = $cart->quantity;

                // $invoiceDetail->subtotal = $cart->price * $cart->quantity;
                $invoiceDetail->save();
            }
        }
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully!');



        // $invoice = new Invoice();


        // $invoice->user_id = $userId;
        // $invoice->name = $name;
        // $invoice->ShippingAddress = $ShippingAddress;
        // $invoice->ShippingPhone = $ShippingPhone;
        // // Tính tổng giỏ hàng
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->quantity * $cart->price;
        }

        // Set Total to
        $invoice->total = $total;



        $invoice->save();


        // return redirect()->back()->with('success', 'book added to cart successfully.');



    }
    public function transactionHistory()
    {
        $userId = Auth::id();
        $invoices = Invoice::where('user_id', $userId)->with('invoiceDetails.book')->get();

        return view('pages.history', compact('invoices'));
    }

    // public function otherPage(Request $request)
    // {
    //     $total = $request->input('total');
    //     // Sử dụng giá trị $total ở đây
    // }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

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