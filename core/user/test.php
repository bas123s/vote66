<?php

echo "<pre>";
ini_set('log_errors', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//echo __DIR__;

require_once ("../../php_class/main_class.php");
$mc = new main_class("conn_user_class");
//$mc->check_variable();
//$_POST["username"] = "3102002472231";
//$data_array = [];
$url = "http://172.28.254.61/api/personal_linkage/EForeignAPI/EForeign@12ce0170743ab8fa5e307d3659e7646c/" . $_REQUEST["username"];

//$response = file_get_contents("http://172.28.254.61/api/personal_linkage/EForeignAPI/EForeign@12ce0170743ab8fa5e307d3659e7646c/3102002472231");
$response = file_get_contents($url);
$response = json_decode($response);
$mc->check_array($response, $url);
//print_r($response);
echo "<br><br><br><br><hr>" . $response->data->PN_NAME . " " . $response->data->PER_NAME . " " . $response->data->PER_SURNAME;
echo "<hr>" . $response->data->PN_ENG_NAME . " " . $response->data->PER_ENG_NAME . " " . $response->data->PER_ENG_SURNAME;
echo "<hr>" . $response->data->PL_NAME . $response->data->LEVEL_NAME;
echo "<hr>" . $response->data->ORG_NAME . " " . $response->data->ORG_1_NAME;
//$date1 = date('Y-m-d');
//$date2 = date($response->data->STARTDATE);
//$date1 = date_create($response->data->STARTDATE);
//$start_date = "2008-09-03 00:00:00";
$start_date = @$response->data->STARTDATE . " 00:00:00";
$date = new DateTime($start_date);
$now = new DateTime();
//echo"<hr>" . $date . "<hr>";
echo "<hr>" . $date->diff($now)->format("%Y ปี %m เดือน %d วัน");

$sql = "SELECT `thai_name`, `eng_name` FROM `dopa_directory`.`position_all` WHERE `thai_name` LIKE '" . $response->data->PL_NAME . "%" . $response->data->LEVEL_NAME . "' ;";
$data = $mc->select_1($sql);
$mc->check_array($data, $sql);
?>