<?php 
	session_start();

	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_ROL_ID']);
	unset($_SESSION['SESS_ESTADO']);

	session_destroy();
	header("location: ../index.php");

?>