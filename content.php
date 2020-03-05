<?php include("config.php"); ?>
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
				<div class="card card-content my-5 p-3" id="user-bar">
					<div class="card-body">
						<div class="container">
							<div class="row text-right">
								<h4 class="col-md-10">اطلاعات کاربری:</h4>
								<a class="col-md-2 text-left" href="logout.php">
									<button class="btn btn-lg btn-danger btn-sm d-inline-block rounded-pill">خروج</button>
								</a>
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
							<div class="row">
								<h4 class="w-100 text-right">راهنمای استفاده:</h4>
								<p>
									در زمان اعلام شده شروع پخش رویداد، صفحه را یک بار بروزرسانی کنید و پس از آن روی دکمه پخش در قسمت مشکی رنگ بالا کلیک کنید.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mx-auto">
				<div class="card card-content mb-5" id="content-box">
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
									<input type="text" class="form-control" id="firstlastname" value="<?php echo $_SESSION['flname']; ?>" name="firstlastname" required hidden><br>
									<label for="InputQuestion">متن سوال شما:</label>
									<textarea class="form-control" id="question" rows="5" name="question" required></textarea>
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
		$('#inputBranch').selectpicker();
		$('#inputLiveGroup').selectpicker();
		$('#inputBranch').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
			if ($('#inputBranch').val() == 'سایر مدارس') {
				$('#inputSchoolBox').fadeIn();
			} else {
				$('#inputSchoolBox').fadeOut();
			}
		});

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