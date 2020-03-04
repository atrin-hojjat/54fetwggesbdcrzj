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

<?php

include("config.php");

$MerchantID = 'a9a6a798-7d7a-11e9-84e3-000c29344814'; //Required
$Amount = 30000; //Amount will be based on Toman - Required
$Authority = $_GET['Authority'];
$puz_result ='';


if ($_GET['Status'] == 'OK') {

$client = new SoapClient('https://zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount
]
);

$Authority = (int)$Authority;

if ($result->Status == 100) {
    $sql = "UPDATE `puz_users` SET `payment`='OK' WHERE `code`='".$Authority."'";

    $res = $conn->query($sql);

$puz_result = 'پرداخت با موفقیت انجام شد. <br />کد سفارش:'.$Authority;
} else {
$puz_result =  'مشکلی در پرداخت بوجود آمد. <br />توضیحات: ارور '.$result->Status;
}
} else {
$puz_result = 'شما از پرداخت انصراف دادید';
}
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">فرم ثبت نام وبینار</h5>
            <p style="text-align: center;font-size: 22px;"><?php echo $puz_result; ?></p>
                                      <hr class="my-4">
              <a href="index.php" style="text-decoration: none;"><button class="btn btn-lg btn-google btn-block text-uppercase">بازگشت به صفحه‌اصلی</button></button></a>
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