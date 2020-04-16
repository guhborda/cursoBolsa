<?php
header('Content-Type: application/json; charset=utf-8');
include '../config.php';
include $path.'Conexao.class.php';

$con = new Conexao;

if($_REQUEST){
    $params = $_REQUEST['data'];
    $sql = "INSERT INTO clienteteste (nome,email,dataregistro) values (?,?,NOW())";
        $query = $con->query($sql,array($params['nome'],$params['email']));
        if($query){
            echo json_encode(true);
        }else{
            echo json_encode(true);
        }

}

?>