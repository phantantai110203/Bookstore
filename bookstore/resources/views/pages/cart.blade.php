@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('navbar')
    @parent
    <div class="container" style="margin-top: 65px">
        <table id="cart" class="table table-hover  table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0; // Khởi tạo biến tổng tiền
                @endphp
                @forelse ($cartItems as $ca)
                    @foreach ($book as $p)
                        @if ($ca->book_id == $p->id)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            <img src="{{ $p->img }}" alt="Sản phẩm 1" class="img-responsive" width="100">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4 class="nomargin" style="margin-left: 80px;">{{ $p->name }}</h4>
                                            {{-- <p>{{ $p->description }}</p> --}}
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">{{ number_format($ca->price, 0, ',', '.') }} VND</td>
                                <td data-th="Quantity">
                                    <form action="{{ route('cart.update', ['id' => $p->id]) }}" method="POST" class="d-flex">
                                        @csrf
                                        <input class="form-control text-center" name="quantity" value="{{ $ca->quantity }}" type="number" min="0" style="width: 60px;">
                                        <button type="submit" class="btn btn-info btn-sm" style="margin-left: 5px;"><i class="fa fa-save" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td data-th="Subtotal" class="text-center">
                                    {{ number_format($ca->price * $ca->quantity, 0, ',', '.') }} VND
                                </td>
                                <td class="actions" data-th="">
                                    <a href="{{ route('detail.book', ['book' => $p]) }}">
                                        <button class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></button>
                                    </a>
                                    <form action="{{ route('cart.destroy', ['id' => $p->id]) }}" method="POST" onsubmit="handleDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 5px;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @php
                                    $total += $ca->price * $ca->quantity; // Cộng giá trị thành tiền vào tổng tiền
                                @endphp
                            </tr>
                        @endif
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Giỏ hàng của bạn đang trống</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <a href="{{ route('index') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center">
                        <strong>Tổng tiền <span id="total-amount">{{ number_format($total, 0, ',', '.') }} VND</span></strong>
                    </td>
                    <td>
                        @if ($cartItems->isNotEmpty())
                            <a href="{{ route('invoice.index') }}" class="btn btn-success btn-block">
                                Thanh toán <i class="fa fa-angle-right"></i>
                            </a>
                        @else
                            <button class="btn btn-success btn-block" disabled>
                                Thanh toán <i class="fa fa-angle-right"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
