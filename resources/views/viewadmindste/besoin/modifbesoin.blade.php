@extends('templatedste._temp')
@section('css')

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection
@section('content')

<div class="container-fluid">
	<div class="block-header">
		@include('flash-message')
		<h2>
			Expression de besoins
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier une expression de besoins
					</h2>
				</div>
				<div class="body">
					<div class="row">
                        <form method="post" action="{{route('modifierbesoin')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <!-- Champ caché pour stocker les données du tableau -->
                            <input type="hidden" name="tableauDonnees" id="tableauDonneesJSON">
                            <input type="hidden" name="idbesoin" value="{{ $info->id }}">
                            <input type="hidden" name="idparcour" value="{{ $parcour->id }}">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="date">Date d'émission : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="date" name="date" class="form-control" placeholder="" value="{{ $info->dateemission }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="demandeur">Demandeur : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select type="text" id="demandeur" name="demandeur" class="form-control" placeholder="" value="{{ $info->user }}">
                                                @php
                                                    $users = App\Providers\InterfaceServiceProvider::allutilisateurspersonnel();
                                                @endphp
                                                @foreach($users as $user)
                                                    <option value="{{$user->idUser}}" @if($user->idUser==$info->user) selected @endif>{{$user->nom}} {{$user->prenom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="struc">Niveau d'Urgence : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="urgence" name="urgence" value="{{ $info->urgence }}" class="form-control" placeholder="">
                                            <option @if($info->urgence=='MODERE') selected @endif>MODERE</option>
                                            <option @if($info->urgence=='CRITIQUE') selected @endif>CRITIQUE</option>
                                            <option @if($info->urgence=='ELEVE') selected @endif>ELEVE</option>
                                            <option @if($info->urgence=='FAIBLE') selected @endif>FAIBLE</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="chef">Chef : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="chef" name="chef" class="form-control" placeholder="" value="{{ $parcour->validateur }}">
                                            @php
                                                $userschef = App\Providers\InterfaceServiceProvider::UtilisateurChef();
                                            @endphp
                                            @foreach($userschef as $user)
                                                <option value="{{$user->idUser}}">{{$user->nom}} {{$user->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="date">Libéllé : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" class="form-control" placeholder="Libellé">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Quantité : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="quantite" class="form-control" placeholder="Quantité">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Montant : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="montant" class="form-control" placeholder="Montant">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Motif : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="motif" placeholder="Motif">
                                    </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-bg bg-deep-orange waves-effect" onclick="ajouterDonnees()">Ajouter au tableau</button>
                            </div>
                            <div class="row clearfix">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tableauDonnees" class="table table-middle-font table-bordered table-striped">
                                        <tr>
                                            <th>Numéro</th> <!-- Colonne ajoutée pour le numéro d'ordre -->
                                            <th>Libellé</th>
                                            <th>Quantité</th>
                                            <th>Montant</th>
                                            <th>Motif</th>
                                            <th>Action</th> <!-- Colonne ajoutée pour les actions (supprimer) -->
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                                <button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                            </div>
                        </form>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
        let donneesJson = [];
        let donneesInitiales = JSON.parse(@json($donneesvJson))
        donneesJson = JSON.parse(@json($donneesvJson))
        donneesInitiales.forEach(donnee => {
            // alert(donnee)
            ajouterDonneesAuTableau(donnee);
        });
        // Mettre à jour le champ caché avec les données du tableau
        document.getElementById("tableauDonneesJSON").value = JSON.stringify(donneesInitiales);

        function ajouterDonneesAuTableau(donnee) {


            let tableau = document.getElementById("tableauDonnees");
            let nouvelleLigne = tableau.insertRow(-1); // Ajoute une ligne à la fin du tableau
            let celluleNum = nouvelleLigne.insertCell(0); // Cellule pour le numéro d'ordre, sera mis à jour après
            nouvelleLigne.insertCell(1).innerHTML = donnee.libelle;
            nouvelleLigne.insertCell(2).innerHTML = donnee.quantite;
            nouvelleLigne.insertCell(3).innerHTML = donnee.montant;
            nouvelleLigne.insertCell(4).innerHTML = donnee.motif;

            // Ajoute une cellule pour le bouton de suppression
            let celluleSupprimer = nouvelleLigne.insertCell(5);
            celluleSupprimer.innerHTML = '<button class="btn-supprimer">Supprimer</button>';
            celluleSupprimer.querySelector('.btn-supprimer').addEventListener('click', function() {
                tableau.deleteRow(nouvelleLigne.rowIndex);
                mettreAJourNumerosOrdre(); // Met à jour les numéros d'ordre après la suppression
            });

            mettreAJourNumerosOrdre(); // Met à jour les numéros d'ordre chaque fois qu'une ligne est ajoutée
        }

        // Mettre à jour les numéros d'ordre des lignes du tableau
        function mettreAJourNumerosOrdre() {
            let tableau = document.getElementById("tableauDonnees");
            for (let i = 1; i < tableau.rows.length; i++) { // Commence à 1 pour ignorer l'en-tête du tableau
                tableau.rows[i].cells[0].innerHTML = i; // Met à jour le numéro d'ordre basé sur l'index de la ligne
            }
        }



        function ajouterDonnees() {
            let libelle = document.getElementById("libelle").value.trim();
            let quantite = document.getElementById("quantite").value.trim();
            let montant = document.getElementById("montant").value.trim();
            let motif = document.getElementById("motif").value.trim();

            // Vérification que tous les champs sont remplis
            if (!libelle || !quantite || !montant || !motif) {
                alert("Veuillez remplir tous les champs.");
                return; // Sortie anticipée de la fonction si l'un des champs est vide
            }

            // Création de l'objet de données avec un identifiant unique
            let donnee = {
                id: Date.now(), // Utilisation du timestamp comme identifiant unique
                libelle: libelle,
                quantite: quantite,
                montant: montant,
                motif: motif
            };

            donneesJson.push(donnee); // Ajout à l'objet JavaScript

            let tableau = document.getElementById("tableauDonnees");
            let nouvelleLigne = tableau.insertRow(-1); // Ajoute une ligne à la fin du tableau
            nouvelleLigne.setAttribute('data-id', donnee.id); // Stocke l'identifiant unique dans l'attribut de la ligne

            // Ajout du numéro d'ordre et des autres données
            nouvelleLigne.insertCell(0).innerHTML = tableau.rows.length - 1; // La numérotation commence à 1 et exclut l'entête
            nouvelleLigne.insertCell(1).innerHTML = libelle;
            nouvelleLigne.insertCell(2).innerHTML = quantite;
            nouvelleLigne.insertCell(3).innerHTML = montant;
            nouvelleLigne.insertCell(4).innerHTML = motif;

            // Ajout d'un bouton de suppression
            let cellAction = nouvelleLigne.insertCell(5);
            let btnSupprimer = document.createElement("button");
            btnSupprimer.innerHTML = "Supprimer"//"<i class="material-icons">delete_sweep</i>";
            // btnSupprimer.setAttribute(class,"btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light")
            btnSupprimer.onclick = function() {
                let tr = this.closest("tr");
                let id = tr.getAttribute('data-id'); // Récupère l'identifiant unique

                // Suppression de l'élément de l'objet JavaScript
                donneesJson = donneesJson.filter(d => d.id.toString() !== id);

                // Suppression de la ligne du tableau
                tr.remove();

                // Mise à jour de la numérotation
                let toutesLesLignes = tableau.getElementsByTagName("tr");
                for(let i = 1; i < toutesLesLignes.length; i++) {
                    toutesLesLignes[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                }
            };
            cellAction.appendChild(btnSupprimer);

            // Réinitialisation des champs du formulaire
            document.getElementById("libelle").value = '';
            document.getElementById("quantite").value = '';
            document.getElementById("montant").value = '';
            document.getElementById("motif").value = '';
            // alert(donneesJson)
            // Mettre à jour le champ caché avec les données du tableau
            document.getElementById("tableauDonneesJSON").value = JSON.stringify(donneesJson);
        }


        function seedirection() {
            structure = document.getElementById("struc").value;

            if(structure == "SERVICE")
            {
                document.getElementById('controledirect').style.display = "block";
            }else{
                document.getElementById('controledirect').style.display = "none";
            }
        }
    </script>
@endsection

@section("js")
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
@endsection
