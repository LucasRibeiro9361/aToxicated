<?php
include 'config.php';
include 'connect.php';
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Denuncia</title>
    <style>
    body{
    background-image:url(img/bg-masthead.jpg);
    background-repeat: no-repeat;
    background-size:cover !important;}
    </style>
  </head>
  <body>
    <br><br><br><br><br><br>
        <link rel="stylesheet" type="text/css" href="Denuncia.css">
        <form method="POST">
    <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO : +62 81 314 928 595</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" name="nick" placeholder="Digite o nick do denunciado">
            </div>
            <div class="app-form-group">
                    <select name="jogo">Selecione o jogo
                      <option value="1">LOL</option>
                    </select>
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="Motivo da denuncia">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCELAR</button>
              <button class="app-form-button">ENVIAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div></link></form>
    <?php
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
