@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Comptes > Dividende
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
                                            @php $lg = App\Providers\InterfaceServiceProvider::getlg($serv->nature) @endphp
                                            <td style="vertical-align:middle; text-align: center;">{{ $lg->code }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $lg->description }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->montant, 0, '.', ' ')  }}</td> 
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->realisation, 0, '.', ' ') }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ (($serv->realisation / $serv->montant) * 100)  }} %</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                               @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getdetail({{$serv}}, '{{ $lg->description }}', '{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc) }}')" type="button" title="Modifier" data-toggle="modal" data-target="#detail" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">visibility</i> 
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

        
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Détail d'une ligne budgétaire : </h4>
            </div>
            <div class="modal-body">
                <label id="seenature_detail"></label> <br>
                <label id="seenature_mode"></label> <br>
                <label id="seenature_periode"></label> <br>
                <label id="seenature_realisation"></label> <br>
                <label id="seenature_taux"></label> <br>
                <label id="seemonttotaux_detail"></label>
                    <div class="row clearfix" style="border: 2px solid antiquewhite;">
                        <div class="col-md-12">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Mois</th>
                                            <th data-priority="1">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenumontant_detail">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
            </div>
        </div>
    </div>
</div>

        <script type="text/javascript">
           async function getdetail(data, name, lib){
            document.getElementById("seenature_detail").innerHTML = "Nature de dépense : "+name;
            document.getElementById("seenature_mode").innerHTML = "Mode : "+lib;
            document.getElementById("seenature_periode").innerHTML = "Période : "+data.periode;
            document.getElementById("seenature_realisation").innerHTML = "Réalisation : "+new Intl.NumberFormat('fr-FR').format(data.realisation)+" F CFA";
            document.getElementById("seenature_taux").innerHTML = "Taux de réalisation : "+(data.realisation / data.montant)+" %";
            document.getElementById("seemonttotaux_detail").innerHTML = "Montant total : "+new Intl.NumberFormat('fr-FR').format(data.montant)+" F CFA";
            datadetail = JSON.parse(data.detailbudget);
            document.getElementById("contenumontant_detail").innerHTML = "";
            datadetail.forEach(function(item, index, arr) {
                    let list = document.getElementById("contenumontant_detail");
                    let line = list.insertRow(-1); 
                    line.setAttribute('data-id', item["id"]);

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1; 
                    line.insertCell(1).innerHTML = item["mois"];
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(item["montant"]);
            });

        }
        </script>


@endsection
