<?php
error_reporting(-1);
ini_set('display_errors', 'On');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Webshop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

</head>
<body>

<nav>
    <div>
        <div>
            <a href="index.php">Webshop-dev</a>
        </div>
        <ul>
            <?php
            include "databases.php";
            switch (basename($_SERVER['SCRIPT_FILENAME'])) {
                case "index.php":
                    echo '<li class = "active" ><a href = "index.php" > Home</a ></li >';
                    echo '<li ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li ><a href = "chart.php" > Warenkorb</a ></li >';
                    if (isValidUser()) {
                        echo '<li ><a href = "admin.php" >Admin</a></li >';
                    }
                    echo '<li ><a href = "https://github.com/halbritter/webshop-dev" > SourceCode</a ></li >';


                    break;
                case "artikel.php":
                    echo '<li ><a href = "index.php" > Home</a ></li >';
                    echo '<li class = "active" ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li ><a href = "chart.php" > Warenkorb</a ></li >';
                    if (isValidUser()) {
                        echo '<li ><a href = "admin.php" >Admin</a></li >';
                    }
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;
                case "chart.php":
                    echo '<li ><a href = "index.php" > Home</a ></li >';
                    echo '<li ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li class = "active" ><a href = "chart.php" > Warenkorb</a ></li >';
                    if (isValidUser()) {
                        echo '<li ><a href = "admin.php" >Admin</a></li >';
                    }
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;
                case "admin.php":
                    echo '<li ><a href = "index.php" > Home</a ></li >';
                    echo '<li ><a href = "artikel.php" > Alle Artikel </a ></li >';
                    echo '<li ><a href = "chart.php" > Warenkorb</a ></li >';
                    if (isValidUser()) {
                        echo '<li class = "active"><a href = "admin.php" >Admin</a></li >';
                    }
                    echo '<li ><a href = "https://github.com/albritter/webshop-dev" > SourceCode</a ></li >';
                    break;

            } ?></ul>
    </div>
</nav>