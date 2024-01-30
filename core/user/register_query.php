<?php

session_start();

ini_set('display_errors', 1);
ini_set('log_errors', 1);

require("../../php_class/main_class.php");
$mc = new main_class("conn_main_class");
//require_once ("../../require/response2.php");
$title = "บันทึก/แก้ไข ประเภท";
$mc->table_name = "user";
$debug = 0; // 1=เปิด debug , 0 ปิด debug
//$mc->check_variable();
//
//exit();
$postaction = $_POST["action"];
//$acode = $_POST["acode"];
//$sql1 = "SELECT * FROM `amphoe`  where   (`acode`='" . $acode . "')  ";
////      echo $sql . "<hr>";
//$amphoe = $mc->select_1($sql1);


if ($postaction === "INSERT") {
  $_POST["password"] = $mc->hash($_POST["password"]);
  $_POST["mem_status"] = "2";
  $_POST["app_id"] = $mc->app_id;
  $_POST["last_active"] = date('Y-m-d H:i:s');
  $mc->basic_query($debug, "INSERT");

  $action = "ลงทะเบียนผู้ใช้งานเรียบร้อยแล้ว";
//  $action2 = "&adddata=success";
//  unset($_POST);
} else {
  $action = "ท่านไม่สามารถลงทะเบียนได้";
}

$link = "index.php?a=" . $action;
//echo "<hr>" . $link;
header("Location: " . $link);
