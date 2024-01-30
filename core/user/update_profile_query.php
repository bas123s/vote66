<?php

//session_start(); //เริ่ม session
require '../../require/head_php.php';

//$mc->check_variable();
//$mc->check_array($_POST, "post");
$mc->table_name = "user";

if ($user["privilege"] > 2) {
  $sql2 = "SELECT * FROM `amphoe`  where   (`acode`='" . $_POST["acode"] . "') ";
//echo $sql2 . "<hr>";
  $amphoe2 = $mc->select_1($sql2);
  $_POST["pcode"] = $amphoe2["pcode"];
  $_POST["pname"] = $amphoe2["pname"];
  $_POST["aname"] = $amphoe2["aname"];
} else {
  $sql2 = "SELECT * FROM `mm`  where   (`mcode`='" . $_POST["mcode"] . "') ";
//echo $sql2 . "<hr>";
  $amphoe2 = $mc->select_1($sql2);
  $_POST["pcode"] = $amphoe2["pcode"];
  $_POST["pname"] = $amphoe2["pname"];
  $_POST["acode"] = $amphoe2["acode"];
  $_POST["aname"] = $amphoe2["aname"];
  $_POST["tcode"] = $amphoe2["tcode"];
  $_POST["tname"] = $amphoe2["tname"];
  $_POST["lcode"] = $amphoe2["lcode"];
  $_POST["lname"] = $amphoe2["lname"];
  $_POST["mname"] = $amphoe2["mname"];
}

$mem_id = $_REQUEST["mem_id"];
$sql3 = "SELECT * FROM `user` WHERE `mem_id` = '" . $mem_id . "' ";
$data3 = $mc->select_1($sql3);
//$mc->check_array($data3, "data3");

foreach ($data3 as $key => $value) {
  if (!isset($_POST[$key])) {
    $_POST[$key] = $value;
  }
}
//$mc->check_array($_POST, "post");
//exit();
if ($mc->basic_query("1", "UPDATE")) {
  $link = "index.php?a=แก้ไขข้อมูลเรียบร้อยแล้ว กรุณาเข้าสู่ระบบใหม่";
  session_destroy();
} else {
  $link = "update_profile.php?a=ไม่สามารถแก้ไขข้อมูลได้";
}
header("Location: " . $link);
?>
