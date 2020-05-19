<?php
class Loja{
    private $idLoja;
    private $razao;
    private $cnpj;
    private $fone;
    private $email;
    private $endereco;

    public function __construct($idLoja=0, $razao="", $cnpj="", $fone="", $email="", $endereco=""){
        $this->idLoja = $idLoja;
        $this->razao = $razao;
        $this->cnpj = $cnpj;
        $this->fone = $fone;
        $this->email = $email;
        $this->endereco = $endereco;
    }
    public function setIdLoja($idLoja){
        $this->idLoja = $idLoja;
    }
    public function getIdLoja(){
        return $this->idLoja;
    }
    public function setRazao($razao){
        $this->razao = $razao;
    }
    public function getRazao(){
        return $this->razao;
    }
     public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function setFone($fone){
        $this->fone = $fone;
    }
    public function getFone(){
        return $this->fone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function getEndereco(){
        return $this->endereco;
    }
}
?>