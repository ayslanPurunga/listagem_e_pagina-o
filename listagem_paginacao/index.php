<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar com JavaScript</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Listar Usuarios</h2>
        <span id="conteudo"></span>
    </div>

    <div id="visulUsuarioModal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="visul_usuario"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
    
    <script>
    var qnt_result_pg = 50; //quantidade de registros por paginas
    var pagina = 1; //pagina inicial   
        $(document).ready(function(){
            listar_usuario(pagina, qnt_result_pg); //chamar a funcao para listar os registros
        });
           
        function listar_usuario(pagina, qnt_result_pg){   
            var dados = {
                pagina: pagina,
                qnt_result_pg: qnt_result_pg
            }
        $.post('listar_usuario.php', dados , function(retorna){
                //substitui o valor no seletor id="conteudo"
                $("#conteudo").html(retorna);         
        });
    }


    $(document).ready(function(){
        $(document).on('click', '.view_data', function(){
            var user_id = $(this).attr("id");
            //alert(user_id);
            //verificar se há valor na variavel
            if(user_id !== ''){
                var dados = {
                    user_id: user_id
                };
                $.post('visualizar.php', dados, function(retorna){
                    $("#visul_usuario").html(retorna); 
                    $('#visulUsuarioModal').modal('show');
                });
            }

        });
    });
</script>    
</body>
</html>