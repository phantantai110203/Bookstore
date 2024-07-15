<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Book;
use App\Models\InvoiceDetail;
use App\Models\User;
use Database\Seeders\InvoiceSeeder;
use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

class InvoiceadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status'); // Lấy tham số trạng thái từ query string


        $startDate = $request->query('start_date'); // Lấy tham số ngày bắt đầu từ query string
        $endDate = $request->query('end_date'); // Lấy tham số ngày kết thúc từ query string
        $invoiceId = $request->query('invoice_id'); // Lấy tham số mã hóa đơn từ query string

        $latestOrders = Invoice::orderBy('created_at', 'desc');

        // Lọc theo trạng thái nếu có được cung cấp
        if ($status) {
            $latestOrders->where('status', $status);
        }

        if ($startDate && $endDate) {
            $latestOrders->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($invoiceId) {
            $latestOrders->where('id', $invoiceId);
        }


        $latestOrders = $latestOrders->take(50)->get(); // Lấy 50 đơn hàng mới nhất

        $revenueData = []; // Tính toán doanh thu như trước

        return view('admin.oders-index', [
            'monthlyRevenue' => $revenueData,
            'latestOrders' => $latestOrders,
            'selectedStatus' => $status, // Truyền trạng thái đã chọn vào view
        ]);
    }


    // public function index()
    // {
    //     $lst = Invoice::all();

    //     return view('admin.oders-index', compact('lst'))->with('i', (request()->input('page', 1) - 1) * 5);
    //     //
    // }

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
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($invoice)
    {
        $oders_details = InvoiceDetail::where('invoice_id', $invoice)->get();
        $oders = Invoice::where('id', $invoice)->get();
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
        return view('admin.oders-show')->with(compact('oders_details', 'user', 'oders', 'books'));
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
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->status = $request->status;

        $invoice->save();
        return redirect()->route('invoiceadmins.index')->with('success', 'Cập nhật trạng thái thành công.');
    }

    public function thayDoiTrangThaiDonHang(Request $request)
    {
        $orderId = $request->input('order_id');
        $newStatus = $request->input('new_status');

        $invoice = Invoice::find($orderId);

        $invoice->status = $newStatus;
        $kq = $invoice->save();

        if ($kq) {
            return response()->json([
                'message' => 'Trạng thái đơn hàng đã được cập nhật thành công',
                'success' => true
            ]);
        } else {
            return response()->json([
                'error' => 'Thất bại',
                'success' => false
            ], 501);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
}