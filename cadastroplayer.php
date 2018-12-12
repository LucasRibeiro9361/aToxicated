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
body{background-image: url(img/background.jpg);}
</style>
</head>
<body>
	<form method="post">

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 containerlogin">
				<div class="row">
					<div class="col-md-12 titulocontainer">
						<h4><center>Cadastro</center></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 containerlogin2">
						<Center>E-mail</Center><input class="text" type="text" name="email" placeholder="    Digite o seu email">
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 containerlogin2">
						<Center>Nome Completo</Center><input class="text" type="text" name="nome" placeholder="   Digite o seu nome">
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 containerlogin2">
						<Center>Nickname</Center><input class="text" type="text" name="nick" placeholder="   Digite o seu nome">
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 containerlogin2">
						<center>Senha</center><input class="text" type="password" name="senha" placeholder="   Digite a senha">

					</div>
				</div>
				<div class="row">
					<div class="col-md-10 containerlogin2">
						<center>Digite novamente a senha</center><input class="text" type="password" name="csenha" placeholder="    confirme sua senha">

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 containerlogin2">
						<center>Data de nascimento</center><input class="text" type="date" name="nascimento" placeholder="   Digite a senha">

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 containerlogin2">
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
</body>
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
	<?php include 'footer.php';?>
</footer>
</html>
