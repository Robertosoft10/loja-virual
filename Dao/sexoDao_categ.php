<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classSexo_caget.php';

	class Sexo_categDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertSexo_categ($sexo_categ){

            $imagem_femin = $sexo_categ->getImagem_femin();
            $imagem_masc = $sexo_categ->getImagem_masc();
            $texto_femin = $sexo_categ->getTexto_femin();
            $texto_masc = $sexo_categ->getTexto_masc();
            if(isset($_FILES['imagem_site'])){
                $extensao = strtolower(substr($_FILES['imagem_site']['name'], -4));
                $novoNome = sha1(time()) . $extensao;
                $diretorio = "../Images/loja/";
                move_uploaded_file($_FILES['imagem_site']['tmp_name'], $diretorio.$novoNome);

            $sql = "INSERT INTO tb_propaganda (mensagem, propaganda, desconto,  imagem_site)VALUES('$mensagem', '$propaganda', '$desconto', '$novoNome')";
            $this->conexao->query($sql);
        } 
    }
        public function listPropg(){
            $consult = $this->conexao->query("SELECT * FROM tb_propaganda");
			$arrayPropgs = array();
			while ($row = mysqli_fetch_array($consult)) {
            $propg = new Propg($row['idProp'], $row['mensagem'], $row['propaganda'], $row['desconto'], $row['imagem_site']);
				array_push($arrayPropgs, $propg);
			}
			return $arrayPropgs;
        }
        public function riquestPropg($idProp){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_propaganda WHERE idProp = '$idProp'");
            $propg = new Propg($row['idProp'], $row['mensagem'], $row['propaganda'], $row['desconto'], $row['imagem_site']);
            return $propg;
        }
        public function updatePropg($propg){

            $idProp = $propg->getIdProp();
            $mensagem = $propg->getMensagem();
            $propaganda = $propg->getPropaganda();
            $desconto = $propg->getDesconto();
          $sql = "UPDATE tb_propaganda  SET mensagem='$mensagem', propaganda='$propaganda', desconto='$desconto' WHERE idProp = '$idProp'";
          $this->conexao->query($sql);
        }
        public function deletePropg($idProp){
            $sql = "DELETE FROM tb_propaganda WHERE idProp = '$idProp'";
            $this->conexao->query($sql);
        }
    }
?>
