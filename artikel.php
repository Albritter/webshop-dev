<?php
include_once "header.php";

if (isset($_POST["nummer"])) {
    addArticleToChart($_POST["nummer"]);
    echo "<div class='confirmation'>";
    echo "	<h4>Artikel wurde in den Warenkorb gelegt.</h4>";
    echo "</div>";
} else {
    echo "<div style='high:1em'> 
            <h4></h4>
            </div>";
}

echo "<div class='container'>";
echo "<div class='row  justify-content-center'>";
$i = 3;
$articleList = getArticle(0, 99);
while ($article = mysqli_fetch_assoc($articleList)) {
    if ($article["img"] == "") {
        $article["img"] = "noimage.png";
    }
    if ($i == 0) {
        $i = 3;
        echo "</div>";
        echo "<div class='row justify-content-center '>";
    }
    echo "<A NAME='" . $article["id"] . "'><div class='col-sm-3  artikel '></a>\n";
    echo "<div class='desc'>";
    echo "<div>" . $article["name"] . "</div>";
    echo "<div class='articel-image-normal'>\n";
    echo "<img src='" . $article["img"] . "'/>";
    echo "<div>" . $article["price"] . "€</div>";
    echo "</div><div>";
    echo "<form action='artikel.php#".$article["id"]."' method='POST'>";
    echo "<input hidden value='" . $article["id"] . "' name='nummer'/>";
    echo "<input type='submit' value='In den Warenkorb'/>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    $i--;


}
if ($i < 3) {
    echo "</div>";
}
echo "</div>";

include "footer.php";
?>
<!--
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
!-->
