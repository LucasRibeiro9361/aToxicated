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
    <meta charset="utf-8">
    <title>Equipes</title>
  </head>
  <body>
    <?php

    $sql = "SELECT * FROM tb_equipelol";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $cdequipe = $row['cd_equipelol'];
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $objetivo = $row['objetivo'];
            $estado = $row['estado'];
            $elominimo = $row['elominimo'];
            $elomaximo = $row['elomaximo'];
            $id_reserva1 = $row['id_reserva1'];
            $id_reserva2 = $row['id_reserva2'];
            $topo = $row['id_Topo'];
            $selva = $row['id_Selva'];
            $meio = $row['id_Meio'];
            $atirador = $row['id_Atirador'];
            $suporte = $row['id_Suporte'];
        }
    }
    echo $cdequipe."<br>".
$nome."<br>".
$descricao."<br>".
$objetivo."<br>".
$estado."<br>".
$elominimo."<br>".
$elomaximo."<br>".
$id_reserva1."<br>".
$id_reserva2."<br>".
$topo."<br>".
$selva."<br>".
$meio."<br>".
$atirador."<br>".
$suporte;
	     ?>
			</table>
			<p>
				<center>
		    <form method="post">
		    <table class='table table-striped' ID="alter" style="width:70%; height:100%;">
		    <tr>
		      <td><b>Informações</b></td>
		      <td><b>Valor</b></td>
		    </tr>
		    <tr class="dif">
		      <td><b>nome</b></td>
		      <td><b><input type="text" required="" name="usuario" value="<?php echo $nome;?>"></b></td>
		    </tr>
		    <tr>
		      <td><b>descricao</b></td>
		      <td><b><input type="text" required="" name="descricao" value="<?php echo $descricao;?>"></b></td>
		    </tr>
		    <tr class="dif">
		      <td><b>objetivo</b></td>
		      <td><b><input type="text" required="" name="objetivo" value="<?php echo $objetivo;?>"></b></td>
		    </tr>
		    <tr>
		      <td><b>reputação</b></td>
		      <td><b><input type="text" required="" name="estado" value="<?php echo $estado;?>"></b></td>
		    </tr>
				<tr class="dif">
		      <td><b>reputação</b></td>
		      <td><b><?php echo $elominimo;?></b></td>
		    </tr>
				<tr>
		      <td><b>reputação</b></td>
		      <td><b><?php echo $elomaximo;?></b></td>
		    </tr>
		    <tr class="dif">
		      <td><b>stats</b></td>
		      <td><b><?php echo $id_reserva1;?></b></td>
		    </tr>
				<tr>
		      <td><b>stats</b></td>
		      <td><b><?php echo $id_reserva2;?></b></td>
		    </tr>
				<tr class="dif">
		      <td><b>stats</b></td>
		      <td><b><?php echo $topo;?></b></td>
		    </tr>
				<tr>
		      <td><b>stats</b></td>
		      <td><b><?php echo $selva;?></b></td>
		    </tr>
				<tr class="dif">
		      <td><b>stats</b></td>
		      <td><b><?php echo $atirador;?></b></td>
		    </tr>
				<tr>
		      <td><b>stats</b></td>
		      <td><b><?php echo $suporte;?></b></td>
		    </tr>
				<tr class="dif">
		      <td><b>stats</b></td>
		      <td><b><?php echo $meio;?></b></td>
		    </tr>
		</div>
		</div>
		</form>
		</center>
  </body>
	<br><footer>
		<?php include 'footer.php';?>
	</footer>
</html>
