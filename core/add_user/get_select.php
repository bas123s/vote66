<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../../php_class/main_class.php");
$mc = new main_class("conn_main_class");
require ("response.php");
$data_value = $_REQUEST['data_value'];
$selected = @$_REQUEST['selected'];
$id = @$_REQUEST['id'];
$user = $_SESSION[session_id()][$mc->app_id];
$option_css = "form-select ps-1";

//var_dump($data_type);

if ($user["privilege"] !== "9") {
  $disabled = " readonly ";
} else {
  $disabled = "  ";
}

switch ($id) {

  case "province":
    $mc->list_option4($province, "pcode", $option_css, $selected, " onChange=\"dochange('amphoe', this.value,'');\" " . $disabled, "กรุณาเลือกจังหวัด");
    break;

  case "department":
    $sql3 = "SELECT `department_id`, `department` FROM `department` WHERE `ministry_id` = '" . $data_value . "' ;";
    $department = $mc->select_3($sql3, 'department_id', 'department');
//    $mc->list_option5($department, "department_id", $option_css, $selected, " ", "กรุณาเลือกกรม");
    $mc->list_option4($department, "department_id", $option_css, $selected, " onChange=\"dochange('division', this.value,''); dochange('app_privilege', this.value,''); \" " . $disabled, "กรุณาเลือกกรม");
    break;

  case "ministry":
    $sql3 = "SELECT `ministry_id`, `ministry` FROM `ministry`;";
    $ministry_id = $mc->select_3($sql3, 'ministry_id', 'ministry');
    $mc->list_option4($ministry_id, "ministry_id", $option_css, $selected, " onChange=\"dochange('department', this.value,'');\" " . $disabled, "กรุณาเลือกกระทรวง");
    break;

  case "tambol":
    $mc->list_option4(@$amphoe[$data_value], "tcode", $option_css, $selected, " ", "กรุณาเลือกตำบล");
    break;

  case "amphoe":
    if ($user["privilege"] < "6") {
      $disabled = " readonly ";
    } else {
      $disabled = "  ";
    }
    $mc->list_option4(@$amphoe[$data_value], "acode", $option_css, $selected, " onChange=\"dochange('tambol', this.value,'');\"  " . $disabled, "กรุณาเลือกอำเภอ");
    break;

  case "app_privilege":
    $sql3 = "SELECT `app_privilege_id`, `app_privilege_name` FROM `app_privilege` WHERE `ministry_id` = '" . $data_value . "' ;";
    $app_privilege = $mc->select_3($sql3, 'app_privilege_id', 'app_privilege_name');
//    $mc->list_option5($department, "department_id", $option_css, $selected, " ", "กรุณาเลือกกรม");
    $mc->list_option4($app_privilege, "app_privilege_id", $option_css, $selected, " ", "กรุณาเลือกสิทธิ์การเข้าใช้งาน");
    break;

  default: // division
//  case "division":
    if ($user["privilege"] < "6") {
      $disabled = " readonly ";
    } else {
      $disabled = "  ";
    }
    $sql3 = "SELECT `division_id`, `division` FROM `division` WHERE `department_id` = '" . $data_value . "' ;";
    $department = $mc->select_3($sql3, 'division_id', 'division');
    $mc->list_option4($department, "division_id", $option_css, $selected, " " . $disabled, "กรุณาเลือกหน่วยงาน");
    break;
}

$mc->clear_conn();
?>