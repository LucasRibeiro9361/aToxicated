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
<meta charset="utf-8">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="perfillolpublico.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/scripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Perfil League of Legends</title>
  </head>
<body>
    <?php
    $id=$_SESSION["cdusuario"];
		$nick1=$_SESSION['nickbusca'];
    if(isset($nick1) && $nick1 ==! ""){
    $sql = "SELECT P.cd_perfillol, P.nick, P.objetivo, P.estado, C1.campeoes AS campeao1, C1.img AS img1, C2.campeoes AS campeao2, C2.img AS img2,
		 C3.campeoes AS campeao3, C3.img AS img3, C4.campeoes AS campeao4, C4.img AS img4, C5.campeoes AS campeao5, C5.img AS img5, E.elo AS elo,
		 L1.lane AS lane1, P.id_usuario, Eq.nome AS equipe, P.reputacao, P.levellol, P.imgperfil, U1.nick AS usuario, L2.lane AS lane2
		FROM tb_perfillol AS P
		INNER JOIN tb_usuario AS U1
		ON P.id_usuario = U1.cd_usuario
		LEFT JOIN tb_campeoes AS C1
		ON P.campeao1 = C1.cd_campeoes
		LEFT JOIN tb_campeoes AS C2
		ON P.campeao2 = C2.cd_campeoes
		LEFT JOIN tb_campeoes AS C3
		ON P.campeao3 = C3.cd_campeoes
		LEFT JOIN tb_campeoes AS C4
		ON P.campeao4 = C4.cd_campeoes
		LEFT JOIN tb_campeoes AS C5
		ON P.campeao5 = C5.cd_campeoes
		LEFT JOIN tb_elolol AS E
		ON P.id_elolol = E.cd_elolol
		LEFT JOIN tb_lanelol AS L1
		ON P.id_lane1lol = L1.cd_lanelol
		LEFT JOIN tb_lanelol AS L2
		ON P.id_lane2lol = L2.cd_lanelol
		LEFT JOIN tb_equipelol AS EQ
		ON P.id_equipelol = EQ.cd_equipelol
    WHERE P.nick ='$nick1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
					$nickshow = $row['nick'];
          $usuario = $row['usuario'];
					$imgperfil = $row['imgperfil'];
					$objetivo = $row['objetivo'];
					$estado = $row['estado'];
					$campeao1 = $row['campeao1'];
					$campeaoimg1 = $row['img1'];
					$campeao2 = $row['campeao2'];
					$campeaoimg2 = $row['img2'];
					$campeao3 = $row['campeao3'];
					$campeaoimg3 = $row['img3'];
					$campeao4 = $row['campeao4'];
					$campeaoimg4 = $row['img4'];
					$campeao5 = $row['campeao5'];
					$campeaoimg5 = $row['img5'];
					$elo = $row['elo'];
					$lane1 = $row['lane1'];
					$lane2 = $row['lane2'];
					$equipe = $row['equipe'];
					$reputacao = $row['reputacao'];
					$level = $row['levellol'];
					$cdperfil=$row['cd_perfillol'];
					$idusuario=$row['id_usuario'];
				}
		}

    $sql = "SELECT idlol FROM tb_perfillol WHERE nick ='$nick1'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$idlol = $row['idlol'];
				}
		}else{
			echo "Sem mensagens";
		}

    $url2 = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/".$idlol.$_SESSION['apikeylol']);
    $content2 = json_decode($url2, true);
    //verifica se o usuario ja tem elo

    $_SESSION['profilelol_queueType'] = $content2[0]['queueType'];

    $lolprofile['lol_queueType'] = $_SESSION['profilelol_queueType'];

        if($lolprofile['lol_queueType'] == "RANKED_FLEX_SR"){
              $_SESSION['wins'] = $content2[1]['wins'];
              $_SESSION['losses'] = $content2[1]['losses'];
          }else{
            $_SESSION['wins'] = $content2[0]['wins'];
            $_SESSION['losses'] = $content2[0]['losses'];
          }
          echo $_SESSION['wins'].$_SESSION['losses'];
//comentarios//
		$sql = "SELECT A.comentario, P.nick FROM tb_avaliacao AS A INNER JOIN tb_perfillol AS P ON A.id_usuario1 = P.cd_perfillol WHERE id_usuario2=$cdperfil";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "Mensagem de ".$row['nick'].": ".$row['comentario']."<br>";
				}
		}else{
			echo "Sem mensagens";
		}
//fim//
  	?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-2 containerperfilgeral">
       <div class="col-xs-12">
          <div class="row">
            <div class="col-xl-6 iconperfilgeral ">
               <a href="profilecsgo.php"><img style="max-width:100%;max-height:100%;float:right;" src="img/iconcs.png"></a>
            </div>
             <div class="col-xl-6 iconperfilgeral">
                <a href="perfilolpublico.php"><img style="max-width:100%;max-height:100%;float:left;" src="img/iconlol.png"></a>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-5 imgperfilgeral bordateste">
               <style>
                  .imgperfilgeral{
                    background-image: url(img/csgobackground.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                  }
               </style>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 reputacao">
               <center><?php echo $reputacao;?></center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 nomeperfilgeral">
               <center><?php echo $usuario;?></center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 idade">
               <center>idade</center>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Estado">
               Estado<br>
               <?php echo $estado;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Nicklol">
               Nick do LOL<br>
               <?php echo $nickshow;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Objetivo">
               Objetivo<br>
               <?php echo $objetivo;?>
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 Sobre">
              Sobre
             </div>
          </div>
          <div class="row">
             <div class="col-xl-12 editarperfil">
               <?php
               //amizade
               		echo "<form method='post'>
               			<input class='botao1 botao' type='SUBMIT' name='botao1' value='Amizade'>
               		</form>";
               		if (isset($_POST['botao1'])) {
               				$sql = "SELECT * FROM tb_amigos WHERE id_usuario1='$id' and id_usuario2=$idusuario";
               				$result = $conn->query($sql);
               				if ($result->num_rows > 0) {
               						while($row = $result->fetch_assoc()) {
               						echo "<script language='javascript' type='text/javascript'>alert('Voce ja enviou um pedido ');</script>";
               						}
               					}else{
               			$sql="INSERT INTO tb_amigos VALUES(null,$id,$idusuario,0)";
               			if ($conn->query($sql) === TRUE) {
                   echo "New record created successfully";
               } else {
                   echo "Error: " . $sql . "<br>" . $conn->error;
               }

               		}
               	}
               //fim
               ?>
             </div>
          </div>
       </div>
    </div>
<style>
</style>
    <div class="col-xl-6 containerperfillol">
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-12 colunatitulo"><center>Funcao e ELO</center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-3 row1perfillol nivelimg"><center>Nivel<br><br><?php echo $level;?></center></div>
              <div class="col-xl-3 row1perfillol"><center>Elo<br><br><?php echo $elo;?></center></div>
              <div class="col-xl-3 row1perfillol rota"><center>Role principal<br><?php echo "<img src='".$lane1."'>";?></center></div>
              <div class="col-xl-3 row1perfillol rota"><center>Role secundaria<br><?php echo "<img src='".$lane2."'>";?></center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
              <div class="col-xl-12 row1perfillol">Time do jogador:<br><?php echo $equipe;?></div>

          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-12 colunatitulo"><center>Estatisticas</center></div>
          </div>
      </div>
      <div class="col-xl-12">
          <div class="row">
            <div class="col-xl-3 row3perfillol partida"><center>Partidas<br><?php $total = $_SESSION['wins']+
$_SESSION['losses']; echo $total;?><img src="img/partida.png"></center></div>
            <div class="col-xl-3 row3perfillol winrate"><center>Winrate<br><?php $winrate = $_SESSION['wins']/$total; echo substr ($winrate, 2, 2)."%";?><img src="img/winrate.png"></center></div>
            <div class="col-xl-3 row3perfillol"><center>Vitorias</center><?php echo $_SESSION['wins'];?></div>
            <div class="col-xl-3 row3perfillol"><center>Derrotas</center><?php echo $_SESSION['losses'];?></div>
          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-12 colunatitulo"><center>Champions</center></div>
          </div>
      </div>
      <div class="col-xl-12 ">
          <div class="row">
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao1;?><br><?php echo "<img src='".$campeaoimg1."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao2;?><br><?php echo "<img src='".$campeaoimg2."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao3;?><br><?php echo "<img src='".$campeaoimg3."'>";?></center></div>
              <div class="col-xl-3 row3perfillol champ"><center><?php echo $campeao4;?><br><?php echo "<img src='".$campeaoimg4."'>";?></center></div>
          </div>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
    <div style="margin-left:15%;margin-top:1%;"class="col-xl-12 containerdebaixo">
      <div class="row">
        <div class="col-xl-4 containeravaliar">

<?php
//Avaliação
echo "<center> <div class='tituloavaliar'>Avalie sua experiencia com esse jogador</div>
      <form method='POST'>
      <textarea name='comentario' rows='10' cols='40'></textarea><br>
      <input class='botao1 botao' type='submit' name='botao' value='Boa'><input class='botao1 botao' type='submit' name='botao' value='Ruim'></form> </center>";
      if (isset($_POST['botao'])) {
        $comentario=$_POST['comentario'];
        $sql = "SELECT * FROM tb_perfillol WHERE id_usuario='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $id1=$row['cd_perfillol'];
            }
          }
        if($_POST['botao']=="Boa"){
          $sql = "SELECT * FROM tb_avaliacao WHERE id_usuario1=$id1 AND id_usuario2=$cdperfil";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "Você já avaliou esse jogador";
              }
          }else{
            $sql = "INSERT INTO tb_avaliacao VALUES(null,'$comentario','$id1',$cdperfil)";
            $sql = "UPDATE tb_perfillol SET reputacao=reputacao+10 WHERE cd_perfil=$id1";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
          }
        }
        if ($_POST['botao']=="Ruim") {
          $sql = "SELECT * FROM tb_avaliacao WHERE id_usuario1=$id1 AND id_usuario2=$cdperfil";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "Você já avaliou esse jogador";
              }
          }else{
            $sql = "INSERT INTO tb_avaliacao VALUES(null,'$comentario','$id1',$cdperfil)";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $sql = "UPDATE tb_perfillol SET reputacao=reputacao-10 WHERE cd_perfillol=$id1";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
          }
        }
      }
//fim
?>
</div>
<div class="col-xl-4 containerconvitebaixo">
<?php
//convite
echo "
<center><div class='tituloavaliar'>Convidar Jogador</div>
<form method='post'>
  <div class='div-select'>
	<select name='lane'>
		<option value='1'>Topo</option>
		<option value='2'>Selva</option>
		<option value='3'>Meio</option>
		<option value='4'>Atirador</option>
		<option value='5'>Suporte</option>
	</select>
  </div>
	<textarea name='mensagem' rows='4' cols='25'></textarea><br>
	<input class='botao botao1' type='SUBMIT' name='botao2' value='Enviar pedido'>
</form></center>";
	if (isset($_POST['botao2'])) {
	$mensagem=$_POST['mensagem'];
	$lane=$_POST['lane'];
	$sql = "SELECT * FROM tb_perfillol WHERE id_usuario='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$as=$row['cd_perfillol'];
			}
	}
	$sql = "SELECT * FROM tb_equipelol WHERE id_dono='$as'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$equipe=$row['cd_equipelol'];
			}
		}
	$sql = "SELECT * FROM tb_conviteequipeusuario WHERE id_equipelol=$equipe AND id_jogadorlol='$cdperfil'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
				echo "Você já convidou esse jogador";;
	}else{
		$sql="INSERT INTO tb_conviteequipeusuario VALUES(null,$equipe,null,'$mensagem',0,$lane,null,$cdperfil,null)";
		if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
		} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
	//fim
	}else{
		echo "<center>Nenhum jogador encontrado com esse nome.<br><a href='filtrodejogadoreslol.php'><input type='submit' value='VOLTAR'></a></center>";
	}
?>      </div>
      </div>
    </div>
  </div>
</div>
  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
