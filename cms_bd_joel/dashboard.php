<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meeta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<style>
		h2{
			color: white;
		}
		h4{
			color: white;
			font-size: 20px;
		}
		.tablas-conect{
			display: flex;
			flex-direction: column;
			padding: 40px 0;
		}
		.tablas-conect a{
			text-decoration: none;
			color: white;
			font-size: 16px;
			display: block;
		}
		.tabla-jugadores{
			margin-bottom: 15px;
			background: #860038;
			padding: 10px 0;
			transition: .7s all;
		}
		.tabla-jugadores:hover, .tabla-equipos:hover {
			background: #002D62;
			border: white 1px solid;
		}
		.tabla-equipos{
			padding: 10px 0;
			background: #860038;
			transition: .7s all;
		}
		.button-agregar{
			display: flex;
			justify-content: space-between;
			margin-bottom: 20px;
		}

		.color-bashboard-left{
			background: #002D62;
			width: 15%;
		}

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="color-bashboard-left col-lg-3 col-md-3 col-sm-3">
				<h2>Bienvenido</h2>
				  <!-- Preloader -->
			  	<aside class="left-panel"> 
			        <div class="user text-center">
			            <img src="assets/images/avtar/paolo.png" class="img-circle" alt="...">
			            <h4><?php echo $_SESSION['SESS_FIRST_NAME'] ?></h4>
			            <div class="dropdown user-login">
			                <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
			                <i class="fa fa-circle status-icon available"></i> Disponible <i class="fa fa-angle-down"></i>
			                </button>
			                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			                      <li role="presentation"><a role="menuitem" href="ac/logout.php"><i class="fa fa-circle status-icon signout"></i> Salir</a></li>
			                    </ul>
			            </div>
			            <div class="tablas-conect">
			            	<div class="tabla-jugadores">
			            		<a href="dashboard.php">Tabla Jugadores</a>
			            	</div>
			            	<div class="tabla-equipos">
			            		<a href="dashboard-equipo.php">Tabla Equipos</a>
			            	</div>
			            </div>
			        </div>
			    </aside>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9">
		        <div class="warper container-fluid">
		            <div class="page-header"><h3 id="page-title">Lista de Jugadores</h3></div>
		            <div class="button-agregar">
		            	<button type="button" class="btn btn-default">Exportar Jugadores</button>
		            	<button type="button" class="btn btn-default">Agregar Jugadores</button>
		            </div>
		            <div class='margin-bottom-1em overflow-hidden'>
		                <div id='loader-image'><img src='images/loading.gif' /></div>
		            </div>
		            <div id='page-content'></div>
		        </div>
			</div>
		</div>
	</div>
    <script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/main.js" type="text/javascript"></script>
</body>
</html>