<?php

namespace App\Http\Controllers\Prestations;

use App\Models\TypeActe;
use Illuminate\Http\Request;
use App\Http\Traits\Prestations;
use App\Http\Traits\SendResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TypeActeController extends Controller
{
    use SendResponses, Prestations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeActes = $this->list_types_actes();
        return view('pages.prestations.types_actes_medicaux', [ 'typeActes' => $typeActes ]);
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

        $errors = [
            'r_libelle' => 'required|min:4'
        ];
        $erreurs = [
            'r_libelle.required' => 'Le libellé est obligatoire'
        ];
        $validation = Validator::make($request->all(), $errors, $erreurs);

         if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $insertion = TypeActe::create($request->all());
                return $this->responseSuccess('Enregistrement effectué avec succès');

            } catch (\Throwable $e) {
                return $e->getMessage();
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeActe  $typeActe
     * @return \Illuminate\Http\Response
     */
    public function show(TypeActe $typeActe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeActe  $typeActe
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeActe $typeActe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeActe  $typeActe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //Validation des champs
        $errors = [
            'r_libelle' => 'required|min:4'
        ];
        $erreurs = [
            'r_libelle.required' => 'Le libellé est obligatoire'
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

         if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $insertion = TypeActe::find($id);
                $insertion->update($request->all());
                return $this->responseSuccess('Modification effectué avec succès');

            } catch (\Throwable $e) {
                return $e->getMessage();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeActe  $typeActe
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeActe $typeActe)
    {
        //
    }
}
