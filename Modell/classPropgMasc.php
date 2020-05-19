<?php
class PropgMAsc{
  private $idProMasc;
  private $titulo;
  private $imagem_masc;

  public function __construct($idProMasc=0, $titulo="",  $imagem_masc=""){
    $this->idProMasc = $idProMasc;
    $this->titulo = $titulo;
    $this->imagem_masc = $imagem_masc;
  }
  public function setIdProMasc($idProMasc){
    $this->idProMasc = $idProMasc;
  }
  public function getIdProMasc(){
    return $this->idProMasc;
  }
  public function setTitulo($titulo){
    $this->titulo = $titulo;
  }
  public function getTitulo(){
    return $this->titulo;
  }
  public function setImagem_masc($imagem_masc){
    $this->imagem_masc = $imagem_masc;
  }
  public function getImagem_masc(){
    return $this->imagem_masc;
  }
}
 ?>
