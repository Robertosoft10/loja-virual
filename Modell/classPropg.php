<?php
class Propg{
  private $idProp;
  private $mensagem;
  private $propaganda;
  private $desconto;
  private $imagem_site;

  public function __construct($idProp=0, $mensagem="",  $propaganda="", $desconto="", $imagem_site=""){
    $this->idProp = $idProp;
    $this->mensagem = $mensagem;
    $this->propaganda = $propaganda;
     $this->desconto = $desconto;
    $this->imagem_site = $imagem_site;;
  }
  public function setIdProp($idProp){
    $this->idProp = $idProp;
  }
  public function getIdProp(){
    return $this->idProp;
  }
  public function setMensagem($mensagem){
    $this->mensagem = $mensagem;
  }
  public function getMensagem(){
    return $this->mensagem;
  }
  public function setPropaganda($propaganda){
    $this->propaganda = $propaganda;
  }
  public function getPropaganda(){
    return $this->propaganda;
  }
  public function setDesconto($desconto){
    $this->desconto = $desconto;
  }
  public function getDesconto(){
    return $this->desconto;
  }
  public function setImagem_site($imagem_site){
    $this->imagem_site = $imagem_site;
  }
  public function getImagem_site(){
    return $this->imagem_site;
  }
}
 ?>
