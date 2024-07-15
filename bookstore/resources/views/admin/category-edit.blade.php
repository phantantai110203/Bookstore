@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
    <h1 style="color: black;">Sửa thể loại</h1>
    <div style="margin-left: 20px">

        <h1 style="color: black; text-align: center">Thêm thể loại mới</h1>
        <form method="post" action="{{ route('category.update', ['category' => $p]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên thể loại:</label>
                    <input type="text" style="background-color: white" class="form-control" name="name"
                        value="{{ old('name', $p->name) }}">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea style="background-color: white" class="form-control" name="description">{{ old('description', $p->description) }}</textarea>
                </div>

                <button style="margin-top: 1ch" class="btn btn-success">Sửa</button>
            </div>
        </form>
    </div>







@endsection
