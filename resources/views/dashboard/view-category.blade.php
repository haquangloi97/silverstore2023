@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">List of Categories</p>
        <table id="example" class="cell-border stripe py-2">
            <thead class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $id => $category)
                <tr @if ($category->id <> $currentCategory->id) class="text-bg-warning bg-opacity-25" @endif>
                    <th>
                        <button type="button" class="btn btn-sm btn-close" aria-label="Close" title="Delete {{ $category->name }}"
                                data-bs-toggle="modal" data-bs-target="#staticDelete"
                                onclick="TransferId({{ $category->id }})"></button>
                    </th>
                    <td>
                        <input @if ($category->id == $currentCategory->id) name="name" form="category" @else disabled
                               @endif type="text" class="form-control" value="{{ $category->name }}">
                    </td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input @if ($category->id == $currentCategory->id) name="status" form="category" @else disabled @endif class="form-check-input" type="checkbox" role="switch" @if ($category->status) checked title="Shown" @else title="Hidden" @endif>
                        </div>
                    </td>
                    <td>
                        @if ($category->id == $currentCategory->id)
                            <form id="category" action="{{ route('updateCategory', $category->slug) }}" method="post">
                                @method('put')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success"><i
                                        class="fa-solid fa-floppy-disk fs-5"></i></button>
                            </form>
                        @else
                            <a href="{{ route('viewCategory', $category->slug) }}" class="btn btn-sm btn-outline-secondary"><i
                                    class="fa-solid fa-arrows-rotate fa-fw"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-between align-items-center pb-3">
            <button type="button" class="btn btn-primary fw-bold rounded-0" data-bs-toggle="modal"
                    data-bs-target="#staticCategory"><i class="fa-solid fa-plus pe-1"></i>New Category
            </button>
            @error('inputName') <span class="text-bg-danger p-1"><i class="fa-solid fa-triangle-exclamation pe-1"></i>{{ $message }}</span @enderror
        </div>
    @include('dashboard.modal-new-category')
@endsection
