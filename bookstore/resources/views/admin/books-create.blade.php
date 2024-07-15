@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent

@endsection


@section('content')
    <style>
        label {
            color: black;
        }
    </style>
    <div style="margin-left: 20px">

        <h1 style="color: black; text-align: center">Thêm sách mới</h1>
        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên sách:</label>
                    <input type="text" style="background-color: white" class="form-control" name="name"
                        placeholder="Nhập tên sách">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea style="background-color: white" class="form-control" name="description" placeholder="Nhập mô tả"></textarea>
                </div>
                <div class="form-group">
                    <label for="publish_date">Ngày xuất bản:</label>
                    <input type="date" style="background-color: white" class="form-control" name="publish_date">
                </div>
                <div class="form-group">
                    <label for="price">Giá bán:</label>
                    <input type="text" style="background-color: white" class="form-control" name="price"
                        placeholder="Nhập giá bán">
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input style="background-color: white" type="text" class="form-control" name="quality"
                        placeholder="Nhập số lượng">
                </div>
                <div class="form-group">
                    <label for="author">Tác giả:</label>
                    <select class="form-control" name="author">
                        <option value="">-- Chọn tác giả --</option>
                        @foreach ($lst1 as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Thể loại:</label>
                    <select class="form-control" name="category">
                        <option value="">-- Chọn thể loại --</option>
                        @foreach ($lst as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh:</label>
                    <input type="file" class="form-control" name="img" accept="image/*">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
    {{-- <h1 style="color: black;">Thêm sách mới</h1>
    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="margin-top: 2rem">
            <label>Tên sách:</label><br>
            <input name="name" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Mô tả:</label><br>
            <textarea name="description"></textarea>
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Chọn ngày xuất bản:</label><br>
            <input type="date" name="publish_date">
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Giá bán:</label><br>
            <input name="price" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Số lượng:</label><br>
            <input name="quality" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Tác giả:</label><br>
            <select name="author">
                <option value=''>--Chọn tác giả--</option>
                @foreach ($lst1 as $cat1)
                    <option value="{{ $cat1->id }}">{{ $cat1->name }}</option>
                @endforeach
            </select><br>
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Thể loại:</label><br>
            <select name="category">
                <option value=''>--Chọn thể loại-</option>
                @foreach ($lst as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select><br>
        </div>

        <div class="form-group" style="margin-top: 1ch">
            <label>Hình ảnh:</label><br>
            <input type="file" accept="img/*" name="img" /><br>
        </div>


        <button style="margin-top: 1ch" class="btn btn-success">Thêm</button>

    </form> --}}



@endsection
