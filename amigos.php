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
