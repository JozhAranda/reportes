<!DOCTYPE html>
<html>
    <head>        
        <title>Morzan Reportes - Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{stylesheet_link_tag('application')}}        

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- navbar -->
        <header class="navbar navbar-inverse" role="banner">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('root')}}">
                    Morzan Reportes
                </a>
            </div>
            <ul class="nav navbar-nav pull-right hidden-xs">
                <li class="hidden-xs hidden-sm">
                    <input class="search" type="text">
                </li>
                <li class="notification-dropdown hidden-xs hidden-sm">
                    <a href="#" class="trigger">
                        <i class="fa fa-exclamation-triangle"></i>
                        <span class="count">8</span>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="fa fa-times"></i></a>
                            <div class="notifications">
                                <h3>You have 6 new notifications</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 13 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 18 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-envelope-alt"></i> New message from Alejandra
                                    <span class="time"><i class="icon-time"></i> 28 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 49 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> New order placed
                                    <span class="time"><i class="icon-time"></i> 1 day.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="hidden-xs hidden-sm">
                    <a href="#" class="trigger">
                        <i class="fa fa-lg fa-envelope-o"></i>
                    </a>                    
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                        Tu Perfil
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">                        
                        <li><a href="#">Editar Perfil</a></li>                        
                        <li><a href="#">Salir</a></li>
                    </ul>
                </li>
                <li class="settings hidden-xs hidden-sm">
                    <a href="#" role="button">
                        <i class="fa fa-cog"></i>
                    </a>
                </li>                
            </ul>
        </header>
        <!-- end navbar -->

        <!-- sidebar -->
        <div id="sidebar-nav">
            <ul id="dashboard-menu">
                <li class="active">
                    <div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <a href="{{route('users')}}">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>            
                <li>
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Reportes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('areas')}}">
                        <i class="fa fa-building-o"></i>
                        <span>Negocíos</span>
                    </a>
<!--                    <a class="dropdown-toggle" href="#">
                        <i class="icon-group"></i>
                        <span>Unidades de Negocío</span>
                        <i class="icon-chevron-down"></i>
                    </a>-->
<!--                    <ul class="submenu">
                        <li><a href="#">User list</a></li>
                        <li><a href="#">New user form</a></li>
                        <li><a href="#">User profile</a></li>
                    </ul>-->
                </li>
                <li>
                     <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Estadísticas</span>
                    </a>                    
                </li> 
                <li>
                     <a href="invitations/">
                        <i class="fa fa-envelope-o"></i>
                        <span>Invitaciones</span>
                    </a>                    
                </li>               
            </ul>
        </div>
        <!-- end sidebar -->


        <!-- main container -->
        <div class="content main-content">
            @yield('content')
        </div>
        
        <div class="modal fade" id="MR-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- scripts -->
       {{javascript_include_tag('application')}}

    </body></html>