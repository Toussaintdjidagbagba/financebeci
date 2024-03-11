<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use App\Models\Provision;


class CompteController extends Controller
{
	// Sous compte fonctionnement
	public function getscfonctionnement()
	{
		$list = Provision::join('lignebudgetaires', 'lignebudgetaires.id', '=', 'provisions.lignebudgetaire')->where("lignebudgetaires.souscompte", 1)->get();
		return view("viewadmindste.compte.fonctionnement", compact('list'));
	}
}