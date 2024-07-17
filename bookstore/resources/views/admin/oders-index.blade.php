@extends('layouts.app001')

@section('title', 'Admin account')

@section('header')
    @parent
@endsection

@section('content')
    <style>
        td,
        th {
            color: black;
        }

        .card-title {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group-date {
            width: 300px;
        }

        .input-group-invoice {
            width: 200px;
        }

        .input-group-status {
            width: 150px;
        }
    </style>






    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="color: black">Danh sách đơn hàng</h3>
            <div class="card-header">
                <div class="card-tools row">
                    <div class="col-md-4" >
                        <form method="GET" action="{{ route('invoices.index') }}" class="form-group">
                            <label style="color: black" for="">Lọc hóa đơn theo ngày:</label>
                            <div class="input-group input-group-sm input-group-date">
                                <input style="background-color: white" type="date" name="start_date" class="form-control"
                                    placeholder="Từ ngày">
                                <input style="background-color: white" type="date" name="end_date" class="form-control"
                                    placeholder="Đến ngày">
                                <div class="input-group-append">
                                    <button style="margin-right: 50px" type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="GET" action="{{ route('invoices.index') }}" class="form-group">
                            <label style="color: black" for="">Tìm hóa đơn theo mã hóa đơn:</label>
                            <div class="input-group input-group-sm input-group-invoice">
                                <input style="background-color: white" type="text" name="invoice_id" class="form-control" placeholder="Mã hóa đơn"
                                    value="{{ request('invoice_id') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="GET" action="{{ route('invoices.index') }}" class="form-group">
                            <label style="color: black" for="">Lọc hóa đơn theo trạng thái:</label>
                            <div class="input-group input-group-sm input-group-status">
                                <select name="status" class="form-control">
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="Chờ xác nhận" {{ $selectedStatus == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ
                                        xác nhận</option>
                                    <option value="Đang chuẩn bị" {{ $selectedStatus == 'Đang chuẩn bị' ? 'selected' : '' }}>
                                        Đang chuẩn
                                        bị</option>
                                    <option value="Đã huỷ" {{ $selectedStatus == 'Đã huỷ' ? 'selected' : '' }}>Đã huỷ</option>
                                    <option value="Đang giao" {{ $selectedStatus == 'Đang giao' ? 'selected' : '' }}>Đang giao
                                    </option>
                                    <option value="Đã hoàn thành" {{ $selectedStatus == 'Đã hoàn thành' ? 'selected' : '' }}>Đã
                                        hoàn
                                        thành</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 10%">
                            Mã hóa đơn
                        </th>
                        <th style="width: 15%">
                            Tên khách hàng
                        </th>
                        <th style="width: 15%">
                            Địa chỉ giao hàng
                        </th>
                        <th>
                            Thời gian đặt hàng
                        </th>
                        <th style="width: 8%" class="text-center">
                            Tổng tiền
                        </th>
                        <th style="width: 20%">
                            Trạng thái
                        </th>
                        <th style="width: 12%">
                            Chức năng

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestOrders as $p)
                        <tr>
                            @php
                                $amount = $p['total'];
                                $formattedAmount = number_format($amount, 2, '.', ',') . ' VNĐ';
                            @endphp
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p['id'] }}</td>
                            <td>{{ $p['name'] }}</td>
                            <td>{{ $p['ShippingAddress'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($p['created_at'])->format('d/m/Y') }}</td>
                            <td>{{ $formattedAmount }}</td>
                            <td>
                               <form>
                                    @csrf
                                    <select style="border-radius: 8px; font-family: Arial, Helvetica, sans-serif"
                                        name="status" class="status-select" data-id="{{ $p->id }}">
                                        <option value="Đang chuẩn bị" {{ $p->status == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                                        <option value="Đang chuẩn bị" {{ $p->status == 'Đang chuẩn bị' ? 'selected' : '' }}>Đang chuẩn bị</option>
                                        <option value="Đã hủy" {{ $p->status == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                        <option value="Đang giao" {{ $p->status == 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
                                        <option value="Đã hoàn thành" {{ $p->status == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn thành</option>

                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('invoices.detail', ['invoice' => $p]) }}" class="btn btn-success">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->





    <script>
        $(document).ready(function() {
            $('.status-select').change(function() {
                var orderId = $(this).data('id'); // Lấy ID đơn hàng
                var newStatus = $(this).val(); // Lấy trạng thái mới được chọn

                var selectElement = $(this); // Lưu trữ phần chọn trạng thái

                $.ajax({
                    url: '{{ route('thayDoiTrangThaiDonHang') }}', // URL script PHP để cập nhật trạng thái
                    method: 'POST', // Gửi yêu cầu POST
                    data: {
                        _token: $('input[name="_token"]').val(),
                        order_id: orderId,
                        new_status: newStatus
                    },
                    success: function(response) {
                        alert(response.message);

                        // Sau khi cập nhật thành công, ẩn phần tử option có giá trị newStatus
                        selectElement.find('option[value="' + newStatus + '"]').hide();
                    },
                    error: function(response) {
                        alert(response.error);
                    }
                });
            });

        });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusSelects = document.querySelectorAll('.status-select');

        statusSelects.forEach(statusSelect => {
            const options = statusSelect.querySelectorAll('option');

            // Function to hide options with a value less than the selected value
            function hideOptions() {
                const selectedValue = statusSelect.value;

                options.forEach(option => {
                    if (selectedValue === "Đã hoàn thành") {
                        // Hide all options except "Đã hoàn thành"
                        if (option.value !== "Đã hoàn thành") {
                            option.style.display = 'none';
                        } else {
                            option.style.display = 'block';
                        }
                    } else {
                        // Hide options with a value less than the selected value
                        if (option.value < selectedValue) {
                            option.style.display = 'none';
                        } else {
                            option.style.display = 'block';
                        }
                    }
                });
            }

            // Call the function to hide options when the page loads
            hideOptions();

            // Also update the options visibility when the selection changes
            statusSelect.addEventListener('change', hideOptions);
        });
    });
</script>



@endsection
