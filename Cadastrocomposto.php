<?php
include 'config.php';
if(isset($_SESSION["cdusuario"])){
  include 'menulogado.php';
}
else{
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
    <input type="text" name="nome" placeholder="Digite seu nome completo" required=""><br>
    <input type="text" name="nick" placeholder="Digite seu nick" required=""><br>
    <input type="password" name="senha" placeholder="Digite sua senha" required=""><br>
    <input type="password" name="csenha" placeholder="Confirme sua senha" required=""><br>
    <input type="date" name="nascimento" placeholder="Informe sua data de nascimento" required=""><br>
    <input type="radio" name="genero" value="Masculino"> Male
    <input type="radio" name="genero" value="Feminino"> Female<br>
    <select name="cargo">
      <option value="1">Usuário</option>
      <option value="2">Moderador</option>
      <option value="3">Administrador</option>
    </select><br>
    <textarea name="sobre" rows="10" cols="40" placeholder="Fale um pouco sobre você" required=""></textarea><br>
    <input type="email" name="email" placeholder="Digite seu email" required=""><br>
    <input type="submit" value="ENVIAR" name="enviar">
    </form>
    <?php
    if (isset($_POST['enviar'])) {
      include 'connect.php';
      //Recebendo Dados
        $nome = $_POST['nome'];
        $nick = $_POST['nick'];
        $senha = $_POST['senha'];
        $csenha = $_POST['csenha'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $cargo = $_POST['cargo'];
        $sobre = $_POST['sobre'];
        $email = $_POST['email'];
      //Fim
      //Confirmação de senha
    if ($senha == $csenha) {
      $conn = new mysqli("localhost","root","usbw","db_atoxicated");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
        $sql = "INSERT INTO tb_usuario VALUES ('null', '$nome', '$nick', '$senha', '$nascimento', 0, '$sobre', '$genero', '$cargo', 1, '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }else {
        echo "Senhas não coincidem";
      }
    }
    ?>
  </body>
</html>
