<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo e(config('app.name')); ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="public/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="public/cssdste/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="public/cssdste/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/cssdste/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="public/cssdste/css/style.css" rel="stylesheet">

    <link href="public/cssdste/css/themes/all-themes.css" rel="stylesheet" />

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="theme-red" style="background-image: url(public/fond.png); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;
-moz-background-size: cover; background-attachment: fixed;
-o-background-size: cover;">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Patienté...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href=""><?php echo e(config('app.name')); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">



                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info"  style="background-image : url('public/fondprofil.png'); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;
            -moz-background-size: cover; -o-background-size: cover;">
                <div class="image">
                    <img src="public/cssdste/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div style="color:#001e60" class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(session('utilisateur')->nom); ?> <?php echo e(session('utilisateur')->prenom); ?></div>
                    <div style="color:#001e60" class="email"><?php echo e(session('utilisateur')->mail); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i style="color:#001e60" class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(route('logout')); ?>"><i class="material-icons">input</i>Déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">

                            <li class="header">Principal</li>

                            <li>
                                <a href="<?php echo e(route('dashboard')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Tableau de bord</span>
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo e(route('besoins')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>
                                    Expression du besoins
                                </span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Factures</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="#">
                                        <!--a href="<?php echo e(route('GFR')); ?>"-->
                                            <span>Réception des factures</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                        <!--a href="<?php echo e(route('GFE')); ?>"-->
                                            <span>Emission des factures</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <!--a href="<?php echo e(route('GVF')); ?>"-->
                                            <span>Validations</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Comptes</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo e(route('GCF')); ?>">
                                            <span>Fonctionnement</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('GCS')); ?>">
                                            <span>Social</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('GCI')); ?>">
                                            <span>Investissement</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('GCD')); ?>">
                                            <span>Dividende</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('GCP')); ?>">
                                            <span>Projet</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Suivi</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="<?php echo e(route('GBSEG')); ?>">Etat Général</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('GBSGL')); ?>">Grand Livre</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('GBSEC')); ?>">Etat Comparatif</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Projets</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo e(route('GP')); ?>">
                                            <span>Liste des Projets</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Trésorerie</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo e(route('GSDC')); ?>">
                                            <span>Situation des comptes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('GCA')); ?>">
                                            <span>Créances</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Engagements</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="#">Sous compte Fonctionnement</a>
                                            </li>
                                            <li>
                                                <a href="#">Sous compte Social</a>
                                            </li>
                                            <li>
                                                <a href="#">Sous compte Invertissement</a>
                                            </li>
                                            <li>
                                                <a href="#">Sous compte Dividendes</a>
                                            </li>
                                            <li>
                                                <a href="#">Sous compte Projets</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GPVS')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>
                                    Plan de trésorerie Général
                                </span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GLBG')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>
                                    Budget Général
                                </span></a>
                            </li>

                            <li>
                                <a href="#"><i class="large material-icons" style="color:#001e60">assessment</i><span>Aide</span></a>
                            </li>
                            <li class="header">Paramètres</li>
                            <li>
                                <a href="<?php echo e(route('LB')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Banque</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GLUTE')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>
                                    Liste des Unités
                                </span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GOU')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Organigramme</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GS')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Directions/Services</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GLBGT')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Nature des dépenses</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GTP')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Type de prestation</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GTF')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Type de financement</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GPTN')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Partenaire</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GR')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Rôles</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GM')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Menus</span></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('GU')); ?>"><i class="large material-icons" style="color:#001e60">assessment</i><span>Utilisateurs</span></a>
                            </li>
                             <li>
                                <a href="#"><i class="large material-icons" style="color:#001e60">assessment</i><span>Niveau de validités</span></a>
                            </li>

                        </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo e(strtoupper(strftime('%B %Y'))); ?> <a href="javascript:void(0);"><?php echo e(config('app.name')); ?></a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.2
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->


    </section>

    <section class="content"  >
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <?php echo $__env->yieldContent("model"); ?>


    <?php echo $__env->yieldContent('js'); ?>

    <!-- Jquery Core Js -->
    <script src="public/cssdste/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="public/cssdste/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="public/cssdste/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="public/cssdste/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="public/cssdste/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="public/cssdste/js/admin.js"></script>

    <script src="public/cssdste/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="public/cssdste/js/demo.js"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\financebeci\resources\views/templatedste/_temp.blade.php ENDPATH**/ ?>