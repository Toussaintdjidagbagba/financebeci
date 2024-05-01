<table>
    <thead>
    <tr>
        <th colspan="18" style="vertical-align:middle; text-align: center; size: 20px;">Budget général du mode <?php echo e($mode); ?></th>
    </tr>
    <tr>
        <th colspan="2" style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px;">PERIODE : </th>
        <th colspan="2" style="vertical-align:middle; text-align: left; background-color: black; color: white; size: 16px;"> <?php echo e($periode); ?> </th>
    </tr>
    <tr>
    </tr>
    <tr>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">CODE : </th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">NATURE DE DEPENSE</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">MONTANT</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">REALISATION</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">TAUX</th>
        <th></th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">JANVIER</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">FEVRIER</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">MARS</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">AVRIL</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">MAI</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">JUIN</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">JUILLET</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">AOUT</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">SEPTEMBRE</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">OCTOBRE</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">NOVEMBRE</th>
        <th style="vertical-align:middle; text-align: center; background-color: black; color: white; size: 14px;">DECEMBRE</th>
    </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $lg = App\Providers\InterfaceServiceProvider::getlg($serv->nature) ?>
            <tr>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e($lg->code); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 200px;"> <?php echo e($lg->description); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format($serv->montant, 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format($serv->realisation, 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(($serv->realisation / $serv->montant) * 100); ?>%</td>
                <td style="vertical-align:middle; text-align: center;"> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Janvier"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Fevrier"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Mars"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Avril"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Mai"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Juin"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Juiller"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Aout"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Septembre"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Octobre"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Novembre"), 0, '.', ' ')); ?> </td>
                <td style="vertical-align:middle; text-align: center; width: 100px;"> <?php echo e(number_format(App\Providers\InterfaceServiceProvider::getmontantmois( $serv->detailbudget , "Decembre"), 0, '.', ' ')); ?> </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                
            </tr>
        <?php endif; ?>
    </tbody>
</table><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/export/expbudget.blade.php ENDPATH**/ ?>