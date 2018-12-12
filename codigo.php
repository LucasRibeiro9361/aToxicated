<?php
include 'config.php';
include 'connect.php';
include 'conviteperfil.php';
if (isset($_POST['nome']) && $_POST['nome'] ==! "") {
$nom=$_POST['nome'];
$_SESSION['equipe']=$nom;
header('Location:perfilequipelolpublica.php');
}else {
  header('location:filtroequipeslol.php');
}
?>
