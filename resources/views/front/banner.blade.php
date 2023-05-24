<div class="container my-4">
    <div class="owl-carousel shadow-lg bg-white rounded">
        @foreach ($featuredProducts as $featured)
            <div class="row p-4 align-items-center mx-0">
                <div class="col-xxl-4 col-lg-5 col-md-8 overflow-hidden mx-auto mb-3 mb-lg-0">
                    <img src="front/img/{{ $featured->img }}" alt="" width="400">
                </div>
                <div class="col-xxl-8 col-lg-7 d-flex flex-column gap-2 align-self-start">
                    <span class="display-6 fw-bold font-monospace">{{ $featured->name }}</span>
                    @if ($featured->sale)
                        <span class="text-decoration-line-through text-opacity-75 text-dark">Price: {{ number_format($featured->price,0,",",".") }}₫</span>
                        <span class="fw-bold">Sale: <span class="display-6 text-danger fw-bold">{{ number_format($featured->sale,0,",",".") }}₫</span></span>
                    @else
                        <span class="fw-bold">Price: <span class="display-6 text-danger fw-bold">{{ number_format($featured->price,0,",",".") }}₫</span></span>
                    @endif
                    <span class="lead">{!! $featured->description !!}</span>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="{{ $featured->getCategory->slug }}/{{ $featured->slug }}" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">View</a>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4" @if ($featured->qty < 1) disabled @endif onclick="window.location.href='{{ route('addToCart', $featured->id) }}'">Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="front/js/owl.carousel.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            }
        }
    })
</script>
