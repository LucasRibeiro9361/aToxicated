<?php
include 'config.php';
include 'connect.php';
include 'selectdedadosperfilparticular.php';
$id = $_SESSION["cdusuario"];
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
$sql = "SELECT C.cd_convite, L.lane AS lane, C.id_lanelol, P.nick AS nome, C.mensagem, C.status, C.id_equipelol
        FROM tb_conviteequipeusuario AS C
        INNER JOIN tb_lanelol AS L
        ON C.id_lanelol=L.cd_lanelol
        INNER JOIN tb_perfillol AS P
        ON C.id_jogadorlol=P.cd_perfillol
        WHERE C.id_jogadorlol=$cd and status = 0 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<form method='POST'>
            O jogador <strong>".$row['nome']."</strong> quer se juntar a sua equipe atuando na função <strong>".$row['lane']
            ."</strong><br>mensagem: <strong>".$row['mensagem']."</strong><br>
            <input type='hidden' name='cdconvite' value='".$row['cd_convite']."'>
            <input type='hidden' name='lane' value='".$row['id_lanelol']."'>
            <input type='hidden' name='cdequipe' value='".$row['id_equipelol']."'>
            <input type='submit' name='botao' value='Aceitar'><input type='submit' name='botao' value='Recusar'><br></form>";
  }
}else{
  echo "Sem convites";
}
if (isset($_POST['botao'])) {
  $lane=$_POST['lane'];
  echo "asdasdasdasd".$lane;
  $cdequipe=$_POST['cdequipe'];
  $cdconvite=$_POST['cdconvite'];
if ($_POST['botao']=="Aceitar") {
  if ($lane=="1") {
    $sql = "SELECT * FROM tb_equipelol WHERE id_Topo <> 'null' and cd_equipelol=$cdequipe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_topo']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  if ($lane=="2") {
    $sql = "SELECT * FROM tb_equipelol WHERE id_selva <> 'null' and cd_equipelol=$cdequipe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_selva']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  if ($lane=="3") {
    $sql = "SELECT * FROM tb_equipelol WHERE id_meio <> 'null' and cd_equipelol=$cdequipe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_meio']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  if ($lane=="4") {
    $sql = "SELECT * FROM tb_equipelol WHERE id_atirador <> 'null' and cd_equipelol=$cdequipe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_atirador']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  if ($lane=="5") {
    $sql = "SELECT * FROM tb_equipelol WHERE id_suporte <> 'null' and cd_equipelol=$cdequipe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $sql = "UPDATE tb_perfillol SET id_equipelol='null' WHERE cd_perfillol='".$row['id_suporte']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  if ($lane=="1") {
    $sql = "UPDATE tb_equipelol SET id_topo='$cd' WHERE cd_equipelol='$cdequipe'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  if ($lane=="2") {
    $sql = "UPDATE tb_equipelol SET id_selva='$cd' WHERE cd_equipelol='$cdequipe'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  if ($lane=="3") {
    $sql = "UPDATE tb_equipelol SET id_meio='$cd' WHERE cd_equipelol='$cdequipe'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  if ($lane=="4") {
    $sql = "UPDATE tb_equipelol SET id_atirador='$cd' WHERE cd_equipelol='$cdequipe'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  if ($lane=="5") {
    $sql = "UPDATE tb_equipelol SET id_suporte='$cd' WHERE cd_equipelol='$cdequipe'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  }
  $sql = "UPDATE tb_  perfillol SET id_equipelol=$cdequipe WHERE cd_perfillol='$cd'";
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
}else{
  $sql = "UPDATE tb_conviteequipeusuario SET status=1 WHERE cd_convite=$cdconvite";
  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }
}
}
?>
