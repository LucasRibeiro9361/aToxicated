<?php
include 'config.php';
include 'menulogado.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pagina inicial</title>

    <!-- Linkagem -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="paginainicial.css">
		<link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
  </head>

  <body>

<div class="containerjogos">
  <div class="titutojogos">SELETOR DE JOGOS</div>
  <div class="csgoimage">
      <div class="containerbutton">
        <button class="botao botao1">Player</button>
        <a href="times.php"<button class="botao botao1">Times</button></a>
      </div>
  </div>
  <div class="lolimage">
    <div class="containerbutton">
      <a href="filtrodejogadoreslol.php"><button class="botao botao1">Player</button></a>
      <a href="times.php"<button class="botao botao1">Times</button></a>
    </div>
  </div>
</div>



  </body>

</html>
