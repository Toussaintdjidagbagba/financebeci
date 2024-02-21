<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{config('app.name')}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="cssdste/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="cssdste/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="cssdste/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="cssdste/css/style.css" rel="stylesheet">

    <link href="cssdste/css/themes/all-themes.css" rel="stylesheet" />

    @yield('css')

</head>

<body class="theme-red" style="background-image: url(fond.png); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;
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
                <a class="navbar-brand" href="">{{config('app.name')}}</a>
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
            <div class="user-info"  style="background-image : url('fondprofil.png'); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;
            -moz-background-size: cover; -o-background-size: cover;">
                <div class="image">
                    <img src="cssdste/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div style="color:#001e60" class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('utilisateur')->nom }} {{ session('utilisateur')->prenom }}</div>
                    <div style="color:#001e60" class="email">{{ session('utilisateur')->mail }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i style="color:#001e60" class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Déconnecter</a></li>
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
                                <a href="{{route('dashboard')}}"><i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Tableau de bord</span>
                                </a>
                            </li>  
                            <li>
                                <a href="#"><i class="large material-icons" style="color:#001e60">assessment</i><span>
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
                                        <!--a href="{{route('GFR')}}"-->
                                            <span>Réception des factures</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                        <!--a href="{{route('GFE')}}"-->
                                            <span>Emission des factures</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <!--a href="{{route('GVF')}}"-->
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
                                        <a href="{{route('GBC')}}">
                                            <span>Fonctionnement</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Social</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Investissement</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Dividende</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Projet</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Suivi</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="{{route('GBSEG')}}">Etat Général</a>
                                            </li>
                                            <li>
                                                <a href="{{route('GBSGL')}}">Grand Livre</a>
                                            </li>
                                            <li>
                                                <a href="{{route('GBSEC')}}">Etat Comparatif</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>


                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="large material-icons" style="color:#001e60">assessment</i>
                                    <span>Projets</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{route('GFP')}}">
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
                                        <a href="{{route('GSDC')}}">
                                            <span>Situation des comptes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('GCA')}}">
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
                        </li>

                            <li>
                                <a href="#"><i class="large material-icons" style="color:#001e60">assessment</i><span>Aide</span></a>
                            </li>
                            <li class="header">Paramètres</li>
                            

                            <li>
                                <a href="{{route('GS')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Directions/Services</span></a>
                            </li>
                            <li>
                                <a href="{{route('GR')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Rôle</span></a>
                            </li>
                            <li>
                                <a href="{{route('GM')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Menu</span></a>
                            </li>
                            <li>
                                <a href="{{route('GU')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Utilisateur</span></a>
                            </li>
                             <li>
                                <a href="{{route('GU')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Niveau de validité</span></a>
                            </li>
                            <li>
                                <a href="{{route('GU')}}"><i class="large material-icons" style="color:#001e60">assessment</i><span>Ligne budgetaire</span></a>
                            </li>
                        </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{strtoupper(strftime('%B %Y'))}} <a href="javascript:void(0);">{{config('app.name')}}</a>.
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
        @yield('content')
    </section>

    @yield("model")
        

    @yield('js')

    <!-- Jquery Core Js -->
    <script src="cssdste/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="cssdste/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="cssdste/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="cssdste/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="cssdste/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="cssdste/js/admin.js"></script>

    <script src="cssdste/js/pages/index.js"></script>    

    <!-- Demo Js -->
    <script src="cssdste/js/demo.js"></script>
</body>

</html>
