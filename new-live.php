<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(hash("sha256", $_POST['password']) == "a87a5843b906488216ff1614dee5b5b3a59470163617f462061f9cba863b535b")
	{
		$prep = $conn->prepare("INSERT INTO `puz_liveshows`(`name`, `date`, `school`) VALUES(?, ?, ?)");
		$prep->bind_param("sss", $_POST['name'], $_POST['date'], $_POST['school']);
		$prep->execute();
		$prep->close();
		$sql_2 = $conn->prepare("SELECT `idcode` FROM `puz_users` where `school`=?");
		$prep->bind_param("s", $_POST['school']);
		$res = mysqli_query($conn, $sql_2);
		if (mysqli_num_rows($res) > 0) {
			$zero = 0;
			$inf_ago = "2000-01-01 00:00:00";
			while($row = mysqli_fetch_assoc($res)) {
				$prep_2 = $conn->prepare("INSERT INTO `puz_absense`(`idcode`, `absense`, `time`, `livename`, `last_check`) VALUES(?, ?, ?, ?, ?)");
				$prep_2->bind_param("sisss", $row['idcode'], $zero, $_POST['date'], $_POST['name'], $inf_ago);
				$prep_2->execute();
				$prep_2->close();
			}
		}
		$message = "لیست حضور غیاب با موفقیت اضافه شد";
	} else {
		$message = "رمز اشتباه است";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex" />
    <title>مجتمع علامه طباطبایی</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/font-awesome.min.css" rel="stylesheet" >
    <link href="css/bootstrap-select.min.css" rel="stylesheet" >
    <link href="css/style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" >
</head>

<body>
  <div class="container">
    <div class="row">
    <?php if($count != 1) {
      ?>
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" id="login-section">
		<div class="text-center mt-5">
			<img src="logo-puzzle.png" class="bg-white p-4 shadow rounded-circle" width="128px">
		</div>
        <div class="card card-signin mt-3 mb-5">
          <div class="card-body">
            <h5 class="card-title text-center">ثبت وبینار جدید</h5>
            <form class="form-signin" url="/new-live.php" method="post">
			<?php if($message != ''){ ?>
			<div class="alert alert-success text-right rounded-pill" role="alert">
  				<?php echo $message; ?>
			</div>
			<?php } ?>
            <div class="form-label-group text-right">
                <input type="text" id="inputName" name="name" class="form-control" placeholder="نام وبینار" required>
                <label for="inputName">نام وبینار</label>
            </div>
            <div class="form-label-group text-right">
                <input type="text" id="inputSchool" name="school" class="form-control" placeholder="نام مدرسه" required>
                <label for="inputSchool">نام مدرسه</label>
            </div>
            <div class="form-label-group text-right">
                <input type="text" id="inputDate" name="date" class="form-control" placeholder="تاریخ برگزاری میلادی" required>
                <label for="inputDate">تاریخ برگزاری میلادی</label>
            </div>
            <div class="form-label-group text-right">
                <input type="password" id="inputPass" name="password" class="form-control" placeholder="کد رمز" required>
                <label for="inputPass">کد رمز</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">ثبت</button>
            </form>
          </div>
        </div>
      </div><?php
         }
      ?>
      <?php if($count == 1) include("content.php"); ?>
    </div>
  </div>
</body>
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap-select.min.js"></script>

<!--BEGIN RAYCHAT CODE--> <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="93c2c133-2f9e-4904-8b6c-d206e781625b";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script> <!--END RAYCHAT CODE-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139963582-2"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139963582-2');
</script>
</html>
