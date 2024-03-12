<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Http\Requests\StoreInvoiceDetailRequest;
use App\Http\Requests\UpdateInvoiceDetailRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class InvoiceDetailadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function fixImage(InvoiceDetail $p)
    {
        //tự dowdload hình ảnh bất kỳ vào và để vào thư mục public/img
        if ($p->img && Storage::disk('public')->exists($p->img)) {
            $p->img = Storage::url($p->img);
        }
        // else {
        //     $p->img = '/img/sgktoan.jpg';
        // }
    }
    public function index(InvoiceDetail $invoicedetail)
    {
        //
        $lst = Book::all();

        foreach ($lst as $p) {
            $this->fixImage($invoicedetail);
        }
        return view('admin.orders-show', ['lst' => $lst]);
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
    public function store(StoreInvoiceDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
        return view('admin.orders-show', ['p' => $invoiceDetail]);
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