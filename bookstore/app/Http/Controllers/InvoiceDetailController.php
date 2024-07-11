<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use App\Http\Requests\StoreInvoiceDetailRequest;
use App\Http\Requests\UpdateInvoiceDetailRequest;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $book = Book::orderBy('name', 'ASC')->get();
       $book_id=Auth::id();
        $carts = Cart::where('book_id', $book->id)->get();
        $quantity=0;
        foreach ($carts as $cart) {
            $quantity = $cart->quantity ;
        }
        return view('pages.invoice-detail', ['quantity' => $quantity]);
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
        $request->validate([

            'quantity' => 'required|int',

        ]);
        $quantity = $request->input('quantity');
        $invoiceDetail = new InvoiceDetail();


        $book = Book::orderBy('name', 'ASC')->get();
        $carts = Cart::where('book_id', $book->id)->get();
        $quatity = 0;
        foreach ($carts as $cart) {
            $quantity = $cart->quantity;
        }
        // Set  to 1
        $invoiceDetail->quantity = $quantity;

        $invoiceDetail->save();

        return redirect()->back()->with('success', 'book added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceDetailRequest $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceDetail $invoiceDetail)
    {
        //
    }
}
