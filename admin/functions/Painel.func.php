<?php
namespace functions;
include '../autoload.php';
use model\Movimentacao;
use model\Clientes;
session_start();
$options=['listarcliente','Inserir cliente','excluir','transferir','sair'];
$response=array();
switch($_POST['Painel']){

    case 'Inserircliente':
        
    if(isset($_POST['value'])){
        $response = array("success"=>false);
        
        // $nome,$razao,$endereco,$cidade,$estado,$telefone,$cep,$cpfj,$nascimento;
        $nome = $_POST['value']['nome'];
        $razao = $_POST['value']['razao'];
        $endereco = $_POST['value']['endereco'];
        $cidade = $_POST['value']['cidade'];
        $estado = $_POST['value']['estado'];
        $telefone = $_POST['value']['telefone'];
        $cep = $_POST['value']['cep'];
        $cpfj = $_POST['value']['cpfj'];
        $nascimento = $_POST['value']['nascimento'];
        $data = array('nome'=>$nome,'razao'=>$razao,'endereco'=>$endereco,'cidade'=>$cidade,'estado'=>$estado,'telefone'=>$telefone,'cep'=>$cep,'cpfj'=>$cpfj,'nascimento'=>$nascimento);
        //echo json_encode($data);
        
        function set($cliente,$data){
            $cliente->setNome($data['nome']);
            $cliente->setRazao($data['razao']);
            $cliente->setEndereco($data['endereco']);
            $cliente->setCidade($data['cidade']);
            $cliente->setEstado($data['estado']);
            $cliente->setTelefone($data['telefone']);
            $cliente->setCep($data['cep']);
            $cliente->setCpfj($data['cpfj']);
            $cliente->setNascimento($data['nascimento']);
            return true;
        }
        $cliente = new Clientes;
        $executeCad = set($cliente,$data);
        if($executeCad == true){
            // print_r($cliente->getNome());
            // print_r($cliente->getTelefone());
    
            $log = $cliente->cadCliente();
    
             if($log==true){
                 
               $response = array("success" => true);
               die(json_encode($response));
              }else{
                 die(json_encode($response));
              }
        }else{
            echo 'erro não foi possivel';
        }
          //$getLogin = array($user->getUsername(),$user->getSenha());
            
    }
    
        
    break;
    case 'contarcliente':
        $cliente = new Clientes;
        $row = $cliente->countCliente();
        $totalcliente= $row->rowCount();
        die(json_encode($totalcliente));
    break;
    case 'listarcliente':
        $cliente = new Clientes;
            $option = $_POST['option'];
            $row = $cliente->listarCliente($option);
        
        //print_r ($_POST['option']);
        $totalpages = $row->rowCount();
        
        if($row->rowCount() > 0){ 
        
            while($rows = $row->fetch(\PDO::FETCH_ASSOC)){
                $cliente_id=$rows['id'];
                $cliente_nome =$rows['nome']; 
                $cliente_telefone =$rows['telefone']; 
                $cliente_razao =$rows['razao'];
                $cliente_endereco =$rows['endereco'];  
                $cliente_cidade =$rows['cidade']; 
                $cliente_estado =$rows['estado'];
                $cliente_cep =$rows['cep'];
                $cliente_cpfj =$rows['cpf_j'];  
                $cliente_nascimento =$rows['nascimento']; 
                $query = array('cliente_id'=>$cliente_id,'cliente_nome'=>$cliente_nome,'cliente_telefone'=>$cliente_telefone,'cliente_razao'=>$cliente_razao,'cliente_endereco'=>$cliente_endereco,'cliente_cidade'=>$cliente_cidade,'cliente_estado'=>$cliente_estado,'cliente_cep'=>$cliente_cep,'cliente_cpfj'=>$cliente_cpfj,'cliente_nascimento'=>$cliente_nascimento);
                $response[] = $query;

            }
            die(json_encode($response));        
         }else{
             $response = false;
             die(json_encode($response));
         }
        
    break;
    case 'excluir':
        $clienteid = $_POST['idcliente'];
        $cliente = new Clientes;
        $cliente->setId($clienteid);

        $action = $cliente->deletarCliente();
         if($action){
             $response = ['success'=> true];
            die(json_encode($response));
         }else{
            $response = ['success'=> false];
         }
    
         

    break;
    
    case 'editarcliente':
        $clienteid = $_POST['idcliente'];
        $cliente = new Clientes;
        $cliente->setId($clienteid);
        $result = $cliente->listCliente();

        if($result->rowCount() > 0){ 
        
            while($rows = $result->fetch(\PDO::FETCH_ASSOC)){
                $cliente_id=$rows['id'];
                $cliente_nome =$rows['nome']; 
                $cliente_telefone =$rows['telefone']; 
                $cliente_razao =$rows['razao'];
                $cliente_endereco =$rows['endereco'];  
                $cliente_cidade =$rows['cidade']; 
                $cliente_estado =$rows['estado'];
                $cliente_cep =$rows['cep'];
                $cliente_cpfj =$rows['cpf_j'];  
                $cliente_nascimento =$rows['nascimento']; 
                $query = array('cliente_id'=>$cliente_id,'cliente_nome'=>$cliente_nome,'cliente_telefone'=>$cliente_telefone,'cliente_razao'=>$cliente_razao,'cliente_endereco'=>$cliente_endereco,'cliente_cidade'=>$cliente_cidade,'cliente_estado'=>$cliente_estado,'cliente_cep'=>$cliente_cep,'cliente_cpfj'=>$cliente_cpfj,'cliente_nascimento'=>$cliente_nascimento);
                $response[] = $query;
            }
            die(json_encode($response));        
         }else{
             $response = false;
             die(json_encode($response));
         }
    break;  
     default:
        echo 'opçao nao existe';
    break;
 }

?>