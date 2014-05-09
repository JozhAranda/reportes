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
            <div>
                
            </div>
            <ul id="dashboard-menu">
                <li class="active">
                    <div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <a href="{{route('clients.tickets')}}">
                        <i class="fa fa-file-text-o"></i>
                        <span>Reportes</span>
                    </a>
                </li>            
                <li>
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Mis Reportes</span>
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