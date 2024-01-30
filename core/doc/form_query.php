<?php

//session_start(); //เริ่ม session
require '../../require/head_php.php';
$mc->table_name = "doc";
//$mc->check_variable();    //เอาไว้เช็คข้อมูลที่ส่งมา
//$mc->check_array($_FILES, "files");



$upload_status = "prepre";
$targetfolder = "uploads/";
$targetfolder = $targetfolder . basename($_FILES['file']['name']);
$ok = 1;
$file_type = $_FILES['file']['type'];
if ($file_type == "application/pdf") {
  if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
//    echo "The file " . basename($_FILES['file']['name']) . " is uploaded";
    $_POST["file"] = basename($_FILES['file']['name']);
    $upload_status = "complete";
  } else {
//    echo "Problem uploading file";
    $upload_status = "error_upload";
  }
} else {
//  echo "You may only upload PDFs<br>";
  $upload_status = "error_file_type";
}

//exit();
if (($_POST["action"] === "UPDATE") && ($upload_status === "complete")) {
  if ($mc->basic_query("0", "UPDATE")) {
    $link = "index.php?a=แก้ไขข้อมูล " . $_REQUEST["gun_id"] . " เรียบร้อยแล้ว";
  } else {
    $link = "index.php?a=ไม่สามารถแก้ไขข้อมูล " . $_REQUEST["gun_id"] . " ได้";
  }
} else {
  if ($mc->basic_query("0", "INSERT")) {
    $link = "index.php?a=เพิ่มข้อมูลเรียบร้อยแล้ว";
  } else {
    $link = "index.php?a=ไม่สามารถเพิ่มข้อมูลได้";
  }
}
header("Location: " . $link); //ไปหน้าถัดไป
?>
