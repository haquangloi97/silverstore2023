<div class="bg-indigo bg-gradient">
    <div class="container">
        <div class="d-flex flex-row gap-2 gap-md-0">
            <div class="d-inline-flex flex-md-grow-1">
                <a class="text-decoration-none text-white py-3" href="/"><i class="fa-solid fa-shield-cat pe-md-1 fs-3 align-middle"></i><span class="fs-5 align-middle d-none d-md-inline">SilverStore.com</span></a>
            </div>
            <div class="d-inline-flex flex-grow-1 gap-2">
                <form action="{{ route('search') }}" class="position-relative m-auto w-75 flex-grow-1" role="search">
                    <input class="form-control shadow-none border-0 pe-5" type="search" placeholder="Search SilverStore" aria-label="Search" name="k">
                    <button class="btn h-100 border-0 btn-dark position-absolute top-0 end-0 rounded-0 rounded-end" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="position-relative m-auto flex-shrink-1">
                    <a href="{{ route('cart') }}" class="d-block">
                        <i class="fa-solid fa-cart-shopping text-white fs-3"></i>
                        @if (session('cart'))
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">{{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm bg-dark py-0">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="d-flex flex-column flex-sm-row align-items-center text-light mb-0 list-unstyled gap-sm-5">
                @foreach ($categories as $category)
                    <li class="position-relative py-1">
                        <a href="{{ $category->slug }}" class="text-white text-decoration-none stretched-link">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <button class="btn border-0 mx-auto d-sm-none" type="button" onclick="Expand();" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-angles-down text-white" id="iExpand"></i>
        </button>
        <script>
            function Expand() {
                var element = document.getElementById("iExpand");
                element.classList.toggle('fa-angles-up');
            }
        </script>
    </div>
</nav>

