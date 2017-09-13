<?php
error_reporting(-1);
ini_set('display_errors', 'On');
#phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Webshop</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">WebSiteName</a>
		</div>
		<ul class="nav navbar-nav">
            <?php
            switch (basename($_SERVER['SCRIPT_FILENAME'])) {
                case "index.php":
                    echo '<li class = "active" ><a href = "index.php" > Home</a ></li >';
                    echo '<li ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li ><a href = "chart.php" > Warenkorb</a ></li >';
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;
                case "artikel.php":
                    echo '<li ><a href = "index.php" > Home</a ></li >';
                    echo '<li class = "active" ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li ><a href = "chart.php" > Warenkorb</a ></li >';
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;
                case "chart.php":
                    echo '<li ><a href = "index.php" > Home</a ></li >';
                    echo '<li ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li class = "active" ><a href = "chart.php" > Warenkorb</a ></li >';
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;

            } ?></ul>
	</div>
</nav>