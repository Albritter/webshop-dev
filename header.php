<?php
error_reporting(-1);
ini_set('display_errors', 'On');
?>
<html>
<head>
	<title>Webshop</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<header class="header">
	<h1>Webshop</h1>
</header>
<div class="menu">
	<form method="get" action="search.php">
		<ul>

			<li><a href="index.php">Home</a></li>
			<li><a href="artikelliste.php">Alle Artikel</a></li>
			<li><a href="chart.php">Warenkorb</a></li>
		</ul>
		<div>
			<input type="search" name="query">
			<input type="submit" value="Suche">
		</div>
	</form>
</div>
