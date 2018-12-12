<!DOCTYPE html>
<html lang="pt-br">
<head>
  <style type="text/css">
a:link
{
text-decoration:none !important;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
  <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="super_container">

	<!-- Header -->
<body>
	<header style="height:10%;position:static;font-family: 'Montserrat', sans-serif;text-decoration:none;" class="header">
    <img style="float:left;width:15%;margin-left:15%;margin-top:1.4%;margin-right:-6%;"src="images/logowhite.png">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<nav style="margin-right:-10%;margin-left:10%;" class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li style="margin-right:15%;" class="active"><a href="paginainicial.php">Pagina inicial</a></li>
								<li style="margin-left:-15%;"><a href="Denuncia.php">Denuncia</a></li>
                <li style="margin-left:-20%;"><a href="faleconosco.php">Suporte</a><br></li>
							</ul>
						</nav>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
                <li style="min-width:70%;margin-right:5%;margin-left:10%;color:#FFFFFF;"><a>Procurar Players</a><br><a style="text-align:right;font-size:100%;" href="filtrodejogadoreslol.php">LOL</a> | <a style="text-align:left;font-size:100%;" href="filtrodejogadoreslol.php">CSGO</a></li>
								<li style="min-width:70%;color:#FFFFFF;"><a>Procurar Times</a><br><a style="text-align:right;font-size:100%;" href="filtroequipeslol.php">LOL</a> | <a style="text-align:left;font-size:100%;" href="filtrodejogadoreslol.php">CSGO</a></li>
							</ul>
						</nav>
					<nav class="main_nav">
						<ul class="d-flex flex-row align-items-center justify-content-start">
					<div style="width:100%;"class="dropdown show">
	<button style="width:70%;border-color:#053B06;margin-left:45%;color:#262626;background-color:whitesmoke;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<img style="
		width:17%;
		margin:0;
		padding:0;
    float:left;
		margin-left:-3%;"
		src="img/iconlogin2.png">
	<?php
		echo $_SESSION['nick'];
	?>
	</button>
  	<div style="margin-left: 45%;width:50%;text-align:right;color:#262626;background-color:#FFFFFF;border-color:#0B5D1E;"class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="perfilusuario.php">Seu perfil</a>
    <div class="dropdown-divider"></div>
    <?php
    include 'connect.php';
    $id=$_SESSION['cdusuario'];
$sql = "SELECT * FROM tb_perfillol WHERE id_usuario=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $cd1=$row['cd_perfillol'];
  }
}
if(isset($cd1)){
$sql = "SELECT * FROM tb_equipelol WHERE id_topo=$cd1 OR id_selva=$cd1 OR id_meio=$cd1 OR id_atirador=$cd1 OR id_suporte=$cd1 OR id_dono=$cd1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  echo "<a class='dropdown-item' href='perfilequipelolparticular.php'>Seu time</a>
  <div class='dropdown-divider'></div>";
}
}
}
?>
		<a class="dropdown-item" href="Denuncia.php">Denuncia</a>
    <div class="dropdown-divider"></div>
		<a class="dropdown-item" href="Logout.php">Logout</a>
	</div>
</div>
						</ul>
					</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
</body>
  </html>
