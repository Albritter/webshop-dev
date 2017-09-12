<?php
include_once "config.php";
include_once "header.php";
include_once "databases.php";
$res = getArticle(0, 9);
while ($row = mysqli_fetch_assoc($res)) {
    echo "<div>" . $row["name"] . "</div >";
}
include_once "footer.php";
?>