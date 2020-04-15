<?php
include '../config.php';
include $path.'Conexao.class.php';

$con = new Conexao;

if($_REQUEST){
    $params = $_REQUEST['data'];
    print_r($params);
    $sql = "INSERT INTO clienteteste (nome,email,dataregistro) values (?,?,NOW())";
        $query = $con->query($sql,array($params['nome'],$params['email']));
        if($query){
            return json_encode(true);
        }else{
            return json_encode(true);
        }

}

?>