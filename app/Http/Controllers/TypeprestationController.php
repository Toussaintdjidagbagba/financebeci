<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typesprestation;
use App\Models\Trace;
use App\Models\Menu;
use DB;
use App\Models\ActionMenu;
use App\Models\ActionMenuAcces;
use App\Http\FonctionControllers\AllTable;

class TypeprestationController extends Controller
{
    public function listtypesprestation()
    {
        
        $list = Typesprestation::get();
		return view("viewadmindste.typesprestation.listtypesprestation", compact('list'));
    }

    public function addprestation(Request $request)
    {
        // if (!in_array("add_prestation", session("auto_action"))) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        //try {
            $libelle = htmlspecialchars(trim($request->input('libelle')));

            if (TypeprestationController::Existeprestation($libelle)) {
                return json_encode(["status"=> 1, "messages" => "Le Type de prestation que vous voulez ajouter existe déjà!! "]);
            }

            $add = new Typesprestation(); 
            $add->libelle = $libelle;
            $add->save();

            return json_encode(["status"=> 0, "messages" => "Le Type de prestation est enregistré avec succès."]);
           /* 
        } catch (\Exception $e) {
            // Gérer l'erreur
            return json_encode(["status"=> 1, "messages" => "Une erreur s'est produite lors de l'enregistrement du type de prestation."]);
        }*/
    }

    public function deleteprestation(Request $request)
    {
        if (!in_array("delete_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
        $lib = typesprestation::where('id', $request->id)->first();
            $occurence = json_encode(typesprestation::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            typesprestation::where('id', $request->id)->delete();
            $info = "Vous avez supprimé la ligne prestation ".$lib." avec succès.";
            TraceController::setTrace($info, session("utilisateur")->idUser);
            flash($info);
            return redirecte()->route('GP');
        }
        
    }

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

    public static function Existeprestation($libelle){
        $prestation = Typesprestation::where('libelle', $libelle)->first();
        if (isset($prestation->id)) 
            return true;
        else 
            return false;
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

    // public function existance($role, $menu, $roleacces)
    // {
    //     $check = RoleAcessMenu::where('Menu', $menu)->where('Role', $role)->where('roleacces', $roleacces)->first();
    //     if(isset($check)) return false; return true;
    // }
}
