<?php 
session_start();
// if(!$_SESSION['login'])
// {
//     header('Location: ../index.html');
// }
include ('../Connect.php');
// $_SESSION['correo']= "ayuda4@gmail.com";
$correo = $_SESSION['correo'];

$consultaa = "SELECT * FROM usuario where correo = '$correo'";   //Consulta para Alumno
$resultadoa = mysqli_query($conex,$consultaa);

$consulta = "SELECT * FROM materia";                            //Consulta Materia
$resultadoMateria = mysqli_query($conex,$consulta);

//$consultal = "SELECT * FROM calif_act ca JOIN actividad ac ON(ca.actividad_idactividad=ac.idactividad) where alumno_usuario_correo = '$correo'";
//$resultadol = mysqli_query($conex,$consultal);

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
                <a class="navbar-brand" href="../index.html"><strong><i class="icon fa fa-plane"></i> SCC</strong></a>
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
                                <a href="#" class="active-menu">Actividades</a>
                            </li>
                            <li>
                                <a href="25_consultar_calificaciones_alumno.php">Parcial y final</a>
                            </li>
							</ul>
						</li>	
                    <li>
                        <a href="34_consultar_materiales_alumno.php"><i class="fa fa-qrcode"></i> Materiales</a>
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
        <div id="page-wrapper" >
            <div class="header"> 
                <h1 class="page-header">Consultar calificaciones de actividades</h1>
                <ol class="breadcrumb">
                    <li><a href="24_pagina_principal_general.php">Página Principal</a></li>
                    <li class="active">Consultar calificaciones de actividades</li>
                </ol> 		
            </div>
		
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-1 control-label">Nombre:</label>
                                        <div class="col-sm-11">
                                        <output type="text" class="form-control" id="nombre">
                                            <?php while($registroa = mysqli_fetch_assoc($resultadoa)){
                                                echo $registroa['nombre']." ".$registroa['ap_paterno']." ".$registroa['ap_materno']; //para el nombre
                                            }?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-1 control-label">Materia:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="materiase" name="materiase" onchange="ShowSelected()">
                                                <?php
                                                    while ($RegistroUsuario = mysqli_fetch_assoc($resultadoMateria)) {
                                                        echo '<option value = "'.$RegistroUsuario['id'].'">'.$RegistroUsuario['nombre'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <script>
                                                function ShowSelected(){
                                                var op = document.getElementById("materiase");
                                                var op2 = op.options[op.selectedIndex].text;
                                                document.cookie = "x = " + op2;
                                            }
                                            ShowSelected();
                                            </script>
                                            
                                            <br>
                                        </div>
                                        <div class="col-sm-2" align="center">
                                            <input type="submit" value= "Consultar" id='consultar' name='consultar' class="btn btn-primary" onclick="ShowSelected()"></input>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table id="tabla1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Actividad</th>
                                                <th>Calificación</th>
                                                <!-- <th>Comentarios</th> -->
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php
                                             if(isset($_REQUEST['consultar'])){
                                                $txt=$_COOKIE['x'];
                                                $consultal = "SELECT * FROM calif_act ca JOIN materia m ON (m.idmateria = ca.actividad_planeacion_materia_idmateria)JOIN actividad ac ON(ca.actividad_idactividad=ac.idactividad) where (alumno_usuario_correo = '$correo' and m.nombre='$txt')";
                                                $resultadol = mysqli_query($conex,$consultal);

                                                while ($RegistroU = mysqli_fetch_assoc($resultadol)) {
                                                    echo "<tr>";
                                                   echo "<td>".$RegistroU['nombre']."</td>";
                                                   echo "<td>".$RegistroU['calificacion']."</td>";
                                                //    echo "<td>".$RegistroU['comentarios']."</td>";
                                                   echo "<tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            <footer><p align="right">|   EME   |   APRS   |   ATC   |   EDTA   |   BSVR   |</a></p></footer>
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
        $("tabla1").ready(function(){
          actionRead();
        });

       // $cod = document.getElementById("materiase").value;

      </script>
         <!-- Custom Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/custom-scripts.js"></script>
    <script type="text/javascript" src="../js/27_consultar_calificaciones_actividad.js"></script> 
   
</body>
</html>
