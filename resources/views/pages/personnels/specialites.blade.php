@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        @include('layouts.breadcrumb', ['menu'=> 'Personnel médicale', 'path'=> 'Spécialités'])
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">Liste des spécialités</h4>
                <div style="position: absolute; top: 10px;   right: 5px;" class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" id="btnModal" title="Saisir une nouvelle spécialité" >
                        Nouveau <i class="bx bx-plus"></i>
                    </a>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" data-page-length='5'>
                        <thead>
                            <tr class="bg-primary text-white" >
                                <th>Libellé</th>
                                <th>Description</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($specialites as $specialite)
                            <tr>
                                <td>{{ $specialite->r_libelle }}</td>
                                <td>{{ $specialite->r_description }}</td>
                                <td>{{ $specialite->created_at->format('d.m.Y à H:i:s') }}</td>
                                <td>
                                    <i class="bx bx-edit text-primary icons edit" title="Modification de la catégorie {{ $specialite->r_libelle }}" data-id="{{ $specialite }}"></i>
                                    <i class="bx bx-trash text-danger icons delete" title="Supression de la catégorie {{ $specialite->r_libelle }}" data-id="{{ $specialite }}" ></i>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Libellé</th>
                                <th>Description</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>

<div class="col">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SpecialiteModal">Large Modal</button>
    <!-- Modal -->
    <div class="modal fade" id="SpecialiteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle" ></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" id="affichemsg" hidden>
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Success Alerts</h6>
                                <div class="text-white" id="responsemsgsuccess" ></div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form class="row g-3" id="specialisteforms">
                        @csrf
                        <div class="col-md-12">
                            <label for="r_libelle" class="form-label">Libellé</label>
                            <input type="text" class="form-control" id="r_libelle">
                            <span class="text-danger" id="validation_libelle" ></span>
                        </div>

                        <div class="col-12">
                            <label for="r_description" class="form-label">Description</label>
                            <textarea class="form-control" id="r_description" placeholder="" rows="3"></textarea>
                            <span id="validation_description" ></span>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="btnregister" >Enregistrer</button>
                    <button type="button" class="btn btn-primary" id="btnmodif" >Modifier</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#btnregister').show();
        $('#btnmodif').hide();
        var specialites = {};

        //Script SQL
        $('#btnModal').on('click', function(){
            $('#modalTitle').empty();
            $('#modalTitle').append('Saisir une nouvelle spécialité');
            $('#SpecialiteModal').modal('show');
        });

        //Enregistrer une nouvelle catégorie
        $('#btnregister').on('click', ()=>{

            //Récupération des données
            let dataSend = {
                "_token": "{{ csrf_token() }}",
                r_libelle: $('#r_libelle').val().trim(),
                r_description: $('#r_description').val().trim()
            };

            //Vérification et validation des champs
            if( dataSend.r_libelle == "" || dataSend.r_libelle == undefined ){
                $('#validation_libelle').empty();
                $('#validation_libelle').append(`Le libellé de la catégorie est réquis`);
                return;
            }else{
                $('#validation_libelle').empty();
            }

            $.ajax({
                type:'POST',
                url:"{{ url('/specialites') }}",
                data:dataSend,
                dataType: 'JSON',
                success:function(res){

                    if (res._status == 1) {
                        $('#specialisteforms')[0].reset();
                        $('#responsemsgsuccess').empty();
                        $('#responsemsgsuccess').append(res._message);
                        $('#affichemsg').removeAttr('hidden', true);
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }else{

                    }
                }
            });

        });

        //Récupération des détails d'une ligne
        $('body').on('click', '.edit', function(){
            specialites = $(this).data('id');
            $('#btnregister').hide();
            $('#btnmodif').show();
            $('#modalTitle').empty();
            $('#modalTitle').append(`Modification de la catégorie [ ${specialites.r_libelle} ]`);
            //Affectation des valeurs dans les champs
            $('#r_libelle').val(specialites.r_libelle);
            $('#r_description').val(specialites.r_description);
            $('#SpecialiteModal').modal('show');
        });

        //Modification une nouvelle catégorie
        $('#btnmodif').on('click', ()=>{

            //Récupération des données
            let dataSend = {
                "_token": "{{ csrf_token() }}",
                r_libelle: $('#r_libelle').val().trim(),
                r_description: $('#r_description').val().trim()
            };

            //Vérification et validation des champs
            if( dataSend.r_libelle == "" || dataSend.r_libelle == undefined ){
                $('#validation_libelle').empty();
                $('#validation_libelle').append(`Le libellé de la spécialité est réquis`);
                return;
            }else{
                $('#validation_libelle').empty();
            }

            $.ajax({
                type:'put',
                url:location.origin+`/specialites/${specialites.id}`,
                data:dataSend,
                dataType: 'JSON',
                success:function(res){
                    console.log(res);
                    if (res._status == 1) {
                        $('#specialisteforms')[0].reset();
                        $('#responsemsgsuccess').empty();
                        $('#responsemsgsuccess').append(res._message);
                        $('#affichemsg').removeAttr('hidden', true);
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }else{

                    }
                }
            });

        });

    } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: true,
            lengthMenu: [ 5,10, 25, 50, 75, 100 ],
            buttons: [ 'colvis','copy', 'excel', 'pdf', 'print']
        } );

        table.buttons().container()
        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection
