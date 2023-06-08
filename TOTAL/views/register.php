<?php 
session_start();
if (empty($_SESSION['username']) or ($_SESSION['admin']==0)) {
	header('location: login.php');
}
?>


<?php 
include ('../template/header.php');
include ('../template/navegacion.php');
include ('../template/finHeader.php');
?>

<main class="container">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<form method="post" action="register.php" name="register">
				<div id="result"></div>
				<div class="form-group">
					<div class="form-label" for='usuario'>Usuario</div>
					<input class="form-control" autofocus type="text" name="usuario" id="usuario" pattern="[a-zA-Z0-9]+" required>
				</div>
				<div class="form-group">
					<div class="form-label" for='email'>Email</div>
					<input class="form-control" id="email" type="email" name="email" required>
				</div>
				<div class="form-group">
					<div class="form-label" for='password'>Contraseña</div>
					<input class="form-control" id="password" type="password" name="password" required>
				</div>
				<div class="form-group py-3">
					<input class="btn btn-primary" type="submit" name="registrar" value="Registrar">
				</div>
			</form>
		</div>
		<div class="col-md-8 mx-auto">
			<table class="table table-boreded">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Usuario</th>
						<th scope="col">Email</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$usuario = new Usuario();
						$res = $usuario->getTodosUsuarios();
						foreach($res as $ress){
					?>
					<tr>
						<td><?php echo $ress['id'];?></td>
						<td><?php echo $ress['usuario'];?></td>
						<td><?php echo $ress['email'];?></td>
						<td>
							<a class="btn btn-warning" href="edit.php?id=<?php echo $ress['id'];?>" >Editar</a>
							<a class="btn btn-danger" href="../controller/delete.php?id=<?php echo $ress['id'];?>" >Eliminar</a>
						</td>
					</tr>
					<?php
						}

					 ?>
				</tbody>
			</table>
		</div>
	</div>
</main>


<?php 
//include ('controller.php');
$usuario = new Usuario();
$user=null;
$email=null;
$password=null;
if(isset($_POST['registrar'])) {
	$user = $_POST['usuario'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	//$conexion = $usuario->conexion();

/*
	$query = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:username");
	$query->bindParam("username", $user, PDO::PARAM_STR);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	
	$query2 = $conexion->prepare("SELECT * FROM usuarios WHERE email=:email");
	$query2->bindParam("email", $email, PDO::PARAM_STR);
	$query2->execute();
	$result2 = $query2->fetch(PDO::FETCH_ASSOC);
*/

	//$result = resultadoUsuario($user, $conexion);
	//$result2 = resultadoEmail($email, $conexion);

	$result = $usuario->getUsuarioPorUsuario($user);
	$result2 = $usuario->getUsuarioPorEmail($email);

	if((!$result)&&(!$result2)) {
	$usuario->insertUsuario($user, $email, $password);
	//header('location: register.php');
	}else {
		echo '<div class="row">
						<div class="col-md alert alert-warning text-center py-3">
							USUARIO O EMAIL YA EN USO
						</div>
					</div>';
	}
}

?>

 

<?php include ('../template/footer.php');?>