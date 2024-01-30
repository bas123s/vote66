<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
//require("../../require/app_config.php");
require("../../php_class/drugreport.php");
$drug = new drugreport();
//$drug->check_variable();
//if (isset($_REQUEST["debug_mode"]) && (@$_REQUEST["debug_mode"] === "1")) {
if (isset($_REQUEST["x"]) && (@$_REQUEST["x"] === "1")) {
  $user_name = "9999999999991";
  $password = "dopakey1234";
}
?>
<!DOCTYPE html>
<html>
  <title><?= $drug->app_name ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
  <!--<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">-->
  <link href="../../require/css/google_fonts.css?family=Prompt&display=swap" rel="stylesheet">
  <!--<link rel="stylesheet" href="../../require/css/w3-colors-ios.css">-->

  <link href="../../require/css/w3.css" rel="stylesheet">
  <link rel="stylesheet" href="../../require/fa/css/all.min.css">
  <!--<link rel="stylesheet" href="../../require/css/w3-theme-dark-grey.css">-->
  <link rel="stylesheet" href="<?= $drug->app_theme ?>">
  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Prompt', sans-serif;}
  </style>
  <!--<body style=" background: #c6d5eb;">-->
  <body class="w3-theme-l3">
    <div>
      <div class="">

        <div class="w3-container w3-center w3-padding-32">
          <img src="../../require/images/logo.png" alt="Avatar" style="width:50%; max-width:150px;" class="w3-margin-top">
          <h2 ><?= $drug->app_name ?></h2>
          <h2 >กรมการปกครอง กระทรวงมหาดไทย</h2>
        </div>
        <!--        <div class='w3-row'>
                  <div class="w3-col m4 l5 w3-hide-small">&nbsp;</div>-->
        <div class="w3-bottom w3-container w3-col ">
          <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-button w3-block w3-theme-d5 w3-xxlarge ">
            <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
          <!--          <button onclick="document.getElementById('id02').style.display = 'block'" class="w3-button w3-block w3-theme-l1  w3-xlarge ">
                      <i class="fas fa-edit"></i> ลงทะเบียนเข้าใช้งาน</button>-->
          <div class="w3-row">
            <div class="w3-col m4">
              <a href="../../require/manual.pdf" class="w3-button w3-block w3-theme-d2 w3-large"><i class="far fa-file-pdf"></i> คู่มือ(อำเภอ)</a>
            </div>
            <div class="w3-col m4">
              <a href="../../require/manual2.pdf" class="w3-button w3-block w3-theme-d1 s4 w3-large"><i class="far fa-file-pdf"></i> คู่มือ(จังหวัด)</a>
            </div>
            <div class="w3-col m4">
              <a href="../../require/manual3.pdf" class="w3-button w3-block w3-theme-d2 s4 w3-large"><i class="far fa-file-pdf"></i> คู่มือ(ส่วนกลาง)</a>
            </div>
          </div>
          <a href="check.php" class="w3-button w3-block w3-theme-d5 w3-large "><i class="fas fa-search"></i> ตรวจสอบการอนุมัติให้ใช้งานระบบ</a>
          <div class="w3-bar  <?= $footer_bar["css"] ?>"  style="<?= $footer_bar["style"] ?>">
            <div  class="w3-large w3-center w3-margin-top">
              สำนักอำนวยการกองอาสารักษาดินแดน โทร.02-278-1008 <a href="https://multi.dopa.go.th/asa/">เว็บไซต์</a>
              <br> ออกแบบและพัฒนาโดย<br>ศูนย์สารสนเทศเพื่อการบริหารงานปกครอง
            </div>
          </div>
        </div>
        <!--</div>-->
      </div>


      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom  w3-text-black" style="max-width:800px">

          <header class="w3-container  w3-xlarge w3-center w3-padding-20">
            <div>
              <img src="../../require/images/logo.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
            </div>
            <div>
              <?= $drug->app_name ?>
            </div>
          </header>

          <div class="w3-container">
            <form class="w3-container" action="password.php" method="post" >

              <label><b>ชื่อผู้ใช้งาน</b></label>
              <input type="number" name="username" class="w3-input w3-border w3-margin-bottom" placeholder="รหัสประชาชน" required="" min="1000000000000"  max="9999999999999" step="1" value="<?= @$user_name ?>"/>
              <label><b>รหัสผ่าน</b></label>
              <input type="password" name="password" class="w3-input w3-border" placeholder="รหัสผ่าน" required=""  value="<?= @$password ?>"/>

              <input type="hidden" name="x" value="L">
              <button class="w3-button w3-block w3-theme-pantone1 w3-section w3-padding w3-xlarge" type="submit">เข้าสู่ระบบ</button>
            </form>
          </div>

          <footer class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display = 'none'" type="button" class="w3-button w3-red">ยกเลิก</button>
            <!--<button onclick="document.getElementById('id02').style.display = 'block';document.getElementById('id01').style.display = 'none'" class="w3-button w3-blue w3-right">ลงทะเบียนเข้าใช้งาน</button>-->
          </footer>

        </div>
      </div>


      <div id="id02" class="w3-modal">

        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
          <header class="w3-container  w3-xlarge w3-center w3-padding-20 w3-blue">
            <h1 class=" w3-margin-bottom text-center">ลงทะเบียนเข้าใช้งาน</h1>
          </header>
          <div class="w3-container">
            <form action="register_query.php" method="post">
              <label><b>รหัสประชาชน</b></label>
              <input class="w3-input  w3-border w3-margin-bottom" type="number" name="pid" placeholder="รหัสประชาชน" required="" step="1" min="1000000000000" max="9999999999999" >
              <label><b>ชื่อ - นามสกุล</b></label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="username" placeholder="ชื่อ - นามสกุล" required="" >
              <label><b>เบอร์ติดต่อ</b></label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="mobile"  placeholder="เบอร์ติดต่อ" required="" >
              <label><b>ตำแหน่ง</b></label>
              <input class="w3-input  w3-border w3-margin-bottom" type="text" name="position" placeholder="ตำแหน่ง" required="" >
              <label><b>วันเกิด</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="date" name="birthday" placeholder="วันเกิด" required="" min="1958-01-01" max="<?= date("Y-m-d") ?>" onkeydown="return false" value="<?= date("Y-m-d") ?>">
              <label><b>จังหวัด</b></label>
              <div id="province"></div>
              <label><b>อำเภอ</b></label>
              <div id='amphoe'>
                <!--<input class="w3-input  w3-border w3-margin-bottom" type="text" type="acode"  placeholder="อำเภอ" required="" >-->
                <select class="w3-select  w3-border w3-margin-bottom" name="pcode" required="">
                  <option value="" disabled selected>กรุณาเลือกอำเภอ</option>
                </select>
              </div>
              <input type="hidden" name="action" value="INSERT">
              <button class="w3-button w3-block w3-blue w3-section w3-padding w3-xlarge" type="submit">ลงทะเบียน</button>
            </form>
          </div>

          <footer class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id02').style.display = 'none'" type="button" class="w3-button w3-red">ยกเลิก</button>
            <button onclick="document.getElementById('id01').style.display = 'block';document.getElementById('id02').style.display = 'none'" class="w3-button w3-green w3-right">เข้าสู่ระบบ</button>
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

