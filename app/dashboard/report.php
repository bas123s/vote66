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

$pcode = @$_REQUEST["pcode"];

$pp_color = [
    "1" => "rgba(155,155,154)",
    "2" => "rgba(155,155,154)",
    "3" => "rgba(155,155,154)",
    "4" => "rgba(155,155,154)",
    "5" => "rgba(155,155,154)",
    "6" => "rgba(155,155,154)",
    "7" => "rgba(0, 0, 204, 0.9)",
    "8" => "rgba(155,155,154)",
    "9" => "rgba(155,155,154)",
    "10" => "rgba(155,155,154)",
    "11" => "rgba(204, 153, 0, 0.9)",
    "12" => "rgba(155,155,154)",
    "13" => "rgba(155,155,154)",
    "14" => "rgba(204, 153, 0, 0.9)",
    "15" => "rgba(112, 173, 71, 0.9)",
    "16" => "rgba(155,155,154)",
    "17" => "rgba(155,155,154)",
    "18" => "rgba(255, 0, 255, 0.9)",
    "19" => "rgba(155,155,154)",
    "20" => "rgba(155,155,154)",
    "21" => "rgba(255, 255, 0, 0.9)",
    "22" => "rgba(0, 0, 255, 0.9)",
    "23" => "rgba(155,155,154)",
    "24" => "rgba(84, 130, 53, 0.9)",
    "25" => "rgba(204, 0, 0, 0.9)",
    "26" => "rgba(51, 153, 255, 0.9)",
    "27" => "rgba(155,155,154)",
    "28" => "rgba(155,155,154)",
    "29" => "rgba(255, 0, 0, 0.9)",
    "30" => "rgba(155,155,154)",
    "31" => "rgba(255, 102, 0, 0.9)",
    "32" => "rgba(51, 51, 204, 0.9)",
    "33" => "rgba(155,155,154)",
    "34" => "rgba(155,155,154)",
    "35" => "rgba(155,155,154)",
    "36" => "rgba(155,155,154)",
    "37" => "rgba(51, 51, 255, 0.9)",
    "38" => "rgba(155,155,154)",
    "39" => "rgba(155,155,154)",
    "40" => "rgba(155,155,154)",
    "41" => "rgba(155,155,154)",
    "42" => "rgba(155,155,154)",
    "43" => "rgba(155,155,154)",
    "44" => "rgba(155,155,154)",
    "45" => "rgba(155,155,154)",
    "46" => "rgba(155,155,154)",
    "47" => "rgba(155,155,154)",
    "48" => "rgba(155,155,154)",
    "49" => "rgba(155,155,154)",
    "50" => "rgba(155,155,154)",
    "51" => "rgba(155,155,154)",
    "52" => "rgba(155,155,154)",
    "53" => "rgba(155,155,154)",
    "54" => "rgba(155,155,154)",
    "55" => "rgba(155,155,154)",
    "56" => "rgba(155,155,154)",
    "57" => "rgba(155,155,154)",
    "58" => "rgba(155,155,154)",
    "59" => "rgba(155,155,154)",
    "60" => "rgba(155,155,154)",
    "61" => "rgba(155,155,154)",
    "62" => "rgba(155,155,154)",
    "63" => "rgba(155,155,154)",
    "64" => "rgba(155,155,154)",
    "65" => "rgba(155,155,154)",
    "66" => "rgba(155,155,154)",
    "67" => "rgba(155,155,154)"
];

$sql = "SELECT pcode,pname,district,
                sum(`1`) as p_1,
                sum(`2`) as p_2,
                sum(`3`) as p_3,
                sum(`4`) as p_4,
                sum(`5`) as p_5,
                sum(`6`) as p_6,
                sum(`7`) as p_7,
                sum(`8`) as p_8,
                sum(`9`) as p_9,
                sum(`10`) as p_10,
                sum(`11`) as p_11,
                sum(`12`) as p_12,
                sum(`13`) as p_13,
                sum(`14`) as p_14,
                sum(`15`) as p_15,
                sum(`16`) as p_16,
                sum(`17`) as p_17,
                sum(`18`) as p_18,
                sum(`19`) as p_19,
                sum(`20`) as p_20,
                sum(`1`+`2`+`3`+`4`+`5`+`6`+`7`+`8`+`9`+`10`+`11`+`12`+`13`+`14`+`15`+`16`+`17`+`18`+`19`+`20`) as total
        from unit where pcode = '" . $pcode . "' GROUP BY district; ";
$data = $mc->select_all($sql);
//echo $sql;

$sql2 = "SELECT * FROM `province_1` ORDER BY `pname`; ";
$data2 = $mc->select_all($sql2);
?>

<div class="ps-5 pe-5">

  <div class="d-flex justify-content-end">
    <div class="dropdown ">
      <label for="pcode">
        <select name="pcode" id="pcode" onchange="province(this.value)">
          <?php foreach ($data2 as $key => $value2) { ?>
            <option value="<?= $value2["pcode"]; ?>" <?php
            if ($value2["pcode"] == $pcode) {
              echo"selected";
            }
            ?>><?= $value2["pname"]; ?></option>
                  <?php } ?>
        </select>

        <script>
          function province(pcode) {
            window.location = "https://vote66.dopa.go.th/app/dashboard/report.php?pcode=" + pcode; // redirect
          }
        </script>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">นคร</a>
        </div>
    </div>

  </div>
  <?php
  $tnums = 0;
  foreach ($data as $key => $value) {
    $tnums++;
    if ($value['p_1'] == 0 && $value['p_2'] == 0 && $value['p_3'] == 0 && $value['p_4'] == 0 && $value['p_5'] == 0 && $value['p_6'] == 0 && $value['p_7'] == 0 && $value['p_8'] == 0 && $value['p_9'] == 0 && $value['p_10'] == 0 && $value['p_11'] == 0 && $value['p_12'] == 0 && $value['p_13'] == 0 && $value['p_14'] == 0 && $value['p_15'] == 0 && $value['p_16'] == 0 && $value['p_17'] == 0 && $value['p_18'] == 0 && $value['p_19'] == 0 && $value['p_20'] == 0) {
      continue;
    }
    ?>

    <?php
    $sql_per = "SELECT *,concat(title,' ' ,name,' ',surname) as ca_name from election_district_list where election_district='" . $value['district'] . "' and pcode='" . $value['pcode'] . "' order by election_district";
    $data_per = $mc->select_5($sql_per, "number");
    //echo $sql_per;
    //print_r($data[$tnums-1]);
    // echo "<br>";
    $row_array = array_values($data[$tnums - 1]);
    // print_r($row_array);
    unset($row_array[0]);
    unset($row_array[1]);
    unset($row_array[2]);
    $sorted;
    $run = 1;
    foreach ($row_array as $key2 => $value2) {
      $sorted[$run] = $value2;
      $run++;
    }
    // echo "<br>";
    // print_r($sorted);
    arsort($sorted);
    //print_r($sorted);
    $arr_key = array_keys($sorted);
    //print_r($arr_key);
    $sql_check = "SELECT pcode,pname,election_district from election_district_list where pcode = '" . $value['pcode'] . "' GROUP BY election_district";
    $data_check = $mc->select_all($sql_check);
    $flag = 0;
    foreach ($data_check as $key3 => $value3) {
      if ($value3['election_district'] == $value['district']) {
        $flag = 1;
      }
    }
    if ($flag == 0)
      break;
    if (isset($data_per[$arr_key[0]]['ca_name']) == null && isset($data_per[$arr_key[1]]['ca_name']) == null && isset($data_per[$arr_key[2]]['ca_name']) == null && isset($data_per[$arr_key[3]]['ca_name']) == null && isset($data_per[$arr_key[4]]['ca_name']) == null) {
      continue;
    }
    ?>

    <div class="  pt-5 pb-5">

      <div class="card" >
        <div class="card-header display-5 p-3" style="background-color: #2D2C41; color:#DDB55C;">
          จังหวัด<?= $data[0]["pname"] ?> เขต <?= $value['district'] ?>
        </div>
        <div class="card-body h4">
          <table id="table_id<?= $tnums ?>" class="  row-border  " style="width:100% ">
            <thead>
              <tr>
                <th>#</th>

                <th>สัญลักษณ์พรรค</th>
                <th>พรรค</th>
                <th>เบอร์</th>
                <th>ชื่อ-สกุล</th>
                <!-- <th>กราฟ</th> -->
                <th>คะแนน</th>
              </tr>
            </thead>
            <tbody>

              <?php
              for ($i = 0; $i <= 5; $i++) {
                if (isset($data_per[$arr_key[$i]]['ca_name'])) {
                  ?>
                  <tr>
                    <td><?= $i; ?></td>

                    <td>
                      <?php if (isset($data_per[$arr_key[$i]]['pp_name'])) { ?>
                        <img src="<?= "../img/" . $data_per[$arr_key[$i]]['pp_name'] . ".png" ?>">
                        <?php
                      } else {
                        echo "&nbsp;ไม่มีข้อมูล";
                      }
                      ?>
                    </td>
                    <td><?php
                      if (isset($data_per[$arr_key[$i]]['pp_name']))
                        echo $data_per[$arr_key[$i]]['pp_name'];
                      else
                        echo "ไม่มีข้อมูล";
                      ?></td>
                    <td><?= $arr_key[$i] ?></td>
                    <td><?php
                      if (isset($data_per[$arr_key[$i]]['ca_name']))
                        echo $data_per[$arr_key[$i]]['ca_name'];
                      else
                        echo "ไม่มีข้อมูล";
                      ?></td>
                    <!-- <td><div class="progress" style="width: 23vw;" >
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="< ?php
                        $percent = ($sorted[$arr_key[$i]] * 100) / $value["total"];
                        if (isset($data_per[$arr_key[$i]]['pp_name']))
                          echo number_format($sorted[$arr_key[$i]], 0, '.', ',');
                        else
                          echo "0";
                        ?>" aria-valuemin="0" aria-valuemax="50000" style="width: < ?= $percent ?>%; background-color: < ?= $pp_color[$data_per[$arr_key[$i]]['pp_no']] ?>;  ">< ?= number_format($percent, 2, '.', ','); ?>%</div>
                      </div></td>
                     -->
                    <td><?php
                      if (isset($data_per[$arr_key[$i]]['pp_name']))
                        echo number_format($sorted[$arr_key[$i]], 0, '.', ',');
                      else
                        echo "ไม่มีข้อมูล";
                      ?></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table><br><br>
        </div>
      </div>
    <?php } ?>

  </div>

</div>

<!-- Header-->
<!-- <div id="section-content"></div> -->
<!-- About Section-->




</main>
<script>
  setTimeout(location.reload.bind(location), 60000);
</script>
<?php require '../require/footer_html.php' ?>
<script>
  var tnums = "<?php echo $tnums; ?>";
  var i;
  for (i = 1; i <= tnums; i++) {
    var tbl = "#table_id" + i;

    $(tbl).DataTable({
      "ordering": false,
      "dom": '',
      "responsive": true,
    });

  }
</script>


