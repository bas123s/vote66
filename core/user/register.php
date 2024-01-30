<!doctype html>
<html lang="th">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>ระบบขอหนังสือรับรองภาษาอังกฤษ</title>
    <meta name="description" content="ThaiQM">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="../../template/tqm/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../../template/tqm/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../../template/tqm/assets/css/style.css">
    <link rel="manifest" href="../../template/tqm/__manifest.json">
    <script src="../../vendor/components/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../template/tqm/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
<!--    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->
  <!--<script type="module" src="../../template/tqm/assets/js/ionicons.js"></script>-->


    <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../../vendor/fortawesome/fa6/css/all.min.css">
  </head>

  <body>

    <!-- loader -->
    <div id="loader">
      <img src="../../template/tqm/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>

    <div class="appHeader">
      <div class="left">
        <a href="https://mis5.dopa.go.th/0305/certificate/core/user/" class="headerButton goBack text-primary"><i class="fa-solid fa-angle-left fa-2x"></i></a>
      </div>
      <div class="pageTitle">
        ลงทะเบียนเข้าใช้งาน
      </div>
    </div>

    <div id="appCapsule" class="mt-5">

      <div class="section mt-1 text-center">
        <div class="d-flex justify-content-center">
          <form action="register_query.php" method="post">
            <div class="card col mb-5">


              <div class="card-header p-3">
                <h1 class="text-center text-primary">ลงทะเบียนเข้าใช้งาน</h1>
              </div>
              <div class="card-body p-3">
                <label class="label " for="pcode"><b>หน่วยงานหลัก</b></label>
                <div id="province" class="input-wrapper  text-primary mb-3"></div>
                <label class="label" for="acode"><b>หน่วยงานย่อย</b></label>
                <div id='amphoe' class="input-wrapper text-primary mb-3">
                  <select class="form-control custom-select ps-1" name="acode" id="acode" required="">
                    <option value="" disabled selected>กรุณาเลือกหน่วยงานหลักก่อน</option>
                  </select>
                </div>

                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="pid">รหัสประชาชน</label>
                    <input class="form-control ps-1" type="number" name="pid" id="pid" placeholder="รหัสประชาชน" required="รหัสประชาชน" step="1" min="1000000000000" max="9999999999999" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>

                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="username">ชื่อ - นามสกุล</label>
                    <input class="form-control ps-1" type="text" name="username" id="username" placeholder="ชื่อ - นามสกุล" required="" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>
                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="mobile">เบอร์ติดต่อ</label>
                    <input class="form-control ps-1" type="text" name="mobile" id="mobile" placeholder="เบอร์ติดต่อ" required="" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>
                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="email">อีเมล์</label>
                    <input class="form-control ps-1" type="email" name="email" id="email" placeholder="อีเมล์" required="" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>
                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="position">ตำแหน่ง</label>
                    <input class="form-control ps-1" type="text" name="position" id="position" placeholder="ตำแหน่ง" required="" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>




                <div class="form-group  basic animated">
                  <div class="input-wrapper">
                    <label class="label" for="pid">รหัสผ่าน</label>
                    <input class="form-control ps-1" type="password" name="password" id="password" placeholder="รหัสผ่าน" required="กรุณาตั้งรหัสผ่าน" >
                    <i class="clear-input pe-3">
                      <i class="fa-solid fa-circle-xmark"></i>
                    </i>
                  </div>
                </div>




                <div class="card-footer mt-2">
                  <input type="hidden" name='privilege' value="1">
                  <input type="hidden" name="action" value="INSERT">
                  <button class="btn btn-primary btn-block" type="submit">บันทึก</button>
                </div>

              </div>

            </div>
          </form>
        </div>





      </div>

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
    <!-- * App Capsule -->






    <!-- ========= JS Files =========  -->

    <!-- Splide -->
    <!--<script src="../../template/tqm/assets/js/plugins/splide/splide.min.js"></script>-->
    <!-- Base Js File -->
    <script src="../../template/tqm/assets/js/base.js"></script>

    <script language=Javascript>
        function Inint_AJAX() {
          try {
            return new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
          } //IE
          try {
            return new ActiveXObject("Microsoft.XMLHTTP");
          } catch (e) {
          } //IE
          try {
            return new XMLHttpRequest();
          } catch (e) {
          } //Native Javascript
          alert("XMLHttpRequest not supported");
          return null;
        }


        function dochange(src, val) {
          var req = Inint_AJAX();
          req.onreadystatechange = function () {
            if (req.readyState == 4) {
              if (req.status == 200) {
                document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
              }
            }
          };
          //      alert("get_select.php?data=" + src + "&val=" + val);
          req.open("GET", "../../require/get_select4.php?data_type=" + src + "&data_value=" + val); //สร้าง connection
          req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
          req.send(null); //ส่งค่า
        }

        window.onLoad = dochange('province', -1);

    </script>


    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
          elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
              e.target.setCustomValidity("กรุณากรอกข้อมูลช่องนี้ด้วย");
            }
          };
          elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
          };
        }
      })
    </script>

  </body>

</html>