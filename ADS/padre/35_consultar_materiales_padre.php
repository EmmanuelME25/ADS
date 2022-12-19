<?php 
/*session_start();
if(!$_SESSION['login'])
{
    header('Location: index.php');
}*/
include ('../Connect.php');
$_SESSION['correo']= "padre3@gmail.com";
$correo = $_SESSION['correo'];

$consultap = "SELECT * FROM usuario where correo = '$correo'";   //Consulta para Padre
$resultadop = mysqli_query($conex,$consultap);

$consultah = "SELECT usuario_correo FROM alumno where padre_usuario_correo = '$correo'";   //Consulta para Hijos
$resultadoh = mysqli_query($conex,$consultah);

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
                            <a href="32_contactar_profesor_padres.php">
                                <div>
                                    <strong>Preguntar al profesor</strong>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="33_consultar_respuestas.html">
                                <div>
                                    <strong>Consultar respuestas</strong>
                                </div>
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
                        <li>
                        <a href="#">
                            <?php 
                                $registrop = mysqli_fetch_assoc($resultadop);
                                echo '<i class="fa fa-user fa-fw"></i> '.$registrop['nombre'];
                            ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
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
                        <a href="24_pagina_principal_general.html"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
					 
					 <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Calificaciones<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="28_consultar_calificaciones_general_actividades.html" >Actividades</a>
                            </li>
                            <li>
                                <a href="26_consultar_calificaciones_general.html" class="active-menu">Parcial y final</a>
                            </li>
							</ul>
						</li>	
                    <li>
                        <a href="35_consultar_materiales_padre.html"><i class="fa fa-qrcode"></i> Materiales</a>
                    </li>
                    
                    <li>
                        <a href="30_consultar_planeacion_padre.html"><i class="fa fa-table"></i> Planeación</a>
                    </li>
                    <li>
                        <a href="../01_index.html"><i class="fa fa-edit"></i> Cerrar sesión</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Consultar Materiales
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Inicio</a></li>
					  <li class="active">Consultar Materiales</li>
					</ol> 
									
		</div>
            <div id="page-inner"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body"> 

                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-2 control-label">Alumno:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="nombre">
                                            <?php 
                                                while($registroh = mysqli_fetch_assoc($resultadoh)){
                                                $consultaa = "SELECT * FROM usuario where correo = ".'"'.$registroh['usuario_correo'].'"'."";
                                                $resultadoa = mysqli_query($conex,$consultaa);
                                                while($registroa = mysqli_fetch_assoc($resultadoa)){ 
                                                    echo "<option>".$registroa['nombre']." ".$registroa['ap_paterno']." ".$registroa['ap_materno']."</option>";
                                                }}
                                            ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fi" class="col-sm-2 control-label">Fecha inicio:</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="fi">
                                            <br>
                                        </div>
                                        <label for="ff" class="col-sm-2 control-label">Fecha fin:</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="ff">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4" align="right">
                                            <a href="#" class="btn btn-primary">Consultar</a>
                                            <br>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="mi">Materiales iniciales:</label>
                                        <div>
                                            <textarea class="form-control" rows="12" id="mi" disabled>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s 
                                                when an unknown printer took a galley of type and scrambled it to make a type 
                                                specimen book. It has survived not only five centuries, but also the leap into 
                                                electronic typesetting, remaining essentially unchanged. It was popularised in 
                                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                                and more recently with desktop publishing software like Aldus PageMaker 
                                                including versions of Lorem Ipsum. It is a long established fact that a 
                                                reader will be distracted by the readable content of a page when looking 
                                                at its layout. The point of using Lorem Ipsum is that it has a more-or-less 
                                                normal distribution of letters, as opposed to using 'Content here, content here', 
                                                making it look like readable English. Many desktop publishing packages and 
                                                web page editors now use Lorem Ipsum as their default model text, and a 
                                                search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                                </textarea>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mi">Materiales adicionales:</label>
                                        <div>
                                            <textarea class="form-control" rows="12" id="mi" disabled>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s 
                                                when an unknown printer took a galley of type and scrambled it to make a type 
                                                specimen book. It has survived not only five centuries, but also the leap into 
                                                electronic typesetting, remaining essentially unchanged. It was popularised in 
                                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                                and more recently with desktop publishing software like Aldus PageMaker 
                                                including versions of Lorem Ipsum. It is a long established fact that a 
                                                reader will be distracted by the readable content of a page when looking 
                                                at its layout. The point of using Lorem Ipsum is that it has a more-or-less 
                                                normal distribution of letters, as opposed to using 'Content here, content here', 
                                                making it look like readable English. Many desktop publishing packages and 
                                                web page editors now use Lorem Ipsum as their default model text, and a 
                                                search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                                </textarea>
                                        </div>
                                        <br>
                                    </div>
                                </div> 
                            </div>
                      </div>
                  </div>						
                </div>	
	
			    <footer><br><br><p align="right">|   EME   |   APRS   |   ATC   |   EDTA   |   BSVR   |</a></p></footer>
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