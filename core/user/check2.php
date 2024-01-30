<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../../require/app_config.php");
require("../../php_class/drugreport.php");
$drug = new drugreport();
$search = @$_POST["search"];

//$sql = "SELECT * FROM `db_user`.`member` WHERE `pid`= '" . $search . "' ;";
//$data = $drug->select_1($sql);
$data = $drug->check_user_status($search);
$drug->check_variable();
$drug->check_array($data, "data");
$link = "check.php?a=" . $data;
header("Location: " . $link);
/*
  if ($data["pid"] == null) {
  $link = "check.php?a=3";
  header("Location: " . $link);
  } else {
  $sql2 = "SELECT * FROM `db_user`.`member_privilege` WHERE mem_id = " . $data["mem_id"] . " ORDER BY mp_id DESC";
  $data2 = $drug->select_1($sql2);
  $link = "check.php?a=" . $data2["mem_status_app"];
  header("Location: " . $link);
  }
 *
 */
?>