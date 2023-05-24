@extends('front.master')
@section('body')
    <!--Banner-->
    @include('front.banner')
    <!--End Banner-->

    <!--Body-->
    <div class="container mb-4">
        <div class="d-flex align-items-center rounded-top text-bg-danger px-3 py-2">
            <span class="text-uppercase fs-5 fw-semibold"><i class="fa-solid fa-fire pe-2"></i>Hot Sale</span>
        </div>
        <div class="row row-cols-lg-3 row-cols-xl-4 gy-4">
            @foreach ($hotSale as $hot)
                <div class="col d-flex align-items-stretch">
                    <div class="card shadow-sm rounded-0 flex-grow-1" title="{{ $hot->name }}">
                        <div class="card-img d-flex position-relative">
                            <a href="{{ $hot->getCategory->slug }}/{{ $hot->slug }}" class="mx-auto p-3 stretched-link">
                                <img src="front/img/{{ $hot->img }}" width="210" alt="">
                            </a>
                            @if ($hot->sale && $hot->qty > 0)
                                <span class="badge rounded-pill text-bg-danger position-absolute bottom-0 start-0 ms-3">-{{ round(($hot->price - $hot->sale) / $hot->price * 100) }}%</span>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column gap-3">
                            <div class="card-text d-flex flex-column gap-2">
                                <h5>{{ $hot->name }}</h5>
                                @if ($hot->qty < 1)
                                    <span class="small">Hết hàng tạm thời</span>
                                @elseif ($hot->sale)
                                    <span
                                        class="text-danger fw-bold fs-5">{{ number_format($hot->sale,0,",",".") }}₫</span>
                                    <span class="text-decoration-line-through text-secondary text-opacity-75">{{ number_format($hot->price,0,",",".") }}₫</span>
                                @else
                                    <span
                                        class="text-danger fw-bold fs-5">{{ number_format($hot->price,0,",",".") }}₫</span>
                                @endif
                            </div>
                            <div class="d-grid gap-2 mt-auto">
                                <a href="{{ $hot->getCategory->slug }}/{{ $hot->slug }}" role="button"
                                   class="btn btn-sm btn-outline-secondary">View</a>
                                <button type="button" @if ($hot->qty < 1) disabled @endif
                                        onclick="window.location='{{ route('addToCart', $hot->id) }}'"
                                        class="btn btn-outline-secondary btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mb-4">
        <div class="d-flex align-items-center rounded-top text-bg-danger px-3 py-2">
            <span class="text-uppercase fs-5 fw-semibold"><i class="fa-solid fa-ranking-star pe-2"></i>Best Sellers</span>
        </div>
        <div class="row row-cols-lg-3 row-cols-xl-4 gy-4">
            @foreach($bestSellers as $best)
                <div class="col d-flex align-items-stretch">
                    <div class="card shadow-sm rounded-0 flex-grow-1" title="{{ $best->name }}">
                        <div class="card-img d-flex position-relative">
                            <a href="{{ $best->getCategory->slug }}/{{ $best->slug }}" class="mx-auto p-3 stretched-link">
                                <img src="front/img/{{ $best->img }}" width="210" alt="">
                            </a>
                            @if ($best->sale && $best->qty > 0)
                                <span class="badge rounded-pill text-bg-danger position-absolute bottom-0 start-0 ms-3">-{{ round(($best->price - $best->sale) / $best->price * 100) }}%</span>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column gap-3">
                            <div class="card-text d-flex flex-column gap-2">
                                <h5>{{ $best->name }}</h5>
                                @if ($best->qty < 1)
                                    <span class="small">Hết hàng tạm thời</span>
                                @elseif ($best->sale)
                                    <span
                                        class="text-danger fw-bold fs-5">{{ number_format($best->sale,0,",",".") }}₫</span>
                                    <span class="text-decoration-line-through text-secondary text-opacity-75">{{ number_format($best->price,0,",",".") }}₫</span>
                                @else
                                    <span
                                        class="text-danger fw-bold fs-5">{{ number_format($best->price,0,",",".") }}₫</span>
                                @endif
                            </div>
                            <div class="d-grid gap-2 mt-auto">
                                <a href="{{ $best->getCategory->slug }}/{{ $best->slug }}" role="button"
                                   class="btn btn-sm btn-outline-secondary">View</a>
                                <button type="button" @if ($best->qty < 1) disabled @endif
                                onclick="window.location='{{ route('addToCart', $best->id) }}'"
                                        class="btn btn-outline-secondary btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--End Body-->

    <!--Footer-->
    @include('front.footer')
    <!--End Footer-->
@endsection
