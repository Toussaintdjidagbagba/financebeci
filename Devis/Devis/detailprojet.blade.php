@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style>
        @keyframes clignotant {  
          50% { background-color: red; }
        }
    
        .bouton-clignotant {
          animation: clignotant 1s infinite;
          border: none;
          color: white;
          padding: 10px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    
        @keyframes montant {  
          50% { background-color: red; }
        }
    
        .bouton-montant {
          animation: montant 1s infinite;
          border: none;
          color: white;
          padding: 10px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    
        </style>

@endsection

@section('content')

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Suivi de projet
                    <small></small>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <div style="text-align : center;"> {{ $info->titre }} </div>
                            
                            <nav class="user-info">
                                <div class="image">
                                    <img src="public/images/user.png" class="circle" width="90" height="90" alt="User" />
                                    <img src="public/images/user.png" style="float: right;" class="circle text-right" width="90" height="90" alt="User" />
                                    <div style="text-align: center; float: center;" class="text">
                                        {{ $info->objet }}
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="name">Client</div>
                                    <div class="email">client@example.com</div>
                                </div>
                            </nav>

                                                        

                            <div class="extra-info pull-right m-t--45">
                                <div class="text">
                                    <div class="text-right"> 
                                        Chef projet
                                    </div>
                                    <span> actor@example.com </span> 
                                </div>
                            </div>                        
                        </div>                    
                        <div class="body">
                            
                            <span>  Compte :  xxx.xxx.xxx CFA </span><br>
                            <span>  Dépense : xxx.xxx.xxx CFA </span>
                           
                            <span class="pull-right">
                                <a class="btn bg-light-blue waves-effect" role="button" data-toggle="collapse" href="#bplan" aria-expanded="false"
                                    aria-controls="bplan">
                                        Plan de trésorerie
                                </a>
                                <button class="btn waves-effect" type="button" data-toggle="collapse" data-target="#execution" aria-expanded="false"
                                        aria-controls="execution">
                                    Créance
                                </button>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#aperçu" data-toggle="tab">Situation projet</a></li>
                                <li role="presentation"><a href="#devis"onclick="devisListe({{$info->id}})" data-toggle="tab">Devis</a></li>
                                <li role="presentation"><a href="#bplan" onclick="bplanListe({{$info->id}})" data-toggle="tab">Bussness plan</a></li>
                                <li role="presentation"><a href="#recap" data-toggle="tab">Récapitulatif</a></li>
                                <li role="presentation"><a href="#pdt" data-toggle="tab">Plan de trésorerie</a></li>
                                <li role="presentation"><a href="#execution" data-toggle="tab">Exécution</a></li>
                                <li role="presentation"><a href="#avenant" data-toggle="tab">Avenant</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="aperçu">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Evolution du projet
                                                </div>

                                                        <!--div class="font-bold">
                                                            <div class="pull-right m-r-10 m-t--15">
                                                                <select name="" id="" class="">
                                                                    <option value="" disabled="disabled" selected>Charges sociales</option>
                                                                    <option value="">Charges sociales 1</option>
                                                                    <option value="">Charges sociales 2</option>
                                                                    <option value="">Charges sociales 3</option>
                                                                    <option value="">Charges sociales 4</option>
                                                                </select>
                                                            </div>
                                                        </div-->
                                                        
                                                        


                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="devis">
                                    <div id="auto_action" data-update="{{ in_array('update_service', session('auto_action')) }}" data-delete="{{ in_array('delete_service', session('auto_action')) }}"></div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                
                                                <div class="header">
                                                    <h2>
                                                <div class="text-primary font-bold font-15">
                                                    Dévis
                                                </div>
                                                <button type="button" onclick="getIdProjet({{$info}})" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addDevi"><i class="material-icons"> note_add </i> </button>
                                                </h2>
                                                </div>

                                                <div class="body"> 
                                                    <div class="table-responsive" data-pattern="priority-columns">
                                                        <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th data-priority="1">#</th>
                                                                <th data-priority="1">Désignation</th>
                                                                <th data-priority="1">Unité</th>
                                                                <th data-priority="1">Quantité</th>
                                                                <th data-priority="1">Prix Unitaire</th>
                                                                <th data-priority="1">Montant</th>
                                                                <th data-priority="6">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="contenudevis">

                                                            </tbody>
                                                        </table>
                                                    </div>         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="bplan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="header">
                                                    <h2>
                                                <div class="text-primary font-bold font-15">
                                                    Bussiness Plan
                                                </div>
                                                <button type="button" onclick="getIdBplan({{$info}})" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addBplan"><i class="material-icons"> note_add </i> </button>
                                                </h2>
                                                </div>

                                                <div class="body"> 
                                                    <div class="table-responsive" data-pattern="priority-columns">
                                                        <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th data-priority="1">#</th>
                                                                <th data-priority="1">Désignation</th>
                                                                <th data-priority="1">Unité</th>
                                                                <th data-priority="1">Quantité</th>
                                                                <th data-priority="1">Prix Unitaire</th>
                                                                <th data-priority="1">Montant</th>
                                                                <th data-priority="6">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="contenubplan">

                                                            </tbody>
                                                        </table>
                                                    </div>         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="recap">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <div class="card-body m-l-25">
                                                    
                                                        <div class="header">
                                                            <h2>
                                                        <div class="text-primary font-bold font-15">
                                                            Récapitulatif
                                                        </div>
                                                        </h2>
                                                        </div>
    
                                                    <div class="body"> 
                                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="pdt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Plan de trésorerie
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="execution">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Exécution
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section("model")
{{-- Devis --}}
    <div class="modal fade" id="addBplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div id="infodevis"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" id="_id" name="_id" />
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="designation">Désignation : </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="designation" name="designation" class="form-control" placeholder="">
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <label for="qte">Quantité : </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="qte" name="qte" class="form-control" placeholder="">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="unite">Unité</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="unite" name="unite" class="form-control show-tick" placeholder="">
                                        @php 
                                            $unites = App\Providers\InterfaceServiceProvider::allunites();
                                        @endphp 
                                            <option value="">Sémectionner une unités</option>
                                        @foreach($unites as $unite)
                                            <option value="{{$unite->id}}">{{$unite->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="p_u">Prix unitaire : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="p_u" name="p_u" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="addDevisProjet()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="updateDevi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div id="infodevis_u"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="_token_u" name="_token_u" value="{{ csrf_token() }}" />
                <input type="hidden" id="_id_u" name="_id_u" />
                <input type="hidden" id="projetID_u"/>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="designation_u">Désignation : </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="designation_u" name="designation_u" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="update_u"/>

                    <div class="col-md-6">
                        <label for="qte_u">Quantité : </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="qte_u" name="qte_u" class="form-control" placeholder="">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="unite_u">Unité</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="unite_u" name="unite_u" class="form-control show-tick" placeholder="">
                                        @php 
                                            $unites = App\Providers\InterfaceServiceProvider::allunites();
                                        @endphp 
                                            <option value="">Sémectionner une unités</option>
                                        @foreach($unites as $unite)
                                            <option value="{{$unite->id}}">{{$unite->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="p_u_ud">Prix unitaire : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="p_u_ud" name="p_u_ud" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="updateDevisProjet()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Suppression d'une ligne : </h4>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="_tokendelete" name="_tokendelete" value="{{ csrf_token() }}" />
                        <input type="hidden" id="_projetID" name="_projetID" />
                        <input type="hidden" id="_designation" name="_designation" />
                        <div class="row clearfix">
                            <input type="hidden" id="_iddelete" name="_iddelete" class="form-control" placeholder="">
                            <label id="infodelete"></label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="validedelete()" id="modif" class="btn bg-deep-orange waves-effect">SUPPRIMER</button>
                </div>
            </div>
        </div>
    </div>
{{-- End Devis --}}

{{-- BPlan --}}
    <div class="modal fade" id="addBplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div id="infodevis"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="_tokenBplan" name="_tokenBplan" value="{{ csrf_token() }}" />
                <input type="hidden" id="_idBplan" name="_idBplan" />
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="designationBplan">Désignation : </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="designationBplan" name="designationBplan" class="form-control" placeholder="">
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <label for="qteBplan">Quantité : </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="qteBplan" name="qteBplan" class="form-control" placeholder="">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="uniteBplan">Unité</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="uniteBplan" name="uniteBplan" class="form-control show-tick" placeholder="">
                                        @php 
                                            $unites = App\Providers\InterfaceServiceProvider::allunites();
                                        @endphp 
                                            <option value="">Sémectionner une unités</option>
                                        @foreach($unites as $unite)
                                            <option value="{{$unite->id}}">{{$unite->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="p_uBplan">Prix unitaire : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="p_uBplan" name="p_uBplan" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="addBplanProjet()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>
{{-- End Bplan --}}
    <script type="text/javascript">
        const url = "{{ route('GDP', ['id' => ':id']) }}";
        const urlbplan = "{{ route('GBPP', ['id' => ':id']) }}";

        // Recuperation de l'id du projet
            async function getIdProjet(data){
                document.getElementById('_id').value = data.id;
            }
            // Ajout d'un nouveau devis
            async function addDevisProjet(){
                
                // récupération des données du formulaire 
                token =  document.getElementById('_token').value;
                projet =  document.getElementById('_id').value;
                designation = document.getElementById('designation').value;
                quantite = document.getElementById('qte').value;
                p_unitaire = document.getElementById('p_u').value;
                uniteElement = document.getElementById('unite');

                selectedOption = uniteElement.options[uniteElement.selectedIndex];
                uniteId = selectedOption.value;
                uniteNom = selectedOption.text;

                
                
            
                if(token == "" || projet == "" || designation == "" || quantite == "" || p_unitaire == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(projet == "")
                        error += ". Le champ projet ne peut pas être vide <br>";
                    if(designation == "")
                        error += ". La designation ne peut pas être vide <br>";
                    if(quantite == "")
                        error += ". La quantité ne peut pas être vide <br>";
                    if(p_unitaire == "")
                        error += ". Le prix unitaitre ne peut pas être vide <br>";

                    document.getElementById('infodevis').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token,
                        projetId: projet,
                        designation: designation,
                        quantite: quantite,
                        p_unitaire: p_unitaire,
                        unite: uniteId
                    };

                    document.getElementById("infodevis").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                    try {
                        let response = await fetch("{{route('ADDDP')}}",
                        {
                            method: 'POST',
                            headers: { 
                                        'Access-Control-Allow-Credentials': true,
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                    },
                            body: JSON.stringify(dat)
                        });
                        if(response.status == 200)
                        {
                            const  data = await response.text();

                            const reponse = JSON.parse(data);

                            if(reponse.status == 0)
                            {
                                Id_input = reponse.projetID;
                                document.getElementById("infodevis").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                
                                var link = document.createElement('a');
                                link.href = '#devis';
                                link.setAttribute('data-toggle', 'tab');
                                link.onclick = function() {
                                    devisListe(Id_input);
                                };
                                
                                document.body.appendChild(link);

                                link.click();
                                // Fermeture du modal 
                                // delay(10000);
                                // $('#addDevi').modal('hide');
                                setTimeout(function() {
                                    $('#addDevi').modal('hide');
                                }, 500);
                                document.getElementById('_id').value = '';
                                document.getElementById('designation').value = '';
                                document.getElementById('qte').value = '';
                                document.getElementById('p_u').value = '';
                                document.getElementById('unite').value = '';
                                document.getElementById('infodevis').value = '';
                            }else{
                                document.getElementById("infodevis").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                            }
                        }
                        else{
                            document.getElementById("infodevis").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                        }
                    } catch (error) {
                        document.getElementById("infodevis").innerHTML = error;
                    } 
                }
            }
        // ::::::

        // Affichage de la liste des devis existant
            async function devisListe(Id_Input){
                getlistDevis(Id_Input);
            }
            // Recuperation et affichage des devis
            async function getlistDevis(Id_Input) {
                try {
                    let response = await fetch(url.replace(':id', Id_Input),
                    {
                        method: 'get',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    }); 
                    if (response.status === 200) {

                        // Récupérer les données JSON de la réponse
                        const responseData = await response.json();
                        const devisList = responseData.devis;

                        let rowsHTML = '';

                        devisList.forEach(devis => {
                            let newRow = '<tr>';
                            newRow += '<td>' + devis.id + '</td>';
                            newRow += '<td>' + devis.designation + '</td>';
                            newRow += '<td>' + devis.unite + '</td>';
                            newRow += '<td>' + devis.quantite + '</td>';
                            newRow += '<td>' + devis.pu + '</td>';
                            newRow += '<td>' + (devis.quantite * devis.pu) + '</td>';
                            newRow += '<td>';
                            newRow += `@if(in_array("update_service", session("auto_action")))<button data-values='["${devis.id}","${devis.designation}","${devis.unite}", "${devis.quantite}", "${devis.pu}","${devis.projet}"]' onclick="getupdate(this)" type="button" title="Modifier" data-toggle="modal" data-target="#updateDevi" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light"><i class="material-icons">system_update_alt</i> </button>@endif`;
                            newRow += `@if(in_array("delete_service", session("auto_action")))<button onclick="getdelete(${(devis.id)}, ${(devis.projet)})" type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i></button>@endif`;
                            newRow += '</td>';
                            newRow += '</tr>';
                            rowsHTML += newRow;
                        });
                        if(rowsHTML == ""){
                            document.getElementById('contenudevis').innerHTML = '<tr> <td colspan="7"><center> Aucune devis enregistré pour ce projet. </center> </td> </tr>';
                        }else{
                            document.getElementById('contenudevis').innerHTML = rowsHTML;
                        }
                        
                    }else{
                        return "";
                    }
                } catch (error) {
                    return "";
                }
            }
        // ::::::

        // Mise a jour d'un devis sur le projet
            function getupdate(button) {
                const valuesString = button.dataset.values;
                try {
                    const values = JSON.parse(valuesString);
                    
                    const id = values[0];
                    const designation = values[1];
                    const unite = values[2];
                    const qte = values[3];
                    const pu = values[4];
                    const projetId = values[5];

                    const infodelete = document.getElementById('infodelete');
                    infodelete.innerHTML = "Mise a jour des informations de <i style='color:#0F056B'> "+designation+" </i> ?";
                    document.getElementById('_id_u').value= id;
                    document.getElementById('designation_u').value= designation;
                    document.getElementById('qte_u').value= qte;
                    document.getElementById('p_u_ud').value= pu;
                    document.getElementById('projetID_u').value= projetId;

                    document.getElementById('update_u').value= 'update_u';

                    const uniteElement = document.getElementById('unite_u');
                    
                    for (let i = 0; i < uniteElement.options.length; i++) {
                        const option = uniteElement.options[i];
                        if (option.value === unite) {
                            option.selected = true;
                            $('#unite_u').selectpicker('refresh');
                            break; 
                        }
                    }
                } catch (error) {
                    console.error("Erreur lors de l'analyse des valeurs :", error);
                    alert("Une erreur s'est produite lors de la mise à jour des informations.");
                }
            }

            async function updateDevisProjet(){
                
                // récupération des données du formulaire 
                token =  document.getElementById('_token').value;
                id =  document.getElementById('_id_u').value;
                designation = document.getElementById('designation_u').value;
                quantite = document.getElementById('qte_u').value;
                p_unitaire = document.getElementById('p_u_ud').value;
                uniteElement = document.getElementById('unite_u');
                projetID_u = document.getElementById('projetID_u').value;

                update_u = document.getElementById('update_u').value;

                selectedOption = uniteElement.options[uniteElement.selectedIndex];
                uniteId = selectedOption.value;
                uniteNom = selectedOption.text;

                
                
            
                if(token == "" || projetID_u == "" || designation == "" || quantite == "" || p_unitaire == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(projetID_u == "")
                        error += ". Le champ projet ne peut pas être vide <br>";
                    if(designation == "")
                        error += ". La designation ne peut pas être vide <br>";
                    if(quantite == "")
                        error += ". La quantité ne peut pas être vide <br>";
                    if(p_unitaire == "")
                        error += ". Le prix unitaitre ne peut pas être vide <br>";

                    document.getElementById('infodevis_u').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token,
                        projetId: projetID_u,
                        id: id,
                        designation: designation,
                        quantite: quantite,
                        p_unitaire: p_unitaire,
                        unite: uniteId,
                        update: update_u
                    };

                    document.getElementById("infodevis_u").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                    try {
                        let response = await fetch("{{route('ADDDP')}}",
                        {
                            method: 'POST',
                            headers: { 
                                        'Access-Control-Allow-Credentials': true,
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                    },
                            body: JSON.stringify(dat)
                        });
                        if(response.status == 200)
                        {
                            const  data = await response.text();

                            const reponse = JSON.parse(data);

                            if(reponse.status == 0)
                            {
                                Id_input = reponse.projetID;
                                document.getElementById("infodevis_u").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                
                                var link = document.createElement('a');
                                link.href = '#devis';
                                link.setAttribute('data-toggle', 'tab');
                                link.onclick = function() {
                                    devisListe(Id_input);
                                };
                                
                                document.body.appendChild(link);

                                link.click();
                                // Fermeture du modal 
                                // delay(10000);
                                // $('#updateDevi').modal('hide');
                                setTimeout(function() {
                                    $('#updateDevi').modal('hide');
                                }, 500);
                                document.getElementById('_id_u').value = '';
                                document.getElementById('designation_u').value = '';
                                document.getElementById('qte_u').value = '';
                                document.getElementById('p_u_ud').value = '';
                                document.getElementById('unite_u').value = '';
                                document.getElementById('infodevis_u').value = '';
                            }else{
                                document.getElementById("infodevis_u").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                            }
                        }
                        else{
                            document.getElementById("infodevis_u").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                        }
                    } catch (error) {
                        document.getElementById("infodevis_u").innerHTML = error;
                    } 
                }
            }
        // ::::::

        // Supression 
            async function getdelete(data, projet){
                // designation_v = document.getElementById('_designation').value = designation;
                document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> </i> ?";
                document.getElementById('_iddelete').value = data;
                document.getElementById('_projetID').value = projet;
            }
            
            async function validedelete(){
                token = document.getElementById("_tokendelete").value
                iddelete = document.getElementById("_iddelete").value;
                projet = document.getElementById("_projetID").value;
                    
                dat = {_token: token, id: iddelete, projet: projet};

                document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                            
                // En cours d'envoie
                try {
                    let response = await fetch("{{route('DDP')}}",
                    {
                        method: 'POST',
                        headers: {
                                        'Access-Control-Allow-Credentials': true,
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                    },
                        body: JSON.stringify(dat)
                    });
                    if(response.status == 200)
                    {
                        data = await response.json();
                        Id_input = data.projetID;

                        document.getElementById("infodelete").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data.messages+'</strong></div>';
                        var link = document.createElement('a');
                        link.href = '#devis';
                        link.setAttribute('data-toggle', 'tab');
                        link.onclick = function() {
                            devisListe(Id_input);
                        };
                        
                        document.body.appendChild(link);

                        link.click();
                        // Fermeture du modal 
                        // $('#delete').modal('hide');
                        setTimeout(function() {
                                $('#delete').modal('hide');
                            }, 900);
                        document.getElementById('_iddelete').value = '';

                    }
                    else{
                        document.getElementById("infodelete").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite'+response.messages+' </strong></div>';
                    }
                } catch (error) {
                    document.getElementById("infodelete").innerHTML = error;
                } 
            }
        // ::::::

        // Bussiness plan *****************
            // Affichage de la liste du Bussiness plan existant
                async function bplanListe(Id_Input){
                    getlistBplan(Id_Input);
                }
                 // Recuperation et affichage du Bussiness plan
                    async function getlistBplan(Id_Input) {
                        try {
                            let response = await fetch(url.replace(':id', Id_Input),
                            {
                                method: 'get',
                                headers: {
                                    'Access-Control-Allow-Credentials': true,
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                            }); 
                            if (response.status === 200) {

                                // Récupérer les données JSON de la réponse
                                const responseData = await response.json();
                                const bplanList = responseData.Bplan;

                                let rowsHTML = '';

                                bplanList.forEach(bplan => {
                                    let newRow = '<tr>';
                                    newRow += '<td>' + bplan.id + '</td>';
                                    newRow += '<td>' + bplan.designation + '</td>';
                                    newRow += '<td>' + bplan.unite + '</td>';
                                    newRow += '<td>' + bplan.quantite + '</td>';
                                    newRow += '<td>' + bplan.pu + '</td>';
                                    newRow += '<td>' + (bplan.quantite * bplan.pu) + '</td>';
                                    newRow += '<td>';
                                    newRow += `@if(in_array("update_service", session("auto_action")))<button data-values='["${bplan.id}","${bplan.designation}","${bplan.unite}", "${bplan.quantite}", "${bplan.pu}","${bplan.projet}"]' onclick="getupdate(this)" type="button" title="Modifier" data-toggle="modal" data-target="#updateDevi" class="btn btn-primary btn-circle btn-xs margin-bottom-10 waves-effect waves-light"><i class="material-icons">system_update_alt</i> </button>@endif`;
                                    newRow += `@if(in_array("delete_service", session("auto_action")))<button onclick="getdelete(${(bplan.id)}, ${(bplan.projet)})" type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i></button>@endif`;
                                    newRow += '</td>';
                                    newRow += '</tr>';
                                    rowsHTML += newRow;
                                });
                                if(rowsHTML == ""){
                                    document.getElementById('contenubplan').innerHTML = '<tr> <td colspan="7"><center> Aucune devis enregistré pour ce projet. </center> </td> </tr>';
                                }else{
                                    document.getElementById('contenubplan').innerHTML = rowsHTML;
                                }
                                
                            }else{
                                return "";
                            }
                        } catch (error) {
                            return "";
                        }
                    }
            // ::::::::

            // Recuperation de l'id du projet 
                async function getIdBplan(data){
                    document.getElementById('_idbl').value = data.id;
                }
                // Ajout d'un nouveau devis
                    async function addBplanProjet(){
                        
                        // récupération des données du formulaire 
                        tokenBplan =  document.getElementById('_tokenBplan').value;
                        projetBplan =  document.getElementById('_idBplanBplan').value;
                        designationBplan = document.getElementById('designationBplan').value;
                        quantiteBplan = document.getElementById('qteBplan').value;
                        p_unitaireBplan = document.getElementById('p_uBplan').value;
                        uniteElementBplan = document.getElementById('uniteBplan');

                        selectedOptionBplan = uniteElementBplan.options[uniteElementBplan.selectedIndex];
                        uniteIdBplan = selectedOptionBplan.value;
                        uniteNomBplan = selectedOptionBplan.text;

                        
                        
                    
                        if(tokenBplan == "" || projetBplan == "" || designationBplan == "" || quantiteBplan == "" || p_unitaireBplan == ""){
                            error = "";
                            if(tokenBplan == "")
                                error += ". Veuillez vous reconnecter pour continuer <br>";
                            if(projetBplan == "")
                                error += ". Le champ projet ne peut pas être vide <br>";
                            if(designationBplan == "")
                                error += ". La designation ne peut pas être vide <br>";
                            if(quantiteBplan == "")
                                error += ". La quantité ne peut pas être vide <br>";
                            if(p_unitaireBplan == "")
                                error += ". Le prix unitaitre ne peut pas être vide <br>";

                            document.getElementById('infodevis').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                        }else{
                            
                            dat = {
                                _token: tokenBplan,
                                projetId: projetBplan,
                                designation: designationBplan,
                                quantite: quantiteBplan,
                                p_unitaire: p_unitaireBplan,
                                unite: uniteIdBplan
                            };

                            document.getElementById("infodevis").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                            
                            // En cours d'envoie
                            try {
                                let response = await fetch("{{route('ADDDP')}}",
                                {
                                    method: 'POST',
                                    headers: { 
                                                'Access-Control-Allow-Credentials': true,
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                            },
                                    body: JSON.stringify(dat)
                                });
                                if(response.status == 200)
                                {
                                    const  data = await response.text();

                                    const reponse = JSON.parse(data);

                                    if(reponse.status == 0)
                                    {
                                        Id_input = reponse.projetID;
                                        document.getElementById("infodevis").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                        
                                        var link = document.createElement('a');
                                        link.href = '#devis';
                                        link.setAttribute('data-toggle', 'tab');
                                        link.onclick = function() {
                                            devisListe(Id_input);
                                        };
                                        
                                        document.body.appendChild(link);

                                        link.click();
                                        // Fermeture du modal 
                                        // delay(10000);
                                        // $('#addDevi').modal('hide');
                                        setTimeout(function() {
                                            $('#addDevi').modal('hide');
                                        }, 500);
                                        document.getElementById('_id').value = '';
                                        document.getElementById('designation').value = '';
                                        document.getElementById('qte').value = '';
                                        document.getElementById('p_u').value = '';
                                        document.getElementById('unite').value = '';
                                        document.getElementById('infodevis').value = '';
                                    }else{
                                        document.getElementById("infodevis").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    }
                                }
                                else{
                                    document.getElementById("infodevis").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                                }
                            } catch (error) {
                                document.getElementById("infodevis").innerHTML = error;
                            } 
                        }
                    }
    </script>
@endsection
