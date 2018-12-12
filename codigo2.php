<?php
include 'config.php';
include 'connect.php';
if(isset($_SESSION["cdusuario"])){
}
else{
  header('Location: login.php');
}
if (isset($_POST['nick']) && $_POST['nick'] ==! ""  ) {
  $_SESSION['nickbusca']=$_POST['nick'];
  header('location:perfillolpublico.php');
}else {
  header('location:filtrodejogadoreslol.php');
}

?>
<!--
<?php
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
    $elo = "Sem Elo";
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

      //relaciona o elo que vem da api com o numero de elo do banco pq o danilo tem problema kk
          $sql = "SELECT `cd_elolol` FROM `tb_elolol` WHERE `apielo` = '$elo'";
          $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
       $elo2 = $row['cd_elolol'];
       echo $elo;
         }
      } else {
         echo "0 results";
      }
      //coloca o id pego anteriormente na tabela do perfil
      $sql = "UPDATE `tb_perfillol` SET `id_elolol`=$elo2 WHERE 'id_usuario' = $id";
      if ($conn->query($sql) === TRUE) {
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }}



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
    </div>

    <div class="col-xl-6 containerperfillol">
      <div class="col-xl-12 conteudoperfillol">
          <div class="row">
              <div class="col-xl-3 row1perfillol">Nivel<br><?php echo $level;?></div>
              <div class="col-xl-3 row1perfillol">Elo<br><?php echo $elo;?></div>
              <div class="col-xl-3 row1perfillol">Role principal<br><?php echo "<img src='".$lane1."'>";?></div>
              <div class="col-xl-3 row1perfillol">role secundaria<br><?php echo "<img src='".$lane2."'>";?></div>
          </div>
      </div>
      <div class="col-xl-12 conteudoperfillol">
          <div class="row">
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
          </div>
      </div>
      <div class="col-xl-12 conteudoperfillol">
          <div class="row">
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
          </div>
      </div>
      <div class="col-xl-12 conteudoperfillol">
          <div class="row">
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
          </div>
      </div>
      <div class="col-xl-12 conteudoperfillol">
          <div class="row">
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
              <div class="col-xl-3 row1perfillol"></div>
          </div>
      </div>

    </div>
  </div>
</div>











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
$sql = "SELECT * FROM tb_perfillol WHERE id_usuario=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ass=$row['cd_perfillol'];
    }
  }
$sql = "SELECT * FROM tb_conviteequipeusuario WHERE id_jogadorlol='$ass' and status=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row_cnt = mysqli_num_rows($result);
    echo "Você tem ".$row_cnt." novos convites"."<br>";
    while($row = $result->fetch_assoc()) {
      $cdconvite=$row["cd_convite"];
      $jlol=$row["id_jogadorlol"];
      $eqlol=$row["id_equipelol"];
      $mensagem=$row["mensagem"];
      $status=$row["status"];
      $l=$row["id_lanelol"];
      $f=$row["id_funcaocs"];
    //informações da lane
      $sql = "SELECT * FROM tb_lanelol WHERE cd_lanelol='$l'";
      $result1 = $conn->query($sql);
      if ($result1->num_rows > 0) {
          while($row = $result1->fetch_assoc()) {
            $nomelane=$row["lane"];
          }
        }
    //fim
    //informações equipe
      $sql = "SELECT * FROM tb_equipelol WHERE cd_equipelol='$eqlol'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $nomeequipe=$row["nome"];
          }
        }
        echo '<form method="POST">'."a equipe ".$nomeequipe." quer que você faça parte deles, tendo como função ".$nomelane.'<br>'." mensagem: ".$mensagem.'<br>'.'<input type="submit" name="botao" value="Aceitar"><input type="submit" name="botao" value="Rejeitar">'.'</form>';
        if (isset($_POST['botao'])) {
        $botao=$_POST['botao'];
        if ($botao=="Aceitar") {
          echo $ass;
          $sql = "UPDATE tb_perfillol SET id_equipelol='$eqlol' WHERE id_usuario='$cd'";
          if ($conn->query($sql) === TRUE) {
echo "Feito!";
} else {
echo "Erro: " . $conn->error;
}

          $sql = "UPDATE tb_conviteequipeusuario SET status=1 WHERE cd_convite=$cdconvite";
          if ($conn->query($sql) === TRUE) {
echo "Feito!";
} else {
echo "Erro: " . $conn->error;
}

          if ($nomelane=="Topo") {
            $sql = "UPDATE tb_equipelol SET id_topo='$ass' WHERE cd_equipelol='$eqlol'";
            if ($conn->query($sql) === TRUE) {
  echo "Feito!";
} else {
  echo "Erro: " . $conn->error;
}

          }
          elseif ($nomelane=="Selva") {
            $sql = "UPDATE tb_equipelol SET id_selva='$cdperfil' WHERE cd_equipelol='$eqlol'";
            if ($conn->query($sql) === TRUE) {
  echo " Feito!";
} else {
  echo "Erro: " . $conn->error;
}
          }
          elseif ($nomelane=="Meio") {
            $sql = "UPDATE tb_equipelol SET id_meio='$cdperfil' WHERE cd_equipelol='$eqlol'";
            if ($conn->query($sql) === TRUE) {
  echo " Feito!";
} else {
  echo "Erro: " . $conn->error;
}
          }
          elseif ($nomelane=="Atirador") {
            $sql = "UPDATE tb_equipelol SET id_atirador='$cdperfil' WHERE cd_equipelol='$eqlol'";
            if ($conn->query($sql) === TRUE) {
  echo " Feito!";
} else {
  echo "Erro: " . $conn->error;
}
          }
          elseif ($nomelane=="Suporte") {
            $sql = "UPDATE tb_equipelol SET id_suporte='$cdperfil' WHERE cd_equipelol='$eqlol'";
            if ($conn->query($sql) === TRUE) {
  echo " Feito!";
} else {
  echo "Erro: " . $conn->error;
}
          }

    //fim
  }else{
    $sql = "UPDATE tb_conviteequipeusuario SET status=1 WHERE cd_convite=$cdconvite";
    if ($conn->query($sql) === TRUE) {
echo "Feito!";
} else {
echo "Erro: " . $conn->error;
}
  }
}
}
} else {
    echo "Sem convites de equipes<br>";
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
        $sql = "Delete FROM tb_amigos WHERE cd_amigos=$cdamigos";
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
</html>
