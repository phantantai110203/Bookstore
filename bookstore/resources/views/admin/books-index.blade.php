@extends('layouts.app001')

@section('title', 'Admin book')

@section('header')
    @parent
@endsection


@section('content')

    <h1 style="text-align: center; color:black;"> Danh sách sản phẩm </h1>
    <a href="{{ route('books.create') }}" class="btn btn-info">
        Thêm <i class="fas fa-plus"></i>
    </a>
    <table class="table table-light">
        <thead class="table-danger">
            <tr>
                <th>STT</th>
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
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->quality }}</td>
                    <td><img class="card-img-top" style=" width:100px;max-height:100px;object-fit:contain;"
                            src=" {{ $p->img }}"></td>
                    <td style="ma">
                        <a href="{{ route('books.show', ['book' => $p]) }}" class="btn btn-dark">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="{{ route('books.edit', ['book' => $p]) }}" class="btn btn-success" >

                            <i class="fas fa-edit"></i>

                        </a>
                        <form method="post" action="{{ route('books.destroy', ['book' => $p]) }}" class="d-inline"
                            onsubmit="return confirm('Bạn có muốn xóa không')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>


                    <!-- Form chỉnh sửa -->

                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- data-bs-toggle="modal"
                            data-bs-target="#exampleModal" --}}



   




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
