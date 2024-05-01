@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                @include('flash::message')
                <h2>
                    Paramètre
                    <small></small>
                </h2>
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Partenaire
                            
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
                                        <th data-priority="1">Numéro</th>
                                        <th data-priority="1">Nom</th>
                                        <th data-priority="1">Adresse</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $i = 1;
                                        @endphp
                                        @forelse($list as $serv)
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;">{{ $i }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->nom }}</td>
                                            <td style="vertical-align:middle; text-align: center;">{{ $serv->adresse }}</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                @if(in_array("update_service", session("auto_action")))
                                                <button onclick="getupdate({{$serv}})" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                @endif

                                                @if(in_array("delete_service", session("auto_action")))
                                                <button onclick="getdelete({{$serv}})"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                @endif
                                                @php 
                                                    $i += 1;
                                                @endphp
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4"><center>Pas de partenaire enregistrer !!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrement : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="nom">Nom : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="">
                                    
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="adresse">Adresse : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="adresse" name="adresse" class="form-control" placeholder="">
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
                <h4 class="modal-title" id="myModalLabel">Modification : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="nom_u">Nom : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nom_u" name="nom_u" class="form-control" placeholder="">
                                    
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="adresse_u">Adresse : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="adresse_u" name="adresse_u" class="form-control" placeholder="">
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
                <h4 class="modal-title" id="myModalLabel">Suppression : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    
                    <div class="row clearfix">
                        <input type="hidden" id="id_d" name="id_d" class="form-control" placeholder="">
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
                        <div class="col-md-12">
                            <label for="data">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="data" name="data" class="form-control" placeholder="">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-12">
                                <label for="dlesc">Télécharger le fichier exemplaire :</label>
                               <div class="form-group">
                                <br>
                                    <a href="public/Exemplaire_partenaire.xlsx"> Exemplaire_partenaire.xlsx </a>
                                
                               </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button id="modif" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                nom = document.getElementById("nom").value;
                adresse = document.getElementById("adresse").value;
                
                if((token == "" || nom == "" || adresse == "")) {
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(nom == "")
                        error += ". Le champ Nom ne peut pas être vide <br>";
                    if(adresse == "")
                        error += ". Le champ Adresse ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, p_nom: nom, p_adresse: adresse
                    };

                            document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                            // En cours d'envoie
                            try {
                                let response = await fetch("{{route('APTN')}}",
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
                                        setTimeout(function(){
                                            window.location.href = "{{route('GPTN')}}";
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
            document.getElementById('nom_u').value = data.nom;
            document.getElementById('adresse_u').value = data.adresse;
        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                nom = document.getElementById("nom_u").value;
                adresse = document.getElementById("adresse_u").value;       
            
                if((token == "" || nom == "" || adresse == "")) {
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(nom == "")
                        error += ". Le champ Nom ne peut pas être vide <br>";
                    if(adresse == "")
                        error += ". Le champ Adresse ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, p_nom: nom, p_adresse: adresse
                    };

                            document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                            // En cours d'envoie
                            try {
                                let response = await fetch("{{route('APTN')}}",
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
                                            window.location.href = "{{route('GPTN')}}";
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
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+data.nom+"</i> ?";
            document.getElementById('id_d').value = data.id;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("id_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('DPTN')}}",
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
                                        window.location.href = "{{route('GPTN')}}";
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