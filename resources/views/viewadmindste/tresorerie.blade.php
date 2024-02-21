@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Gestion de la trésorerie
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des opérations effectuées
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Numéro</th>
                                        <th data-priority="1">Opération</th>
                                        <th data-priority="1">Bénéficiaire</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Ligne budgetaire</th>
                                        <th data-priority="1">Projet</th>
                                        <th data-priority="1">Date de l'opération</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $serv)
                                        <tr>
                                            <td>
                                                {{$serv->libelle}}
                                            </td>
                                            <td>
                                                {{$serv->imma}}
                                            </td>
                                            <td>
                                                @if(in_array("update_service", session("auto_action")))
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="{{ route('MSC', $serv->id) }}" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>
                                                @endif

                                                @if(in_array("delete_service", session("auto_action")))
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="{{ route('DS', $serv->id) }}" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                                @endif

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8"><center>Pas d'opération enregistrer!!!</center> </td>
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
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Effectur un paiement : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Opération : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Bénéficiaire : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        
                    
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Numéro de compte : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Montant : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        
                    </div>

                    <div class="row clearfix">
                              <div class="col-md-6">
                                    <label for="sexe">Mode de paiement : </label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">Caisse</option>
                                            <option value="M">Banque</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <label for="imma">Date de l'opération :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                    <label for="sexe">Ligne budgetaire</label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">ADC</option>
                                            <option value="M">ACM</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                    <label for="sexe">Sous-compte</label>
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
                    </div>
                            
                    </div>

                    <div class="row clearfix">
                
                        <div class="col-md-6">
                                    <label for="sexe">Projet</label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">Projet 1</option>
                                            <option value="M">Projet 2</option> 
                                        </select>
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