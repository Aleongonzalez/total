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
//include ('../controller/consulta.php');
?>


<main class="container">
	
	<form id="ejerForm" action="../controller/consulta.php" name="consulta">
		<div class="row mt-2">
			
			
				<div class="col-md-2">
					<div class="form-group">
						<div class="form-label" for='fecha'>Fecha</div>
						<input class="form-control" type="date" name="fecha" id="fecha" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<div class="form-label" for='entrenamiento'>Entrenamiento</div>
						<select class="form-select" name="entrenamiento" id="entrenamiento" required>
							<option value=""></option>
							<!--SACAR TODOS LOS USUARIOS Y CON UN FOREACH METERLOS COMO OPTION-->
							<?php 

								$entrenamiento = new Entrenamiento();
								$resultado_ent = $entrenamiento->getTodosEntrenamientos();
								foreach ($resultado_ent as $res) {
							?>	
							<option value="<?php echo($res['tipo'])?>"><?php echo($res['tipo'])?></option>
							<?php		
								}
							?>
							
						</select>
					</div>
				</div>
				<div class="col-md-3">
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

				<div class="col-md-2">
					<div class="form-group">
						<div class="form-element py-4">
						
						<input class="btn btn-primary" type="submit" id="consulta" name="consulta" value="Ir">
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<div class="form-element py-4">
						
						<input class="btn btn-secondary" type="submit" id="limpiar" name="borraConsulta" value="Borrar">
						</div>
					</div>
				</div>
				
		</div>		
	</form>	

	<div class="row mt-2" >
		<div class="col-md-12">
			<div id="result">
				<table class="table table-boreded">
					<thead>
						<tr>
							<th scope="col">Fecha</th>
							<th scope="col">Entrenamiento</th>
							<th scope="col">Series</th>
							<th scope="col">Repeticiones</th>
							<th scope="col">Descanso</th>
							<th scope="col">Comentarios</th>
						</tr>
					</thead>
					<tbody id="tabla">
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
								<a class="btn btn-secondary" href="edit_consulta.php?id=<?php echo $ress['id'];?>" >Editar</a>
								<a class="btn btn-danger" href="../controller/delete_consulta.php?id=<?php echo $ress['id'];?>" >Eliminar</a>
							</td>
						</tr>
						<?php
							}

						 ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>


</main>

<script src="../js/consultaEjercicios.js"></script>

<?php include ('../template/footer.php');?>
