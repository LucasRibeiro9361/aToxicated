<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/scripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil csgo</title>
    <style>
        .table {
            table-layout: fixed;
            word-wrap: break-word;
        }
    </style>
  </head>
<?php
  include 'api1/steamauth/steamauth.php';
  if(isset($_SESSION["cdusuario"])){
  	include 'menulogado.php';
        include 'connect.php';
        $cd=$_SESSION["cdusuario"];


        if(!isset($_SESSION['steamid'])) {
            echo "<div style='margin: 30px auto; text-align: center;'>Faça login com a steam<br>";
            loginbutton();
          echo "</div>";
          }  else {
        include 'api1/steamauth/userInfo.php';
        include 'api1/steamauth/userInfo2.php';
        $usuario=       $_SESSION["cdusuario"];
        $steamid=       $_SESSION['steamid'];
        $nick=          $steamprofile['personaname'];
        $time=          $steamprofile['lastlogoff'];
        $perfilurl=     $steamprofile['profileurl'];
        $estado=        $steamprofile['personastate'];
        $avatar=        $steamprofile['avatarfull'];
        $totalkills=    $csgostats['cs_total_kills'];
        $totaldeaths=   $csgostats['cs_total_deaths'];
        $timeplayed=    $csgostats['cs_total_hours'];
        $hs=            $csgostats['cs_total_headshots'];
        $totalkillsak=  $csgostats['cs_total_kills_ak'];
        $totalkillsawp= $csgostats['cs_total_kills_awp'];
        $totalkillsm4=  $csgostats['cs_total_kills_m4a1'];
        $realname=      $steamprofile['realname'];
        $equipecs = 1;
        $marlene = $csgostats['cs_total_kills']/$csgostats['cs_total_deaths'];
        $sql = "UPDATE tb_perfilcs SET lastlogoff = '$time', steamurl = '$perfilurl', avatar = '$avatar', totalkills = '$totalkills', totaldeaths = '$totaldeaths', kd ='$marlene',
        horasdejogo ='$timeplayed',headshot = '$hs', totalkillsak ='$totalkillsak',	totalkillsawp = '$totalkillsawp', totalkillsm4 = '$totalkillsm4', nome = '$realname' WHERE id_usuario = $usuario";
        if ($conn->query($sql) === TRUE) {} else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $sql = "SELECT * FROM tb_perfilcs WHERE id_usuario='$cd'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $nickcs=$row["nick"];
               $objetivo=$row["objetivo"];
               $nivelgc = $row["nivelgc"];
               $equipe = $row["id_equipecs"];
               $estado=$row["estado"];
               $steamid=$row["steamid"];
               $lastlogoff = $row["lastlogoff"];
               $link = $row["steamurl"];
               $estado = $row["estado"];
               $avatar = $row["avatar"];
               $totalkills = $row["totalkills"];
               $totaldeaths = $row["totaldeaths"];
               $kd = $row["kd"];
               $timeplayed = $row["horasdejogo"];
               $headshot  = $row["headshot"];
               $totalkillsak = $row["totalkillsak"];
               $totalkillsm4 = $row["totalkillsm4"];
               $totalkillsawp  = $row["totalkillsawp"];
               $realname = $row["nome"];
               $patente = $row["patente"];
               $funcao1 = $row["funcao1"];
               $funcao2 = $row["funcao2"];
               $steamid = $row["steamid"];
            }
        } else {
            echo "0 resultados";
        }

?>
  <body style="background-color: #EEE;">
    <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #FFF;">
		<h1>perfil</h1>
		<span class="small pull-left" style="padding-right: 10px;">perfil</span>
		<hr>
		<table class='table table-striped'>
      <tr>
        <td><b>Nome</b></td>
        <td><b>Valor</b></td>

      </tr>
      <tr>
        <td>steamid</td>
        <td><?php echo $steamid;?></td>
      </tr>
      <tr>
        <td>nick</td>
        <td><?php echo $nickcs;?></td>
      </tr>
      <tr>
        <td>lastlogoff</td>
        <td><?php
        $timestamp=$lastlogoff;
        echo gmdate("Y-m-d\ H:i:s\ ", $timestamp);
        ?></td>
      </tr>
      <tr>
        <td>link do perfil da steam</td>
        <td><?php echo $link;?></td>
      </tr>
      <tr>
        <td>estado</td>
        <td><?php
          if($estado == 0){
            echo "offline";
          }
          if($estado == 1){
            echo "online";
          }
          if($estado == 2){
            echo "ocupado";
          }
          if($estado == 3){
            echo "longe";
          }
          if($estado == 4){
            echo "soneca";
          }
          if($estado == 5){
            echo "procurando por trocas";
          }
          if($estado == 6){
            echo "pronto para jogar";
          }
        ?></td>
      <!--  <td>0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play</td>-->
      </tr>
      <tr>
        <td>avatar</td>
        <td>
          <img src='<?php echo $avatar;?>'><br>
        </td>
      </tr>
				<tr>
				<td>Abates Totais</td>
				<td>
          <?php
          echo $totalkills;
        ?>
      </td>

			</tr>
				<tr>
				<td>Morte Totais</td>
				<td><?php
        echo $totaldeaths;?></td>

			</tr>
			<tr>
				<td>Relacão Abates/Mortes</td>
				<td><?php
          $marlene = $totalkills/$totaldeaths;
				echo substr ($marlene, 0, 4);?></td>

			</tr>
				<td>Horas Jogadas</td>
				<td><?php
				 $total2 = $timeplayed;

				/* Transforma segundos em formato de data*/
				$horas = floor($total2 / 3600);
				$minutos = floor(($total2 - ($horas * 3600)) / 60);
				$segundos = floor($total2 % 60);
				echo $horas . "h " . $minutos . "m " . $segundos . "s ";
      	?>

</td>

			</tr>
			<tr>
				<td>Porcentagem de tiros na cabeça</td>
				<td><?php
        $marlene3 = $headshot/$totalkills;
					echo substr($marlene3*100,0,2)."%";
				?></td>

			</tr>
			<tr>
				<td>Abates com AK-47</td>
				<td><?php
        echo $totalkillsak;?></td>

			</tr>
			<tr>
				<td>Abates com AWP</td>
				<td><?php
        echo $totalkillsawp;?></td>

			</tr>
					<tr>
				<td>Abates com m4</td>
				<td><?php
        echo $totalkillsm4;?></td>

			</tr>
		</table>
		<hr>
		<div class="pull-right">
		</div>
	</div>
<?php
}}

    else{
    	header('Location: login.php');
    }
?>
