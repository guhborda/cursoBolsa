<?php
    include 'classes/Conexao.class.php';
	class Preregistro
	{
		public function cadastrar()
		{
			if($_REQUEST['data']){
				$params = $_REQUEST['data'];
				
			}
			//var_dump($params);
            $con = new Conexao();
            $sql = "INSERT INTO clienteteste (nome,email,dataregistro) values (?,?,NOW())";
			$result = $con->query($sql,array($params['nome'],$params['email']));
			$resultado = false;
			if($result){
				$resultado = true;
				return $resultado;
			}else{
				return $resultado;
			}
		}
    }
    
?>