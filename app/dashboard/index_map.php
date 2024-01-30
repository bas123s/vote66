<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('display_startup_errors', '1');
date_default_timezone_set("Asia/Bangkok");

require("../../php_class/main_class.php");
$mc = new main_class();
// $mc->check_variable();
?>

<?php
require '../require/head_html.php';
?>



<!-- Header-->
<!-- <div id="section-content"></div> -->
<!-- About Section-->

<?php
// require 'map.php';
require 'result.php';
// require 'score.php';
?>



</main>
<script>
//    setTimeout(location.reload.bind(location), 60000);
</script>
<?php require '../require/footer_html.php' ?>