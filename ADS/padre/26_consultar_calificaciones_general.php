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
    <title>Bootstrap Admin html Template : Master - WebThemez</title>
	<!-- Bootstrap Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                            <a href="33_consultar_respuestas.php">
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
                                <a href="28_consultar_calificaciones_general_actividades.php">Actividades</a>
                            </li>
                            <li>
                                <a href="#" class="active-menu" >Parcial y final</a>
                            </li>
							</ul>
						</li>	
                    <li>
                        <a href="35_consultar_materiales_padre.php"><i class="fa fa-qrcode"></i> Materiales</a>
                    </li>
                    
                    <li>
                        <a href="30_consultar_planeacion_padre.php"><i class="fa fa-table"></i> Planeación</a>
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
              <h1 class="page-header">Consultar calificaciones parciales y final</h1>
              <ol class="breadcrumb">
                  <li><a href="24_pagina_principal_general.php">Página Principal</a></li>
                  <li class="active">Consultar calificaciones parciales y final</li>
              </ol> 		
            </div>
		
            <div id="page-inner"> 
                <div class="row">
                 <div class="col-xs-12">
                     <div class="panel panel-default">
                         <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-1 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="Alumno">
                                            <option value="A1">Alumno 1</option>
                                            <option value="A2">Alumno 2</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-sm-2" align="center">
                                        <a href="#" class="btn btn-primary">Consultar</a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Grupo</th>
                                            <th>Materia</th>
                                            <th>Parcial I</th>
                                            <th>Parcial II</th>
                                            <th>Parcial III</th>
                                            <th>Final</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <tr>
                                            <td>1CM1</td>
                                            <td>Español</td>
                                            <td>7.6</td>
                                            <td>5.4</td>
                                            <td>6.8</td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                            <td>1CM1</td>
                                            <td>Inglés</td>
                                            <td>8.5</td>
                                            <td>9.4</td>
                                            <td>6.8</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>1CM1</td>
                                            <td>Matemáticas</td>
                                            <td>3.6</td>
                                            <td>1.4</td>
                                            <td>6.8</td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
