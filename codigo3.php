<?php
  include 'connect.php';
  include 'config.php';
  if (isset($_POST['sair'])) {
    $cdequipe=$_SESSION['cdequipe'];
    $id=$_SESSION['id'];
      $sql = "UPDATE tb_equipelol SET id_Topo=null WHERE id_topo=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      $sql = "UPDATE tb_equipelol SET id_selva=null WHERE id_selva=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      $sql = "UPDATE tb_equipelol SET id_meio=null WHERE id_meio=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      $sql = "UPDATE tb_equipelol SET id_atirador=null WHERE id_atirador=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      $sql = "UPDATE tb_equipelol SET id_suporte=null WHERE id_suporte=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
      $sql = "UPDATE tb_equipelol SET id_dono=null WHERE id_dono=$id and cd_equipelol=$cdequipe";
      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }

    }
?>
