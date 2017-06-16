$(document).ready(function(){
    $('#loader-image').show();
    showProductos();
    function showProductos(){
            
        changePageTitle('Lista de Jugadores');
        
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('read.php', function(){
                $('#loader-image').hide(); 
                $('#page-content').fadeIn('slow');
            });
        });
    }
    $(document).on('click', '.delete-btn', function(){
        if(confirm('Estas seguro?')){
            var producto_id = $(this).closest('td').find('.jugadores-id').text();
            $.post("delete.php", { id: producto_id })
                .done(function(data){
                    $('#loader-image').show();
                    showProductos();
                });
        }
    });
    function changePageTitle(page_title){   
        $('#page-title').text(page_title);
        document.title=page_title;
    }
});