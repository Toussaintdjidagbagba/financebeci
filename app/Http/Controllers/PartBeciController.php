<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PartBeciController extends Controller
{
    //
    public static function getpartbeci(){
        $parts = Part::get();
		return view("viewadmindste.part.partbeci", compact('parts'));
    }


    public function setAddModeValeur(Request $request){

		// if (in_array("add_role", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
           
            try {
             
    			if (isset(Part::where('id', $request->id)->first()->id)) {
                    Part::where('id', $request->id)->update([
                    	"tauxbeci" => $request->modevaleur,
                    	"projettaux" => $request->tauxp,
                        "resultat" => $request->result,
                        "periode" => $request->periode,
                        "dateD" => $request->datedebut,
                        "dateF" => $request->datefin,
                    ]);
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier la part de BECI ", session("utilisateur")->idUser);
                    
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier la part de BECI "]);

                }else{
                    // sauvegarde d'une ligne du budget général 
                    
                	$addRecap = new Part();
                	$addRecap->tauxbeci = $request->modevaleur;
                    $addRecap->projettaux = $request->tauxp;
                    $addRecap->resultat = $request->result;
                    $addRecap->periode = $request->periode;
                    $addRecap->dateD = $request->datedebut;
                    $addRecap->dateF = $request->datefin;
                	$addRecap->save();

    				TraceController::setTrace("Vous avez ajouter une part de BECI ", session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une part de BECI "]);
                }

            } catch (QueryException $e) {
                return json_encode(["status"=> 1, "messages" => "Erreur de base de données :". $e->getMessage()]);
            } catch (Exception $e) {
                return json_encode(["status"=> 1, "messages" => "Erreur de base de données :". $e->getMessage()]);
            }

        // }

	}

    public function setdelete(Request $request){
		// if (in_array("delete_role", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            $lb = Part::where('id', request('id'))->first();
            $occurence = json_encode(Part::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Part::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la part de BECI avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        // }
	}
}
