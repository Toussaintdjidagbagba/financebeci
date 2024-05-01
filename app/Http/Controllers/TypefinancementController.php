<?php

namespace App\Http\Controllers;

use App\Models\Typesfinancement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TypefinancementController extends Controller
{
    public function listtypesfinancement()
    {
        
        $list = Typesfinancement::get();
		return view("viewadmindste.typesfinancement.listtypesfinancement", compact('list'));
    }
    public function addtypesfinancement(Request $request)
    {
        // if (!in_array("add_prestation", session("auto_action"))) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

         // Valider les données entrantes
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|unique:typesfinancement',
        ]);
        
        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try {
            $libelle = htmlspecialchars(trim($request->input('libelle')));
    
            $add = new Typesfinancement();
            $add->libelle = $libelle;
            $add->saveOrFail();

            flash("Le Type de financement est enregistré avec succès. ")->success();
            TraceController::setTrace(
                "Vous avez enregistré le type de financement $libelle.",
                session("utilisateur")->idUser
            );

            return response()->json(['message' => 'Le Type de financement est enregistré avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur s\'est produite lors de l\'enregistrement du type de financement.'], 500);
        }
    }


    // public function deleterole(Request $request)
    // {
    //     if (!in_array("delete_role", session("auto_action"))) {
    //         return view("vendor.error.649");
    //     }else{
    //         //Role::where('idRole', request('id'))->update(['statut' =>  "sup"]);
    //         $occurence = json_encode(Role::where('idRole', request('id'))->first());
    //         $addt = new Trace();
    //         $addt->libelle = "Rôle supprimé : ".$occurence;
    //         $addt->action = session("utilisateur")->idUser;
    //         $addt->save();
    //         typesprestation::where('idRole', request('id'))->delete();
    //         $info = "Le Rôle est supprimé avec succès."; flash($info); 

    //         return Back();
    //     }
    // }

    // public function getmodifrole(Request $request)
    // {
    //     if (!in_array("update_role", session("auto_action"))) {
    //         return view("vendor.error.649");
    //     }else{
    //         $info = Role::where('idRole', request('id'))->first();
    //         return view('viewadmindste.role.modifrole', compact('info'));
    //     }
    // }

    // public function modifrole(Request $request)
    // {
    //     if (!in_array("update_role", session("auto_action"))) {
    //         return view("vendor.error.649");
    //     }else{
    //         $request->validate([
    //                 'code' => 'required|string',
    //                 'libelle' => 'required|string', 
    //             ]);

    //         Role::where('idRole', request('id'))->update(
    //                 [
    //                     'libelle' =>  htmlspecialchars(trim($request->libelle)),
    //                     'code' =>  htmlspecialchars(trim($request->code)),
    //                     'user_action' => session("utilisateur")->idUser,
    //                 ]);
    //         flash("Le Rôle est modifié avec succès. ")->success();
    //         TraceController::setTrace(
    //             "Vous avez modifié le rôle ".$request->libelle." .",
    //             session("utilisateur")->idUser);
    //         return redirect('/listroles');
    //     }
    // }

    // public static function ExisteRole($libelle){
    //     $role = Role::where('code', $libelle)->first();
    //     if (isset($role) && $role->idRole!= 0) return true; else return false;
    // }

    // public function in_value($value, $table)
    // {
    //     if ($table == null) {
    //         return false;
    //     }
    //     foreach ($table as $tab) {
    //         if($tab == $value) return true;
    //     }
    //     return false;
    // }

    public static function Existefinancement($libelle){
        $financement = typesfinancement::where('libelle', $libelle)->first();
        if (isset($financement) && $financement->id!= 0) return true; else return false;
    }

    public function in_value($value, $table)
    {
        if ($table == null) {
            return false;
        }
        foreach ($table as $tab) {
            if($tab == $value) return true;
        }
        return false;
    }
}
