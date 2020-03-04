<?php

include("config.php");

$MerchantID = 'a9a6a798-7d7a-11e9-84e3-000c29344814'; //Required
$Amount = 30000; //Amount will be based on Toman - Required
$Description = 'کلاس آنلاین جمع بندی فیزیک'; // Required
$Email = $_GET['inputEmail']; // Optional
$Mobile = $_GET['inputMobile']; // Optional
$CallbackURL = 'https://puzzle-edu.ir/live33/verify.php'; // Required

$query = mysqli_query($conn, "SELECT * FROM `puz_users` WHERE `phone`='".$Mobile."' AND `payment`='OK' ");


if(mysqli_num_rows($query) > 0){

    $puz_result = 'با این شماره تماس، از قبل پرداختی انجام گرفته است.';

}else{
 $client = new SoapClient('https://zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL
]
);

$sql = "INSERT INTO `puz_users`(`flname`, `phone`, `email`, `payment`, `code`) VALUES ('".$_GET['inputflname']."', '".$Mobile."', '".$Email."', 'NOK', '".$result->Authority."')";

$res = $conn->query($sql);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
Header('Location: https://zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
}

$conn->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گروه آموزشی پازل</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet" >
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">فرم ثبت نام وبینار</h5>
            <p style="text-align: center;font-size: 22px;"><?php echo $puz_result; ?></p>
          </div>
        </div>
      </div>
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