<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Lignebudgetaire;
use App\Models\Projet;
use App\Models\Document;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Import\ImportExcel;
use App\Models\Partenaire;
use App\Models\Souscompte;
use App\Models\ProjetPartenaire;
use App\Models\Devi;
use Exception;
use Illuminate\Database\QueryException;



class ProjetController extends Controller
{
    public function getprojets()
	{
		$list = Projet::orderby("created_at", "desc")->get();
		return view("viewadmindste.projet.list", compact('list'));
	}

	public function setAddProjet(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {
		
				$request->validate([
					'lp_titre' => 'required',
					'lp_refinterne' => 'required',
					'lp_refcontrat' => 'required',
					'lp_objet' => 'required',
					'lp_datedebut' => 'required',
					'lp_datefin' => 'required',
					'lp_financement' => 'required',
					'lp_zone' => 'required',
					'lp_adresse' => 'required',
					'lp_banque' => 'required',
				], [
					'lp_titre.required' => 'Le champ titre projet est requis.',
					'lp_refinterne.required' => 'Le champ type contrat est requis.',
					'lp_refcontrat.required' => 'Le champ maitre d\'ouvrage est requis.',
					'lp_objet.required' => 'Le champ titulaire du projet est requis.',
					'lp_datedebut.required' => 'Le champ objet du projet est requis.',
					'lp_datefin.required' => 'Le champ montant du projet est requis.',
					'lp_financement.required' => 'Le champ delai d\'execution du projet est requis.',
					'lp_zone.required' => 'Le champ zone est requis.',
					'lp_banque.required' => 'Le champ banque est requis',
					'lp_adresse.required' => 'Le champ adresse est requis',
				]);
			
				$projet = Projet::where('titre', $request->lp_titre)->first();
			
				if (isset($projet->id)) {
					
					Projet::where('titre', $request->lp_titre)->update([
						"refinterne" => $request->lp_refinterne,
						"refcontrat" => $request->lp_refcontrat,
						"objet" => $request->lp_objet,
						"datedebut" => $request->lp_datedebut,
						"datefin" => $request->lp_datefin,
						"financement" => $request->lp_financement,
						"zone" => $request->lp_zone,
						"nature" => $request->lp_nature,
						"adresse" => $request->lp_adresse,
					]);
					
					// Sauvegarde de la trace
					TraceController::setTrace("Vous avez modifié les informations du projet ".$request->lp_titre, session("utilisateur")->idUser);
			
					return json_encode(["status"=> 0, "messages" => "Vous avez modifié les informations du projet ".$request->lp_titre]);
				} else {
					// Création du compte projet
					$idCompte = null;
					if(isset(Souscompte::where('numcompte', $lp_comptebancaire)->first()->id)){
						// Vérification de l'existance du compte
						$idCompte = Souscompte::where('numcompte', $lp_comptebancaire)->first()->id;
					}else{
						// Créer un compte pour le projet
						$addCompte = new Souscompte();
						$addCompte->compte = $request->lp_banque;
						$addCompte->typecompte = "Bancaire";
						$addCompte->soldecourant = 0;
						$addCompte->soldedisponible = 0;
						$addCompte->numcompte =  $request->lp_comptebancaire;
						$addCompte->save();
						$idCompte = $addCompte->id;
					}

					// Sauvegarde de la trace
					$addLb = new Projet();
					$addLb->titre = $request->lp_titre;
					$addLb->refinterne = $request->lp_refinterne;
					$addLb->refcontrat = $request->lp_refcontrat;
					$addLb->objet = $request->lp_objet;
					$addLb->datedebut = $request->lp_datedebut;
					$addLb->datefin = $request->lp_datefin;
					$addLb->financement = $request->lp_financement;
					$addLb->zone = $request->lp_zone;
					$addLb->nature = $request->lp_nature;
					$addLb->banque = $idCompte;
					$addLb->adresse = $request->lp_adresse;
					$addLb->save();

					

				


					TraceController::setTrace("Vous avez ajouté le projet ".$request->lp_titre, session("utilisateur")->idUser);
			
					return json_encode(["status"=> 0, "messages" => "Vous avez ajouté le projet ".$request->lp_titre]);
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
            $titreProjet = Projet::where('id', $request->id)->first()->titre_projet;
            $occurence = json_encode(Projet::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Projet::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la ligne du projet ".$titreProjet." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

	public function getAllpartenaireInprojet(Request $request){
		$list = ProjetPartenaire::join("partenaires", "projetpartenaires.partenaire", "=", "partenaires.id")->select("partenaires.id as id", "partenaires.nom as nom", "partenaires.adresse as adresse")->where("projetpartenaires.projet", $request->ap_projet)->orderby("projetpartenaires.created_at", "desc")->get();
        return json_encode(["data" => $list]);
	}

	public function setpartenaireprojet(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {

            	if ($request->ap_partenaire != "") {
            		// Enregistrer partenaire au projet
            		if(!isset(ProjetPartenaire::where("projet", $request->ap_projet)->where('partenaire', $request->ap_partenaire)->first()->id)){
            			$pp = new ProjetPartenaire();
            			$pp->partenaire = $request->ap_partenaire;
            			$pp->projet = $request->ap_projet;
            			$pp->save();

            			TraceController::setTrace("Vous avez un partenaire au projet ", session("utilisateur")->idUser);
			
						return json_encode(["status"=> 0, "messages" => "Vous avez un partenaire au projet "]);
            		}else{
            			return json_encode(["status"=> 1, "messages" => "Ce partenaire existe déjà sur le projet"]);
            		}

            	}else{
            		// Enregistrer le partenaire et associé
            		// Save partenaire
            		$p = new Partenaire();
            		$p->nom = $request->ap_nom;
            		$p->adresse = $request->ap_adresse;
            		$p->save();

            		// Asociation de projet et new partenaire
            		$pp = new ProjetPartenaire();
            		$pp->partenaire = $p->id;
            		$pp->projet = $request->ap_projet;
            		$pp->save();

            		// Sauvegarde de la trace
					TraceController::setTrace("Vous avez un partenaire au projet ", session("utilisateur")->idUser);
			
					return json_encode(["status"=> 0, "messages" => "Vous avez un partenaire au projet "]);
            	}

			} catch (QueryException $e) {
				return redirect()->back()->with('error', 'Erreur de base de données : ' . $e->getMessage());
			} catch (Exception $e) {
				return redirect()->back()->with('error', $e->getMessage());
			}

        //}

	}

	public function setAddActorProjet(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {

            	if ($request->apd_projet != "") {
            		// Update Projet in actor
            		$projet = Projet::where("id", $request->apd_projet)->first();
            		if(isset($projet->id)){

            			Projet::where("id", $request->apd_projet)->update([
            				"client" => $request->apd_maitre,
            				"manager" => $request->apd_chefprojet,
            				"appui" => $request->apd_appui,
            			]);

            			// Sauvegarde de la trace
						TraceController::setTrace("Vous avez définir les acteurs du projet", session("utilisateur")->idUser);
				
						return json_encode(["status"=> 0, "messages" => "Vous avez définir les acteurs du projet "]);

            		}else{
            			return json_encode(["status"=> 1, "messages" => "Veuillez actualisé la page et réeessayer."]);
            		}

            		
            	}

			} catch (QueryException $e) {
				return redirect()->back()->with('error', 'Erreur de base de données : ' . $e->getMessage());
			} catch (Exception $e) {
				return redirect()->back()->with('error', $e->getMessage());
			}

        //}

	}

	// Get Detail 

	public function getficheprojet(Request $request)
	{
		$info = Projet::where("titre", $request->titre)->first();
		return view("viewadmindste.projet.detailprojet", compact('info'));
		
	}

	// Devis
	public function getdevisprojet(Request $request)
	{
		$devis = Devi::where("projet", $request->id)->get();
		
		return json_encode(["status"=> 0, "devis" => $devis]);
	}

	public function adddevisprojet(Request $request){

		// if (in_array("add_role", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
           
            try {

				$designationExist = Devi::where('designation', $request->designation)->first();
    			if (isset($designationExist) && $request->has('update') || !isset($designationExist) && $request->has('update')) {
                    Devi::where('id', $request->id)->update([
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
					$addDevisProjet = new Devi();
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

	public function setdeletedevis(Request $request){
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
