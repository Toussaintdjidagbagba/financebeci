

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Comptes > Projet
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
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->periode); ?></td>
                                            <?php $lg = App\Providers\InterfaceServiceProvider::getlg($serv->lignebudgetaire) ?>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($lg->code); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($lg->description); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->montant, 0, '.', ' ')); ?></td> 
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->realisation, 0, '.', ' ')); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(($serv->realisation / $serv->montant)); ?> %</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e($lg->description); ?>', '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if( $serv->realisation == 0 && in_array("delete_service", session("auto_action"))): ?>
                                                <button onclick="getdelete(<?php echo e($serv); ?>, '<?php echo e($lg->description); ?>')"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7"><center>Pas d'information enregistrer dans le plan de trésorerie général!!!</center> </td>
                                        </tr>
                                        <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/compte/projet.blade.php ENDPATH**/ ?>