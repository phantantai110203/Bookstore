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

        <h1 style="color: black; text-align: center">Chỉnh sửa sách</h1>
        <form method="post" action="{{ route('books.update', ['book' => $p]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên sách:</label>
                    <input type="text" style="background-color: white" class="form-control" name="name"
                        value="{{ old('name', $p->name) }}">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea style="background-color: white" class="form-control" name="description">{{ old('description', $p->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="publish_date">Ngày xuất bản:</label>
                    <input type="date" style="background-color: white" class="form-control" name="publish_date"
                        value="{{ old('publish_date', $p->publish_date) }}">
                </div>
                <div class="form-group">
                    <label for="price">Giá bán:</label>
                    <input type="text" style="background-color: white" class="form-control" name="price"
                        value="{{ old('name', $p->price) }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input style="background-color: white" type="text" class="form-control" name="quality"
                        value="{{ old('name', $p->quality) }}">
                </div>
                <div class="form-group">
                    <label for="author">Tác giả:</label>
                    <select class="form-control" name="author">
                        <option value="">{{ old('name', $p->author->name) }}</option>
                        @foreach ($lst1 as $cat1)
                            <option value="{{ $cat1->id }}" @if ($cat1->id == old('author', $p->author_id)) selected @endif>
                                {{ $cat1->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Thể loại:</label>
                    <select class="form-control" name="category">
                        <option value=''>{{ old('name', $p->category->name) }}</option>
                        @foreach ($lst as $cat)
                            <option value="{{ $cat->id }}" @if ($cat->id == old('category', $p->category_id)) selected @endif>
                                {{ $cat->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh:</label>
                    <img style="width:100px;max-height:100px;object-fit:contain;" src="{{ $p->img }}"><br>
                    <input type="file" class="form-control" name="img" accept="image/*">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button style="margin-top: 1ch" class="btn btn-success">Sửa</button>
            </div>
        </form>
    </div>

    {{-- <h1 style="color: black;">Chỉnh sửa sách</h1>
    <form method="post" action="{{ route('books.update', ['book' => $p]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-top: 2rem">
            <label>Tên sách:</label><br>
            <input name="name" value="{{ old('name', $p->name) }}" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Mô tả:</label><br>
            <textarea name="description">{{ old('description', $p->description) }}</textarea>
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Chọn ngày xuất bản:</label><br>
            <input type="date" name="publish_date" value="{{ old('publish_date', $p->publish_date) }}">
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Giá bán:</label><br>
            <input name="price" value="{{ old('name', $p->price) }}" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Số lượng:</label><br>
            <input name="quality" value="{{ old('name', $p->quality) }}" />
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Tác giả:</label><br>
            <select name="author">
                <option value=''>{{ old('name', $p->author->name) }}</option>
                @foreach ($lst1 as $cat1)
                    <option value="{{ $cat1->id }}" @if ($cat1->id == old('author', $p->author_id)) selected @endif>
                        {{ $cat1->name }} </option>
                @endforeach
            </select><br>
        </div>
        <div class="form-group" style="margin-top: 1ch">
            <label>Thể loại:</label><br>
            <select name="category">
                <option value=''>{{ old('name', $p->category->name) }}</option>
                @foreach ($lst as $cat)
                    <option value="{{ $cat->id }}" @if ($cat->id == old('category', $p->category_id)) selected @endif>
                        {{ $cat->name }} </option>
                @endforeach
            </select><br>
        </div>

        <div class="form-group" style="margin-top: 1ch">
            <label>Hình ảnh:</label><br>
            <img style="width:100px;max-height:100px;object-fit:contain;" src="{{ $p->img }}"><br>
            <input type="file" accept="img/*" name="img" /><br>
        </div>



        <button style="margin-top: 1ch" class="btn btn-success">Sữa</button>

    </form> --}}





@endsection
