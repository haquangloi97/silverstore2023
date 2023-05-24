@extends('dashboard.master')
@section('body')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">Edit {{ $product->name }}</p>
        <form action="{{ route('updateProduct', $product->slug) }}" method="post" enctype="multipart/form-data" class="row g-3 g-md-2">
            @method('put')
            @csrf
            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ $product->name }}">
                <label for="inputName" class="ps-3">Name</label>
                <span class="text-danger">
                            @error('name') {{ $message }} @enderror
                        </span>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <select name="category" id="inputCategory" class="form-select">
                    @foreach($categories as $category)
                        <option @if ($category->id == $product->getCategory->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <label for="inputCategory" class="ps-3">Categories</label>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="price" class="form-control" id="inputPrice" placeholder="Price" value="{{ $product->price }}">
                <label for="inputPrice" class="ps-3">Price</label>
                <span class="text-danger">
                            @error('price') {{ $message }} @enderror
                        </span>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="sale" class="form-control" id="inputSale" placeholder="Sale" value="{{ $product->sale }}">
                <label for="inputSale" class="ps-3">Sale</label>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="form-floating col-md-8 col-lg-6 mx-md-auto">
                <input type="number" name="qty" class="form-control" id="inputQuantity" placeholder="Quantity" value="{{ $product->qty }}">
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

            <div class="col-md-8 col-lg-6 mx-md-auto">
                @if (isset($product->img))
                    <img src="{{ asset('front/img/'.$product->img) }}" alt="" id="previewImage" width="300" class="mx-auto d-block">
                @else
                    <img src="{{ asset('front/img/no-image-available.jpg') }}" alt="" id="previewImage" width="300" class="mx-auto d-block">
                @endif
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
                <textarea name="description" class="form-control" id="inputDescription">{{ $product->description }}</textarea>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" role="switch" id="inputStatus" @if ($product->status) checked @endif>
                    <label class="form-check-label" for="inputStatus">Hide / Show</label>
                </div>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="featured" role="switch" id="inputFeatured" @if ($product->featured) checked @endif>
                    <label class="form-check-label" for="inputFeatured">Featured Products (Banners)</label>
                </div>
            </div>

            <div class="w-100 d-none d-md-block"></div>

            <div class="col-md-8 col-lg-6 mx-md-auto mb-4">
                <button type="submit" class="btn btn-success w-100 text-uppercase fw-bold p-2 rounded-pill">Save Changes</button>
            </div>
        </form>
    </div>

    <script src="ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#inputDescription'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
