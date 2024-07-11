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
            margin-top:30px;
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
            grid-template-columns: 1fr 2fr;
            grid-gap: 20px;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
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
<h1 style="color: black;">Thêm tài khoản mới</h1>
   <div class="container" >
        <h1>Thêm Sản Phẩm</h1>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Họ tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email:">Email:</label>
            <input name="email" rows="3" required />

            <label for="price">Mật khẩu:</label>
            <input type="password"  name="password" step="0.01" required>

            <label>Số diện thoai:</label>
            <input name="phone" step="0.01"/>

            <label>Địa chỉ:</label>
            <input name="address" step="0.01"/>


            <button type="submit">Thêm</button>
        </form>
    </div>


@endsection
