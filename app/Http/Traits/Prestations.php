<?php

namespace App\Http\Traits;
use App\Models\TypeActe;
use App\Models\ActeMedicaux;
/**
 * Gestion dynimique des reponses HTTP
 */
trait Prestations
{
    public function list_types_actes(){

        try {
            $typeActes = TypeActe::orderBy('r_libelle','asc')->get();
            return $typeActes;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }


    }

    public function list_actes_medicaux(){

        try {
            $Actes = ActeMedicaux::orderBy('r_libelle','asc')->get();
            return $Actes;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }


    }
}
