<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classitem.php';

	class ItemDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertItem($item){

            $nome_item = $item->getNome_item();
            $preco = $item->getPreco();
            $valor = $item->getValor();
            $codigo = $item->getCodigo();
            $sexo = $item->getSexo();
            $categ_item = $item->getCateg_item();
            $imagem = $item->getImagem();
            $descricao = $item->getDescricao();
            if(isset($_FILES['imagem'])){
           $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
           $novoNome = sha1(time()) . $extensao;
           $diretorio = "../Images/itens/";
           move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novoNome);

            $sql = "INSERT INTO tb_itens (nome_item, preco, valor, codigo, sexo, categ_item, imagem, descricao)VALUES('$nome_item', '$preco', '$valor', '$codigo', '$sexo', '$categ_item', '$novoNome', '$descricao')";
            $this->conexao->query($sql);
          }
        }
        public function listItens(){
            $consult = $this->conexao->query("SELECT * FROM tb_itens");
			$arrayItens = array();
			while ($row = mysqli_fetch_array($consult)) {
            $item = new Item($row['idItem'], $row['nome_item'], $row['preco'], $row['valor'], $row['codigo'], $row['sexo'], $row['categ_item'], $row['imagem'], $row['descricao']);
				array_push($arrayItens, $item);
			}
			return $arrayItens;
        }
        public function riquestItem($idItem){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_itens WHERE idItem = '$idItem'");
            $item = new Item($row['idItem'], $row['nome_item'], $row['preco'], $row['valor'], $row['codigo'], $row['sexo'], $row['categ_item'], $row['imagem'], $row['descricao']);
            return $item;
        }
        public function updateItem($item){

          $idItem = $item->getIdItem();
          $nome_item = $item->getNome_item();
          $preco = $item->getPreco();
          $valor = $item->getValor();
          $codigo = $item->getCodigo();
          $sexo = $item->getSexo();
          $categ_item = $item->getCateg_item();
          $descricao = $item->getDescricao();

          $sql = "UPDATE tb_itens SET nome_item='$nome_item', preco='$preco', valor='$valor', codigo='$codigo', sexo='$sexo', categ_item='$categ_item', descricao='$descricao' WHERE idItem ='$idItem'";

          $this->conexao->query($sql);
        }
        public function deleteItem($idItem){
            $sql = "DELETE FROM tb_itens WHERE idItem = '$idItem'";
            $this->conexao->query($sql);
        }
    }
?>
