@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">Welcome
            back, {{ Auth::user()->name }}</p>
        @if (session('status'))
            <div class="alert alert-warning fw-bold alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-triangle-exclamation pe-1"></i>{{ session('status') }}
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row g-3 mb-3">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto bg-light">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-solid fa-shield-cat fa-4x"></i>
                        </h5>
                        <a href="{{ route('index') }}" class="stretched-link"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">Customers
                        Page
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 1)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-regular fa-file-lines fa-4x"></i>
                        </h5>
                        <a href="{{ route('listOrders') }}" class="stretched-link"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">Order Manager
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-solid fa-table fa-4x"></i>
                        </h5>
                        <a href="{{ route('viewCategory') }}" class="stretched-link"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">Category Manager
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-solid fa-tablet-screen-button fa-4x"></i>
                        </h5>
                        <a href="{{ route('listProducts') }}" class="stretched-link"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">Product Manager
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-solid fa-user-gear fa-4x"></i>
                        </h5>
                        <a href="{{ route('viewUser') }}" class="stretched-link"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">User Manager
                    </div>
                </div>
            </div>
            @endif
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card border-dark mx-auto">
                    <div class="card-body text-dark">
                        <h5 class="card-text text-center">
                            <i class="fa-solid fa-right-from-bracket fa-4x"></i>
                        </h5>
                        <a href="{{ route('logout') }}" class="stretched-link" data-bs-toggle="modal"
                           data-bs-target="#staticBackdrop"></a>
                    </div>
                    <div class="card-footer bg-transparent border-dark text-center fw-semibold">Logout
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
