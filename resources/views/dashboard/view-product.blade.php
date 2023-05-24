@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">List of Products</p>
        <table id="example" class="cell-border stripe py-2">
            <thead class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Sale</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Sold</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><button type="button" class="btn btn-sm btn-close" title="Delete {{ $product->name }}" data-bs-toggle="modal" data-bs-target="#staticDelete" onclick="TransferId({{ $product->id }})"></button></td>
                    <td>
                        @if (isset($product->img))
                            <img src="{{ asset('front/img/'.$product->img) }}" width="40" alt="">
                        @else
                            <img src="{{ asset('front/img/no-image-available.jpg') }}" width="40" alt="">
                        @endif
                    </td>
                    <td>
                        <span class="link-success text-decoration-none">{{ $product->name }}</span>
                    </td>
                    <td>{{ $product->getCategory->name }}</td>
                    <td><span class="text-danger">{{ number_format($product->price, 0, ',', '.') }}</span></td>
                    <td>@if ($product->sale) <span class="text-bg-warning">{{ number_format($product->sale, 0, ',', '.') }}</span> @endif</td>
                    <td><span class="fw-semibold @if ($product->qty) text-success @else text-danger @endif">{{ $product->qty }}</span></td>
                    <td>
                        @if ($product->status)
                            <i class="fa-solid fa-toggle-on fs-4 text-success" title="Shown"><span class="visually-hidden">Shown</span></i>
                        @else
                            <i class="fa-solid fa-toggle-off fs-4 text-secondary" title="Hidden"><span class="visually-hidden">Hidden</span></i>
                        @endif
                    </td>
                    <td><span class="fw-semibold text-primary">{{ $product->sold }}</span></td>
                    <td>
                        <a href="{{ route('viewProduct', $product->slug) }}" class="btn btn-sm btn-outline-secondary rounded-circle" title="Edit {{ $product->name }}">
                            <i class="fa-solid fa-file-import"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Sale</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Sold</th>
                <th>Edit</th>
            </tr>
            </tfoot>
        </table>
        <div class="text-center text-sm-start py-3">
            <button type="button" class="btn btn-primary fw-bold rounded-0" onclick="window.location='{{ route('viewNewProduct') }}'"><i class="fa-solid fa-plus pe-1"></i>New Product
            </button>
        </div>
    </div>
@endsection
