<?php 

class Sql extends PDO{

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	}#END public funciton __construct


	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);

	}
	#END private function setParam


	private function setParams($statement, $parameters = array()){

	foreach ($parameters as $key => $value) {
		
		$this->setParam($key, $value);
		}
	}#END private function setParams


	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}#END public function query

	public function select($rawQuery, $params = array()):array{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}#END public function select

}#END class Sql

 ?>