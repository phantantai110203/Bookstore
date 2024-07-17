@extends('layouts.app')

@section('title', 'Danh sách')

@section('navbar')
    @parent
    <div class="container row-align">
        <div class="row row-align">
            <div class="col-md-3 mb-2 col-align">
                <h5 style="border: 1px solid black; padding: 10px;background-color: rgb(25, 177, 219)">Danh mục sản phẩm</h5>
                <ul class="nav nav-pills flex-column">
                    <table style="border: 1px solid gray; border-radius: 10px">
                        @foreach ($cats as $item)
                            <li class="nav-item" style="border: 1px solid gray;">
                                <a class="nav-link {{ $item->slug === $cat->slug ? 'active' : '' }}"
                                    href="{{ $item->slug }}" style="color: black;">{{ $item->name }} </a>
                            </li>
                        @endforeach
                    </table>

                    <li class="nav-item">
                        <a class="nav-link" style="border: 1px solid gray;color: black;" href="http://127.0.0.1:8000">Trang
                            chủ</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card-deck mb-2">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        @foreach ($book as $p)
                            <div class="col">

                                <div class="card mt-3 size-card">
                                    <a href="{{ route('detail.book', $p->id) }}" style="text-decoration: none !important;">
                                        <img src=" {{ $p->img }}" class="card-img-top size-img" alt="..."
                                            onerror="this.src='/asset/img/no_image_placeholder.png';">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $p->name }}</h5>
                                            <p style="color: black" class="card-text hide-less">{{ $p->description }}</p>
                                    </a>


                                    @if (Auth::check())
                                        <form action="{{ route('favoritebook.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $p->id }}">
                                            <input type="hidden" name="price" value="{{ $p->price }}">

                                            <!-- Có thể thay đổi giá trị mặc định cho số lượng -->
                                            <button class="btn btn-outline-success favorite-btn" type="submit"
                                                onclick="handleAddToFavorite(event)"><i class="far fa-heart "></i></button>

                                        </form>
                                        {{-- Người dùng đã đăng nhập --}}
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $p->id }}">
                                            <input type="hidden" name="price" value="{{ $p->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <!-- Có thể thay đổi giá trị mặc định cho số lượng -->
                                            <button type="submit" class="btn btn-primary custom-btn bi bi-cart-check"
                                                onclick="handleAddToCartAdd(event)"> Thêm vào giỏ</button>
                                        </form>
                                    @else
                                        {{-- Người dùng chưa đăng nhập --}}
                                        <button type="submit" onclick="handleAddToLogin(event)"
                                            class="btn btn-primary custom-btn bi bi-cart-check"> Thêm vào
                                            giỏ</button>
                                    @endif
                                </div>
                            </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function handleAddToFavorite(event) {
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Thêm thành công vào yêu thích",
                showConfirmButton: false,
                timer: 500000
            });
        }
    </script>
    <script>
        function handleAddToCartAdd(event) {
            Swal.fire({
                position: "top",
                icon: "success",
                title: "Thêm thành công vào giỏ hàng",
                showConfirmButton: false,
                timer: 500000
            });

            // Điều chỉnh vị trí hiển thị
            var toast = Swal.getToasts();
            if (toast) {
                toast.style.setProperty("top", "50px");
            }
        }
    </script>
    <script>
        function handleAddToLogin(event) {
            Swal.fire({
                position: "top",
                title: "Vui lòng đăng nhập vào tài khoản!",

                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ok"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        }
    </script>

@endsection
