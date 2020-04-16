<?php  
namespace functions;
// include '../config.php';
include $path.'autoload.php';

use model\User;
	if(isset($_POST['form']) && ($_POST['form'] == 'logar') && (($_POST['username'] != '') && ($_POST['password'] != ''))){

		if(!empty($_POST["remember"])) {
			setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			if(isset($_COOKIE["member_login"])) {
				setcookie ("member_login","");
		}
		$response = array('success' => false);
		$username = $_POST['username'];
		$senha = $_POST['password'];
		$array = array($username,$senha);	
		
		function set($user,$array){
			$user->setUsername($array[0]);
			$user->setSenha($array[1]);
			return true;
		}
		$user = new User;
		$executeLogin = set($user,$array);
		
		if($executeLogin == true){
			$log = $user->login();
			$result = $log->rowCount();
			if($result == 1){
				$sessao = $log->fetch(\PDO::FETCH_ASSOC);
				$_SESSION['user'] = $sessao;
				$response = array("success" => true, "user" => $_SESSION['user'], "cookie" => $_COOKIE['memeber_login']);
				
				die(json_encode($response));		
			}else{
				
				die(json_encode($response));	
			}
		}
		//$getLogin = array($user->getUsername(),$user->getSenha());
	}
?>