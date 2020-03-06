<?php
include("config.php");
?>
<?php
$prep = $conn->prepare("SELECT `absense`, `time`, `last_check` from `puz_absense` where `idcode`=? and `livename`=?");
$prep->bind_param("ss", $_SESSION['idcode'], $_SESSION['livegroup']);
$prep->execute();
$res = $prep->get_result();
$now = date("Y-M-D H:i:s");
$last_10_mins = date("Y-M-D H:i:s", strtotime("-8 minutes"));
while($row = $res->fetch_assoc()) {
	$prep_2 = $conn->prepare("UPDATE `puz_absense` SET `absense`=?, `time`=?, `last_check`=? WHERE `idcode`=? and `livename`=?");
	$new_time = $row['time'];
	if($last_10_mins >= $row['last_check'])
		$new_time += 1;
	else $now = $row['last_check'];
	$_SESSION['absense'] = 1;
	$prep_2->bind_param("iisss", $_SESSION['absense'], $new_time, $now, $_SESSION['idcode'], $_SESSION['livegroup']);
	$prep_2->execute();
	$prep_2->close();
}
$prep->close();
?>
