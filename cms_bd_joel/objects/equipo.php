<?php
	class Equipo{
		private $conn;
    	private $table_name = "equipo";
		//poner atributos de la tabla
		public $idequipo;
		public $nombre;
		public $ciudad;
		public $anio_fundacion;

		public function __construct($db){
       	 	$this->conn = $db;
    	}

    	function readAll(){
	        $query = "SELECT idequipo, nombre, ciudad, anio_fundacion
	                         FROM  " . $this->table_name . " WHERE estado=1";
	        $stmt = $this->conn->prepare( $query );
	         //echo $query;
	        $stmt->execute(); 
	        return $stmt;   
	    }
	    function create(){
	    	$query = "INSERT INTO 
                    " . $this->table_name . "
                SET 
                    nombre=:nombre,
                    ciudad=:ciudad,
                    anio_fundacion=:anio_fundacion, 
                    estado=:estado";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":ciudad", $this->ciudad);
        $stmt->bindParam(":anio_fundacion", $this->anio_fundacion);
        $stmt->bindParam(":estado", $this->estado);
      
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
	    }
	}
?>