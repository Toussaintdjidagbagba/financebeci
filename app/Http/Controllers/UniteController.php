<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniteController extends Controller
{
    public function getute()
	{
		$list = Unite::get();
		return view("viewadmindste.unite.listunite", compact('list'));
	}

	public function setute(Request $request){

        if (!in_array("add_role", session("auto_action"))) {
            return json_encode(["status"=> 1, "messages" => "Vous n'ête pas autorizer a appliqué des actions sur les unités "]);
        }else{
            // dd($request->update , $request->unite);
            if($request->update == "UPDATES" && isset(DB::table('unites')->where("id", $request->id)->first()->id)){
                Unite::where('id', $request->id)->update([
                    "libelle" => $request->unite,
                ]);
                TraceController::setTrace("Vous avez modifier une ligne dans la liste des unités ", session("utilisateur")->idUser);
                
                return json_encode(["status"=> 0, "messages" => "Vous avez modifier une ligne dans la liste des unités "]);
            }
            else{
                if (isset(DB::table('unites')->where('libelle', $request->unite)->first()->id) ) {
                flash(" ")->error();
                return json_encode(["status"=> 1, "messages" => "L'unité que vous voulez ajouter existe déjà!! "]);
                }
                else{
                    $addunite = new Unite();
                    $addunite->libelle = htmlspecialchars(trim($request->unite));
                    $addunite->save();

                    TraceController::setTrace("Vous avez ajouter une ligne dans la liste des unités ", session("utilisateur")->idUser);

                    return json_encode(["status"=> 0, "messages" => "Vous avez ajouter une ligne dans la liste des unités."]);
                }
            }
        }

	}

    public function setdelete(Request $request){
		//if (in_array("delete", session("auto_action"))) {
        //    return view("vendor.error.649");
        //}else{
            $lib = Unite::where('id', request('id'))->first()->libelle;
            $occurence = json_encode(Unite::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Unite::where('id', request('id'))->delete();
            $info = "Vous avez supprimé une ligne dans la liste des unités avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            return $info;
        //}
	}
}
