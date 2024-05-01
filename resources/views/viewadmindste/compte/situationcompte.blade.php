@extends('templatedste._temp')

@section('css')
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Trésorerie > Situation des comptes
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des comptes
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Comptes</th>
                                        <th data-priority="1">Type Comptes</th>
                                        <th data-priority="1">Solde courant (CFA)</th>
                                        <th data-priority="1">Solde disponible (CFA)</th>
                                        <th data-priority="1">Numéro Compte</th>
                                        <th data-priority="1">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $serv)
                                        <tr>
                                            <td>{{ $serv->compte }}</td>
                                            <td>{{ $serv->typecompte }}</td>
                                            <td>{{ number_format($serv->soldecourant, 0, '.', ' ') }}</td>
                                            <td>{{ number_format($serv->soldedisponible, 0, '.', ' ') }}</td>
                                            <td>{{ $serv->numcompte }}</td>
                                            <td>
                                                <button type="button" title="Détail"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="{{ route('GDSC', $serv->id) }}" style="color:white;"> <i class="material-icons">apps</i></a> 
                                                </button>

                                                @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getupdate({{$serv}})" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                @endif

                                                @if( $serv->soldedisponible == 0 && in_array("delete_service", session("auto_action")))
                                                <button onclick="getdelete({{$serv}})"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6"><center>Pas de compte enregistrer!!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Créer un compte : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Libellé : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="typec">Type compte : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="typec" name="typec" class="form-control" placeholder="">
                                    <option> Bancaire </option>
                                    <option> Caisse </option>
                                    <option> Virtuel </option>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="soldedisponible">Solde disponible : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="soldedisponible" name="soldedisponible" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="soldecourant">Solde courant : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="soldecourant" name="soldecourant" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="numcompte">Numéro de compte : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="numcompte" name="numcompte" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="validelb()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modification d'une ligne budgétaire : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="idupdate" name="idupdate" />
                    <label id="infoupdate"></label>
                    
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib_u">Libellé : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib_u" name="lib_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="typec_u">Type compte : </label>
                           <div class="form-group">
                            <div class="form-line" id="seetype">
                                <select type="text" id="typec_u" name="typec_u" class="form-control" placeholder="">
                                    <option> Bancaire </option>
                                    <option> Caisse </option>
                                    <option> Virtuel </option>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="soldedisponible_u">Solde disponible : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="soldedisponible_u" name="soldedisponible_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="soldecourant_u">Solde courant : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="soldecourant_u" name="soldecourant_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="numcompte_u">Numéro de compte : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="numcompte_u" name="numcompte_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="valideupdate()" id="modif" class="btn bg-deep-orange waves-effect">MODIFIER</button>
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
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    
                    <div class="row clearfix">
                        <input type="hidden" id="code_d" name="code_d" class="form-control" placeholder="">
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

    <script type="text/javascript">

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                lib = document.getElementById("lib").value;
                typec = document.getElementById("typec").value;
                soldedisponible = document.getElementById("soldedisponible").value;
                soldecourant = document.getElementById("soldecourant").value;
                numcompte = document.getElementById("numcompte").value;
                
                if(token == "" || lib == "" || soldedisponible == "" || soldecourant == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(lib == "")
                        error += ". Le champ Libellé ne peut pas être vide <br>";
                    if(soldedisponible == "")
                        error += ". Le champ Solde ne peut pas être vide <br>";
                    if(soldecourant == "")
                        error += ". Le champ Solde courant ne peut pas être vide <br>";
                    
                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    dat = {
                        _token: token, scsoldecourant: soldecourant, scnumcompte: numcompte, scsoldedisponible: soldedisponible, sctypec: typec, sclib: lib,
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('SAC')}}",
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
                                data = await response.text();

                                reponse = JSON.parse(data);

                                if(reponse.status == 0)
                                {
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×-</button><strong>'+reponse.messages+'</strong></div>';
                                    
                                    setTimeout(function(){
                                        window.location.href = "{{route('GSDC')}}";
                                    }, 3000);

                                }else{
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoadd").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoadd").innerHTML = error;
                        } 
                }
        }

        async function getupdate(data){
            document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de <i style='color:#0F056B'> "+data.compte+" </i> ? <br>";
            document.getElementById('lib_u').value = data.compte;
            document.getElementById('soldedisponible_u').value = data.soldedisponible;
            document.getElementById('soldecourant_u').value = data.soldecourant; 
            document.getElementById('numcompte_u').value = data.numcompte;
            document.getElementById('seetype').innerHTML = '<select type="text" id="typec_u" name="typec_u" class="form-control" placeholder=""> <option> '+data.typecompte+' </option> <option> Bancaire </option><option> Caisse </option><option> Virtuel </option></select>'; 
        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                lib = document.getElementById("lib_u").value;
                typec = document.getElementById("typec_u").value;
                soldedisponible = document.getElementById("soldedisponible_u").value;
                soldecourant = document.getElementById("soldecourant_u").value;
                numcompte = document.getElementById("numcompte_u").value;
                
                if(token == "" || lib == "" || soldedisponible == "" || soldecourant == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(lib == "")
                        error += ". Le champ Libellé ne peut pas être vide <br>";
                    if(soldedisponible == "")
                        error += ". Le champ Solde ne peut pas être vide <br>";
                    if(soldecourant == "")
                        error += ". Le champ Solde courant ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                   dat = {
                        _token: token, scsoldecourant: soldecourant, scnumcompte: numcompte, scsoldedisponible: soldedisponible, sctypec: typec, sclib: lib,
                    };

                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('SAC')}}",
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
                                data = await response.text();

                                reponse = JSON.parse(data);

                                if(reponse.status == 0)
                                {
                                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    setTimeout(function(){
                                        window.location.href = "{{route('GSDC')}}";
                                    }, 3000);
                                }else{
                                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoupdate").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoupdate").innerHTML = error;
                        } 
                }
        }

        async function getdelete(data){
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+data.compte+" </i> ?";
            document.getElementById('code_d').value = data.id;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("code_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('DSC')}}",
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
                                data = await response.text();
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                setTimeout(function(){
                                        window.location.href = "{{route('GSDC')}}";
                                    }, 3000);
                            }
                            else{
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodelete").innerHTML = error;
                        } 
        }

    </script>

@endsection