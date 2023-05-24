@extends('front.master')
@section('body')
    <!--Body-->
    <div class="container mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="small" href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="small" href="{{ $product->getCategory->slug }}">{{ $product->getCategory->name }}</a>
                </li>
            </ol>
        </nav>
        <div class="border-bottom">
            <p class="h5 fw-semibold">{{ $product->name }} @if ($product->qty < 1) <span class="fs-6 fw-light">(Hết hàng tạm thời)</span> @endif</p>
        </div>
        <div class="py-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex flex-column border rounded bg-white p-4 gap-3">
                        <img src="front/img/{{ $product->img }}" width="360" class="mx-auto" alt="">
                        <div class="hstack gap-2">
                            @if ($product->sale)
                                <span class="text-danger fw-bold fs-5">{{ number_format($product->sale, 0, ',', '.') }}₫</span>
                                <span class="text-secondary text-decoration-line-through text-opacity-75">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                <span class="fw-semibold text-danger">-{{ round(($product->price - $product->sale) / $product->price * 100) }}%</span>
                            @else
                                <span class="text-danger fw-bold fs-5">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            @endif
                        </div>
                        <button type="button" onclick="window.location.href='{{ route('addToCart', $product->id) }}'" @if ($product->qty < 1) disabled @endif class="btn btn-danger vstack align-items-center">
                            <span class="text-uppercase fw-semibold">Mua ngay</span>
                            <span class="small">Giao hàng miễn phí hoặc nhận tại shop</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative-product">
            <p class="fw-semibold">Xem thêm điện thoại khác</p>
            <div class="relative-product-list">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 g-2">
                    @foreach($relatedProducts as $related)
                        <div class="col d-flex align-items-stretch">
                            <div class="card shadow-sm rounded-0 flex-grow-1">
                                <div class="card-img d-flex position-relative">
                                    <a href="{{ $related->getCategory->slug }}/{{ $related->slug }}" class="mx-auto p-3 stretched-link">
                                        <img src="front/img/{{ $related->img }}" width="120" alt="">
                                    </a>
                                </div>
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="card-text d-flex flex-column gap-2">
                                        <h6>{{ $related->name }}</h6>
                                        @if ($related->sale)
                                            <span class="text-danger fw-bold">{{ number_format($related->sale,0,",",".") }}₫</span>
                                            <span class="text-secondary text-opacity-75"><s class="small">{{ number_format($related->price,0,",",".") }}₫</s> <small class="fw-semibold text-danger">-{{ round(($related->price - $related->sale) / $related->price * 100) }}%</small></span>
                                        @else
                                            <small class="text-danger fw-bold">{{ number_format($related->price,0,",",".") }}₫</small>
                                        @endif
                                    </div>
                                    <div class="d-grid gap-2 mt-auto">
                                        <a href="{{ $related->getCategory->slug }}/{{ $related->slug }}"
                                           role="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        <button type="button" onclick="window.location.href='{{ route('addToCart', $related->id) }}'"
                                                class="btn btn-outline-secondary btn-sm">Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End Body-->

    <!--Footer-->
    @include('front.footer')
    <!--End Footer-->
@endsection
