@extends('layouts.app001') {{-- Import layout --}}

@section('title', 'Chi tiết đơn hàng') {{-- Set title of page --}}

@section('header')
    @parent {{-- Extend header section if needed --}}
@endsection

@section('content')
<style>
    strong,th{
        font-weight: bold;
        color: black
    }
</style>
    <div class="container" style="margin-left:15px">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: black"> Thông tin đơn hàng</h2>
                <p><strong>Mã đơn hàng:</strong> {{ $oders[0]->id }}</p>
                <p><strong>Ngày đặt hàng:</strong> {{ $oders[0]->created_at->format('d/m/Y ') }}</p>
                <p><strong>Tên khách hàng:</strong> {{ $oders[0]->name }}</p>
                <hr>
                <h3 style="color: black">Chi tiết đơn hàng</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($oders_details as $key => $detail)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $detail->book->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ number_format($detail->book->price, 2, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($detail->quantity * $detail->book->price, 2, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Tổng tiền:</th>
                            <td>{{ number_format($oders[0]->total, 2, ',', '.') }} VNĐ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
