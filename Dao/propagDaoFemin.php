<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classPropgFemin.php';

	class PropgFeminDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertPropgFemin($propgFemin){

            $titulo = $propgFemin->getTitulo();
            $imagem_femin = $propgFemin->getImagem_femin();
            if(isset($_FILES['imagem_femin'])){
                $extensao = strtolower(substr($_FILES['imagem_femin']['name'], -4));
                $novoNome = sha1(time()) . $extensao;
                $diretorio = "../Images/femin/";
                move_uploaded_file($_FILES['imagem_femin']['tmp_name'], $diretorio.$novoNome);

            $sql = "INSERT INTO tb_propaganda_femin (titulo, imagem_femin)VALUES('$titulo', '$novoNome')";
            $this->conexao->query($sql);
        } 
    }
        public function listPropgFemin(){
            $consult = $this->conexao->query("SELECT * FROM tb_propaganda_femin");
			$arrayPropgFemins = array();
			while ($row = mysqli_fetch_array($consult)) {
            $propgFemin = new PropgFemin($row['idProFemin'], $row['titulo'], $row['imagem_femin']);
				array_push($arrayPropgFemins, $propgFemin);
			}
			return $arrayPropgFemins;
        }
        public function riquestPropgFemin($idProFemin){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_propaganda_femin WHERE idProFemin = '$idProFemin'");
            $propgFemin = new PropgFemin($row['idProFemin'], $row['titulo'], $row['imagem_femin']);
            return $propgFemin;
        }
        public function updatePropgFemin($propgFemin){

            $idProFemin = $propgFemin->getIdProFemin();
            $titulo = $propgFemin->getTitulo();
          $sql = "UPDATE tb_propaganda_femin  SET titulo='$titulo' WHERE idProFemin = '$idProFemin'";
          $this->conexao->query($sql);
        }
        public function deletePropgFemin($idProFemin){
            $sql = "DELETE FROM tb_propaganda_femin WHERE idProFemin = '$idProFemin'";
            $this->conexao->query($sql);
        }
    }
?>
