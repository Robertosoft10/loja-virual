<?php
class Sexo_categ{
  private $idSexo;
  private $imagem_femin;
  private $imagem_masc;
  private $texto_femin;
  private $texto_masc;

  public function __construct($idSexo=0, $imagem_femin="",  $imagem_masc="", $texto_femin="", $texto_masc=""){
    $this->idSexo = $idSexo;
    $this->imagem_femin = $imagem_femin;
    $this->imagem_masc = $imagem_masc;
     $this->texto_femin = $texto_femin;
    $this->texto_masc = $texto_masc;;
  }
  public function setIdSexo($idSexo){
    $this->idSexo = $idSexo;
  }
  public function getIdSexo(){
    return $this->idSexo;
  }
  public function setImagem_femin($imagem_femin){
    $this->imagem_femin = $imagem_femin;
  }
  public function getImagem_femin(){
    return $this->imagem_femin;
  }
  public function setImagem_masc($imagem_masc){
    $this->imagem_masc = $imagem_masc;
  }
  public function getImagem_masc(){
    return $this->imagem_masc;
  }
  public function setTexto_femin($texto_femin){
    $this->texto_femin = $texto_femin;
  }
  public function getTexto_femin(){
    return $this->texto_femin;
  }
  public function setTexto_masc($texto_masc){
    $this->texto_masc = $texto_masc;
  }
  public function getTexto_masce(){
    return $this->texto_masc;
  }
}
 ?>
