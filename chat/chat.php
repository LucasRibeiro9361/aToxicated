<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="../aToxicated/chat/chat.css"/>
</head>
      <?php
        include '../aToxicated/connect.php';
        if(isset($_SESSION['amigo'])){
          $amigo = $_SESSION['amigo'];
      $cd = $_SESSION['cdusuario'];
      $sql = "SELECT usuario FROM tb_usuario WHERE cd_usuario = $amigo";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $_SESSION['nickamigo'] = $row["usuario"];
          }
      } else {
          echo "nao pego o nick do cara q vc quer manda msg";
      }

      $sql = "SELECT cd_amigos FROM tb_amigos WHERE id_usuario1 = $cd AND id_usuario2 =$amigo OR id_usuario1 = $amigo AND id_usuario2 = $cd";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      		// output data of each row
      		while($row = $result->fetch_assoc()) {
      			$amizade = $row["cd_amigos"];
            $_SESSION['amizade'] = $amizade;
      		}
      } else {
      		echo "nao pego o nick do cara q vc quer manda msg";
      }
        ?>

      <div id="wrapper">
        <div id="menu">
            <p class="welcome"><b><?php echo $_SESSION['nickamigo']; ?></b></p>
            <p class="logout"><form method="post" action=""><input type="submit" name="botaoo" value="sair"></form></p>
            <div style="clear:both"></div>
        </div>
          <div id="chatbox">

      <?php
      if(isset($_POST['botaoo'])){
        $_SESSION['amigo'] = null;
      }
      $link = "../aToxicated/chat/log".$amizade.".html";
if(file_exists($link) && filesize($link) > 0){
    $handle = fopen($link, "r");
    $contents = fread($handle, filesize($link));
    fclose($handle);
    echo $contents;
}
?>
</div>
    <form name="message">
        <input name="usermsg" type="text" id="usermsg" size="63"/>
        <input name="submitmsg" type="submit" id="submitmsg" value="Enviar"/>
    </form>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js">
    </script>
    <script type="text/javascript">
    setInterval(loadLog, 2500);
    //Load the file containing the chat log
    function loadLog(){
      var link = '<?php echo $link; ?>'
      var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
      $.ajax({
        url: link,
        cache: false,
        success: function(html){
          $("#chatbox").html(html); //Insert chat log into the #chatbox div

          //Auto-scroll
          var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
          if(newscrollHeight > oldscrollHeight){
            $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
          }
          },
      });
    }
    //If user submits the form
    $("#submitmsg").click(function(){
      var clientmsg = $("#usermsg").val();
      $.post("../aToxicated/chat/post.php", {text: clientmsg});
      $("#usermsg").attr("value", "");
      return false;
    });
    </script>
</div>
</body>
</html>
<?php }else{ ?>
    <center>
    <table style="width:30%; background-color: #FFFFFF;">
      <tr>
        <th>Nome</th>
        <th>Nick CS</th>
        <th>Nick LOL</th>
        <th></th>
      </tr>
    </center>
    <?php
    include 'connect.php';
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
                  echo "<th>".$row['nome']."</th>";
                  echo "<th>".$row['cs']."</th>";
                  echo "<th>".$row['lol']."</th>";
                  echo "<th><form method='POST'><input type='hidden' value='".$row['usuario']."' name='cd1'><input type='submit' name='botao' value='abrir conversa'></form></th></tr>";
                }
            } else {
                echo "Sem amigos";
            }
            if (isset($_POST['botao'])) {
              $amigo= $_POST['cd1'];
              $_SESSION['amigo'] = $amigo;
            }
    ?>
</table>
<?php } ?>
