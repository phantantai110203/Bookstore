@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
<style>
    label{
        color: black;
    }
</style>
    <dl style="margin-left:30px">

        <label for="">Tên sách:</label>
        <label>{{ $p->name }}</label><br>

        <label>Tác giả:</label>
        <label>{{ $p->Author->name }}</label><br>

        <label>Thể loại:</label>
        <label>{{ $p->Category->name }}</label><br>

        <label>Mô tả:</label>
        <label>{{ $p->description }}</label><br>

        <label>Ngày xuất bản:</label>
        <label>{{ $p->publish_date }}</label><br>

        <label>Giá bán:</label>
        <label>{{ $p->price }}</label><br>

        <label>Số lượng còn lại:</label>
        <label>{{ $p->quality }}</label>

        <dt style="color: black">Ảnh bìa:</dt>
        <dd><img style="width: 100px;max-height: 100px;object-fit: contain" src="{{ $p->img }}" alt=""></dd>
    </dl>
    <a href="{{ route('books.index') }}">
        < Quay lại trang danh sách</a>
        @endsection
