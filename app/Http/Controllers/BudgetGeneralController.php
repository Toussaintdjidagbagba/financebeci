<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Naturedepense;
use App\Models\Budgetgeneral;
use App\Models\Document;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCommerciaux;
use Illuminate\Support\Collection;
use App\Import\ImportExcel;
use App\Exports\ExportForExemplaireBudget;
use App\Exports\ErrorExportForExemplaireBudget;
use App\Exports\ExportForExemplaireBudgetAnterieur;
use App\Exports\ExportBudgetView;


class BudgetGeneralController extends Controller
{
 
	public function getbudgetgeneral()
	{

		$list = Budgetgeneral::orderby("updated_at", "desc")->get();
		return view("viewadmindste.budgetgeneral.list", compact('list'));
	}

	public function setLigneBudgetaire(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {
                $request->validate([
                    'bgaebdt' => 'required',
                    'bgm' => 'required',
                    'bgn' => 'required',                 
                    '_token' => 'required'
                ], [
                    'bgaebdt.required' => 'Le champ Année d\'exercice est requis.',
                    'bgm.required' => 'Le champ Mode est requis.',
                    'bglb.required' => 'Le champ Nature est requis.',
                    'lgmontant.required' => 'Le champ Montant est requis.',
                    '_token.required' => 'Vous devez vous reconnecter.'
                ]);

    			if (isset(Budgetgeneral::where('id', $request->bgid)->first()->id)) {
                    Budgetgeneral::where('id', $request->bgid)->update([
                    	"montant" => $request->bgsomme,
                    	"sc" => $request->bgm,
                        "detailbudget" => $request->bgdatamensuelle,
                        "commentaire" => $request->lgcommentaire,
                        "comptesys" => $request->lgcomptesys,
                    ]);
                    $libNature = Naturedepense::where('id', $request->bgn)->first()->description;
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier la ligne budgétaire ".$libNature, session("utilisateur")->idUser);
                    
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier la ligne budgétaire ".$libNature]);

                }else{
                	
                    // sauvegarde d'une ligne du budget général 
                	$addLb = new Budgetgeneral();
                	$addLb->nature = $request->bgn;
                	$addLb->montant = $request->bgsomme;
                    $addLb->sc = $request->bgm;
                    $addLb->periode = $request->bgaebdt;
                    $addLb->debutperiode = "01-01-".$request->bgaebdt;
                    $addLb->finperiode = "31-12-".$request->bgaebdt;
                	$addLb->commentaire = $request->lgcommentaire; 
                    $addLb->comptesys = $request->lgcomptesys;
                    $addLb->detailbudget = $request->bgdatamensuelle;
                	$addLb->save();

                    $libNature = Naturedepense::where('id', $request->bgn)->first()->description;

    				TraceController::setTrace("Vous avez ajouter une ligne budgétaire ".$libNature, session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne budgétaire "]);
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
            $lb = Budgetgeneral::where('id', request('id'))->first()->nature;
            $libNature = Naturedepense::where('id', $lb)->first()->description;
            $occurence = json_encode(Budgetgeneral::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Budgetgeneral::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la ligne budgétaire ".$libNature." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

    public function getExemplaireForBudgetGeneral(Request $request){
        $list = Naturedepense::get();
        $e = 0;
        foreach ($list as $value) {
            $tabl[$e]["code"] = $value->code;
            $tabl[$e]["desc"] = $value->description;
            $e++;
        }

        $autre = new Collection($tabl);
        Session()->put('eforbg', $autre);
        $namefile = 'ExportNatureDepense'.date("Ymdi").'.xlsx';

        TraceController::setTrace("Vous avez exporter les lignes budgétaire en excel pour importer le budget général.", session("utilisateur")->idUser);
        
        return Excel::download(new ExportForExemplaireBudget, $namefile);
    }

    public function getExemplaireForBudgetGeneralAnterieur(Request $request){
        $list = Naturedepense::get();
        $e = 0;
        foreach ($list as $value) {
            $tabl[$e]["code"] = $value->code;
            $tabl[$e]["desc"] = $value->description;
            $e++;
        }

        $autre = new Collection($tabl);
        Session()->put('eforbg', $autre);
        $namefile = 'ExportNatureDepenseAnterieur'.date("Ymdi").'.xlsx';

        TraceController::setTrace("Vous avez exporter les lignes budgétaire en excel pour importer le budget général antérieur.", session("utilisateur")->idUser);
        
        return Excel::download(new ExportForExemplaireBudgetAnterieur, $namefile);
    }

    public function setimportbudget(Request $request){

        if ($request->hasFile('data')) {
            $namefile = "BG".date('dmYis').".xlsx";
            $upload = "public/documents/upload/";
            $request->file('data')->move($upload, $namefile);

            $pathc = $upload.$namefile;

            // save document upload
            $addD = new Document();
            $addD->obs = "Importation du budget général";
            $addD->filein = $pathc;
            $addD->save();
            
            $tab = Excel::toArray( new ImportExcel, $pathc);
            $data = $tab[0]; $i=0; $obs = "";

            // Préparation du fichier en cas d'erreur
            $e = 0;
            $statuterror = 0;

            // All récup request 
            $mode = $request->imbg; // Mode d'importation. Eg. Fonctionnement Social etc
            $iaebdt = $request->iaebdt; // Année d'exercice

            // Controle du contenu du fichier
            if( $data[0][0] != "CODE" || 
                $data[0][1] != "NATURE DE DEPENSES" ||
                $data[0][2] != "JANVIER" ||
                $data[0][3] != "FEVRIER" ||
                $data[0][4] != "MARS" ||
                $data[0][5] != "AVRIL" ||
                $data[0][6] != "MAI" ||
                $data[0][7] != "JUIN" ||
                $data[0][8] != "JUILLET" ||
                $data[0][9] != "AOUT" ||
                $data[0][10] != "SEPTEMBRE" ||
                $data[0][11] != "OCTOBRE" ||
                $data[0][12] != "NOVEMBRE" ||
                $data[0][13] != "DECEMBRE" 
            ){

                $info = "L'entête du fichier est incorrect! Veuillez télécharger le fichier exemplaire et remplir.";
                TraceController::setTrace($info, session("utilisateur")->idUser);
                flash($info)->error();
                return Back();

            }else{

                for ($i=1; $i < count($data); $i++) {
                    $lbg = $data[$i];
                    $code = $lbg[0];
                    $desc = $lbg[1];
                    $montantjanv = $lbg[2];
                    $montantfev = $lbg[3];
                    $montantmars = $lbg[4];
                    $montantavril = $lbg[5];
                    $montantmai = $lbg[6];
                    $montantjuin = $lbg[7];
                    $montantjuillet = $lbg[8];
                    $montantaout = $lbg[9];
                    $montantsept = $lbg[10];
                    $montantoct = $lbg[11];
                    $montantnov = $lbg[12];
                    $montantdec = $lbg[13];

                    // Get id ligne budgetaire 
                    $lbg = Naturedepense::where('code', $code)->first();
                    if (!isset($lbg->id)) {
                        $obs .= "Le code de la Nature de dépense n'existe. Veuillez le paramétrer avant important;";
                    }else{

                        if ($code != "" || $code != " ") {
                            
                            // Traitement des erreurs
                            if (isset(Budgetgeneral::where('nature', $lbg->id)
                                        ->where('periode', $iaebdt)
                                        ->where('sc', $mode)
                                        ->first()->id)) {
                                $obs .= "Ligne budgétaire existe déjà;";
                            }else{

                                // controle si la valeur des montants est un entier
                                $tableaudetaillg = array();
                                $montant_total = 0;

                                // Janvier
                                $montantjanv = BudgetGeneralController::estEntier($montantjanv);
                                if($montantjanv != 0){
                                    $datadetail =  array(
                                        'id' => time()+1, // id unique
                                        'mois' => "Janvier", // Mois
                                        'montant' => $montantjanv // Montant
                                    );
                                    $montant_total = $montant_total + $montantjanv;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Février
                                $montantfev = BudgetGeneralController::estEntier($montantfev);
                                if($montantfev != 0){
                                    $datadetail =  array(
                                        'id' => time()+2, // id unique
                                        'mois' => "Fevrier", // Mois
                                        'montant' => $montantfev // Montant
                                    );
                                    $montant_total = $montant_total + $montantfev;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Mars
                                $montantmars = BudgetGeneralController::estEntier($montantmars);
                                if($montantmars != 0){
                                    $datadetail =  array(
                                        'id' => time()+3, // id unique
                                        'mois' => "Mars", // Mois
                                        'montant' => $montantmars // Montant
                                    );
                                    $montant_total = $montant_total + $montantmars;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Avril
                                $montantavril = BudgetGeneralController::estEntier($montantavril);
                                if($montantavril != 0){
                                    $datadetail =  array(
                                        'id' => time()+4, // id unique
                                        'mois' => "Avril", // Mois
                                        'montant' => $montantavril // Montant
                                    );
                                    $montant_total = $montant_total + $montantavril;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Mai
                                $montantmai = BudgetGeneralController::estEntier($montantmai);
                                if($montantmai != 0){
                                    $datadetail =  array(
                                        'id' => time()+5, // id unique
                                        'mois' => "Mai", // Mois
                                        'montant' => $montantmai // Montant
                                    );
                                    $montant_total = $montant_total + $montantmai;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Juin
                                $montantjuin = BudgetGeneralController::estEntier($montantjuin);
                                if($montantjuin != 0){
                                    $datadetail =  array(
                                        'id' => time()+6, // id unique
                                        'mois' => "Juin", // Mois
                                        'montant' => $montantjuin // Montant
                                    );
                                    $montant_total = $montant_total + $montantjuin;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Juillet
                                $montantjuillet = BudgetGeneralController::estEntier($montantjuillet);
                                if($montantjuillet != 0){
                                    $datadetail =  array(
                                        'id' => time()+7, // id unique
                                        'mois' => "Juillet", // Mois
                                        'montant' => $montantjuillet // Montant
                                    );
                                    $montant_total = $montant_total + $montantjuillet;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Août
                                $montantaout = BudgetGeneralController::estEntier($montantaout);
                                if($montantaout != 0){
                                    $datadetail =  array(
                                        'id' => time()+8, // id unique
                                        'mois' => "Aout", // Mois
                                        'montant' => $montantaout // Montant
                                    );
                                    $montant_total = $montant_total + $montantaout;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Septembre
                                $montantsept = BudgetGeneralController::estEntier($montantsept);
                                if($montantsept != 0){
                                    $datadetail =  array(
                                        'id' => time()+9, // id unique
                                        'mois' => "Septembre", // Mois
                                        'montant' => $montantsept // Montant
                                    );
                                    $montant_total = $montant_total + $montantsept;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Octobre
                                $montantoct = BudgetGeneralController::estEntier($montantoct);
                                if($montantoct != 0){
                                    $datadetail =  array(
                                        'id' => time()+10, // id unique
                                        'mois' => "Octobre", // Mois
                                        'montant' => $montantoct // Montant
                                    );
                                    $montant_total = $montant_total + $montantoct;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Novembre
                                $montantnov = BudgetGeneralController::estEntier($montantnov);
                                if($montantnov != 0){
                                    $datadetail =  array(
                                        'id' => time()+11, // id unique
                                        'mois' => "Novembre", // Mois
                                        'montant' => $montantnov // Montant
                                    );
                                    $montant_total = $montant_total + $montantnov;
                                    array_push($tableaudetaillg, $datadetail);
                                }

                                // Décembre
                                $montantdec = BudgetGeneralController::estEntier($montantdec);
                                if($montantdec != 0){
                                    $datadetail =  array(
                                        'id' => time()+12, // id unique
                                        'mois' => "Decembre", // Mois
                                        'montant' => $montantdec // Montant
                                    );
                                    $montant_total = $montant_total + $montantdec;
                                    array_push($tableaudetaillg, $datadetail);
                                }


                                if($montant_total != 0){
                                    // Enregistrement des données
                                    $addLb = new Budgetgeneral();
                                    $addLb->nature = $lbg->id;
                                    $addLb->montant = $montant_total;
                                    $addLb->sc = $mode;
                                    $addLb->periode = $iaebdt;
                                    $addLb->debutperiode = "01-01-".$iaebdt;
                                    $addLb->finperiode = "31-12-".$iaebdt;
                                    $addLb->detailbudget = json_encode($tableaudetaillg);
                                    $addLb->save();
                                }
                            }

                            if($obs != ""){
                                $tabl[$e]["code"] = $code;
                                $tabl[$e]["desc"] = $desc;
                                $tabl[$e]["montant"] = $montant;
                                $tabl[$e]["obs"] = $obs;
                                $e++;
                                $statuterror += 1;
                                $obs = "";
                            }

                        }
                    }
                }

                // Vérification s'il y avait d'erreur pour généré le fichier d'erreur
                if ($statuterror != 0) {
                    $autre = new Collection($tabl);
                    Session()->put('erroreforbg', $autre);
                    
                    Excel::store(new ErrorExportForExemplaireBudget, 'Error'.$namefile, 'excelstoreerror');

                    flash(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <br> <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>')->error();
                    TraceController::setTrace(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>', session("utilisateur")->idUser);
                    return Back();
                }


                $info = "Vous avez importé les lignes du budget général avec succès. Nom fichier : ".$namefile.".";
                TraceController::setTrace($info, session("utilisateur")->idUser);
                flash($info);
                return Back();
            }
        }else{
            $info = "Erreur d'importation de fichier des lignes budgétaire. ";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info)->error();
            return Back();
        }

    }

    public function estEntier($valeur){
        if(!is_int($valeur))
            $montant = 0;
        else
            $montant = $valeur;

        return $montant;
    }

    public function setbudgetanterieur(Request $request){

        if ($request->hasFile('dataa')) {
            $namefile = "BG".date('dmYis').".xlsx";
            $upload = "public/documents/upload/";
            $request->file('dataa')->move($upload, $namefile);

            $pathc = $upload.$namefile;

            // save document upload
            $addD = new Document();
            $addD->obs = "Importation du budget général";
            $addD->filein = $pathc;
            $addD->save();
            
            $tab = Excel::toArray( new ImportExcel, $pathc);
            $data = $tab[0]; $i=0; $obs = "";

            // Préparation du fichier en cas d'erreur
            $e = 0;
            $statuterror = 0;

            // All récup request 
            $mode = $request->imbga; // Mode d'importation. Eg. Fonctionnement Social etc
            $iaebdt = $request->iaebdta; // Année d'exercice

            for ($i=1; $i < count($data); $i++) {
                $lbg = $data[$i];
                $code = $lbg[0];
                $desc = $lbg[1];
                $montant = $lbg[2];

                // Get id ligne budgetaire 
                $lbg = Naturedepense::where('code', $code)->first();
                if (!isset($lbg->id)) {
                    $obs .= "Le code de la Nature de dépense n'existe. Veuillez le paramétrer avant important;";
                }else{

                    if ($code != "" || $code != " ") {
                        
                        // Traitement des erreurs
                        if (isset(Budgetgeneral::where('nature', $lbg->id)
                                    ->where('periode', $iaebdt)
                                    ->where('sc', $mode)
                                    ->first()->id)) {
                            $obs .= "Ligne budgétaire existe déjà;";
                        }else{
                            // Vérification du montant si elle est vide 
                            if ($montant != "") {
                                // Vérification s'il est un entier
                                if(!is_int($montant)){
                                    $obs .= "La valeur de la cellule du montant n'est pas un entier;";
                                }else{
                                    // Enregistrement des données
                                    $addLb = new Budgetgeneral();
                                    $addLb->nature = $lbg->id;
                                    $addLb->montant = $montant;
                                    $addLb->sc = $mode;
                                    $addLb->periode = $iaebdt;
                                    $addLb->debutperiode = "01-01-".$iaebdt;
                                    $addLb->finperiode = "31-12-".$iaebdt;
                                    $addLb->save();
                                }
                            }else{
                                // Ne rien fait puisque le montant est vide
                            }
                        }

                        if($obs != ""){
                            $tabl[$e]["code"] = $code;
                            $tabl[$e]["desc"] = $desc;
                            $tabl[$e]["montant"] = $montant;
                            $tabl[$e]["obs"] = $obs;
                            $e++;
                            $statuterror += 1;
                            $obs = "";
                        }

                    }
                }
            }

            // Vérification s'il y avait d'erreur pour généré le fichier d'erreur
            if ($statuterror != 0) {
                $autre = new Collection($tabl);
                Session()->put('erroreforbg', $autre);
                
                Excel::store(new ErrorExportForExemplaireBudget, 'Error'.$namefile, 'excelstoreerror');

                flash(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <br> <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>')->error();
                TraceController::setTrace(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>', session("utilisateur")->idUser);
                return Back();
            }


            $info = "Vous avez importé les lignes du budget général avec succès. Nom fichier : ".$namefile.".";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info);
            return Back();
        }else{
            $info = "Erreur d'importation de fichier des lignes budgétaire antérieur. ";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info)->error();
            return Back();
        }

    }

    public function getExcelBudget(Request $request){

        Session()->put('expbudgetmode', InterfaceServiceProvider::LibSouscompte($request->mode));
        Session()->put('expbudgetperiode', $request->an);
        Session()->put('expbudgetlist', Budgetgeneral::where("sc", $request->mode)->where("periode", $request->an)->get());

        TraceController::setTrace("Vous avez exporter le budget général en excel.", session("utilisateur")->idUser);

        $namefile = 'ExportBudget_'.InterfaceServiceProvider::LibSouscompte($request->mode).'_'.$request->an.'_'.date("mdi").'.xlsx';

        return Excel::download(new ExportBudgetView, $namefile);
    }

}