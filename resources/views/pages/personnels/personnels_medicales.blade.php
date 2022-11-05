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
        @include('layouts.breadcrumb', ['menu'=> 'Personnel médicale', 'path'=> 'Personnels'])
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">Liste du personnes médicale</h4>
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
                                        <th>Nom</th>
                                        <th>Prenoms</th>
                                        <th>Contact</th>
                                        <th>Catégorie</th>
                                        <th>Spécialité</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($personnels as $personnel)
                                        <tr>
                                            <td>{{ $personnel->r_nom }}</td>
                                            <td>{{ $personnel->r_prenoms }}</td>
                                            <td>{{ $personnel->r_contact }}</td>
                                            <td><span class="badge bg-danger">{{ $personnel->r_libelle_categorie }}</span></td>
                                            <td><span class="badge bg-success">{{ $personnel->r_libelle_specialite }}</span></td>
                                            <td>{{ $personnel->created_at->format('d.m.Y à H:i:s') }}</td>
                                            <td>
                                                <i class="bx bx-edit text-primary icons edit" title="Modification de la catégorie {{ $personnel->r_libelle }}" data-id="{{ $personnel }}"></i>
                                                <i class="bx bx-trash text-danger icons delete" title="Supression de la catégorie {{ $personnel->r_libelle }}" data-id="{{ $personnel }}" ></i>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenoms</th>
                                        <th>Contact</th>
                                        <th>Catégorie</th>
                                        <th>Spécialité</th>
                                        <th>Date de création</th>
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

<div class="col">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#personnelformsModal">Large Modal</button>
    <!-- Modal -->
    <div class="modal fade" id="personnelformsModal" tabindex="-1" aria-hidden="true">
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

                    <form class="row g-3" id="personnelforms">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="r_nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="r_nom">
                                <span class="text-danger" id="validation_r_nom" ></span>
                            </div>
                            <div class="col-md-6">
                                <label for="r_prenoms" class="form-label">Prenoms</label>
                                <input type="text" class="form-control" id="r_prenoms">
                                <span class="text-danger" id="validation_r_prenoms" ></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="r_contact" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="r_contact">
                                <span class="text-danger" id="validation_contact" ></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Catégories</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="r_categorie">
                                    <option selected="">---Sélectionnez la catégorie---</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->r_libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-label">Spécialités</label>
                                {{-- <select class="multiple-select" data-placeholder="Choose anything" id="r_specialite" multiple="multiple"> --}}
                                    <select class="form-select mb-3" aria-label="Default select example" id="r_specialite">

                                    <option selected="">---Sélectionnez la spécialité---</option>
                                    @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->id }}">{{ $specialite->r_libelle }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="r_description" class="form-label">Description</label>
                                <textarea class="form-control" id="r_description" placeholder="" rows="3"></textarea>
                                <span id="validation_description" ></span>
                            </div>
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
        var personnel = {};

        //Script SQL
        $('#btnModal').on('click', function(){
            $('#modalTitle').empty();
            $('#modalTitle').append('Saisir une nouveau personnel');
            $('#personnelformsModal').modal('show');
        });

        //Enregistrer une nouvelle catégorie
        $('#btnregister').on('click', ()=>{

            //Récupération des données
            let dataSend = {
                "_token": "{{ csrf_token() }}",
                r_nom: $('#r_nom').val().trim(),
                r_prenoms: $('#r_prenoms').val().trim(),
                r_contact: $('#r_contact').val().trim(),
                r_personnel: $('#r_personnel').val(),
                r_specialite: $('#r_specialite').val(),
                r_description: $('#r_description').val().trim()
            };

            //Vérification et validation des champs
            if( dataSend.r_nom == "" || dataSend.r_nom == undefined ){
                $('#validation_r_nom').empty();
                $('#validation_r_nom').append(`Le libellé de la catégorie est réquis`);
                return;
            }else{
                $('#validation_r_nom').empty();
            }

            $.ajax({
                type:'POST',
                url:"{{ url('/personnels') }}",
                data:dataSend,
                dataType: 'JSON',
                success:function(res){

                    if (res._status == 1) {
                        $('#personnelforms')[0].reset();
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
            personnel = $(this).data('id');
            $('#btnregister').hide();
            $('#btnmodif').show();
            $('#modalTitle').empty();
            $('#modalTitle').append(`Modification des infos de [ ${personnel.r_nom} ${personnel.r_prenoms} ]`);
            //Affectation des valeurs dans les champs
            $('#r_nom').val(personnel.r_nom);
            $('#r_prenoms').val(personnel.r_prenoms);
            $('#r_contact').val(personnel.r_contact);
            $('#r_categorie').val(personnel.r_categorie);
            $('#r_specialite').val(personnel.r_specialite);
            $('#r_description').val(personnel.r_description);
            $('#personnelformsModal').modal('show');
        });

        //Modification une nouvelle catégorie
        $('#btnmodif').on('click', (e)=>{
            e.preventDefault();
            //Récupération des données
            //Récupération des données
            let dataSend = {
                "_token": "{{ csrf_token() }}",
                r_nom: $('#r_nom').val().trim(),
                r_prenoms: $('#r_prenoms').val().trim(),
                r_contact: $('#r_contact').val().trim(),
                r_personnel: $('#r_personnel').val(),
                r_specialite: $('#r_specialite').val(),
                r_description: $('#r_description').val().trim()
            };

            //Vérification et validation des champs
            if( dataSend.r_nom == "" || dataSend.r_nom == undefined ){
                $('#validation_libelle').empty();
                $('#validation_libelle').append(`Le nom est réquis`);
                return;
            }else{
                $('#validation_libelle').empty();
            }

            $.ajax({
                type:'PUT',
                url:`{{ url('/personnels') }}/${personnel.id}`,
                data:dataSend,
                dataType: 'JSON',
                success:function(res){
                    console.log(res);
                    if (res._status == 1) {
                        $('#personnelforms')[0].reset();
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
