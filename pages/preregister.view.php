<?php
header("Access-Control-Allow-Origin", "*");
    //include 'structure/navbar.php';
  ?>
<div class="main-content bg-default" page="preregister" style="margin-left:0;">
    <!-- Header -->
    <div class="header bg-default py-7 py-lg-8 pt-lg-9" style="padding-top: 50px !important;">
    <img class="imgHeader" src="https://www.btgpactualdigital.com/wp-content/uploads/2018/08/technical-financial-graph-on-technology-abstract-background-picture-id926051128.jpg" alt="">

      <div class="container">
        <div class="header-body text-center mb-7">


          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Pré-Registro</h1>
              <p class="text-lead text-white">Demonstre seu interesse no curso</p>
              <p class="text-lead text-white">Faça seu Pré-Registro AGORA</p>
              <span class="text-white">e saiba com antecedência o dia de abertura da inscriçãoas vagas são limitadas!</span>  



            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-2">
              <div class="text-muted text-center mt-2 mb-3" style="font-size: 20px;">Pré-Registro</div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <form id="preregister">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nome e Sobrenome" type="text" id="nome">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input class="form-control" placeholder="E-mail" type="email" id="email">
                  </div>
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-primary my-4" id="btnRegister" value="Registro"></button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            
          </div>
        </div>
      </div>
    </div>
  </div>



<style>
    .header{
        overflow:hidden;
        position: relative;
    }
    .imgHeader{
    position:absolute;
    top:0;
    /* background-image: url('https://www.btgpactualdigital.com/wp-content/uploads/2018/08/technical-financial-graph-on-technology-abstract-background-picture-id926051128.jpg') !important; */
    /* background-repeat: no-repeat !important; */
    width: 100% !important;
    height: 100% !important;
    opacity: 0.3;
    filter: blur(2px) !important;
}

</style>
<?php
include 'structure/footer.php';
?>
<script>
$('#preregister').submit(function(e){

        e.preventDefault();

        var nome = $('#nome').val();
        var email = $('#email').val();
        if( (nome != '') || (email != '')){
          $.ajax({
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
          url: 'functions/inscrever.php',
          dataType:'JSON',
          method: "POST",
          data: {data:{nome,email}},
          beforeSend: function(){
            console.log('sending');
          },
          success: function(response){
                      if(response.dados == true){
                          console.log('cadastrado com Sucesso');
                      }else{
                        console.log(response);
                      }
                  }
          });
        }else{

          console.log('campos obrigatorios');

        }
        // $.get('https://gustavoborda.com',{
        //   url: 'functions/inscrever.php',
        //   dataType:'JSON',
        //   method: "POST",
        //   data: {data:{nome,email}},
        //   beforeSend: function(){
        //     console.log('sending');
        //   },
        //   success: function(response){
        //     if(response == true){
        //         console.log('cadastrado com Sucesso');
        //     }else{

              

        //       console.log(response);
        //     }
        //   });
        
        
    }); 
</script>