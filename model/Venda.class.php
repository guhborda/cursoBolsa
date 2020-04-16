<?php

namespace model;
use sys\Conexao;
class Movimentacao{
    private $value;
    private $desc;
    private $user_id;
    private $date;
    private $id;

    function setValue($val){
        $this->value = $val;
    }
    function getValue(){
        return $this->value;
    }

    function setDescricao($val){
        $this->desc = $val;
    }
    function getDescricao(){
        return $this->desc;
    }

    function setUser($val){
        $this->user_id = $val;
    }
    function getUser(){
        return $this->user_id;
    }

    function setDate($val){
        $this->date = $val;
    }
    function getDate(){
        return $this->date;
    }
    
    function setAccount($val){
        $this->ac_id = $val;
    }
    function getAccount(){
        return $this->ac_id;
    }

}
?>