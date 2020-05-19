<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classCateg.php';

	class CategDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertCateg($categ){

            $categoria = $categ->getCategoria();

            $sql = "INSERT INTO tb_categorias (categoria)VALUES('$categoria')";
            $this->conexao->query($sql);
        }
        public function listCategs(){
            $consult = $this->conexao->query("SELECT * FROM tb_categorias");
			$arrayCategs = array();
			while ($row = mysqli_fetch_array($consult)) {
            $categ = new Categ($row['idCateg'], $row['categoria']);
				array_push($arrayCategs, $categ);
			}
			return $arrayCategs;
        }
        public function riquestCateg($idCateg){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_categorias WHERE idCateg = '$idCateg'");
            $categ = new Categ($row['idCateg'], $row['categoria']);
            return $categ;
        }
         public function updateCateg($categ){

            $idCateg = $categ->getIdCateg();
            $categoria = $categ->getCategoria();

          $sql = "UPDATE tb_categorias  SET categoria='$categoria' WHERE idCateg = '$idCateg'";
          $this->conexao->query($sql);
        }
        public function deleteCateg($idCateg){
            $sql = "DELETE FROM tb_categorias WHERE idCateg = '$idCateg'";
            $this->conexao->query($sql);
        }
    }
?>
