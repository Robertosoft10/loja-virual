<?php
  require_once '../Private/classConexao.php';
	include '../Modell/classUsuario.php';

	class UsuarioDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertUsuario($usuario){

            $nome_user = $usuario->getNome_user();
            $email_user = $usuario->getEmail_user();
            $senha_user = $usuario->getSenha_user();
            $nivel_user = $usuario->getNivel_user();

            $sql = "INSERT INTO tb_usuario (nome_user, email_user, senha_user, nivel_user)VALUES('$nome_user', '$email_user', '$senha_user', '$nivel_user')";
            $this->conexao->query($sql);
        }
        public function listUsuario(){
        $consult = $this->conexao->query("SELECT * FROM tb_usuario");
			$arrayUsuarios = array();
			while ($row = mysqli_fetch_array($consult)) {
            $usuario = new Usuario($row['idUser'], $row['nome_user'], $row['email_user'], $row['senha_user'], $row['nivel_user']);
				array_push($arrayUsuarios, $usuario);
			}
			return $arrayUsuarios;
        }
        public function riquestUsuario($idUser){
            $row = $this->conexao->buscarRegistro("SELECT * FROM tb_usuario WHERE idUser = '$idUser'");
                $usuario = new Usuario($row['idUser'], $row['nome_user'], $row['email_user'], $row['senha_user'], $row['nivel_user']);
            return $usuario;
        }
        public function updateUsuario($usuario){

          $idUser = $usuario->getIdUser();
          $nome_user = $usuario->getNome_user();
          $email_user = $usuario->getEmail_user();
          $senha_user = $usuario->getSenha_user();
          $nivel_user = $usuario->getNivel_user();

          $sql = "UPDATE tb_usuario SET nome_user='$nome_user', email_user='$email_user', senha_user='$senha_user', nivel_user='$nivel_user' WHERE idUser ='$idUser'";
          $this->conexao->query($sql);
        }
        public function deleteUsuario($idUser){
            $sql = "DELETE FROM tb_usuario WHERE idUser = '$idUser'";
            $this->conexao->query($sql);
        }
    }
?>
