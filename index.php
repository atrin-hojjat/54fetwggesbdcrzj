<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $myusername = mysqli_real_escape_string($conn, convertPersianToEnglish($_POST['inputCode']));
  $prep = $conn->prepare("SELECT * FROM `puz_users` WHERE idcode=?");
  $prep->bind_param("s", convertPersianToEnglish($_POST['inputCode']));
  $prep->execute();
  $result = $prep->get_result();
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['idcode'] = convertPersianToEnglish($_POST['inputCode']);
    $_SESSION['name'] = $row['fname'] . ' ' . $row['lname'];
    $_SESSION['school'] = $row['branch'];
    $_SESSION['livegroup'] = $_POST['inputLiveGroup'];
    $_SESSION['absense'] = 0;
    header('location:class.php');
  } else {
    $prepp = $conn->prepare("SELECT * FROM `puz_users_o` WHERE idcode=?");
    $prepp->bind_param("s", convertPersianToEnglish($_POST['inputCode']));
    $prepp->execute();
    $resultt = $prepp->get_result();
    $roww = mysqli_fetch_array($resultt, MYSQLI_ASSOC);
    $countt = mysqli_num_rows($resultt);
    $_SESSION['idcode'] = convertPersianToEnglish($_POST['inputCode']);
    $_SESSION['livegroup'] = $_POST['inputLiveGroup'];
    $_SESSION['absense'] = 'N';
    if ($countt == 0) {
      $_SESSION['name'] = $_POST['inputName'];
      $_SESSION['school'] = $_POST['inputSchool'];
      $sql = $conn->prepare("INSERT INTO `puz_users_o`(`idcode`, `name`, `school`, `livegroup`) VALUES (?, ?, ?, ?)");
      $sql->bind_param("ssss", convertPersianToEnglish($_POST['inputCode']), $_POST['inputName'], $_POST['inputSchool'], $_POST['inputLiveGroup']);
      $sql->execute();
    } else {
      $_SESSION['name'] = $roww['name'];
      $_SESSION['school'] = $roww['school'];
    }
    $count = 1;
    header('location:class.php');
  }
} if(isset($_SESSION['idcode'])){
	header('location:class.php');
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
      <?php if ($count != 1) {
      ?>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" id="login-section">
          <div class="text-center mt-5">
            <img src="logo.png" class="bg-white p-4 shadow rounded-circle" width="128px">
          </div>
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">پورتال حضور و غیاب</h5>
              <form class="form-signin" action="" method="post">
                <div class="form-label-group text-right">
                  <input type="text" id="inputName" name="inputName" class="form-control" placeholder="نام و نام خانوادگی" required>
                  <label for="inputName">نام و نام خانوادگی</label>
                </div>
                <div class="form-label-group text-right">
                  <input type="tel" id="inputCode" name="inputCode" style="direction: ltr;" class="form-control" placeholder="کد ملی" required>
                  <label for="inputCode">کد ملی</label>
                </div>
                <select class="selectpicker mb-3 w-100" id="inputBranch" name="inputBranch" data-width="100%" title="واحد تحصیلی" required>
                  <option disabled>واحد تحصیلی</option>
                  <option>ادونس</option>
                  <option>امیرآباد</option>
                  <option>آبشناسان دخترانه</option>
                  <option>آبشناسان 1</option>
                  <option>دکتر فاطمی</option>
                  <option>کارگرشمالی</option>
                  <option>سایر مدارس</option>
                </select>
                <div class="form-label-group text-right" id="inputSchoolBox" style="display: none;">
                  <input type="text" id="inputSchool" name="inputSchool" class="form-control" placeholder="نام مدرسه">
                  <label for="inputSchool">نام مدرسه</label>
                </div>
                <select class="selectpicker mb-3 w-100" id="inputLiveGroup" name="inputLiveGroup" data-width="100%" title="انتخاب وبینار" required>
                  <option disabled>انتخاب وبینار</option>
                  <?php
                  $today = date('Y') . '-' . date('m') . '-' . date('d');
                  $sql_2 = "SELECT * FROM `puz_liveshows` WHERE `date`='$today' AND `school`='$school'";
                  $res = mysqli_query($conn, $sql_2);
                  if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                      echo '<option>' . $row['name'] . '</option>';
                    }
                  }
                  ?>
                </select>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" onClick="callLogin();">ورود</button>
              </form>
            </div>
          </div>
          <div class="card card-signin my-5">
            <div class="card-body">
              <p>در صورتی که هنگام ورود به سایت با مشکلی مواجه شدید به پشتیبانی سامانه (گوشه پایین سمت راست دکمه نارنجی رنگ) پیام دهید. </p>
            </div>
          </div>
        </div><?php
            }
              ?>
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