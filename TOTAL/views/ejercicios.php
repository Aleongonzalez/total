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
<form method="post" action="ejercicios.php" name="ejercicios">
	<div class="row mt-2">
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='fecha'>Fecha</div>
				<input class="form-control" type="date" name="fecha" id="fecha" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='usuario'>Usuario</div>
				<select class="form-select" name="usuario" id="usuario" required>
					<option value=""></option>
					<!--SACAR TODOS LOS USUARIOS Y CON UN FOREACH METERLOS COMO OPTION-->
					<?php 

						$usuarios = new Usuario();
						$resultado = $usuarios->getTodosUsuarios();
						foreach ($resultado as $res) {
					?>	
					<option value="<?php echo($res['usuario'])?>"><?php echo($res['usuario'])?></option>
					<?php		
						}
					?>
					
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='entrenamiento'>Entrenamiento</div>
				<select class="form-select" name="entrenamiento" id="entrenamiento" required>
					<option value=""></option>
					<!--SACAR TODOS LOS ENTRENAMIENTOS Y CON UN FOREACH METERLOS COMO OPTION-->
					<?php 

						$entrenamientos = new Entrenamiento();
						$resultado = $entrenamientos->getTodosEntrenamientos();
						foreach ($resultado as $res) {
					?>	
					<option value="<?php echo($res['tipo'])?>"><?php echo($res['tipo'])?></option>
					<?php		
						}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='series'>Series</div>
				<input class="form-control" type="text" name="series" id="series">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='repeticiones'>Repeticiones</div>
				<input class="form-control" type="text" name="repeticiones" id="repeticiones" pattern="[a-zA-Z0-9]+">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="form-label" for='tiempo'>Descanso</div>
				<input class="form-control" type="text" name="tiempo" id="tiempo" >
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-label" for='comentarios'>Comentarios</div>
			<textarea class="form-control" name="comentarios" id="comentarios" cols="50" rows="5"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-element py-3">
				<input class="btn btn-primary" type="submit" name="envia_ent" value="Validar">
			</div>
		</div>
		
	</div>
</form>
</main>

<?php 

$ejercicio = new Ejercicios();
if(isset($_POST['envia_ent'])){
	$fecha = $_POST['fecha'];
	$usuario = $_POST['usuario'];
	$entrenamiento = $_POST['entrenamiento'];
	$series = $_POST['series'];
	$repeticiones = $_POST['repeticiones'];
	$tiempo = $_POST['tiempo'];
	$comentarios = $_POST['comentarios'];

	$resultado = $ejercicio->insertEjercicios($fecha, $usuario, $entrenamiento, $series, $repeticiones, $tiempo, $comentarios);

}



 ?>

<?php include ('../template/footer.php');?>