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
    mysqli_stmt_prepare($stat, "SELECT 1 AS value FROM sessions WHERE idsession = ? LIMIT 1");
    mysqli_stmt_bind_param($stat,
        "s",
        $sessionid);
    mysqli_stmt_execute($stat);
    $res = mysqli_stmt_get_result($stat);
    if (mysqli_fetch_assoc($res)["value"] != 1) {
        $extime = 604800 + time();
        $stat2 = mysqli_stmt_init($con) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_prepare($stat2, "INSERT INTO sessions (idsession,expires) value (?,?)") or die(mysqli_error($con));
        mysqli_stmt_bind_param($stat2,
            "si",
            $sessionid,
            $extime) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_execute($stat2) or die(mysqli_error($con));

    } else {
        $extime = 604800 + time();
        $stat2 = mysqli_stmt_init($con) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_prepare($stat2, "UPDATE sessions SET expires = ? WHERE idsession = ?") or die(mysqli_error($con));
        mysqli_stmt_bind_param($stat2,
            "is",
            $extime, $sessionid) or die(mysqli_error($con)) or die(mysqli_error($con));
        mysqli_stmt_execute($stat2) or die(mysqli_error($con)) or die(mysqli_errno($con));

    }
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
    mysqli_stmt_prepare($stat, "SELECT * FROM article WHERE id >= ? AND id <= ?");
    mysqli_stmt_bind_param($stat,
        "ii",
        $low, $high) or die(mysqli_error($con));
    mysqli_stmt_execute($stat);
    $res = mysqli_stmt_get_result($stat);
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
    mysqli_stmt_bind_param($stat, "si", $sessionid, $artid);
    mysqli_stmt_execute($stat) or die(mysqli_error($con));
    //   echo "artikell nummer " . $artid . " sessions " . $sessionid;

}

function getChart()
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stat, "SELECT article.name , img,COUNT(article.id) AS number, article.price FROM chart JOIN article on(chart.idarticle=article.id)  WHERE chart.idsession = ? group by  article.id, article.name,article.img,article.price") or die(mysqli_error($con));
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "s", $sessionid);
    mysqli_stmt_execute($stat);
    return mysqli_stmt_get_result($stat);
}

function deleteSession()
{
    include "config.php";
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));//setze neuen leeren sessioin coockie
    echo "Session ist weg";
    if ($config["delete_on_user_request"]) {
        deleteSessionData();
    }

}

function deleteSessionData()
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "DELETE FROM sessions WHERE idsession = ?") or die(mysqli_error($con));
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "s", $sessionid);
    mysqli_stmt_execute($stat);
}

function isValidUser()
{
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "SELECT 1 FROM user u JOIN sessions s on u.id=s.user WHERE s.idsession = ?") or die(mysqli_error($con));
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "s", $sessionid);
    mysqli_stmt_execute($stat);
    $res = mysqli_stmt_get_result($stat);
    if (mysqli_fetch_assoc($res)[1] == 1) {
        return true;
    } else {
        return false;
    }
}

function login()
{

    include "config.php";

    if (array_key_exists("password", $_POST) && array_key_exists("user", $_POST)) {
        if (empty($_POST["password"]) || empty($_POST["user"])) {
            echo "Das required steht da nicht ohne Grund...";
            return;
        }
        $con = mysqli_connect(
            $config["db_host"],
            $config["db_user"],
            $config["db_pass"],
            $config["db_name"]);

        $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
        mysqli_stmt_prepare($stat, "SELECT u.password FROM user u WHERE u.name = ?") ;
        $sessionid = session_id();
        mysqli_stmt_bind_param($stat, "s", $_POST["user"]);
        mysqli_stmt_execute($stat);
        $res = mysqli_stmt_get_result($stat);
        $pass = mysqli_fetch_assoc($res)["password"];

        if (password_verify($_POST["password"], $pass)) {
            $stat2 = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stat2, "UPDATE sessions SET user = (SELECT id FROM user WHERE name = ? LIMIT 1) WHERE sessions.idsession = ?");//Da die Spalte "name" eigentlich unique ist ist limit in diesem zusammenhang redundat, sorgt aber dafür dass das mysql nach dem ersten fund aufhört. Ohne limit würde mysql alle datensätze duchgehen.
            mysqli_stmt_bind_param($stat2, "ss", $_POST["user"], $sessionid);
            mysqli_stmt_execute($stat2);
        }
    }

}

function logout(){
    include "config.php";


    $con = mysqli_connect(
        $config["db_host"],
        $config["db_user"],
        $config["db_pass"],
        $config["db_name"]);

    $stat = mysqli_stmt_init($con) or die(mysqli_error($con));
    mysqli_stmt_prepare($stat, "UPDATE sessions set sessions.user = NULL WHERE idsession = ?") or die(mysqli_error($con));
    $sessionid = session_id();
    mysqli_stmt_bind_param($stat, "s", $sessionid);
    mysqli_stmt_execute($stat);

}
?>