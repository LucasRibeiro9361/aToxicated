<?php
include 'config.php';
if(isset($_SESSION["cdusuario"])){
header('Location: playerhome.php');
}

?>
<!doctype html>
<html>
<title>Login</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type"text/css" href="login.css">
    <link rel="stylesheet" type"text/css" href="css/bootstrap/bootstrap-grid.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<meta charset="utf-8">
<style>
body{background-image: url(images/bg1.jpg);}
</style>
</head>
<body>
	<form action="loginok.php" method="post">
        <img style="margin-top:45%;;" id="logologinpage" src="images/logowhite.png">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-md-4 offset-md-8 containerlogin">
                <div class="row">
                    <div class="col-md-10 containerlogin2">
                        <div class="row">
                            <div class="col-md-10 titulocontainer" >
                            LOGIN
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <i class="fas fa-user loginform"></i>
                                <input type="text" name="login" placeholder="Digite seu login" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <i class="fas fa-lock loginform"></i>
                                <input type="password" name="senha" placeholder="Digite sua senha" required>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <button class="botao botao1">Login</button>  <a href="cadastroplayer.php"><button onclick="location.href='cadastroplayer.php';" class="botao botao1">Cadastro</button></a>
                            </div>


                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
</form>


</body>
<footer>
</footer>
</html>
