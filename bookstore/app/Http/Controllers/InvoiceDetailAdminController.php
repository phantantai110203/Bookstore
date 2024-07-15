<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class InvoiceDetailAdminController extends Controller
{
    public function show(Invoice $invoice)
    {
        $invoiceDetails = InvoiceDetail::where('invoice_id', $invoice->id)->get();
        return view('admin.oders-show', compact('invoice', 'invoiceDetails'));
    }
}