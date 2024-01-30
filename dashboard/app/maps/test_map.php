<?php
//$time_start = microtime(true);

$title = "ทดสอบ json";

require 'header.php';

// $mc ชื่อ class ที่ต้องเรียกใช้  .
//
//$mc->check_array($data, "data");  เอาไว้เช็คตัวแปร data ที่ query มาแล้ว .
//
//$mc->check_array($user, "user");  เอาไว้เช็ค userที่ login เข้ามา .
//
//$mc->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
$sql = "SELECT * FROM province";
$data = $mc->select_all($sql);
// var_dump($data);
?>
<link rel="stylesheet" href="markercluster/dist/MarkerCluster.Default.css">
<script src="markercluster/dist/longdomap.markercluster-src.js"></script>
<div id="map"></div>

<script>
  var map;
  let layer1 = [];
 
  function init() {

    map = new longdo.Map({
      placeholder: document.getElementById('map'),
      language: 'th',
      location: {
        lon: 101.8540857732296,
        lat: 12.747958395065107
      },
      lastView: false,
      zoom: 6,
    });


    map.Layers.setBase(longdo.Layers.POLITICAL);
    map.Ui.DPad.visible(false);
    map.Ui.Zoombar.visible(false);
    map.Ui.Geolocation.visible(false);
    map.Ui.Toolbar.visible(false);
    map.Ui.LayerSelector.visible(false);
    map.Ui.Fullscreen.visible(false);
    map.Ui.Scale.visible(false);


    map.zoomRange({
      min: 6,
      max: 8
    });

  layer();
}
function layer(){
  <?php foreach ($data as $key => $value) { ?>
    // console.log("test");
    var province;

    province = new longdo.Overlays.Object('<?php echo $value["pcode"]; ?>', 'IG', {
      detail: "สำรวจ ครัวเรือน",
      lineColor: "rgba(0, 143, 251, 0.9)",
      fillColor: 'rgba(0, 143, 251, 0.6)',
      lineWidth: 1
    });
    map.Layers.add(longdo.Layers.POLITICAL);
    map.Overlays.load(province);
  <?php } ?>
} 
window.onload = init();
</script>



<?php
//$mc->check_array($data, "data");
// require 'footer.php';
//
//$time_end = microtime(true);
//
////dividing with 60 will give the execution time in minutes otherwise seconds
//$execution_time = ($time_end - $time_start) / 60;
//
////execution time of the script
//echo '<b>ใช้เวลาประมวลผลทั้งหมด : </b>' . number_format((float) $execution_time, 10) . ' นาที';
//// if you get weird results, use number_format((float) $execution_time, 10)
?>