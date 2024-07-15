@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')

    <div style="margin-left: 20px">

        <h1 style="color: black; text-align: center">Thêm thể loại mới</h1>
        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên thể loại:</label>
                    <input type="text" style="background-color: white" class="form-control" name="name"
                        placeholder="Nhập tên sách">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea style="background-color: white" class="form-control" name="description" placeholder="Nhập mô tả"></textarea>
                </div>

                <button style="margin-top: 1ch" class="btn btn-success">Thêm</button>
            </div>
        </form>








        @endsection
