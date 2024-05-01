@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style type="text/css">
        .headerprojet{
            color: #555;
            min-height: 250px;
            position: relative;
            border-bottom: 1px solid rgba(204, 204, 204, 0.35);
        }
        #nameprojet{
            background-color: #868386;
            min-height: 250px;
        }
        .containerprojet{
            border-radius: 40%;
            padding: 10px;
            min-height: 150px;
            white-space: pre-line;
            position: relative;
            
            vertical-align: bottom !important;
        }
        #objetprojet{
            background-color: #E3E6E5;
            border-color: lightblue;
            border: 1px dashed #e9e9e9;
            min-height: 125px;
            align-content: center;
        }
        #tituprojet{
            background-color: #E3E6E5;
            max-height: 150px;
            min-height: 125px;
            align-content: center;
            border: 1px dashed #e9e9e9;
            border-color: lightblue;
        }
        .containerobjet{
            border-radius: 10%;
            border-color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 5px;
            padding: 0px 10px 10px 10px;
            white-space: pre-line;
            position: relative;
            border-top: 1px solid #e9e9e9;
            vertical-align: top !important;
        }
        .tituobjet{
            border-radius: 10%;
            border-color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 5px;
            padding: 0px 10px 10px 10px;
            white-space: pre-line;
            position: relative;
            border-top: 1px solid #e9e9e9;
            vertical-align: top !important;
            align-content: center;
            float: none;
        }
        #descprojet{
            padding: 0px;
            border: 1px dashed #e9e9e9;
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
                        <div class="headerprojet">
                            <div class="col-lg-2" id="nameprojet">
                                <div class="containerprojet">
                                    <center><label>Titre du projet :</label></center>
                                </div>
                            </div>
                            <div class="col-lg-10" id="descprojet">
                                <div class="col-lg-6" id="objetprojet">
                                    <div class="containerobjet">
                                        <center><label>Objet :</label></center> <br>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6" id="tituprojet">
                                    <div class="tituobjet">
                                        <center><label>Porteur du projet :</label></center><br>
                                        BECI BTP
                                    </div>
                                </div>
                                <div class="col-lg-6" id="tituprojet">
                                    <label style="margin: 5px; padding: 5px;"> Budget  : xxx.xxx.xxx CFA</label> <br>
                                    <label style="margin: 5px; padding: 5px;"> Compte :  xxx.xxx.xxx CFA</label> <br>
                                    <label style="margin: 5px; padding: 5px;"> Dépense : xxx.xxx.xxx CFA</label>
                                </div>
                                <div class="col-lg-6" id="objetprojet">
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Statistique"> 
                                        <i class="material-icons">insert_chart</i> </button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Bussiness plan"><i class="material-icons">business</i></button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Plan de financement"><i class="material-icons">description</i></button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Plan de décaissement"><i class="material-icons">exit_to_app</i></button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Exécution"><i class="material-icons">assignment</i> </button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Plan de trésorerie"><i class="material-icons">low_priority</i></button>
                                    
                                    <button type="button" style="margin: 10px; padding: 10px;" class="btn bg-deep-orange waves-effect" title="Niveau d'évolution"><i class="material-icons">dvr</i></button>

                                    <br> <br>
                                    <center><label>Statistique</label></center>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Libellé 1</th>
                                        <th data-priority="1">Libellé 2</th>
                                        <th data-priority="1">Libellé 3</th>
                                        <th data-priority="1">Libellé 4</th>
                                        <th data-priority="1">Libellé 5</th>
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
                                            <td colspan="7"><center>Pas de statistique disponible!!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrer une planification de projet : </h4>
            </div>
            <form method="post" action="{{route('AS')}}">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Numéro automatique : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lib">Titre du projet : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>

                        <div class="row clearfix">
                            
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
                            <div class="col-md-6">
                            <label for="lib">Taux de répartition : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                      
                        
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="imma">Date d'échéance :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="imma">Choisir un fichier :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
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