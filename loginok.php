<html>
<head>

</head>
<body>
</body>
<style>
body{
background-color:black;
}
</style>
<?php
include 'config.php';
// conexao
$conn = new mysqli("localhost", "root", "usbw", "db_atoxicated");
// checa conexao
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $cargosql = "SELECT cargo from tb_usuario where email  = '$login'";
	$result = mysqli_query($conn, $cargosql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $cargo = $row["cargo"];
    }
}

 echo $login . '<br>';
 echo $senha;
 echo $cargo . '<br>';
if (isset($login)&& isset($senha)) {
          if($cargo == '1'){
            $sql = "SELECT * FROM tb_usuario WHERE email ='$login' AND senha ='$senha'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $_SESSION["cdusuario"]= $row['cd_usuario'];
                $_SESSION["nick"]= $row['nick'];
                $_SESSION["nivel"]= $cargo;
                $_SESSION["email"]= $login;
                header("Location:paginainicial.php");
              }
            } else {
              echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
            }
}
					if($cargo == '2'){
            $sql = "SELECT * FROM tb_usuario WHERE email ='$login' AND senha ='$senha'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $_SESSION["cdusuario"]= $row['cd_usuario'];
                $_SESSION["nick"]= $row['nick'];
                $_SESSION["nivel"]= $cargo;
                $_SESSION["email"]= $login;
                header("Location:moderadorhome.php");
              }
            } else {
              echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
            }
}
}
				if($cargo == '3'){
          $sql = "SELECT * FROM tb_usuario WHERE email ='$login' AND senha ='$senha'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $_SESSION["cdusuario"]= $row['cd_usuario'];
              $_SESSION["nick"]= $row['nick'];
              $_SESSION["nivel"]= $cargo;
              $_SESSION["email"]= $login;
              header("Location:adminhome.php");
            }
          } else {
            echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
          }
			}
    // Arruma bug de não redirecionar para a index quando o login estiver errado.
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
?>
<footer>
</footer>

</html>
