<?php
include 'config.php';
include 'connect.php';
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar perfil de usuario</title>
    <style>
        .table {
            table-layout: fixed;
            word-wrap: break-word;
        }
    </style>
  <div class="col-md-6" id="containerlogin">
    <div class="row">
        <div class="col-md-12" id="containericonlogin">
          <center>	<img src="img/iconlogin.png" id="iconimg"></center>
        </div>
    </div>
  <body style="background-color: #EEE;">
    <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #FFF;">
<center>
      <a href="perfilusuario.php"><button class="botao botao1">Voltar</button></a>
      </center>

    <center><b><h1>Perfil</h1></b></center>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/scripts.js"></script>
  </head>
  <body>
    <style>
    body{background-image: url(img/bg-masthead.jpg);
    }
    .botao{

        border: none;
        color: #4CAF50;
        padding: 8px 40px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        cursor: pointer;
        margin-top:3%;
        border-radius:5px;
    }
    .botao1{
        background-color: whitesmoke;
        color: #143642;
        border: 2px solid #555555;
    }

    .botao1:hover {
        background-color:#143642 ;
        color: whitesmoke;
    }
    </style>
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
    <center>
    <form method="post">
    <table class='table table-striped' ID="alter" style="width:70%; height:100%;">
    <tr>
      <td><b>Informações</b></td>
      <td><b>Valor</b></td>
    </tr>
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
  			<input class="with-gap" required="" checked="<?php if($genero == 2){echo "checked";} ?>" name="genero" value="1" type="radio"/>
  			<span>Masculino</span>
  		</label>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-12">
  			<label>
  			<input class="with-gap" required="" name="genero" value="2" type="radio"/>
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
</div>
</div>
</form>
</center>
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
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
