@extends('layouts.app001')

@section('title', 'Admin book')

@section('header')
    @parent
@endsection


@section('content')
    <style>
        td,
        th {
            color: black
        }

        .card-title {
            font-weight: bold;
        }
    </style>

    <!-- Default box -->
    <div class="card" style="margin-left: 20px">
        <div class="card-header">
            <h3 class="card-title" style="color: black">Danh sách sản phẩm</h3>
            <div class="card-tools">
                <div class="input-group-append">
                    <a href="{{ route('books.create') }}" class="btn btn-info">
                        Thêm sản phẩm <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sách</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lst as $p)
                        <tr>
                             @php
                                $amount = $p['price'];
                                $formattedAmount = number_format($amount, 2, '.', ',') . ' VNĐ';
                            @endphp
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $formattedAmount}}</td>
                            <td>{{ $p->quality }}</td>
                            <td><img class="card-img-top" style=" width:100px;max-height:100px;object-fit:contain;"
                                    src=" {{ $p->img }}"></td>
                            <td style="ma">
                                <a href="{{ route('books.show', ['book' => $p]) }}" class="btn btn-dark">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('books.edit', ['book' => $p]) }}" class="btn btn-success">

                                    <i class="fas fa-edit"></i>

                                </a>
                                <form method="post" action="{{ route('books.destroy', ['book' => $p]) }}" class="d-inline"
                                    onsubmit="return confirm('Bạn có muốn xóa không')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-warning"><i class="fas fa-trash"></i></button>
                                </form>
                                {{-- <a href="" class="btn btn-light"><i class="fab fa-facebook-messenger"></i></a> --}}

                            </td>


                            <!-- Form chỉnh sửa -->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>









    <script>
        function showEditForm(event, id) {
            event.preventDefault();

            const editForm = document.getElementById(`edit-form-${id}`);
            editForm.style.display = "table-cell";
        }
    </script>



    {{-- <script>
    function showEditForm(event, id) {
        event.preventDefault();
        const form = document.getElementById(`edit-form-${id}`);
        form.style.display = "table-row";
    }
</script> --}}


@endsection
