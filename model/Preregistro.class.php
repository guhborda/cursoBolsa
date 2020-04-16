<?php
namespace model;
use sys\Conexao;
class Preregistro{
    private $p_nome;
    private $p_email;
    private $p_dataregistro;
    public function setNome($nome){
        $this->p_nome = $nome;
    }
    public function getNome(){
        return $this->p_nome;
    }

    public function setEmail($email){
        $this->p_email = $email;
    }
    public function getEmail(){
        return $this->p_email;
    }

    public function cadInteresse(){
        $con = new Conexao;
        $sql = "INSERT INTO clienteteste (nome,email,dataregistro) values (?,?,NOW())";
        $query = $con->query($sql,array($this->getNome(),$this->getEmail()));
        if($query){
            return true;
        }else{
            $error = "não foi possivel consultar";
			return $error;
        }
    }
}

?>