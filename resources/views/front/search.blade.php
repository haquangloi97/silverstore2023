@extends('front.master')
@section('body')
    <!--Body-->
    <div class="container mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Tìm thấy <b>{{ $products->total() }}</b> kết
                    quả với từ khóa <b>"{{ $k }}"</b></li>
            </ol>
        </nav>
        @if ($products->total())
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 gy-4">
                @foreach($products as $product)
                    <div class="col d-flex align-items-stretch">
                        <div class="card shadow-sm rounded-0 flex-grow-1" title="{{ $product->name }}">
                            <div class="card-img d-flex position-relative">
                                <a href="{{ $product->getCategory->slug }}/{{ $product->slug }}" class="mx-auto p-3 stretched-link">
                                    <img src="front/img/{{ $product->img }}" width="210" alt="">
                                </a>
                                @if ($product->sale && $product->qty > 0)
                                    <span class="badge rounded-pill text-bg-danger position-absolute bottom-0 start-0 ms-3">-{{ round(($product->price - $product->sale) / $product->price * 100) }}%</span>
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="card-text d-flex flex-column gap-2">
                                    <h5>{{ $product->name }}</h5>
                                    @if ($product->qty < 1)
                                        <span class="small">Hết hàng tạm thời</span>
                                    @elseif ($product->sale)
                                        <span
                                            class="text-danger fw-bold fs-5">{{ number_format($product->sale,0,",",".") }}₫</span>
                                        <span class="text-decoration-line-through text-secondary text-opacity-75">{{ number_format($product->price,0,",",".") }}₫</span>
                                    @else
                                        <span
                                            class="text-danger fw-bold fs-5">{{ number_format($product->price,0,",",".") }}₫</span>
                                    @endif
                                </div>
                                <div class="d-grid gap-2 mt-auto">
                                    <a href="{{ $product->getCategory->slug }}/{{ $product->slug }}" role="button"
                                       class="btn btn-sm btn-outline-secondary">View</a>
                                    <button type="button" @if ($product->qty < 1) disabled @endif
                                    onclick="window.location='{{ route('addToCart', $product->id) }}'"
                                            class="btn btn-outline-secondary btn-sm">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="invisible">...</div>
            {{ $products->appends(['k' => $k])->links() }}
        @else
            <div class="d-flex flex-column gap-3 mt-5">
                <i class="fa-solid fa-file-circle-question text-danger fa-5x mx-auto"></i>
                <span class="mx-auto">Rất tiếc chúng tôi không tìm thấy kết quả của <b>{{ $k }}</b></span>
                <div class="bg-white py-2 px-3 border border-secondary border-opacity-25 rounded-1 mx-auto" style="width:100%;max-width: 360px;">
                    <span class="small fw-bold">Để tìm được kết quả chính xác hơn, xin vui lòng:</span>
                    <ul class="px-3 mb-0 small">
                        <li>Kiểm tra lỗi chính tả của từ khóa đã nhập</li>
                        <li>Thử lại bằng từ khóa khác</li>
                        <li>Thử lại bằng những từ khóa tổng quát hơn</li>
                        <li>Thử lại bằng những từ khóa ngắn gọn hơn</li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
    <!--End Body-->
@endsection
