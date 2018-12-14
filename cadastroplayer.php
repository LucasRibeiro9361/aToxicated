<?php
include 'config.php';
if(isset($_SESSION["cdusuario"])){
header('Location: playerhome.php');
}

?>
<!doctype html>
<html>
<title>Login</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type"text/css" href="cadastroplayer.css">
    <link rel="stylesheet" type"text/css" href="css/bootstrap/bootstrap-grid.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<meta charset="utf-8">
<style>
body{background-image: url(images/bg1.jpg);}
</style>
</head>
<body>
	<form method="post">

		<div class="container-fluid">
			<div class="row">
					<div style="margin-right:25%;" class="col-xl-6 containergeralcadastro">
						<div class="row">
							<div style="font-size:30px;text-align:center;font-family:montserrat;color:whitesmoke" class="col-xl-12">
								Cadastro usuario
							</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Email</center><br>
									<i class="fas fa-user loginform"></i>
									<input type="text" name="email" placeholder="Digite seu email" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Nome</center><br>
									<i class="fas fa-user loginform"></i>
									<input type="text" name="nome" placeholder="Digite seu nome" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Nick</center><br>
									<i class="fas fa-user loginform"></i>
									<input type="text" name="nick" placeholder="Digite seu nick" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Senha</center><br>
									<i class="fas fa-user loginform"></i>
									<input type="password" name="senha" placeholder="Digite sua senha" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center> confirma senha</center><br>
									<i class="fas fa-user loginform"></i>
								<input type="password" name="csenha" placeholder="Digite sua senha novamente" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Data de Nascimento</center><br>
									<i class="fas fa-user loginform"></i>
									<input type="date" name="nascimento" placeholder="" required>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<center>Data de Nascimento</center><br>
									<input class="with-gap" name="genero" value="1" type="radio"  />
									<span>Masculino</span>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<input class="with-gap" name="genero" value="2" type="radio"  />
									<span>Feminino</span>
								</div>
						</div>
						<div class="row">
								<div class="col-xl-12">
									<input class="botao1 botao" type="submit" name="login" value="Enviar"/>
								<a href="login.php"><button class="botao1 botao" >voltar</button></a>
								</div>
						</div>
				</div>
			</div>
		</div>
		<?php
			if (isset($_POST['email']) && isset($_POST['senha'])){

		include 'connect.php';
			$senha = $_POST['senha'];
			$csenha = $_POST['csenha'];
			$nome = $_POST['nome'];
			$nascimento = $_POST['nascimento'];
			$genero = $_POST['genero'];
			$email = $_POST['email'];
			$nick = $_POST['nick'];

				if ($senha == $csenha) {
					$conn = new mysqli("localhost","root","usbw","db_atoxicated");
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
						$sql = "INSERT INTO tb_usuario VALUES (null, '$nome', '$nick', '$senha', '$nascimento', 0,null, '$genero', 1, 1, '$email')";
						if ($conn->query($sql) == TRUE) {
							header('Location: login.php');
						} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}else {
						echo "<script>alert('Senhas nao coincidem');</script>";
					}
				}


			?>
</body>
<footer>
</footer>
</html>
