<?php
include_once "header.php";
if(isset($_POST['anzahl'])){
    setAmount();
}
$res = getChart();
include_once "header.php";
echo '<div class=" chart-container">';
while ($art = mysqli_fetch_assoc($res)) {
    if (!isset($art["img"])) {
        $art["img"] = "img/noimage.png";
    }
    echo "
<div>
    <div>
        <div>
            <div>
                <div>
                    " . $art["name"] . "
                </div>
                <div>
                    <img src='" . $art["img"] . "'/>
                </div>
            </div>
            <div>
                <form action='chart.php' method='POST'> 
                    <table>
                        <tr>       
                            <td>Anzahl: </td>
                            <td>
                                <input name='anzahl' type='text' size='2' maxlength='3' value='" . $art["number"] . "'>
                                    <input type='submit' value='Speichern'>
                                <input name='artikelnummer' type='number' value ='" . $art["id"] . "' requierd hidden>
                            </td>
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
                </form>
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
