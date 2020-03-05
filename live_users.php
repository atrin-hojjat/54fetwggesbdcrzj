<?php

include("config.php");


$prep = $conn->prepare("SELECT `idcode`, `last_check`, `livename` from `puz_absense` where `absense`=1");
$prep->execute();
$res = $prep->get_result();
$now = date("Y-M-D H:i:s", strtotime("-10 minutes"));
$count = 0;
while($row = $res->fetch_assoc()) {
	if(date($row['last_check']) < now) {
		$count = $count + 1;
		echo $row['idcode']." ".$row['livename'];
		echo "<br>";
	}
}
echo $count;
?>
