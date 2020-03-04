<?php
include("config.php");
?>

<?php
$prep = $conn->prepare("SELECT `absense`, `time` from `puz_absense` where `idcode`=?");
$prep->bind_param("s", $_SESSION['idcode']);
$prep->execute();
$res = $prep->get_result();
$now = date("Y-M-D H:i:s");
while($row = $res->fetch_assoc()) {
	$prep_2 = $conn->prepare("UPDATE `puz_absense` SET `absense`=?, `time`=?, `last_check`=? WHERE `idcode`=?");
	$new_time = $row['time'] + 1;
	$new_absense = 1;
	$prep_2->bind_param("iis", $new_absense, $new_time, $now, $_SESSION['idcode']);
	$prep_2->execute();
	$prep_2->close();

}
$prep->close();
?>
