<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Esquema de Vacunaci&oacute;n</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

		<!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="js/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />

        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- <!-- Daterange picker -->
        <!--<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <!--<link href="css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- JQuery Smooth -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" media="screen" />
        
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

		<!-- jQuery 2.0.2 -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <!--<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        -->
        <script src="//code.jquery.com/jquery-1.11.1.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  
        <!-- Bootstrap -->
        <!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
        <script type="text/javascript" src="js/plugins/bootstrap/moment.js"></script>
        <!--<script type="text/javascript" src="js/plugins/bootstrap/js/transition.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/js/collapse.js"></script>-->
        <script type="text/javascript" src="js/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <!-- Morris.js charts -->
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>-->
        <!--<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>-->
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker 
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>-->
	
		<!--<script src="js/jquery.maphilight.js" type="text/javascript"></script>-->
		<!--<script src="ajax/FuncionesAjax.js" type="text/javascript" ></script>	-->
        <script type="application/javascript" src="js/funciones.js"></script>
        <!-- Referente a los mapas y direcciones -->
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                GESVACUN
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less--> <!-- ESTE ES PARA COLOCAR LOS MENSAJES
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">5</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 4 Mensajes</li>
                                <li>
						<!-- inner menu: contains the actual data 
                                    <ul class="menu">
                                        <li><!-- start message 
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Equipo de soporte
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message 
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li> -->
                        <!-- Notifications: style can be found in dropdown.less --> <!-- ESTE ES PARA NOTIFICACIONES-->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">2</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Usted tiene 2 notificaciones</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> Se han registrado (1) ni&ntilde;o (s) hoy.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning warning"></i> Lentitud en conexi&oacute;n al servidor.
                                            </a>
                                        </li>
                                        <!--<li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver todas</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Bryan Rodriguez <i class="caret"></i></span> <!-- NOMBRE VISIBLE-->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar05.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Bryan Rodriguez - Web Developer
                                        <small>Miembro desde May. 2014</small> <!-- DATOS INTERNOS ESQUINA IZQUIERDA-->
                                    </p>
                                </li>
                                <!-- Menu Body
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Seguidores</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar05.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, Bryan</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> En l&iacute;nea</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!--<form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php include_once "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">
                <!-- Content Header (Page header) -->
				
				<div name='contenedor_principal' id='contenedor_principal'>
                    <section class="content-header">
                        <h1>
                            Principal
                            <smallPanel de control</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active" ><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
                        </ol>
                    </section>


                        <section class="content">

                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3>
                                                150
                                            </h3>
                                            <p>
                                                Vacunas hoy
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>
                                                53<sup style="font-size: 20px">%</sup>
                                            </h3>
                                            <p>
                                                Cubrimiento vacunas
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3>
                                                44
                                            </h3>
                                            <p>
                                                Ni&ntilde;os Registrados
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>
                                                65
                                            </h3>
                                            <p>
                                                Vacunas pr&oacute;ximas a vencer
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                            </div><!-- /.row -->

                            <!-- top row -->
                            <div class="row">
                                <div class="col-xs-12 connectedSortable">

                                </div><!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Main row -->
                            

                        </section><!-- /.content -->
                    </aside><!-- /.right-side -->
               </div>
                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        
    </body>
</html>