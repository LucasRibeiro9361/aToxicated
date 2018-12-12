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
	<form method="POST">
		<input type="text" name="cd" placeholder="Digite o código da equipe">
		<input type="submit" name="botao" value="Apagar">
	</form>
	<?php
  if (isset($botao)) {
		include'connect.php';
		$cd=$_POST['cd'];
		$sql = "SELECT * FROM tb_equipelol WHERE cd_equipelol='$cd'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo  "Exibir o perfil do time ".$row['cd_equipelol'];
			}
		} else {
    		echo "0 resultados";
		}
  }
	?>
</body>
</html>
