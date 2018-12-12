<?php
include 'connect.php';
$cd=$_SESSION["cdusuario"];
$sql = "SELECT * FROM tb_perfillol WHERE id_usuario='$cd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $cd=$row["cd_perfillol"];
      $nick=$row["nick"];
      $objetivo=$row["objetivo"];
      $estado=$row["estado"];
      $camp1=$row["campeao1"];
      $camp2=$row["campeao2"];
      $camp3=$row["campeao3"];
      $camp4=$row["campeao4"];
      $camp5=$row["campeao5"];
      $elo=$row["elo"];
      $lane1=$row["id_lane1lol"];
      $lane2=$row["id_lane2lol"];
      $idusuario=$row["id_usuario"];
      $equipe=$row["id_equipelol"];
      $reputacao=$row["reputacao"];
      $level=$row["levellol"];
    }
} else {
    echo "0 resultados";
}
?>
