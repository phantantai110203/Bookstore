@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')
    <style>
        /* CSS styles for the form */
        body {

            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {

            max-width: 600px;
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;

            grid-gap: 20px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            justify-self: end;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    <div style="margin-left:5%">

        <div class="container">
            <h1 style="color: black;">Sửa thông tin người dùng</h1>
            <form method="post" action="{{ route('users.update', ['user' => $p]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label>Họ tên:</label>
                <input name="name" value="{{ old('name', $p->name) }}" />
                @if ($errors->has('name'))
                    {{ $errors->first('name') }} <br>
                @endif

                <label>Địa chỉ:</label>
                <input name="address" value="{{ old('address', $p->address) }}">
                @if ($errors->has('address'))
                    {{ $errors->first('address') }} <br>
                @endif


                <label>Số diện thoai:</label>
                <input name="phone" value="{{ old('phone', $p->phone) }}" />
                @if ($errors->has('phone'))
                    {{ $errors->first('phone') }} <br>
                @endif
                <button style="margin-top: 1ch" type="submit">Sữa</button>
            </form>
        </div>
    </div>


@endsection
