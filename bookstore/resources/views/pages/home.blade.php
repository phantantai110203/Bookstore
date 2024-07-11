@extends('layouts.app')


@section('title', 'Trang chủ')

@section('navbar')
    @parent
    {{-- slide --}}
    <div class="container" style="margin-top:100px">
        <div id="carouselExampleControls" class="carousel slide my-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('asset/img/book-01.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/img/book-02.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/img/book-03.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- card --}}

    <div class="container ">
        <div class="row">
           <div class="col-md-3 mb-2 mt-3 " >
            <h5 style="border: 1px solid black; padding: 10px;background-color: rgb(25, 177, 219)">Danh mục sản phẩm
            </h5>
            <ul class="nav nav-pills flex-column">
                <table style="border: 1px solid gray; border-radius: 10px">
                    @foreach ($cats as $cat)
                    <tbody style="border-bottom: 1px solid gray; ">
                        <tr>
                            <td>
                                <li class="nav-item " style="border: 1px solid gray;">
                                    <a class="nav-link" href="{{ route('detail.category', $cat->slug) }}">{{ $cat->name }}</a>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                     @endforeach
                </table>
            </ul>
        </div>
            <div class="col-md-9" >
                @foreach ($cats as $c)

                    <h3>Danh mục {{ $c->name }}</h3>
                    <div class="card-deck mb-2">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                            @foreach ($book as $p)
                                @if ($c->id == $p->category_id)
                                    <div class="col">
                                        <div class="card mt-3 size-card" >
                                            <a href="{{ route('detail.book', $p->id) }}">
                                                <img src=" {{ asset($p->img) }}" class="card-img-top size-img"
                                                    onerror="this.src='asset/img/no_image_placeholder.png';" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $p->name }}</h5>
                                                    <p class="card-text hide-less">{{ $p->description }}</p>
                                            </a>
                                            @if (Auth::check())
                                                {{-- Người dùng đã đăng nhập --}}
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $p->id }}">
                                                    <input type="hidden" name="price" value="{{ $p->price }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <!-- Có thể thay đổi giá trị mặc định cho số lượng -->

                                                    <button onclick="handleAddToCartAdd(event)" type="submit"
                                                        class="btn btn-primary custom-btn bi bi-cart-check"> Thêm vào
                                                        giỏ</button>
                                                </form>
                                                <form action="{{ route('favoritebook.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $p->id }}">
                                                    <input type="hidden" name="price" value="{{ $p->price }}">

                                                    <!-- Có thể thay đổi giá trị mặc định cho số lượng -->
                                                    <button onclick="handleAddToFavorite(event)"
                                                        class="btn btn-outline-success favorite-btn" type="submit"><i
                                                            class="far fa-heart "></i></button>


                                                </form>
                                            @else
                                                {{-- Người dùng chưa đăng nhập --}}
                                                <button type="submit" onclick="handleAddToLogin(event)"
                                                    class="btn btn-primary custom-btn bi bi-cart-check"> Thêm vào
                                                    giỏ</button>
                                            @endif

                                        </div>
                                    </div>
                                    </a>
                        </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0470548729704!2d106.62131717363441!3d10.730854260035555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752df4c0029863%3A0x68d7cdf238c5387f!2sChung%20c%C6%B0%20Diamond%20Riverside%20Q8!5e0!3m2!1svi!2s!4v1720516385582!5m2!1svi!2s"
        width="600" height="400" style="border:0;margin-bottom: 5px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" ></iframe>

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
                window.location.href= "{{ route('login') }}";
            }
        });
        }
    </script>

    </div>
@endsection
