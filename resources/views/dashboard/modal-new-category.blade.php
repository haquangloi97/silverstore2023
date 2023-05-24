<div class="modal modal-sm fade" id="staticCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-bg-light rounded-4">
            <form action="{{ route('createCategory') }}" method="post">
                @csrf
                <div class="modal-body p-4">
                    <h1 class="h5 mb-3">New Category</h1>
                    <div class="mb-2">
                        <label for="inputName" class="form-label">Category name</label>
                        <input type="text" class="form-control" name="inputName" id="inputName">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-outline-dark fw-bold px-2"
                                data-bs-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-sm btn-outline-dark fw-bold px-2 ms-2">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
