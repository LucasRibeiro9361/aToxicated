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
    $nome=$_SESSION['equipe'];
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
WHERE nome='$nome'";
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
      }
    }
    else {
      echo "Sem equipe";
    }
    ?>
    <form method="POST">
      <select name="funcao">
        <option value="1">Topo</option>
        <option value="2">Selva</option>
        <option value="3">Meio</option>
        <option value="4">Atirador</option>
        <option value="5">Suporte</option>
      </select>
      <textarea name="mensagem" rows="4" cols="25" placeholder="Digite sua mensagem"></textarea><br>
      <input type="submit" name="botao" value="ENVIAR">
    <form>
    <?php
    if(isset($_POST['botao'])){
      $funcao=$_POST['funcao'];
      $mensagem=$_POST['mensagem'];
      $perfil=$_SESSION['cdusuario'];
      $sql = "SELECT cd_perfillol FROM tb_perfillol WHERE id_usuario=$perfil";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $cdperfil=$row['cd_perfillol'];
        }
    }
    $sql = "SELECT * FROM tb_conviteusuarioequipe WHERE id_equipelol=$cdequipe and id_jogadorlol=$cdperfil";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "Você já enviou um convite para essa equipe";
      }
    }else{
      $sql = "INSERT INTO tb_conviteusuarioequipe VALUES(
        null,null,$cdequipe,null,$funcao,null,$cdperfil,'$mensagem',0)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  }
    ?>
  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
