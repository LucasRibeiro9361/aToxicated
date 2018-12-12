<!DOCTYPE html>
<html lang="pt-br">
<head>

	<?php
	include 'config.php';
	include 'connect.php';
	$id = $_SESSION["cdusuario"];
	if(isset($_SESSION["cdusuario"])){
	}
	else{
	  header('Location: login.php');
	}
	?>
<title>Pagina Inicial</title>
<meta charset="utf-8">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<nav style="margin-right:-5%;" class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="faleconosco.php">FAQ</a></li>
							</ul>
						</nav>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li style="min-width:70%;margin-right:30%;"><a>Procurar Players</a><br><a style="text-align:right;font-size:100%;" href="filtrodejogadoreslol.php">LOL</a> | <a style="text-align:left;font-size:100%;" href="filtrodejogadoreslol.php">CSGO</a></li>
								<li style="min-width:70%;"><a>Procurar Times</a><br><a style="text-align:right;font-size:100%;" href="filtroequipeslol.php">LOL</a> | <a style="text-align:left;font-size:100%;" href="filtrodejogadoreslol.php">CSGO</a></li>
							</ul>
						</nav>
					<nav class="main_nav">
						<ul class="d-flex flex-row align-items-center justify-content-start">
							<div class="dropdown">
	<button style="width:45%;margin-left:50%;color:#262626;background-color:#FFFFFF;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<img style="
		width:17%;
		margin:0;
		padding:0;
		margin-left:-3%;"
		src="img/iconlogin2.png">
	<?php
		echo $_SESSION['nick'];
	?>
	</button>
	<div style="width:45%;text-align:right;color:#262626;background-color:#FFFFFF;border-color:#0B5D1E;"class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="perfilusuario.php">Seu perfil</a>
		<a class="dropdown-item" href="perfilequipelolparticular.php">Seu time</a>
		<a class="dropdown-item" href="Denuncia.php">Denuncia</a>
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
	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(images/index.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Atoxicated</div>
							<div class="home_subtitle">O seu site formador de equipes</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Boxes -->

	<div class="boxes">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="boxes_container d-flex flex-lg-row flex-column align-items-start justify-content-start">

						<!-- Box -->
						<?php
						$id = $_SESSION["cdusuario"];
						$sql = "SELECT `id_usuario` FROM `tb_perfilcs` WHERE `id_usuario` = '$id'";
						$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								echo '<div class="boxc">
									<center>
									<div class="box_iconc d-flex flex-column align-items-center justify-content-center"><img style="margin-top:-25%;margin-bottom:-22.5%;" src="images/ak-47-icon.png" alt=""></div>
								</center>
									<div class="box_title">Counter-Strike: Global Offensive (CS:GO)</div>
									<div class="box_text">
										<p>Visite seu perfil</p>
									</div>
									<div class="box_link_container">
									<div class="button home_button ml-auto mr-auto"><a href="profilecsgo.php">Perfil CSGO</a></div>
									</div>
								</div>';
					} else {echo '<div class="boxc">
						<div class="box_title"><h1 style="font-size:115%;">CS-GO</h1></div>
						<div class="box_text">
							<p>O Counter-Strike: Global Offensive (CS:GO) é a continuação do jogo de equipas cheio de ação que foi pioneiro quando foi lançado há 12 anos atrás.</p>
							<br><p>Você ainda não tem cadastro! <br>Cadastre-se</p>
						</div>
						<div class="box_link_container">
						<div class="button home_button ml-auto mr-auto"><a href="profilecsgo.php">Criar perfil</a></div>
						</div>
					</div>';}
			?>
						<!-- Box -->
						<div class="box">
							<center>
							<div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="images/over_icon.png" alt=""></div>
							<div class="box_title">Overwatch</div>
							<div class="box_text">
								<B>EM BREVE!</B>
							</div>
							<div class="box_link_container">
							</div>
						</div>
</center>
						<!-- Box -->
						<?php
						$sql = "SELECT `id_usuario` FROM `tb_perfillol` WHERE `id_usuario` = '$id'";
						$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							echo '						<div class="boxl">
														<center>
														<div class="box_iconl d-flex flex-column align-items-center justify-content-center"><img style="width:120%;" src="images/lol-icon.png" alt=""></div>
													</center>
														<br><div class="box_title">League of legends</div>
														<div class="box_text">
															<p style="font-size:130%;">Visite seu perfil</p><br>
														</div>
														<div class="box_link_container">
														<div class="button home_button ml-auto mr-auto"><a href="perfillolparticular.php">Perfil LOL</a></div>
														</div>
													</div>';
					} else {echo '<div class="boxc">
						<center>
						<div class="box_iconc d-flex flex-column align-items-center justify-content-center"><img src="images/ak-47-icon.png" alt=""></div>
					</center>
						<div class="box_title">League of Legends</div>
						<div class="box_text">
							<p>League of Legends é um jogo online competitivo que mistura a velocidade e a intensidade de um RTS com elementos de RPG.</p>
						</div>
						<div class="box_link_container">
						<div class="button home_button ml-auto mr-auto"><a href="cadastroperfillol.php">Criar perfil</a></div>
						</div>
					</div>';}
			?>
					</div>
				</div>
			</div>
		</div>
	</div>
</br>
</br>
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-map-marked-alt text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Endereço</h4>
							<hr class="my-4">
							<div class="small text-black-50">Av. José Batista Campos, 1431 - Cidade Anchieta, Itanhaém </div>
						</div>
					</div>
				</div>

				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-envelope text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Email</h4>
							<hr class="my-4">
							<div class="small text-black-50">atoxicatedcorporation@gmail.com</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 mb-3 mb-md-0">
					<div class="card py-4 h-100">
						<div class="card-body text-center">
							<i class="fas fa-mobile-alt text-primary mb-2"></i>
							<h4 class="text-uppercase m-0">Telefone</h4>
							<hr class="my-4">
							<div class="small text-black-50">(13) 3427-1601</div>
						</div>
					</div>
				</div>
			</div>

			<div class="social d-flex justify-content-center">
				<a href="https://www.facebook.com/aToxicatedBrasil/" class="mx-2">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a href="https://github.com/lucasribeiro9361" class="mx-2">
					<i class="fab fa-github"></i>
				</a>
			</div>

		</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
