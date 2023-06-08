<?php 

class Database {
	
	private $hostname = "localhost";
	private $database = "crud";
	private $user = "root";
	private $password = "";
	private $chartset = "utf8";

	function conexion()	{
		
		try {
			$conexion = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->chartset;
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false,
			];
			$conectar = new PDO($conexion, $this->user, $this->password, $options);
			return $conectar;
		} catch (PDOException $e) {
			echo 'Error conexion: '. $e->getMessage();
			exit;
		}
	}

	function desconectar() {
		
	}



	function set_names() {
		return $this->dbh->query("SET NAMES 'utf8'");
	}
}

 ?>