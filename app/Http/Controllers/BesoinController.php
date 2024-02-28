<?php

namespace App\Http\Controllers;
use App\Models\Besoin;
use App\Models\Parcoursbesoin;
use App\Models\Lignebesoin;
use App\Models\Trace;
use DB;

use Illuminate\Http\Request;

class BesoinController extends Controller
{
    public function index()
    {
        $list = Besoin::where('user', session("utilisateur")->idUser)->get();
        $listValidate = DB::table('besoins')
                            ->join('parcoursbesoins', 'besoins.id', '=', 'parcoursbesoins.besoin')
                            ->select('besoins.*', 'parcoursbesoins.validateur', 'parcoursbesoins.statut', 'parcoursbesoins.commentaire')
                            ->where('parcoursbesoins.validateur',session("utilisateur")->idUser)
                            ->where('parcoursbesoins.statut','')
                            ->get();
        return view('viewadmindste.besoin.index', compact('list','listValidate'));
    }

    public function add(Request $request)
    {
        // if (!in_array("add_besoin", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{

            $donnees = json_decode($request->tableauDonnees, true);
            $this->validate($request, [
                'date' => 'required|date',
                'demandeur' => 'required|integer',
                'urgence' => 'required|string',
                'chef' => 'required|integer',
                'tableauDonnees' => 'required|string', // S'assurer que les données sont transmises en tant que chaîne JSON.
            ]);
            // dd($donnees);
            // Décodage des données JSON du tableau
            $donneesTableau = json_decode($request->tableauDonnees, true);

            // Création de l'expression de besoin
            $expressionBesoin = new Besoin();
            $expressionBesoin->dateemission = $request->date;
            $expressionBesoin->user = $request->demandeur;
            $expressionBesoin->urgence = $request->urgence;
            $expressionBesoin->user_action = session("utilisateur")->idUser;
            // $expressionBesoin->chef_id = $request->chef;
            // $expressionBesoin->direction_id = $request->direct ?? null; // Optionnel, dépend de votre logique métier
            // $expressionBesoin->user_id = Auth::id(); // Supposant que l'utilisateur doit être connecté pour soumettre ce formulaire.
            $expressionBesoin->save();

            $parcourBesoin = new Parcoursbesoin();
            $parcourBesoin->besoin = $expressionBesoin->id;
            $parcourBesoin->validateur = $request->chef;
            $parcourBesoin->statut = '';
            $parcourBesoin->commentaire = '';
            $parcourBesoin->save();

            // Traitement et enregistrement des détails des éléments dans une table de détails liée.
            foreach ($donneesTableau as $donnee) {
                $Ligneb = new Lignebesoin;
                $Ligneb->libelle = $donnee['libelle'];
                $Ligneb->quantite = $donnee['quantite'];
                $Ligneb->montant = $donnee['montant'];
                $Ligneb->motif = $donnee['motif'];
                $Ligneb->besoin = $expressionBesoin->id;
                $Ligneb->save();
                // ]);
            }

            // return redirect()->route('votre_route_de_redirection')->with('success', 'Expression de besoin enregistrée avec succès!');

                flash("Le Besoin est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée le besoin ".$request->urgence."  ".$request->tableauDonnees." .",session("utilisateur")->idUser);
                return Back();
            // }
        // }
    }

    public function delete(Request $request)
    {
        // if (!in_array("delete_role", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{
            //Role::where('idRole', request('id'))->update(['statut' =>  "sup"]);
            $occurence = json_encode(Besoin::where('id', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Besoin Supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Besoin::where('id', request('id'))->delete();
            Lignebesoin::where('besoin', request('id'))->delete();
            Parcoursbesoin::where('besoin', request('id'))->delete();
            $info = "Le besoin est supprimé avec succès.";
            flash($info);

            return Back();
        // }
    }

    public function show(Request $request)
    {
        // if (!in_array("update_role", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{
            $info = Besoin::where('id', request('id'))->first();
            $parcour = Parcoursbesoin::where('besoin', request('id'))
                                        ->where('statut','')
                                        ->first();
            $donneesJson = Lignebesoin::where('besoin', request('id'))->get();
            $donneesvJson = json_encode($donneesJson);
            // dd($info);
            return view('viewadmindste.besoin.modifbesoin', compact('info','parcour','donneesvJson'));
        // }
    }

    public function showValidate(Request $request)
    {
        // if (!in_array("update_role", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{
            $info = Besoin::where('id', request('id'))->first();
            $parcour = Parcoursbesoin::where('besoin', request('id'))
                                        ->where('statut','')
                                        ->first();
            $donneesJson = Lignebesoin::where('besoin', request('id'))->get();
            $donneesvJson = json_encode($donneesJson);
            // dd($info);
            return view('viewadmindste.besoin.viewbesoin', compact('info','parcour','donneesvJson'));
        // }
    }

    public function showViewValidate(Request $request)
    {
        // if (!in_array("update_role", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{
            $info = Besoin::where('id', request('id'))->first();
            $parcour = Parcoursbesoin::where('besoin', request('id'))
                                        ->where('statut','')
                                        ->first();
            $donneesJson = Lignebesoin::where('besoin', request('id'))->get();
            $donneesvJson = json_encode($donneesJson);
            // dd($info);
            return view('viewadmindste.besoin.validatebesoin', compact('info','parcour','donneesvJson'));
        // }
    }

    public function update(Request $request)
    {
        // if (!in_array("add_besoin", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{

            $donnees = json_decode($request->tableauDonnees, true);
            $this->validate($request, [
                'date' => 'required|date',
                'demandeur' => 'required|integer',
                'urgence' => 'required|string',
                'chef' => 'required|integer',
                'tableauDonnees' => 'required|string', // S'assurer que les données sont transmises en tant que chaîne JSON.
            ]);
            // dd($donnees);
            // Décodage des données JSON du tableau
            $donneesTableau = json_decode($request->tableauDonnees, true);

            // Création de l'expression de besoin
            $expressionBesoin = Besoin::where('id',$request->idbesoin)->first();
            $expressionBesoin->dateemission = $request->date;
            $expressionBesoin->user = $request->demandeur;
            $expressionBesoin->urgence = $request->urgence;
            $expressionBesoin->user_action = session("utilisateur")->idUser;
            // $expressionBesoin->chef_id = $request->chef;
            // $expressionBesoin->direction_id = $request->direct ?? null; // Optionnel, dépend de votre logique métier
            // $expressionBesoin->user_id = Auth::id(); // Supposant que l'utilisateur doit être connecté pour soumettre ce formulaire.
            $expressionBesoin->save();

            $parcourBesoin = Parcoursbesoin::where('id',$request->idparcour)->first();
            $parcourBesoin->besoin = $expressionBesoin->id;
            $parcourBesoin->validateur = $request->chef;
            $parcourBesoin->statut = '';
            $parcourBesoin->commentaire = '';
            $parcourBesoin->save();

            Lignebesoin::where('besoin', $request->idbesoin)->delete();
            // Traitement et enregistrement des détails des éléments dans une table de détails liée.
            foreach ($donneesTableau as $donnee) {
                $Ligneb = new Lignebesoin;
                $Ligneb->libelle = $donnee['libelle'];
                $Ligneb->quantite = $donnee['quantite'];
                $Ligneb->montant = $donnee['montant'];
                $Ligneb->motif = $donnee['motif'];
                $Ligneb->besoin = $expressionBesoin->id;
                $Ligneb->save();
                // ]);
            }

            // return redirect()->route('votre_route_de_redirection')->with('success', 'Expression de besoin enregistrée avec succès!');

                flash("Le Besoin est mise à jour avec succès. ")->success();
                TraceController::setTrace("Vous avez mis à jours le besoin ".$request->urgence."  ".$request->tableauDonnees." .",session("utilisateur")->idUser);
                return redirect()->route('home');
            // }
        // }
    }

    public function validateBesoin(Request $request)
    {
        // if (!in_array("add_besoin", session("auto_action"))) {
        //     return view("vendor.error.649");
        // }else{

            // $donnees = json_decode($request->tableauDonnees, true);
            $this->validate($request, [
                'statut' => 'required|string',
                'comment' => 'required|string',
                'chef' => 'required|integer',
            ]);
            $parcourBesoin = Parcoursbesoin::where('id',$request->idparcour)->first();
            $parcourBesoin->besoin = $request->idbesoin;
            $parcourBesoin->validateur = $request->chef;
            $parcourBesoin->statut = $request->statut;
            $parcourBesoin->commentaire = $request->comment;
            $parcourBesoin->save();
            $parcourBesoin1 = new Parcoursbesoin();
            $parcourBesoin1->besoin = $request->idbesoin;
            $parcourBesoin1->validateur = $request->chefSuivant;
            $parcourBesoin1->statut = '';
            $parcourBesoin1->commentaire = '';
            $parcourBesoin1->save();

            // return redirect()->route('votre_route_de_redirection')->with('success', 'Expression de besoin enregistrée avec succès!');

                flash("Le Besoin est valider avec succès. ")->success();
                TraceController::setTrace("Vous avez validé le besoin ".$request->urgence."  ".$request->tableauDonnees." .",session("utilisateur")->idUser);
                return redirect()->route('home');
            // }
        // }
    }
}
