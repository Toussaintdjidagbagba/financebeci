<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Incident;

class InterfaceServiceProvider extends ServiceProvider
{

    public static function allcategorie(){
        return DB::table('categorieoutils')->get();
    }

    public static function allutilisateurs(){
        return DB::table('utilisateurs')->get();
    }

    public static function allutilisateursadmin(){
        return DB::table('utilisateurs')->where('Role', 2)->orwhere('Role', 1)->get();
    }

    public static function getallperiode(){
        return DB::table('maintenances')->get();
    }

    public static function getordinateur(){
        return DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->get();
    }

    public static function getUserOutil($id){
        $ordinateur = DB::table('outils')->select('outils.user as user', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $id)->first();
        if(isset($ordinateur->id)){
            return InterfaceServiceProvider::LibelleUser($ordinateur->user);
        }else{
            return "";
        }
    }

    public static function periodeMaintenance($id){
        $maintenance = DB::table('maintenances')->where('id', $id)->first();

        if (isset($maintenance->id)) {
            return $maintenance->periodedebut.' au '.$maintenance->periodefin;
        }else{
            return '';
        }
    }

    public static function getLibOutil($id){
        $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $id)->first();
        if(isset($ordinateur->id)){
            return $ordinateur->nameoutils;
        }else{
            return "";
        }
    }

    public static function LibService($id){
        return DB::table('services')->where('id', $id)->first()->libelle;
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

    public static function LibelleCategorie($id)
    {
        $libcat = DB::table('categorieoutils')->where('id', $id)->first();
        if (isset($libcat->libelle))
            return $libcat->libelle;
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

    public static function AllCat()
    {
        return DB::table('categories')->get();
    }

    public static function LibelleCat($id)
    {
        return DB::table('categories')->where('id', $id)->first()->libelle;
    }
    
    public static function TempsCat($id)
    {
        return DB::table('categories')->where('id', $id)->first()->tmpCat;
    }

    public static function AllHie()
    {
        return DB::table('hierarchies')->get();
    }

    public static function LibelleHier($id)
    {
        return DB::table('hierarchies')->where('id', $id)->first()->libelle;
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
}