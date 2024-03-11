@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                @include('flash::message')
                <h2>
                    Budget
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des lignes budgétaire
                            
                            <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> note_add </i> </button>
                            <button type="button" title="Importer" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#imp"><i class="material-icons"> cloud_upload </i> </butt0on>
                            <button type="button" title="Exporter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#exp"><i class="material-icons">picture_as_pdf</i> </butt0on>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Code</th>
                                        <th data-priority="1">Description</th>
                                        <th data-priority="1">Quantité</th>
                                        <th data-priority="1">Montant Alloué</th>
                                        <th data-priority="1">Montant Utilisé</th>
                                        <th data-priority="1">Sous compte</th>
                                        <th data-priority="1">Commentaire</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $serv)
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->code }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->description }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->quantite, 0, '.', ' ')  }}</td> 
                                            <td style="vertical-align:middle; text-align: center;">{{ number_format($serv->montantalloue, 0, '.', ' ') }}</td>
                                            <td style="vertical-align:middle; text-align: center;"> {{ number_format($serv->montantutilise, 0, '.', ' ')  }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte) }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->commentaire }}</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getupdate({{$serv}}, '{{ App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte) }}')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
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
                                            <td colspan="8"><center>Pas de ligne budgétaire préalablement enregistrer!!!</center> </td>
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

@endsection

@section("model")

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer une ligne : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                        
                        <div class="col-md-6">
                            <label for="code">Code : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="code" name="code" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dlesc">Description :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="dlesc" name="dlesc" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="quantite">Quantité : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="quantite" name="quantite" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="commentaire">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire" name="commentaire" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="controledirect">
                        <div class="col-md-6">
                            <label for="montantal">Montant alloué : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="montantal" name="montantal" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sc">Sous compte : </label> 
                            <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="sc" name="sc" class="form-control" placeholder="">
                                    @php 
                                        $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                    @endphp 
                                    @foreach($comptes as $sc)
                                        <option value="{{$sc->id}}">{{$sc->compte}}</option>
                                    @endforeach
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="validelb()" id="modif" class="btn bg-deep-orange waves-effect">AJOUTER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier une ligne : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        
                        <div class="col-md-6">
                            <label for="code_u">Code : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" id="code_u" name="code_u" class="form-control" placeholder="">
                                <input type="text" id="seecode_u" name="code_u" disabled class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dlesc_u">Description :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="dlesc_u" name="dlesc_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="quantite_u">Quantité : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="quantite_u" name="quantite_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="commentaire_u">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire_u" name="commentaire_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="controledirect">
                        <div class="col-md-6">
                            <label for="montantal_u">Montant alloué : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="montantal_u" name="montantal_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6" >
                            <label for="sc_u">Sous compte : </label> 
                           <div class="form-group">
                            <div class="form-line" id="see_u">
                                <select type="text" id="sc_u" name="sc_u" class="form-control" placeholder="">
                                    @php 
                                        $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                    @endphp 
                                    @foreach($comptes as $sc)
                                        <option value="{{$sc->id}}">{{$sc->compte}}</option>
                                    @endforeach
                                </select>
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

<div class="modal fade" id="imp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Importer : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="data">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="data" name="data" class="form-control" placeholder="">
                                </div>
                               </div>
                        </div>
                        <div class="col-md-6">
                            <label for="data">Sous-compte : </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="isc" name="isc" class="form-control" placeholder="">
                                        @php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        @endphp 
                                        @foreach($comptes as $sc)
                                            <option value="{{$sc->id}}">{{$sc->compte}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="dlesc">Télécharger le fichier exemplaire :</label>
                               <div class="form-group">
                                <br>
                                <a href="Exemplaire_ligne_budgetaire.xlsx"> Exemplaire_ligne_budgétaire.xlsx </a>
                            
                               </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button id="imp" onclick="valideimp()" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                code = document.getElementById("code").value;
                dlesc = document.getElementById("dlesc").value;
                quantite = document.getElementById("quantite").value;
                commentaire = document.getElementById("commentaire").value;
                montantal = document.getElementById("montantal").value;
                sc = document.getElementById("sc").value;
                
            
                if(token == "" || code == "" || dlesc == "" || quantite == "" || montantal == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(code == "")
                        error += ". Le champ Code ne peut pas être vide <br>";
                    if(dlesc == "")
                        error += ". Le champ Description ne peut pas être vide <br>";
                    if(quantite == "")
                        error += ". Le champ Quantité ne peut pas être vide <br>";
                    if(montantal == "")
                        error += ". Le champ Montant alloué ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, lbcode: code, lbdlesc: dlesc, lbquantite: quantite, lbcommentaire: commentaire, lbmontantal: montantal, lbsc: sc,
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('ALBGT')}}",
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
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    //getlistAntecedent();
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

        async function getupdate(data, name){
            document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code_u').value = data.code;
            document.getElementById('seecode_u').value = data.code; 
            document.getElementById('dlesc_u').value = data.description;
            document.getElementById('quantite_u').value = data.quantite;
            document.getElementById('commentaire_u').value = data.commentaire;
            document.getElementById('montantal_u').value = data.montantalloue;
            document.getElementById('see_u').innerHTML = '<select type="text" id="sc_u" name="sc_u" class="form-control" placeholder=""> <option value="'+data.souscompte+'">'+name+'</option> @php $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes(); @endphp @foreach($comptes as $sc) <option value="{{$sc->id}}">{{$sc->compte}}</option> @endforeach </select>';
        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                code = document.getElementById("code_u").value;
                dlesc = document.getElementById("dlesc_u").value;
                quantite = document.getElementById("quantite_u").value;
                commentaire = document.getElementById("commentaire_u").value;
                montantal = document.getElementById("montantal_u").value;
                sc = document.getElementById("sc_u").value;
                
            
                if(token == "" || code == "" || dlesc == "" || quantite == "" || montantal == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(code == "")
                        error += ". Le champ Code ne peut pas être vide <br>";
                    if(dlesc == "")
                        error += ". Le champ Description ne peut pas être vide <br>";
                    if(quantite == "")
                        error += ". Le champ Quantité ne peut pas être vide <br>";
                    if(montantal == "")
                        error += ". Le champ Montant alloué ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, lbcode: code, lbdlesc: dlesc, lbquantite: quantite, lbcommentaire: commentaire, lbmontantal: montantal, lbsc: sc,
                    };

                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('ALBGT')}}",
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
                                    //getlistAntecedent();
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
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code_d').value = data.code;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("code_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('DLBGT')}}",
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
                            }
                            else{
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodelete").innerHTML = error;
                        } 
        }

        async function valideimp(){
            // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                data = document.getElementById("data").value;
                isc = document.getElementById("isc").value;
                
            
                if(token == "" || isc == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(code == "")
                        error += ". Le champ Code ne peut pas être vide <br>";
                    if(dlesc == "")
                        error += ". Le champ Description ne peut pas être vide <br>";
                    if(quantite == "")
                        error += ". Le champ Quantité ne peut pas être vide <br>";
                    if(montantal == "")
                        error += ". Le champ Montant alloué ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, lbcode: code, lbdlesc: dlesc, lbquantite: quantite, lbcommentaire: commentaire, lbmontantal: montantal, lbsc: sc,
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('ALBGT')}}",
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
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    //getlistAntecedent();
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
    </script>

@endsection