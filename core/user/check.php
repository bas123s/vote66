<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../../php_class/drugreport.php");
$drug = new drugreport();

//$drug->check_variable();
//if (isset($_REQUEST["debug_mode"]) && (@$_REQUEST["debug_mode"] === "1")) {
if (isset($_REQUEST["x"]) && (@$_REQUEST["x"] === "1")) {
  $user_name = "9999999999991";
  $password = "dopakey1234";
}

if (isset($_REQUEST["a"])) {
  if ($_REQUEST["a"] == "0") {
    echo "<script>alert('ระงับการใช้งาน');</script>";
  } elseif ($_REQUEST["a"] == "1") {
    echo "<script>alert('รอการอนุมัติ');</script>";
  } elseif ($_REQUEST["a"] == "2") {
    echo "<script>alert('อนุมัติแล้ว ท่าสามารถเข้าสู่ระบบได้เลย');</script>";
  } elseif ($_REQUEST["a"] == "3") {
    echo "<script>alert('ไม่พบเลขประจำตัวประชาชน `กรุณาลงทะเบียนเข้าใช้งานระบบ`');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
  <title><?= $drug->app_name ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
  <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
  <link href="../../require/css/w3.css" rel="stylesheet">
  <link rel="stylesheet" href="../../require/fa/css/all.min.css">
  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Prompt', sans-serif;}
  </style>


  <?php
//      $drug->check_array($user, "ข้อมูลตัวแปร \$user <br>");

  $sql1 = "SELECT * FROM `db_user`.`type_org`  where   (`type_org_id`<'6')  ORDER BY `type_org_id` ";
//      echo $sql . "<hr>";
  $type_org = $drug->select_3($sql1, 'type_org_id', 'type_org');
//  $drug->check_array($type_org, "type_org");

  $sql2 = "SELECT `pcode`,`pname` FROM `db_user`.`province` ORDER BY `pcode`  ";
//      echo $sql . "<hr>";
  $province = $drug->select_3($sql2, 'pcode', 'pname');
//  $drug->check_array($type_org, "type_org");
  ?>
  <body style=" background: #c6d5eb;">
    <div class="w3-card-4 w3-animate-bottom">
      <header class="w3-container w3-theme-f1 w3-center w3-padding-20">
        <h3 class=" w3-margin-bottom text-center">
          <i class="fa fa-search" style="font-size:36px"></i>  ค้นหารายชื่อ
        </h3>
      </header>

      <br>
      <div class="w3-container">
        <div class="w3-card-4 w3-round-large">

          <header class="w3-container w3-light-grey">
            <h4>
              ระบุเงื่อนไขการค้นหา
            </h4>
          </header>
          <div class="w3-container">
            <form action="check2.php" method="POST">
              <hr>
              <label for="country_travel">เลขประจำตัวประชาชน</label>
              <input class="w3-input w3-border w3-round-large w3-margin-bottom" type="number" name="search" min="1000000000000" max="9999999999999" step="1" placeholder="เลขประจำตัวประชาชน" required>
              <hr>
              </div>
              <button class="w3-button w3-block w3-dark-grey" type="submit"><i class='fa fa-search'></i>  ค้นหา</button>
          </div>
          <br>
          <div class="row" align="text-center">
            <h4>
              <a href="index.php">กลับหน้าแรก</a>
            </h4>
          </div>

        </div>
      </div>
  </body>
</html>

