<?php
include_once "header.php";
include_once "databases.php";
echo "<div class=\"container\">";
$i = 0;
$articleList = getArticle(0, 12);
while ($article = mysqli_fetch_assoc($articleList)) {
    if ($i == 0) {
        $i = 3;
        #echo row closer here
        echo "<div class=\"row artikel\">";
    }
    echo "<div class=\"col-md\">\n";
    echo "<div>" . $article["name"] . "</div>";
    echo "<div class=\"articel-image-large\">\n";
    echo "<img src=\"" . $article["img"] . "\"/>" ;
    echo "<div>".$article["price"]."</div>";


    $i--;


}


?>
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
	</div>

</div>
</body>
</html>