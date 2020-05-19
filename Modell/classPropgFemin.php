<?php
class PropgFemin{
  private $idProFemin;
  private $titulo;
  private $imagem_femin;

  public function __construct($idProFemin=0, $titulo="",  $imagem_femin=""){
    $this->idProFemin = $idProFemin;
    $this->titulo = $titulo;
    $this->imagem_femin = $imagem_femin;
  }
  public function setIdProFemin($idProFemin){
    $this->idProFemin = $idProFemin;
  }
  public function getIdProFemin(){
    return $this->idProFemin;
  }
  public function setTitulo($titulo){
    $this->titulo = $titulo;
  }
  public function getTitulo(){
    return $this->titulo;
  }
  public function setImagem_femin($imagem_femin){
    $this->imagem_femin = $imagem_femin;
  }
  public function getImagem_femin(){
    return $this->imagem_femin;
  }
}
 ?>
