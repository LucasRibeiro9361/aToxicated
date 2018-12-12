<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if(isset($_SESSION["nick"])){
    $text = $_POST['text'];
    $amizade = $_SESSION['amizade'];
    $fp = fopen("log".$amizade.".html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("G:i").") <b>".$_SESSION['nick']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>
