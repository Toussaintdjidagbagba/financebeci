<?php

/**
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Incident;
use App\Models\Trace;
use App\Providers\InterfaceServiceProvider;

class IncidentController extends Controller
{ 
	
	public static function getincident(){
		$list = Incident::where("Emetteur", session("utilisateur")->idUser)->orderBy('created_at', 'desc')->paginate(100);
		return view('viewadmindste.saveincident.dashincident', compact('list'));
	}
	
	public function valideavis(Request $request){
	    Incident::where('id', $request->anormalieid)->update(
        [
        	"avis" => $request->avis,
        	"sugg" => $request->libsub,
        ]);
        
        $data = json_encode(["success"=> true, "data"=> "Merci!"]);
        return $data;
        
	}

	public function setincident(Request $request)
	{
		if (!in_array("add_incident", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
                date_default_timezone_set('Africa/Porto-Novo');
                $add = new Incident();
                $add->Service = session("utilisateur")->Service;
                $add->Emetteur =  session("utilisateur")->idUser;
                $add->DateEmission = date("d-m-Y H:i:s");
                $add->Module = htmlspecialchars(trim($request->module));
                $add->description = htmlspecialchars(trim($request->desc));
                $add->cat = htmlspecialchars(trim($request->cat));
                $add->hierarchie = htmlspecialchars(trim($request->hiera));
                $add->etat = "En attente";
                if ($request->hasFile('piece')) {
		            $namefile = "incident".date('i').".pdf";
		            $upload = "documents/incident/";
		            $request->file('piece')->move($upload, $namefile);
		            $add->piece = $upload.$namefile;
        		}
                else{
		        	$add->piece = "";
		        }
                $add->save();

                // Sauvegarde de la trace
                TraceController::setTrace("Vous avez déclaré un incident.".$add->id, session("utilisateur")->idUser);
                
                $libservice = InterfaceServiceProvider::LibService(session("utilisateur")->Service);

                $message = "M/Mme ".session("utilisateur")->nom." ".session("utilisateur")->prenom." du ".$libservice." à déclarer un incident. Veuillez vous connecté SUPPORT IT pour procéder au traitement.";

                $data = ["mes" => $message];
                
                $destinataire = InterfaceServiceProvider::destinataire();

                SendMail::senddeclaration($destinataire, "Déclaration d'incident", $data);

                flash("Vous avez déclaré un incident avec succès. ")->success();
                return Back()->with('success',"Vous avez déclaré un incident avec succès.");
            
        }
	}

	public function deleteincident(Request $request)
    {
        if (!in_array("delete_incident", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(Incident::where('id', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Incident supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Incident::where('id', request('id'))->delete();
            $info = "Incident est supprimé avec succès.";
            flash($info);
            return Back();
        }
    }

    public function getmodifyincident(Request $request)
    {
        if (!in_array("update_incident", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Incident::where('id', request('id'))->first();
            return view('viewadmindste.saveincident.modifincident', compact('info'));
        }
    }

    public function modifyincident(Request $request)
    {

        if (!in_array("update_incident", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ($request->hasFile('piece')) {
				            $namefile = "incident".date('i').".pdf";
				            $upload = "documents/incident/";
				            $request->file('piece')->move($upload, $namefile);
				            $piece = $upload.$namefile;

			        Incident::where('id', request('id'))->update(
                    [
                    	"piece" => $piece 
                    ]);
		     }

            Incident::where('id', request('id'))->update(
                    [
                    	"Module" => htmlspecialchars(trim($request->module)),
               		 	"description" => htmlspecialchars(trim($request->desc)),
                		"cat" => htmlspecialchars(trim($request->cat)),
                		"hierarchie" => htmlspecialchars(trim($request->hiera))
                    ]);

            flash("Incident est modifiée avec succès. ")->success();
            TraceController::setTrace(
                "Vous avez modifié l'incident ".$request->desc." .",
                session("utilisateur")->idUser);
            return redirect('/incident');
        }
    }
}

?>