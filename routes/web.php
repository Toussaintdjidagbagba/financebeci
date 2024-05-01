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
	Route::get('/organigramme', 'App\Http\Controllers\OrganigrammeController@getOrganigramme')->name('GOU');

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


	//////////////////////////////////** Entreprise **///////////////////////////////////////////////////////////////////
	Route::get('/listentreprise', 'App\Http\Controllers\ServiceController@listserv')->name('GS');
	Route::post('/entreprise', 'App\Http\Controllers\ServiceController@addserv')->name('AS');
	Route::get('/modif-entreprise-{id}', 'App\Http\Controllers\ServiceController@getmodifserv')->name('MSC');
	Route::get('/delete-entreprise-{id}', 'App\Http\Controllers\ServiceController@deleteserv')->name('DS');
	Route::post('/modif-entreprise', 'App\Http\Controllers\ServiceController@modifserv')->name('SSL');


    //////////////////////////////////** Besoins **////////////////////////////////////////////////////////////////////
    Route::get('/besoins', 'App\Http\Controllers\BesoinController@index')->name('besoins');
    Route::get('/modifierbesoin-{id}', 'App\Http\Controllers\BesoinController@show')->name('modifbesoins');
    Route::get('/viewbesoin-{id}', 'App\Http\Controllers\BesoinController@showValidate')->name('viewbesoin');
    Route::get('/validatebesoin-{id}', 'App\Http\Controllers\BesoinController@showViewValidate')->name('validatebesoin');
    Route::post('/modifierbesoin', 'App\Http\Controllers\BesoinController@update')->name('modifierbesoin');
    Route::post('/validatebesoin', 'App\Http\Controllers\BesoinController@validateBesoin')->name('validbesoin');
    Route::post('/ajouterbesoin', 'App\Http\Controllers\BesoinController@add')->name('ajouterbesoin');
    Route::get('/supprimerbesoin-{id}', 'App\Http\Controllers\BesoinController@delete')->name('supprimerbesoin');

    //////////////////////////////////** Nature dépense **///////////////////////////////////////////////////////////
	Route::get('/natures', 'App\Http\Controllers\NatureDepenseController@getNatureDepense')->name('GLBGT');
	Route::post('/addnatures', 'App\Http\Controllers\NatureDepenseController@setNaturedepense')->name('ALBGT');
	Route::post('/deletenatures', 'App\Http\Controllers\NatureDepenseController@setdelete')->name('DLBGT');
	Route::post('/importexcelnatures', 'App\Http\Controllers\NatureDepenseController@importNaturedepense')->name('SIELBD');
	Route::get('/exporternatures', 'App\Http\Controllers\NatureDepenseController@getExcelNaturedepense')->name('GELB');

	//////////////////////////////////** Plan de trésorerie général **////////////////////////////////////////////////
	Route::get('/plangeneraltresorerie', 'App\Http\Controllers\PrevisionController@getptg')->name('GPVS');
	Route::post('/addplangeneraltresorerie', 'App\Http\Controllers\PrevisionController@setptg')->name('APVS');
	Route::post('/deleteplangeneraltresorerie', 'App\Http\Controllers\PrevisionController@setdelete')->name('DPVS');

	//////////////////////////////////** Budget Général **////////////////////////////////////////////////
	Route::get('/listbudgetgeneral', 'App\Http\Controllers\BudgetGeneralController@getbudgetgeneral')->name('GLBG');
	Route::post('/addbudgetgeneral', 'App\Http\Controllers\BudgetGeneralController@setLigneBudgetaire')->name('ABG');
	Route::post('/deletebudgetgeneral', 'App\Http\Controllers\BudgetGeneralController@setdelete')->name('DBG');
	Route::post('/importexcelbudget', 'App\Http\Controllers\BudgetGeneralController@setimportbudget')->name('SLGI');
	Route::post('/importexcelbudgetanterieur', 'App\Http\Controllers\BudgetGeneralController@setbudgetanterieur')->name('SIBGA');
	Route::get('/exporterlignebudgetaire', 'App\Http\Controllers\BudgetGeneralController@getExcelBudget')->name('EBG');
	Route::get('/exemplebudget', 'App\Http\Controllers\BudgetGeneralController@getExemplaireForBudgetGeneral')->name('GLBFORBG');
	Route::get('/exemplebudgetanterieur', 'App\Http\Controllers\BudgetGeneralController@getExemplaireForBudgetGeneralAnterieur')->name('GLBFORBGA');

	///////////////////////////////////** Compte Fonctionnel **//////////////////////////////////////////////////////
	Route::get('/comptefonctionnement', 'App\Http\Controllers\CompteController@getscfonctionnement')->name('GCF');

	///////////////////////////////////** Compte Social **//////////////////////////////////////////////////////
	Route::get('/comptesocial', 'App\Http\Controllers\CompteController@getscsocial')->name('GCS');

	///////////////////////////////////** Compte Investissement **//////////////////////////////////////////////////////
	Route::get('/compteinvertissement', 'App\Http\Controllers\CompteController@getscinvertissement')->name('GCI');

	///////////////////////////////////** Compte Dividende **//////////////////////////////////////////////////////
	Route::get('/comptedividende', 'App\Http\Controllers\CompteController@getscdividente')->name('GCD');

	///////////////////////////////////** Compte Projet **//////////////////////////////////////////////////////
	Route::get('/compteprojet', 'App\Http\Controllers\CompteController@getscprojet')->name('GCP');


	//////////////////////////////////** Projet **///////////////////////////////////////////////////////////////////
	Route::get('/projets', 'App\Http\Controllers\ProjetController@getprojets')->name('GP');
	Route::post('/addprojet', 'App\Http\Controllers\ProjetController@setAddProjet')->name('SAP');
	Route::post('/addacteurprojet', 'App\Http\Controllers\ProjetController@setAddActorProjet')->name('SAAP');
	Route::get('/ficheprojet-{titre}', 'App\Http\Controllers\ProjetController@getficheprojet')->name('GDFP');

	//////////////////////////////////** Type de prestation **//////////////////////////////////////////////////////////////////////
	Route::get('/listtypeprestation', 'App\Http\Controllers\TypeprestationController@listtypesprestation')->name('GTP');
	Route::post('/prestation', 'App\Http\Controllers\TypeprestationController@addprestation')->name('AP');
	Route::post('/delete-prestation-{id}', 'App\Http\Controllers\TypeprestationController@deleteprestation')->name('DPresta');

	//////////////////////////////////** Type de financement **//////////////////////////////////////////////////////////////////////
	Route::get('/listtypefinancement', 'App\Http\Controllers\TypefinancementController@listtypesfinancement')->name('GTF');
	Route::post('/financement', 'App\Http\Controllers\TypefinancementController@addtypesfinancement')->name('AF');

	//////////////////////////////////** Unite **////////////////////////////////////////////////
	Route::get('/listunite', 'App\Http\Controllers\UniteController@getute')->name('GLUTE');
	Route::post('/addunite', 'App\Http\Controllers\UniteController@setute')->name('SAUTE');
	Route::post('/deleteaddunite', 'App\Http\Controllers\UniteController@setdelete')->name('DLUTE');

	//////////////////////////////////** Banque **///////////////////////////////////////////////////////////////////
	Route::get('/listbanque', 'App\Http\Controllers\BanqueController@listbanque')->name('LB');
	Route::post('/add-banque', 'App\Http\Controllers\BanqueController@setbanque')->name('AB');
	Route::post('/delete-banque', 'App\Http\Controllers\BanqueController@deletebanque')->name('DB');

	//////////////////////////////////** Partenaire **////////////////////////////////////////////////
	Route::get('/partenaire', 'App\Http\Controllers\PartenaireController@getpartenaire')->name('GPTN');
	Route::post('/addpartenaire', 'App\Http\Controllers\PartenaireController@setpartenaire')->name('APTN');
	Route::post('/deletepartenaire', 'App\Http\Controllers\PartenaireController@setdelete')->name('DPTN');

	//////////////////////////////////** Partenaire Projet **////////////////////////////////////////////////
	Route::get('/partenaireprojet', 'App\Http\Controllers\ProjetController@getAllpartenaireInprojet')->name('GPTNP');
	Route::post('/partenaireprojet', 'App\Http\Controllers\ProjetController@setpartenaireprojet')->name('APTNP');
	Route::post('/deletepartenaireprojet', 'App\Http\Controllers\ProjetController@setdeletepartenaireprojet')->name('DPTN');

	//////////////////////////////////** Compte **///////////////////////////////////////////////////////////////////
	Route::get('/situationcompte', 'App\Http\Controllers\CompteController@getcomptes')->name('GSDC');
	Route::post('/situationcompte', 'App\Http\Controllers\CompteController@setcomptes')->name('SAC');
	Route::post('/deletecompte', 'App\Http\Controllers\CompteController@setdelete')->name('DSC');
	Route::get('/fichecompte{id}', 'App\Http\Controllers\CompteController@getdetailcompte')->name('GDSC');

	Route::get('/creance', 'App\Http\Controllers\GestionnaireController@getcreance')->name('GCA');

});

/*
|--------------------------------------------------------------------------
| Web Routes
| Dev :	MDP-DEST
*/
