@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Facture
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des factures en attente de validation
                                <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">VALIDER</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Numéro</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Date règlement</th>
                                        <th data-priority="1">Ligne budgétaire</th>
                                        <th data-priority="1">Sous compte</th>
                                        <th data-priority="1">Projet</th>
                                        <th data-priority="1">
                                            <input type="checkbox" id="epp" name="medi" value="epp" class="filled-in chk-col-brown" />
                                    <label for="epp">Tout  </label></th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-priority="1">1</td>
                                            <td data-priority="1">1 000 000</td>
                                            <td data-priority="1">10-10-2023</td>
                                            <td data-priority="1">AC</td>
                                            <td data-priority="1">Fonctionnement</td>
                                            <td data-priority="1">Projet 1</td>
                                            <td data-priority="1"><input type="checkbox" id="eppp" name="medi" value="eppp" class="filled-in chk-col-brown" /> <label for="eppp"> Facture N°1   </label>
                                            </td>
                                            <td>
                                                @if(in_array("update_service", session("auto_action")))
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="#" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>
                                                @endif

                                            </td>
                                        </tr>
                                        
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
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Validation : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                        <div class="col-md-12">
                           <label for="lib">Voulez vous vraiment valider les factures sélectionner ? </label>
                           
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">VALIDER</button>
            </div>
            </form>
        </div>
    </div>
    </div>

@endsection