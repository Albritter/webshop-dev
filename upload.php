<?php
include "header.php";
//Folgender code ist von WC3School

$target_file = $_SERVER['DOCUMENT_ROOT'] . "img/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        return false;
    }
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    return false;
}
if ($_FILES["fileToUpload"]["size"] > getMaximumFileUploadSize()) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    return false;

}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    return false;

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    return false;

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Die Datei " . basename($_FILES["fileToUpload"]["name"]) . " wurde hochgeladen."; //Ausgabe übersetzt
        echo "<meta http-equiv='refresh' content='5; URL=admin.php'>"; //Zeile hinzugefügt
        return true;
    } else {
//        echo "Sorry, there was an error uploading your file 2.".$_FILES["fileToUpload"]["error"];
        return false;

    }
}

//Folegener Code ist von Stackoverflow von CarstenSchmitz
//https://stackoverflow.com/questions/13076480/php-get-actual-maximum-upload-size/22500394#22500394
//This function transforms the php.ini notation for numbers (like '2M') to an integer (2*1024*1024 in this case)
function convertPHPSizeToBytes($sSize)
{
    if (is_numeric($sSize)) {
        return $sSize;
    }
    $sSuffix = substr($sSize, -1);
    $iValue = substr($sSize, 0, -1);
    switch (strtoupper($sSuffix)) {
        case 'P':
            $iValue *= 1024;
        case 'T':
            $iValue *= 1024;
        case 'G':
            $iValue *= 1024;
        case 'M':
            $iValue *= 1024;
        case 'K':
            $iValue *= 1024;
            break;
    }
    return $iValue;
}

function getMaximumFileUploadSize()
{
    return min(convertPHPSizeToBytes(ini_get('post_max_size')), convertPHPSizeToBytes(ini_get('upload_max_filesize')));
}

?>

