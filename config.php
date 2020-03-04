<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "puzzleed_mat98";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_set_charset($conn, "utf8");

function convertPersianToEnglish($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $output= str_replace($persian, $english, $string);
    return $output;
}

function cleanuserinput($dirty){
    if (get_magic_quotes_gpc()) {
        $clean = mysql_real_escape_string(stripslashes($dirty));
    }else{
        $clean = mysql_real_escape_string($dirty);
    }
    return $clean;
}

session_start();
?>