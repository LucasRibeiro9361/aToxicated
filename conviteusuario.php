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
          a equipe <strong>".$row['nome']."</strong> quer que você se junte a eles atuando na função <strong>".$row['lane']
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
  $sql = "UPDATE tb_conviteequipeusuario SET status='1' WHERE cd_convite=$cdconvite";
  if ($conn->query($sql) === TRUE) {
      echo "status atualizado";
  } else {
      echo "Error updating record: " . $conn->error;
  }
}else{
  $sql = "UPDATE tb_conviteequipeusuario SET status='1' WHERE cd_convite=$cdconvite";
  if ($conn->query($sql) === TRUE) {
      echo "status atualizado";
  } else {
      echo "Error updating record: " . $conn->error;
  }
}
}
?>
