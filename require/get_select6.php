<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../php_class/main_class.php");
$mc = new main_class();
require_once ("../require/response2.php");
$data_type = $_REQUEST['data_type'];
$data_value = $_REQUEST['data_value'];
$selected = @$_REQUEST['selected'];

//var_dump($data_type);

switch ($data_type) {

  default:// "province"
  $sql3 = "SELECT * FROM `stock` where `stock_status_id` = '1' order by `stock_id`;";
$data3 = $mc->select_3($sql3, "stock_id", "stock_serial");
    $mc->list_option6($data3, "stock_serial", "w3-input w3-margin-bottom", @$data["stock_serial"], "", "กรุณาเลือกหมายเลขทะเบียนปืน");
    break;
}

$mc->clear_conn();
?>