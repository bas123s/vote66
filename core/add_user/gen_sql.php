<?php

session_start();
error_reporting(E_ALL); //แสดง error ทั้งหมด
ini_set('display_errors', 1);
ini_set('log_errors', 1);

require("../../php_class/main_class.php"); //เรียกใช้ไฟล์คลาส
$mc = new main_class("conn_main_class"); // สร้าง connection ใหม่
$debug = 1; // 1=เปิด debug , 0 ปิด debug
$sql = "SELECT * FROM `election_district` where `pcode` like '4%' ;";

$data = $mc->select_all($sql);
$gen_sql = "";
foreach ($data as $key => $value) {
  for ($i = 1; $i <= $value["number_stations"]; $i++) {
    $gen_sql .= "<br>"
            . "INSERT INTO `vote66`.`unit` (`pcode`, `election_district`, `unit_number`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`) <br>"
            . "VALUES ('" . $value["pcode"] . "', '" . $value["election_district"] . "', '" . $i . "', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0); ";
  }
}

echo $gen_sql;
?>