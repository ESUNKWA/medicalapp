@extends("layouts.app")

		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    @include('layouts.breadcrumb', ['menu'=> '', 'path'=> 'Accueil'])

                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-0">To Do List</h4>
                            <hr/>
                            <div class="row gy-3 mt-5">
                                <div class="row">

                                    <div class="col px-5">
                                        <div class="card radius-10 bgCardAcceuil">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light text-info mb-3">
                                                        <img src="/assets/images/accueil_images/add_patient.png" height="50px" alt="" srcset="">
                                                    </div>
                                                    <h5 class="my-1">
                                                        <a type="button" class="btn btn-outline-primary px-3 radius-30" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Nouveau patient</a></h4>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10 bgCardAcceuil">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light text-success mb-3">
                                                        <img src="assets/images/accueil_images/cast_40px.png" height="60px" alt="" srcset="">
                                                    </div>
                                                    <h4 class="my-1">
                                                        <h4 class="my-1">
                                                            <a type="button" class="btn btn-outline-primary px-5 radius-30" href="{{ url('/patients') }}">Patients</a></h4>
                                                        </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col px-5">
                                        <div class="card radius-10 bgCardAcceuil">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-light text-warning mb-3">
                                                        <img src="/assets/images/accueil_images/file_200px.png" height="60px" alt="" srcset="">
                                                    </div>
                                                    <h4 class="my-1"> <a type="button" class="btn btn-outline-primary px-5 radius-30" href="{{ url('/consultations') }}">Consultation</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row gy-3 mt-5">
                                <div class="row">

                                    <div class="col px-5">
                                        <div class="card radius-10 bgCardAcceuil">
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
                                        <div class="card radius-10 bgCardAcceuil">
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
                                        <div class="card radius-10 bgCardAcceuil">
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
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Large Modal</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		@endsection

@section("script")
@endsection



