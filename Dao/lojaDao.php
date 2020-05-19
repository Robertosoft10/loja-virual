<?php
    require_once '../Private/classConexao.php';
	include '../Modell/classLoja.php';

	class LojaDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertLoja($loja){

            $razao = $loja->getRazao();
            $cnpj = $loja->getCnpj();
            $fone = $loja->getFone();
            $email = $loja->getEmail();
            $endereco = $loja->getEndereco();

            $sql = "INSERT INTO tb_loja (razao, cnpj, fone, email, endereco)VALUES('$razao','$cnpj', '$fone', '$email', '$endereco')";
            $this->conexao->query($sql);
        } 
        public function listLoja(){
            $consult = $this->conexao->query("SELECT * FROM tb_loja");
			$arrayLojas = array();
			while ($row = mysqli_fetch_array($consult)) {
            $loja = new Loja($row['idLoja'], $row['razao'], $row['cnpj'], $row['fone'], $row['email'], $row['endereco']);
				array_push($arrayLojas, $loja);
			}
			return $arrayLojas;
        }
        public function riquestLoja($idLoja){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_loja WHERE idLoja = '$idLoja'");
            $loja = new Loja($row['idLoja'], $row['razao'],$row['cnpj'], $row['fone'], $row['email'], $row['endereco']);
            return $loja;
        }
        public function updateLoja($loja){

            $idLoja = $loja->getIdLoja();
            $razao = $loja->getRazao();
            $cnpj = $loja->getCnpj();
            $fone = $loja->getFone();
            $email = $loja->getEmail();
            $endereco = $loja->getEndereco();;

          $sql = "UPDATE tb_loja  SET razao='$razao', cnpj='$cnpj', fone='$fone', email='$email', endereco='$endereco' WHERE idLoja = '$idLoja'";
          $this->conexao->query($sql);
        }
        public function deleteLoja($idLoja){
            $sql = "DELETE FROM tb_loja WHERE idLoja = '$idLoja'";
            $this->conexao->query($sql);
        }
    }
?>
