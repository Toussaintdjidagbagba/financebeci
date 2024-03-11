@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Comptes > Fonctionnement
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Plan de trésorerie</button>
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Situation de compte</button>
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Engagement</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Année</th>
                                        <th data-priority="1">Ligne budgétaire</th>
                                        <th data-priority="1">Mois</th>
                                        <th data-priority="1">Solde début</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Type</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $serv)
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->annee }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire) }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->mois }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->soldedebut, 0, '.', ' ')  }}</td> 
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->montant, 0, '.', ' ') }}</td>
                                            <td style="vertical-align:middle; text-align: center;"> {{ $serv->type }}</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getupdate({{$serv}}, '{{ App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire) }}', '{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte) }}')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                @endif

                                                @if(in_array("delete_service", session("auto_action")))
                                                <button onclick="getdelete({{$serv}}, '{{ App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire) }}', '{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte) }}')"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                @endif

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7"><center>Pas d'information enregistrer dans le plan de trésorerie général!!!</center> </td>
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

        <script type="text/javascript">
           
        </script>

@endsection

@section("model")
@endsection