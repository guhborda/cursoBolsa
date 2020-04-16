<?php
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
    session_unset();
    $response = array('Mensagem' => "Conexao Finalizada com Sucesso",'Status' => "Logged Out",'Error' => "");
}else{
    $response = array('Mensagem' => "Conexao não existente",'Status' => "Desconectado",'Error' => "Necessário Logar primeiro");
}
echo json_encode($response);

?>