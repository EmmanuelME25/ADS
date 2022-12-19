<?php 
session_start();
/*if(!$_SESSION['login'])
{
    header('Location: index.php');
}*/
include ('../Connect.php');
// $_SESSION['correo']= "ayuda2@gmail.com";
$correo = $_SESSION['correo'];

$consultaa = "SELECT * FROM usuario where correo = '$correo'";   //Consulta para Alumno
$resultadoa = mysqli_query($conex,$consultaa);

$consultaMateria = "SELECT * FROM alumno_materia where alumno_usuario_correo = '$correo'";          //Consulta Materia
$resultadoMateria = mysqli_query($conex,$consultaMateria);

$consultaProfe = "SELECT * FROM profesor_alumno where alumno_usuario_correo = '$correo'";   //Consulta para Profesor
$resultadoProfe = mysqli_query($conex,$consultaProfe);

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
    <title>Consultar materiales</title>
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
                            <a href="31_contactar_profesor_alumno.php">
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
                                <a href="27_consultar_calificaciones_actividad.php">Actividades</a>
                            </li>
                            <li>
                                <a href="25_consultar_calificaciones_alumno.php" >Parcial y final</a>
                            </li>
							</ul>
						</li>	
                    <li>
                        <a href="#" class="active-menu"><i class="fa fa-qrcode"></i> Materiales</a>
                    </li>
                    
                    <li>
                        <a href="29_consultar_planeacion_alumno.php"><i class="fa fa-table"></i> Planeación</a>
                    </li>
                    <li>
                        <a href="../cerrar.php"><i class="fa fa-edit"></i> Cerrar sesión</a>
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
					  <li><a href="24_pagina_principal_general.php">Inicio</a></li>
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
                                            <output type="text" class="form-control" id="nombre">
                                            <?php while($registroa = mysqli_fetch_assoc($resultadoa)){
                                                echo $registroa['nombre']." ".$registroa['ap_paterno']." ".$registroa['ap_materno']; //para el nombre
                                            }?>
                                            </output>
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

                                        <script>
                                                function ShowSelected(){
                                                var op = document.getElementById("fi");
                                                var op1 = document.getElementById("ff");
                                                document.cookie = "x = " + op;
                                                document.cookie = "y = " + op1;
                                            }
                                            //ShowSelected();
                                        </script>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4" align="right">
                                        <input type="submit" value= "Consultar" id='consultar' name='consultar' class="btn btn-primary" onclick="ShowSelected()"></input>
                                            <br>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="mi">Materiales iniciales:</label>
                                        <div>
                                            <textarea class="form-control" rows="12" id="mi" >
                                                <?php
                                                // if(isset($_REQUEST['consultar'])){
                                                //     $txt=$_COOKIE['x'];
                                                //     $txt2=$_COOKIE['y'];

                                                //     while($registroMateria = mysqli_fetch_assoc($resultadoMateria) and $registroProfe = mysqli_fetch_assoc($resultadoProfe)){
                                                //         $consultaPlan = "SELECT * FROM planeacion where profesor_usuario_correo = ".'"'.$registroMateria['materia_idmateria'].'"'." AND materia_idmateria = ".'"'.$registroProfe['profesor_usuario_correo'].'"'."";   //Consulta para Planeacion
                                                //         $resultadoPlan = mysqli_query($conex,$consultaPlan);
                                                //         while($registroPlan = mysqli_fetch_assoc($resultadoPlan)){
                                                //             $consultaAct = "SELECT * FROM actividad where ".'"'.$registroPlan['planeacion_idplaneacion'].'"'." AND (fecha between '$txt' and '$txt2')";   //Consulta para Planeacion
                                                //             $resultadoAct = mysqli_query($conex,$consultaAct);
                                                //             if(!$resultadoAct) {
                                                //                 var_dump(mysqli_error($conex));
                                                //                 exit;
                                                //             }
                                                //         }
                                                //     }
                                                //     while ($RegistroAct = mysqli_fetch_assoc($resultadoAct)) {
                                                //         echo $RegistroAct['	materiales_ini'];
                                                //     }
                                                // }
                                                ?>
                                            </textarea>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="ma">Materiales adicionales:</label>
                                        <div>
                                            <textarea class="form-control" rows="12" id="ma">
                                                <?php
                                                    // while ($RegistroAct = mysqli_fetch_assoc($resultadoAct)) {
                                                    //     echo $RegistroAct['	materiales_adi'];
                                                    // }
                                                ?>
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
    <script>
        $(document).ready(function(){
          actionRead();
        });
      </script>
      
    <!-- Chart Js -->
    <script type="text/javascript" src="../../brilliant-free-bootstrap-admin-template/assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="../../brilliant-free-bootstrap-admin-template/assets/js/chartjs.js"></script> 
    <script type="text/javascript" src="../js/34_consultar_materiales_alumno.js"></script> 
</body>

</html>