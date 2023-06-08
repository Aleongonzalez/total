<?php 
session_start();
if (empty($_SESSION['username']) or ($_SESSION['admin']==0)) {
	header('location: index.php');
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
			<form method="post" action="entrenamientos.php" name="register_ent">
				<div id="result"></div>
				<div class="form-group">
					<div class="form-label" for='tipo'>Tipo entrenamiento</div>
					<input class="form-control" autofocus type="text" name="tipo" id="tipo" pattern="[a-zA-Z0-9]+" required>
				</div>
				<!--
				<div class="form-group">
					<div class="form-label" for='email'>Email</div>
					<input class="form-control" id="email" type="email" name="email" required>
				</div>
				<div class="form-group">
					<div class="form-label" for='password'>Contraseña</div>
					<input class="form-control" id="password" type="password" name="password" required>
				</div>
			-->
				<div class="form-group py-3">
					<input class="btn btn-primary" type="submit" name="registrar_ent" value="Registrar">
				</div>
			</form>
		</div>
		<div class="col-md-8 mx-auto">
			<table class="table table-boreded">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Entrenamiento</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$usuario = new Entrenamiento();
						$res = $usuario->getTodosEntrenamientos();
						foreach($res as $ress){
					?>
					<tr>
						<td><?php echo $ress['id'];?></td>
						<td><?php echo $ress['tipo'];?></td>
						<td>
							<a class="btn btn-secondary" href="edit_ent.php?id=<?php echo $ress['id'];?>" >Editar</a>
							<a class="btn btn-danger" href="../controller/delete_ent.php?id=<?php echo $ress['id'];?>" >Eliminar</a>
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
$entrenamiento = new Entrenamiento();
$tipo=null;

if(isset($_POST['registrar_ent'])) {
	$tipo = $_POST['tipo'];
	
	
	//$conexion = $entrenamiento->conexion();

	//$result = resultadoUsuario($tipo, $conexion);
	$result = $entrenamiento->getEntrenamientoPorEntrenamiento($tipo);
	

	if((!$result)) {
	$entrenamiento->insertEntrenamiento($tipo);
	//header('location: entrenamientos.php');
	}else {
		echo '<div class="row">
						<div class="col-md alert alert-warning text-center py-3">
							ENTRENAMIENTO YA CREADO
						</div>
					</div>';
	}
}

?>




<?php include ('../template/footer.php');?>