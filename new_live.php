<?php
include("config.php");
?>

<?php
echo hash("sha256", $_POST['password']); 
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(hash("sha256", $_POST['password']) == "a87a5843b906488216ff1614dee5b5b3a59470163617f462061f9cba863b535b")
	{
		$prep = $conn->prepare("INSERT INTO `puz_liveshows`(`name`, `date`) VALUES(?, ?)");
		$prep->bind_param("ss", $_POST['name'], $_POST['date']);
		$prep->execute();
		$prep->close();
		echo "DONE 1<br>";
		$sql_2 = "SELECT idcode FROM puz_users";
		$res = mysqli_query($conn, $sql_2);
		if (mysqli_num_rows($res) > 0) {
			$zero = 0;
			$inf_ago = "2000-01-01 00:00:00"
	    while($row = mysqli_fetch_assoc($res)) {
				$prep_2 = $conn->prepare("INSERT INTO `puz_absense`(`idcode`, `absense`, `time`, `livename`, `last_check`) VALUES(?, ?, ?, ?, ?)");
				$prep_2->bind_param("siis", $row['idcode'], $zero, $zero, $_POST['name'], $inf_ago);
				$prep_2->execute();
				$prep_2->close();

			}
		}
		$message = "Successfully Added Live";
?>
<?php 
	} else {
		$message = "Wrong Password";
?>

<?php
	}
}
?>
<form url="/new_live.php" method="post">
	<input type="input" name="name" placeholder="Name"/>
	<input type="input" name="date" placeholder="Date"/>
<input type="password" name="password"/>
<button type="submit"> Submit </button>
</form>
