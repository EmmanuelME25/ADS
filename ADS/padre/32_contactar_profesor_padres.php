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

$consultaProfe = "SELECT * FROM profesor";   //Consulta para Profesor
$resultadoProfe = mysqli_query($conex,$consultaProfe);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Contactar Profesor</title>
	<!-- Bootstrap Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../../brilliant-free-bootstrap-admin-template/assets/css/font-awesome.css" rel="stylesheet" />
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
                            Mensajes <small>Contacta al profesor</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="24_pagina_principal_general.html">Inicio</a></li>
					  <li class="active">Mensajes</li>
					</ol> 
									
		    </div>
            <div id="page-inner" > 
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="plan" class="col-sm-2 control-label">Nombre del profesor:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="profesor_nombre">
                                            <?php 
                                                while($registroProfe = mysqli_fetch_assoc($resultadoProfe)){
                                                $consultaNomProf = "SELECT * FROM usuario where correo = ".'"'.$registroProfe['usuario_correo'].'"'."";
                                                $resultadoNomProf = mysqli_query($conex,$consultaNomProf);
                                                while($registroNomProf = mysqli_fetch_assoc($resultadoNomProf)){ 
                                                    echo "<option>".$registroNomProf['nombre']." ".$registroNomProf['ap_paterno']." ".$registroNomProf['ap_materno']."</option>";
                                                }}
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="plan" class="col-sm-2 control-label">Nombre del alumno:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="alumno_nombre">
                                            <?php 
                                                while($registroh = mysqli_fetch_assoc($resultadoh)){
                                                $consultaa = "SELECT * FROM usuario where correo = ".'"'.$registroh['usuario_correo'].'"'."";
                                                $resultadoa = mysqli_query($conex,$consultaa);
                                                while($registroa = mysqli_fetch_assoc($resultadoa)){ 
                                                    echo "<option>".$registroa['nombre']." ".$registroa['ap_paterno']." ".$registroa['ap_materno']."</option>";
                                                }}
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="plan" class="col-sm-2 control-label">Asunto:</label>
                                        <div class="col-sm-10">
                                            <div>
                                                <input type="text" class="form-control" placeholder="Asunto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mensaje" class="col-sm-2 control-label">Mensaje:</label>
                                        <div class="col-sm-10">
                                            <div>
                                                <textarea class="form-control" rows="12" id="mensaje" placeholder="Mensaje">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <br>
                                            <button type="submit" class="btn btn-default">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </form>
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
      <!-- Custom Js -->
    <script src="../../brilliant-free-bootstrap-admin-template/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
