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
    <dl style="margin-left: 20px">
        <label>Tên thể loại:</label>
        <label>{{ $p->name }}</label><br>

        <label>Mô tả:</label>
        <label>{{ $p->description }}</label><br>

        <label>Thể loại:</label>
        <label>{{ $p->name }}</label><br>

        <label>Ngày tạo:</label>
        <label>{{ $p->created_at }}</label><br>


    </dl>
    <a href="{{ route('category.index') }}">
        < Quay lại trang danh sách</a>
        @endsection
