<?php
	require 'SteamConfig.php';
		$url = file_get_contents("http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=".$steamauth['apikey']."&steamid=".$_SESSION['steamid']);
	$content = json_decode($url, true);
	$_SESSION['total_kills'] = $content['playerstats']['stats'][0]['value'];
	$_SESSION['total_deaths'] = $content['playerstats']['stats'][1]['value'];
	$_SESSION['total_hours'] = $content['playerstats']['stats'][2]['value'];
	$_SESSION['total_headshots'] = $content['playerstats']['stats'][25]['value'];
	$_SESSION['total_kills_ak'] = $content['playerstats']['stats'][20]['value'];
	$_SESSION['total_kills_awp'] = $content['playerstats']['stats'][19]['value'];
	$_SESSION['total_kills_m4a1'] = $content['playerstats']['stats'][171]['value'];


$csgostats['cs_total_kills'] = $_SESSION['total_kills'];
$csgostats['cs_total_deaths'] = $_SESSION['total_deaths'];
$csgostats['cs_total_hours'] = $_SESSION['total_hours'];
$csgostats['cs_total_headshots'] = $_SESSION['total_headshots'];
$csgostats['cs_total_kills_ak'] = $_SESSION['total_kills_ak'];
$csgostats['cs_total_kills_awp'] = $_SESSION['total_kills_awp'];
$csgostats['cs_total_kills_m4a1'] = $_SESSION['total_kills_m4a1'];

/*
total hs = 25

last match stt = 90~95
*/

?>
