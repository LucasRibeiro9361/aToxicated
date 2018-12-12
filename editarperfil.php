<?php
include 'config.php';
include 'selectdedadosperfilparticular.php';
include 'connect.php';
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil de usuario</title>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="perfilusuario.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <div class="col-md-6" id="containerlogin">
    <div class="row"><div class="col-md-12" id="containericonlogin">
      <center>	<img src="img/iconlogin.png" id="iconimg"></center>
</div>
      <?php
      $cd = $_SESSION["cdusuario"];
      $sql = "SELECT * FROM tb_usuario WHERE cd_usuario='$cd'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $usuario = $row['usuario'];
            $nick = $row['nick'];
            $senha = $row['senha'];
            $nasci = $row["nascimento"];
            $rep = $row["reputação"];
            $sobre = $row["sobre"];
            $genero = $row["genero"];
            $cargo = $row["cargo"];
            $stats = $row["stats"];
            $email = $row["email"];
          }
      }

      ?>
  <body>
    <style>
    body{background-image: url(img/bg-masthead.jpg);}
    </style>
            <center>
              <form method="post">
              <table class='table table-striped' ID="alter" style="height:70%;width:100%;">
            <tr class="dif">
              <td><b>nome</b></td>
              <td><b><input type="text" required="" name="usuario" value="<?php echo $usuario;?>"></b></td>
            </tr>
            <tr>
              <td><b>nick</b></td>
              <td><b><input type="text" required="" name="nick" value="<?php echo $nick;?>"></b></td>
            </tr>
            <tr class="dif">
              <td><b>data de nascimento</b></td>
              <td><b><input type="date" required="" name="nascimento" value="<?php echo $nasci;?>"></b></td>
            </tr>
            <tr>
              <td><b>reputação</b></td>
              <td><b><?php echo $rep;?></b></td>
            </tr>
            <tr class="dif">
              <td><b>sobre</b></td>
              <td><b><input type="text" required="" checked="<?php if($genero == 1){echo "checked";} ?>" name="sobre" value="<?php echo $sobre;?>"></b></td>
            </tr>
            <tr>
              <td><b>genero</b></td>
              <td><b>
                <label>
          			<input class="with-gap" required="" checked="<?php if($genero == 2){echo "checked";} ?>" name="genero" value="Masculino" type="radio"/>
          			<span>Masculino</span>
          		</label>
          				<div class="col-md-12">
          			<label>
          			<input class="with-gap" required="" name="genero" value="Feminino" type="radio"/>
          			<span>Feminino</span>
          		</label>
          				</div>
          			</div>
              </b></td>
            </tr>
            <tr class="dif">
              <td><b>stats</b></td>
              <td><b><?php echo $stats;?></b></td>
            </tr>
            <tr>
              <td><b>email</b></td>
              <td><b><input type="text" required="" name="email" value="<?php echo $email;?>"><br><br><button type="submit">salvar</button>
        </b></td>
        </tr>
        </form>
        </center>
</div>
</table>
<?php
if(isset($_POST['usuario'])){
      $usuario1 = $_POST['usuario'];
      $nick1  =  $_POST['nick'];
      $nasci1 = $_POST['nascimento'];
      $sobre1 = $_POST['sobre'];
      $genero1 = $_POST['genero'];
      $email1 = $_POST['email'];
      $cd = $_SESSION["cdusuario"];

      $sql = "UPDATE `tb_usuario` SET `cd_usuario`='$cd',`usuario`='$usuario1',`nick`='$nick1',`senha`='$senha',`nascimento`='$nasci1',`reputação`='$rep',`sobre`='$sobre1',`genero`='$genero1',
      `cargo`='$cargo',`stats`='$stats',`email`='$email1' WHERE cd_usuario = $cd";
      if ($conn->query($sql) === TRUE) {
      echo "Cadastro alterado!";
      } else {
      echo "Erro: " . $conn->error;
    }  }  ?>
  </body>
</html>
