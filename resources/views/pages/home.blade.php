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
            <div class="col-md-3 mb-2 mt-3 ">
                <h5 style="border: 1px solid black; padding: 10px;background-color: rgb(25, 177, 219)">Danh mục sản phẩm</h5>
                <ul class="nav nav-pills flex-column">
                    @foreach ($cats as $cat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('detail.category', $cat->id) }}">{{ $cat->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-9">
                @foreach ($cats as $c)
                    <h3>Danh mục {{ $c->name }}</h3>
                    <div class="card-deck mb-2">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                            @foreach ($book as $p)
                                @if ($c->id == $p->category_id)
                                    <div class="col">
                                        <div class="card mt-3 size-card">
                                            <a href="{{ route('detail.book', $p->id) }}">
                                                <img src=" {{ $p->img}}" class="card-img-top size-img"
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
                                                    <button type="submit"
                                                        class="btn btn-primary custom-btn bi bi-cart-check"
                                                        onclick="alert('Đã thêm thành công')"> Thêm vào giỏ</button>
                                                </form>
                                                <form action="{{ route('favoritebook.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $p->id }}">
                                                    <input type="hidden" name="price" value="{{ $p->price }}">

                                                    <!-- Có thể thay đổi giá trị mặc định cho số lượng -->
                                                     <button class="btn btn-outline-success favorite-btn" type="submit" onclick="alert('Đã thêm thành công')"><i class="far fa-heart "></i></button>

                                                </form>
                                            @else
                                                {{-- Người dùng chưa đăng nhập --}}
                                                <button type="submit" onclick="alert('Vui lòng đăng nhập tài khoản')"
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
    </div>
    </div>
@endsection
