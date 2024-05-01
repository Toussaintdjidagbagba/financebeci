@extends('templatedste._temp')
@section('css')

<!-- Bootstrap Select Css -->
<link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection
@section('content')

<div class="container-fluid">
	<div class="block-header">
		@include('flash-message')
		<h2>
			Entreprises
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier un entreprise 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="{{ route('SSL') }}" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" name="id" value="{{ $info->id }}" />
							<div class="row clearfix">

								<div class="col-sm-6">
									<label for="libelle">Libelle : </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="libelle" class="form-control" value="{{ $info->libelle }}" name="libelle" >
										</div>
									</div>			
								</div>
								<div class="col-sm-6">
									<label for="imma">Immatriculation : </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="imma" class="form-control" value="{{ $info->imma }}" name="imma" >
										</div>
									</div>			
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-md-6">
			                        <label for="struc">Structure : </label> 
			                       <div class="form-group">
			                        <div class="form-line">
			                            <select type="text" id="struc" name="struc" onchange="seedirection()" class="form-control" placeholder="">
			                                <option>DIRECTION</option>
			                                <option>SERVICE</option>
			                            </select>
			                        </div>
			                       </div>
			                    </div>
			                    <div class="col-md-6">
			                        <label for="chef">Chef : </label> 
			                       <div class="form-group">
			                        <div class="form-line">
			                            <select type="text" id="chef" name="chef" class="form-control" placeholder="">
			                                @php 
			                                    $users = App\Providers\InterfaceServiceProvider::allutilisateurspersonnel();
			                                @endphp 
			                                <option value="{{ $info->chef }}">{{ App\Providers\InterfaceServiceProvider::LibelleUser($info->chef) }}</option>
			                                @foreach($users as $user)
			                                    <option value="{{$user->idUser}}">{{$user->nom}} {{$user->prenom}}</option>
			                                @endforeach
			                            </select>
			                        </div>
			                       </div>
			                    </div>
			                </div>
			                <div class="row clearfix" id="controledirect" style="display: none;">
		                        <div class="col-md-6">
		                            <label for="direct">Hieararchie direction : </label> 
		                           <div class="form-group">
		                            <div class="form-line">
		                                <select type="text" id="direct" name="direct" class="form-control" placeholder="">
		                                    @php 
		                                        $structure = App\Providers\InterfaceServiceProvider::alldirections();
		                                    @endphp 
		                                    @foreach($structure as $structurehierarchie)
		                                        <option value="{{$structurehierarchie->id}}">{{$structurehierarchie->libelle}}</option>
		                                    @endforeach
		                                </select>
		                            </div>
		                           </div>
		                        </div>
		                    </div>

							<div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">Mettre à jour
									</button>
								</div>
							</div>
						</form>	
					</div>

				</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
        function seedirection() {
            structure = document.getElementById("struc").value;

            if(structure == "SERVICE")
            {
                document.getElementById('controledirect').style.display = "block";
            }else{
                document.getElementById('controledirect').style.display = "none";
            }
        }
    </script>
@endsection

@section("js")
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
@endsection