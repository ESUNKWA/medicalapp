@extends("layouts.app")

		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Applications</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">To Do List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-0">To Do List</h4>
                            <hr/>


                            <div class="row gy-3 mt-5">
                                <div class="row">
                                                                      
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3"><i class="bx bx-accueil bxs-user-plus"></i>
                                                    </div>
                                                    <h4 class="my-1">Nouveau patient</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3"><i class="bx bx-accueil bxs-bed"></i>
                                                    </div>
                                                    <h4 class="my-1">38M</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3"><i class="bx bx-accueil bxl-dropbox"></i>
                                                    </div>
                                                    <h4 class="my-1">28K</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row gy-3 mt-5">
                                <div class="row">
                                                                      
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3"><i class="bx bx-accueil bxl-linkedin-square"></i>
                                                    </div>
                                                    <h4 class="my-1">56K</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3"><i class="bx bx-accueil bxl-youtube"></i>
                                                    </div>
                                                    <h4 class="my-1">38M</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3"><i class="bx bx-accueil bxl-dropbox"></i>
                                                    </div>
                                                    <h4 class="my-1">28K</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
		@endsection

@section("script")
@endsection
