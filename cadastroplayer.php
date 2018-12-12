<?php
include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="js/bootstrap.min.js">
<link rel="stylesheet" href="js/jquery.min.js">
<link rel="stylesheet" href="js/popper.min.js">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="css/materialize/css/materialize.css">

<meta charset="utf-8">
<title>Cadastro</title>
<style>
body{background-image: url(img/background.jpg);}
</style>
</head>

<body>
<form method="post">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5" id="containerlogin">
			<div class="row">
				<div class="col-md-12">
					<h4><center>Cadastro</center></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<Center>E-mail</Center><input class="text" type="email" name="email" placeholder="    Digite o seu email">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<Center>Nome Completo</Center><input class="text" type="text" name="nome" placeholder="   Digite o seu nome">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<Center>Nickname</Center><input class="text" type="text" name="nick" placeholder="   Digite o seu nome">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>Senha</center><input class="text" type="password" name="senha" placeholder="   Digite a senha">

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>Digite novamente a senha</center><input class="text" type="password" name="csenha" placeholder="    confirme sua senha">

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>Data de nascimento</center><input class="text" type="date" name="nascimento" placeholder="   Digite a senha">

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>Gênero</center>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
			<label>
			<input class="with-gap" name="genero" value="1" type="radio"  />
			<span>Masculino</span>
		</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
			<label>
			<input class="with-gap" name="genero" value="2" type="radio"  />
			<span>Feminino</span>
		</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>
						<input class="btn waves-effect waves-light" type="submit" name="submit" value="Enviar">
						<input class="btn waves-effect waves-light" type="reset" value="Reset">
						<a class="btn waves-effect waves-light" href="paginainicial.php"><center>Voltar</center></a>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">

				</div>
			</div>
			</div>
		</div>
	</div>

</form>
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
</html>
