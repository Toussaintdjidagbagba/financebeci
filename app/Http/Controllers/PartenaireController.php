<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Partenaire;


class PartenaireController extends Controller
{
	public function getpartenaire()
	{
		$list = Partenaire::get();
		return view("viewadmindste.partenaire.list", compact('list'));
	}

	public function setpartenaire(Request $request){ 

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{

			
				if ( 
					isset(Partenaire::where('nom', $request->p_nom)->first()->id)
				) {

						Partenaire::where('nom', $request->p_nom)->update([
		                	"adresse" => $request->p_adresse,
		                ]);
					
	                
	                // Sauvegarde de la trace
	                TraceController::setTrace("Vous avez modifier une ligne de partenaire ", session("utilisateur")->idUser);
	                
	                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une ligne de partenaire "]);

	            }else{
	            	// Sauvegarde de la trace

	            	$addLb = new Partenaire();
	            	$addLb->nom = $request->p_nom;
	            	$addLb->adresse = $request->p_adresse;
	            	$addLb->save();

					TraceController::setTrace("Vous avez ajouter une ligne de partenaire", session("utilisateur")->idUser);

	                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne de partenaire"]);
	            }

        //}

	}

	public function setdelete(Request $request){
		//if (in_array("delete", session("auto_action"))) {
        //    return view("vendor.error.649");
        //}else{
            $lib = Partenaire::where('id', request('id'))->first()->nom;
            $occurence = json_encode(Partenaire::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Partenaire::where('id', request('id'))->delete();
            $info = "Vous avez supprimé une ligne de partenaire avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}


	

}