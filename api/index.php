<?php
header('Content-Type: application/json; charset=utf-8');
include('../config.php');
require_once 'classes/Preregistro.class.php';
if($auth == true){

	
class Rest
{
	public static function open($requisicao)
	{
		$url = explode('/', $requisicao['url']);
		
		$classe = ucfirst($url[0]);
		array_shift($url);

		$metodo = $url[0];
		array_shift($url);
		if($_REQUEST['data']){
			$params = $_REQUEST['data'];
		}
		try{
			if (class_exists($classe)) {
				if (method_exists($classe, $metodo)) {
					$retorno = call_user_func_array(array(new $classe, $metodo), $params);

					return json_encode(array('status' => 'sucesso', 'dados' => $retorno));
				} else {
					return json_encode(array('status' => 'erro', 'dados' => 'Método inexistente!'));
				}
			} else {
				return json_encode(array('status' => 'erro', 'dados' => 'Classe inexistente!'));
			}	
		}catch (Exception $e) {
			return json_encode(array('status' => 'erro', 'dados' => $e->getMessage()));
		}
		
	}
}

	if (isset($_REQUEST)){
		echo Rest::open($_REQUEST);
	}else{
		return false;
	}
}else{
	header('location: ../index.php');
}

?>