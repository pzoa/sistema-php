<?php

include_once 'config/database.php';
include_once 'objects/jugadores.php';

$database = new Database();
$db = $database->getConnection();
 
$p = new Nombretabla($db);
 
$stmt = $p->readAll();
$num = $stmt->rowCount();
if($num>0){
 
    echo "<table class='table table-bordered table-hover'>";
     
        echo "<tr>";
            echo "<th>idjugadores</th>";
            echo "<th>Nombre</th>";
            echo "<th>Fecha de Nacimiento</th>";
            echo "<th>Nacionalidad</th>";
            echo "<th>Posicion</th>";
            echo "<th>Editar o Eliminar</th>";
        echo "</tr>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            echo "<tr>";
                echo "<td>{$idjugadores}</td>";
                echo "<td>".utf8_encode($nombre)."</td>";
                echo "<td>{$fecha_nacimiento}</td>";
                echo "<td>{$nacionalidad}</td>";
                echo "<td>{$posicion}</td>";
                echo "<td style='text-align:center;'>";
                    echo "<div class='jugadores-id display-none' style='display:none;'>{$idjugadores}</div>";
                     
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