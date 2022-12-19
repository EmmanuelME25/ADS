<?php 
session_start();
/*if(!$_SESSION['login'])
{
    header('Location: index.php');
}*/
include ('../Connect.php');
$correo = $_SESSION['correo'];

?>

<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Consultar Respuesta</title>
    <!-- Bootstrap Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../../brilliant-free-bootstrap-admin-template/assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong><i class="icon fa fa-plane"></i> SCC</strong></a>
				
		<div id="sideNav" href="">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Calificaciones<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html"> Actividades</a>
                            </li>
                            <li>
                                <a href="morris-chart.html"> Parcial y final</a>
                            </li>
							</ul>
					</li>	
                    <li>
                        <a href="consultaMateriales.html"><i class="fa fa-desktop"></i> Materiales</a>
                    </li> 	
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Planeación</a>
                    </li>
                    
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Cerrar sesión</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Mensajes <small>Contacta al profesor</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li class="active">Mensajes</li>
					</ol> 
									
		</div>
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Conversaciones
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <a href="#" class="btn btn-primary">Iniciar nueva conversación</a>
                                    </div>
                                    <br><br><br>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge">Respondido</span>
                                        <i class="fa fa-fw fa-comment"></i> Profesor A
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">Respondido</span>
                                        <i class="fa fa-fw fa-comment"></i> Profesor B
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">Sin respuesta</span>
                                        <i class="fa fa-fw fa-comment"></i> Profesor C
                                    </a>
                                </div>
                                <div class="text-right">
                                    <a href="#">Cargar mensajes anteriores <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="alumno" class="col-sm-2 control-label">Alumno:</label>
                                    <div class="col-sm-10">
                                        <output type="text" class="form-control" id="alumno">Alejandro Tamayo</output>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="form-group">
                                    <label for="docente" class="col-sm-2 control-label">Docente:</label>
                                    <div class="col-sm-10">
                                        <output type="text" class="form-control" id="docente">Julia Hernández Ríos</output>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="form-group">
                                    <label for="asunto" class="col-sm-2 control-label">Asunto:</label>
                                    <div class="col-sm-10">
                                        <output type="text" class="form-control" id="asunto">Pregunta del examen</output>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="form-group">
                                    <label for="pregunta" class="col-sm-2 control-label">Pregunta:</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <textarea class="form-control" rows="3" id="material_ini">¿Qué día será aplicado el último examen</textarea>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="resp" class="col-sm-2 control-label">Respuesta:</label>
                                    <div class="col-sm-10">
                                        <div>
                                            <textarea class="form-control" rows="3" id="resp">El examen parcial en cuestión será aplicado el 16 de diciembre del año en curso</textarea>
                                        </div>
                                        <br>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
	
			    <footer><br><p align="right">|   EME   |   APRS   |   ATC   |   EDTA   |   BSVR   |</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/morris/morris.js"></script>
	
	
	<script src="../../brilliant-free-bootstrap-admin-template/assets/js/easypiechart.js"></script>
	<script src="../../brilliant-free-bootstrap-admin-template/assets/js/easypiechart-data.js"></script>
	
	 <script src="../../brilliant-free-bootstrap-admin-template/assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="../../brilliant-free-bootstrap-admin-template/assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="../../brilliant-free-bootstrap-admin-template/assets/js/chartjs.js"></script> 

</body>

</html>