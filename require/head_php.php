<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('display_startup_errors', '1');
date_default_timezone_set("Asia/Bangkok");

require("../../php_class/main_class.php");
$mc = new main_class();
$mc_variable = $mc->get_variable();
$strMonth = $mc->strMonth;
//require_once ("../../require/response2.php");
$mc->check_session(session_id(), $mc->app_id);
//echo "<hr>" . session_id() . " => " . $mc->app_id . "<hr>";
$user = $_SESSION[session_id()][$mc->app_id];
ksort($user);
$app_name = @$mc->app_name;
?>
