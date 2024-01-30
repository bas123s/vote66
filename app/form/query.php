<?php

//session_start(); //เริ่ม session
require '../../require/head_php.php';
$mc->table_name = "unit";
//$mc->check_variable(); //เอาไว้เช็คข้อมูลที่ส่งมา
//exit();

if ($_POST["1n"]==$_POST["2n"]||$_POST["1n"]==$_POST["3n"]||$_POST["1n"]==$_POST["4n"]||$_POST["1n"]==$_POST["5n"]) {
  $duplicate = "1";
}

if ($duplicate!="1") {

  $sql = "SELECT * FROM `unit` WHERE `district` = '".$_POST["district"]."' AND `ecode` = '".$_POST["ecode"]."' AND `unit` = '".$_POST["unit"]."'; ";
  $data = $mc->select_1($sql);

  if (@$data["id"]!="") {
    $_POST["action"] = "UPDATE";
    $_POST["id"] = $data["id"];

    $_POST["1"] = 0;
    $_POST["2"] = 0;
    $_POST["3"] = 0;
    $_POST["4"] = 0;
    $_POST["5"] = 0;
    $_POST["6"] = 0;
    $_POST["7"] = 0;
    $_POST["8"] = 0;
    $_POST["9"] = 0;
    $_POST["10"] = 0;
    $_POST["11"] = 0;
    $_POST["12"] = 0;
    $_POST["13"] = 0;
    $_POST["14"] = 0;
    $_POST["15"] = 0;
    $_POST["16"] = 0;
    $_POST["17"] = 0;
    $_POST["18"] = 0;
    $_POST["19"] = 0;
    $_POST["20"] = 0;

    $mc->basic_query("0", $_POST["action"]);

    $text = "a=บันทึก/แก้ไขข้อมูลเรียบร้อยแล้ว";
  } else {

    $sql2 = "SELECT * FROM `unit_master` WHERE `ecode` = '".$_POST["ecode"]."'; ";
    $data2 = $mc->select_1($sql2);

    $_POST["pcode"] = $data2["pcode"];
    $_POST["pname"] = $data2["pname"];
    $_POST["acode"] = $data2["acode"];
    $_POST["aname"] = $data2["aname"];
    $_POST["rcode"] = $data2["rcode"];
    $_POST["rname"] = $data2["rname"];
    $_POST["tcode"] = $data2["tcode"];
    $_POST["tname"] = $data2["tname"];
    $_POST["ecode"] = $data2["ecode"];
    $_POST["ename"] = $data2["ename"];
    $_POST["type"] = $data2["type"];

    $_POST["action"] = "INSERT";

    $_POST["1"] = 0;
    $_POST["2"] = 0;
    $_POST["3"] = 0;
    $_POST["4"] = 0;
    $_POST["5"] = 0;
    $_POST["6"] = 0;
    $_POST["7"] = 0;
    $_POST["8"] = 0;
    $_POST["9"] = 0;
    $_POST["10"] = 0;
    $_POST["11"] = 0;
    $_POST["12"] = 0;
    $_POST["13"] = 0;
    $_POST["14"] = 0;
    $_POST["15"] = 0;
    $_POST["16"] = 0;
    $_POST["17"] = 0;
    $_POST["18"] = 0;
    $_POST["19"] = 0;
    $_POST["20"] = 0;

    $_POST["rec_pid"] = $user["pid"];
    $_POST["rec_name"] =  $user["username"];

    $_POST["create_date"] = date("Y-m-d");

    $text = "a=บันทึกข้อมูลเรียบร้อยแล้ว";
  }

  $_POST[$_POST["1n"]] = $_POST["1p"];
  $_POST[$_POST["2n"]] = $_POST["2p"];
  $_POST[$_POST["3n"]] = $_POST["3p"];
  $_POST[$_POST["4n"]] = $_POST["4p"];
  $_POST[$_POST["5n"]] = $_POST["5p"];

  $_POST["update_date"] = date("Y-m-d");

  $mc->basic_query("0", $_POST["action"]);

} else {
  $text = "a=หมายเลขผู้สมัครซ้ำ ไม่สามารถบันทึกข้อมูลได้";
}

$link = "1.php?";

$link .= $text;

header("Location: " . $link); //ไปหน้าถัดไป

?>