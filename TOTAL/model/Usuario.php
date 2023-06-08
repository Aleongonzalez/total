<?php 
include ('../database/database.php');
//BASE DE DATOS tabla usuarios campos ID, USUARIO, EMAIL, PASSWORD
	class Usuario extends Database{

		public function getTodosUsuarios(){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM usuarios";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getUsuarioPorID($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM usuarios WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getUsuarioPorUsuario($usuario){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM usuarios WHERE usuario = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $usuario);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getUsuarioPorEmail($email){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM usuarios WHERE email = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $email);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}



		public function getUsuarioPorEmail2($email){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = $conexion->prepare("SELECT * FROM usuarios WHERE email=:email");
			$sql->bindParam("email", $email, PDO::PARAM_STR);
			$sql->execute();
			return $result = $sql->fetch(PDO::FETCH_ASSOC);
		}

		public function insertUsuario($usuario, $email, $password){
			$conectar = parent::conexion();
			//parent::set_names();
			$password_hash = password_hash($password, PASSWORD_BCRYPT);
			$sql = "INSERT INTO usuarios(usuario, email, password) VALUES (?, ?, ?);";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $usuario);
			$sql->bindValue(2, $email);
			$sql->bindValue(3, $password_hash);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateUsuario($id, $usuario, $email){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "UPDATE usuarios SET usuario = ?, email = ? WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $usuario);
			$sql->bindValue(2, $email);
			$sql->bindValue(3, $id);
			//$sql->bindValue(4, $id);
			$sql->execute();
			return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		}



		public function deleteUsuario($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "DELETE FROM usuarios WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}


		public function esSuper($usuario){
			$conectar = parent::conexion();
			$sql = "SELECT * FROM admin";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
			
			$valorSuper = $resultado['iduser'];

			$valor = getUsuarioPorUsuario($usuario);

			$valorId = $valor['id'];

			if($valorSuper==$valorId) {
				return true;
			} else {
				return false;
			}
		}
	}


	class Entrenamiento extends Database{

		public function getTodosEntrenamientos(){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM entrenamiento";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEntrenamientoPorID($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM entrenamiento WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEntrenamientoPorEntrenamiento($entrenamiento){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM entrenamiento WHERE tipo = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $entrenamiento);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}


		public function insertEntrenamiento($entrenamiento){
			$conectar = parent::conexion();
			//parent::set_names();
			//$password_hash = password_hash($password, PASSWORD_BCRYPT);
			$sql = "INSERT INTO entrenamiento(id, tipo) VALUES (NULL, ?);";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $entrenamiento);
			//$sql->bindValue(2, $email);
			//$sql->bindValue(3, $password_hash);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateEntrenamiento($id, $entrenamiento){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "UPDATE entrenamiento SET tipo = ? WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $entrenamiento);
			//$sql->bindValue(2, $email);
			$sql->bindValue(2, $id);
			//$sql->bindValue(4, $id);
			$sql->execute();
			return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		}



		public function deleteEntrenamiento($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "DELETE FROM entrenamiento WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}


	class Ejercicios extends Database{

		public function getTodosEjercicios(){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM ejercicios";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEjerciciosPorID($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM ejercicios WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEjerciciosPorUsuario($usuario){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM ejercicios WHERE usuario = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $usuario);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEjerciciosPorFecha($fecha){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM ejercicios WHERE fecha = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $fecha);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}


		public function consulta($fecha, $usuario){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM ejercicios WHERE fecha = ? AND usuario = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $fecha);
			$sql->bindValue(2, $usuario);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}




		public function insertEjercicios($fecha, $usuario, $entrenamiento, $series, $repeticiones, $tiempo, $comentarios){
			$conectar = parent::conexion();
			//parent::set_names();
			//$password_hash = password_hash($password, PASSWORD_BCRYPT);
			$sql = "INSERT INTO ejercicios(id, fecha, usuario, entrenamiento, series, repeticiones, tiempo, comentarios) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $fecha);
			$sql->bindValue(2, $usuario);
			$sql->bindValue(3, $entrenamiento);
			$sql->bindValue(4, $series);
			$sql->bindValue(5, $repeticiones);
			$sql->bindValue(6, $tiempo);
			$sql->bindValue(7, $comentarios);

			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateEjercicios($id, $entrenamiento){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "UPDATE entrenamiento SET tipo = ? WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $entrenamiento);
			//$sql->bindValue(2, $email);
			$sql->bindValue(2, $id);
			//$sql->bindValue(4, $id);
			$sql->execute();
			return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		}



		public function deleteEjercicios($id){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "DELETE FROM ejercicios WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}


?>