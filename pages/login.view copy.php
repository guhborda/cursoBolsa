<?php

include '../../config.php';
if($auth == false){
	include '../../structure/navbar.php';
?>
<div class="main-content bg-default">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
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
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form" id="login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <input  class="btn btn-primary my-4" type="submit" value="Login" />
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

  $('#login').submit(function(e){
	e.preventDefault();
  		console.log('logando');
		var username = $('input[type="email"]').val();
		var password = $('input[type="password"]').val();
		var form = 'logar';
		if(username == '' && password == ''){
			alert('Nenhum campo pode ser vazio!');
		}else if(username == '')
			{
				$('#username, #password').css({'border': '1px solid #00b388'});
				
				
			}else if(password == ''){
				
				$('.username, .senha').css({'border': '1px solid #00b388'});

        $('.senha').css({'border': '1px solid red'});
        
			}else{
				$('.username, .senha').css({'border': '1px solid #00b388'});
				$('.loading').html('<div class="load-wrapp"><div class="load-3"><div class="line"></div><div class="line"></div><div class="line"></div></div></div>');
				
				$.ajax({
					 	method:'POST',
					  	url:'../functions/Login.func.php',
					  	dataType:'JSON',
					 	data:{ 
					 		username: username,
					  		password: password,
					  		form: form
						},
						
						success: function(response){
							if(response.success == true){
								$(location).attr('href','index.php');
							}else{
								$('.username, .senha').css({'border': '1px solid #00b388'});
									$('.username, .senha').css({'border': '1px solid red'});
									$('.username .input-group-addon,.senha .input-group-addon').css({'color': 'red'});
								sleep(0).then(()=>{
									$('.loading').html('<div class="alert alert-danger"> Usuário ou senha incorretos</div>');
								});
								sleep(1500).then(() => {
									$('.loading').html('LOGIN');
								});
								
							}
						}
			
					});
				
			}
		
	});

</script>
<?php
}else{
	echo "<script>$('.master_section').load('view/dashboard.view.php');</script>";
}
?>