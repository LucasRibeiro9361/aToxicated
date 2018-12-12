<?php
include 'api1/steamauth/steamauth.php';

if(isset($_SESSION["cdusuario"])){
	include 'menulogado.php';
}
else{
	header('Location: login.php');
}

if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Faça login com a steam<br>";
    loginbutton();
  echo "</div>";
  }  else {
include 'api1/steamauth/userInfo.php';
include 'api1/steamauth/userInfo2.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      Voce procura parceiros para:
      <select name="objetivo">
        <option value="lazer">Lazer</option>
        <option value="ranqueada">Partidas Competitivas</option>
        <option value="campeonato">Campeonato</option>
      </select><br>
      De que estado voce é:
      <select name="estado">
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
      Selecione suas melhores funções dentro de jogo:<br>
      <select name="camp1">
        <option value="Entry Fragger">Entry Fragger</option>
        <option value="Awper">Awper</option>
        <option value="Suporte">Suporte</option>
        <option value="Lurcker">Lurcker</option>
        <option value="Capitão/IGL">Capitão/IGL</option>
        <option value="Trader">Trader</option>
      </select>
      <select name="camp2">
        <option value="Entry Fragger">Entry Fragger</option>
        <option value="Awper">Awper</option>
        <option value="Suporte">Suporte</option>
        <option value="Lurcker">Lurcker</option>
        <option value="Capitão/IGL">Capitão/IGL</option>
        <option value="Trader">Trader</option>
      </select>
      Seu Skill Level da gamersclub
      <select name="lvlgc">
        <option value="0">Não possuo level</option>
        <option value="1">level 1</option>
        <option value="2">level 2</option>
        <option value="3">level 3</option>
        <option value="4">level 4</option>
        <option value="5">level 5</option>
        <option value="6">level 6</option>
        <option value="7">level 7</option>
        <option value="8">level 8</option>
        <option value="9">level 9</option>
        <option value="10">level 10</option>
        <option value="11">level 11</option>
        <option value="12">level 12</option>
        <option value="13">level 13</option>
        <option value="14">level 14</option>
        <option value="15">level 15</option>
        <option value="16">level 16</option>
        <option value="17">level 17</option>
        <option value="18">level 18</option>
        <option value="19">level 19</option>
        <option value="20">level 20</option>
      </select><br>
      Patente de partidas competitivas (matchmaking)
      <select name="patente">
      <option value="Prata 1">Prata 1</option>
      <option value="Prata 2">Prata 2</option>
      <option value="Prata 3">Prata 3</option>
      <option value="Prata 4">Prata 4</option>
      <option value="Prata 5">Prata 5</option>
      <option value="Prata Elite Mestre">Prata Elite Mestre</option>
      <option value="Ouro 1">Ouro 1</option>
      <option value="Ouro 2">Ouro 2</option>
      <option value="Ouro 3">Ouro 3</option>
      <option value="Ouro Mestre">Ouro Mestre</option>
      <option value="Guardião Mestre 1">Guardião Mestre 1</option>
      <option value="Guardião Mestre 2">Guardião Mestre 2</option>
      <option value="Guardião Mestre Elite">Guardião Mestre Elite</option>
      <option value="Águia Lendária">Águia Lendária</option>
      <option value="Águia Lendária Mestre">Águia Lendária Mestre</option>
      <option value="Supremo Mestre de Primeira Classe">Supremo Mestre de Primeira Classe</option>
      <option value="A Elite Global">A Elite Global</option>

    </select><br>
    <input type="submit" name="ENVIAR">
    <?php
$id = $_SESSION["cdusuario"];
include 'connect.php';
if(isset($_POST['objetivo'])){
    $objetivo=      $_POST['objetivo'];
    $estado=        $_POST['estado'];
    $funcao1=       $_POST['camp1'];
    $funcao2=       $_POST['camp2'];
    $lvlgc=         $_POST['lvlgc'];
    $patente=       $_POST['patente'];
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


    $sql = "INSERT INTO tb_perfilcs values ('$nick','$objetivo',$lvlgc,'',$id,1,$equipecs,1,1,'$time','$perfilurl','$estado','$avatar','$totalkills',
     '$totaldeaths','$marlene','$timeplayed','$hs','$totalkillsak','$totalkillsawp','$totalkillsm4','$realname','$patente','$funcao1','$funcao2','$steamid')";
    if ($conn->query($sql) === TRUE) {
      echo "<button type='button'><a href=profilecsgo.php>Cadastro realizado com sucesso! Visite seu perfil</a></button>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }}
  }

    ?>
    </form>
  </body>
	<br><footer>
		<?php include 'footer.php';?>
	</footer>
</html>
