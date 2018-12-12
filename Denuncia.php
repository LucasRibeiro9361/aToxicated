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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="perfillolparticular.css">
    <link rel="stylesheet" type="text/css" href="perfilusuario.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <br>
    <center>
      <div class="container-fluid" id="cont1">
        <div class="row">
          <div class="col-lg-6">
    <form method="POST">
      <input type="text" name="nick" placeholder="Digite o nick do denunciado"><br>
    </div>
  </div>
  <br>
    <div class="row">
      <div class="col-lg-6">
      <select name="jogo">
        <option value="1">LOL</option>
      </select><br>
    </div></div>
      <br>
    <div class="row">
      <div class="col-lg-6">
      <textarea name="motivo" rows="2" cols="25"></textarea><br>
    </div>
  </div>
    <br>
  <div class="row">
    <div class="col-lg-6">
      <textarea name="complemento" rows="5" cols="40"></textarea><br>
    </div>
  </div>
    <br>
  <div class="row">
    <div class="col-lg-6">
      <input type="submit" name="botao" value="ENVIAR">
    </div>
  </div>
    </form>
  </center>
    <?php
      include 'config.php';
      include 'connect.php';
      if (isset($_POST['botao'])) {
        $nick=$_POST['nick'];
        $jogo=$_POST['jogo'];
        $motivo=$_POST['motivo'];
        $complemento=$_POST['complemento'];
        if ($jogo=="1") {
          $sql = "SELECT * FROM tb_perfillol WHERE nick='$nick'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $idusuario=$row['id_usuario'];
            }
          }else {
            echo "Nao existem jogadores com esse nome";
          }
          $sql="INSERT INTO tb_denuncia VALUES (null,'$motivo','$complemento',$idusuario)";
          if ($conn->query($sql) === TRUE) {
              echo "Denuncia registrada.";
          } else {
              echo "Erro: " . $sql . "<br>" . $conn->error;
          }
        }else {
          $sql = "SELECT * FROM tb_perfilcs WHERE nick=$nick";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $idusuario=$row['id_usuario'];
            }
          }else {
            echo "Nao existem jogadores com esse nome";
          }
          $sql="INSERT INTO tb_denuncia VALUES (null,'$motivo','$complemento',$idusuario)";
          if ($conn->query($sql) === TRUE) {
              echo "Feito!";
          } else {
              echo "Erro: " . $sql . "<br>" . $conn->error;
          }
        }
      }
    ?>
  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
