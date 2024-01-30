<?php
//$time_start = microtime(true);

$title = "ทดสอบ json";

require 'header.php';
require 'pp_list.php';
// $mc ชื่อ class ที่ต้องเรียกใช้  .
//
//$mc->check_array($data, "data");  เอาไว้เช็คตัวแปร data ที่ query มาแล้ว .
//
//$mc->check_array($user, "user");  เอาไว้เช็ค userที่ login เข้ามา .
//
//$mc->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
//$sql = "SELECT tcode FROM tambol WHERE acode = '1502'";
//// $sql = "SELECT * FROM province";
//$data = $mc->select_all($sql);
// echo $pp_color[rand(1,67)];
// $sql2 = "SELECT
// pcode,pname,acode,aname,tcode,tname,district,
// SUM(`1`) as `1`,SUM(`2`) as `2`,SUM(`3`) as `3`,SUM(`4`) as `4`,SUM(`5`) as `5`,
// SUM(`6`) as `6`,SUM(`7`) as `7`,SUM(`8`) as `8`,SUM(`9`) as `9`,SUM(`10`) as `10`,
// SUM(`11`) as `11`,SUM(`12`) as `12`,SUM(`13`) as `13`,SUM(`14`) as `14`,SUM(`15`) as `15`,
// SUM(`16`) as `16`,SUM(`17`) as `17`,SUM(`18`) as `18`,SUM(`19`) as `19`,SUM(`20`) as `20`
// FROM unit
// GROUP BY tcode";
// $sql2 = "SELECT * FROM unit LIMIT 10";
$sql2 = "SELECT * FROM view_district ;";
$data2 = $mc->select_all($sql2);
// var_dump($data);
$sql3 = "SELECT concat(`title`, ' ',`name`,' ',`surname`) as `name`, `pcode`,`election_district`,`number`,`pp_no`, `pp_name`, `number` FROM `election_district_list`;";
$array_id = ["pcode", "election_district", "number"];
$person = $mc->select_7($sql3, $array_id);
//$mc->check_array($person, $sql3);
//exit();
?>
<!-- ใช้ได้ -->
<script type="text/javascript" src="https://api.longdo.com/map/?key=dbda1fd1c15fc4556b73105e13e46ddb"></script>
<!-- ใช้ไม่ได้ -->
<!-- <script type="text/javascript" src="https://api.longdo.com/map/?key=86e86bc4bdeb1f7e75abc0e6936be883"></script> -->
<link rel="stylesheet" href="MarkerCluster.Default.css">
<script src="longdomap.markercluster-src.js"></script>
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
      min: 5,
      max: 10
    });

    layer();
  }
  function layer() {
<?php
$tmp = [];
foreach ($data2 as $key => $value) {
  for ($k = 1; $k <= 20; $k++) {
    $temp[$k] = $value[$k];
  }
  $number = array_search(max($temp), $temp);
//  $sql3 = "SELECT concat(`title`, ' ',`name`,' ',`surname`) as `name`, `pp_no`, `pp_name`, `number` FROM `election_district_list` WHERE pcode = '" . $value["pcode"] . "' AND election_district = '" . $value["district"] . "' AND number = '" . $number . "'";
//  $person = $mc->select_1($sql3);
  if (isset($person[$value["pcode"]][$value["district"]][$number])) {
    if (empty($person)) {
      $s = "if";
      $color = "rgba(231, 230, 230, 0.5)";
    } else {
      $s = "else";
      $color = $pp_color[$person[$value["pcode"]][$value["district"]][$number]['pp_no']];
    }
    ?>
    <?php
    $title = $value['pname'] . " เขต" . $value['district'];
    $detail = "ต." . $value['tname'] . " อ." . $value['aname'] . "<table style='margin-top:5px'><tr><td><img src='../img/" . @$person[$value["pcode"]][$value["district"]][$number]['pp_name'] . ".png' style='width:90px;'></td><td style='vertical-align: text-top; margin-top:10px;'><br>พรรค : " . @$person[$value["pcode"]][$value["district"]][$number]['pp_name'] . "<br>ชื่อผู้สมัคร : " . @$person[$value["pcode"]][$value["district"]][$number]['name'] . "<br>หมายเลขผู้สมัคร : " . @$person[$value["pcode"]][$value["district"]][$number]['number'] . " </td></tr></table><br><input onclick='zm(" . $value["pcode"] . ")' type='button' value='ดูข้อมูลเพิ่มเติม'>'";
    ?>
        var group_<?php echo $value['tcode']; ?> = new longdo.Overlays.Object('<?php echo $value["tcode"] . "00"; ?>', 'IG', {
          title: "<?php echo $title; ?>",
          detail: "<?php echo $detail; ?>",
          size: {width: 300, height: 200},
          fillColor: "<?php echo $color; ?>",
          lineColor: 'rgba(0, 0, 0, 0)',
          lineWidth: 1
        });
        map.Overlays.load(group_<?php echo $value['tcode']; ?>);
  <?php }
} ?>
  }
  window.onload = init();
</script>
<script type="text/javascript">function zm(val) {
    window.location.assign("report.php?pcode=" + val);
  }</script>



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