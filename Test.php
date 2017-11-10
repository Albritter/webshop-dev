<?php
include 'header.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class='row  justify-content-center'>
    <div class='col-md-4 col-md-offset-4'>
        <div class='chart-entry'>
            <div class='chart-desc-l'>
                <div class='chart-title'>
                    Artikel Name
                </div>
                <div class='chart-image'>
                    <img src="img/1499026770050.png" alt=""/>
                </div>
            </div>
            <div class='chart-desc-r'>
                <table>
                    <tr>       
                        <td>Anzahl: </td>
                        <td>
                            <form action="chart.php" method="POST">
                                <input type="text" name="anzahl" size="5">
                                <input type="submit">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Preis: </td>
                        <td>5&euro;</td>
                    </tr>
                    <tr>
                        <td>Gesamt: </td>
                        <td>5&euro;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>