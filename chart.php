<?php
include_once "header.php";
$res = getChart();
echo '<div class=" chart-container">';
while ($art = mysqli_fetch_assoc($res)) {
    if (!isset($art["img"])) {
        $art["img"] = "noimage.png";
    }
    echo "
<div class='row  justify-content-center'>
    <div class='col-md-4'>
        <div class='chart-entry'>
            <div class='chart-desc-l'>
                <div class='chart-title'>
                    " . $art["name"] . "
                </div>
                <div class='chart-image'>
                    <img src='" . $art["img"] . "'/>
                </div>
            </div>
            <div class='chart-desc-r'>
                <table>
                    <tr>       
                        <td>Anzahl: </td>
                        <td>" . $art["number"] . "</td>
                    </tr>
                    <tr>
                        <td>Preis: </td>
                        <td>" . $art["price"] . "</td>
                    </tr>
                    <tr>
                        <td>Gesamt: </td>
                        <td>" . $art["number"] * $art["price"] . "</td>
                    </tr>
                </table>
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
