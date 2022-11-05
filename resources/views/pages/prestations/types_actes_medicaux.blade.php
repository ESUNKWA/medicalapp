@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        @include('layouts.breadcrumb', ['menu'=> 'Prestations', 'path'=> 'Types d\'actes médicales'])
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">Liste des types d'actes médicaux</h4>
                <div style="position: absolute; top: 10px;   right: 5px;" class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" id="btnModal" title="Saisir une nouvelle spécialité" >
                        Nouveau <i class="bx bx-plus"></i>
                    </a>
                </div>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Libellé</th>
                                        <th>Description</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($typeActes as $typeActe)
                                        <tr>
                                            <td>{{ $typeActe->id }}</td>
                                            <td>{{ $typeActe->r_libelle }}</td>
                                            <td>{{ $typeActe->r_description }}</td>
                                            <td>{{ $typeActe->created_at->format('d.m.Y à H:i:s') }}</td>
                                            <td>
                                                <i class="bx bx-edit text-primary icons edit" title="Modification du type d'acte [ {{ $typeActe->r_libelle }} ]" data-id="{{ $typeActe }}"></i>
                                                <i class="bx bx-trash text-danger icons delete" title="Supression du type d'acte  {{ $typeActe->r_libelle }} ]" data-id="{{ $typeActe }}" ></i>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Code</th>
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="typeactesformsModal" tabindex="-1" aria-hidden="true">
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

                <form class="row g-3" id="typeactesforms">
                    @csrf

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="r_libelle" class="form-label">Libellé</label>
                            <input type="text" class="form-control" id="r_libelle">
                            <span class="text-danger" id="validation_libelle" ></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="r_description" class="form-label">Description</label>
                            <textarea class="form-control" id="r_description" placeholder="" rows="3"></textarea>
                            <span id="validation_description" ></span>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="btnregister" >Enregistrer</button>
                        <button type="button" class="btn btn-primary" id="btnmodif" >Modifier</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#btnregister').show();
        $('#btnmodif').hide();
        var typeacte = {};

        //Script SQL
        $('#btnModal').on('click', function(){
            $('#modalTitle').empty();
            $('#modalTitle').append('Saisir un nouveau acte');
            $('#typeactesformsModal').modal('show');
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
                $('#validation_libelle').append(`Le libellé est réquis`);
                return;
            }else{
                $('#validation_libelle').empty();
            }

            $.ajax({
                type:'POST',
                url:"{{ url('/types_actes_medicaux') }}",
                data:dataSend,
                dataType: 'JSON',
                success:function(res){

                    if (res._status == 1) {
                        $('#typeactesforms')[0].reset();
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
            typeacte = $(this).data('id');
            $('#btnregister').hide();
            $('#btnmodif').show();
            $('#modalTitle').empty();
            $('#modalTitle').append(`Modification du type d'acte [ ${typeacte.r_libelle} ]`);
            //Affectation des valeurs dans les champs
            $('#r_libelle').val(typeacte.r_libelle);
            $('#r_description').val(typeacte.r_description);
            $('#typeactesformsModal').modal('show');
        });

        //Modification une nouvelle catégorie
        $('#btnmodif').on('click', (e)=>{
            e.preventDefault();
            //Récupération des données
            //Récupération des données
            let dataSend = {
                "_token": "{{ csrf_token() }}",
                r_libelle: $('#r_libelle').val().trim(),
                r_description: $('#r_description').val().trim()
            };

            //Vérification et validation des champs
            if( dataSend.r_libelle == "" || dataSend.r_libelle == undefined ){
                $('#validation_libelle').empty();
                $('#validation_libelle').append(`Le libellé est réquis`);
                return;
            }else{
                $('#validation_libelle').empty();
            }

            $.ajax({
                type:'PUT',
                url:`{{ url('/types_actes_medicaux') }}/${typeacte.id}`,
                data:dataSend,
                dataType: 'JSON',
                success:function(res){
                    console.log(res);
                    if (res._status == 1) {
                        $('#typeactesforms')[0].reset();
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

    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );

        table.buttons().container()
        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection
