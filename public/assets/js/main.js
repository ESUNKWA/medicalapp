$(document).ready(function() {
    $('#example').DataTable();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#btnregister').show();
    $('#btnmodif').hide();
    var categorie = {};

    //Saisir une nouvelle catégories
    $('#btnModal').on('click', function(){
        $('#modalTitle').empty();
        $('#modalTitle').append('Saisir une nouvelle catégorie');
        $('#categorieModal').modal('show');
        $('#categoriesforms')[0].reset();
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
            url:"{{ url('/categories') }}",
            data:dataSend,
            dataType: 'JSON',
            success:function(res){

                if (res._status == 1) {
                    $('#categoriesforms')[0].reset();
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
        categorie = $(this).data('id');
        $('#btnregister').hide();
        $('#btnmodif').show();
        $('#modalTitle').empty();
        $('#modalTitle').append(`Modification de la catégorie [ ${categorie.r_libelle} ]`);
        //Affectation des valeurs dans les champs
        $('#r_libelle').val(categorie.r_libelle);
        $('#r_description').val(categorie.r_description);
        $('#categorieModal').modal('show');
    });

    //Enregistrer une nouvelle catégorie
    $('#btnmodif').on('click', ()=>{

        //Récupération des données
        let dataSend = {
            "_token": "csrf_token()",
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
            type:'put',
            url:location.origin+`/categories/${categorie.id}`,
            data:dataSend,
            dataType: 'JSON',
            success:function(res){
                console.log(res);
                if (res._status == 1) {
                    $('#categoriesforms')[0].reset();
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
