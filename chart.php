<?php
include_once "header.php";
include "databases.php";
$res = getChart();
echo '<div class=" chart-container">';
while ($art = mysqli_fetch_assoc($res)) {
    if (!isset($art["img"])) {
        $art["img"] = "noimage.png";
    }
    echo "
<div class=' chart-row'>
    <div class='chart-col'>
        <div>
            <div class='chart-desc-l'>
                <div class='chart-title'>
                    " . $art["name"] . "
                </div>
                <div class='chart-image'>
                    <img src='" . $art["img"] . "'>
                </div>
            </div>
            <div calls='chart-desc-r'>
                <div>
                " . $art["number"] . "
                </div>
                <div>
                " . $art["price"] . "&euro;
                </div>
                <div>
                " . $art["number"] * $art["price"] . "&euro;
                </div>
            </div>
        </div>
    </div>
</div>";


}
echo "</div>";
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
<div class=\"chart-entry\">
    <div class=\"description\">
        <div>
            Artikelname
        </div>
        <div>
            <img src=\"logo.png\"/>
        </div>
    </div>
    <div class=\"pricing\" style=\"float: right    \">
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
<div class=\"chart-entry\">
    <div class=\"description\">
        <div>
            Artikelname
        </div>
        <div>
            <img src=\"logo.png\"/>
        </div>
    </div>
    <div class=\"pricing\" style=\"float: right    \">
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
