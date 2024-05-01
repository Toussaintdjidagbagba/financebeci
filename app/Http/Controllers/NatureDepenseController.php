<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Naturedepense;
use App\Models\Document;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCommerciaux;
use Illuminate\Support\Collection;
use App\Import\ImportExcel;
use App\Exports\ExportErrorNaturedepense;
use App\Exports\ExportNaturedepense;


class NatureDepenseController extends Controller
{

	public function getNatureDepense()
	{
		$list = Naturedepense::orderby("updated_at", "desc")->paginate(100);
		return view("viewadmindste.naturedepense.list", compact('list'));
	}

	public function setNaturedepense(Request $request){

		//if (in_array("add_personnel", session("auto_action"))) {
        //    return view("vendor.error.649");
        // }else{
            try {
                $request->validate([
                    'lbcode' => 'required',
                    'lbdlesc' => 'required',
                    '_token' => 'required'
                ], [
                    'lbdlesc.required' => 'Le champ description est requis.',
                    'lbcode.required' => 'Le champ code est requis.',
                    '_token.required' => 'Le champ jeton est requis.'
                ]);

    			if (isset(Naturedepense::where('code', $request->lbcode)->first()->id)) {
                    Naturedepense::where('code', $request->lbcode)->update([
                    	"description" => $request->lbdlesc,
                    	"commentaire" => $request->lbcommentaire,
                    ]);
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier la ligne de dépense ".$request->lbcode, session("utilisateur")->idUser);
                    
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier la ligne de dépense ".$request->lbcode]);

                }else{
                	// Sauvegarde de la trace

                	$addLb = new Naturedepense();
                	$addLb->code = $request->lbcode;
                	$addLb->description = $request->lbdlesc;
                	$addLb->comptesyscoahada = $request->lbcomptesys;
                	$addLb->commentaire = $request->lbcommentaire;
                	$addLb->save();

    				TraceController::setTrace("Vous avez ajouter une ligne de nature dépense ".$request->lbcode, session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne de nature dépense "]);
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
            $lib = Naturedepense::where('code', request('id'))->first()->description;
            $occurence = json_encode(Naturedepense::where('code', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Naturedepense::where('code', request('id'))->delete();
            $info = "Vous avez supprimé la ligne de nature dépense ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

    public function importNaturedepense(Request $request){

        if ($request->hasFile('data')) {
            $namefile = "N".date('dmYis').".xlsx";
            $upload = "public/documents/upload/";
            $request->file('data')->move($upload, $namefile);

            $pathc = $upload.$namefile;

            // save document upload
            $addD = new Document();
            $addD->obs = "Importation des natures";
            $addD->filein = $pathc;
            $addD->save();
            
            $tab = Excel::toArray( new ImportExcel, $pathc);
            $data = $tab[0]; $i=0; $obs = "";

            // Préparation du fichier en cas d'erreur
            $e = 0;
            $statuterror = 0;

            for ($i=1; $i < count($data); $i++) {
                $lbg = $data[$i];
                $code = $lbg[0];
                $desc = $lbg[1];
                $comptesys = $lbg[2];
                $commentaire = $lbg[3];

                if ($code != "" || $code != " ") {
                
                    // Traitement des erreurs
                    if (isset(Naturedepense::where('code', $code)->first()->id)) {
                        $obs .= "Nature existe déjà;";
                    }

                    if ($comptesys != "") {
                        if(!is_int($comptesys)){
                            $obs .= "La valeur de la cellule du numéro du compte syshoada n'est pas un entier;";
                        }
                    }

                    if($obs != ""){
                        $tabl[$e]["code"] = $code;
                        $tabl[$e]["desc"] = $desc;
                        $tabl[$e]["compte"] = $comptesys;
                        $tabl[$e]["commentaire"] = $commentaire;
                        $tabl[$e]["obs"] = $obs;
                        $e++;
                        $statuterror += 1;
                        $obs = "";
                    }else{
                        $addLb = new Naturedepense();
                        $addLb->code = $code;
                        $addLb->description = $desc;
                        $addLb->comptesyscoahada = $comptesys;
                        $addLb->commentaire = $commentaire;
                        $addLb->save();
                    }
                }
            }

            // Vérification s'il y avait d'erreur pour généré le fichier d'erreur
            if ($statuterror != 0) {
                $autre = new Collection($tabl);
                Session()->put('errorlbg', $autre);
                
                Excel::store(new ExportErrorNaturedepense, 'Error'.$namefile, 'excelstoreerror');

                flash(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <br> <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>')->error();
                TraceController::setTrace(count($data) - 1 - $statuterror.' importé(s) avec succès et '.$statuterror.' error (s) trouvée(s). <a href="public/documents/error/Error'.$namefile.'"> Télécharger le fichier d\'erreur. </a>', session("utilisateur")->idUser);
                return Back();
            }


            $info = "Vous avez importé la liste des natures avec succès. Nom fichier : ".$namefile.".";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info);
            return Back();
        }else{
            $info = "Erreur d'importation de fichier des natures. ";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info)->error();
            return Back();
        }

    }

    public function getExcelNaturedepense(Request $request){

        $list = Naturedepense::get();
        $e = 0;
        foreach ($list as $value) {
            $tabl[$e]["code"] = $value->code;
            $tabl[$e]["desc"] = $value->description;
            $tabl[$e]["compte"] = $value->comptesyscoahada;
            $tabl[$e]["commentaire"] = $value->commentaire;
            $e++;
        }

        $autre = new Collection($tabl);
        Session()->put('exportlbg', $autre);
        $namefile = 'ExportNature'.date("Ymdi").'.xlsx';
        //Excel::store(new ExportNaturedepense, $namefile, 'excelstoreexport');

        TraceController::setTrace("Vous avez exporter les natures dépenses en excel.", session("utilisateur")->idUser);
        
        return Excel::download(new ExportNaturedepense, $namefile);

    }

}