<?php

include_once 'config/database.php';
include_once 'objects/equipo.php';

$database = new Database();
$db = $database->getConnection();
 
$p = new Equipo($db);
 
$stmt = $p->readAll();
$num = $stmt->rowCount();
if($num>0){
 
    echo "<table class='table table-bordered table-hover'>";
     
        echo "<tr>";
            echo "<th>idequipo</th>";
            echo "<th>Nombre</th>";
            echo "<th>Ciudad</th>";
            echo "<th>Año de Fundación</th>";
            echo "<th>Editar o Eliminar</th>";
        echo "</tr>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            echo "<tr>";
                echo "<td>{$idequipo}</td>";
                echo "<td>".utf8_encode($nombre)."</td>";
                echo "<td>{$ciudad}</td>";
                echo "<td>{$anio_fundacion}</td>";
                echo "<td style='text-align:center;'>";
                    echo "<div class='equipo-id display-none' style='display:none;'>{$idequipo}</div>";
                     
                    echo "<div class='btn btn-info edit-btn margin-right-1em update-btn'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    echo "</table>";
     
} else{
    echo "<div class='alert alert-info'>No se encontraron registro.</div>";
}
?>