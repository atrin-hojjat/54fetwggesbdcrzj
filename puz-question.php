<?php
// you can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$namelive = $_POST['firstlastname'];
$questionlive = $_POST['question'];
date_default_timezone_set('Asia/Tehran');
$timelive = date( 'Y-m-d H:i:s');
function GetRealIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}
$iplive = GetRealIp();

$servername = "localhost";
$username = "puzzleed_livefa1";
$password = "w1-K8ir0Q$@Y";
$dbname = "puzzleed_liveshows";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

// Change character set to utf8
mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO `live13980303` (`name`, `time`, `question`, `ipaddress`)
VALUES ('$namelive', ' $timelive', '$questionlive', '$iplive')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($con);