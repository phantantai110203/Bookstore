@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
    <dl>
        <dt>Tên thể loại:</dt>
        <dd>{{ $p->name }}</dd>

        <dt>Mô tả:</dt>
        <dd>{{ $p->description }}</dd>

        <dt>Thể loại:</dt>
        <dd>{{ $p->name }}</dd>

        <dt>Ngày tạo:</dt>
        <dd>{{ $p->created_at }}</dd>


    </dl>
    <a href="{{ route('category.index') }}">
        < Quay lại trang danh sách</a>
        @endsection
