<?php

namespace App\Http\Controllers\Personnels;

use App\Models\Categorie;
use App\Models\Personnel;
use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\SendResponses;

class PersonnelsController extends Controller
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
        $categories = Categorie::orderBy('r_libelle','asc')->get();
        $personnels = Personnel::select('t_personnels.*','t_categories.r_libelle as r_libelle_categorie','t_specialites.r_libelle as r_libelle_specialite')
                                ->orderBy('r_nom','asc')
                                ->join('t_categories', 't_categories.id','t_personnels.r_categorie')
                                ->join('t_specialites', 't_specialites.id','t_personnels.r_specialite')->get();

        return view('pages.personnels.personnels_medicales', [
            'categories' => $categories,
            'specialites' => $specialites,
            'personnels' => $personnels
        ]);
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
        $inputs = $request->all();
        //Validation des champs
       $errors = [
        'r_nom' => 'required|min:4'
        ];
       $erreurs = [
            'r_nom.required' => 'Le nom est réquis'
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

        if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {


                $inputs['r_code'] = date('Y').Personnel::count()+1;

                $insertion = Personnel::create($inputs);
                return $this->responseSuccess('Enregistrement effectué avec succès');

            } catch (\Throwable $e) {
                return $e->getMessage();
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $inputs = $request->all();
        //Validation des champs
       $errors = [
        'r_nom' => 'required|min:4'
        ];
       $erreurs = [
            'r_nom.required' => 'Le nom est réquis'
        ];

        $validation = Validator::make($request->all(), $errors, $erreurs);

        if ( $validation->fails() ) {

            return $validation->errors();

        }else{

            try {

                $insertion = Personnel::find($id);
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
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        //
    }
}
