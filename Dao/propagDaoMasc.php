<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classPropgMasc.php';

	class PropgMascDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertPropgMasc($propgMasc){

            $titulo = $propgMasc->getTitulo();
            $imagem_masc = $propgMasc->getImagem_masc();
            if(isset($_FILES['imagem_masc'])){
                $extensao = strtolower(substr($_FILES['imagem_masc']['name'], -4));
                $novoNome = sha1(time()) . $extensao;
                $diretorio = "../Images/masc/";
                move_uploaded_file($_FILES['imagem_masc']['tmp_name'], $diretorio.$novoNome);

            $sql = "INSERT INTO tb_propaganda_masc (titulo, imagem_masc)VALUES('$titulo', '$novoNome')";
            $this->conexao->query($sql);
        } 
    }
        public function listPropgMasc(){
            $consult = $this->conexao->query("SELECT * FROM tb_propaganda_masc");
			$arrayPropgMascs = array();
			while ($row = mysqli_fetch_array($consult)) {
            $propgMasc = new PropgMasc($row['idProMasc'], $row['titulo'], $row['imagem_masc']);
				array_push($arrayPropgMascs, $propgMasc);
			}
			return $arrayPropgMascs;
        }
        public function riquestPropgMasc($idProMasc){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_propaganda_masc WHERE idProMasc = '$idProMasc'");
           $propgMasc = new PropgMasc($row['idProMasc'], $row['titulo'], $row['imagem_masc']);
            return $propgMasc;
        }
        public function updatePropgMasc($propgMasc){

            $idProMasc = $propgMasc->getIdProMasc();
            $titulo = $propgMasc->getTitulo();
          $sql = "UPDATE tb_propaganda_masc  SET titulo='$titulo' WHERE idProMasc = '$idProMasc'";
          $this->conexao->query($sql);
        }
        public function deletePropgMasc($idProMasc){
            $sql = "DELETE FROM tb_propaganda_masc WHERE idProMasc = '$idProMasc'";
            $this->conexao->query($sql);
        }
    }
?>
