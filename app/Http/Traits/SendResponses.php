<?php
    namespace App\Http\Traits;
/**
 * Gestion dynimique des reponses HTTP
 */
trait SendResponses
{
    public function responseSuccess(String $message, $dataRequest = null){
        $response = [
            '_status' => 1,
            '_message' => $message,
            '_result' => $dataRequest
        ];
        return response()->json($response)  ;
    }

    public function responseSuccessLogin(String $message, $token, $dataRequest = null){
        $response = [
            '_status' => 1,
            '_message' => $message,
            '_token' => $token,
            '_usercnx' => $dataRequest
        ];
        return response()->json($response)  ;
    }

    /**
     * Renvoie les erreurs de validaion des formualires
     * @param $message
     * @param mixed $ErreursValidation
     */
    public function responseValidation(string $message, $ErreursValidation = null){
        $response = [
            '_status' => 0,
            '_avertissement' => $message,
            '_detailsAvertissement' => json_decode($ErreursValidation),
        ];
        return response()->json($response)  ;
    }
    public function responseCatchError(string $detailErreur = null){
        $response = [
            '_status' => -1,
            '_error' => 'Une erreur interne est survenue, voir le détail',
            '_detailErreur' => $detailErreur,
        ];
        return response()->json($response)  ;
    }
}
