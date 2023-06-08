<?php 
include ('../template/header.php');
include ('../template/navegacion.php');
include ('../template/finHeader.php');
?>
<?php 
	$tipo = new Entrenamiento();
	$id = $_GET['id'];
	
	$res = $tipo->getEntrenamientoPorID($id);

	//print_r($res);
	foreach ($res as $ress) {
		$idd = $ress['id'];
		$type = $ress['tipo'];
		
	}
	
 ?>



<main class="container">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<form method="post" action="../controller/edita_ent.php" name="edit_ent">
				<div id="result"></div>
				<div class="form-group">
					<div class="form-label" for='id_ent'>Id</div>
					<input class="form-control" type="text" name="id_ent" id="id_ent" readonly="readonly" value="<?php echo $idd;?>">
				</div>
				<div class="form-group">
					<div class="form-label" for='tipo'>Usuario</div>
					<input class="form-control" autofocus type="text" name="tipo" id="tipo" pattern="[a-zA-Z0-9]+" required value="<?php echo $type;?>">
				</div>
				
				<div class="form-group py-3">
					<input class="btn btn-primary" type="submit" name="edit_ent" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</main>




<?php include ('../template/footer.php');?>