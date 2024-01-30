<?php

echo "<pre>";
ini_set('display_errors', 1);
ini_set('log_errors', 1);
date_default_timezone_set("Asia/Bangkok");
//echo "</pre>";
print_r($_REQUEST);
//print_r($_POST);
echo"<hr>";
//exit();

require("../../php_class/main_class.php");
$mc = new main_class("conn_user_class");

$url = "../../app/main/";
//$mc->ck_pwd($_POST['username'], $_POST['password'], $url, $mc->app_id);

$sql = "SELECT * "
        . "FROM `user` "
        . "WHERE ("
        . "(`pid`='" . $_REQUEST["pid"] . "')"
        . " and (`app_id`='03170005')"
        . " and (`mem_status`='2')"
        . ")  limit 1 ;";
//    echo $sql;
$user_data = $mc->select_1($sql);

if (!empty($user_data)) {
  echo "not empty";
  $mc->check_array($user_data, "user_data");
} else {
  echo "empty";
  $mc->check_array($user_data, "user_data");
}


if ($_POST["chx"] == "1") {
  $mc->check_server($user_data['pcode']);
}

$mc->last_active($user_data['pid']);
$mc->set_session($url, $user_data, session_id());

$mc->check_variable();
?>