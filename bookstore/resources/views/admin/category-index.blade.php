@extends('layouts.app001')

@section('title', 'Admin book')

@section('header')
    @parent
@endsection


@section('content')

    <h1 style="text-align: center; color:black;">Thể loại sách</h1>
    <a href="{{ route('category.create') }}" class="btn btn-info" style="margin-bottom:20px;">
        Thêm <i class="fas fa-plus"></i>
    </a>
    <table class="table table-light">
        <thead class="table-danger">
            <tr>
                <th>STT</th>
                <th>Tên thể loại</th>
                <th>Ngày thêm</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lst as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>
                        <a href="{{ route('category.show', ['category' => $p]) }}" class="btn btn-dark" style="margin:10px">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="{{ route('category.edit', ['category' => $p]) }}" class="btn btn-success"
                            style="margin-right:2px">

                            <i class="fas fa-edit"></i>

                        </a>
                        <form method="post" action="{{ route('category.destroy', ['category' => $p]) }}" class="d-inline"
                            onsubmit="return confirm('Bạn có muốn xóa không')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>


                    <!-- Form chỉnh sửa -->
            @endforeach
        </tbody>
    </table>


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
