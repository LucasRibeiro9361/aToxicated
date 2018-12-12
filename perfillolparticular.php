<?php
include 'config.php';
include 'connect.php';
include 'selectdedadosperfilparticular.php';
include 'conviteperfil.php';
$id = $_SESSION["cdusuario"];
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
$sql = "SELECT id_usuario FROM tb_perfillol WHERE id_usuario='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="perfillolparticular.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil League of Legends</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
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

    $_SESSION['profilelol_queueType'] = $content2[0]['queueType'];

    $lolprofile['lol_queueType'] = $_SESSION['profilelol_queueType'];

        if($lolprofile['lol_queueType'] == "RANKED_FLEX_SR"){
              $_SESSION['profilelol_rank'] = $content2[1]['tier'];
              $_SESSION['profilelol_rank1'] = $content2[1]['rank'];
              $_SESSION['wins'] = $content2[1]['wins'];
              $_SESSION['losses'] = $content2[1]['losses'];
          }else{
            $_SESSION['profilelol_rank'] = $content2[0]['tier'];
            $_SESSION['profilelol_rank1'] = $content2[0]['rank'];
            $_SESSION['wins'] = $content2[0]['wins'];
            $_SESSION['losses'] = $content2[0]['losses'];
          }
      $lolprofile['lol_rank'] = $_SESSION['profilelol_rank'];
      $lolprofile['lol_rank1'] = $_SESSION['profilelol_rank1'];

      $elo = $lolprofile['lol_rank']." ".$lolprofile['lol_rank1'];

      //relaciona o elo que vem da api com o numero de elo do banco
          $sql = "SELECT `cd_elolol` FROM `tb_elolol` WHERE `apielo` = '$elo'";
          $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
       $elo2 = $row['cd_elolol'];
         }
      } else {
         $elo2 = null;
         $elo = "Sem elo";
      }
      //coloca o id pego anteriormente na tabela do perfil
      $sql = "UPDATE `tb_perfillol` SET `id_elolol`= $elo2 WHERE id_usuario = $id";
      if ($conn->query($sql) === TRUE) {
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
             <div class="col-xl-12 reputacao">
               <center><?php echo $reputacao;?></center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 nomeperfilgeral">
               <center><?php echo $_SESSION['nick'];?></center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 idade">
               <center>idade</center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Estado">
               Estado<br>
               <?php echo $estado;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Nicklol">
               Nick do LOL<br>
               <?php echo $nick;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Objetivo">
               Objetivo<br>
               <?php echo $objetivo;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Sobre">
              Sobre
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
              <div class="col-xl-12 colunatitulo"><center>Funcao e ELO</center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-3 row1perfillol nivelimg"><center>Nivel<br><br><?php echo $level;?></center></div>
              <div class="col-xl-3 row1perfillol"><center>Elo<br><br><?php echo $elo;?></center></div>
              <div class="col-xl-3 row1perfillol rota"><center>Role principal<br><?php echo "<img src='".$lane1."'>";?></center></div>
              <div class="col-xl-3 row1perfillol rota"><center>Role secundaria<br><?php echo "<img src='".$lane2."'>";?></center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-12 row1perfillol">Time do jogador:<br><?php echo $equipe;?></div>

          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-12 colunatitulo"><center>Estatisticas</center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-3 row3perfillol winrate"><center>Winrate<br><img src="img/winrate.png"></center></div>
              <div class="col-xl-3 row3perfillol partida"><center>Partidas<br><img src="img/partida.png"></center></div>
              <div class="col-xl-3 row3perfillol"><center>Vitoria</center></div>
              <div class="col-xl-3 row3perfillol"><center>Derrota</center></div>
          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-12 colunatitulo"><center>Champions</center></div>
          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao1;?><br><?php echo "<img src='".$img1."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao2;?><br><?php echo "<img src='".$img2."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao3;?><br><?php echo "<img src='".$img3."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao4;?><br><?php echo "<img src='".$img4."'>";?></center></div>
          </div>
      </div>

    </div>
  </div>
</div>
<style>
.winrate{
  background-image: url();
}
</style>
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
</body>
</html>
<?php }else{ header('Location: playerhome.php');}?>
