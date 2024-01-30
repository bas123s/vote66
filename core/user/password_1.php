<?php

echo "<pre>";
ini_set('display_errors', 1);
ini_set('log_errors', 1);
date_default_timezone_set("Asia/Bangkok");
//print_r($_REQUEST);
//print_r($_POST);
//echo"<hr>";
//echo "</pre>";
//exit();
session_start();
//require("../../require/app_config.php");
//$main_class->ckpwd("1100200025683", "dopakey1234");
//$main_class->cpwd("1100200025683", "dopakey1234xxxxsrjhsfjgdhjgdhjd");
//$main_class->reset("1100200025683");

if (isset($_POST['x'])) {
  require("../../php_class/main_class.php");
  $main_class = new main_class("conn_user_class");
  $x = $_POST['x'];
  switch ($x) {
    case "L"://login
//      echo "L<hr>";
//      if ($_POST['password'] === "dopakey1234") {
//        $url = "../user/password_change2.php";
//      } else {
      $url = "../../app/main/";
//      }
      $main_class->ck_pwd_1($_POST['username'], $_POST['password'], $url, $main_class->app_id);
      break;
    case "h"://change password
//      sleep(2);
      $main_class->ch_pwd($_SESSION[session_id()][$main_class->app_id]['mem_id'], $_POST['password'], "index.php?a=เปลี่ยนรหัสผ่านเรียบร้อยแล้ว กรุณาเข้าระบบใหม่");
      //echo "H";
      break;
    case "r"://reset password
      $main_class->reset($_SESSION[session_id()][$main_class->app_id]['mem_id']);
      //echo "R";
      break;
    default:
      session_destroy();
      header("location:../../index.php");
  }
} else {
  session_destroy();
  header("location:../../index.php");
}
?>