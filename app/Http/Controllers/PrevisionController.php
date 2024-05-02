<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Prevision;


class PrevisionController extends Controller
{
	public function getptg()
	{
		$list = Prevision::get();
		return view("viewadmindste.prevision.list", compact('list'));
	}

	public function setptg(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{ 

			if ( $request->ptgtypeptg == "ENCAISSEMENT" &&
				isset(Prevision::where('type', $request->ptgtypeptg)->where('annee', $request->ptgan)->where("lignebudgetaire", $request->pfglb)->first()->id)
			){
				Prevision::where('type', $request->ptgtypeptg)->update([
	                	"montant" => $request->ptgmontant,
	                	"soldedebut" => $request->ptgsoldedb,
	                	"mois" => $request->ptgmois,
	            ]);
				// Sauvegarde de la trace
	            TraceController::setTrace("Vous avez modifier une ligne dans le plan de trésorerie général ", session("utilisateur")->idUser);
	                
	            return json_encode(["status"=> 0, "messages" => "Vous avez modifier une ligne dans le plan de trésorerie général "]);
			}else{
				if ( $request->ptgtypeptg == "DECAISSEMENT" &&
					isset(Prevision::where('type', $request->ptgtypeptg)->where('annee', $request->ptgan)->where("souscompte", $request->ptgsc)->first()->id)
				) {

						Prevision::where('type', $request->ptgtypeptg)->update([
		                	"montant" => $request->ptgmontant,
		                	"soldedebut" => $request->ptgsoldedb,
		                	"mois" => $request->ptgmois,
		                ]);
					
	                
	                // Sauvegarde de la trace
	                TraceController::setTrace("Vous avez modifier une ligne dans le plan de trésorerie général ", session("utilisateur")->idUser);
	                
	                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une ligne dans le plan de trésorerie général "]);

	            }else{
	            	// Sauvegarde de la trace

	            	$addLb = new Prevision();
	            	$addLb->type = $request->ptgtypeptg;
	            	$addLb->annee = $request->ptgan;
	            	$addLb->lignebudgetaire = $request->pfglb;
	            	$addLb->souscompte = $request->ptgsc;
	            	$addLb->montant = $request->ptgmontant;
	            	$addLb->soldedebut = $request->ptgsoldedb;
	            	$addLb->mois = $request->ptgmois;
	            	$addLb->save();

					TraceController::setTrace("Vous avez ajouter une ligne dans le plan de trésorerie général ", session("utilisateur")->idUser);

	                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne dans le plan de trésorerie général"]);
	            }
            }

        //}

	}

	public function setdelete(Request $request){
		//if (in_array("delete", session("auto_action"))) {
        //    return view("vendor.error.649");
        //}else{
            $lib = Prevision::where('id', request('id'))->first()->description;
            $occurence = json_encode(Prevision::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Prevision::where('id', request('id'))->delete();
            $info = "Vous avez supprimé une ligne du plan de trésorerie général avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}


	

}