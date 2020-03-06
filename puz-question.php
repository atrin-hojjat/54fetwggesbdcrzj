<?php include("config.php");

$QuestionName = $_POST['QuestionName'];
$QuestionSchool = $_POST['QuestionSchool'];
$QuestionText = $_POST['QuestionText'];
$timelive = date('Y-m-d H:i:s');
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


$sql = "";

$prep_2 = $conn->prepare("INSERT INTO `puz_questions` (`idcode`, `time`, `question`, `ipaddress`, `name`, `school`, `livegroup`)
VALUES (?, ?, ?, ?, ?, ?, ?)");
$prep_2->bind_param("sssssss", $_SESSION['idcode'], $timelive, $QuestionText, $iplive, $_SESSION['name'], $_SESSION['school'], $_SESSION['livegroup']);
$prep_2->execute();
$prep_2->close();

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($con);
