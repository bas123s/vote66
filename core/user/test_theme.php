<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
session_start();
require("../../php_class/main_class.php");
$main_class = new main_class();
//$main_class->check_variable();
if (isset($_REQUEST["debug_mode"]) && (@$_REQUEST["debug_mode"] === "1")) {
  $user_name = "9999999999991";
  $password = "dopakey1234";
}
?>
<!DOCTYPE html>
<html>
  <title><?= $main_class->app_name ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
  <!--<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">-->
  <link href="../../require/css/google_fonts.css?family=Prompt&display=swap" rel="stylesheet">
  <!--<link rel="stylesheet" href="../../require/css/w3-colors-ios.css">-->

  <link href="../../require/css/w3.css" rel="stylesheet">
  <link rel="stylesheet" href="../../require/fa/css/all.min.css">
  <!--<link rel="stylesheet" href="../../require/css/w3-theme-dark-grey.css">-->
  <link rel="stylesheet" href="<?= $main_class->app_theme ?>">
  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Prompt', sans-serif;}
  </style>
  <!--<body style=" background: #c6d5eb;">-->
  <body class="w3-theme-l3">
    <div>
      <div class="">
        <button class="w3-button w3-block w3-theme-d5 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-d4 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-d3 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-d2 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-d1 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-l1 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-l2 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-l3 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-l4 w3-xxxlarge ">&nbsp;</button>
        <button class="w3-button w3-block w3-theme-l5 w3-xxxlarge ">&nbsp;</button>
      </div>
    </div>
  </body>
</html>

