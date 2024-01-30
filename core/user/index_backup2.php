<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../../php_class/main_class.php");
$main_class = new main_class();
//$main_class->check_variable();
?>
<!DOCTYPE html>
<html>
  <title><?= $main_class->app_name ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='../../vendor/googlefont/css.css?family=Sarabun' rel='stylesheet'>

  <link href="../../vendor/w3css/w3.css" rel="stylesheet">
  <link href="../../vendor/w3css/w3-theme.css" rel="stylesheet">
  <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendor/fortawesome/fa6/css/all.min.css">
  <link rel="stylesheet" href="<?= $main_class->app_theme ?>">
  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Sarabun', sans-serif; }
    /*h1,h2{color: #ffff00;}*/
  </style>
  <!--<body style=" background: #c6d5eb;">-->
  <body class="w3-theme-l3">
    <div>
      <div class="">
        <div class='w3-row ' style=" height: 100%;">
          <div class="w3-col m3 l4 w3-hide-small">&nbsp;</div>
          <div class="w3-col m6 l4 ">
            <div class="w3-card-4 w3-center">
              <div class="w3-theme-d1 w3-padding-16">
                <h1 class="w3-xlarge"><i class="fa-solid fa-head-side-mask"></i> <?= $main_class->app_name ?></h1>
              </div>

              <div class="w3-container w3-center w3-padding-64 ">
                <img src="../../require/images/logo.png" alt="Avatar" style="width:50%; max-width:500px;" class="w3-margin-top">
              </div>


              <footer class="w3-margin-top">
                <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-button w3-block w3-theme-d5 w3-xlarge w3-padding-16 ">
                  <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                <!--                <button onclick="document.getElementById('id02').style.display = 'block'" class="w3-button w3-block w3-theme-d1   ">
                                  <i class="fas fa-edit"></i> ลงทะเบียนเข้าใช้งาน</button>-->
              </footer>


            </div>
          </div>
        </div>

      </div>


      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom  w3-text-black w3-theme-l5" style="max-width:600px">

          <header class="w3-container  w3-xxlarge w3-center w3-padding-32 w3-theme">
            <div>
              <img src="../../require/images/logo.png" alt="Avatar" style="width:50%" class="w3-circle w3-margin-top">
            </div>
            <div>
              <h1><?= $main_class->app_name ?></h1>
            </div>
          </header>

          <div class="w3-container w3-margin-top ">
            <form class="w3-container" action="password.php" method="post" >

              <label class="w3-large"><i class="fas fa-user-secret fa-2x"></i> ชื่อผู้ใช้งาน</label>
              <input type="number" name="username" class="w3-input w3-border w3-margin-bottom" placeholder="รหัสประชาชน" required="" min="1000000000000"  max="9999999999999" step="1" value="<?= @$user_name ?>"/>
              <label class="w3-large"><i class="fas fa-key fa-2x"></i> รหัสผ่าน</label>
              <input type="password" name="password" class="w3-input w3-border" placeholder="รหัสผ่าน" required=""  value="<?= @$password ?>"/>

              <input type="hidden" name="x" value="L">
              <button class="w3-button w3-block w3-theme-d5 w3-section w3-padding w3-xlarge" type="submit"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
            </form>
          </div>

          <footer class="w3-container  w3-padding-16">
            <button onclick="document.getElementById('id01').style.display = 'none'" type="button" class="w3-button w3-red"><i class="fas fa-redo"></i> ยกเลิก</button>
            <button onclick="document.getElementById('id02').style.display = 'block';document.getElementById('id01').style.display = 'none'" class="w3-button w3-theme-d5 w3-right"><i class="far fa-edit"></i> ลงทะเบียนเข้าใช้งาน</button>
          </footer>


        </div>
      </div>



      <div id="id02" class="w3-modal w3-text-black">

        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-theme-l5" style="max-width:600px">
          <header class="w3-container  w3-xlarge w3-center w3-padding-16  w3-theme w3-margin-bottom">
            <div>
              <img src="../../require/images/logo.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
            </div>
            <h1 class=" w3-margin-bottom text-center">ลงทะเบียนเข้าใช้งาน</h1>
          </header>
          <div class="w3-container">
            <form action="register_query.php" method="post">
              <label>รหัสประชาชน</label>
              <input class="w3-input  w3-border w3-margin-bottom" type="number" name="pid" id="pid" placeholder="รหัสประชาชน" required="" step="1" min="1000000000000" max="9999999999999" >
              <label>ชื่อ - นามสกุล</label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="username" placeholder="ชื่อ - นามสกุล" required="" >
              <label>เบอร์ติดต่อ</label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="mobile"  placeholder="เบอร์ติดต่อ" required="" >
              <label>ตำแหน่ง</label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="position" placeholder="ตำแหน่ง" required="" >
              <label>วันเกิด</label>
              <input class="w3-input w3-border w3-margin-bottom" type="date" name="birthday" placeholder="วันเกิด" required="" min="1958-01-01" max="<?= date("Y-m-d") ?>" onkeydown="return false" value="<?= date("Y-m-d") ?>">
              <label>จังหวัด</label>
              <div id="province"></div>
              <label>อำเภอ</label>
              <div id='amphoe'>
                <!--<input class="w3-input  w3-border w3-margin-bottom" type="text" type="acode"  placeholder="อำเภอ" required="" >-->
              </div>
              <input type="hidden" name="action" value="INSERT">
              <button id="regis_btn" class="w3-button w3-block w3-theme-d5 w3-section w3-padding w3-xlarge" type="submit" disabled=""><i class="far fa-edit"></i> ลงทะเบียน</button>
            </form>
          </div>

          <footer class="w3-container w3-padding-16 ">
            <button onclick="document.getElementById('id02').style.display = 'none'" type="button" class="w3-button w3-red"><i class="far fa-edit"></i> ยกเลิก</button>
            <button onclick="document.getElementById('id01').style.display = 'block';document.getElementById('id02').style.display = 'none'" class="w3-button w3-theme-d5 w3-right"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
          </footer>

        </div>
      </div>


      <div id="id03" class="w3-modal ">
        <div class="w3-modal-content w3-card-4  w3-animate-zoom">
          <div class="w3-container w3-green ">
            <p class="w3-xxlarge w3-center"><?= @$_REQUEST["a"] ?></p>
          </div>
        </div>
      </div>
    </div>

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
        if (src == "tambol") {
          document.getElementById("regis_btn").disabled = false;
        }
      }

      window.onLoad = dochange('province', -1);
<?php
if (isset($_REQUEST["a"])) {
  echo "document.getElementById('id03').style.display = 'block';";
}
?>
    </script>
    <script>
      // Get the modal
      var modal1 = document.getElementById('id01');
      var modal2 = document.getElementById('id02');
      var modal3 = document.getElementById('id03');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target === modal1 || event.target === modal2 || event.target === modal3) {
          document.getElementById('id01').style.display = "none";
          document.getElementById('id02').style.display = "none";
          document.getElementById('id03').style.display = "none";
        }
      }
    </script>

  </body>
</html>

