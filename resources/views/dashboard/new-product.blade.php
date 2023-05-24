@extends('dashboard.master')
@section('body')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">Add New Product</p>
        <form method="post" enctype="multipart/form-data" class="row g-3 g-md-2">
            @csrf
            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                <label for="inputName" class="ps-3">Name</label>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto">
                <div class="row g-2">
                    <div class="col-10 form-floating">
                        <select name="category" id="inputCategory" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="inputCategory" class="ps-3">Categories</label>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-outline-secondary w-100 h-100"
                                data-bs-target="#staticCategory" data-bs-toggle="modal" title="Add new Category"><i
                                class="fa-solid fa-plus fs-4"></i></button>
                    </div>
                    @error('inputName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="price" class="form-control" id="inputPrice" placeholder="Price">
                <label for="inputPrice" class="ps-3">Price</label>
                <span class="text-danger">
                            @error('price') {{ $message }} @enderror
                        </span>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="sale" class="form-control" id="inputSale" placeholder="Sale">
                <label for="inputSale" class="ps-3">Sale</label>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="qty" class="form-control" id="inputQuantity" placeholder="Quantity">
                <label for="inputQuantity" class="ps-3">Quantity</label>
                <span class="text-danger">
                            @error('qty') {{ $message }} @enderror
                        </span>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto">
                <input name="uploadImage" class="form-control" type="file" id="uploadImage"
                       onchange="PreviewImage();">
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto" id="inviImage">
                <img src="front/img/no-image-available.jpg" alt="" id="previewImage" width="300"
                     class="mx-auto d-block">
                <script type="text/javascript">
                    function PreviewImage() {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            document.getElementById("previewImage").src = e.target.result;
                        };

                        if (event.target.files[0]) {
                            reader.readAsDataURL(document.getElementById("uploadImage").files[0]);
                        } else {
                            document.getElementById("previewImage").src = "front/img/no-image-available.jpg";
                        }
                    };
                </script>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <textarea name="description" class="form-control" id="inputDescription"></textarea>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="featured" role="switch" id="inputFeatured">
                    <label class="form-check-label" for="inputFeatured">Featured Products (Banners)</label>
                </div>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto mb-4">
                <button type="submit" class="btn btn-primary w-100 text-uppercase fw-bold p-2 rounded-pill">Create
                </button>
            </div>
        </form>
    </div>
    @include('dashboard.modal-new-category')
    <script src="ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#inputDescription'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
