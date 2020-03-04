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
    <!--BEGIN RAYCHAT CODE--> <script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="93c2c133-2f9e-4904-8b6c-d206e781625b";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script> <!--END RAYCHAT CODE-->
</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">فرم ثبت نام وبینار</h5>
            <p style="text-align: center;">کلاس آنلاین جمع بندی آزمون نهایی ترم دوم - فیزیک
            <br />4 ساعت کلاس آنلاین مهندس مدرسه دوست<br />(با 50 درصد تخفیف ویژه)</p>
            <form class="form-signin" action="payment.php" method="get">
                <div class="form-label-group">
                <input type="text" id="inputflname" name="inputflname" class="form-control" placeholder="نام و نام خانوادگی" autofocus required>
                <label for="inputflname">نام و نام خانوادگی</label>
              </div>
                
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="آدرس ایمیل" autofocus>
                <label for="inputEmail">آدرس ایمیل</label>
              </div>

              <div class="form-label-group">
                <input type="tel" id="inputMobile" name="inputMobile" class="form-control" placeholder="شماره موبایل" required>
                <label for="inputMobile">شماره موبایل</label>
              </div>
                <p style="text-align: center;font-weight: 500;text-decoration: line-through;color: red;font-size: 18px;margin-bottom: 0;">60,000 تومان</p>
                <p style="text-align: center;font-weight: bold;color: green;font-size: 28px;">30,000 تومان</p>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">پرداخت</button>
            </form>
                          <hr class="my-4">
                           <h5 class="card-title text-center">شروع کلاس ساعت ۱۷:۰۰</h5>
              <a href="login.php" style="text-decoration: none;"><button class="btn btn-lg btn-google btn-block text-uppercase">ورود به صفحه پخش زنده</button></a>
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