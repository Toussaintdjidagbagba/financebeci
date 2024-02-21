

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Aide / Manuel d'utilisation
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2> Manuel d'utilisation
                            </h2> <br>
                            
                            <embed src="gide.pdf#toolbar=0" width="100%" height="600">
                        </div>
                        <div class="body">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/aide.blade.php ENDPATH**/ ?>