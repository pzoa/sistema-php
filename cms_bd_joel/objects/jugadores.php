<?php
	class Nombretabla{
		private $conn;
    	private $table_name = "jugadores";
		//poner atributos de la tabla
		public $idjugadores;
		public $nombre;
		public $fecha_nacimiento;
		public $nacionalidad;
		public $posicion;

		public function __construct($db){
       	 	$this->conn = $db;
    	}

    	function readAll(){
	        $query = "SELECT idjugadores, nombre, fecha_nacimiento, nacionalidad, 
	                         posicion FROM  " . $this->table_name . "";
	        $stmt = $this->conn->prepare( $query );
	         
	        $stmt->execute(); 
	        return $stmt;   
	    }
	}
?>