<!doctype html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>TQM</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="../../template_html/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../../template_html/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../../template_html/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
  </head>

  <body>

    <!-- loader -->
    <div id="loader">
      <img src="../../template_html/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
      <div class="left">
        <a href="#" class="headerButton goBack">
          <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
      </div>
      <div class="pageTitle"></div>
      <div class="right">
      </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

      <div class="section mt-2 text-center">
        <img src="../../require/images/logo.png" class="" alt="Avatar" style="width:100%; max-width:150px;" class="w3-margin-top">
        <h1 class="mt-2">ThaiQM</h1>
        <h2>เข้าสู่ระบบ</h2>
      </div>
      <div class="section mb-5 p-2">

        <form action="password.php" method="post" >
          <div class="card">
            <div class="card-body pb-1">
              <div class="form-group basic">
                <div class="input-wrapper">
                  <label class="label" for="username">ชื่อผู้ใช้งาน</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
                  <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                  </i>
                </div>
              </div>

              <div class="form-group basic">
                <div class="input-wrapper">
                  <label class="label" for="password1">รหัสผ่าน</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                  <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                  </i>
                </div>
              </div>
            </div>
          </div>


          <!--          <div class="form-links mt-2">
                      <div>
                        <a href="app-register.html">Register Now</a>
                      </div>
                      <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div>-->

          <div class="form-button-group  transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">เข้าสู่ระบบ</button>
          </div>
          <input type="hidden" name="x" value="L">
        </form>
      </div>

    </div>
    <!-- * App Capsule -->



    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="../../template_html/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <!--<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
    <script type="module" src="../../template_html/assets/js/ionicons.js"></script>
    <!-- Splide -->
    <script src="../../template_html/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="../../template_html/assets/js/base.js"></script>


  </body>

</html>