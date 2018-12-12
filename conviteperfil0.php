<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'connect.php';
    $cdperfil=18;
    $sql = "SELECT * FROM tb_conviteequipeusuario WHERE id_jogadorlol='$cdperfil' and status=0";
    $result = $conn->query($sql);
$_SESSION['harison'] = $cdperfil;
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
            $botao=$_POST['botao'];
            if ($botao=="Aceitar") {
              echo $cdperfil;
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
                $sql = "UPDATE tb_equipelol SET id_topo='$cdperfil' WHERE cd_equipelol='$eqlol'";
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
      }
    }
    } else {
        echo "Sem convites";
    }
    ?>
  </body>
</html>
