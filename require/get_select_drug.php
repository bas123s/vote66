<?php

//ini_set('display_errors', 1);
//ini_set('log_errors', 1);
session_start();
require("app_config.php");
require("../php_class/drugreport.php");
$drug = new drugreport();
require_once ("response.php");
$data_type = $_REQUEST['data_type'];
$data_value = $_REQUEST['data_value'];
$selected = @$_REQUEST['selected'];

//var_dump($data_type);

switch ($data_type) {

  case "comm_code":
    $sql1 = "SELECT * from `drugreport`.`mm_and_comm` WHERE (`lcode` = '" . $data_value . "') ORDER BY `commname`";
    $mm = $drug->select_3($sql1, 'comm_code', 'commname');
    $drug->list_option4($mm, "comm_code", "w3-select w3-border w3-margin-bottom", $selected, "", "กรุณาเลือกชุมชน");
  break;

  case "mcode":
    $sql1 = "SELECT `mcode`, concat(`mno`,' ',`mname`) as `mname` FROM `mm_and_comm` WHERE (`tcode` = '" . $data_value.'00' . "') ORDER BY `mname` ";
    $mm = $drug->select_3($sql1, 'mcode', 'mname');
    $drug->list_option4($mm, "mcode", "w3-select w3-border w3-margin-bottom", $selected, "", "กรุณาเลือกหมู่บ้าน");
    break;

  case "local":
    $drug->list_option4($local[$data_value], "lcode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('comm_code', this.value);\" ", "กรุณาเลือกเทศบาล(ถ้ามี)");
    break;

  case "tambol":
    $drug->list_option4($tambol[substr($data_value, 0, 2)][$data_value], "tcode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('mcode', this.value);\" ", "กรุณาเลือกตำบล");
    break;

  case "tambol_addr1":
    $drug->list_option4($tambol[substr($data_value, 0, 2)][$data_value], "tcode_addr1", "w3-select w3-border w3-margin-bottom", $selected, "", "กรุณาเลือกตำบล");
    break;

  case "tambol_addr2":
    $drug->list_option4($tambol[substr($data_value, 0, 2)][$data_value], "tcode_addr2", "w3-select w3-border w3-margin-bottom", $selected, "", "กรุณาเลือกตำบล");
    break;

  case "amphoe":
    $drug->list_option4($amphoe[$data_value], "acode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('tambol', this.value);\" ", "กรุณาเลือกอำเภอ");
    break;

  case "amphoe2":
    $drug->list_option4($amphoe[$data_value], "acode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('tambol', this.value);dochange('local', this.value);\" ", "กรุณาเลือกอำเภอ");
    break;

  case "amphoe_addr1":
    $drug->list_option4($amphoe[$data_value], "acode_addr1", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('tambol_addr1', this.value);\" ", "กรุณาเลือกอำเภอ");
    break;

  case "amphoe_addr2":
    $drug->list_option4($amphoe[$data_value], "acode_addr2", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('tambol_addr2', this.value);\" ", "กรุณาเลือกอำเภอ");
    break;

  case "province":
    $drug->list_option4($province, "pcode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('amphoe', this.value);\" ", "กรุณาเลือกจังหวัด");
    break;

  case "province2":
    $drug->list_option4($province, "pcode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('amphoe2', this.value);\" ", "กรุณาเลือกจังหวัด");
    break;

  case "province_addr1":
    $drug->list_option4($province, "pcode_addr1", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('amphoe_addr1', this.value);\" ", "กรุณาเลือกจังหวัด");
    break;

  case "province_addr2":
    $drug->list_option4($province, "pcode_addr2", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('amphoe_addr2', this.value);\" ", "กรุณาเลือกจังหวัด");
    break;

  default:// "province"
    $drug->list_option4($province, "pcode", "w3-select w3-border w3-margin-bottom", $selected, " onChange=\"dochange('amphoe', this.value);\" ", "กรุณาเลือกจังหวัด");
    break;
}

$drug->clear_conn();
?>