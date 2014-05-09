<!DOCTYPE html>
<html>
    <head>        
        <title>Morzan Reportes - Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{stylesheet_link_tag('login_application')}}        

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
        </header>
        <!-- end navbar -->       


        <!-- main container -->
        <div class="main-content content">
           @yield('content')
        </div>


        <!-- scripts -->
       {{javascript_include_tag('application')}}

    </body></html>