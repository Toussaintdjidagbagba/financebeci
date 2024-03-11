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
