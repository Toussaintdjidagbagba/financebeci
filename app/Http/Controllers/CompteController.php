<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Budgetgeneral;
use App\Models\Souscompte;

class CompteController extends Controller
{

	public function getcomptes(Request $request){
		$list = Souscompte::get();
		return view("viewadmindste.compte.situationcompte", compact('list'));
	}

	public function getdetailcompte(Request $request){
		$sc = $request->id;
		$list = Souscompte::get();
		return view("viewadmindste.compte.detailcompte", compact('list'));	
	}

	public function setcomptes(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {
            	/*
                $request->validate([
                    'bgaebdt' => 'required',
                    'bgm' => 'required',
                    'bglb' => 'required',
                    'lgmontant' => 'required',                    
                    '_token' => 'required'
                ], [
                    'bgaebdt.required' => 'Le champ Année d\'exercice est requis.',
                    'bgm.required' => 'Le champ Mode est requis.',
                    'bglb.required' => 'Le champ Nature est requis.',
                    'lgmontant.required' => 'Le champ Montant est requis.',
                    '_token.required' => 'Vous devez vous reconnecter.'
                ]); */

    			if (isset(
                        Souscompte::
                        where('compte', $request->sclib)
                        ->first()->id)) {
                    Souscompte::where('compte', $request->sclib)->update([
                    	"soldecourant" => $request->scsoldecourant,
                    	"numcompte" => $request->scnumcompte,
                        "soldedisponible" => $request->scsoldedisponible,
                        "typecompte" => $request->sctypec,
                    ]);
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier la ligne du compte ".$request->sclib, session("utilisateur")->idUser);
                    
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier la ligne du compte ".$request->sclib]);

                }else{
                	// Sauvegarde de la trace

                	$addLb = new Souscompte();
                	$addLb->compte = $request->sclib;
                	$addLb->soldecourant = $request->scsoldecourant;
                    $addLb->numcompte = $request->scnumcompte;
                    $addLb->soldedisponible = $request->scsoldedisponible;
                    $addLb->typecompte = $request->sctypec;
                	$addLb->save();

    				TraceController::setTrace("Vous avez ajouter le compte ".$request->sclib, session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter le compte ".$request->sclib]);
                }

            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Erreur de base de données : ' . $e->getMessage());
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

        //}

	}

	public function setdelete(Request $request){
		//if (in_array("delete", session("auto_action"))) {
        //    return view("vendor.error.649");
        //}else{
            $lb = Souscompte::where('id', request('id'))->first()->compte;
            $occurence = json_encode(Souscompte::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Souscompte::where('id', request('id'))->delete();
            $info = "Vous avez supprimé le compte ".$lb." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

	// Sous compte fonctionnement
	public function getscfonctionnement(Request $request)
	{
		$list = Budgetgeneral::where("sc", 1)->orderby("updated_at", "desc")->get();
		return view("viewadmindste.compte.fonctionnement", compact('list'));
	}

	// Sous compte social
	public function getscsocial(Request $request)
	{
		$list = Budgetgeneral::where("sc", 2)->orderby("updated_at", "desc")->get();
		return view("viewadmindste.compte.social", compact('list'));
	}

	// Sous compte invertissement
	public function getscinvertissement(Request $request)
	{
		$list = Budgetgeneral::where("sc", 3)->orderby("updated_at", "desc")->get();
		return view("viewadmindste.compte.invertissement", compact('list'));
	}

	// Sous compte dividende
	public function getscdividente(Request $request)
	{
		$list = Budgetgeneral::where("sc", 4)->orderby("updated_at", "desc")->get();
		return view("viewadmindste.compte.dividende", compact('list'));
	}

	// Sous compte projet
	public function getscprojet(Request $request)
	{
		$list = Budgetgeneral::where("sc", 5)->orderby("updated_at", "desc")->get();
		return view("viewadmindste.compte.projet", compact('list'));
	}

}