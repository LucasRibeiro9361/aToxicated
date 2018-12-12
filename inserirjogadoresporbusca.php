<?php
include 'config.php';
if(isset($_SESSION["cdusuario"])){
	include 'menulogado.php';
}
else{
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title></title>
</head>
<body>
	danilo gostoso
	<form method="POST">
		<input type="text" name="cd" placeholder="Digite o código do usuario">
		<input type="submit" name="botao" value="Apagar">
	</form>
	<?php
		include'connect.php';
		$cd=$_POST['cd'];
		$sql = "SELECT * FROM tb_perfillol WHERE cd_perfillol='$cd'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo  "Exibir o perfil do usuario encontrado".$row['cd_perfillol'];
			}
		} else {
    		echo "0 resultados";
		}
	?>
</body>
<br><footer>
	<?php include 'footer.php';?>
</footer>
</html>
