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
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="filtrodejogadoreslol.css">
		<link rel="stylesheet" href="css/bootstrap/bootstrap-grid.min.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
		body{
		background-image:url(images/bg3.jpg);
		background-repeat: no-repeat;
		background-size:cover !important;}
		</style>
    <title>Filtro de jogadores</title>
  </head>
  <body>
    <form method='POST' name="oi">
			<div class ="container-fluid">
				<div class="row">
					<div class=" col-xl-2 containerfiltro">
						<div class="row">
							<div class="col-xl-12 titulo">
						</div>
					</div>
					<center>
						<div class="row">
							<div class="col-xl-12 rowfiltro">
      					Objetivo<br>
									<div class="div-select">
								<select name="objetivo">
        				<option value="0">Todos</option>
				        <option value="lazer">Lazer</option>
        				<option value="ranqueada">Ranqueada</option>
        				<option value="campeonato">Campeonato</option>
      					</select>
							</div>
						  </div>
					 </div>
					 <div class="row">
 						<div class="col-xl-12 rowfiltro">
      Estado<br>
				<div class="div-select">
			<select name="estado">
        <option value="0">Todos</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select><br>
		</div>
		</div>
 </div>
 <div class="row">
	<div class="col-xl-12 rowfiltro">
      Elo Minimo<br>
				<div class="div-select">
			<select name="elo1">
  			<option value="0">Todos</option>
  			<option value="2">Bronze V</option>
  			<option value="3">Bronze IV</option>
  			<option value="4">Bronze III</option>
  			<option value="5">Bronze II</option>
  			<option value="6">Bronze I</option>
  			<option value="7">Prata V</option>
  			<option value="8">Prata IV</option>
  			<option value="9">Prata III</option>
  			<option value="10">Prata II</option>
  			<option value="11">Prata I</option>
  			<option value="12">Ouro V</option>
  			<option value="13">Ouro IV</option>
  			<option value="14">Ouro III</option>
  			<option value="15">Ouro II</option>
  			<option value="16">Ouro I</option>
  			<option value="17">Platina V</option>
  			<option value="18">Platina IV</option>
  			<option value="19">Platina III</option>
  			<option value="20">Platina II</option>
  			<option value="21">Platina I</option>
  			<option value="22">Diamante V</option>
  			<option value="23">Diamante IV</option>
  			<option value="24">Diamante III</option>
  			<option value="25">Diamante II</option>
  			<option value="26">Diamante I</option>
  			<option value="27">Mestre</option>
  			<option value="28">Desafiante</option>
  		</select><br>
		</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
  		Elo Maximo<br>
				<div class="div-select">
			<select name="elo2">
  			<option value="0">Todos</option>
  			<option value="2">Bronze V</option>
  			<option value="3">Bronze IV</option>
  			<option value="4">Bronze III</option>
  			<option value="5">Bronze II</option>
  			<option value="6">Bronze I</option>
  			<option value="7">Prata V</option>
  			<option value="8">Prata IV</option>
  			<option value="9">Prata III</option>
  			<option value="10">Prata II</option>
  			<option value="11">Prata I</option>
  			<option value="12">Ouro V</option>
  			<option value="13">Ouro IV</option>
  			<option value="14">Ouro III</option>
  			<option value="15">Ouro II</option>
  			<option value="16">Ouro I</option>
  			<option value="17">Platina V</option>
  			<option value="18">Platina IV</option>
  			<option value="19">Platina III</option>
  			<option value="20">Platina II</option>
  			<option value="21">Platina I</option>
  			<option value="22">Diamante V</option>
  			<option value="23">Diamante IV</option>
  			<option value="24">Diamante III</option>
  			<option value="25">Diamante II</option>
  			<option value="26">Diamante I</option>
  			<option value="27">Mestre</option>
  			<option value="28">Desafiante</option>
  		</select><br>
			</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
      Lane 1<br>
			<div class="div-select">
      <select name="lane1">
        <option value="0">Todos</option>
        <option value="1">Topo</option>
        <option value="2">Selva</option>
        <option value="3">Meio</option>
        <option value="4">Atirador</option>
        <option value="5">Suporte</option>
      </select><br>
		</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
      Lane 2<br>
			<div class="div-select">
      <select name="lane2">
        <option value="0">Todos</option>
        <option value="1">Topo</option>
        <option value="2">Selva</option>
        <option value="3">Meio</option>
        <option value="4">Atirador</option>
        <option value="5">Suporte</option>
      </select><br>
		</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
      Level Minimo<br>
			<div class="div-select">
      <select name="level1">
        <option value="0">Todos</option>
        <?php
        for($i =1; $i < 500; $i++){
        echo "<option value='".$i."'>".$i."</option>";
        }
        ?>
      </select><br>
		</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
				 <div class="div-select">
      Level Maximo<br>
      <select name="level2">
        <option value="0">Todos</option>
        <?php
        for($i =1; $i < 500; $i++){
        echo "<option value='".$i."'>".$i."</option>";
        }
        ?>
      </select><br>
		</div>
		</div>
 </div>
			<div class="row">
			 <div class="col-xl-12 rowfiltro">
			Reputacao<br>
			<div class="div-select">
      <select name="reputacao">
        <option value="0">Todos</option>
        <option value="1">Positiva</option>
      </select><br>
		</div>
		</div>
 </div>
</center>
    <center>  <input class="botao botao1" type="submit" value="ENVIAR"></center>
    </form>
			</div>


	<div class=" col-xl-8 conteudofiltro">
		<table style="width:100%;margin-top:10px;">
			<tr class="trfirst">
				<th>Nick</th>
				<th>Objetivo</th>
				<th>Estado</th>
				<th>Elo</th>
				<th>Lane 1</th>
				<th>Lane 2</th>
				<th>Level</th>
				<th>Perfil</th>
			</tr>
      <?php
$objetivo= '0';
$estado='0';
$elo1='0';
$elo2='0';
$lane1='0';
$lane2='0';
$level1='0';
$level2='0';
$reputacao='0';
if(isset($_POST['objetivo'])){
      $objetivo=$_POST['objetivo'];
      $estado=$_POST['estado'];
      $elo1=$_POST['elo1'];
      $elo2=$_POST['elo2'];
      $lane1=$_POST['lane1'];
      $lane2=$_POST['lane2'];
      $level1=$_POST['level1'];
      $level2=$_POST['level2'];
      $reputacao=$_POST['reputacao'];}
      if ($objetivo !== '0') {
        $sqlobjetivo = " and objetivo= '".$objetivo."'";
      }
      else {
        $sqlobjetivo="";
      }
      if ($estado !== '0') {
        $sqlestado = " and estado= '".$estado."'";
      }
      else {
        $sqlestado="";
      }
      if ($elo1 !== '0') {
        $sqlelo1 = " and id_elolol> ".$elo1;
      }
      else {
        $sqlelo1="";
      }
      if ($elo2 !== '0') {
        $sqlelo2 = " and id_elolol< ".$elo2;
      }
      else {
        $sqlelo2="";
      }
      if ($lane1 !== '0' && $lane2 !== '0') {
        $sqllane = " and id_lane1lol= ".$lane1." or id_lane2lol= ".$lane1." or id_lane1lol= ".$lane2." or id_lane2lol= ".$lane2;
      }
      else if ($lane1 !== '0' && $lane2 == '0') {
        $sqllane = " and id_lane1lol= ".$lane1." or id_lane2lol= ".$lane1;
      }
      else if ($lane1 == '0' && $lane2 !== '0') {
        $sqllane = " and id_lane1lol= ".$lane2." or id_lane2lol= ".$lane2;
      }
      else {
        $sqllane="";
      }
      if ($level1 !== '0') {
        $sqllevel1 = " and levellol> ".$level1;
      }
      else {
        $sqllevel1="";
      }
      if ($level2 !== '0') {
        $sqllevel2 = " and levellol< ".$level2;
      }
      else {
        $sqllevel2="";
      }
      if ($reputacao !== '0') {
        $sqlreputacao = " and reputacao > -1";
      }
      else {
        $sqlreputacao="";
      }
      ?>

			<?php
      include "connect.php";
      $sql = "SELECT P.nick, P.objetivo, P.estado, E.elo, La.lane AS lane1, Lb.lane AS lane2, P.levellol
			FROM tb_perfillol AS P
			INNER JOIN tb_elolol AS E
			ON P.id_elolol = E.cd_elolol
			INNER JOIN tb_lanelol AS La
			ON P.id_lane1lol = La.cd_lanelol
			INNER JOIN tb_lanelol AS Lb
			ON P.id_lane2lol = Lb.cd_lanelol
			WHERE
			cd_perfillol>0 $sqlreputacao $sqlelo1 $sqlelo2 $sqllane $sqlestado $sqllevel1 $sqllevel2 $sqlobjetivo";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
					echo "<form method='POST' action='codigo2.php'>
	        <tr class='trsecond'>
	          <th>".$row['nick']."</th>
	          <th>".$row['objetivo']."</th>
	          <th>".$row['estado']."</th>
	          <th>".$row['elo']."</th>
	          <th><img src='".$row['lane1']."'></th>
	          <th><img src='".$row['lane2']."'></th>
	          <th>".$row['levellol']."</th>";
	        echo "<th><input type='hidden' value='".$row['nick']."' name='nick'><input class='botao2 botao' type='submit' name='botao' value='Ir para perfil'></form></th></tr>";
					}
				} else {
          echo "0 results";
        }

      ?>
	    </form>
			</table>
				</div>
			</div>
		</div>
			<p>

  </body>
	<br><footer>
		<?php include 'footer.php';?>
	</footer>
</html>
