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
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 containerperfilgeral">
           <div class="col-xs-12">
              <div class="row">
                <div class="col-xl-4 iconperfilgeral ">
                   <img style="max-width:100%;max-height:100%;float:right;" src="img/iconcs.png">
                </div>
                 <div class="col-xl-4 iconperfilgeral">
                    <img style="max-width:100%;max-height:100%;float:center;padding-left:25%;" src="img/iconlogin2.png">
                 </div>
                 <div class="col-xl-4 iconperfilgeral">
                    <img style="max-width:100%;max-height:100%;float:left;" src="img/iconlol.png">
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
                   Estado<br>
                   <?php echo $email;?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 Nicklol">
                   Nick do LOL<br>
                   <?php echo $genero;?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 Sobre">
                  Sobre <BR><?php echo $sobre?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-xl-12 editarperfil">
                   <center><a href="#"><button class="botao1 botao">editar perfil</button></a></center>
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
                  </div>
                  <div class="col-xl-6 convitetime">
                    <div class="row">
                    <div class="col-xl-12 convitetitulo">
                      Convite Jogadores
                    </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-12">
              <div class="row">
                  <div class="col-xl-9 chati">
                    <?php include 'chat/chat.php';?>
                  </div>
                    <div class="col-xl-3 chatiamigos">
                      <?php include 'chat/amizad.php';?>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  <!--Fim Conviteamigo-->
  <?php
    $sql = "SELECT A.cd_amigos, P.nick as nick , A.id_usuario1
    FROM tb_amigos AS A
    left JOIN tb_perfillol AS P
    ON A.id_usuario1 = P.id_usuario
    WHERE id_usuario2=$cd1 AND status=0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $cd2=$row['id_usuario1'];
          echo "<br><form method='POST'> o jogador ".$row['nick']." enviou uma solicitacao de amizade";
          echo "<input type='hidden' value='".$row['cd_amigos']."' name='cdamigos'><br>
            <input type='submit' name='botao2' value='Aceitar'>
            <input type='submit' name='botao2' value='Recusar'></form><br>";
        }
      }else {
        echo "Sem convites de amizade";
      }
      if (isset($_POST['botao2'])){
        $cdamigos=$_POST['cdamigos'];
        if ($_POST['botao2']=="Aceitar") {
          $sql = "UPDATE tb_amigos SET status=1 WHERE cd_amigos=$cdamigos";
        }else{
          $sql = "UPDATE tb_amigos SET status=2 WHERE cd_amigos=$cdamigos";
      }
    }
  ?>
  <!--Fim Conviteamigo-->
  <?php
  $sql = "SELECT C.cd_convite, L.lane AS lane, C.id_lanelol, Eq.nome AS nome, C.mensagem, C.status, C.id_jogadorlol, C.id_equipelol
          FROM tb_conviteequipeusuario AS C
          INNER JOIN tb_lanelol AS L
          ON C.id_lanelol=L.cd_lanelol
          INNER JOIN tb_equipelol AS Eq
          ON C.id_equipelol=Eq.cd_equipelol
          WHERE C.id_jogadorlol=$cd and status = 0 ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<form method='POST'>
              O jogador <strong>".$row['nome']."</strong> quer que você se junte a eles atuando na função <strong>".$row['lane']
              ."</strong><br>mensagem: <strong>".$row['mensagem']."</strong><br>
              <input type='hidden' name='cdconvite' value='".$row['cd_convite']."'>
              <input type='hidden' name='lane' value='".$row['id_lanelol']."'>
              <input type='hidden' name='cdjogador' value='".$row['id_jogadorlol']."'>
              <input type='hidden' name='cdequipe' value='".$row['id_equipelol']."'>
              <input type='submit' name='botao' value='Aceitar'><input type='submit' name='botao' value='Recusar'><br></form>";
    }
  }else{
    echo "Sem convites de equipe";
  }
  if (isset($_POST['botao'])) {
    $lane=$_POST['lane'];
    echo "asdasdasdasd".$lane;
    $cdjogador=$_POST['cdjogador'];
    $cdconvite=$_POST['cdconvite'];
    $cdequipe=$_POST['cdequipe'];
  if ($_POST['botao']=="Aceitar") {
    if ($lane=="1") {
      $sql = "SELECT * FROM tb_equipelol WHERE id_Topo <> 'null' and cd_equipelol=$cdequipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_topo']."'";
          if ($conn->query($sql) === TRUE) {
              echo "Deletado da tabela equipe <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }
      }
    if ($lane=="2") {
      $sql = "SELECT * FROM tb_equipelol WHERE id_selva <> 'null' and cd_equipelol=$cdequipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_selva']."'";
          if ($conn->query($sql) === TRUE) {
              echo "Deletado da tabela equipe <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
      }
    }
    if ($lane=="3") {
      $sql = "SELECT * FROM tb_equipelol WHERE id_meio <> 'null' and cd_equipelol=$cdequipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_meio']."'";
          if ($conn->query($sql) === TRUE) {
              echo "Deletado da tabela equipe <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
      }
    }
    if ($lane=="4") {
      $sql = "SELECT * FROM tb_equipelol WHERE id_atirador <> 'null' and cd_equipelol=$cdequipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_atirador']."'";
          if ($conn->query($sql) === TRUE) {
              echo "Deletado da tabela equipe <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
      }
    }
    if ($lane=="5") {
      $sql = "SELECT * FROM tb_equipelol WHERE id_suporte <> 'null' and cd_equipelol=$cdequipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_suporte']."'";
          if ($conn->query($sql) === TRUE) {
              echo "Deletado da tabela equipe <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
      }
    }
    if ($lane=="1") {
      $sql = "UPDATE tb_equipelol SET id_topo='$cd' WHERE cd_equipelol='$cdequipe'";
      if ($conn->query($sql) === TRUE) {
          echo "Alterado na tabela equipe <br>";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    }
    if ($lane=="2") {
      $sql = "UPDATE tb_equipelol SET id_selva='$cd' WHERE cd_equipelol='$cdequipe'";
      if ($conn->query($sql) === TRUE) {
          echo "Alterado na tabela equipe <br>";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    }
    if ($lane=="3") {
      $sql = "UPDATE tb_equipelol SET id_meio='$cd' WHERE cd_equipelol='$cdequipe'";
      if ($conn->query($sql) === TRUE) {
          echo "Alterado na tabela equipe <br>";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    }
    if ($lane=="4") {
      $sql = "UPDATE tb_equipelol SET id_atirador='$cd' WHERE cd_equipelol='$cdequipe'";
      if ($conn->query($sql) === TRUE) {
          echo "Alterado na tabela equipe <br>";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    }
    if ($lane=="5") {
      $sql = "UPDATE tb_equipelol SET id_suporte='$cd' WHERE cd_equipelol='$cdequipe'";
      if ($conn->query($sql) === TRUE) {
          echo "Alterado na tabela equipe <br>";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    }
    $sql = "UPDATE tb_perfillol SET id_equipelol=$cdequipe WHERE cd_perfillol='$cdjogador'";
    if ($conn->query($sql) === TRUE) {
        echo "alterado na tabela perfillol";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $sql = "UPDATE tb_conviteusuarioequipe SET status='1' WHERE cd_convite=$cdconvite";
    if ($conn->query($sql) === TRUE) {
        echo "status atualizado";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }else{
    $sql = "UPDATE tb_conviteusuarioequipe SET status='1' WHERE cd_convite=$cdconvite";
    if ($conn->query($sql) === TRUE) {
        echo "status atualizado";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  }
  ?>

  </body>
</html>
