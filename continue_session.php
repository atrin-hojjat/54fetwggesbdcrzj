<?php
include("config.php");
?>
<?php
$prep = $conn->prepare("SELECT `absense`, `time` from `puz_absense` where `idcode`=? and `livename`=?");
$prep->bind_param("ss", $_SESSION['idcode'], $_SESSION['livename']);
$prep->execute();
$res = $prep->get_result();
$now = date("Y-M-D H:i:s");
while($row = $res->fetch_assoc()) {
	$prep_2 = $conn->prepare("UPDATE `puz_absense` SET `absense`=?, `time`=?, `last_check`=? WHERE `idcode`=? and `livename`=?");
	$new_time = $row['time'] + 1;
	$_SESSION['absense'] = 1;
	$prep_2->bind_param("iiss", $_SESSION['absense'], $new_time, $now, $_SESSION['idcode'], $_SESSION['livename']);
	$prep_2->execute();
	$prep_2->close();
}
$prep->close();
?>