@extends('layouts.app')

@section('title', 'Trang chủ')

@section('navbar')
    @parent

    <form method="POST" action="{{ route('invoice.store') }}">
        @csrf
        <div class="container invoice mt-5">
            <div class="row ">
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3" style="margin-top: 20px;">Địa chỉ thanh toán</h4>
                    <form class="needs-validation" novalidate>
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
                                    placeholder="Tên tài khoản!" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email(*) <span class="text-muted"></span></label>
                            <input type="email" name="user_email" class="form-control" id="email"
                                placeholder=" Vui lòng nhập email! ">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ nhà(*)</label>
                            <input type="text" name="ShippingAddress" class="form-control" id="address"
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
                        <a class="mb-3">Tổng tiền: {{ $total }}</a>

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
                                <label class="custom-control-label" for="debit">Thanh toán qua ngân hàng</label>
                            </div>

                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block mb-2" onclick="alert('Đặt  hàng thành công')"
                            type="submit">Tiếp tục thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
