@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Comptes > Projet
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
                                        <th data-priority="1">Code</th>
                                        <th data-priority="1">Nature de dépense</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Réalisation</th>
                                        <th data-priority="1">Taux</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $serv)
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->periode }}</td>
                                            @php $lg = App\Providers\InterfaceServiceProvider::getlg($serv->lignebudgetaire) @endphp
                                            <td style="vertical-align:middle; text-align: center;">{{ $lg->code }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $lg->description }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->montant, 0, '.', ' ')  }}</td> 
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->realisation, 0, '.', ' ') }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ ($serv->realisation / $serv->montant)  }} %</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getupdate({{$serv}}, '{{ $lg->description }}', '{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc) }}')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                @endif

                                                @if( $serv->realisation == 0 && in_array("delete_service", session("auto_action")))
                                                <button onclick="getdelete({{$serv}}, '{{ $lg->description }}')"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
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
