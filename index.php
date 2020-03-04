<?php
    include("config.php");
    session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($conn,convertPersianToEnglish($_POST['inputCode']));
      
      $sql = "SELECT * FROM `puz_users` WHERE idcode='$myusername'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      
      $count = mysqli_num_rows($result);

      if($count == 1) {
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['branch'] = $row['branch'];
        $_SESSION['class'] = $row['class'];
        $sql = "UPDATE `puz_users` SET `absence1`='1' WHERE `idcode`='".$_POST['inputCode']."')";
        $res = $conn->query($sql);
      }else {
        $sql = "INSERT INTO `puz_users_o`(`idcode`, `name`, `phone`, `school`) VALUES ('".$_POST['inputCode']."', '".$_POST['inputName']."', '0', '".$_POST['inputSchool']."')";
        $res = $conn->query($sql);
        $count = 1;
      }
      
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مجتمع علامه طباطبایی</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" >
</head>



<body>
  <div class="container">
    <div class="row">
    <?php if($count != 1) {
        echo'
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" id="login-section">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">ورود به وبینار</h5>
            <p style="text-align: center;">'.$error.'</p>
            <form class="form-signin" action="" method="post">
            <div class="form-label-group text-right">
                <input type="text" id="inputName" name="inputName" class="form-control" placeholder="نام و نام خانوادگی" required>
                <label for="inputName">نام و نام خانوادگی</label>
            </div>
            <div class="form-label-group text-right">
                <input type="tel" id="inputCode" name="inputCode" style="direction: ltr;" class="form-control" placeholder="شماره موبایل" required>
                <label for="inputCode">کد ملی</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" onClick="callLogin();">ورود</button>
            </form>
          </div>
        </div>
      </div>';
    }
    ?>
      <?php if($count == 1) include("content.php"); ?>
    </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--BEGIN RAYCHAT CODE--> <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="93c2c133-2f9e-4904-8b6c-d206e781625b";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script> <!--END RAYCHAT CODE-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139963582-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139963582-2');
</script>

<script>
	    $('#question-box').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
        type: 'post',
        url: 'puz-question.php',
        data: $('#question-box').serialize(),
        success: function () {
            $('#myModal').modal('toggle');
            alert('سوال شما با موفقیت ارسال شد!');
        }
    });
    
});
	</script>
</script>
</html>