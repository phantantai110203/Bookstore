@extends('layouts.app001')

@section('title', 'Admin dashboard')

@section('header')
    @parent
@endsection


@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3" style="background-color: rgb(50, 141, 245)">
                <div class="rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-user-friends fa-3x " style="color: white"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="color: white">Số lượng user</p>
                        <h6 class="mb-0">{{ $userCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" style="background-color: rgb(227, 204, 75)">
                <div class=" rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-book fa-3x" style="color: white"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="color: white">Số lượng sản phẩm</p>
                        <h6 class="mb-0">{{ $bookCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" style="background-color: rgb(230, 116, 108)">
                <div class="rounded d-flex align-items-center justify-content-between p-4">

                    <i class="fas fa-truck-moving fa-3x" style="color: white"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="color: white">Số lượng đơn hàng</p>
                        <h6 class="mb-0">{{ $oderCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" style="background-color: rgb(124, 201, 111)">
                <div class="rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x" style="color: white"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="color: white">Tổng doanh thu</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <!-- Sales Chart Start -->
            <div class="col-md-8">
                <div style="background-color: #ffffff" class="text-center rounded p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0" style="color: black">Doanh thu</h6>
                    </div>
                    <canvas style="" id="salse-revenue"></canvas>
                </div>
            </div>
            <!-- Sales Chart End -->

            <!-- Recent Orders Start -->
            <div class="col-md-4">
                <div class="h-100 rounded p-4" style="max-height: 500px; overflow-y: auto;background-color: #ffffff;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0" style="color: black">10 đơn hàng gần nhất</h6>
                        <a style="color: black" href="{{ route('invoices.index') }}">Xem tất cả</a>
                    </div>
                    <div class="scrollable-content">
                        @foreach ($latestOrders as $order)
                            <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 style="color: black" class="mb-0">{{ $order['name'] }} -
                                            {{ $order['ShippingPhone'] }}</h6>
                                        <small
                                            style="color: black">{{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i:s') }}</small>
                                    </div>
                                    <span style="color: black">{{ $order['ShippingAddress'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Recent Orders End -->
        </div>
    </div>
    {{-- <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Worldwide Sales</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->
    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Messages</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Jhon Doe</h6>
                                <small>15 minutes ago</small>
                            </div>
                            <span>Short message goes here...</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Jhon Doe</h6>
                                <small>15 minutes ago</small>
                            </div>
                            <span>Short message goes here...</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Jhon Doe</h6>
                                <small>15 minutes ago</small>
                            </div>
                            <span>Short message goes here...</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Jhon Doe</h6>
                                <small>15 minutes ago</small>
                            </div>
                            <span>Short message goes here...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">To Do List</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="d-flex mb-2">
                        <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                        <button type="button" class="btn btn-primary ms-2">Add</button>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox" checked>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><del>Short task goes here...</del></span>
                                <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Widgets End -->





    <!-- Widgets Start -->


@endsection
@push('JS_REGION')
    <script>
        $(document).ready(function() {
            var revenueData = @json(array_values($monthlyRevenue));
            console.log('revenueData', revenueData)
            var ctx2 = $("#salse-revenue").get(0).getContext("2d");
            var myChart2 = new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7",
                        "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
                    ],
                    datasets: [{
                        label: "Doanh thu",
                        data: revenueData,
                        backgroundColor: "#7ebde2",
                        fill: true,
                        color: "black" // Màu chữ cho nhãn "Doanh thu"
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                color: 'black', // Màu chữ của nhãn trục x
                            }
                        },
                        y: {
                            ticks: {
                                color: 'black', // Màu chữ của nhãn trục y
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
