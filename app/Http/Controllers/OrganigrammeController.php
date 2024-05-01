<?php

namespace App\Http\Controllers;

use App\Models\Organigrame;
use App\Models\Service as Services;
use App\Models\Utilisateur as Users;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrganigrammeController extends Controller
{
    //
    public function getOrganigramme()
	{
		$listhierachie = Services::get();
        $users = Users::all();

        return view("viewadmindste.organigramme.organigramme")->with([
            'listhierachie' => $listhierachie,
            'users' => $users
        ]);

	}
    
    public function insert(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'nullable|string',
                '_token' => 'required'
            ], [
                'required' => ':attribute est requis.',
                'string' => ':attribute doit être une chaîne de caractères.'
            ]);
            

            $organigrame = new Organigrame;
            $organigrame->name = $request->name;
            $organigrame->parent_id = $request->parent_id;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images');
                $organigrame->image_url = $path;
            }
            $organigrame->save();
        
            return response()->json(['success' => 'Nouveau nœud inséré avec succès !']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erreur de base de données : ' . $e->getMessage()], 500);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }	
    }

}
