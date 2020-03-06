<?php
$servername = "localhost";
$username = "puzzleed_livefa1";
$password = "w1-K8ir0Q$@Y";
$dbname = "puzzleed_liveshows";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Change character set to utf8
mysqli_set_charset($conn, "utf8");
$result = mysqli_query($conn, "SELECT * FROM `live13980303` order by id desc");

date_default_timezone_set('Asia/Tehran');

function timeDiff($timee1, $timee2)
{
    $diff2 = strtotime($timee2);
    $diff1 = strtotime($timee1);
    $diff = $diff2 - $diff1;
    if($diff < 60) {
        return $diff.' ثانیه قبل';
    }
    elseif($diff < 3600) {
        return round($diff / 60,0,1).' دقیقه قبل';
    }
    elseif($diff >= 3600 && $diff < 86400) {
        return round($diff / 3600,0,1).' ساعت قبل';
    }
    elseif($diff > 86400) {
        return round($diff / 86400,0,1).' روز قبل';
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
    <title>گروه آموزشی پازل</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" >
</head>

<body>
  <div class="container">
    <div class="row">
        <div class="col-12 mx-auto" id="panel-bar">
        <div class="card card-bar my-5">
          <div class="card-body">
          <div class="row">
    <div class="col-md-6 offset-md-4">
                <h1><img src="logo.png" height="34px"> پازل | <span>رسول مدرسه‌دوست</span></h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-lg btn-google btn-block text-uppercase" onclick="location.reload()">بروزرسانی</button>
            </div>
          </div>
            </div>
            </div>
        </div>
        <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-12 mx-auto"><div class="card card-signin my-5"><div class="card-body">';
                echo '<div class="row">';
                $time1 = $row['time'];
                $time2 = date('Y-m-d H:i:s');
                echo '<h5 class="card-title card-name text-center col-md-8">' . $row['name'] . '</h5>';
                echo '<h5 class="card-title card-time text-center col-md-4"">' . timeDiff($time1, $time2) . '</h5>';
                echo '<p style="text-align: center;font-size: 22px;">' . $row['question'] . '</p>';
                echo '</div></div></div></div>';
            }
            ?>
    </div>
  </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139141632-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139141632-2');
</script>

</html>