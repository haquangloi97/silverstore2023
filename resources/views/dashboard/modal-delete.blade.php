<!-- Modal Delete User -->
@if (Request::routeIs('viewUser'))
    <div class="modal modal-sm fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-light rounded-4">
                <form method="post" id="UserForm">
                    @method('delete')
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="fa-solid fa-triangle-exclamation h1 text-danger"></i>
                            <h1 class="h5 fw-bold">Are you sure?</h1>
                            <p class="text-muted">Do you really want to delete these records? This process cannot be
                                undone.</p>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2 mb-2">
                            Yes, delete
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2"
                                data-bs-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript User -->
    <script>
        function TransferId(id) {
            document.getElementById('UserForm').action = "{{ route('deleteUser', '') }}" + "/" + id;
        }
    </script>

<!-- Modal Delete Product -->
@elseif (Request::routeIs('listProducts'))
    <div class="modal modal-sm fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-light rounded-4">
                <form method="post" id="ProductForm">
                    @method('delete')
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="fa-solid fa-triangle-exclamation h1 text-danger"></i>
                            <h1 class="h5 fw-bold">Are you sure?</h1>
                            <p class="text-muted">Do you really want to delete these records? This process cannot be
                                undone.</p>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2 mb-2">
                            Yes, delete
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2"
                                data-bs-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript Product -->
    <script>
        function TransferId(id) {
            document.getElementById('ProductForm').action = "{{ route('deleteProduct', '') }}" + "/" + id;
        }
    </script>

<!-- Modal Delete Category -->
@elseif (Request::routeIs('viewCategory'))
    <div class="modal modal-sm fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-light rounded-4">
                <form method="post" id="CategoryForm">
                    @method('delete')
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="fa-solid fa-triangle-exclamation h1 text-danger"></i>
                            <h1 class="h5 fw-bold">Are you sure?</h1>
                            <p class="text-muted">Do you really want to delete these records? This process cannot be
                                undone.</p>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2 mb-2">
                            Yes, delete
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2"
                                data-bs-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript Category -->
    <script>
        function TransferId(id) {
            document.getElementById('CategoryForm').action = "{{ route('deleteCategory', '') }}" + "/" + id;
        }
    </script>

<!-- Modal Delete Order -->
@elseif (Request::routeIs('listOrders'))
    <div class="modal modal-sm fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-light rounded-4">
                <form method="post" id="OrderForm">
                    @method('delete')
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="fa-solid fa-triangle-exclamation h1 text-danger"></i>
                            <h1 class="h5 fw-bold">Are you sure?</h1>
                            <p class="text-muted">Do you really want to delete these records? This process cannot be
                                undone.</p>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2 mb-2">
                            Yes, delete
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2"
                                data-bs-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript Category -->
    <script>
        function TransferId(id) {
            document.getElementById('OrderForm').action = "{{ route('deleteOrder', '') }}" + "/" + id;
        }
    </script>
@endif
