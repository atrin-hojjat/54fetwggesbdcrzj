<?php
//شروع یک نشست
session_start();
//دریافت و تنظیم متغیرهای ارسال شده توسط کاربر
@$username = $_POST['inputMobile'];
$check_error = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#33AEFF" b/>
    <title>گروه آموزشی پازل | پخش زنده</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" >
</head>

<body>

<body>
  <div class="container">
    <div class="row">
      
<?php
if (!isset($username) || $username == ''){
        echo '<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">گروه آموزشی پازل</h5>
            <p style="text-align: center;font-size: 22px;">فیلد شماره موبایل نباید خالی بماند!</p>

            <a href="login.php" style="text-decoration: none;"><button class="btn btn-lg btn-google btn-block text-uppercase">بازگشت به صفحه ورود</button></a>
          </div>
        </div>
      </div>';
    $check_error = 1;
}
?>

    </div>
  </div>
</body>
</html>