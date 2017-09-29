<?php
include_once "header.php";

if (isset($_POST["nummer"])) {
    addArticleToChart($_POST["nummer"]);
    echo "
<div class='confirmation'>
    <h4>Artikel wurde in den Warenkorb gelegt.</h4>
</div>
 ";
} else {
    echo "<div style='high:1em'> 
            <h4></h4>
            </div>";
}

echo "<div class='container-fluid'>";
echo "<div class='row '>";
$i = 3;
$articleList = getArticle(0, 99);
while ($article = mysqli_fetch_assoc($articleList)) {
    if ($article["img"] == "") {
        $article["img"] = "img/noimage.png";
    }
    if ($i == 0) {
        $i = 3;
        echo "</div>";
        echo "<div class='row justify-content-center '>";
    }
    if ($i == 3){
        $offset = "col-sm-offset-3";
    }
    echo "
    <a name='" . $article["id"] . "'>
    <div class='col-sm-2  artikel ". $offset ." '></a>\n
        <div class='desc'>
            <div>" . $article["name"] . "</div>
            <div class='articel-image-normal'>\n
                <img src='" . $article["img"] . "'/>
                <div>" . $article["price"] . "€</div>
            </div>
            <div>
                <form action='artikel.php#".$article["id"]."' method='POST'>
                    <input hidden value='" . $article["id"] . "' name='nummer'/>
                    <input type='submit' value='In den Warenkorb'/>
                </form>
            </div>
        </div>
    </div>";


    $i--;

$offset ="";
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
