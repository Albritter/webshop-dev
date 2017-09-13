<?php
include_once "header.php";
include "databases.php";
$res = getChart();
while ($art = mysqli_fetch_assoc($res)) {
    if (!isset($art["img"])) {
        $art["img"] = "noimage.png";
    }
    echo "<div class=\"chart-entry\">    <div class=\"description\">        <div>";
    echo $art["name"] . " </div> <div class='articel-image-large'>";
    echo "<img src=\"" . $art["img"] . "\"/></div></div>";
    echo "<div class=\"pricing\"> <div>";
    echo "Anzahl: ".$art["number"] . "</div><div>".$art["price"]."€</div><div>".$art["price"]*$art["number"]."€</div></div></div></div></div>";
}

?>

<!--
anzahl
</>
<div>
    preis einzeld
</div>
<div>
    preis gesamt
</div>
</div>
</div>
<div class="chart-entry">
    <div class="description">
        <div>
            Artikelname
        </div>
        <div>
            <img src="logo.png"/>
        </div>
    </div>
    <div class="pricing" style="float: right    ">
        <div>
            anzahl
        </div>
        <div>
            preis einzeld
        </div>
        <div>
            preis gesamt
        </div>
    </div>
</div>
<div class="chart-entry">
    <div class="description">
        <div>
            Artikelname
        </div>
        <div>
            <img src="logo.png"/>
        </div>
    </div>
    <div class="pricing" style="float: right    ">
        <div>
            anzahl
        </div>
        <div>
            preis einzeld
        </div>
        <div>
            preis gesamt
        </div>
    </div>
</div>!--->
<?php
include_once "footer.php";
?>
