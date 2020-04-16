<?php
namespace model;
use sys\Conexao;
class Clientes{
    
    private $c_id;
    private $c_nome;
    private $c_nascimento;
    private $c_endereco;
    private $c_cidade;
    private $c_estado;
    private $c_cep;
    private $c_cpfj;
    private $c_telefone;
    private $c_status;
    private $c_razao;
    //private $data= array($this->c_nome,$this->c_razao,$this->c_telefone,$this->c_endereco,$this->c_cidade,$this->c_estado,$this->c_cep,$this->c_cpf_j);

    public function setId($id){
        $this->c_id= $id; 
    }
    public function getId(){
        return $this->c_id;
    }
    public function setNome($nome){
        $this->c_nome = $nome;
    }
    public function getNome(){
        return $this->c_nome;
    }
    public function setNascimento($nascimento){
        $this->c_nascimento = $nascimento;
    }
    public function getNascimento(){
        return $this->c_nascimento;
    }
    public function setEndereco($endereco){
        $this->c_endereco = $endereco;
    }
    public function getEndereco(){
        return $this->c_address;
    }

    public function setRazao($razao){
        $this->c_razao = $razao;
    }
    public function getRazao(){
       return $this->c_razao;
    }
    
    public function setCpfj($cpfj){
        $this->c_cpfj = $cpfj;
    }
    public function getCpfj(){
        return $this->c_cpfj;
    }

    public function setTelefone($telefone){
        $this->c_telefone = $telefone;
    }
    public function getTelefone(){
       return $this->c_telefone;
    }

    public function setStatus($status){
        $this->c_status = $status;
    }
    public function getStatus(){
        return $this->c_status;
    }

    public function setCidade($cidade){
        $this->c_cidade = $cidade;
    }

    public function getCidade(){

        return $this->c_cidade;

    }

    


    public function setEstado($estado){
        $this->c_estado = $estado;
    }
    public function getEstado(){

        return $this->c_estado;

    }

    public function setCep($cep){
        $this->c_cep = $cep;
    }
    public function getCep(){

        return $this->c_cep;

    }

    public function countCliente(){
        $con = new Conexao;
        $sql= "SELECT * FROM cliente ORDER BY nome ASC";
        $query = $con->query($sql);
        return $query;
    }

    public function listarCliente($option){
        $con = new Conexao;

        $order = $option['order'];
        if($option['page'] == ''){
            $page = 1;
        }else{
            $page = $option['page'];
        }

            $startlimit = 0;
            $maxlimit=8;

            //print_r($page);
            $start_from = ($page -1) * $maxlimit;
            //print_r($start_from);
            $sql= "SELECT * FROM cliente ORDER BY $order ASC LIMIT $start_from, $maxlimit";
        
        
        $query = $con->query($sql);
        return $query;
    }
    public function cadCliente(){

        $con = new Conexao;

        $sql = "INSERT INTO cliente (nome,razao,telefone,endereco,cidade,estado,cep,cpf_j,nascimento,dataregistro) values (?,?,?,?,?,?,?,?,?,NOW())";
        $query = $con->query($sql,array($this->c_nome,$this->c_razao,$this->c_telefone,$this->c_endereco,$this->c_cidade,$this->c_estado,$this->c_cep,$this->c_cpfj,$this->c_nascimento ));
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function editarCliente($id){

        $con = new Conexao;

        $sql = "UPDATE FROM cliente (nome = ?,razao = ?,telefone = ?,endereco = ?, cidade = ?, estado = ? cep = ?, cpf_j = ?, nascimento =?) WHERE id = ? ";
        $query = $con->query($sql,array($this->c_nome,$this->c_razao,$this->c_telefone,$this->c_endereco,$this->c_cidade,$this->c_estado,$this->c_cep,$this->c_cpfj,$this->c_nascimento));

    }

    public function listCliente(){
        $con = new Conexao;

        $sql= "SELECT * FROM cliente WHERE id = ?";
        $query= $con->query($sql,array($this->c_id));
        return $query;
    }

    public function deletarCliente(){

        $con = new Conexao;
        $sql = "DELETE FROM cliente WHERE id =?";

        $query = $con->query($sql,array($this->c_id));
        if($query){
            die(true);

        }else{
            die(false);
        }
        

    }

}

?>