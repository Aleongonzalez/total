<?php 
include ('../model/Usuario.php');

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>MI APP</title>
</head>
<body>
	<header class="container-fluid bg-warning">
	<div class="row">
		<div class="col-md-12 mt-3">
			<h1 class="text-center">Tu vida va a cambiar</h1>
		</div>
		
		<!--Hacer que solo salga en la pantalla de inico-->
	</div>
	<div class="row">
		<div class="col-md-2 mt-1 align-self-start">
			<p class="text-center" id="headerUser"><?php if(isset($_SESSION['username'])){echo("Usuario: ".$_SESSION['username']);} ?></p>
		</div>
		<div class="col-md-8"></div>
		<div class="col-md-2 mt-1">
			<?php if(isset($_SESSION['username'])){echo('<a class="btn btn-danger" href="../index.php">Cerrar sesion</a>');} ?>
			
		</div>
			

	</div>

