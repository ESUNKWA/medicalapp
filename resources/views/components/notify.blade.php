@switch($status)
    @case(1)
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="affichemsgsuccess">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Super !!!</h6>
                    <div class="text-white" id="responsemsgsuccess" ></div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @break

    @default
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2" id="affichemsgerror">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Oops erreur !!!</h6>
                <div class="text-white" id="responsemsgerror"></div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endswitch


