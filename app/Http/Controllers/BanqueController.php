<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banque;
use Exception;
use Illuminate\Database\QueryException;

class BanqueController extends Controller
{
    public function listbanque()
	{
		$list = Banque::get();
		return view("viewadmindste.banque.listbanque", compact('list'));
	}

	public function setbanque(Request $request){

		
            try {
                $request->validate([
                    'lib' => 'required',
                    '_token' => 'required'
                ], [
                    'lib.required' => 'Le champ libelle est requis.',
                    '_token.required' => 'Le champ jeton est requis.'
                ]);

    			if ($request->banq=="ajout" && isset(Banque::where('id', $request->id)->first()->id)) 
                {
                    Banque::where('id', $request->id)->update([
                    	"libelle" => $request->lib,
                    ]);
                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez modifier la banque ".$request->lib, session("utilisateur")->idUser);
                    
                    return json_encode(["status"=> 0, "messages" => "Vous avez modifier la banque ".$request->lbcode]);

                }else{
                	// Sauvegarde de la trace

                	$addLb = new Banque();
                	$addLb->libelle = $request->lib;
                	$addLb->save();

    				TraceController::setTrace("Vous avez ajouter une banque ".$request->lib, session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une banque "]);
                }

            } catch (QueryException $e) {
                return json_encode(["status"=> 1, "messages" => 'Erreur de base de données : ' . $e->getMessage()]);
                // redirect()->back()->with('error', 'Erreur de base de données : ' . $e->getMessage());
            } catch (Exception $e) {
                return json_encode(["status"=> 1, "messages" => 'Erreur' . $e->getMessage()]);
                // return redirect()->back()->with('error', $e->getMessage());
            }

        //}

	}

	public function deletebanque(Request $request){
		
            $lib = Banque::where('id', request('id'))->first()->libelle;
            $occurence = json_encode(Banque::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Banque::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la banque ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}

    
}
