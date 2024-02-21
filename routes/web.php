<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes 
| Dev :	MDP-DEST
*/

Route::get('/cach',function () 
{
    Artisan::call('Config:cache');
});

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('hoL');
Route::get('/connexion', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/loginapi', 'App\Http\Controllers\LoginController@loginapi')->name('logapi');
Route::post('/connexion', 'App\Http\Controllers\LoginController@authenticate')->name('loginS');
Route::get('/mot-de-passe-oublié', 'App\Http\Controllers\LoginController@passmodif')->name('pass');


Route::fallback(function() {
   return view('vendor.error.404');
});

Route::group([
    'middleware' => 'App\Http\Middleware\Autorisation' 
 
], function(){
	
	Route::get('/deconnexion', 'App\Http\Controllers\LoginController@logout')->name('logout');
	Route::get('/aide', 'App\Http\Controllers\GestionnaireController@getaide')->name('MAD');
	
	Route::get('/apilogin', 'App\Http\Controllers\GestionnaireController@apilogin')->name('apiloginS');

	///////////////////////////////////** Utilisateur **///////////////////////////////////////////////////////////////

	Route::get('/dashboard', 'App\Http\Controllers\GestionnaireController@dash')->name('dashboard');
	Route::get('/utilisateur', 'App\Http\Controllers\UtilisateurController@getuser')->name('GU');
	Route::post('/utilisateur', 'App\Http\Controllers\UtilisateurController@adduser')->name('setuser');
	Route::get('/delete-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@deleteuser')->name('DU');
	Route::get('/reinitialiser-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@reinitialiseruser')->name('RU');
	Route::get('/desactivé-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@desactiveuser')->name('DSU');
	Route::get('/activé-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@activeuser')->name('ATU');
	Route::get('/desactive-mail-{id}', 'App\Http\Controllers\UtilisateurController@desactiveusermail')->name('DSUM');
	Route::get('/active-mail-{id}', 'App\Http\Controllers\UtilisateurController@activeusermail')->name('ATUM');
	Route::get('/modif-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@getmodifyuser')->name('MTU');
	Route::post('/modif-utilisateur', 'App\Http\Controllers\UtilisateurController@modifyuser')->name('MTUS');

	//////////////////////////////////** Rôle **//////////////////////////////////////////////////////////////////////
	Route::get('/listroles', 'App\Http\Controllers\RoleController@listrole')->name('GR');
	Route::post('/roles', 'App\Http\Controllers\RoleController@addrole')->name('AR');
	Route::get('/modif-roles-{id}', 'App\Http\Controllers\RoleController@getmodifrole')->name('MTR');
	Route::get('/delete-roles-{id}', 'App\Http\Controllers\RoleController@deleterole')->name('DR');
	Route::get('/menu-roles-{id}', 'App\Http\Controllers\RoleController@getmenurole')->name('MRR');
	Route::post('/menu-roles', 'App\Http\Controllers\RoleController@setmenurole')->name('MenuAttr');
	Route::post('/modif-roles', 'App\Http\Controllers\RoleController@modifrole')->name('SRL');
 

	//////////////////////////////////** Menu **//////////////////////////////////////////////////////////////////////
	Route::get('/listmenus', 'App\Http\Controllers\MenuController@getmenu')->name('GM');
	Route::post('/listmenus', 'App\Http\Controllers\MenuController@setmenu')->name('Menu_add');
	Route::get('/delete-menu-{id}', 'App\Http\Controllers\MenuController@delmenu')->name('DM');
	Route::get('/modif-menu-{id}', 'App\Http\Controllers\MenuController@getmodifmenu')->name('MTM');
	Route::post('/modif-menu', 'App\Http\Controllers\MenuController@setmodifmenu')->name('SML');
	Route::post('/action-menu', 'App\Http\Controllers\MenuController@setactionmenu')->name('Actionsave');
	Route::get('/action-menu-{id}', 'App\Http\Controllers\MenuController@getactionmenu')->name('ActionGet');

	//////////////////////////////////** FRONTEND  **//////////////////////////////////////////////////////////////////////
	Route::get('/listfactures', 'App\Http\Controllers\GestionnaireController@getfactures')->name('GF');
	Route::get('/facturesfonds', 'App\Http\Controllers\GestionnaireController@getfacturesfonds')->name('GFF');
	Route::get('/facturesreception', 'App\Http\Controllers\GestionnaireController@getfacturesreception')->name('GFR');
	Route::get('/facturesemission', 'App\Http\Controllers\GestionnaireController@getfacturesemission')->name('GFE');

	Route::get('/budget', 'App\Http\Controllers\GestionnaireController@getbudget')->name('GB');
	Route::get('/budgetcreation', 'App\Http\Controllers\GestionnaireController@getbudgetcreation')->name('GBC');

	Route::get('/budgetsuivi', 'App\Http\Controllers\GestionnaireController@getbudgetsuivi')->name('GBS');
	Route::get('/budgetsuivietatgeneral', 'App\Http\Controllers\GestionnaireController@getbudgetbudgetsuivietatgeneral')->name('GBSEG');
	Route::get('/budgetsuivigrandlivre', 'App\Http\Controllers\GestionnaireController@getbudgetsuivigrandlivre')->name('GBSGL');
	Route::get('/budgetsuivietatcomparatif', 'App\Http\Controllers\GestionnaireController@getbudgetsuivietatcomparatif')->name('GBSEC');
	Route::get('/budgetsuiviplantresorerie', 'App\Http\Controllers\GestionnaireController@getbudgetsuiviplantresorerie')->name('GBSPT');

	Route::get('/ficheprojet', 'App\Http\Controllers\GestionnaireController@getficheprojet')->name('GFP');
	Route::get('/detailprojet', 'App\Http\Controllers\GestionnaireController@getplanificationprojet')->name('GDP');
	
	Route::get('/caisse', 'App\Http\Controllers\GestionnaireController@getcaisse')->name('GC');
	Route::get('/caissee', 'App\Http\Controllers\GestionnaireController@getcaisse')->name('GE');
	
	Route::get('/decaissement', 'App\Http\Controllers\GestionnaireController@getdecaissement')->name('GD');
	Route::get('/virementbancaire', 'App\Http\Controllers\GestionnaireController@getvirementbancaire')->name('GVB');
	Route::get('/editioncheque', 'App\Http\Controllers\GestionnaireController@geteditioncheque')->name('GEC');
	Route::get('/dette', 'App\Http\Controllers\GestionnaireController@getdette')->name('GDT'); 
	Route::get('/validation', 'App\Http\Controllers\GestionnaireController@getvalidation')->name('GVF');

	Route::get('/sc', 'App\Http\Controllers\GestionnaireController@getsc')->name('GSDC');
	Route::get('/dsc', 'App\Http\Controllers\GestionnaireController@getdetailsc')->name('GDSDC');
	Route::get('/creance', 'App\Http\Controllers\GestionnaireController@getcreance')->name('GCA');

	

	//////////////////////////////////** Entreprise **///////////////////////////////////////////////////////////////////
	Route::get('/listentreprise', 'App\Http\Controllers\ServiceController@listserv')->name('GS');
	Route::post('/entreprise', 'App\Http\Controllers\ServiceController@addserv')->name('AS');
	Route::get('/modif-entreprise-{id}', 'App\Http\Controllers\ServiceController@getmodifserv')->name('MSC');
	Route::get('/delete-entreprise-{id}', 'App\Http\Controllers\ServiceController@deleteserv')->name('DS');
	Route::post('/modif-entreprise', 'App\Http\Controllers\ServiceController@modifserv')->name('SSL');

	
});
	
/* 
|--------------------------------------------------------------------------
| Web Routes 
| Dev :	MDP-DEST
*/
