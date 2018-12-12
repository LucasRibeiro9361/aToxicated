<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="paginainicial.css">
		<link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <form method='POST'>
          Objetivo<select name="objetivo">
            <option value="0">Todos</option>
            <option value="lazer">Lazer</option>
            <option value="ranqueada">Ranqueada</option>
            <option value="campeonato">Campeonato</option>
          </select><br>
          Estado<select name="estado">
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
          Lane Desocupada
          <select name="lane1">
            <option value="0">Todos</option>
            <option value="1">Topo</option>
            <option value="2">Selva</option>
            <option value="3">Meio</option>
            <option value="4">Atirador</option>
            <option value="5">Suporte</option>
          </select><br>
          <input type="submit" value="ENVIAR">
        </form>
    		<table style="width:100%">
    			<tr>
    				<th>Nome</th>
    				<th>Objetivo</th>
    				<th>Estado</th>
    				<th>Elo minimo</th>
    				<th>Elo maximo</th>
    			</tr>
          <?php
          if (isset($_POST['objetivo'])) {
          $objetivo=$_POST['objetivo'];
          $estado=$_POST['estado'];
          $lane1=$_POST['lane1'];
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
          if ($lane1 == '0') {
            $sqllane1 = "";
          }
          elseif ($lane1 == '1') {
            $sqlane1 = " and id_topo is null ";
          }
          elseif ($lane1 == '2') {
            $sqllane1 = " and id_selva is null ".$elo1;
          }
          elseif ($lane1 == '3') {
            $sqllane1 = " and id_meio is null ".$elo1;
          }
          elseif ($lane1 == '4') {
            $sqllane1 = " and id_atirador is null ".$elo1;
          }
          elseif ($lane1 == '5') {
            $sqllane1 = " and id_suporte is null ".$elo1;
          }
          ?>

    			<?php
          include "connect.php";
          $sql = "SELECT P.nome, P.objetivo, P.estado, La.elo AS elo1, Lb.elo AS elo2
          FROM tb_equipelol AS P
          INNER JOIN tb_elolol AS La
          ON P.id_elominimo = La.cd_elolol
          INNER JOIN tb_elolol AS Lb
          ON P.id_elomaximo = Lb.cd_elolol
    			WHERE
    			cd_equipelol>0 $sqllane1 $sqlestado $sqlobjetivo";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    					echo "<form method='POST' action='codigo.php'>
    	        <tr>
    	          <th>".$row['nome']."</th>
    	          <th>".$row['objetivo']."</th>
    	          <th>".$row['estado']."</th>
    	          <th>".$row['elo1']."</th>
    	          <th>".$row['elo2']."</th>";
    	        echo "<th><input type='hidden' value='".$row['nome']."' name='nome'><input type='submit' name='botao' value='ir para perfil'></form></th></tr>";
    				}
    				} else {
              echo "0 results";
            }
    			}
          ?>
    	    </form>
    			</table>
    			<p>
    				<h1>Pesquisar pelo Nick</h1>
    			<form method="post" action="perfilequipelolpublica.php">
    				nome da equipe<input type="text" name="nome" placeholder="nickname">
    				<input type="submit" value="submit">
      </body>
    </html>

  </body>
  <br><footer>
  	<?php include 'footer.php';?>
  </footer>
</html>
