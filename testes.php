<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'config.php';
    include 'connect.php';
    include 'prfillolparticular.php';
    $sql = "SELECT E.nome, L.lane, C.cd_convite, C.mensagem, C.id_jogadorlol, C.cd_convite, C.status
            FROM tb_conviteequipeusuario AS C
            INNER JOIN tb_equipelol AS E
            ON C.id_equipelol = E.cd_equipelol
            INNER JOIN tb_lanelol AS L
            ON C.id_lanelol = L.cd_lanelol
            WHERE id_jogadorlol=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row_cnt = mysqli_num_rows($result);
      echo "Você tem ".$row_cnt." novos convites"."<br>";
        while($row = $result->fetch_assoc()) {
          echo "<form mehtod='POST'> a equipe ".$row['nome']." quer que você faça parte deles, tendo como função ".$row['lane'].'<br>'." mensagem: ".$row['mensagem'];
          echo "<input type='hidden' value='".$row['cd_convite']."' name='cd'>
            <input type='submit' name='botao' value='Aceitar'>
            <input type='submit' name='botao' value='Recusar'></form>";
        }
        }else{
        echo "Sem Convites";
      }
      if (isset($_POST['botao'])) {
        $cd=$_POST['cd'];
        $sql = "SELECT * FROM tb_conviteequipeusuario WHERE cd_convite='$cd'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $cdconvite=$row["cd_convite"];
              $jlol=$row["id_jogadorlol"];
              $eqlol=$row["id_equipelol"];
              $mensagem=$row["mensagem"];
              $status=$row["status"];
              $l=$row["id_lanelol"];
            }
          }
        if($_POST['botao'] == "Aceitar"){
          $sql = "UPDATE tb_perfillol SET id_equipelol='$eqlol' WHERE id_usuario='$id'";
            if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
            $sql = "UPDATE tb_conviteequipeusuario SET status=1 WHERE cd_convite=$cdconvite";
            if ($conn->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            if ($nomelane=="Topo") {
              $sql = "UPDATE tb_equipelol SET id_topo='$cdperfil' WHERE cd_equipelol='$eqlol'";
              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
            }elseif ($nomelane=="Selva") {
              $sql = "UPDATE tb_equipelol SET id_selva='$cdperfil' WHERE cd_equipelol='$eqlol'";
              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
            }elseif ($nomelane=="Meio") {
              $sql = "UPDATE tb_equipelol SET id_meio='$cdperfil' WHERE cd_equipelol='$eqlol'";
              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
            }elseif ($nomelane=="Atirador") {
              $sql = "UPDATE tb_equipelol SET id_atirador='$cdperfil' WHERE cd_equipelol='$eqlol'";
              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
            }elseif ($nomelane=="Suporte") {
              $sql = "UPDATE tb_equipelol SET id_suporte='$cdperfil' WHERE cd_equipelol='$eqlol'";
              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
        }
        else if($_POST['botao'] == "Recusar"){
          $sql = "UPDATE tb_conviteequipeusuario SET status=1 WHERE cd_convite=$cdconvite";
          if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
        }
      }
    ?>
  </table>
  </body>
</html>
