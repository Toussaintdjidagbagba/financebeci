<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Lignebudgetaire;


class LigneBudgetaireController extends Controller
{

	public function getLigneBudgetaire()
	{
		$list = Lignebudgetaire::get();
		return view("viewadmindste.lignebdb.list", compact('list'));
	}

	public function setLigneBudgetaire(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
			if (isset(Lignebudgetaire::where('code', $request->lbcode)->first()->id)) {
                Lignebudgetaire::where('code', $request->lbcode)->update([
                	"description" => $request->lbdlesc,
                	"quantite" => $request->lbquantite,
                	"montantalloue" => $request->lbmontantal,
                	"commentaire" => $request->lbcommentaire,
                	"souscompte" => $request->lbsc,
                ]);
                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier la ligne budgétaire ".$request->lbcode, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier la ligne budgétaire ".$request->lbcode]);

            }else{
            	// Sauvegarde de la trace

            	$addLb = new Lignebudgetaire();
            	$addLb->code = $request->lbcode;
            	$addLb->description = $request->lbdlesc;
            	$addLb->quantite = $request->lbquantite;
            	$addLb->montantalloue = $request->lbmontantal;
            	$addLb->commentaire = $request->lbcommentaire;
            	$addLb->souscompte = $request->lbsc;
            	$addLb->save();

				TraceController::setTrace("Vous avez ajouter une ligne budgétaire ".$request->lbcode, session("utilisateur")->idUser);

                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne budgétaire "]);
            }

        //}

	}

	public function setdelete(Request $request){
		//if (in_array("delete", session("auto_action"))) {
        //    return view("vendor.error.649");
        //}else{
            $lib = Lignebudgetaire::where('code', request('id'))->first()->description;
            $occurence = json_encode(Lignebudgetaire::where('code', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Lignebudgetaire::where('code', request('id'))->delete();
            $info = "Vous avez supprimé la ligne budgétaire ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

    public function importLigneBudgetaire(Request $request){
        
    }

}