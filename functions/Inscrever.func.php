<?php
namespace functions;
include '../../config.php';
include $path.'autoload.php';
use model\User;

if($_REQUEST){
    $params = $_REQUEST['data'];
    print_r($_REQUEST);
    $con = new Conexao;
    $sql = "INSERT INTO clienteteste (nome,email,dataregistro) values (?,?,NOW())";
        $query = $con->query($sql,array($params['nome'],$params['email']));
        if($query){
            echo json_encode(true);
            header("location: ../index.php");
        }else{
            echo json_encode(true);
        }

}

?>