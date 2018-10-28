<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	#1A) GETTER IDUSUARIO
	public function getIdusuario(){

		return $this->idusuario;

	}#END GETTER IDUSUARIO

	#1B) SETTER IDUSUARIO
	public function setIdusuario($value){

		$this->idusuario = $value;

	}#END SETTER IDUSUARIO

	#2A) GETTER DESLOGIN
	public function getDeslogin(){

		return $this->deslogin;

	}#END GETTER DESLOGIN

	#2B) SETTER DESLOGIN
	public function setDeslogin($value){

		$this->deslogin = $value;

	}#END SETTER DESLOGIN

	#3A) GETTER DESSENHA
	public function getDessenha(){

		return $this->dessenha;

	}#END GETTER DESSENHA

	#3B) SETTER DESSENHA
	public function setDessenha($value){

		$this->dessenha = $value;

	}#END SETTER DESSENHA0,

	#4A) GETTER DTCADASTRO
	public function getDtcadastro(){

		return $this->dtcadastro;

	}#END GETTER DTCADASTRO

	#4B) SETTER DTCADASTRO
	public function setDtcadastro($value){

		$this->dtcadastro = $value;

	}#END SETTER DTCADASTRO

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

			":ID"=>$id
		
		));

		if(count($results) > 0){
			$row = $results[0];
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}

	}#END loadById

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY idusuario;");
	}#END getList

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}#END  search

	public function login($login, $password){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(

			":LOGIN"=>$login,
			":PASSWORD"=>$password
		
		));

		if(count($results) > 0){
			$row = $results[0];
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		} else{

			throw new Exception("Login ou Senha não conferem", 1);
			
		}
	}#END login

	public function __toString(){

		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}#END MAGIC METHOD __toString

}#END class Usuario

 ?>