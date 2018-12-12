<?php
include 'config.php';
session_destroy();
echo "<script language='javascript' type='text/javascript'>alert('Deslogado');window.location.href='login.php';</script>";
?>
