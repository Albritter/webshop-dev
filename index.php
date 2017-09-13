<?php

include_once "config.php";
include_once "databases.php";
include_once "header.php";

if(isset($_GET["session"])){
    deleteSession();
}
?>
    <div>
        <h3>Hallo, Suchen Sie etwas bestimtes?</h3>
    </div>
    <div class="reset">
        <form action="index.php" method="GET">
            <?php
            $sessionid = session_id();
            echo '<input hidden type="text" name="session" value="'. $sessionid . '"/>';
            ?><input type="submit" value="Jetzt löschen"/ >
            <h5>Hier können Sie Ihre Daten löschen</h5>

        </form>

    </div>
<?php include_once "footer.php"; ?>