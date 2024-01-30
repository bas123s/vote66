<!doctype html>
<html lang="th">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>ThaiQM</title>
    <meta name="description" content="ThaiQM">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="../../template/tqm/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../../template/tqm/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../../template/tqm/assets/css/style.css">
    <link rel="manifest" href="../../template/tqm/__manifest.json">
  </head>

  <body>

    <!-- loader -->
    <div id="loader">
      <img src="../../template/tqm/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <!--    <div class="appHeader no-border transparent position-absolute">
          <div class="left">
            <a href="#" class="headerButton goBack h1 text-black mt-3">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          </div>
          <div class="pageTitle"></div>
          <div class="right">
          </div>
        </div>-->
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

      <div class="section mt-1 text-center">
        <img src="../../require/images/tqm_logo_purple.png" class="mb-2" alt="Avatar" style="width:100%; max-width:250px;" >
        <!--<h1>ThaiQM</h1>-->
        <!--<h2>เข้าสู่ระบบ</h2>-->
      </div>
      <div class="section mb-5 p-2">
        <!--<div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">ประกาศ</h5>
            <p class="card-text">ปิดระบบชั่วคราว เนื่องจากมีปัญหาการบันทึกข้อมูล</p>
          </div>
        </div>-->
        <!--<form id='form1' action="https://thaiqm4.dopa.go.th/core/user/password.php" onsubmit="get_action(this);" method ="post" >-->
        <form id='form1' action="https://thaiqm4.dopa.go.th/core/user/password.php"  method ="post" >
                  <div class="card mb-5">
                    <div class="card-body pb-1">
                                    <div class="form-group  basic ">
                                      <div class="input-wrapper">
                                        <label class="label" for="province">จังหวัด</label>
                                        <select class="form-control custom-select" id="province" name="province" onchange="get_action(this);">
                                          <option disable selected>*** กรุณาเลือกจังหวัด ***</option>
                                          < ?php
                                          require_once ("../../require/province.php");
                                          foreach ($province as $pcode => $pname) {
                                            echo "<option value='" . $pcode . "'>" . $pname . "</option>";
                                          }
                                          ?>
                                          <option value='03'>ส่วนกลาง</option>
                                        </select>
                                      </div>
                                    </div>

                      <div class="form-group  basic animated">
                        <div class="input-wrapper">
                          <label class="label" for="username">รหัสผู้ใช้งาน 13 หลัก</label>
                          <input type="text" class="form-control form-control-lg ps-1" id="username" name="username" placeholder="รหัสผู้ใช้งาน 13 หลัก">
                          <i class="clear-input pe-3">
                            <i class="fa-solid fa-circle-xmark"></i>
                          </i>
                        </div>
                      </div>

                      <div class="form-group  basic animated">
                        <div class="input-wrapper">
                          <label class="label " for="password1">รหัสผ่าน</label>
                          <input type="password" class="form-control form-control-lg ps-1" id="password" name="password" placeholder="รหัสผ่าน">
                          <i class="clear-input pe-3">
                            <i class="fa-solid fa-circle-xmark"></i>
                          </i>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-block btn-lg ">เข้าสู่ระบบ</button>
                    </div>
                  </div>


                            <div class="form-links mt-2">
                              <div>
                                <a href="app-register.html">Register Now</a>
                              </div>
                              <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                            </div>

                  <div class=" transparent mt-5">
                    <a href="info.php" class="btn btn-secondary btn-block btn-lg m-1 col-12">คู่มือและวิธีการใช้งานระบบ</a>
                  </div>
                  <input type="hidden" name="x" value="L">
                  <input type="hidden" name="chx" value="1">
                </form>


        <?php if (isset($_REQUEST["a"])) { ?>
          <script>
            $(document).ready(function () {
              notification('notification-12', 5000);
            });
          </script>
        <?php } ?>

        <!-- ios style 12 -->
        <div id="notification-12" class="notification-box  tap-to-close">
          <div class="notification-dialog ios-style">
            <div class="notification-header">
              <div class="in ps-1">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div class="h6 pt-1 ps-1">ปิดอัตโนมัติใน 5 วินาที.</div>
              </div>
              <div class="right">
                <!--<span>5 mins ago</span>-->
                <a href="#" class="close-button">
                  <i class="fa-solid fa-circle-xmark"></i>
                </a>
              </div>
            </div>
            <div class="notification-content">
              <div class="in col-12">
                <div class="text h7 text-center pt-2"><?= $_REQUEST["a"] ?></div>
              </div>
            </div>
          </div>
        </div>
        <!-- * ios style 12 -->
      </div>

    </div>
    <!-- * App Capsule -->



    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="../../template/tqm/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
<!--    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
        <!--<script type="module" src="../../template/tqm/assets/js/ionicons.js"></script>-->

    <script src="../../vendor/components/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../../vendor/fortawesome/fa6/css/all.min.css">
    <!-- Splide -->
    <script src="../../template/tqm/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="../../template/tqm/assets/js/base.js"></script>


<!--    <script type="text/javascript">
            function get_action(province) {
              console.log(province.value);
              var reg = province.value;
              reg = reg.substring(0, 1);
              if (reg == 1 || reg == 2 || reg == 7) {
                document.getElementById("form1").action = "https://thaiqm2.dopa.go.th/core/user/password.php";
              } else if (reg == 3 || reg == 4) {
                document.getElementById("form1").action = "https://thaiqm3.dopa.go.th/core/user/password.php";
              } else if (reg == 5 || reg == 6) {
                document.getElementById("form1").action = "https://thaiqm1.dopa.go.th/core/user/password.php";
              } else if (reg == 8 || reg == 9) {
                document.getElementById("form1").action = "https://thaiqm4.dopa.go.th/core/user/password.php";
              } else if (reg == 0) {
                document.getElementById("form1").action = "https://www.thaiqm.com/core/user/password.php";
              }
            }
    </script>-->

  </body>

</html>