<?php

include_once 'config/database.php';
include_once 'objects/equipo.php';

$database = new Database();
$db = $database->getConnection();
$m = new Equipo($db);
      
$stmt = $m->readAll();
$num = $stmt->rowCount();

?>

<form id="fr" action="#" enctype="multipart/form-data" method="post">
       <table class='table table-hover table-responsive table-bordered'>
        <tr class="des">
            <td>Nombre</td>
            <td>
                <textarea name='nombre' id="nombre" class='form-control'></textarea>
            </td>
        </tr>
        <tr class="des">
            <td>Ciudad</td>
            <td>
                <textarea name='ciudad' id="ciudad" class='form-control'></textarea>
            </td>
        </tr>
        <tr class="des">
            <td>Año de Fundación</td>
            <td>
                <textarea name='anio_fundacion' id="anio_fundacion" class='form-control'></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class='btn btn-primary' id="btn-send" type="button">
                    <span class='glyphicon glyphicon-plus'></span> Crear Equipo
                </a>
            </td>
        </tr>
    </table>

</form>
<script type="text/javascript">
    $('#btn-send').click(function(event, data){
        if($('#nombre').val()==""){
            alert("Debe colocar un Nombre");
            $('#nombre').focus();
        } else if($('#ciudad').val()==""){
            alert("Debe colocar una ciudad");
            $('#ciudad').focus();
        } else if($('#aniofundacion').val()==""){
            alert("Debe colocar una Año");
            $('#aniofundacion').focus();
        } else {
           $.post("create-equipos.php", $('form#fr').serialize()).done(function(data) {
               $('#create-equipos').show();
               $('#read-equipos').hide();
               showEquipos();
            });
        }
    });
    function changePageTitle(page_title){   
            $('#page-title').text(page_title);
            document.title=page_title;
        }
    function showEquipos(){
            
        changePageTitle('Lista de Equipos');
        
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('readequipo.php', function(){
                $('#loader-image').hide(); 
                $('#page-content').fadeIn('slow');
            });
        });
    }
</script>
</body>
</html>
