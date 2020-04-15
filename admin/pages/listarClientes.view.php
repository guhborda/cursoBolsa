<div class="main-content">
<div class="table-responsive">
    <table class="table align-items-center">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">nascimento</th>
            <th scope="col">Razao Social</th>
            <th scope="col">CPF/J</th>
            <th scope="col">Endereço</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">CEP</th>
            
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="listacliente">
        
    </tbody>
</table>
<div id="pagination"></div>
</div>

</div>

<?php
include('modal.html');
?>

<script>
  $(document).ready(function(){
    $("#listacliente").html('');
    $("#pagination").html('');
    function countcliente(){
    $.ajax({

    method:'POST',
    url: 'functions/Painel.func.php',
    data: {Painel:'contarcliente'},
    dataType: 'JSON',
    success: function(data){
      $(".table-responsive").attr('row',data);
      //console.log(data);
    }
    });
  }
    $('input.navsearch').attr('name','listarcliente');
    order = 'nome';
    page='';
    option = {order,page}
    listarCliente(option);

    
     $(document).on('click','.page-link',function(e){
       e.preventDefault();
       
       order = 'nome';
       page=1;
       atrib = $(this).attr('id');
      if(atrib == 'next'){
        page++;
      }else if(atrib == 'previous'){
        if(page >1){
          page--;
        }
        
      }else{
        page = $(this).attr('id');
      }
       option = {order,page}
       
       $("#listacliente").html('');
       $("#pagination").html('');
       listarCliente(option);
       
       //console.log(page);
    });


   
    //carregamento Lista
    //$('.main-content').html("<div class='table-responsive'>"); 

    var currentdate = new Date();
        var datetime = "Last Sync: " + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
                console.log(datetime);
           
          // só remover tirar fora da function para voltar como era
          //teste de paginação
           function listarCliente(option=null){
                table = '';
                  pagination ='';
            var qntcliente = countcliente();
            console.log(qntcliente);
             $.ajax({
              url:'functions/Painel.func.php',
              method:'POST',
              dataType:'JSON',
              data:{Painel:'listarcliente',option: option},
              success: function(response){
                var table ='';
                  var pagination = '';
                //console.log(qntcliente); 
                var val = response.length;
                //.log(response);
                function crearTable(table,response,i){ table +='<tr id="'+response[i].cliente_id+'" href="/view/cliente/id='+response[i].cliente_id+'"><td><div class="media align-items-center"><a href="#" class="avatar rounded-circle mr-3">'+response[i].cliente_nome[0]+'<!-- <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg"> --></a><!-- <div class="media-body"><span class="mb-0 text-sm"></span></div> --></div></td><td><div class="media align-items-center" id="clientenome">'+response[i].cliente_nome+'</div></td><td><div class="media align-items-center" id="clientetelefone">'+response[i].cliente_telefone+'</div></td><td><div class="media align-items-center" id="clientenascimento">'+response[i].cliente_nascimento+'</div> </td><td><div class="media align-items-center" id="clienterazao">'+response[i].cliente_razao+'</div></td><td><div class="media align=items-center" id="clientecpfj">'+response[i].cliente_cpfj+'</div></div></td></td><td><div class="media align-items-center" id="clienteendereco">'+response[i].cliente_endereco+'</div></td><td><div class="media align-items-center" id="clientecidade">'+response[i].cliente_cidade+'</div></td><td><div class="media align-items-center" id="clienteestado">'+response[i].cliente_estado+'</div></td><td><div class="media align-items-center">CEP</div></td><!-- Menu Action --><td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" id="deletarcliente" cliente_id="'+response[i].cliente_id+'" href="#">Deletar</a><a class="dropdown-item" href="#" id="editarcliente" cliente_id="'+response[i].cliente_id+'">Editar</a><a class="dropdown-item"id="addpagamento" href="#" cliente_id="'+response[i].cliente_id+'">Adicionar Pagamento</a></div></div></td></tr>'; return table; }

                if(val > 0){
                  for(var i=0;i<val;i++){
                      table = crearTable(table,response,i);
                  }
                  var qntcliente = $(".table-responsive").attr('row');
                  var totalpages =  Math.round(qntcliente/8);
                     function crearPagination(totalpages) {
                        pagination = '';     
                        pagination += '<nav aria-label="">';
                        pagination += '<ul class="pagination">';
                        pagination += '  <li class="page-item">';
                        pagination += '    <a class="page-link" href="#" id="previous">';
                        pagination +=  '      <i class="fa fa-angle-left"></i>';
                        pagination += '      <span class="sr-only">Previous</span>';
                        pagination +='    </a>';
                        pagination +='  </li>';
                        for(var i = 1; i <= totalpages ;i++){
                            //console.log(totalpages);
                            pagination +='  <li class="page-item">';
                            pagination +='    <a class="page-link" id="'+i+'">'+i+' <span class="sr-only">(current)</span></a>';
                            pagination +='  </li>';
                        }
                        pagination +=' <li class="page-item">';
                        pagination +='    <a class="page-link" id="next">';
                        pagination +='      <i class="fa fa-angle-right"></i>';
                        pagination +='      <span class="sr-only">Next</span>';
                        pagination +='    </a>';
                        pagination +='  </li>';
                        pagination +='</ul>';
                        pagination +='</nav>';

                        return pagination;
                      }
                  //quantidade de clientes cadastrados
                  $("#listacliente").empty();
                  $("#listacliente").append(table);
                  var pagination = crearPagination(totalpages);
                  $("#pagination").empty();
                  $("#pagination").append(pagination);
                  var table = '';
                  console.log(table);
                  console.log(pagination);
                  $("a#editarcliente").click(function(e){
                    e.preventDefault();
                    clienteid= $(this).attr('cliente_id');
                      $.ajax({
                        method: 'POST',
                        data: {Painel:'editarcliente',idcliente: clienteid},
                        dataType: 'JSON',
                        url:'functions/Painel.func.php',
                        success:  function(response){
                          console.log(response);
                          titulomodal.html('');
                            modal_icon.html('');
                            var html=''; 
                            paragrafo.html('');
                          modal_title.html("Editar Cliente");
                            titulomodal.append("Editar");
                            $(".modal-footer").html("<button type='button'); return false;' class='btn btnmodaleditcliente btn-secondary'  data-dismiss='modal' ><a>Cadastrar</a></button>");
                            html+= "<form>";
                            html+= "<div class='row'>";
                            html+= "<div class='col-md-6'>";
                            html+= "<div class='form-group'>"
                            html+= "<input type='text' class='form-control' id='exampleFormControlInput1' value='"+response[0].cliente_nome+"'>";
                            html+= "</div>";
                            html+= "</div>";
                            html+= "<div class='col-md-6'>";
                            html+= "<div class='form-group'>";
                            html+= "<input type='text' placeholder='Regular' class='form-control' />";
                            html+= "</div>";
                            html+= "</div>";
                            html+= "</div></form>";
                            paragrafo.append(html);
                            openmodal();
                        }          
                        
                      });
                            

                  });
                  $("a#deletarcliente").click(function(e){
                        e.preventDefault();
                        
                        clienteid= $(this).attr('cliente_id');
                      // var clientenome = $("#clientenome").val();
                      // var clientetelefone = $("#clientetelefone").val();
                      // var clientenascimento = $("#clientenascimento").val();
                      // var clienterazao = $("#clienterazao").val();
                      // var clienteendereco = $("#clienteendereco").val();
                      // var clientecidade = $("#clientecidade").val();
                      // var clienteestado = $("#clienteestado").val();
                      // var clientecep = $("#clientecep").val();
                      // var clientecpfj = $("#clientecpfj").val();
                        $.ajax({
                          method: 'POST',
                          data:{Painel:'excluir', idcliente: clienteid},
                          url: 'functions/Painel.func.php',
                          success: function(response){
                            var html='';
                            if(response == true){
                            // titulomodal.html('');
                            // modal_icon.html("");
                            // modal_icon.append("<i class='far fa-check-circle'></i>");
                            // paragrafo.html('');
                            // titulomodal.append("Deletado com sucesso!");
                            // paragrafo.append("Cliente deletado com sucesso!");
                            // openmodal();
                            
                            html+= '<div class="animated slideInRight animate alert alert-success alert-dismissible fade show" role="alert>';
                            html+= '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>';
                            html+= ' <span class="alert-inner--text"><strong>Success!</strong> This is a success alert—check it out!</span>';
                            html+= ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            html+= '    <span aria-hidden="true">&times;</span></button></div>';
                            $(".master_section").append(html);
                              sleep(700).then(()=>{location.reload();});
                            }else{

                            }
                          }
                        });
                    
                        
                      
                        //alert(clienteid);
                      });
                }else{
                    $(document).ready(function(){
                            titulomodal.html('');
                            modal_icon.html("");
                            paragrafo.html('');
                            modal_icon.append("<i class='fas fa-exclamation-triangle'></i>");
                            titulomodal.append("Nenhum Registro encontrado");
                            $(".modal-footer").append("<button type='button' onclick='history.pushState(null,'$url[0]','cadastrarClientes'); return false;' class='btn btnmodalcadcliente btn-secondary'  data-dismiss='modal' href='cadastrarClientes'><a href='cadastrarClientes'>Cadastrar</a></button>")
                            paragrafo.append("Nenhum registro encontrado, caso queira incluir algum registro clique em Cadastrar");
                            openmodal();

                    });
                            
                }
              }
            });
            
            
          }
    
  });
</script>