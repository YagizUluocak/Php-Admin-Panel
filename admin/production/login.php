<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
?>
<?php

session_start();
if (isset($_POST["submit"])) {


  $giris = new yonetim();
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  if($giris->girisYap($username, $password))
  {
    echo "<script>window.location.href='http://localhost/admin/production/index.php';</script>";
  }
  else
  {
    echo "YANLIŞ GİRİŞ";
  }
}
?>



<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yönetim Paneli Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form method="post" >
              <h1>YÖNETİM PANELİ</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required=""  name="username">
                
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" >
              </div>
              <div>
                <a class="btn btn-default submit" type="submit" name="submit">Giriş Yap</a>
                <input type="submit" value="submit" name="submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw"></i> Yağız Uluocak!</h1>
                  <p>©2023 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
