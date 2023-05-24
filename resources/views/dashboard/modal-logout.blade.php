<!-- Modal Logout -->
<div class="modal modal-sm fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-bg-light rounded-4">
            <div class="modal-body p-4">
                <h1 class="h5">Do you want to end your other sessions?</h1>
                <p class="text-muted">You're about to end your other active SilverStore sessions, and you'll need to log in again on those devices to start a new ones.</p>
                <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2 mb-2" onclick="window.location='{{ route('logout') }}'">Log out</button>
                <button type="button" class="btn btn-sm btn-outline-dark w-100 rounded-pill fw-bold p-2" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
