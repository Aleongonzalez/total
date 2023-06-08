<?php 
session_start();
session_destroy();
session_start();

include ('../template/header.php');
include ('../template/finHeader.php');?>

<p id="loginok"></p>
<main class="container">
	<div class="row">
		<div class="col-md-8 mx-auto mt-3">
			<img src="../img/R.png" id="acceso" alt="mujer corriendo" height=550px>
		</div>
		<div class="col-md-4 mx-auto" id="login-form">
			<form method="post" action="login.php" name="login">
				<div class="form-group">
					<div class="form-label" for='usuario'>Usuario</div>
					<input class="form-control" autofocus type="text" name="usuario" id="usuario" pattern="[a-zA-Z0-9]+" required>
				</div>
				<div class="form-group">
					<div class="form-label" for='password'>Contraseña</div>
					<input class="form-control" id="password" type="password" name="password" required>
				</div>
				<div class="form-element py-3">
					<input class="btn btn-primary" type="submit" name="login" value="Entrar">
				</div>
			</form>
		</div>
	</div>
</main>

<?php
//include('consultas.php');
$db = new Database();
$conexion = $db->conexion();

if(isset($_POST['login'])) {
		
		

		$username = $_POST['usuario'];
		$password = $_POST['password'];
		

		$query = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:username");
		$query->bindParam("username", $username, PDO::PARAM_STR);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);

		if(!$result){
			if(($username == 'admin')&&($password=='admin')){
					$_SESSION['admin'] = 1;
					$_SESSION['username'] = 'Admin';
					header('location: register.php');
				}else{
					echo '<div class="row">
						<div class="col-md alert alert-warning text-center py-3">
							USUARIO NO EXISTE
						</div>
					</div>';
				}
		} else {
			if(password_verify($password, $result['password'])) {
				//echo '<p class="alert alert-success">YOU ARE LOGGED IN</p>';
				$_SESSION['username'] = $result['usuario'];
				//echo($_SESSION['username']);
				



				$query1 = $conexion->prepare('SELECT * FROM admin');
				$query1->execute();
				$resultado1 = $query1->fetch(PDO::FETCH_ASSOC);

				$valorSuper = $resultado1['iduser'];


				$query2 = $conexion->prepare('SELECT * FROM usuarios WHERE usuario=:username');
				$query2->bindParam("username", $username, PDO::PARAM_STR);
				$query2->execute();
				$resultado2 = $query2->fetch(PDO::FETCH_ASSOC);

				$valorId = $resultado2['id'];

				if($valorSuper==$valorId) {
					header('location: register.php');
					$_SESSION['admin'] = 1;
				} else {
					header('location: usuario.php');
					$_SESSION['admin'] = 0;
				}


			} else {
				echo '
					<div class="row">
						<div class="col-md alert alert-warning text-center py-3">
							CONTRASEÑA ERRONEA
						</div>
					</div>
					';
				}
	
		}
	}	

?>


<?php include ('../template/footer.php');?>