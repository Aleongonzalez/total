<?php 
session_start();
session_destroy();
session_start();

include ('template/headerindex.php');
include ('template/finHeader.php');?>

<p id="loginok"></p>
<main class="container">
	<div class="row">
		<div class="col-md-8 mx-auto mt-3">
			<a href="views/login.php"><img src="img/R.png" id="acceso" alt="mujer corriendo" height=550px></a>
		</div>

</main>

<?php include ('template/footer.php');?>