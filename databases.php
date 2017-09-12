<?php


session_start();
loadSession();
function loadSession()
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);
    $sessionid = session_id();
    $stat = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stat, "SELECT 1 AS value FROM session WHERE idsession = ? LIMIT 1");
    mysqli_stmt_bind_param($stat,
        "s",
        $sessionid);
    mysqli_stmt_execute($stat);
    $res = mysqli_stmt_get_result($stat);
    if (mysqli_fetch_assoc($res)["value"] != 1) {
        $extime = 604800 + time();
        $stat2 = mysqli_stmt_init($con) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_prepare($stat2, "INSERT INTO session (idsession,expires) value (?,?)") or die(mysqli_error($con));
        mysqli_stmt_bind_param($stat2,
            "ss",
            $sessionid,
            $extime) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_execute($stat2) or die(mysqli_error($con));

    }
    mysqli_close($con);
}
function getArticle( $low,  $high){
    include "config.php";

    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con)or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "SELECT * FROM article WHERE id >= ? AND id <= ?")or die(mysqli_error($con));
    mysqli_stmt_bind_param($stat,
        "ii",
        $low,$high)or die(mysqli_error($con));
    mysqli_stmt_execute($stat);
    $res =mysqli_stmt_get_result($stat);
    echo(mysqli_error($con));
    return $res;
}

?>