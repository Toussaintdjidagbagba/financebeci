

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Incidents
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des incidents déclarés
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button> 
                            <button onClick="javascript:window.open('<?php echo e(route("EEID")); ?>', '');" style=" float: right;margin-right: 30px;" type="button" title="EXCEL"  class="btn btn-primary btn-xs  margin-bottom-10 waves-effect waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6m1.8 18H14l-2-3.4l-2 3.4H8.2l2.9-4.5L8.2 11H10l2 3.4l2-3.4h1.8l-2.9 4.5l2.9 4.5M13 9V3.5L18.5 9H13Z"/></svg>
                            </button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>Date Emission</th>
										<th data-priority="1">Modules</th>
                                        <th data-priority="3">Hiérachisation</th>
                                        <th data-priority="3">Emetteur</th>
                                        <th data-priority="3">Modifier Etat</th>
                                        <th data-priority="3">Date de résolution</th>
                                        <th data-priority="3">Avis Emet.</th> 
                                        <th data-priority="3">Obs. Emet.</th> 
                                        <th data-priority="3">Affecter</th> 
										<th data-priority="6">Actions</th>
									</tr>
									</thead>
									<tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th><span class="co-name"><?php echo e($inc->DateEmission); ?></span></th>
                                            <td><?php echo e($inc->Module); ?></td>
                                            <td><?php echo e(App\Providers\InterfaceServiceProvider::LibelleHier($inc->hierarchie)); ?></td>
                                            
                                            <td><?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($inc->Emetteur)); ?></td>
                                            <td> <?php echo e($inc->etat); ?>

                                                <?php if(in_array("update_etat", session("auto_action"))): ?>
                                                    <a class="btn bg-deep-orange waves-effect btn-circle btn-xs identifyingeqp" style="padding-top: 10px; float: right;" id="identifyingeqpg" href="#add" data-target="#add" data-color="deep-orange" data-toggle="modal" data-id="<?php echo e($inc->id); ?>etat" title="Etat"><i class="material-icons">edit</i></a>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td><?php echo e($inc->DateResolue); ?></td>
                                            <td><?php echo e($inc->avis); ?></td>
                                            <td><?php echo e($inc->sugg); ?></td>
                                            <td> <?php echo e(App\Providers\InterfaceServiceProvider::LibelleService($inc->affecter)); ?>

                                                <?php if(in_array("affec_incie", session("auto_action"))): ?>
                                                    <a class="btn bg-deep-orange waves-effect btn-circle btn-xs sendjs" style="padding-top: 10px; float: right;" id="sendjs" href="#add" data-target="#add" data-color="deep-orange" data-toggle="modal" data-id="<?php echo e($inc->id); ?>SNEN" title="Etat"><i class="material-icons">send</i></a>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                            <?php if(in_array("update_incie", session("auto_action"))): ?>
                                            <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                <a href="<?php echo e(route('MTIA', $inc->id)); ?>" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                
                                            </button>
                                            <?php endif; ?>

                                            <?php if( $inc->etat != "Incident résolu"): ?>
                                            <?php if(in_array("delete_incie", session("auto_action"))): ?>
                                            <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(route('DIA', $inc->id)); ?>" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8"><center>Pas d'incident enregistrer!!!</center> </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
								</table>
                                <?php echo e($list->links()); ?>

							</div> 
                            <?php
                                $sers = App\Providers\InterfaceServiceProvider::AllService();
                            ?>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                            <!--script
                              type="text/javascript"
                              src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
                            ></script-->
                            <script>
                                

                                var y = document.getElementById("identifyingeqpg");
                                y.addEventListener("click", function () {
                                        
                                            var id = $(this).data('id');
                                            var div = document.getElementById('changetat');

                                            
                                            
                                            if (id != 0) {

                                                if(id.substr(-4, 4) == "etat"){
                                                    identifiant = id.slice(0, id.length - 4);
                                                    
                                                    div.innerHTML = '<div class="modal-header">'+
                                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                        '<h4 class="modal-title" id="myModalLabel">Changer d\'Etat : </h4>'+
                                                            '</div>'+
                                                            '<form method="post" action="<?php echo e(route('CEI')); ?>">'+
                                                            '<div class="modal-body">'+
                                                                   '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />'+
                                                                   '<input type="hidden" name="id" value="'+identifiant+'" />'+
                                                                    '<div class="row clearfix">'+
                                                                        '<div class="col-md-12">'+
                                                                    '<label for="etat">Etat</label>'+
                                                                    '<div class="form-group">'+
                                                                    '<div class="form-line">'+
                                                                            '<select type="text" class="form-control" name="etat" id="etat">'+
                                                                                '<option>En cours d\'analyse</option>'+
                                                                                '<option>En cours de traitement</option>'+
                                                                                '<option>Incident résolu</option>'+
                                                                            '</select>'+
                                                                        
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            
                                                        '</div>'+
                                                                
                                                        '</div>'+
                                                        '<div class="modal-footer">'+
                                                            '<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>'+
                                                            '<button type="submit" class="btn bg-deep-orange waves-effect">CHANGER</button>'+
                                                        '</div>'+
                                                        '</form>';
                                                }
                                            }
                                        
                                }, true);

                                var x = document.getElementById("sendjs");
                                x.addEventListener("click", function () {
                                        
                                            var id = $(this).data('id');
                                            var div = document.getElementById('changetat');

                                            console.log(id);
                                            
                                            if (id != 0) {

                                                if(id.substr(-4, 4) == "SNEN"){
                                                    identifiant = id.slice(0, id.length - 4);
                                                    serv = <?php echo $sers ?>;
                                                    options = "";
                                                    for(var item in serv)
                                                        options += '<option value="'+serv[item].id+'">'+serv[item].libelle+'</option>';
                                                    

                                                    div.innerHTML = '<div class="modal-header">'+
                                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                        '<h4 class="modal-title" id="myModalLabel">Affecter : </h4>'+
                                                            '</div>'+
                                                            '<form method="post" action="<?php echo e(route('AII')); ?>">'+
                                                            '<div class="modal-body">'+
                                                           '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />'+
                                                           '<input type="hidden" name="id" value="'+identifiant+'" />'+
                                                            '<div class="row clearfix">'+
                                                                '<div class="col-md-12">'+
                                                            '<label for="service">Service</label>'+
                                                            '<div class="form-group">'+
                                                            '<div class="form-line">'+
                                                                
                                                                    '<select type="text" class="form-control" name="service" id="service"> '+options+' '+
                                                                    '</select>'+
                                                                
                                                            '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                    
                                                        '</div>'+
                                                                
                                                        '</div>'+
                                                        '<div class="modal-footer">'+
                                                            '<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>'+
                                                            '<button type="submit" class="btn bg-deep-orange waves-effect">AFFECTER</button>'+
                                                        '</div>'+
                                                        '</form>';
                                                }
                                            }
                                        
                                }, true);

                                 $(function () {
                                    $("#add").on('hidden.bs.modal', function () {
                                        window.location.reload();
                                    });
                                });

                                const compare = (ids, asc) => (row1, row2) => {
                                  const tdValue = (row, ids) => row.children[ids].textContent;
                                  const tri = (v1, v2) => v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2);
                                  return tri(tdValue(asc ? row1 : row2, ids), tdValue(asc ? row2 : row1, ids));
                                };

                                const tbody = document.querySelector('tbody');
                                const thx = document.querySelectorAll('th');
                                const trxb = tbody.querySelectorAll('tr');
                                thx.forEach(th => th.addEventListener('click', () => {
                                  let classe = Array.from(trxb).sort(compare(Array.from(thx).indexOf(th), this.asc = !this.asc));
                                  classe.forEach(tr => tbody.appendChild(tr));
                                }));

                                $(function () {
                                    $(".identifyingeqp").click(function () {
                                        var id = $(this).data('id');
                                            var div = document.getElementById('changetat');

                                            
                                            
                                            if (id != 0) {

                                                if(id.substr(-4, 4) == "etat"){
                                                    identifiant = id.slice(0, id.length - 4);
                                                    
                                                    div.innerHTML = '<div class="modal-header">'+
                                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                        '<h4 class="modal-title" id="myModalLabel">Changer d\'Etat : </h4>'+
                                                            '</div>'+
                                                            '<form method="post" action="<?php echo e(route('CEI')); ?>">'+
                                                            '<div class="modal-body">'+
                                                                   '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />'+
                                                                   '<input type="hidden" name="id" value="'+identifiant+'" />'+
                                                                    '<div class="row clearfix">'+
                                                                        '<div class="col-md-12">'+
                                                                    '<label for="etat">Etat</label>'+
                                                                    '<div class="form-group">'+
                                                                    '<div class="form-line">'+
                                                                            '<select type="text" class="form-control" name="etat" id="etat">'+
                                                                                '<option>En cours d\'analyse</option>'+
                                                                                '<option>En cours de traitement</option>'+
                                                                                '<option>Incident résolu</option>'+
                                                                            '</select>'+
                                                                        
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            
                                                        '</div>'+
                                                                
                                                        '</div>'+
                                                        '<div class="modal-footer">'+
                                                            '<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>'+
                                                            '<button type="submit" class="btn bg-deep-orange waves-effect">CHANGER</button>'+
                                                        '</div>'+
                                                        '</form>';
                                                }
                                            }
                                    })
                                });

                                 $(function () {
                                    $(".sendjs").click(function () {
                                        var id = $(this).data('id');
                                            var div = document.getElementById('changetat');

                                            console.log(id);
                                            
                                            if (id != 0) {

                                                if(id.substr(-4, 4) == "SNEN"){
                                                    identifiant = id.slice(0, id.length - 4);
                                                    serv = <?php echo $sers ?>;
                                                    options = "";
                                                    for(var item in serv)
                                                        options += '<option value="'+serv[item].id+'">'+serv[item].libelle+'</option>';
                                                    

                                                    div.innerHTML = '<div class="modal-header">'+
                                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                        '<h4 class="modal-title" id="myModalLabel">Affecter : </h4>'+
                                                            '</div>'+
                                                            '<form method="post" action="<?php echo e(route('AII')); ?>">'+
                                                            '<div class="modal-body">'+
                                                           '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />'+
                                                           '<input type="hidden" name="id" value="'+identifiant+'" />'+
                                                            '<div class="row clearfix">'+
                                                                '<div class="col-md-12">'+
                                                            '<label for="service">Service</label>'+
                                                            '<div class="form-group">'+
                                                            '<div class="form-line">'+
                                                                
                                                                    '<select type="text" class="form-control" name="service" id="service"> '+options+' '+
                                                                    '</select>'+
                                                                
                                                            '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                    
                                                        '</div>'+
                                                                
                                                        '</div>'+
                                                        '<div class="modal-footer">'+
                                                            '<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>'+
                                                            '<button type="submit" class="btn bg-deep-orange waves-effect">AFFECTER</button>'+
                                                        '</div>'+
                                                        '</form>';
                                                }
                                            }
                                    })
                                });

                            </script>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="changetat">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Enregistrer un incident : </h4>
			</div>
            <form method="post" action="<?php echo e(route('GIS')); ?>" enctype="multipart/form-data">
			<div class="modal-body">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="mod">Module</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="mod" name="module" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <label for="cat">Catégorie</label>
                                <div class="form-group">
                                <?php
                                    $cats = App\Providers\InterfaceServiceProvider::AllCat();
                                ?>
                                <div class="form-line">
                                    <select type="text" id="cat" name="cat" class="form-control" required>
                                        <option></option>
                                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->libelle); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row clearfix">
                        

                        <div class="col-md-6">
                        	<label for="hiera">Hiérarchisation</label>
                           <div class="form-group">
                            <div class="form-line">
                                <?php
                                    $hies = App\Providers\InterfaceServiceProvider::AllHie();
                                ?>
                                <select type="text" id="hiera" name="hiera" class="form-control" placeholder="" required>
                                    <option></option>
                                    <?php $__currentLoopData = $hies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hie->id); ?>"><?php echo e($hie->libelle); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                                <label for="piece">Pièce jointe</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="piece" name="piece" accept=".pdf" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                                <label for="desc">Description</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" id="desc" name="desc" class="form-control"></textarea>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/gererincident/dashincident.blade.php ENDPATH**/ ?>