<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'connect.php';
    if(isset($_POST['botao7'])){
      echo "foi";
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
    }
    ?>
  </body>
</html>
