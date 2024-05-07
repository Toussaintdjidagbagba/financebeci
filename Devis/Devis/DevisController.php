<?php

namespace App\Http\Controllers;

use App\Models\Devi as devis;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    //
    public function getdevisprojet(Request $request)
	{
		$devis = devis::where("projet", $request->id)->get();
		return json_encode(["status"=> 0, "devis" => $devis]);
	}

	public function adddevisprojet(Request $request){

		// if (in_array("add_role", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
           
            try {

				$designationExist = devis::where('designation', $request->designation)->first();
    			if (isset($designationExist) && $request->has('update') || !isset($designationExist) && $request->has('update')) {
                    devis::where('id', $request->id)->update([
                    	"projet" => $request->projetId,
                    	"designation" => $request->designation,
                        "unite" => $request->unite,
                        "quantite" => $request->quantite,
                        "pu" => $request->p_unitaire,
                    ]);
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier le Devis ".$request->designation, session("utilisateur")->idUser);
                    $projetID = $request->projetId;
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier le Devis ".$request->designation,"projetID" => $projetID]);

                }elseif($designationExist){
					return json_encode(["status"=> 1, "messages" => "Le devis ".$request->designation." existe déjà cliquer sur modifier pour modifier"]);
                }else{
					$addDevisProjet = new devis();
					$addDevisProjet->projet = $request->projetId;
					$addDevisProjet->designation = $request->designation;
					$addDevisProjet->unite = $request->unite;
					$addDevisProjet->quantite = $request->quantite;
					$addDevisProjet->pu = $request->p_unitaire;

					$addDevisProjet->save();

					TraceController::setTrace("Vous avez ajouter un Devis ".$request->designation, session("utilisateur")->idUser);
					$projetID = $request->projetId;
					return json_encode(["status"=> 0, "messages" => "Vous avez ajouter un Devis ".$request->designation,"projetID" => $projetID]);
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
            try {
				$devis = devis::where('id', request('id'))->first();
				if($devis) {
					$designation = $devis->designation;
					$info = "Vous avez supprimé le Devis ".$designation." avec succès.";
					$devis->delete();
					TraceController::setTrace($info, session("utilisateur")->idUser);
					return json_encode(["status" => 0, "messages" => $info, "projetID" => $request->projet]);
				} else {
					return json_encode(["status" => 1, "messages" => "Le Devis n'existe pas"]);
				}	
			} catch (QueryException $e) {
				return json_encode(["status"=> 1, "messages" => "Erreur de base de données :". $e->getMessage()]);
			} catch (Exception $e) {
				return json_encode(["status"=> 1, "messages" => "Erreur de base de données :". $e->getMessage()]);
			}		
        // }
	}
}
