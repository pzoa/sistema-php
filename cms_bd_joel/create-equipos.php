<?php
	include_once 'config/database.php';
	include_once 'objects/equipo.php';

	$database = new Database();
	$db = $database->getConnection();

	$m = new Equipo($db);

	$m->nombre=$_POST['nombre'];
	$m->ciudad=$_POST['ciudad'];
	$m->anio_fundacion=$_POST['anio_fundacion'];
	$m->estado="1";

	$m->create();
?>