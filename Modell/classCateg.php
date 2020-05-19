<?php
class Categ{
  private $idCateg;
  private $categoria;

  public function __construct($idCateg=0, $categoria=""){
    $this->idCateg = $idCateg;
    $this->categoria = $categoria;
  }
  public function setIdCateg($idCateg){
    $this->idCateg = $idCateg;
  }
  public function getIdCateg(){
    return $this->idCateg;
  }
  public function setCategoria($categoria){
    $this->categoria = $categoria;
  }
  public function getCategoria(){
    return $this->categoria;
  }
}
 ?>
