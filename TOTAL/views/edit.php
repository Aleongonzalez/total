<?php 
include ('../template/header.php');
include ('../template/navegacion.php');
include ('../template/finHeader.php');
?>
<?php 
	$usuario = new Usuario();
	$id = $_GET['id'];
	
	$res = $usuario->getUsuarioPorID($id);

	//print_r($res);
	foreach ($res as $ress) {
		$idd = $ress['id'];
		$user = $ress['usuario'];
		$mail = $ress['email'];
	}
	
 ?>



<main class="container">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<form method="post" action="../controller/edita.php" name="edit">
				<div id="result"></div>
				<div class="form-group">
					<div class="form-label" for='id'>Id</div>
					<input class="form-control" type="text" name="id" id="id" readonly="readonly" value="<?php echo $idd;?>">
				</div>
				<div class="form-group">
					<div class="form-label" for='usuario'>Usuario</div>
					<input class="form-control" autofocus type="text" name="usuario" id="usuario" pattern="[a-zA-Z0-9]+" required value="<?php echo $user;?>">
				</div>
				<div class="form-group">
					<div class="form-label" for='email'>Email</div>
					<input class="form-control" id="email" type="email" name="email" required value="<?php echo $mail;?>">
				</div>
				<div class="form-group py-3">
					<input class="btn btn-primary" type="submit" name="edit" value="Actualizar">
					<input class="btn btn-danger" type="submit" name="superUser" value="Set Admin">
				</div>
			</form>
		</div>
	</div>
</main>




<?php include ('../template/footer.php');?>