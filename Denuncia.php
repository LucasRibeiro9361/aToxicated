<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST">
      <input type="text" name="nick" placeholder="Digite o nick do denunciado"><br>
      <select name="jogo">
        <option value="1">LOL</option>
      </select><br>
      <textarea name="motivo" rows="2" cols="25"></textarea><br>
      <textarea name="complemento" rows="5" cols="40"></textarea><br>
      <input type="submit" name="botao" value="ENVIAR">
    </form>
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
</html>
