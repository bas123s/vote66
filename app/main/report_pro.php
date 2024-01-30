<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_html.php';

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
                sum(`20`) as p_20
        from unit where pcode='" . $_REQUEST['pcode'] . "' GROUP BY district";
$data = $mc->select_all($sql);
?>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

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

  <div class="pt-5 pb-5">

    <div class="card">
      <div class="card-header display-5 p-3">
        จังหวัด<?= $data[0]["pname"] ?> เขต <?= $value['district'] ?>
      </div>
      <div class="card-body">
        <table id="table_id<?= $tnums ?>" class="display cell-border compact h2" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>เบอร์</th>
              <th>สัญลักษณ์พรรค</th>
              <th>พรรค</th>
              <th>ชื่อ-สกุล</th>
              <th>คะแนน</th>
            </tr>
          </thead>
          <tbody>

            <?php
            for ($i = 0; $i < 5; $i++) {
              if (isset($data_per[$arr_key[$i]]['ca_name'])) {
                ?>
                <tr>
                  <td><?= $i + 1; ?></td>
                  <td><?= $arr_key[$i] ?></td>
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
                  <td><?php
                    if (isset($data_per[$arr_key[$i]]['ca_name']))
                      echo $data_per[$arr_key[$i]]['ca_name'];
                    else
                      echo "ไม่มีข้อมูล";
                    ?></td>
                  <td><?php
                    if (isset($data_per[$arr_key[$i]]['pp_name']))
                      echo $sorted[$arr_key[$i]];
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

<?php
require '../../require/footer_content.php';
?>
<script>
  var tnums = "<?php echo $tnums; ?>";
  var i;
  for (i = 1; i <= tnums; i++) {
    var tbl = "#table_id" + i;

    $(tbl).DataTable({
      "ordering": false,
      "dom": '',

    });

  }
</script>