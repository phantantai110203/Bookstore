@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
<h1 style="color: black;">Sửa thể loại</h1>
    <form method="post" action="{{ route('category.update',['category' => $p]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-top: 2rem">
            <label>Tên thể loại:</label><br>
            <input name="name" value="{{ old('name', $p->name) }}" />
        </div>

         <div class="form-group" style="margin-top: 1ch">
            <label>Mô tả:</label><br>

            <textarea name="description">{{ old('description', $p->description) }}</textarea>
        </div>

        <button style="margin-top: 1ch" class="btn btn-success">Sửa</button>


@endsection
