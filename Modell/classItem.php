<?php
class Item{
  private $idItem;
  private $nome_item;
  private $preco;
  private $valor;
  private $codigo;
  private $sexo;
  private $categ_item;
  private $imagem;
  private $descricao;

  public function __construct($idItem=0, $nome_item="", $preco="", $valor="", $codigo="",  $sexo="", $categ_item="", $imagem="", $descricao=""){
    $this->idItem = $idItem;
    $this->nome_item = $nome_item;
    $this->preco = $preco;
    $this->valor = $valor;
    $this->codigo = $codigo;
    $this->sexo = $sexo;
    $this->categ_item = $categ_item;
    $this->imagem = $imagem;
	  $this->descricao = $descricao;
  }
  public function setIdItem($idItem){
    $this->idItem = $idItem;
  }
  public function getIdItem(){
    return $this->idItem;
  }
  public function setNome_item($nome_item){
    $this->nome_item = $nome_item;
  }
  public function getNome_item(){
    return $this->nome_item;
  }
  public function setPreco($preco){
    $this->preco = $preco;
  }
  public function getPreco(){
    return $this->preco;
  }
  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }
  public function getCodigo(){
    return $this->codigo;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }
  public function getValor(){
    return $this->valor;
  }
   public function setSexo($sexo){
    $this->sexo = $sexo;
  }
  public function getSexo(){
    return $this->sexo;
  }
   public function setCateg_item($categ_item){
    $this->categ_item = $categ_item;
  }
  public function getCateg_item(){
    return $this->categ_item;
  }
   public function setImagem($imagem){
    $this->imagem = $imagem;
  }
  public function getImagem(){
    return $this->imagem;
  }
  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }
  public function getDescricao(){
    return $this->descricao;
  }
}
 ?>
