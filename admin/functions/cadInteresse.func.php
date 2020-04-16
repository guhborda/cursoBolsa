<?php
namespace functions;
include '../config.php';
include $path.'autoload.php';

use model\Preregistro;

if(isset($_POST['form']) && ($_POST['form'] == 'cadInteresse') && (($_POST['nome'] != '') && ($_POST['email'] != ''))){
    $response = array('success' => false);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $array = array($nome,$email);	
    
    function set($reg,$array){
        $reg->setNome($array[0]);
        $reg->setEmail($array[1]);
        return true;
    }
    $reg = new Preregistro;
    $execute = set($reg,$array);
    
    if($execute == true){
        $result = $reg->cadInteresse();
        
        if($result){
            
            $response = array("success" => true, "response" => $result,"Nome" => $nome);
            
            die(json_encode($response));		
        }else{
            
            die(json_encode($response));	
        }
    }
    //$getLogin = array($user->getUsername(),$user->getSenha());
}
?>

