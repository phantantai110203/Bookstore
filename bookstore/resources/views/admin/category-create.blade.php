@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
<h1 style="color: black;">Thêm thể loại</h1>
    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="margin-top: 2rem">
            <label>Tên thể loại:</label><br>
            <input name="name" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Mô tả:</label><br>
           
            <textarea name="description"></textarea>
        </div>
        <button style="margin-top: 1ch" class="btn btn-success">Thêm</button>


@endsection
