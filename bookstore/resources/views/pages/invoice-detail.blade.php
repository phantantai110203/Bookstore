@extends('layouts.app')

@section('title', 'Chi tiết hóa đơn')

@section('navbar')
    @parent

    <div class="container" style="margin-left:15px">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color: black"> Thông tin đơn hàng</h2>
                <p><strong>Mã đơn hàng:</strong> {{ $oders[0]->id }}</p>
                <p><strong>Ngày đặt hàng:</strong> {{ $oders[0]->created_at->format('d/m/Y ') }}</p>
                <p><strong>Tên khách hàng:</strong> {{ $oders[0]->name }}</p>
                <p style="font-weight: bold; color:rgb(146, 146, 40)"><strong style="font-weight: none;color: black">Trạng
                        thái đơn hàng:</strong>
                    {{ $oders[0]->status }}</p>
                @if ($oders[0]->status == 'Chờ xác nhận')
                    <form method="POST" action="{{ route('cancel.order', ['id' => $oders[0]->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                    </form>
                @endif

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
