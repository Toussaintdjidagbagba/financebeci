@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Trésorerie > Créances
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des créances
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Référence facture</th>
                                        <th data-priority="1">Date dépôt</th>
                                        <th data-priority="1">Bénéficiaire</th>
                                        <th data-priority="1">Objet</th>
                                        <th data-priority="1">Total TTC</th>
                                        <th data-priority="1">Projet</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>001</td>
                                            <td>11/02/2023</td>
                                            <td>M.E.S.R.C.S.</td>
                                            <td>Construition</td>
                                            <td>1.xxx.xxx cfa</td>
                                            <td>Projet 1</td>
                                            <td> 
                                                <button type="button" title="Répartition"  class="btn btn-primary btn-circle btn-xs waves-effect waves-light margin-bottom-10" data-toggle="modal" data-target="#rep">
                                                     <i class="material-icons">fullscreen_exit</i> 
                                                </button>
                                                <button type="button" title="Payement"  class="btn btn-primary btn-circle btn-xs waves-effect waves-light margin-bottom-10" data-toggle="modal" data-target="#pay">
                                                     <i class="material-icons">add_shopping_cart</i> 
                                                </button>
                                                <button type="button" title="Emprunt"  class="btn btn-primary btn-circle btn-xs waves-effect waves-light margin-bottom-10" data-toggle="modal" data-target="#emp">
                                                     <i class="material-icons">monetization_on</i> 
                                                </button>
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>

                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                                
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
                <h4 class="modal-title" id="myModalLabel">Effectuer un paiement : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Date de dépôt : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                          <div class="col-md-6">
                            <label for="lib">Projet : </label>
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
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Commentaire : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Total HT : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Total TVA : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Total TTC : </label>
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

<div class="modal fade" id="rep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Répartition : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Projet (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="65" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                          <div class="col-md-6">
                            <label for="lib">Sous compte fonctionnement (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Sous compte social (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Sous compte investissement (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Sous compte dividente (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="5" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
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

<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Payement : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Montant payer : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                          <div class="col-md-6">
                            <label for="lib">Retenue : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Libellé retenue : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                    <option value="F">TVA</option>
                                    <option value="M">AIB</option>
                                    <option value="M">Redevance métiorologique et climatologique</option>
                                    <option value="M">Remboursement avance démarrage</option>
                                    <option value="M">Retenue de garantie</option> 
                                </select>
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Montant net : </label>
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
                <button type="submit" class="btn bg-deep-orange waves-effect">PAYER</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="emp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Emprunt : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Date : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                          <div class="col-md-6">
                            <label for="lib">Montant emprunt : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Date de remboursement : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <hr> 
                    <center><label> Répartition </label></center>
                    <hr> 
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Projet (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="65" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                          <div class="col-md-6">
                            <label for="lib">Sous compte fonctionnement (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Sous compte social (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="lib">Sous compte investissement (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="10" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Sous compte dividente (%) : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" value="5" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">ENREGISTRER</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection