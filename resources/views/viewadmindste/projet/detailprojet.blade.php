@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style type="text/css">
        
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
                                <li role="presentation"><a href="#devis" data-toggle="tab">Devis</a></li>
                                <li role="presentation"><a href="#bplan" data-toggle="tab">Bussness plan</a></li>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                
                                                    <div class="header">
                                                        <h2>
                                                    <div class="text-primary font-bold font-15">
                                                        Dévis
                                                    </div>
                                                    <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addDevi"><i class="material-icons"> note_add </i> </button>
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
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Récapitulatif
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

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

                                                <div class="row clearfix">
                                                    <!-- Etat d'évolution du plan de trésorerie -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="">
                                                            <div class="body">
                                                                <div class="table-responsive" data-pattern="priority-columns">
                                                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th data-priority="1">Mois</th>
                                                                            <th data-priority="1">Solde début</th>
                                                                            <th data-priority="1">Janvier</th>
                                                                            <th data-priority="1">Février</th>
                                                                            <th data-priority="1">Mars</th>
                                                                            <th data-priority="1">Avril</th>
                                                                            <th data-priority="1">Mai</th>
                                                                            <th data-priority="1">Juin</th>
                                                                            <th data-priority="1">Juillet</th>
                                                                            <th data-priority="1">Août</th>
                                                                            <th data-priority="1">Septembre</th>
                                                                            <th data-priority="1">Octobre</th>
                                                                            <th data-priority="1">Novembre</th>
                                                                            <th data-priority="6">Décembre</th>
                                                                            <th data-priority="6">Total</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Total Encaissement</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Total Décaissement</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Différence</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Trésorerie nette</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div> 
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <!-- Encaissement -->
                                                <div class="row clearfix">
                                                    <div class="col-md-6">
                                                        <div class="text-primary font-bold font-15">
                                                            Encaissement
                                                        </div>
                                                        <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#"><i class="material-icons"> add </i> </button>
                                                        <div class="table-responsive" data-pattern="priority-columns">
                                                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th data-priority="1">#</th>
                                                                    <th data-priority="1">Désignation</th>
                                                                    <th data-priority="1">Montant</th>
                                                                    <th data-priority="1">Statut</th>
                                                                    <th data-priority="1">Actions</th> 
                                                                    <!-- Dans nous aurons : Visualiser, modifier et suppression 
                                                                        
                                                                    -->
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listpdtencaissement">
                                                                    <!-- -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                

                                                <!-- Décaissement -->
                                                    <div class="col-md-6">
                                                        <div class="text-primary font-bold font-15">
                                                            Décaissement
                                                        </div>
                                                        <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#"><i class="material-icons"> add </i> </button>

                                                        <div class="table-responsive" data-pattern="priority-columns">
                                                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th data-priority="1">#</th>
                                                                    <th data-priority="1">Désignation</th>
                                                                    <th data-priority="1">Montant</th>
                                                                    <th data-priority="1">Statut</th>
                                                                    <th data-priority="1">Actions</th> 
                                                                    <!-- Dans nous aurons : Visualiser, modifier et suppression 
                                                                        NB : 
                                                                            - Décaissement est générer depuis business plan et sera disponible déjà dans la liste pour édition du pair mois et valeur
                                                                            - Prévoir Solde début comme mois dans la liste de mois
                                                                            - Avec la possibilité d'ajouter d'autre encaissemnt  
                                                                            - Le bouton suppression est disponible uniquement pour les ajouts manuel
                                                                    -->
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listpdtdecaissement">
                                                                    <!-- -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                                        
                                                        

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
    <div class="modal fade" id="addDevi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div id="infodevis"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
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

{{-- Plan de trésorerie --}}


{{-- End Plan de trésorerie --}}

<script type="text/javascript">
        const id = "{{ $info->id }}";
        const urlbplan = "{{ route('GBPP', ['id' => "+id+" ]) }}";

        getlistDevis();

            // Recuperation et affichage des devis
            async function getlistDevis() {
                try {
                    let response = await fetch("{{ route('GDP') }}?id="+id,
                    {
                        method: 'get',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    }); 

                    

                    if (response.status == 200) {

                        // Récupérer les données JSON de la réponse
                        data = await response.text();

                        //console.log(await response.text());

                        reponse = JSON.parse(data);

                        devisList = reponse.devis;

                        let rowsHTML = '';

                        let i = 1;

                        devisList.forEach(devis => {
                            let newRow = '<tr>';
                            newRow += '<td>' + i + '</td>';
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
                            i++;
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


    </script>

@endsection