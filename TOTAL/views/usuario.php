<?php 
session_start();
if (empty($_SESSION['username'])) {
	header('location: index.php');
}
 ?>

<?php include ('template/header.php');?>

<?php include ('template/footer.php');?>