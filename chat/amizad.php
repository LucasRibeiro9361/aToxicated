<div class="tituloamigos">
  <center> Lista de amigos</center>
</div>
<table width="100%;padding-left;">
<?php
$id = $_SESSION["cdusuario"];
$sql = "SELECT IF(id_usuario1=$id,id_usuario2,id_usuario1) AS usuario, Plol.nick as lol, Pcs.nick as cs, U.usuario as nome
FROM tb_amigos AS A
LEFT JOIN tb_usuario AS U
ON IF (id_usuario1=$id,id_usuario2,id_usuario1)=U.cd_usuario
LEFT JOIN tb_perfillol AS Plol
ON IF (id_usuario1=$id,id_usuario2,id_usuario1)=Plol.id_usuario
LEFT JOIN tb_perfilcs AS Pcs
ON IF (id_usuario1=$id,id_usuario2,id_usuario1)=Pcs.id_usuario
WHERE ((id_usuario1 = $id AND id_usuario2 <> $id) OR (id_usuario1 <> $id AND id_usuario2 = $id)) AND status=1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr class='trfirst'>";
              echo "<th>".$row['nome']."</th>";
              echo "<th>".$row['lol']."</th>";
              echo "<th><form method='POST' action=''><input type='hidden' value='".$row['usuario']."' name='cd1'><input class='butao butao1' type='submit' name='botao' value='conversar'></form></th></tr>";
            }
        } else {
            echo "Sem amigos";
        }
        if (isset($_POST['botao'])) {
          $amigo= $_POST['cd1'];
          $_SESSION['amigo'] = $amigo;
          ?>
          <script>
          window.location = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
          </script>
<?php }?>
</table>
