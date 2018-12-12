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
      if(isset($_POST['botaoo'])){$_SESSION['amigo'] = null;?>
        <script>
        window.location = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
        </script>
        <?php
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
    <form name="message" action="">
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
<?php } ?>
