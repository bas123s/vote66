<?php

session_start();
error_reporting(E_ALL); //แสดง error ทั้งหมด
ini_set('display_errors', 1);
ini_set('log_errors', 1);

require("../../php_class/main_class.php"); //เรียกใช้ไฟล์คลาส
$mc = new main_class("conn_main_class"); // สร้าง connection ใหม่
$debug = 1; // 1=เปิด debug , 0 ปิด debug
//$mc->check_variable();  // เอาไว้เช็คค่าตัวแปร GET , POST , REQUEST ที่ส่งมา
//exit();
$mc->table_name = "user"; //กำหนดชื่อตารางที่จะบันทึกข้อมูล
//if ($_POST["ministry_id"] != 15) {
//  $sql = "SELECT * FROM `arrest`.`view_mdd`  WHERE `division_id` = '" . $_POST["division_id"] . "' ;";
//} else {
//  $sql = "SELECT * FROM `arrest`.`amphoe`  WHERE `acode` = '" . $_POST["acode"] . "' ;";
//}
//if (!isset($_POST["division_id"]) OR $_POST["division_id"] == "") {
//  $condition = "`department_id` = '" . $_POST["department_id"] . "' ";
//} else {
//  $condition = "`division_id` = '" . $_POST["division_id"] . "' ";
//}

if (isset($_POST["division_id"])) {
  $condition = "`division_id` = '" . $_POST["division_id"] . "' ";
} else {
  $condition = "`acode` = '" . $_POST["acode"] . "' AND `department_id` = '" . $_POST["department_id"] . "' ";
}

$sql = "SELECT * FROM `arrest`.`view_mdd`  WHERE " . $condition . " ;";

echo $sql;
$data = $mc->select_1($sql);

foreach ($data as $key => $value) {
  $_POST[$key] = $value;
}
//$_POST["pcode"] = $data["pcode"];
//$_POST["pname"] = $data["pname"];
//$_POST["acode"] = $data["acode"];
//$_POST["aname"] = $data["aname"];
////if ($_POST["ministry_id"] == 15) {
////  $_POST["ministry_id"] = $_POST["ministry_id"];
////  // $_POST["ministry"] = $user["ministry"];
////  $_POST["department_id"] = $_POST["department_id_a"];
////  $_POST["department"] = $_POST["department_a"];
////  $_POST["division_id"] = $_POST["division_id_a"];
////  $_POST["division"] = "ที่ทำการปกครอง" . $_POST["division_a"];
////} else {
//$_POST["ministry_id"] = $data["ministry_id"];
//$_POST["ministry"] = $data["ministry"];
//$_POST["department_id"] = $data["department_id"];
//$_POST["department"] = $data["department"];
//$_POST["division_id"] = $data["division_id"];
//$_POST["division"] = $data["division"];
//}
//$mc->check_variable();
//
//exit();
if ($_POST["action"] == "INSERT") {
  $_POST["app_id"] = $mc->app_id;
  if ($_POST["ministry_id"] != 15) {
    $_POST["password"] = "e406bb0da445882fb812666cdb3cb47f896ef828b7eb0e34bbcf910603a898e7";
  } else {
    $_POST["password"] = "e83b6debc7e954674419ee05e9ba4107c3ad44d4d59e24d34329bb0c6f06d6d5";
  }
  $_POST["mem_status"] = "2";
} else {
  $post = $_POST;
  $sql = "SELECT * FROM `arrest`.`user`  WHERE `pid` = '" . $_POST["pid"] . "' ;";
  $_POST = $mc->select_1($sql);

  foreach ($post as $key => $value) {
    $_POST[$key] = $value;
  }
}


if (!isset($_POST["app_privilege_id"])) {
  $_POST["privilege"] = "1";
} else {
  $_POST['privilege'] = $_REQUEST['app_privilege_id'];
}

if ($mc->basic_query($debug, $_POST["action"])) {
  $a = "บันทึกข้อมูลเรียบร้อย";
} else {
  $a = "ไม่สามารถบันทึกข้อมูลได้";
}

$link = "form.php?a=" . $a;
//echo $link;
header("Location: " . $link);
?>