<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<link rel="stylesheet" href="styles.css"/>
<div class="container">
    <div class="row artikel">
        <div class="col-md">
            <div style="">Artikelname</div>
            <div>
                <img src="logo.png"/>
                <div>Preis€</div>
                <div>
                    <form action="artikel.php" method="get">
                        <input hidden value="nummer1" name="nummer"/>
                        <input type="submit" value="In den Warenkorb"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div style="">Artikelname</div>
            <div>
                <img src="logo.png"/>
                <div>Preis€</div>
                <div>
                    <form action="artikel.php" method="get">
                        <input hidden value="nummer2" name="nummer"/>
                        <input type="submit" value="In den Warenkorb"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div style="">Artikelname</div>
            <div>
                <img src="logo.png"/>
                <div>Preis€</div>
                <div>
                    <form action="artikel.php" method="get">
                        <input hidden value="nummer3" name="nummer"/>
                        <input type="submit" value="In den Warenkorb"/>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>