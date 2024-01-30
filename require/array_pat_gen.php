<?php

session_start();
ini_set('display_errors', 1);
ini_set('log_errors', 1);
require("../php_class/main_class.php");
$mc = new main_class();

$sql1 = "SELECT `pcode`,`pname` FROM `province` where `pcode` ORDER BY `pname`;";
$data1 = $mc->select_3($sql1, 'pcode', 'pname');
//$mc->check_array($data1, $sql1);

$sql2 = "SELECT `pcode`,`acode`,`aname` FROM `amphoe` ORDER BY `pname`,`aname`;";
$data2 = $mc->select_4($sql2, 'pcode', 'acode', 'aname');
//$mc->check_array($data2, $sql2);

$sql3 = "SELECT * FROM `tambol` ORDER BY `pname`,`aname`,`tname`;";
$data3 = $mc->select_8($sql3, ['pcode', 'acode', 'tcode'], 'tname');
//$mc->check_array($data3, $sql3);

$sql4 = "SELECT * FROM `mm` ORDER BY `pname`,`aname`,`tname`,`mname`;";
$data4 = $mc->select_9($sql4, ['pcode', 'acode', 'tcode', 'mcode'], 'mname');
//$mc->check_array($data4, $sql4);

file_put_contents("response2.php", '<?php $province=' . var_export($data1, true) . '; $amphoe=' . var_export($data2, true) . '; $tambol=' . var_export($data3, true) . '; $mm=' . var_export($data4, true) . '; ?>');
echo "complete";
?>