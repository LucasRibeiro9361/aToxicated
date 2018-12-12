<?php
include 'connect.php';
include 'config.php';
if(isset($_SESSION["cdusuario"])){
	include 'menulogado.php';
}
else{
	header('Location: login.php');
}
include 'chat/chat.php';
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="js/bootstrap.min.js">
<link rel="stylesheet" href="js/jquery.min.js">
<link rel="stylesheet" href="js/popper.min.js">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<form action="loginok.php" method="post">
</head>
<body>
	<meta charset="utf-8">
<style>
body{background-image: url(img/bg-masthead.jpg);}
</style>
<div class="container">
		<div class="row">
			<div class="col-md-6" id="containerlogin">
				<div class="row">
						<div class="col-md-12" id="containericonlogin">
							<center>	<img src="img/inconlol.png" id="iconimg"></center>
						</div>
				</div>
				<?php

				if(isset($_SESSION["cdusuario"])){
				$id = $_SESSION["cdusuario"];
				$sql = "SELECT `id_usuario` FROM `tb_perfillol` WHERE `id_usuario` = '$id'";
				$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					echo "<a href='perfillolparticular.php'<h4><center>Perfil League of Legends</center></a>";
			} else {echo "<center><font face='Arial black'>Você ainda não tem cadastro!</font><br> <a href='Cadastroperfillol.php'> Cadastrar um perfil de League of Legends </a></center>";}
	}else{ echo "<center><font face='Arial black'>Você não está logado!</font><br><a href='index.html'> Início </a><br><br></center>";}
	?><br><br>
	<div class="row">
			<div class="col-md-12" id="containericonlogin">
				<center>	<img src="img/inconcs.png" id="iconimg"></center>
			</div>
	</div>
<?php
	if(isset($_SESSION["cdusuario"])){
	$id = $_SESSION["cdusuario"];
	$sql = "SELECT `id_usuario` FROM `tb_perfilcs` WHERE `id_usuario` = '$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	echo "<a href='profilecsgo.php'<h4><center>Perfil CSGO</center></a>";
} else {echo "<center><font face='Arial black'>Você ainda não tem cadastro!</font><br> <a href='Cadastroperfilcs.php'> Cadastrar um perfil de CSGO </a></center>";}
}else{ echo "<center><font face='Arial black'>Você não está logado!</font><br> <a href='index.html'> Início </a></center>";}

				?>

			</div>
		</div>
	</div>
</form>
</body>
<footer>
</footer>
</html>
