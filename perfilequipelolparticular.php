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
error_reporting(0);
ini_set(“display_errors”, 0 );
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id=$_SESSION['cdusuario'];
    $sql = "SELECT * FROM tb_perfillol WHERE id_usuario=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id=$row['cd_perfillol'];
      }
    }
    $sql = "SELECT Eq.cd_equipelol, Eq.nome, Eq.descricao, Eq.objetivo, Eq.estado, E.elo AS elominimo, E1.elo as elomaximo, P.nick AS topo, P1.nick AS selva, P2.nick AS meio, P3.nick AS atirador, P4.nick AS suporte, P5.nick AS dono
FROM tb_equipelol AS Eq
LEFT JOIN tb_elolol AS E
ON Eq.id_elominimo = E.cd_elolol
LEFT JOIN tb_elolol AS E1
ON Eq.id_elomaximo = E1.cd_elolol
LEFT JOIN tb_perfillol AS P
ON Eq.id_Topo = P.cd_perfillol
LEFT JOIN tb_perfillol AS P1
ON Eq.id_Selva = P1.cd_perfillol
LEFT JOIN tb_perfillol AS P2
ON Eq.id_Meio = P2.cd_perfillol
LEFT JOIN tb_perfillol AS P3
ON Eq.id_atirador = P3.cd_perfillol
LEFT JOIN tb_perfillol AS P4
ON Eq.id_suporte = P4.cd_perfillol
LEFT JOIN tb_perfillol AS P5
ON Eq.id_dono = P5.cd_perfillol
WHERE id_Topo=$id or id_Selva=$id or id_meio=$id or id_atirador=$id or id_suporte=$id or id_dono=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo $row['nome']."<br>"
        .$row['descricao']."<br>"
        .$row['objetivo']."<br>"
        .$row['estado']."<br>"
        .$row['elominimo']."<br>"
        .$row['elomaximo']."<br>"
        .$row['topo']."<br>"
        .$row['selva']."<br>"
        .$row['meio']."<br>"
        .$row['atirador']."<br>"
        .$row['suporte']."<br>"
        .$row['dono']."<br>";
        $cdequipe=$row['cd_equipelol'];
        $dono=$row['dono'];
      }
    }else {
      echo "Sem equipe";
    }
    $sql = "SELECT * FROM tb_perfillol WHERE nick = '$dono'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $cddono=$row['cd_perfillol'];
      }
    }
    echo $id."<br>".$dono;
  if ($id == $cddono) {
    echo "foi";
    $sql = "SELECT C.cd_convite, L.lane AS lane, P.nick AS nome, C.mensagem, C.status, C.id_jogadorlol
            FROM tb_conviteusuarioequipe AS C
            INNER JOIN tb_lanelol AS L
            ON C.id_lanelol=L.cd_lanelol
            INNER JOIN tb_perfillol AS P
            ON C.id_jogadorlol=P.cd_perfillol
            WHERE C.id_equipelol=$cdequipe and status = 0 ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<form method='POST'>
                O jogador <strong>".$row['nome']."</strong> quer se juntar a sua equipe atuando na função <strong>".$row['lane']
                ."</strong><br>mensagem: <strong>".$row['mensagem']."</strong><br><input type='hidden' name='cdconvite' value='".$row['cd_convite']."'>
                <input type='hidden' name='lane' value='".$row['lane']."'><input type='hidden' name='cdconvite' value='".$row['id_jogadorlol']."'>
                <input type='submit' name='botao' value='Aceitar'><input type='submit' name='botao' value='Recusar'><br></form>";
      }
    }else{
      echo "Sem convites";
    }
    if (isset($_POST['botao'])) {
    if ($_POST['botao']=="Aceitar") {
      
    }else{
    }
  }
  }
    ?>
  </body>
</html>
