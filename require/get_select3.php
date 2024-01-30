<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('display_startup_errors', '1');

require("../php_class/main_class.php");
$mc = new main_class();
require_once ("response2.php");
$data_type = $_REQUEST['data_type'];
$data_type2 = explode("_", $data_type);
$data_value = $_REQUEST['data_value'];
$selected = @$_REQUEST['selected'];
$id = @$_REQUEST['id'];

//var_dump($data_type);
//echo "<hr>";
//var_dump($data_value);
//echo "<hr>";

switch ($data_type2[0]) {

  case "tambol":
  if ($data_value == "") {
    ?>
    <select class="form-select" name="tcode" >
      <option value="" disabled selected>---- กรุณาเลือกอำเภอก่อน ----</option>
    </select>
    <?php

    break;
  } else {
    $mc->list_option5($tambol[substr($data_value, 0, 2)][$data_value], "caught_tcode", "form-select ", $selected, " ", "กรุณาเลือกตำบล");
//   $mc->list_option5($tambol[substr($data_value, 0, 2)][$data_value], "tcode", "form-select ", $selected, " ", "กรุณาเลือกตำบล");
  }
  break;

  case "amphoe":

   $mc->list_option5(@$amphoe[$data_value], "caught_acode", "form-select ", $selected, " onChange=\"dochange3('tambol_c', this.value,'',".$id.");\" ", "กรุณาเลือกอำเภอ");


  break;

  default:// "province"

   $mc->list_option5($province, "caught_pcode", "form-select ", $selected, " onChange=\"dochange3('amphoe_c', this.value,'',".$id.");\" ", "กรุณาเลือกจังหวัด");

  break;
}

$mc->clear_conn();
?>