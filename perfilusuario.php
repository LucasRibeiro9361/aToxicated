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
  <body>
    <style>
    body{background-image: url(img/bg-masthead.jpg);}
    </style>
    <?php
    $cd1 = $_SESSION["cdusuario"];
    $sql = "SELECT * FROM tb_usuario WHERE cd_usuario='$cd1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $usuario = $row['usuario'];
          $nasci = $row["nascimento"];
          $sobre = $row["sobre"];
          $genero = $row["genero"];
          $cargo = $row["cargo"];
          $stats = $row["stats"];
          $email = $row["email"];
        }
    }
    ?>
    <div class="container-fluid geral">
      <div class="row">
        <div class="col-xl-2 containerperfilgeral">
           <div class="col-xs-12">
              <div class="row">
                <div class="col-xl-4 iconperfilgeral ">
                   <a href="profilecsgo.php"><img style="max-width:100%;max-height:100%;float:right;" src="img/iconcs.png"><a>
                </div>
                 <div class="col-xl-4 iconperfilgeral">
                    <a href="perfilusuario.php"><img style="max-width:100%;max-height:100%;float:center;" src="img/iconlogin2.png"></a>
                 </div>
                 <div class="col-xl-4 iconperfilgeral">
                  <a href="perfillolparticular.php"> <img style="max-width:100%;max-height:100%;float:left;" src="img/iconlol.png"></a>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-5 imgperfilgeral bordateste">
                   <style>
                      .imgperfilgeral{
                        background-image: url(img/csgobackground.jpg);
                        background-size: cover;
                        background-repeat: no-repeat;
                      }
                   </style>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 nomeperfilgeral">
                   <center><?php echo $usuario;?></center>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 idade">
                   <center><?php echo $nasci ?></center>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 Estado">
                   E-mail<br>
                   <?php echo $email;?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 Nicklol">
                   Genero<br>
                   <?php echo $genero;?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 sobre">
                  Sobre <BR><?php echo $sobre?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 editarperfil">
                   <center><a href="editarperfil.php"><button class="botao1 botao">editar perfil</button></a></center>
                 </div>
              </div>
           </div>
        </div>
    <style>
    </style>
        <div class="col-xl-6 containerperfillol">
          <div class="col-xl-12">
              <div class="row">
                  <div class="col-xl-6 convite">
                      <div class="row">
                        <div class="col-xl-12 convitetitulo">
                        Convite Equipes
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 containerconvite ">
                          <?php include 'conviteusuario.php'; ?>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-6 convitetime">
                    <div class="row">
                      <div class="col-xl-12 convitetitulo convitetitulo2">
                        Convite Jogadores
                      </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 containerconvitetime">
                          <?php include 'amigos.php'; ?>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-12">
              <div class="row">
                  <div class="col-xl-8 chati">
                    <?php include 'chat/chat.php';?>
                  </div>
                    <div class="col-xl-4 chatiamigos">
                      <?php include 'chat/amizad.php';?>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
