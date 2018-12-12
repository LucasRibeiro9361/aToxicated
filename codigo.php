<?php
include 'config.php';
include 'connect.php';
unset($_SESSION['equipe']);
echo $_POST['nome'];
if (isset($_POST['nome'])) {
$nom=$_POST['nome'];
$sql = "SELECT nome FROM tb_equipelol WHERE nome='$nom'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $_SESSION['equipe']=$nom;
    header('location:perfilequipelolpublica.php');
  }
}else{
    header('location:filtroequipeslol.php');
    echo  "<script>alert('Nome do jogador não encontrado');</script>";
}
}else {
  header('location:filtroequipeslol.php');
  echo  "<script>alert('Você não colocou o nome da equipe que procura corretamente');</script>";
}
?>
