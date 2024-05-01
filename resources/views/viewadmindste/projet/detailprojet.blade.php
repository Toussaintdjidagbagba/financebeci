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
                                                    <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> note_add </i> </button>
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
                                                        <tbody id="listdevis">
                                                            @forelse($listdevis as $serv)
                                                            <tr>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->id }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->designation }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->unite }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->quantite }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->unitaire }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">{{ $serv->quantite * $serv->unitaire }}</td>
                                                                <td style="vertical-align:middle; text-align: center;">
                                                                    @if(in_array("update_service", session("auto_action")))
                                                                    <button onclick="getupdate({{$serv}}, '{{$serv->designation}}')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                                         <i class="material-icons">system_update_alt</i> 
                                                                    </button>
                                                                    @endif

                                                                    @if(in_array("delete_service", session("auto_action")))
                                                                    <button onclick="getdelete({{$serv}})"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                                    </button>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="7"><center>Pas de ligne devis enregistrer!!!</center> </td>
                                                            </tr>
                                                            @endforelse
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
                                                <div class="text-primary font-bold font-15">
                                                    Bussness plan
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

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

        <script type="text/javascript">

            function getlistdevis() {
                // Affichage des devis
            }
           
        </script>

@endsection

@section("model")
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Désignation : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                            <label for="lib">Quantité : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="sexe">Unité</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">Fonctionnement</option>
                                            <option value="M">Social</option>
                                            <option value="M">Investissement</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="lib">Prix unitaire : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
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

@endsection