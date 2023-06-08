<?php 

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
include_once('../model/Usuario.php');

$usuario = new Usuario();

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		//$usuario = new usuario();

		if(isset($_GET['id'])){
			echo json_encode($usuario->getUsuarioPorID($_GET['id']));
		}elseif(isset($_GET['usuario'])){
			echo json_encode($usuario->getUsuarioPorUsuario($_GET['usuario']));
		}elseif(isset($_GET['email'])){
			echo json_encode($usuario->getUsuarioPorEmail($_GET['email']));
		}else{
			echo json_encode($usuario->getTodosUsuarios());
		}
		break;
  


	case 'POST':
		//$usuario = new usuario();
		//print_r($_GET['usuario']);
		//print_r($_POST);
		
		if((isset($_GET['usuario']))and(isset($_GET['email']))and(isset($_GET['password']))){
			echo json_encode($usuario->insertUsuario($_GET['usuario'], $_GET['email'], $_GET['password']));	
			//header('location: ./index.html');
		}else {
			
			echo ("NADA DE NADA");
		}
		
		break;

/*	case 'POST':
		//print_r($_GET['usuario']);
		echo json_encode($usuario->insertUsuario($_GET['usuario'], $_GET['email'], $_GET['password']));	
		break;
*/
	case 'PUT':
		//print_r($_POST);
		//print_r($_GET);
		//$usuario = new usuario();
		if(isset($_GET['id'])){
			echo json_encode($usuario->updateUsuario($_GET['id'], $_GET['usuario'], $_GET['email']));
		}else {
			Echo "NO HAS ACTUALIZADO NADA";
		}
		break;

	case 'DELETE':
		//$usuario = new usuario();
		
		if(isset($_GET['id'])){
			//print_r($_GET['id']);
			echo json_encode($usuario->deleteUsuario($_GET['id']));
		}else{
			echo"NO BORRO NADA";
		}
		
		break;
}



 ?>