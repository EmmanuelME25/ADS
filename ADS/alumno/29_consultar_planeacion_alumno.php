<?php 
session_start();
/*if(!$_SESSION['login'])
{
    header('Location: index.php');
}*/
include ('../Connect.php');
// $_SESSION['correo']= "padre3@gmail.com";
$correo = $_SESSION['correo'];

$consultap = "SELECT * FROM usuario where correo = '$correo'";   //Consulta para Padre
$resultadop = mysqli_query($conex,$consultap);

$consultah = "SELECT usuario_correo FROM alumno where padre_usuario_correo = '$correo'";   //Consulta para Hijos
$resultadoh = mysqli_query($conex,$consultah);

$consultaMat = "SELECT * FROM materia";   //Consulta para Profesor
$resultadoMat = mysqli_query($conex,$consultaMat);

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
    <title>Consultar planeación</title>
	<!-- Bootstrap Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/font-awesome.css" rel="stylesheet" />
	
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/select2.min.css" rel="stylesheet" >
	<link href="../../brilliant-free-bootstrap-admin-template/assets/css/checkbox3.min.css" rel="stylesheet" >
        <!-- Custom Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                            <a href="31_contactar_profesor_alumno.php">
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
                        <li><a href="../cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
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
                        <a href="24_pagina_principal_general.php"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
					 
					 <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Calificaciones<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="27_consultar_calificaciones_actividad.php">Actividades</a>
                            </li>
                            <li>
                                <a href="25_consultar_calificaciones_alumno.php" >Parcial y final</a>
                            </li>
							</ul>
						</li>	
                    <li>
                        <a href="34_consultar_materiales_alumno.php"><i class="fa fa-qrcode"></i> Materiales</a>
                    </li>
                    
                    <li>
                        <a href="29_consultar_planeacion_alumno.php" class="active-menu"><i class="fa fa-table"></i> Planeación</a>
                    </li>
                    <li>
                        <a href="../cerrar.php"><i class="fa fa-edit"></i> Cerrar sesión</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
            <h1 class="page-header">Consultar Planeación</h1>
            <ol class="breadcrumb">
                <li><a href="#">Página Principal</a></li>
                <li class="active">Consultar Planeación</li>
            </ol> 		
		</div>
		
            <div id="page-inner"> 
            <!-- -------------------------------------------------------------------------------------------------------- -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="materia" class="col-sm-2 control-label">Materia:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="materia">
                                                <?php 
                                                    while($registroMat = mysqli_fetch_assoc($resultadoMat)){ 
                                                        echo "<option>".$registroMat['nombre']."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="materia" class="col-sm-2 control-label">Fecha inicio:</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="fecha">
                                            <br>
                                        </div>
                                        <label for="materia" class="col-sm-2 control-label">Fecha fin:</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="fecha">
                                            <br>
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
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="40%">Actividad</th>
                                                <th width="60%">Descripción</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <tr>
                                                <td>Investigación de la Independencia</td>
                                                <td>xxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxx x x x xxxxxxx</td>
                                            </tr>
                                            <tr>
                                                <td>Línea del tiempo 1</td>
                                                <td>xxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxx x x x xxxxxxxx xx</td>
                                            </tr>
                                            <tr>
                                                <td>Presentación culturas antiguas</td>
                                                <td>Hacer una presentación...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- ----------------------------------------------------------------------------------------------------------------- -->
                <!-- TABLA DE ARCHIVOS -->
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                ARCHIVOS
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Libro Historia I</td>
                                            </tr>
                                            <tr>
                                                <td>Libro de personajes históricos</td>
                                            </tr>
                                            <tr>
                                                <td>Libro Historia II</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
			<footer><br><br><br><br><p align="right">|   EME   |   APRS   |   ATC   |   EDTA   |   BSVR   |</a></p></footer>
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
	<script src="../../brilliant-free-bootstrap-admin-template/assets/js/select2.full.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	  $(".selectbox").select2();
	});
	</script>
      <!-- Custom Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/custom-scripts.js"></script> 
	<script src="../js/29_consultar_planeacion_alumno.js"></script> 
</body>
</html>