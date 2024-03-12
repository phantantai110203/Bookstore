@extends('layouts.app')


@section('title', 'Trang chủ')

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
    @foreach ($cartItems as $ca)
        @foreach ($book as $p)
        <tr>
            @if ($ca->book_id == $p->id)
            <td data-th="Product">
                <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="{{ $p->image }}" alt="Sản phẩm 1" class="img-responsive" width="100">
                </div>
                <div class="col-sm-10">
                <h4 class="nomargin">{{ $p->name }}</h4>
                {{-- <p>{{ $p->description }}</p> --}}
                </div>
                </div>
            </td>
            <td data-th="Price">{{ $ca->price }} VND</td>
            <td data-th="Quantity">
                <form action="{{ route('cart.update', ['id' => $p->id]) }}" method="POST" class="d-flex">
                  @csrf
                  <input class="form-control text-center" name="quantity" value="{{ $ca->quantity }}" type="number" min="0" style="width: 60px;">
                  <button type="submit" class="btn btn-info btn-sm" style="margin-left: 5px;">Sửa</button>
                </form>

              </td>
            <td data-th="Subtotal" class="text-center">{{ $ca->price*$ca->quantity }} VND</td>
            <td class="actions" data-th="">
                <a href="{{ route('detail.book',['book'=>$p])}}"><button class="btn btn-info btn-sm">Xem chi tiết</button></a>
                <form action="{{ route('cart.destroy', ['id' => $p->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa <i class="fa fa-trash-o"></i></button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    @endforeach
</tbody>
  <tfoot>
   <tr>
    <td><a href="{{ route('index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td>
    <td colspan="2" class="hidden-xs"> </td>
    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong>
    </td>
    <td><a href="{{ route('index.payment') }}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    </td>
   </tr>
  </tfoot>
 </table>
</div>
@endsection
