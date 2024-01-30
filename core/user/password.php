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
//$mc->ckpwd("1100200025683", "dopakey1234");
//$mc->cpwd("1100200025683", "dopakey1234xxxxsrjhsfjgdhjgdhjd");
//$mc->reset("1100200025683");

if (isset($_POST['x'])) {
  require_once ("../../php_class/main_class.php");
  $mc = new main_class("conn_user_class");
  $x = $_POST['x'];
  switch ($x) {
    case "L"://login
//      echo "L<hr>";
//      if ($_POST['password'] === "dopakey1234") {
//        $url = "../user/password_change2.php";
//      } else {
      $url = "../../app/main/index.php";
//      }
//      $mc->check_variable();
//      echo $url;
//      exit();
      $mc->ck_pwd($_POST['username'], $_POST['password'], $url, $mc->app_id);
      break;
    case "h"://change password
//      $mc->check_variable();
////      echo $url;
//      exit();
//      sleep(2);
      $mc->ch_pwd($_SESSION[session_id()][$mc->app_id]['mem_id'], $_POST['password'], "index.php?a=เปลี่ยนรหัสผ่านเรียบร้อยแล้ว กรุณาเข้าระบบใหม่");
      //echo "H";
      break;
    case "r"://reset password
      $mc->reset($_SESSION[session_id()][$mc->app_id]['mem_id']);
      //echo "R";
      break;
    default:
      session_destroy();
      header("location: ../../");
  }
} else {
  session_destroy();
  header("location: ../../");
}
?>