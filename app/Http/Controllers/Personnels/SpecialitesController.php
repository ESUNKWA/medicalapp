<?php

namespace App\Http\Controllers\Personnels;

use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\SendResponses;

class SpecialitesController extends Controller
{
    use SendResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialites = Specialite::orderBy('r_libelle','asc')->get();
        return view('pages.personnels.specialites', [ 'specialites' => $specialites ]);
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
        $erreurs = [

        ];
        $errors = [
            'r_libelle' => 'required|min:4'
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

         if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $insertion = Specialite::create($request->all());
                return $this->responseSuccess('Enregistrement effectué avec succès');

            } catch (\Throwable $e) {
                return $e->getMessage();
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //Validation des champs
       $errors = [
        'r_libelle' => 'required|min:4'
        ];
       $erreurs = [
            'r_libelle.required' => 'Le libellé est réquis'
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

        if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $insertion = Specialite::find($id);
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
     * @param  \App\Models\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $specialite)
    {
        //
    }
}
