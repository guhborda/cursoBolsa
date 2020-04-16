<?php

include '../../config.php';
if($auth == false){
?>
<container class="login_form">
<form class="login__form" id="login-form" name="frm_login" action="">
   <header class="login__header">
      <h1 class="login__title">Login</h1>
   </header>
   <main class="login__main">
      <div class="login__group">
         <input class="login__input" type="text" name="input_email" id="username" required>
         <label class="login__label">Email </label>
         <div class="login__bar"></div>
      </div>
      <div class="login__group">
         <input class="login__input" type="password" name="input_password" id="password" required>
         <label class="login__label">Password </label>
         <div class="login__bar"></div>
      </div>
      <p class="login__terms">By signing up or clicking continue, I confirm that I haveread and agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></p>
   </main>
   <footer class="login__footer">
     <button class="login__button " name="btn_signin" ><span class="loading">LOGIN</span></button>
   </footer>
</form>
<script>
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
$(document).ready(function(){
  $('#login-form').submit(function(e){
e.preventDefault();
  console.log('logando');
		var username = $('input[type="text"]').val();
		var password = $('input[type="password"]').val();
		var form = 'logar';
		if(username == '' && password == ''){
			$('.login__input').css({'border': '1px solid #00b388'});
			$('.login__input').css({'border': '1px solid red'});
		}else if(username == '')
			{
				$('#username, #password').css({'border': '1px solid #00b388'});
				
				
			}else if(password == ''){
				
				$('.username, .senha').css({'border': '1px solid #00b388'});

				$('.senha').css({'border': '1px solid red'});
			}else{
				$('.username, .senha').css({'border': '1px solid #00b388'});
				$('.loading').html('<div class="load-wrapp"><div class="load-3"><div class="line"></div><div class="line"></div><div class="line"></div></div></div>');
				sleep(1700).then(()=>{
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
				});
			}
		return false;
	});
});
</script>
</container>
<?php
}else{
	echo "<script>$('.master_section').load('view/dashboard.view.php');</script>";
}
?>