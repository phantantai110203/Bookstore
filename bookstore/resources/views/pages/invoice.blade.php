@extends('layouts.app')

@section('title', 'Trang chủ')

@section('navbar')
    @parent

    <form style="margin-top:20px" method="POST" action="{{ route('invoice.store') }}" id="myForm">
        @csrf
        <div class="container invoice mt-5">
            <div class="row">
                <div class="col-md-4 order-md-1">
                    <h4 class="mb-3" style="margin-top: 20px;">Địa chỉ giao hàng</h4>
                    <div class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Họ</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" placeholder value
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Tên</label>
                                <input type="text" name="user_firstName" class="form-control" id="lastName" placeholder
                                    value required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Tên tài khoản(*) </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="name" class="form-control" id="username"
                                    value="{{ Auth::user()->name }}" placeholder="Tên tài khoản!" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email(*) <span class="text-muted"></span></label>
                            <input type="email" name="user_email" class="form-control" id="email"
                                value="{{ Auth::user()->email }}" placeholder=" Vui lòng nhập email! ">
                            <div class="invalid-feedback">
                                Please enter a valid email address shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ nhà(*)</label><input type="text" name="ShippingAddress"
                                class="form-control" id="address" value="{{ Auth::user()->address }}"
                                placeholder="Vui lòng nhập địa chỉ!" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Số điện thoại(*) <span class="text-muted"></span></label>
                            <input type="text" name="ShippingPhone" class="form-control" id="phone"
                                placeholder="---">
                        </div>
                        <a class="mb-3">Tổng tiền: {{ number_format($total, 0, ',', '.') }} VNĐ</a>
                        <input type="hidden" name="total" value="{{ $total }}">



                        <hr class="mb-4">
                        <h4 class="mb-3">Thanh toán</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="invoiceMethod" type="radio" class="custom-control-input"
                                    checked required>
                                <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="invoiceMethod" type="radio" class="custom-control-input"
                                    required>
                                <label class="custom-control-label" for="debit">Thanh toán qua VNPAY</label>
                                <a href="#" id="myLink" style="display: none;">Đây là một liên kết</a>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <form method="POST"  action="{{ route('invoice.store') }}">
                            @csrf
                            <!-- Invoice form details... -->
                            <button onclick="handleAddToInvoice(event)" class="btn btn-primary btn-lg btn-block mb-2"
                                type="submit">Tiếp tục
                                thanh toán</button>
                            {{-- <button type="button" onclick="submitAndRedirect()">Submit và Chuyển Hướng</button> --}}
                            <input type="hidden" name="addressSelect" id="addressSelect">
                        </form>
                        <form action="{{ route('vnpay_payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" name="redirect" class="btn btn-dark primary-btn invoive-btn"
                                style="width:50%">Thanh
                                toán VNPAY <i class="fab fa-cc-visa"></i>
                            </button>
                        </form>

                        <input type="hidden" name="addressSelect" id="addressSelect">
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    <div class="container" style="margin-top: 65px">
                        <h4 class="mb-3" style="margin-top: 20px;">Chi tiết đơn hàng</h4>
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Tên sản phẩm</th>
                                    <th style="width:10%">Giá</th>
                                    <th style="width:15%">Số lượng</th>
                                    <th style="width:20%" class="text-center">Thành tiền</th>
                                    <th style="width:5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($carts as $cart)
                                    @foreach ($books as $p)
                                        @if ($cart->book_id == $p->id)
                                            <tr>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-2 hidden-xs">
                                                            <img src="{{ $p->img }}" alt="Sản phẩm 1"
                                                                class="img-responsive" width="100">
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <h4 class="nomargin" style="margin-left: 80px;">
                                                                {{ $p->name }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">{{ number_format($cart->price, 0, ',', '.') }} VND
                                                </td>
                                                <td data-th="Quantity">
                                                    <input class="form-control text-center" name="quantity"
                                                        value="{{ $cart->quantity }}" type="number" min="0"
                                                        style="width: 60px;" readonly>
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    {{ number_format($cart->price * $cart->quantity, 0, ',', '.') }} VND
                                                </td>
                                                @php $total += $cart->price * $cart->quantity; @endphp
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function handleAddToInvoice(event) {


            event.preventDefault();
            // Kiểm tra thông tin
            let firstName = document.getElementById('firstName').value;
            let lastName = document.getElementById('lastName').value;
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let address = document.getElementById('address').value;

            if (firstName === '' || lastName === '' || username === '' || email === '' || address === '') {
                // Nếu thông tin chưa đầy đủ, hiển thị thông báo lỗi
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Vui lòng nhập đầy đủ thông tin !',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                // Nếu thông tin đã đầy đủ, tiếp tục thanh toán và hiển thị thông báo thành công
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Đặt hàng thành công',
                    showConfirmButton: false,
                    timer: 5000
                });
                event.target.closest('form').submit(); // Gửi biểu mẫu
            }

        }
    </script>

    <script>
        function submitAndRedirect() {
            // Lấy ra form
            var form = document.getElementById('myForm');

            // Thực hiện submit form
            form.submit();

            // Chuyển hướng trang sau khi submit thành công
            window.location.href = '{{ route('payment.index') }}';

            // Lưu ý: Cần chắc chắn rằng trang mà bạn định chuyển hướng đến là một trang thực tế tồn tại và đang hoạt động.
        }
    </script>
@endsection
