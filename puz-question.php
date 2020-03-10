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
?>
<?php
$json = json_encode(array(
  "username" => "Puzzle question gatherer",
  "avatar_url" =>"https://puzzle-edu.ir/mat/logo-puzzle.png",
  "embeds" => array(
           array(
  			"title" => "سوال",
  			"color" => 14886498,
  			"fields" => array(
    		  array(
    		    "name" => "نام",
    		    "value" => $_POST['QuestionName'],
    		    "inline" => true
    		  ),
    		  array(
    		    "name" => "مدرسه",
    		    "value" => $_SESSION['QuestionSchool'],
    		    "inline" => true
    		  ),
    		  array(
    		    "name" => "متن سوال",
    		    "value" => $_POST['QuestionText']
    		  )
    		 ),
    	    "footer" => array(
    	    	"text" => "Puzzle-edu.ir",
		     	"icon_url" => "https://puzzle-edu.ir/mat/logo-puzzle.png"
		 	)

  		)
  	)
));
$ch = curl_init();
$headers  = [
            'Content-Type: application/json'
        ];
# URL Goes here
curl_setopt($ch, CURLOPT_URL,"https://discordapp.com/api/webhooks/687027281423892485/87PCRE1OX-ga80BxKIwcl5cxXpSBqby9Sv27_jCXFUYD5fOVHZcGo4YWJGbhGMfK5BU_");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result     = curl_exec ($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
?>
