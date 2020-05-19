<?php
class Usuario{
  private $idUser;
  private $nome_user;
  private $email_user;
  private $senha_user;
  private $nivel_user;

  public function __construct($idUser=0, $nome_user="", $email_user="", $senha_user="", $nivel_user=""){
    $this->idUser = $idUser;
    $this->nome_user = $nome_user;
    $this->email_user = $email_user;
    $this->senha_user = $senha_user;
    $this->nivel_user = $nivel_user;
  }
  public function setIdUser($idUser){
    $this->idUser = $idUser;
  }
  public function getIdUser(){
    return $this->idUser;
  }
  public function setNome_user($nome_user){
    $this->nome_user = $nome_user;
  }
  public function getNome_user(){
    return $this->nome_user;
  }
  public function setEmail_user($email_user){
    $this->email_user = $email_user;
  }
  public function getEmail_user(){
    return $this->email_user;
  }
  public function setSenha_user($senha_user){
    $this->senha_user = $senha_user;
  }
  public function getSenha_user(){
    return $this->senha_user;
  }
   public function setNivel_user($nivel_user){
    $this->nivel_user = $nivel_user;
  }
  public function getNivel_user(){
    return $this->nivel_user;
  }
}
 ?>
