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
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="perfilequipelolparticular.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id=$_SESSION['cdusuario'];
    $sql = "SELECT * FROM tb_perfillol WHERE id_usuario=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id=$row['cd_perfillol'];
      }
    }
    $sql = "SELECT Eq.cd_equipelol, Eq.nome, Eq.descricao, Eq.objetivo, Eq.estado, E.elo AS elominimo, E1.elo as elomaximo, P.nick AS topo, P1.nick AS selva, P2.nick AS meio, P3.nick AS atirador, P4.nick AS suporte, P5.nick AS dono
FROM tb_equipelol AS Eq
LEFT JOIN tb_elolol AS E
ON Eq.id_elominimo = E.cd_elolol
LEFT JOIN tb_elolol AS E1
ON Eq.id_elomaximo = E1.cd_elolol
LEFT JOIN tb_perfillol AS P
ON Eq.id_Topo = P.cd_perfillol
LEFT JOIN tb_perfillol AS P1
ON Eq.id_Selva = P1.cd_perfillol
LEFT JOIN tb_perfillol AS P2
ON Eq.id_Meio = P2.cd_perfillol
LEFT JOIN tb_perfillol AS P3
ON Eq.id_atirador = P3.cd_perfillol
LEFT JOIN tb_perfillol AS P4
ON Eq.id_suporte = P4.cd_perfillol
LEFT JOIN tb_perfillol AS P5
ON Eq.id_dono = P5.cd_perfillol
WHERE id_Topo=$id or id_Selva=$id or id_meio=$id or id_atirador=$id or id_suporte=$id or id_dono=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo $nome= $row['nome']."<br>";
        $descricao= $row['descricao']."<br>";
      $objetivo= $row['objetivo']."<br>";
      $estado = $row['estado']."<br>";
      $elominimo = $row['elominimo']."<br>";
      $elomaximo = $row['elomaximo']."<br>";
      $topo = $row['topo']."<br>";
      $selva = $row['selva']."<br>";
      $meio = $row['meio']."<br>";
      $atirador = $row['atirador']."<br>";
      $suporte = $row['suporte']."<br>";
      $row['dono']."<br>";
        $cdequipe=$row['cd_equipelol'];
        $dono=$row['dono'];
      }
    }else {
      echo "Sem equipe";
    }
    $sql = "SELECT * FROM tb_perfillol WHERE nick = '$dono'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $cddono=$row['cd_perfillol'];
      }
    }
    echo $id."<br>".$dono;
  if ($id == $cddono) {
    echo "foi";
    $sql = "SELECT C.cd_convite, L.lane AS lane, P.nick AS nome, C.mensagem, C.status, C.id_jogadorlol
            FROM tb_conviteusuarioequipe AS C
            INNER JOIN tb_lanelol AS L
            ON C.id_lanelol=L.cd_lanelol
            INNER JOIN tb_perfillol AS P
            ON C.id_jogadorlol=P.cd_perfillol
            WHERE C.id_equipelol=$cdequipe and status = 0 ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<form method='POST'>
                O jogador <strong>".$row['nome']."</strong> quer se juntar a sua equipe atuando na função <strong>".$row['lane']
                ."</strong><br>mensagem: <strong>".$row['mensagem']."</strong><br><input type='hidden' name='cdconvite' value='".$row['cd_convite']."'>
                <input type='hidden' name='lane' value='".$row['lane']."'><input type='hidden' name='cdconvite' value='".$row['id_jogadorlol']."'>
                <input type='submit' name='botao' value='Aceitar'><input type='submit' name='botao' value='Recusar'><br></form>";
      }
    }else{
      echo "Sem convites";
    }
    if (isset($_POST['botao'])) {
    if ($_POST['botao']=="Aceitar") {

    }else{
    }
  }
  }
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 containerperfillol">
          <div class="col-xl-12">
              <div class="row">
                  <div class="col-xl-12 colunatitulo"><center>Informações</center></div>
              </div>
          </div>
          <div class="col-xl-12">
              <div class="row">
                  <div class="col-xl-3 row1perfillol nivelimg"><center>Nome<br><br><?php echo $nome;?></center></div>
                  <div class="col-xl-3 row1perfillol"><center>Elo<br><br><?php echo $elo;?></center></div>
                  <div class="col-xl-3 row1perfillol"><center>elominimo<br><br><?php echo $elominimo;?></center></div>
                  <div class="col-xl-3 row1perfillol"><center>elomaximo<br><br><?php echo $elomaximo;?></center></div>
              </div>
          </div>
          <div class="col-xl-12 ">
              <div class="row">
                  <div class="col-xl-12 colunatitulo"><center></center></div>
              </div>
          </div>
          <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-3 row3perfillol "><center>objetivo<br><br><?php echo $objetivo;?></center></div>
                <div class="col-xl-3 row3perfillol "><center>estado<br><br><?php echo $estado;?></center></div>
                <div class="col-xl-3 row3perfillol"><center>descricao<br><br><?php echo $descricao;?></center></div>
                <div class="col-xl-3 row3perfillol"><center>dono<br><br><?php echo $dono;?></center></div>
              </div>
          </div>
          <div class="col-xl-12 ">
              <div class="row">
                  <div class="col-xl-12 colunatitulo"><center>Posições</center></div>
              </div>
          </div>
          <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-2 row3perfillol "><center>topo<br><br><?php echo $topo;?></center></div>
                <div class="col-xl-2 row3perfillol "><center>selva<br><br><?php echo $selva;?></center></div>
                <div class="col-xl-2 row3perfillol"><center>meio<br><br><?php echo $meio;?></center></div>
                <div class="col-xl-2 row3perfillol"><center>atirador<br><br><?php echo $atirador;?></center></div>
                <div class="col-xl-2 row3perfillol"><center>suporte<br><br><?php echo $suporte;?></center></div>
                <div class="col-xl-2 row3perfillol"><center>Equipe<br><br><?php echo $cdequipe;?></center></div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
