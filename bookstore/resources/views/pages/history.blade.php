@extends('layouts.app')

@section('title', 'Lịch sử mua hàng')

@section('navbar')
    @parent
    <div class="container mt-5">
        <h2 style="margin-top:35px">Lịch sử giao dịch</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày mua hàng</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($invoice->total, 0, ',', '.') }} VND</td>
                            <td>
                                <a href="{{ route('invoicedetails.show', $invoice->id) }}">
                                    <button class="btn btn-primary" type="button">
                                        Xem chi tiết
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr class="collapse" id="invoiceDetails-{{ $invoice->id }}">
                            <td colspan="4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->invoiceDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->book->name }}</td>
                                                <td>{{ number_format($detail->book->price, 0, ',', '.') }} VND</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ number_format($detail->quantity * $detail->book->price, 0, ',', '.') }}
                                                    VND</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
