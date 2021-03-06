<?php include("config.php");
if (!isset($_SESSION['name'])) {
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>مجتمع علامه طباطبایی</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap-select.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto" id="panel-bar">
				<div class="card card-bar my-5">
					<div class="card-body">
						<div class="container">
							<div class="row justify-content-between">
								<div class="col-md-auto">
									<h1><img src="logo.png" height="34px"> مجتمع علامه طباطبایی | <span><?php echo $_SESSION['livegroup']; ?></span></h1>
								</div>
								<div class="col-md-auto">
									<button class="btn btn-lg btn-facebook btn-block text-uppercase" data-toggle="modal" data-target="#myModal">پرسش از استاد</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mx-auto">
				<div class="card card-content my-5" id="content-box">
					<?php
					$sql_2 = "SELECT * FROM `puz_liveshows` WHERE `name`='" . $_SESSION['livegroup'] . "'";
					$res = mysqli_query($conn, $sql_2);
					$row = mysqli_fetch_assoc($res);
					echo $row['player2'];
					?>
				</div>
			</div>
			<div class="col-12 mx-auto">
				<div class="card card-content mb-5 p-3" id="user-bar">
					<div class="card-body">
						<div class="container">
							<div class="row text-right">
								<h4 class="col-md-10">اطلاعات کاربری:</h4>
								<div class="col-md-2 text-left">
									<a href="logout.php">
										<button class="btn btn-lg btn-danger btn-sm d-inline-block rounded-pill">خروج</button>
									</a>
								</div>
								<div class="col-md-4">
									<h5>نام و نام خانوادگی: <span><?php echo $_SESSION['name']; ?></span></h5>
								</div>
								<div class="col-md-4">
									<h5>واحد تحصیلی: <span><?php echo $_SESSION['school']; ?></span></h5>
								</div>
								<div class="col-md-4">
									<?php if ($_SESSION['absense'] != 'N') { ?><h5>وضعیت حاضری: <span>
												<?php if ($_SESSION['absense'] == 1) {
													echo 'حاضر';
												} else {
													echo 'غایب';
												} ?>
											</span></h5>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mx-auto">
				<div class="card card-content mb-5 p-3" id="how-bar">
					<div class="card-body">
						<div class="container">
							<div class="row text-right">
								<h4 class="w-100">راهنمای استفاده:</h4>
								<p>
									در زمان اعلام شده شروع پخش رویداد، صفحه را یک بار بروزرسانی کنید و پس از آن روی دکمه پخش در قسمت مشکی رنگ بالا کلیک کنید.<br>
									اگر در هنگام پخش ویدیو با مشکل مواجه شدید <a href=class.php>این لینک</a> را امتحان کنید.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content project-details-popup">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-header">
						<h2>پرسش از استاد</h2>
					</div>
					<div class="modal-body">
						<div class="alert alert-success contact__msg" style="display: none" role="alert">
							سوال شما با موفقیت به استاد ارسال گردید.
						</div>
						<div class="col-md-12">
							<form onsubmit="return false;" id="question-box">
								<div class="form-group">
									<input type="hidden" id="QuestionName" value="<?php echo $_SESSION['name']; ?>" name="QuestionName" required>
									<input type="hidden" id="QuestionSchool" value="<?php echo $_SESSION['school']; ?>" name="QuestionSchool" required>
									<label for="InputQuestion">متن سوال شما:</label>
									<textarea class="form-control" id="QuestionText" rows="5" name="QuestionText" required></textarea>
								</div>
								<input type='submit' value='ارسال پرسش' id="submit" class="btn btn-success" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap-select.min.js"></script>

<!--BEGIN RAYCHAT CODE-->
<script type="text/javascript">
	! function() {
		function t() {
			var t = document.createElement("script");
			t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src = "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" + window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o;
			var e = document.getElementsByTagName("script")[0];
			e.parentNode.insertBefore(t, e)
		}
		var e = document,
			a = window,
			o = "93c2c133-2f9e-4904-8b6c-d206e781625b";
		"complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load", t, !1)
	}();
</script>
<!--END RAYCHAT CODE-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139963582-2"></script>

<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'UA-139963582-2');
</script>

<script>
	$(document).ready(function() {
		console.clear();
		$('#inputBranch').selectpicker();
		$('#inputLiveGroup').selectpicker();
		$('#inputBranch').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
			if ($('#inputBranch').val() == 'سایر مدارس') {
				$('#inputSchoolBox').fadeIn();
			} else {
				$('#inputSchoolBox').fadeOut();
			}
		});
		// Absense and stuff

		//Socket based
		if(true) {
			let sock_conn_addr = "puzzle-edu.com:2112/" //TODO
			var sock //= WebSocket(sock_conn_addr);
<?php echo 'let attr = "session/login/" + "'.$_SESSION['livegroup'].'/'.$_SESSION['idcode'].'";'; ?>
			//sock = new WebSocket("ws://" + sock_conn_addr + attr);

			$.ajax({
				method: 'post',
				url: "https://" + sock_conn_addr + attr,
				xhrFields: {
						 withCredentials: true
				},
				crossDomain: true,
				success: () => {
						sock = new WebSocket("wss://"+  sock_conn_addr)
				}
			});

		}

		var upd_login = () => {
			$.ajax({
				method: 'post',
				url: 'continue_session.php', //TODO
				success: (res) => {
					console.log(res);
				}
			});
		}
		upd_login();
		var refresh_time = setInterval(upd_login, 10 * 60 * 1000); // TODO

	});
	$('#question-box').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'puz-question.php',
			data: $('#question-box').serialize(),
			success: function() {
				$('#myModal').modal('toggle');
				alert('سوال شما با موفقیت ارسال شد!');
			}
		});
	});
</script>

</html>
