<?php

namespace App\Http\Controllers\Prestations;

use App\Models\ActeMedicaux;
use Illuminate\Http\Request;
use App\Http\Traits\Prestations;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\SendResponses;

class ActesMedicauxController extends Controller
{
    use Prestations, SendResponses;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $Actes = $this->list_actes_medicaux();
        $typeActes = $this->list_types_actes();
        return view('pages.prestations.actesmedicaux', [ 'Actes' => $Actes, 'typeActes' => $typeActes ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //Validation des champs
        $inputs = $request->all();

        $errors = [
            'r_libelle' => 'required|min:4',
            'r_prix' => 'required',
            'r_type_acte' => 'required',
        ];
        $erreurs = [
            'r_libelle.required' => 'Le libellé est obligatoire',
            'r_libelle.min' => 'Veuillez saisir un lbellé valide',
            'r_prix.required' => 'Le montant de l\'acte est obligatoire',
            'r_type_acte.required' => 'Le type d\'acte est obligatoire',
        ];
        $validation = Validator::make($inputs, $errors, $erreurs);

        if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {
                $code = DB::table('t_actes_medicaux')->count();
                $inputs['r_code'] = $code + 1;
                $insertion = ActeMedicaux::create($inputs);
                return $this->responseSuccess('Enregistrement effectué avec succès');

            } catch (\Throwable $e) {
                return $this->responseCatchError($e->getMessage());
            }

        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\ActeMedicaux  $acteMedicaux
    * @return \Illuminate\Http\Response
    */
    public function show(ActeMedicaux $acteMedicaux)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ActeMedicaux  $acteMedicaux
    * @return \Illuminate\Http\Response
    */
    public function edit(ActeMedicaux $acteMedicaux)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ActeMedicaux  $acteMedicaux
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, int $id)
    {
        //Validation des champs
        $errors = [
            'r_libelle' => 'required|min:4',
            'r_prix' => 'required',
            'r_type_acte' => 'required',
        ];
        $erreurs = [
            'r_libelle.required' => 'Le libellé est obligatoire',
            'r_libelle.min' => 'Veuillez saisir un lbellé valide',
            'r_prix.required' => 'Le montant de l\'acte est obligatoire',
            'r_type_acte.required' => 'Le type d\'acte est obligatoire',
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

         if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $check = ActeMedicaux::find($id);
                $check->update($request->all());
                return $this->responseSuccess('Modification effectué avec succès');

            } catch (\Throwable $e) {
                return $e->getMessage();
            }

        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\ActeMedicaux  $acteMedicaux
    * @return \Illuminate\Http\Response
    */
    public function destroy(ActeMedicaux $acteMedicaux)
    {
        //
    }
}
