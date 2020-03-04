<?php
include("config.php")
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(hash("sha256", $_POST['password']) == "f349a3765a16ab4ec8ab93db5b651f5894ae3756290741b8da37f91d9601216c")
	{
		$prep = $conn->prepare("INSERT INOT puz_liveshows(name, date) values(?, ?)")
		$prep->bind_param("s", $_POST['name'])
		$prep->bind_param("s", $_POST['date'])
		$prep.execute()
		$sql_2 = "SELECT idcode FROM puz_users"
		$res = mysqli_query($conn, $sql_2);
		if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
				$prep_2 = $conn->prepare("INSERT INTO puz_absense(idcode, absense, time, livename) values(?, ?, ?, ?)");
				$prep.bind_param("s", row.);
				$prep.bind_param("i", 0);
				$prep.bind_param("i", 0);
				$prep.bind_param("s", $_POST['name'])
			}
		}

?>
Successfully Added Live
<?php 
	} else {
?>
Wrong Passowrd

<?php
	}
}
?>
<form url="/new-live.php" method="post">
	<input type="input" name="name" placeholder="Name"/>
	<input type="input" name="date" placeholder="Date"/>
</form>
