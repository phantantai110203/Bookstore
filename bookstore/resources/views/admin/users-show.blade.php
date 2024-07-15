@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
    <dl style="margin-left:30px">
        <label>Tên người dùng:</label>
        <label>{{ $p->name }}</label><br>

        <label>Email:</label>
        <label>{{ $p->email }}</label><br>

        <label>Địa chỉ:</label>
        <label>{{ $p->address }}</label><br>

        <label>Số điện thoại:</label>
        <label>{{ $p->phone }}</label><br>

        <label>Vai trò:</label>
        <label>{{ $p->role ? 'Admin' : 'Khách hàng' }}</label><br>

        <label>Ngày tạo tài khoản:</label>
        <label>{{ $p->created_at }}</label><br>
    </dl>
    <a style="margin-left:5px " href="{{ route('users.index') }}">
        < Quay lại trang danh sách</a>


        @endsection
