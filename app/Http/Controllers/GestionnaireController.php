<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Personnel;
use App\Models\Antecedent;
use App\Models\Posteanterieur;
use App\Models\Posteactuelle;
use App\Models\Vaccination;
use App\Models\Absenteisme;
use App\Models\Accident;
use App\Models\Maladie;
use App\Models\Convocation;
use App\Models\Consultation;
use App\Models\Visite;


class GestionnaireController extends Controller
{
    //

    public function getvalidation(){
        $list = array();
        return view('viewadmindste.validation', compact('list'));
    }

    public function getfacturesfonds()
    {
        $list = array();
        return view('viewadmindste.fonds', compact('list'));
    }

    public function getfacturesreception()
    {
        $list = array();
        return view('viewadmindste.receptionfacture', compact('list'));
    }

     public function getfacturesemission()
    {
        $list = array();
        return view('viewadmindste.emissionfacture', compact('list'));
    }


    public function getbudgetcreation()
    {
        $list = array();
        return view('viewadmindste.budget', compact('list'));
    }


     public function getbudgetsuivi()
    {
        $list = array();
        return view('viewadmindste.budget', compact('list'));
    }

     public function getbudgetbudgetsuivietatgeneral()
    {
        $list = array();
        return view('viewadmindste.etatgeneral', compact('list'));
    }

     public function getbudgetsuivigrandlivre()
    {
        $list = array();
        return view('viewadmindste.budget', compact('list'));
    }

     public function getbudgetsuivietatcomparatif()
    {
        $list = array();
        return view('viewadmindste.budget', compact('list'));
    }

     public function getbudgetsuiviplantresorerie()
    {
        $list = array();
        return view('viewadmindste.budget', compact('list'));
    }

     public function getficheprojet()
    {
        $list = array();
        return view('viewadmindste.projet', compact('list'));
    }

    public function getplanificationprojet()
    {
        $list = array();
        return view('viewadmindste.detailprojet', compact('list'));
    }

    public function getsc()
    {
        return view('viewadmindste.sc');
    }

    public function getdetailsc(){
        return view('viewadmindste.dsc');
    }

    public function getcreance()
    {
        $list = array();
        return view('viewadmindste.edition', compact('list'));
    }

     public function getexecutionprojet()
    {
        $list = array();
        return view('viewadmindste.executiondepense', compact('list'));
    }

     public function getcaisse()
    {
        $list = array();
        return view('viewadmindste.tresorerie', compact('list'));
    }

     public function getvirementbancaire()
    {
        $list = array();
        return view('viewadmindste.virement', compact('list'));
    }

     public function geteditioncheque()
    {
        $list = array();
        return view('viewadmindste.edition', compact('list'));
    }

    

     public function getdette()
    {
        $list = array();
        return view('viewadmindste.edition', compact('list'));
    }



    public function dash()
    {
    	setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
        date_default_timezone_set('Africa/Porto-Novo');

        return view('viewadmindste.dash');
    }

    public function getaide(){
        return view('viewadmindste.aide');
    }

    // Personnel
    public function getlistpersonnel(){
        return json_encode(["data" => DB::table('personnels')->select("personnels.id as id", "nom", "prenom", "libelle", "identificationpersonnel")->join("services", "services.id", "=", "personnels.Entreprise")->get()]);
    }

    public function setpersonnel(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->entre) || $request->entre == 0) {
                return json_encode(["status"=> 1, "messages" => "Le champ Entreprise ne peut pas être vide."]);
            }

            if (!isset($request->it) || $request->it == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Identification du Travailleur ne peut pas être vide."]);
            }

            if (!isset($request->sexe) || $request->sexe == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Sexe ne peut pas être vide."]);
            }

            if (!isset($request->nom) || $request->nom == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nom ne peut pas être vide."]);
            }

            if (!isset($request->prenom) || $request->prenom == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Prénom ne peut pas être vide."]);
            }

            if (!isset($request->nationalite) || $request->nationalite == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nationalité ne peut pas être vide."]);
            }

            if (!isset($request->nais) || $request->nais == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date de naissance ne peut pas être vide."]);
            }

            if (!isset($request->lieu) || $request->lieu == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Lieu ne peut pas être vide."]);
            }

            if (!isset($request->adresse) || $request->adresse == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Adresse ne peut pas être vide."]);
            }
            
            if (isset(Personnel::where('identificationpersonnel', $request->it)->first()->id)) {
                return json_encode(["status"=> 1, "messages" => "Un personnel existe déjà avec le matricule suivant : ".$request->it]);
            }else{
                $add = new Personnel();
                $add->Entreprise = $request->entre;
                $add->identificationpersonnel = $request->it;
                $add->sexe = $request->sexe;
                $add->nom = $request->nom;
                $add->prenom = $request->prenom;
                $add->nationalite = $request->nationalite ;
                $add->naissance = $request->nais;
                $add->lieu = $request->lieu;
                $add->adresse = $request->adresse;
                $add->taille = $request->taille;
                $add->electrophorese = $request->electro;
                $add->nombreenfant = $request->nombreenfant;
                $add->groupesanguin = $request->groupesanguin;
                $add->situationmatrimoniale = $request->sm;
                $add->cnss = $request->cnss;
                $add->eca_nom = $request->ecan;
                $add->eca_lieu = $request->ecal ;
                $add->eca_tel = $request->ecat ;
                $add->dateembauche = $request->dateemb ;
                $add->datedepart = $request->datedepart ;
                $add->motifdepart = $request->motifdepart ;
                $add->qualification = $request->qualif ;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter le personnel ".$request->nom, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter le personnel ".$request->nom]);
            }   
        }
    }

    public function deletepersonnel(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Personnel::where('id', request('id'))->first()->nom.' '.Personnel::where('id', request('id'))->first()->prenom;
            $occurence = json_encode(Personnel::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Personnel::where('id', request('id'))->delete();
            $info = "Vous avez supprimé ".$lib." avec succès.";
            return $info;
        }
    }

    public function getactionpersonnel(Request $request){
        $info = Personnel::where('id', request('id'))->first();
        return view('viewadmindste.actionsother', compact("info"));
    }

    public function getupdatepersonnel(Request $request){
        $info = Personnel::where('id', request('id'))->first();
        return json_encode(["data" => $info]);
    }

    public function setupdatepersonnel(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->it) || $request->it == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Identification du Travailleur ne peut pas être vide."]);
            }

            if (!isset($request->sexe) || $request->sexe == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Sexe ne peut pas être vide."]);
            }

            if (!isset($request->nom) || $request->nom == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nom ne peut pas être vide."]);
            }

            if (!isset($request->prenom) || $request->prenom == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Prénom ne peut pas être vide."]);
            }

            if (!isset($request->nationalite) || $request->nationalite == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nationalité ne peut pas être vide."]);
            }

            if (!isset($request->nais) || $request->nais == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date de naissance ne peut pas être vide."]);
            }

            if (!isset($request->lieu) || $request->lieu == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Lieu ne peut pas être vide."]);
            }

            if (!isset($request->adresse) || $request->adresse == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Adresse ne peut pas être vide."]);
            }
            
            if (!isset(Personnel::where('identificationpersonnel', $request->it)->first()->id)) {
                return json_encode(["status"=> 1, "messages" => "Ce personnel n'existe pas pour qu'une modification soit effectué."]);
            }else{
                Personnel::where("id", $request->id)->update([
                    "sexe" => $request->sexe,
                    "nom" => $request->nom,
                    "prenom" => $request->prenom,
                    "nationalite" => $request->nationalite,
                    "naissance" => $request->nais,
                    "lieu" => $request->lieu,
                    "adresse" => $request->adresse,
                    "taille" => $request->taille,
                    "electrophorese" => $request->electro,
                    "nombreenfant" => $request->nombreenfant,
                    "groupesanguin" => $request->groupesanguin,
                    "situationmatrimoniale" => $request->sm,
                    "cnss" => $request->cnss,
                    "eca_nom" => $request->ecan,
                    "eca_lieu" => $request->ecal,
                    "eca_tel" => $request->ecat,
                    "dateembauche" => $request->dateemb,
                    "datedepart" => $request->datedepart,
                    "motifdepart" => $request->motifdepart,
                    "qualification" => $request->qualif,
                    "statut" => 1,
                    "action" => session("utilisateur")->idUser
                ]);

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter le personnel ".$request->nom, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier le personnel ".$request->nom]);
            }   
        }
    }

    // Antécédent

    public function setaddantecedent(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->typeantecedent) || $request->typeantecedent == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Type ne peut pas être vide."]);
            }

            if (!isset($request->chirurgicaux) || $request->chirurgicaux == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Chirurgicaux ne peut pas être vide."]);
            }

            if (isset(Antecedent::where('type', $request->typeantecedent)->where('personnel', $request->personnel)->first()->id)) {
                Antecedent::where('personnel', $request->personnel)->update([
                    "chirurgicaux" => $request->chirurgicaux,
                    "medicaux" => $request->medicaux,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier les antécedents du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier les antécedents du ".$name]);
            }else{
                $add = new Antecedent();
                $add->personnel = $request->personnel;
                $add->chirurgicaux = $request->chirurgicaux;
                $add->type = $request->typeantecedent;
                $add->medicaux = $request->medicaux;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter les antécedents du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter les antécedents du ".$name]);
            }   
        }
    }

    public function getallantecedent(Request $request){
        $list = Antecedent::get();
        return json_encode(["data" => $list]);
    }

    public function deleteantecedent(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Antecedent::where('id', request('id'))->first()->type;
            $occurence = json_encode(Antecedent::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Antecedent::where('id', request('id'))->delete();
            $info = "Vous avez supprimé ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Poste antérieure
    public function setaddposteanterieur(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->entreprise) || $request->entreprise == 0) {
                return json_encode(["status"=> 1, "messages" => "Le champ Entreprise ne peut pas être vide."]);
            }

            if (!isset($request->periodefin) || $request->periodefin == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Période fin ne peut pas être vide."]);
            }

            if (!isset($request->periodedebut) || $request->periodedebut == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Période début ne peut pas être vide."]);
            }

            if (!isset($request->factnuissance) || $request->factnuissance == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Facteurs de nuisance ne peut pas être vide."]);
            }

            if (!isset($request->denomination) || $request->denomination == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Dénomination ne peut pas être vide."]);
            }

            if (isset(Posteanterieur::where('denomination', $request->denomination)->where('personnel', $request->personnel)->first()->id)) {
                Posteanterieur::where('personnel', $request->personnel)->update([
                    "facteurnuissance" => $request->factnuissance,
                    "periodedebut" => $request->periodedebut,
                    "periodefin" => $request->periodefin,
                    "periodedebut" => $request->periodedebut,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier le poste de travail occupés antérieurement du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier le poste de travail occupés antérieurement du ".$name]);
            }else{
                $add = new Posteanterieur();
                $add->personnel = $request->personnel;
                $add->denomination = $request->denomination;
                $add->facteurnuissance = $request->factnuissance;
                $add->periodedebut = $request->periodedebut;
                $add->periodefin = $request->periodefin;
                $add->entreprise = $request->entreprise;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter un poste de travail occupés antérieurement par ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter un poste de travail occupés antérieurement par ".$name]);
            }   
        }
    }

    public function getallposteanterieur(Request $request){
        $list = Posteanterieur::select("posteanterieurs.id as id", "denomination", "facteurnuissance", "libelle", "entreprise", "periodedebut", "periodefin")->join("services", "services.id", "=", "posteanterieurs.entreprise")->get();
        return json_encode(["data" => $list]);
    }

    public function deleteposteanterieur(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Posteanterieur::where('id', request('id'))->first()->denomination;
            $occurence = json_encode(Posteanterieur::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Posteanterieur::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la dénomination ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Poste actuelle
    public function setaddposteactuelle(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->poste)) {
                return json_encode(["status"=> 1, "messages" => "Le champ Poste ne peut pas être vide."]);
            }

            if (!isset($request->periodefin) || $request->periodefin == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Période fin ne peut pas être vide."]);
            }

            if (!isset($request->periodedebut) || $request->periodedebut == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Période début ne peut pas être vide."]);
            }

            if (!isset($request->facteurnuissance) || $request->facteurnuissance == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Facteurs de nuisance ne peut pas être vide."]);
            }

            if (!isset($request->taches) || $request->taches == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Tâches ne peut pas être vide."]);
            }

            if (!isset($request->rythme) || $request->rythme == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Rythme ne peut pas être vide."]);
            }

            if (!isset($request->metrodate) || $request->metrodate == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date ne peut pas être vide."]);
            }

            if (!isset($request->metrotype) || $request->metrotype == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Type ne peut pas être vide."]);
            }

            if (!isset($request->metror) || $request->metror == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ R ne peut pas être vide."]);
            }

            if (isset(Posteactuelle::where('poste', $request->poste)->where('periodedebut', $request->periodedebut)->where('periodefin', $request->periodefin)->where('personnel', $request->personnel)->first()->id)) {
                Posteactuelle::where('poste', $request->poste)->where('periodedebut', $request->periodedebut)->where('periodefin', $request->periodefin)->where('personnel', $request->personnel)->update([
                    "facteurnuissance" => $request->facteurnuissance,
                    "periodedebut" => $request->periodedebut,
                    "periodefin" => $request->periodefin,
                    "metror" => $request->metror,
                    "metrotype" => $request->metrotype,
                    "metrodate" => $request->metrodate,
                    "rythme" => $request->rythme,
                    "taches" => $request->taches,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier le poste de travail occupés actuellement du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier le poste de travail occupés actuellement du ".$name]);
            }else{
                $add = new Posteactuelle();
                $add->personnel = $request->personnel;
                $add->metror = $request->metror;
                $add->facteurnuissance = $request->facteurnuissance;
                $add->periodedebut = $request->periodedebut;
                $add->periodefin = $request->periodefin;
                $add->metrotype = $request->metrotype;
                $add->metrodate = $request->metrodate;
                $add->rythme = $request->rythme;
                $add->taches = $request->taches;
                $add->poste = $request->poste;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter un poste de travail occupés actuellement par ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter un poste de travail occupés actuellement par ".$name]);
            }   
        }
    }

    public function getallposteactuelle(Request $request){
        $list = Posteactuelle::get();
        return json_encode(["data" => $list]);
    }

    public function deleteposteactuelle(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Posteactuelle::where('id', request('id'))->first()->taches;
            $occurence = json_encode(Posteactuelle::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Posteactuelle::where('id', request('id'))->delete();
            $info = "Vous avez supprimé le poste ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Vaccination
    public function setaddvaccination(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->date) || $request->date == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Date ne peut pas être vide."]);
            }

            if (!isset($request->vaccin) || $request->vaccin == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Vaccin ne peut pas être vide."]);
            }

            if (!isset($request->lot) || $request->lot == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Lot ne peut pas être vide."]);
            }

            if (!isset($request->dose) || $request->dose == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Dose ne peut pas être vide."]);
            }

            if (!isset($request->type) || $request->type == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Type ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Vaccination::where('date', $request->date)->where('vaccin', $request->vaccin)->where('personnel', $request->personnel)->first()->id)) {
                Vaccination::where('date', $request->date)->where('vaccin', $request->vaccin)->where('personnel', $request->personnel)->update([
                    "lot" => $request->lot,
                    "dose" => $request->dose,
                    "type" => $request->type,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier la vaccination du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier la vaccination du ".$name]);
            }else{
                $add = new Vaccination();
                $add->personnel = $request->personnel;
                $add->type = $request->type;
                $add->dose = $request->dose;
                $add->lot = $request->lot;
                $add->vaccin = $request->vaccin;
                $add->date = $request->date;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une vaccination faite par ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une vaccination faite par ".$name]);
            }   
        }
    }

    public function getallvaccination(Request $request){
        $list = Vaccination::get();
        return json_encode(["data" => $list]);
    }

    public function deletevaccination(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Vaccination::where('id', request('id'))->first()->vaccin;
            $occurence = json_encode(Vaccination::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Vaccination::where('id', request('id'))->delete();
            $info = "Vous avez supprimé le vaccin ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Absenteisme
    public function setaddabsenteisme(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->njaa) || $request->njaa == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Nombre de jours d'arrêt ne peut pas être vide."]);
            }

            if (!isset($request->type) || $request->type == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Type ne peut pas être vide."]);
            }

            if (!isset($request->cause) || $request->cause == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Cause ne peut pas être vide."]);
            }

            if (!isset($request->debut) || $request->debut == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Début ne peut pas être vide."]);
            }

            if (!isset($request->reprise) || $request->reprise == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Reprise ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Absenteisme::where('debut', $request->debut)->where('reprise', $request->reprise)->where('personnel', $request->personnel)->first()->id)) {
                Absenteisme::where('debut', $request->debut)->where('reprise', $request->reprise)->where('personnel', $request->personnel)->update([
                    "cause" => $request->cause,
                    "njaa" => $request->njaa,
                    "type" => $request->type,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier les valeurs d'absence du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier les valeurs d'absence du ".$name]);
            }else{
                $add = new Absenteisme();
                $add->personnel = $request->personnel;
                $add->type = $request->type;
                $add->njaa = $request->njaa;
                $add->cause = $request->cause;
                $add->debut = $request->debut;
                $add->reprise = $request->reprise;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une période d'absence pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une période d'absence pour ".$name]);
            }   
        }
    }

    public function getallabsenteisme(Request $request){
        $list = Absenteisme::get();
        return json_encode(["data" => $list]);
    }

    public function deleteabsenteisme(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Absenteisme::where('id', request('id'))->first()->debut.' au '.Absenteisme::where('id', request('id'))->first()->reprise;
            $occurence = json_encode(Absenteisme::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Absenteisme::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la période d'absence ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Accident de travail
    public function setaddaccident(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->emc) || $request->emc == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Element matériel causal ne peut pas être vide."]);
            }

            if (!isset($request->date) || $request->date == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date ne peut pas être vide."]);
            }

            if (!isset($request->ndl) || $request->ndl == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nature des lésions ne peut pas être vide."]);
            }

            if (!isset($request->poste) || $request->poste == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Poste ne peut pas être vide."]);
            }

            if (!isset($request->nja) || $request->nja == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Nombre de jours ne peut pas être vide."]);
            }

            if (!isset($request->ipp) || $request->ipp == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Incapacité permanente partielle ne peut pas être vide."]);
            }

            if (!isset($request->obs) || $request->obs == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Observation ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Accident::where('date', $request->date)->where('emc', $request->emc)->where('ndl', $request->ndl)->where('personnel', $request->personnel)->first()->id)) {
                Accident::where('date', $request->date)->where('emc', $request->emc)->where('ndl', $request->ndl)->where('personnel', $request->personnel)->update([
                    "obs" => $request->obs,
                    "ipp" => $request->ipp,
                    "nja" => $request->nja,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier les valeurs d'un accident de travail du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier les valeurs d'un accident de travail du ".$name]);
            }else{
                $add = new Accident();
                $add->personnel = $request->personnel;
                $add->emc = $request->emc;
                $add->ndl = $request->ndl;
                $add->date = $request->date;
                $add->ipp = $request->ipp;
                $add->nja = $request->nja;
                $add->poste = $request->poste;
                $add->obs = $request->obs;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter un accident de travail pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une période d'absence pour ".$name]);
            }   
        }
    }

    public function getallaccident(Request $request){
        $list = Accident::get();
        return json_encode(["data" => $list]);
    }

    public function deleteaccident(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Accident::where('id', request('id'))->first()->ndl;
            $occurence = json_encode(Accident::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Accident::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la nature des lésions ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Maladie profession
    public function setaddmaladie(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->date) || $request->date == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Date ne peut pas être vide."]);
            }

            if (!isset($request->maladie) || $request->maladie == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Maladie ne peut pas être vide."]);
            }

            if (!isset($request->tableau) || $request->tableau == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Tableau ne peut pas être vide."]);
            }

            if (!isset($request->agent) || $request->agent == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Agent Causal ne peut pas être vide."]);
            }

            if (!isset($request->poste) || $request->poste == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Poste ne peut pas être vide."]);
            }

            if (!isset($request->decision) || $request->decision == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Décision ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Maladie::where('date', $request->date)->where('maladie', $request->maladie)->where('personnel', $request->personnel)->first()->id)) {
                Maladie::where('date', $request->date)->where('maladie', $request->maladie)->where('personnel', $request->personnel)->update([
                    "date" => $request->date,
                    "decision" => $request->decision,
                    "poste" => $request->poste,
                    "agent" => $request->agent,
                    "tableau" => $request->tableau,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier les valeurs du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier les valeurs du ".$name]);
            }else{
                $add = new Maladie();
                $add->personnel = $request->personnel;
                $add->tableau = $request->tableau;
                $add->agent = $request->agent;
                $add->date = $request->date;
                $add->poste = $request->poste;
                $add->maladie = $request->maladie;
                $add->decision = $request->decision;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une maladie professionnel pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une maladie professionnel pour ".$name]);
            }   
        }
    }

    public function getallmaladie(Request $request){
        $list = Maladie::get();
        return json_encode(["data" => $list]);
    }

    public function deletemaladie(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Maladie::where('id', request('id'))->first()->maladie;
            $occurence = json_encode(Maladie::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Maladie::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la maladie ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Convocation
    public function setaddconvocation(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->motif) || $request->motif == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Motif ne peut pas être vide."]);
            }

            if (!isset($request->dateemission) || $request->dateemission == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date d'émission ne peut pas être vide."]);
            }

            if (!isset($request->dateconvocation) || $request->dateconvocation == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date convocation ne peut pas être vide."]);
            }

            if (!isset($request->datepresentation) || $request->datepresentation == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Date présentation ne peut pas être vide."]);
            }

            if (!isset($request->obs) || $request->obs == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Observation ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Convocation::where('motif', $request->motif)->where('dateconvocation', $request->dateconvocation)->where('personnel', $request->personnel)->first()->id)) {
                Convocation::where('motif', $request->motif)->where('dateconvocation', $request->dateconvocation)->where('personnel', $request->personnel)->update([
                    "dateemission" => $request->dateemission,
                    "datepresentation" => $request->datepresentation,
                    "obs" => $request->obs,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier une convocation du ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une convocation du ".$name]);
            }else{
                $add = new Convocation();
                $add->personnel = $request->personnel;
                $add->motif = $request->motif;
                $add->dateconvocation = $request->dateconvocation;
                $add->dateemission = $request->dateemission;
                $add->datepresentation = $request->datepresentation;
                $add->obs = $request->obs;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une convocation pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une convocation pour ".$name]);
            }   
        }
    }

    public function getallconvocation(Request $request){
        $list = Convocation::get();
        return json_encode(["data" => $list]);
    }

    public function deleteconvocation(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Convocation::where('id', request('id'))->first()->motif;
            $occurence = json_encode(Convocation::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Convocation::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la convocation dont le motif est ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Consultation
    public function setaddconsultation(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->date) || $request->date == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Date ne peut pas être vide."]);
            }

            if (!isset($request->plainte) || $request->plainte == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Plainte ne peut pas être vide."]);
            }

            if (!isset($request->constante) || $request->constante == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Constante ne peut pas être vide."]);
            }

            if (!isset($request->examen) || $request->examen == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Examen ne peut pas être vide."]);
            }

            if (!isset($request->diagnostic) || $request->diagnostic == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Diagnostic ne peut pas être vide."]);
            }

            if (!isset($request->traite) || $request->traite == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Traitement ne peut pas être vide."]);
            }

            if (!isset($request->bilan) || $request->bilan == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Bilan ne peut pas être vide."]);
            }

            if (!isset($request->obs) || $request->obs == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Observation ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Consultation::where('date', $request->date)->where('plainte', $request->plainte)->where('personnel', $request->personnel)->first()->id)) {
                Consultation::where('date', $request->date)->where('plainte', $request->plainte)->where('personnel', $request->personnel)->update([
                    "constante" => $request->constante,
                    "examen" => $request->examen,
                    "diagnostic" => $request->diagnostic,
                    "traite" => $request->traite,
                    "bilan" => $request->bilan,
                    "obs" => $request->obs,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier une consultation de ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une consultation de ".$name]);
            }else{
                $add = new Consultation();
                $add->personnel = $request->personnel;
                $add->plainte = $request->plainte;
                $add->date = $request->date;
                $add->constante = $request->constante;
                $add->examen = $request->examen;
                $add->diagnostic = $request->diagnostic;
                $add->traite = $request->traite;
                $add->bilan = $request->bilan;
                $add->obs = $request->obs;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une consultation pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une consultation pour ".$name]);
            }   
        }
    }

    public function getallconsultation(Request $request){
        $list = Consultation::get();
        return json_encode(["data" => $list]);
    }

    public function deleteconsultation(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Consultation::where('id', request('id'))->first()->plainte;
            $occurence = json_encode(Consultation::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Consultation::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la consultation dont le plainte est ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }

    // Visite
    public function setaddvisite(Request $request){
        if (in_array("add_personnel", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            if (!isset($request->plainte) || $request->plainte == "" ) {
                return json_encode(["status"=> 1, "messages" => "Le champ Plainte ne peut pas être vide."]);
            }

            if (!isset($request->examen) || $request->examen == "") {
                return json_encode(["status"=> 1, "messages" => "Le champ Examen ne peut pas être vide."]);
            }

            if (!isset($request->personnel) || $request->personnel == "") {
                return json_encode(["status"=> 1, "messages" => "Une erreur est survenu."]);
            }

            if (isset(Visite::where('plainte', $request->plainte)->where('personnel', $request->personnel)->first()->id)) {
                Visite::where('plainte', $request->plainte)->where('personnel', $request->personnel)->update([
                    "examen" => $request->examen,
                    "poids" => $request->poids,
                    "og" => $request->og,
                    "ta" => $request->ta,
                    "pti" => $request->pti,
                    "taille" => $request->taille,
                    "pte" => $request->pte,
                    "od" => $request->od,
                    "pa" => $request->pa,
                    "poul" => $request->poul,
                    "av" => $request->av,
                    "bio_gly" => $request->bio_gly,
                    "bio_alb" => $request->bio_alb,
                    "bio_glyc" => $request->bio_glyc,
                    "bio_uree" => $request->bio_uree,
                    "bio_ctnnm" => $request->bio_ctnnm,
                    "bio_acuq" => $request->bio_acuq,
                    "bio_tamgo" => $request->bio_tamgo,
                    "bio_tamgt" => $request->bio_tamgt,
                    "bio_cltrt" => $request->bio_cltrt,
                    "bio_cltlhdl" => $request->bio_cltlhdl,
                    "bio_cltlldl" => $request->bio_cltlldl,
                    "bio_tgcd" => $request->bio_tgcd,
                    "bio_nfs" => $request->bio_nfs,
                    "bio_pqt" => $request->bio_pqt,
                    "bio_aghs" => $request->bio_aghs,
                    "bio_ahvc" => $request->bio_ahvc,
                    "bio_hiv" => $request->bio_hiv,
                    "bio_other" => $request->bio_other,
                    "electro" => $request->electro,
                    "audio" => $request->audio,
                    "spirom" => $request->spirom,
                    "rxpulm" => $request->rxpulm,
                    "infosconduite" => $request->infosconduite,
                    "infosordonnanceconduite" => $request->infosordonnanceconduite,
                    "aptitude" => $request->aptitude,
                ]);

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez modifier une visite médical de ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une visite médical de ".$name]);
            }else{
                $add = new Visite();
                $add->personnel = $request->personnel;
                $add->plainte = $request->plainte;
                $add->examen = $request->examen;
                $add->poids = $request->poids;
                $add->pa = $request->pa;
                $add->og = $request->og;
                $add->ta = $request->ta;
                $add->pti = $request->pti;
                $add->pte = $request->pte;
                $add->taille = $request->taille;
                $add->od = $request->od;
                $add->av = $request->av;
                $add->poul = $request->poul;
                $add->bio_gly = $request->bio_gly;
                $add->bio_alb = $request->bio_alb;
                $add->bio_glyc = $request->bio_glyc;
                $add->bio_uree = $request->bio_uree;
                $add->bio_ctnnm = $request->bio_ctnnm;
                $add->bio_acuq = $request->bio_acuq;
                $add->bio_tamgo = $request->bio_tamgo;
                $add->bio_tamgt = $request->bio_tamgt;
                $add->bio_cltrt = $request->bio_cltrt;
                $add->bio_cltlhdl = $request->bio_cltlhdl;
                $add->bio_cltlldl = $request->bio_cltlldl;
                $add->bio_tgcd = $request->bio_tgcd;
                $add->bio_nfs = $request->bio_nfs;
                $add->bio_pqt = $request->bio_pqt;
                $add->bio_aghs = $request->bio_aghs;
                $add->bio_ahvc = $request->bio_ahvc;
                $add->bio_hiv = $request->bio_hiv;
                $add->bio_other = $request->bio_other;
                $add->electro = $request->electro;
                $add->audio = $request->audio;
                $add->spirom = $request->spirom;
                $add->rxpulm = $request->rxpulm;
                $add->infosconduite = $request->infosconduite;
                $add->infosordonnanceconduite = $request->infosordonnanceconduite;
                $add->aptitude = $request->aptitude;
                $add->statut = 1 ;
                $add->action = session("utilisateur")->idUser ;
                $add->save();

                $pers = Personnel::where('id', $request->personnel)->first();
                $name = $pers->nom." ".$pers->prenom;

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez ajouter une visite médical pour ".$name, session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une visite médical pour ".$name]);
            }   
        }
    }

    public function getallvisite(Request $request){
        $list = Visite::get();
        return json_encode(["data" => $list]);
    }

    public function deletevisite(Request $request)
    {
        if (in_array("delete", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Visite::where('id', request('id'))->first()->plainte;
            $occurence = json_encode(Visite::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Visite::where('id', request('id'))->delete();
            $info = "Vous avez supprimé une visite dont la plainte est ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        }
    }


}
