@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection


@section('content')

    <h1 style="text-align: center; color:black;"> Danh sách tài khoản </h1>
    <a href="{{ route('users.create') }}" class="btn btn-info" >
        Thêm tài khoản <i class="fas fa-plus"></i>
    </a>
    <table style="margin-top: 1ch;" class="table table-light">
        <thead class="table-danger">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lst as $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->address }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>{{ $p->role ? 'Admin' : 'Khách hàng' }}</td>
                    <td style="ma">
                        <a href="{{ route('users.show', ['user' => $p]) }}" class="btn btn-dark">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="{{ route('users.edit', ['user' => $p]) }}" class="btn btn-success" >
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="post" action="{{ route('users.destroy', ['user' => $p]) }}" class="d-inline"
                            onsubmit="return confirm('Bạn có muốn xóa không')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('users.update', ['user' => $p]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-top: 2rem">
                            <label>Họ tên:</label><br>
                            <input name="name" value="{{ old('name', $p->name) }}" />
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Địa chỉ:</label><br>
                            <input name="address" value="{{ old('address', $p->address) }}">
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Số diện thoai:</label><br>
                            <input name="phone" value="{{ old('phone', $p->phone) }}" />
                        </div>

                        <button style="margin-top: 1ch" class="btn btn-success">Sửa</button>
                    </form>




                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 style="color: black;">Thêm tài khoản mới</h1>
                    <form style="margin-top:-80px;" method="post" action="{{ route('users.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-top: 2rem">
                            <label>Họ tên:</label><br>
                            <input name="name" />
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Email:</label><br>
                            <input name="email" />
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Mật khẩu:</label><br>
                            <input type="password" name="password">
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Địa chỉ:</label><br>
                            <input name="address">
                        </div>
                        <div class="form-group" style="margin-top: 1ch">
                            <label>Số diện thoai:</label><br>
                            <input name="phone" />
                        </div>
                        {{-- <div>
            <label>Vai trò:</label><br>
            <input type="text" name="role" value=1 readonly>
        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            <button style="margin-top: 1ch" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection
