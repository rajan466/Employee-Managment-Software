{{-- Logout Confirmation Modal --}}
<div class="modal fade flip" id="logoutConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>Are you sure you want to logout?</h4>
                    <p class="text-muted fs-14 mb-4">Logging out will end your current session.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link btn-ghost-success btn-sm fw-medium text-decoration-none"
                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cancel</button>
                        <button class="btn btn-danger" onclick="window.location.href='{{ route('logout') }}'">
                            Yes, Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Logout Confirmation Modal -->

