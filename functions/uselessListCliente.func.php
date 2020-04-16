<?php
namespace functions;
include '../autoload.php';
use model\Clientes;


$cliente = new Clientes;
        $row = $cliente->listarCliente();
        $value= $row->rowCount(); 
        
        for($i=0;$i<$value;$i++){
           $query[] = $row->fetch(\PDO::FETCH_ASSOC);
           echo json_encode($query);
        }
?>