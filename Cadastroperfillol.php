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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="js/jquery.min.js">
    <link rel="stylesheet" href="js/popper.min.js">
    	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>
    body{background-image: url(img/bg-masthead.jpg);}
    </style>
    <center>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6" id="containerlogin1">
    <form method="post">
      <br>
      <div class="form-group">
      <input type="text" name="nick" id="camp1" placeholder="Coloque seu nome de perfil no lol"><br>
      Voce procura parceiros para:
    </div>
    <div class="form-group">
      <select class="form-control" name="objetivo" id="camp">
        <option value="lazer">Lazer</option>
        <option value="ranqueada">Ranqueada</option>
        <option value="campeonato">Campeonato</option>
      </select></div><br>
      De que estado voce é:
      <div class="form-group">
      <select class="form-control" name="estado" id="camp">
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
      </select></div><br>
      Selecione seus melhores campeões:<br>
      <div class="form-group">
      <select class="form-control" name="camp1" id="camp">
        <option value="142">nenhum</option>
        <option value="1">Aatrox</option>
        <option value="2">Ahri</option>
        <option value="3">Akali</option>
        <option value="4">Alistar</option>
        <option value="5">Amumu</option>
        <option value="6">Anivia</option>
        <option value="7">Annie</option>
        <option value="8">Ashe</option>
        <option value="9">Aurelion</option>
        <option value="10">Azir</option>
        <option value="11">Bardo</option>
        <option value="12">Blitzcrank</option>
        <option value="13">Brand</option>
        <option value="14">Braum</option>
        <option value="15">Caitlyn</option>
        <option value="16">Camille</option>
        <option value="17">Cassiopeia</option>
        <option value="18">Cho'Gath</option>
        <option value="19">Corki</option>
        <option value="20">Darius</option>
        <option value="21">Diana</option>
        <option value="22">Dr. Mundo</option>
        <option value="23">Draven</option>
        <option value="24">Ekko</option>
        <option value="25">Elise</option>
        <option value="26">Evelynn</option>
        <option value="27">Ezreal</option>
        <option value="28">Fiddlesticks</option>
        <option value="29">Fiora</option>
        <option value="30">Fizz</option>
        <option value="31">Galio</option>
        <option value="32">Gangplank</option>
        <option value="33">Garen</option>
        <option value="34">Gnar</option>
        <option value="35">Gragas</option>
        <option value="36">Graves</option>
        <option value="37">Hecarim</option>
        <option value="38">Heimerdinger</option>
        <option value="39">Illaoi</option>
        <option value="40">Irelia</option>
        <option value="41">Ivern</option>
        <option value="42">Janna</option>
        <option value="43">Jarvan IV</option>
        <option value="44">Jax</option>
        <option value="45">Jayce</option>
        <option value="46">Jhin</option>
        <option value="47">Jinx</option>
        <option value="48">Kai'Sa</option>
        <option value="49">Kalista</option>
        <option value="50">Karma</option>
        <option value="51">Karthus</option>
        <option value="52">Kassadin</option>
        <option value="53">Katarina</option>
        <option value="54">Kayle</option>
        <option value="55">Kayn</option>
        <option value="56">Kennen</option>
        <option value="57">Kha'Zix</option>
        <option value="58">Kindred</option>
        <option value="59">Kled</option>
        <option value="60">Kog'Maw</option>
        <option value="61">LeBlanc</option>
        <option value="62">Lee Sin</option>
        <option value="63">Leona</option>
        <option value="64">Lissandra</option>
        <option value="65">Lucian</option>
        <option value="66">Lulu</option>
        <option value="67">Lux</option>
        <option value="68">Malphite</option>
        <option value="69">Malzahar</option>
        <option value="70">Maokai</option>
        <option value="71">Master Yi</option>
        <option value="72">Miss Fortune</option>
        <option value="73">Mordekaiser</option>
        <option value="74">Morgana</option>
        <option value="75">Nami</option>
        <option value="76">Nasus</option>
        <option value="77">Nautilus</option>
        <option value="78">Nidalee</option>
        <option value="79">Nocturne</option>
        <option value="80">Nunu e Willump</option>
        <option value="81">Olaf</option>
        <option value="82">Orianna</option>
        <option value="83">Ornn</option>
        <option value="84">Pantheon</option>
        <option value="85">Poppy</option>
        <option value="86">Pyke</option>
        <option value="87">Quinn</option>
        <option value="88">Rakan</option>
        <option value="89">Rammus</option>
        <option value="90">Rek'sai</option>
        <option value="91">Renekton</option>
        <option value="92">Rengar</option>
        <option value="93">Riven</option>
        <option value="94">Rumble</option>
        <option value="95">Ryze</option>
        <option value="96">Sejuani</option>
        <option value="97">Shaco</option>
        <option value="98">Shen</option>
        <option value="99">Shyvana</option>
        <option value="100">Singed</option>
        <option value="101">Sion</option>
        <option value="102">Sivir</option>
        <option value="103">Skarner</option>
        <option value="104">Sona</option>
        <option value="105">Soraka</option>
        <option value="106">Swain</option>
        <option value="107">Syndra</option>
        <option value="108">Tahm Kench</option>
        <option value="109">Taliyah</option>
        <option value="110">Talon</option>
        <option value="111">Taric</option>
        <option value="112">Teemo</option>
        <option value="113">Thresh</option>
        <option value="114">Tristana</option>
        <option value="115">Trundle</option>
        <option value="116">Tryndamere</option>
        <option value="117">Twisted Fate</option>
        <option value="118">Twitch</option>
        <option value="119">Udyr</option>
        <option value="120">Urgot</option>
        <option value="121">Varus</option>
        <option value="122">Vayne</option>
        <option value="123">Veigar</option>
        <option value="124">Vel'Koz</option>
        <option value="125">Vi</option>
        <option value="126">Viktor</option>
        <option value="127">Vladimir</option>
        <option value="128">Volibear</option>
        <option value="129">Warwick</option>
        <option value="130">Wukong</option>
        <option value="131">Xayah</option>
        <option value="132">Xerath</option>
        <option value="133">Xin Zhao</option>
        <option value="134">Yasuo</option>
        <option value="135">Yorick</option>
        <option value="136">Zac</option>
        <option value="137">Zed</option>
        <option value="138">Ziggs</option>
        <option value="139">Zilean</option>
        <option value="140">Zoe</option>
        <option value="141">Zyra</option>
      </select></div>
      <div class="form-group">
      <select class="form-control "name="camp2" id="camp">
        <option value="142">nenhum</option>
        <option value="1">Aatrox</option>
        <option value="2">Ahri</option>
        <option value="3">Akali</option>
        <option value="4">Alistar</option>
        <option value="5">Amumu</option>
        <option value="6">Anivia</option>
        <option value="7">Annie</option>
        <option value="8">Ashe</option>
        <option value="9">Aurelion</option>
        <option value="10">Azir</option>
        <option value="11">Bardo</option>
        <option value="12">Blitzcrank</option>
        <option value="13">Brand</option>
        <option value="14">Braum</option>
        <option value="15">Caitlyn</option>
        <option value="16">Camille</option>
        <option value="17">Cassiopeia</option>
        <option value="18">Cho'Gath</option>
        <option value="19">Corki</option>
        <option value="20">Darius</option>
        <option value="21">Diana</option>
        <option value="22">Dr. Mundo</option>
        <option value="23">Draven</option>
        <option value="24">Ekko</option>
        <option value="25">Elise</option>
        <option value="26">Evelynn</option>
        <option value="27">Ezreal</option>
        <option value="28">Fiddlesticks</option>
        <option value="29">Fiora</option>
        <option value="30">Fizz</option>
        <option value="31">Galio</option>
        <option value="32">Gangplank</option>
        <option value="33">Garen</option>
        <option value="34">Gnar</option>
        <option value="35">Gragas</option>
        <option value="36">Graves</option>
        <option value="37">Hecarim</option>
        <option value="38">Heimerdinger</option>
        <option value="39">Illaoi</option>
        <option value="40">Irelia</option>
        <option value="41">Ivern</option>
        <option value="42">Janna</option>
        <option value="43">Jarvan IV</option>
        <option value="44">Jax</option>
        <option value="45">Jayce</option>
        <option value="46">Jhin</option>
        <option value="47">Jinx</option>
        <option value="48">Kai'Sa</option>
        <option value="49">Kalista</option>
        <option value="50">Karma</option>
        <option value="51">Karthus</option>
        <option value="52">Kassadin</option>
        <option value="53">Katarina</option>
        <option value="54">Kayle</option>
        <option value="55">Kayn</option>
        <option value="56">Kennen</option>
        <option value="57">Kha'Zix</option>
        <option value="58">Kindred</option>
        <option value="59">Kled</option>
        <option value="60">Kog'Maw</option>
        <option value="61">LeBlanc</option>
        <option value="62">Lee Sin</option>
        <option value="63">Leona</option>
        <option value="64">Lissandra</option>
        <option value="65">Lucian</option>
        <option value="66">Lulu</option>
        <option value="67">Lux</option>
        <option value="68">Malphite</option>
        <option value="69">Malzahar</option>
        <option value="70">Maokai</option>
        <option value="71">Master Yi</option>
        <option value="72">Miss Fortune</option>
        <option value="73">Mordekaiser</option>
        <option value="74">Morgana</option>
        <option value="75">Nami</option>
        <option value="76">Nasus</option>
        <option value="77">Nautilus</option>
        <option value="78">Nidalee</option>
        <option value="79">Nocturne</option>
        <option value="80">Nunu e Willump</option>
        <option value="81">Olaf</option>
        <option value="82">Orianna</option>
        <option value="83">Ornn</option>
        <option value="84">Pantheon</option>
        <option value="85">Poppy</option>
        <option value="86">Pyke</option>
        <option value="87">Quinn</option>
        <option value="88">Rakan</option>
        <option value="89">Rammus</option>
        <option value="90">Rek'sai</option>
        <option value="91">Renekton</option>
        <option value="92">Rengar</option>
        <option value="93">Riven</option>
        <option value="94">Rumble</option>
        <option value="95">Ryze</option>
        <option value="96">Sejuani</option>
        <option value="97">Shaco</option>
        <option value="98">Shen</option>
        <option value="99">Shyvana</option>
        <option value="100">Singed</option>
        <option value="101">Sion</option>
        <option value="102">Sivir</option>
        <option value="103">Skarner</option>
        <option value="104">Sona</option>
        <option value="105">Soraka</option>
        <option value="106">Swain</option>
        <option value="107">Syndra</option>
        <option value="108">Tahm Kench</option>
        <option value="109">Taliyah</option>
        <option value="110">Talon</option>
        <option value="111">Taric</option>
        <option value="112">Teemo</option>
        <option value="113">Thresh</option>
        <option value="114">Tristana</option>
        <option value="115">Trundle</option>
        <option value="116">Tryndamere</option>
        <option value="117">Twisted Fate</option>
        <option value="118">Twitch</option>
        <option value="119">Udyr</option>
        <option value="120">Urgot</option>
        <option value="121">Varus</option>
        <option value="122">Vayne</option>
        <option value="123">Veigar</option>
        <option value="124">Vel'Koz</option>
        <option value="125">Vi</option>
        <option value="126">Viktor</option>
        <option value="127">Vladimir</option>
        <option value="128">Volibear</option>
        <option value="129">Warwick</option>
        <option value="130">Wukong</option>
        <option value="131">Xayah</option>
        <option value="132">Xerath</option>
        <option value="133">Xin Zhao</option>
        <option value="134">Yasuo</option>
        <option value="135">Yorick</option>
        <option value="136">Zac</option>
        <option value="137">Zed</option>
        <option value="138">Ziggs</option>
        <option value="139">Zilean</option>
        <option value="140">Zoe</option>
        <option value="141">Zyra</option>
      </select></div>
      <div class="form-group">
      <select class="form-control" name="camp3" id="camp">
        <option value="142">nenhum</option>
        <option value="1">Aatrox</option>
        <option value="2">Ahri</option>
        <option value="3">Akali</option>
        <option value="4">Alistar</option>
        <option value="5">Amumu</option>
        <option value="6">Anivia</option>
        <option value="7">Annie</option>
        <option value="8">Ashe</option>
        <option value="9">Aurelion</option>
        <option value="10">Azir</option>
        <option value="11">Bardo</option>
        <option value="12">Blitzcrank</option>
        <option value="13">Brand</option>
        <option value="14">Braum</option>
        <option value="15">Caitlyn</option>
        <option value="16">Camille</option>
        <option value="17">Cassiopeia</option>
        <option value="18">Cho'Gath</option>
        <option value="19">Corki</option>
        <option value="20">Darius</option>
        <option value="21">Diana</option>
        <option value="22">Dr. Mundo</option>
        <option value="23">Draven</option>
        <option value="24">Ekko</option>
        <option value="25">Elise</option>
        <option value="26">Evelynn</option>
        <option value="27">Ezreal</option>
        <option value="28">Fiddlesticks</option>
        <option value="29">Fiora</option>
        <option value="30">Fizz</option>
        <option value="31">Galio</option>
        <option value="32">Gangplank</option>
        <option value="33">Garen</option>
        <option value="34">Gnar</option>
        <option value="35">Gragas</option>
        <option value="36">Graves</option>
        <option value="37">Hecarim</option>
        <option value="38">Heimerdinger</option>
        <option value="39">Illaoi</option>
        <option value="40">Irelia</option>
        <option value="41">Ivern</option>
        <option value="42">Janna</option>
        <option value="43">Jarvan IV</option>
        <option value="44">Jax</option>
        <option value="45">Jayce</option>
        <option value="46">Jhin</option>
        <option value="47">Jinx</option>
        <option value="48">Kai'Sa</option>
        <option value="49">Kalista</option>
        <option value="50">Karma</option>
        <option value="51">Karthus</option>
        <option value="52">Kassadin</option>
        <option value="53">Katarina</option>
        <option value="54">Kayle</option>
        <option value="55">Kayn</option>
        <option value="56">Kennen</option>
        <option value="57">Kha'Zix</option>
        <option value="58">Kindred</option>
        <option value="59">Kled</option>
        <option value="60">Kog'Maw</option>
        <option value="61">LeBlanc</option>
        <option value="62">Lee Sin</option>
        <option value="63">Leona</option>
        <option value="64">Lissandra</option>
        <option value="65">Lucian</option>
        <option value="66">Lulu</option>
        <option value="67">Lux</option>
        <option value="68">Malphite</option>
        <option value="69">Malzahar</option>
        <option value="70">Maokai</option>
        <option value="71">Master Yi</option>
        <option value="72">Miss Fortune</option>
        <option value="73">Mordekaiser</option>
        <option value="74">Morgana</option>
        <option value="75">Nami</option>
        <option value="76">Nasus</option>
        <option value="77">Nautilus</option>
        <option value="78">Nidalee</option>
        <option value="79">Nocturne</option>
        <option value="80">Nunu e Willump</option>
        <option value="81">Olaf</option>
        <option value="82">Orianna</option>
        <option value="83">Ornn</option>
        <option value="84">Pantheon</option>
        <option value="85">Poppy</option>
        <option value="86">Pyke</option>
        <option value="87">Quinn</option>
        <option value="88">Rakan</option>
        <option value="89">Rammus</option>
        <option value="90">Rek'sai</option>
        <option value="91">Renekton</option>
        <option value="92">Rengar</option>
        <option value="93">Riven</option>
        <option value="94">Rumble</option>
        <option value="95">Ryze</option>
        <option value="96">Sejuani</option>
        <option value="97">Shaco</option>
        <option value="98">Shen</option>
        <option value="99">Shyvana</option>
        <option value="100">Singed</option>
        <option value="101">Sion</option>
        <option value="102">Sivir</option>
        <option value="103">Skarner</option>
        <option value="104">Sona</option>
        <option value="105">Soraka</option>
        <option value="106">Swain</option>
        <option value="107">Syndra</option>
        <option value="108">Tahm Kench</option>
        <option value="109">Taliyah</option>
        <option value="110">Talon</option>
        <option value="111">Taric</option>
        <option value="112">Teemo</option>
        <option value="113">Thresh</option>
        <option value="114">Tristana</option>
        <option value="115">Trundle</option>
        <option value="116">Tryndamere</option>
        <option value="117">Twisted Fate</option>
        <option value="118">Twitch</option>
        <option value="119">Udyr</option>
        <option value="120">Urgot</option>
        <option value="121">Varus</option>
        <option value="122">Vayne</option>
        <option value="123">Veigar</option>
        <option value="124">Vel'Koz</option>
        <option value="125">Vi</option>
        <option value="126">Viktor</option>
        <option value="127">Vladimir</option>
        <option value="128">Volibear</option>
        <option value="129">Warwick</option>
        <option value="130">Wukong</option>
        <option value="131">Xayah</option>
        <option value="132">Xerath</option>
        <option value="133">Xin Zhao</option>
        <option value="134">Yasuo</option>
        <option value="135">Yorick</option>
        <option value="136">Zac</option>
        <option value="137">Zed</option>
        <option value="138">Ziggs</option>
        <option value="139">Zilean</option>
        <option value="140">Zoe</option>
        <option value="141">Zyra</option>
      </select></div>
      <div class="form-group">
      <select class="form-control" name="camp4" id="camp">
        <option value="142">nenhum</option>
        <option value="1">Aatrox</option>
        <option value="2">Ahri</option>
        <option value="3">Akali</option>
        <option value="4">Alistar</option>
        <option value="5">Amumu</option>
        <option value="6">Anivia</option>
        <option value="7">Annie</option>
        <option value="8">Ashe</option>
        <option value="9">Aurelion</option>
        <option value="10">Azir</option>
        <option value="11">Bardo</option>
        <option value="12">Blitzcrank</option>
        <option value="13">Brand</option>
        <option value="14">Braum</option>
        <option value="15">Caitlyn</option>
        <option value="16">Camille</option>
        <option value="17">Cassiopeia</option>
        <option value="18">Cho'Gath</option>
        <option value="19">Corki</option>
        <option value="20">Darius</option>
        <option value="21">Diana</option>
        <option value="22">Dr. Mundo</option>
        <option value="23">Draven</option>
        <option value="24">Ekko</option>
        <option value="25">Elise</option>
        <option value="26">Evelynn</option>
        <option value="27">Ezreal</option>
        <option value="28">Fiddlesticks</option>
        <option value="29">Fiora</option>
        <option value="30">Fizz</option>
        <option value="31">Galio</option>
        <option value="32">Gangplank</option>
        <option value="33">Garen</option>
        <option value="34">Gnar</option>
        <option value="35">Gragas</option>
        <option value="36">Graves</option>
        <option value="37">Hecarim</option>
        <option value="38">Heimerdinger</option>
        <option value="39">Illaoi</option>
        <option value="40">Irelia</option>
        <option value="41">Ivern</option>
        <option value="42">Janna</option>
        <option value="43">Jarvan IV</option>
        <option value="44">Jax</option>
        <option value="45">Jayce</option>
        <option value="46">Jhin</option>
        <option value="47">Jinx</option>
        <option value="48">Kai'Sa</option>
        <option value="49">Kalista</option>
        <option value="50">Karma</option>
        <option value="51">Karthus</option>
        <option value="52">Kassadin</option>
        <option value="53">Katarina</option>
        <option value="54">Kayle</option>
        <option value="55">Kayn</option>
        <option value="56">Kennen</option>
        <option value="57">Kha'Zix</option>
        <option value="58">Kindred</option>
        <option value="59">Kled</option>
        <option value="60">Kog'Maw</option>
        <option value="61">LeBlanc</option>
        <option value="62">Lee Sin</option>
        <option value="63">Leona</option>
        <option value="64">Lissandra</option>
        <option value="65">Lucian</option>
        <option value="66">Lulu</option>
        <option value="67">Lux</option>
        <option value="68">Malphite</option>
        <option value="69">Malzahar</option>
        <option value="70">Maokai</option>
        <option value="71">Master Yi</option>
        <option value="72">Miss Fortune</option>
        <option value="73">Mordekaiser</option>
        <option value="74">Morgana</option>
        <option value="75">Nami</option>
        <option value="76">Nasus</option>
        <option value="77">Nautilus</option>
        <option value="78">Nidalee</option>
        <option value="79">Nocturne</option>
        <option value="80">Nunu e Willump</option>
        <option value="81">Olaf</option>
        <option value="82">Orianna</option>
        <option value="83">Ornn</option>
        <option value="84">Pantheon</option>
        <option value="85">Poppy</option>
        <option value="86">Pyke</option>
        <option value="87">Quinn</option>
        <option value="88">Rakan</option>
        <option value="89">Rammus</option>
        <option value="90">Rek'sai</option>
        <option value="91">Renekton</option>
        <option value="92">Rengar</option>
        <option value="93">Riven</option>
        <option value="94">Rumble</option>
        <option value="95">Ryze</option>
        <option value="96">Sejuani</option>
        <option value="97">Shaco</option>
        <option value="98">Shen</option>
        <option value="99">Shyvana</option>
        <option value="100">Singed</option>
        <option value="101">Sion</option>
        <option value="102">Sivir</option>
        <option value="103">Skarner</option>
        <option value="104">Sona</option>
        <option value="105">Soraka</option>
        <option value="106">Swain</option>
        <option value="107">Syndra</option>
        <option value="108">Tahm Kench</option>
        <option value="109">Taliyah</option>
        <option value="110">Talon</option>
        <option value="111">Taric</option>
        <option value="112">Teemo</option>
        <option value="113">Thresh</option>
        <option value="114">Tristana</option>
        <option value="115">Trundle</option>
        <option value="116">Tryndamere</option>
        <option value="117">Twisted Fate</option>
        <option value="118">Twitch</option>
        <option value="119">Udyr</option>
        <option value="120">Urgot</option>
        <option value="121">Varus</option>
        <option value="122">Vayne</option>
        <option value="123">Veigar</option>
        <option value="124">Vel'Koz</option>
        <option value="125">Vi</option>
        <option value="126">Viktor</option>
        <option value="127">Vladimir</option>
        <option value="128">Volibear</option>
        <option value="129">Warwick</option>
        <option value="130">Wukong</option>
        <option value="131">Xayah</option>
        <option value="132">Xerath</option>
        <option value="133">Xin Zhao</option>
        <option value="134">Yasuo</option>
        <option value="135">Yorick</option>
        <option value="136">Zac</option>
        <option value="137">Zed</option>
        <option value="138">Ziggs</option>
        <option value="139">Zilean</option>
        <option value="140">Zoe</option>
        <option value="141">Zyra</option>
      </select>
    </div>
    <div class="form-group">
      <select class="form-control" name="camp5" id="camp">
        <option value="142">nenhum</option>
        <option value="1">Aatrox</option>
        <option value="2">Ahri</option>
        <option value="3">Akali</option>
        <option value="4">Alistar</option>
        <option value="5">Amumu</option>
        <option value="6">Anivia</option>
        <option value="7">Annie</option>
        <option value="8">Ashe</option>
        <option value="9">Aurelion</option>
        <option value="10">Azir</option>
        <option value="11">Bardo</option>
        <option value="12">Blitzcrank</option>
        <option value="13">Brand</option>
        <option value="14">Braum</option>
        <option value="15">Caitlyn</option>
        <option value="16">Camille</option>
        <option value="17">Cassiopeia</option>
        <option value="18">Cho'Gath</option>
        <option value="19">Corki</option>
        <option value="20">Darius</option>
        <option value="21">Diana</option>
        <option value="22">Dr. Mundo</option>
        <option value="23">Draven</option>
        <option value="24">Ekko</option>
        <option value="25">Elise</option>
        <option value="26">Evelynn</option>
        <option value="27">Ezreal</option>
        <option value="28">Fiddlesticks</option>
        <option value="29">Fiora</option>
        <option value="30">Fizz</option>
        <option value="31">Galio</option>
        <option value="32">Gangplank</option>
        <option value="33">Garen</option>
        <option value="34">Gnar</option>
        <option value="35">Gragas</option>
        <option value="36">Graves</option>
        <option value="37">Hecarim</option>
        <option value="38">Heimerdinger</option>
        <option value="39">Illaoi</option>
        <option value="40">Irelia</option>
        <option value="41">Ivern</option>
        <option value="42">Janna</option>
        <option value="43">Jarvan IV</option>
        <option value="44">Jax</option>
        <option value="45">Jayce</option>
        <option value="46">Jhin</option>
        <option value="47">Jinx</option>
        <option value="48">Kai'Sa</option>
        <option value="49">Kalista</option>
        <option value="50">Karma</option>
        <option value="51">Karthus</option>
        <option value="52">Kassadin</option>
        <option value="53">Katarina</option>
        <option value="54">Kayle</option>
        <option value="55">Kayn</option>
        <option value="56">Kennen</option>
        <option value="57">Kha'Zix</option>
        <option value="58">Kindred</option>
        <option value="59">Kled</option>
        <option value="60">Kog'Maw</option>
        <option value="61">LeBlanc</option>
        <option value="62">Lee Sin</option>
        <option value="63">Leona</option>
        <option value="64">Lissandra</option>
        <option value="65">Lucian</option>
        <option value="66">Lulu</option>
        <option value="67">Lux</option>
        <option value="68">Malphite</option>
        <option value="69">Malzahar</option>
        <option value="70">Maokai</option>
        <option value="71">Master Yi</option>
        <option value="72">Miss Fortune</option>
        <option value="73">Mordekaiser</option>
        <option value="74">Morgana</option>
        <option value="75">Nami</option>
        <option value="76">Nasus</option>
        <option value="77">Nautilus</option>
        <option value="78">Nidalee</option>
        <option value="79">Nocturne</option>
        <option value="80">Nunu e Willump</option>
        <option value="81">Olaf</option>
        <option value="82">Orianna</option>
        <option value="83">Ornn</option>
        <option value="84">Pantheon</option>
        <option value="85">Poppy</option>
        <option value="86">Pyke</option>
        <option value="87">Quinn</option>
        <option value="88">Rakan</option>
        <option value="89">Rammus</option>
        <option value="90">Rek'sai</option>
        <option value="91">Renekton</option>
        <option value="92">Rengar</option>
        <option value="93">Riven</option>
        <option value="94">Rumble</option>
        <option value="95">Ryze</option>
        <option value="96">Sejuani</option>
        <option value="97">Shaco</option>
        <option value="98">Shen</option>
        <option value="99">Shyvana</option>
        <option value="100">Singed</option>
        <option value="101">Sion</option>
        <option value="102">Sivir</option>
        <option value="103">Skarner</option>
        <option value="104">Sona</option>
        <option value="105">Soraka</option>
        <option value="106">Swain</option>
        <option value="107">Syndra</option>
        <option value="108">Tahm Kench</option>
        <option value="109">Taliyah</option>
        <option value="110">Talon</option>
        <option value="111">Taric</option>
        <option value="112">Teemo</option>
        <option value="113">Thresh</option>
        <option value="114">Tristana</option>
        <option value="115">Trundle</option>
        <option value="116">Tryndamere</option>
        <option value="117">Twisted Fate</option>
        <option value="118">Twitch</option>
        <option value="119">Udyr</option>
        <option value="120">Urgot</option>
        <option value="121">Varus</option>
        <option value="122">Vayne</option>
        <option value="123">Veigar</option>
        <option value="124">Vel'Koz</option>
        <option value="125">Vi</option>
        <option value="126">Viktor</option>
        <option value="127">Vladimir</option>
        <option value="128">Volibear</option>
        <option value="129">Warwick</option>
        <option value="130">Wukong</option>
        <option value="131">Xayah</option>
        <option value="132">Xerath</option>
        <option value="133">Xin Zhao</option>
        <option value="134">Yasuo</option>
        <option value="135">Yorick</option>
        <option value="136">Zac</option>
        <option value="137">Zed</option>
        <option value="138">Ziggs</option>
        <option value="139">Zilean</option>
        <option value="140">Zoe</option>
        <option value="141">Zyra</option>
      </select></div><br>
      Rota onde você mais costuma jogar:
      <div class="form-group">
      <select class="form-control" name="lane1" id="camp">
        <option value="1">topo</option>
        <option value="2">Selva</option>
        <option value="3">Meio</option>
        <option value="4">Atirador</option>
        <option value="5">Suporte</option>
      </select></div><br>
      Segunda rota onde você mais costuma jogar:
      <div class="form-group">
      <select class="form-control" name="lane2" id="camp">
      <option value="1">topo</option>
      <option value="2">Selva</option>
      <option value="3">Meio</option>
      <option value="4">Atirador</option>
      <option value="5">Suporte</option>
    </select></div><br>
    <input type="submit" name="ENVIAR">
  </div>
    <?php
    $id = $_SESSION["cdusuario"];
//dados do formulario
  if(isset($_POST['nick'])){
    $nick=$_POST['nick'];
    $objetivo=$_POST['objetivo'];
    $estado=$_POST['estado'];
    $camp1=$_POST['camp1'];
    $camp2=$_POST['camp2'];
    $camp3=$_POST['camp3'];
    $camp4=$_POST['camp4'];
    $camp5=$_POST['camp5'];
    $elobanco =1;
    $lane1=$_POST['lane1'];
    $lane2=$_POST['lane2'];
    $usuario=$_SESSION["cdusuario"];
    $_SESSION['lolname'] = $nick;

// dados da api
    $imglol = "https://avatar.leagueoflegends.com/br/".$_SESSION['lolname'].".png";
    $url = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/".$_SESSION['lolname'].$_SESSION['apikeylol']);
    $content = json_decode($url, true);
  	$_SESSION['profilelol_id'] = $content['id'];
    $_SESSION['profilelol_level'] = $content['summonerLevel'];

    $lolprofilelevel = $_SESSION['profilelol_level'];
    $idlol = $_SESSION['profilelol_id'];
    // cadastra os dados na tabela tb_perfillol
        $sql = "INSERT INTO tb_perfillol values ('','$nick','$objetivo','$estado','$camp1','$camp2','$camp3','$camp4','$camp5','$elobanco','$lane1','$lane2','$usuario',null,'$idlol','0','$lolprofilelevel','$imglol',1)";
        if ($conn->query($sql) === TRUE) {
          echo "<button type='button'><a href=perfillolparticular.php>Cadastro realizado com sucesso! Visite seu perfil</a></button>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


//rank da api (+dados)
    $url2 = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/".$idlol.$_SESSION['apikeylol']);
    $content2 = json_decode($url2, true);
    //verifica se o usuario ja tem elo
    if($content2 = "[]"){
    $elo = "Sem Elo";
	}else{

    $_SESSION['profilelol_queueType'] = $content2[0]['queueType'];

    $lolprofile['lol_queueType'] = $_SESSION['profilelol_queueType'];

        if($lolprofile['lol_queueType'] == "RANKED_FLEX_SR"){
              $_SESSION['profilelol_rank'] = $content2[1]['tier'];
              $_SESSION['profilelol_rank1'] = $content2[1]['rank'];
          }else{
            $_SESSION['profilelol_rank'] = $content2[0]['tier'];
            $_SESSION['profilelol_rank1'] = $content2[0]['rank'];
          }

      $lolprofile['lol_rank'] = $_SESSION['profilelol_rank'];
      $lolprofile['lol_rank1'] = $_SESSION['profilelol_rank1'];

      $elo = $lolprofile['lol_rank']." ".$lolprofile['lol_rank1'];

			//relaciona o elo que vem da api com o numero de elo do banco pq o danilo tem problema kk
          $sql = "SELECT `cd_elolol` FROM `tb_elolol` WHERE `apielo` = '$elo'";
          $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
       $elo2 = $row['cd_elolol'];
       echo $elo;
         }
      } else {
         echo "0 results";
      }
      //coloca o id pego anteriormente na tabela do perfil
      $sql = "UPDATE `tb_perfillol` SET `id_elolol`=$elo2 WHERE 'id_usuario' = $id";
      if ($conn->query($sql) === TRUE) {
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }}
}

    ?>
    </form>
  </center>
  </body>
</html>
