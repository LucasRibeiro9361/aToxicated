<?php
include 'config.php';
include 'connect.php';
include 'selectdedadosperfilparticular.php';
include 'conviteperfil.php';
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="js/jquery.min.js">
    <link rel="stylesheet" href="js/popper.min.js">
    	<link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="css/materialize/css/materialize.css">
    <form action="loginok.php" method="post"></form>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil League of Legends</title>

  <div class="col-md-6" id="containerlogin">
    <div class="row">
        <div class="col-md-12" id="containericonlogin">
          <center><img src="img/iconlogin.png" id="iconimg"></center>
        </div>
    </div>
  <body style="background-color: #EEE;">
    <div class="container" style="width:100%; height:auto; padding-bottom: 10px; background-color: #FFF;">
    <center><b><h1>Perfil</h1></b></center>
    <meta charset="utf-8">
  </head>
  <body>
    <style>
    body{background-image: url(img/bg-masthead.jpg);}
    </style>
    <?php
        $id = $_SESSION["cdusuario"];

        $sql = "SELECT nick FROM tb_perfillol WHERE id_usuario='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['lolname'] = $row['nick'];
            }
 }
//update dos dados no banco
// dados da api
    $imglol = "https://avatar.leagueoflegends.com/br/".$_SESSION['lolname'].".png";
    $url = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/".$_SESSION['lolname'].$_SESSION['apikeylol']);
    $content = json_decode($url, true);
  	$_SESSION['profilelol_id'] = $content['id'];
    $_SESSION['profilelol_level'] = $content['summonerLevel'];

    $lolprofilelevel = $_SESSION['profilelol_level'];
    $idlol = $_SESSION['profilelol_id'];

    // cadastra os dados na tabela tb_perfillol
        $sql = "UPDATE tb_perfillol SET levellol  = $lolprofilelevel WHERE id_usuario = $id";
        if ($conn->query($sql) === TRUE) {} else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


//rank da api (+dados)
    $url2 = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/".$idlol.$_SESSION['apikeylol']);
    $content2 = json_decode($url2, true);
    //verifica se o usuario ja tem elo
    if($content2 = '[]'){
    $elo = "UNRANKED";
    }else{

    $_SESSION['profilelol_queueType'] = $content2[0]['queueType'];

    $lolprofile['lol_queueType'] = $_SESSION['profilelol_queueType'];

        if($lolprofile['lol_queueType'] == "RANKED_FLEX_SR"){
              $_SESSION['profilelol_rank'] = $content2[1]['tier'];
              $_SESSION['profilelol_rank1'] = $content2[1]['rank'];
          }else{
            $_SESSION['profilelol_rank'] = $content2[0]['tier'];
            $_SESSION['profilelol_rank1'] = $content2[0]['rank'];
          }

      $lolprofile['lol_rank'] = $_SESSION['profilelol_rank'];
      $lolprofile['lol_rank1'] = $_SESSION['profilelol_rank1'];

      $elo = $lolprofile['lol_rank']." ".$lolprofile['lol_rank1'];

       $sql = "UPDATE `tb_perfillol` SET `elo`= '$elo' WHERE id_usuario = $id";
       if ($conn->query($sql) === TRUE) {
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
}

    //select campeoes e imagens
    $sql = "SELECT * FROM tb_campeoes WHERE cd_campeoes='$camp1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $campeao1 = $row['campeoes'];
            $img1 = $row['img'];
        }
    }

    $sql = "SELECT * FROM tb_campeoes WHERE cd_campeoes='$camp2'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $campeao2 = $row['campeoes'];
            $img2 = $row['img'];
        }
    }

    $sql = "SELECT * FROM tb_campeoes WHERE cd_campeoes='$camp3'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $campeao3 = $row['campeoes'];
            $img3 = $row['img'];
        }
    }

    $sql = "SELECT * FROM tb_campeoes WHERE cd_campeoes='$camp4'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $campeao4 = $row['campeoes'];
            $img4 = $row['img'];
        }
    }

    $sql = "SELECT * FROM tb_campeoes WHERE cd_campeoes='$camp5'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $campeao5 = $row['campeoes'];
            $img5 = $row['img'];
        }
    }


    //select lane
    $sql = "SELECT * FROM tb_lanelol WHERE cd_lanelol='$lane1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lane1 = $row['lane'];
        }
    }
    $sql = "SELECT * FROM tb_lanelol WHERE cd_lanelol='$lane2'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lane2 = $row['lane'];
        }
    }

    ?>
    <table class='table table-striped' ID="alter">
    <tr class="dif">
      <td><b>Informações</b></td>
      <td><b>Valor</b></td>

    </tr>
    <tr>
      <td>NickName</td>
      <td><?php echo $nick;?></td>
    </tr>
    <tr class="dif">
      <td>Estado</td>
      <td><?php echo $estado;?></td>
    </tr>
    <tr>
      <td>Objetivo</td>
      <td><?php echo $objetivo;?></td>
    </tr>
    <tr class="dif">
      <td>Lane principal</td>
      <td><?php echo $lane1;?></td>
    </tr>
    <tr>
      <td>Lane secundária</td>
      <td><?php echo $lane2;?></td>
    </tr>
    <tr class="dif">
      <td>Equipe</td>
      <td><?php echo $equipe;?></td>
    </tr>
    <tr>
      <td>Reputação</td>
      <td><?php echo $reputacao;?></td>
    </tr>
    <tr class="dif">
      <td>Level da conta</td>
      <td><?php echo $level;?></td>
    </tr>
    <tr>
      <td>Elo</td>
      <td><?php echo $elo;?></td>
    </tr>

      <center><b>campeões</b></center></br>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">
        </div>
      <div class="col-md-2">
    Campeão 1°
    <?php echo $campeao1;?>
  </div>
      <div class="col-md-2">
    Campeão 2°
    <?php echo $campeao2;?>
  </div>
      <div class="col-md-2">
    Campeão 3°
    <?php echo $campeao3;?>
  </div>
      <div class="col-md-2">
    Campeão 4°
    <?php echo $campeao4;?>
  </div>
      <div class="col-md-2">
    Campeão 5°
    <?php echo $campeao5;?>
  </div>
</div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1">
    </div>
  <div class="col-md-2">
<?php echo "<img src='".$img1."'>";?>
</div>
  <div class="col-md-2">
<?php echo "<img src='".$img2."'>";?>
</div>
  <div class="col-md-2">
<?php echo "<img src='".$img3."'>";?>
</div>
  <div class="col-md-2">
<?php echo "<img src='".$img4."'>";?>
</div>
  <div class="col-md-2">
<?php echo "<img src='".$img5."'>";?>
</div>
</div>
</div>
</br>
<?php
$sql = "SELECT A.comentario, P.nick FROM tb_avaliacao AS A INNER JOIN tb_perfillol AS P ON A.id_usuario2 = P.cd_perfillol WHERE id_usuario2=$cd";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Mensagem de ".$row['nick'].": ".$row['comentario']."<br>";
    }
}else{
  echo "Sem mensagens";
}
?>
<!--Convite-->
<?php
  $sql = "SELECT * FROM tb_perfillol WHERE id_usuario='$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $cd=$row['cd_perfillol'];
      }
    }
  $sql = "SELECT E.nome, L.lane, C.cd_convite, C.mensagem, C.id_jogadorlol, C.cd_convite, C.status
          FROM tb_conviteequipeusuario AS C
          INNER JOIN tb_equipelol AS E
          ON C.id_equipelol = E.cd_equipelol
          INNER JOIN tb_lanelol AS L
          ON C.id_lanelol = L.cd_lanelol
          WHERE id_jogadorlol=$cd";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<form mehtod='POST' action='conviteperfil.php'>  equipe ".$row['nome']." quer que você faça parte deles, tendo como função ".$row['lane'].'<br>'." mensagem: ".$row['mensagem'].
        "<input type='hidden' value='".$row['cd_convite']."' name='as'>
          <input type='submit' name='botao7' value='Aceitar'>
          <input type='submit' name='botao7' value='Recusar'></form><br>";
      }
      }else{
      echo "Sem Convites";
      }
?>
<!--Fim Convite-->
<!--Fim Conviteamigo-->
<?php
  $sql = "SELECT A.cd_amigos, P.nick, A.id_usuario2 FROM tb_amigos AS A INNER JOIN tb_perfillol AS P ON A.id_usuario2=P.cd_perfillol WHERE id_usuario='$id' AND status=0";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<form method='POST'> o jogador ".$row['nick']." enviou uma solicitacao de amizade";
        echo "<input type='hidden' value='".$row['cd_amigos']."' name='cdamigos'><br>
          <input type='submit' name='botao2' value='Aceitar'>
          <input type='submit' name='botao2' value='Recusar'></form>";
      }
    }else {
      echo "Sem convites de amizade";
    }
    if (isset($_POST['botao2'])){
      $cdamigos=$_POST['cdamigos'];
      if ($_POST['botao2']=="Aceitar") {
        $sql = "UPDATE tb_amigos SET status=1 WHERE cd_amigos=$cdamigos";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }else{
        $sql = "UPDATE tb_amigos SET status=2 WHERE cd_amigos=$cdamigos";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
      }
    }
  }
?>
<!--Fim Conviteamigo-->
  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
