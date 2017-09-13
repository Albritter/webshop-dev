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
            "si",
            $sessionid,
            $extime) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_execute($stat2) or die(mysqli_error($con));

    } else {
        $extime = 604800 + time();
        $stat2 = mysqli_stmt_init($con) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_prepare($stat2, "UPDATE session SET expires = ? WHERE idsession = ?") or die(mysqli_error($con));
        mysqli_stmt_bind_param($stat2,
            "is",
            $extime, $sessionid) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_execute($stat2) or die(mysqli_error($con)) or die(mysqli_errno($con));

    }
    mysqli_close($con);
}   

function getArticle($low, $high)
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "SELECT * FROM article WHERE id >= ? AND id <= ?") or die(mysqli_error($con));
    mysqli_stmt_bind_param($stat,
        "ii",
        $low, $high) or die(mysqli_error($con));
    mysqli_stmt_execute($stat);
    $res = mysqli_stmt_get_result($stat);
    echo(mysqli_error($con));
    return $res;
}

function addArticleToChart($artid)
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "INSERT INTO chart (idsession,idarticle) VALUE (?,?)");
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "si", $sessionid, $artid) or die(mysqli_error($con));
    mysqli_stmt_execute($stat) or die(mysqli_error($con));
 //   echo "artikell nummer " . $artid . " session " . $sessionid;

}

function getChart()
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "SELECT article.name , img,COUNT(article.id) AS number, article.price FROM chart JOIN article on(chart.idarticle=article.id)  WHERE chart.idsession = ? group by article.id") or die(mysqli_error($con));
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "s", $sessionid);
    mysqli_stmt_execute($stat);
    return mysqli_stmt_get_result($stat);
}

function deleteSession(){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));//set new empty Session Cookie
    echo "Session ist weg";

}



?>