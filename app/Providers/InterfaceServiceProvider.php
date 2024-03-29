<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Incident;

class InterfaceServiceProvider extends ServiceProvider
{
    public static function LibSouscompte($id){
        $sc = DB::table('souscomptes')->where('id', $id)->first();
        if(isset($sc->compte))
            return $sc->compte;
        return "";
    }

    public static function allsouscomptes(){
        return DB::table('souscomptes')->get();
    }

    public static function LibLigneBudgetaire($id){
        $lb = DB::table('lignebudgetaires')->where('id', $id)->first();
        if(isset($lb->description))
            return $lb->description;
        return "";
    }

    public static function alllignebudgetaire(){
        return DB::table('lignebudgetaires')->get();
    }

    public static function alldirections(){
        return DB::table('services')->where('structure', "DIRECTION")->get();
    }

    public static function allutilisateurs(){
        return DB::table('utilisateurs')->get();
    }

    public static function allutilisateursadmin(){
        return DB::table('utilisateurs')->where('Role', 2)->orwhere('Role', 1)->get();
    }

    public static function allutilisateurspersonnel(){
        return DB::table('utilisateurs')
        ->where('Role', 1)
        ->get();
    }

    public static function getallperiode(){
        return DB::table('maintenances')->get();
    }

    public static function LibService($id){
        $service = DB::table('services')->where('id', $id)->first();
        if(isset($service->libelle))
            return $service->libelle;
        return "";
    }

    public static function destinataire(){
        $alluser = DB::table('utilisateurs')->select('mail as mailR')->where('activereceiveincident', 0)->get();
        $mails = array();
        foreach ($alluser as $value) {
            array_push($mails, $value->mailR);
        }
        return $mails;
    }

	public static function LibelleRole($id)
    {
    	$role = DB::table('roles')->where('idRole', $id)->first();
    	if(isset($role->libelle))
        	return $role->libelle;
        return "";
    }

    public static function sexe($sigle)
    {
        if ($sigle == 'M') return "Masculin";
        if ($sigle == 'F') return "Féminin";
    }

    public static function LibelleUser($id)
    {
        $user = DB::table('utilisateurs')->where('idUser', $id)->first();
        if (isset($user->nom))
            return $user->nom.' '.$user->prenom;
        else
            return "";
    }

    public static function AllRole()
    {
        return DB::table('roles')->get();
    }

    public static function AllService()
    {
        return DB::table('services')->get();
    }

    public static function LibelleService($id)
    {
        if($id == null)
            return "";
        return DB::table('services')->where('id', $id)->first()->libelle;
    }

    public static function libmenu($id)
    {
        if ($id == 0) {
            return '';
        }else
            return DB::table('menus')->where('idMenu', $id)->first()->libelleMenu;
    }
    public static function recupactions($value)
    {
        return DB::table('action_menus')->where('Menu', $value)->get();
    }

    public static function actionMenu($menu)
    {
        return DB::table('action_menus')->where('Menu', $menu)->get();
    }

    public static function infomenu($id)
    {
        return DB::table('menus')->where('idMenu', $id)->first();
    }

    public static function verifie_ss($ssm)
    {
        $allmenu_sous = DB::table('action_menu_acces')->join('menus', "menus.idMenu", "=", "action_menu_acces.Menu")->select('Menu', 'Topmenu_id')->where('Role', session('utilisateur')->Role)->where('Topmenu_id', '<>', 0)->where('action_menu_acces.statut', 0)->orderby('num_ordre', 'ASC')->get();

        $val = false;
        foreach($allmenu_sous as $all){
            if ($all->Topmenu_id == $ssm) {
                $val = true;
            }
        }
        return $val;
    }


    ////////Fructueux ////////////////////////////

    public static function UserService($id)
    {
        if($id == null)
            return "";
        return DB::table('services')
                    ->join('utilisateurs', 'utilisateurs.Service', '=', 'services.id')
                    ->where('idUser', $id)
                    ->first()->libelle;
    }


    public static function UtilisateurChef()
    {
        return DB::table('utilisateurs')
                // ->where('Role', 1)
                ->whereIn('idUser', function($query){
                    $query->select('chef')
                ->from('services');
    })
    ->get();
    }
}
