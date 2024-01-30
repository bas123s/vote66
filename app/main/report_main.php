<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_html.php';
$sql_party = "SELECT * from political_party";
$data_party = $mc->select_all_2($sql_party);

function cmp($a, $b) {
  if ($a['cnt'] == $b['cnt']) {
    return 0;
  }
  return ($a['cnt'] > $b['cnt']) ? -1 : 1;
}

foreach ($data_party as $key1 => $value1) {
  $data_party[$key1]['pp_no'] = $key1;
  $data_party[$key1]['cnt'] = 0;
}
// print_r($data_party);
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
        from unit GROUP BY district,pcode order by pcode, district";
$data = $mc->select_all($sql);
?>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

<?php
$tnums = 0;
foreach ($data as $key => $value) {
  $tnums++;
  ?>

  <?php
  $sql_per = "SELECT *,concat(title,' ' ,name,' ',surname) as ca_name from election_district_list where election_district='" . $value['district'] . "' and pcode='" . $value['pcode'] . "' order by election_district";
  $data_per = $mc->select_5($sql_per, "number");
  //echo $sql_per;
  // print_r($data[$tnums-1]);
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
  if (isset($data_per[$arr_key[0]]['pp_no']))
    $data_party[$data_per[$arr_key[0]]['pp_no']]['cnt'] += 1;
  ?>

  <?php
}
usort($data_party, "cmp");
// unset($data_party[0]);
// print_r($data_party);
?>

<div class="card mt-5">
  <div class="card-header display-5 p-3">

    <table width="100%" class="display cell-border compact text-center " border="1">
      <tr>
        <td colspan="4" class="pt-3 pb-3">จำนวนการเลือกตั้งทั้งประเทศ</td>
      </tr>
      <tr>
        <td class="border-1 pt-1 pb-1">จังหวัด</td>
        <td class="border-1 pt-1 pb-1">อำเภอ</td>
        <td class="border-1 pt-1 pb-1">เขต</td>
        <td class="border-1 pt-1 pb-1">หน่วย</td>
        <!--<td>จำนวนผุ้ใช้สิทธิ</td>-->
      </tr>

      <tr>
        <?php
        $sql_1 = "SELECT count(DISTINCT `pcode`) as `cnt` FROM `unit`;";
        $data_all = $mc->select_1($sql_1);
        ?>
        <td class="border-1 pt-1 pb-1"><?= $data_all["cnt"] ?></td>

        <?php
        $sql_1 = "SELECT count(DISTINCT `acode`) as `cnt` FROM `unit`;";
        $data_all = $mc->select_1($sql_1);
        ?>
        <td class="border-1 pt-1 pb-1"><?= $data_all["cnt"] ?></td>

        <?php
        $sql_1 = "SELECT count( `district` ) AS `cnt` FROM (SELECT `pcode`,`district` FROM `unit` GROUP BY `pcode`,`district`) as `unit`";
        $data_all = $mc->select_1($sql_1);
        ?>
        <td class="border-1 pt-1 pb-1"><?= $data_all["cnt"] ?></td>

        <?php
        $sql_1 = "SELECT count( `unit` ) AS `cnt`  FROM `unit`;";
        $data_all = $mc->select_1($sql_1);
        ?>
        <td class="border-1 pt-1 pb-1"><?= number_format($data_all["cnt"], 0, '.', ',') ?></td>
        <!--<td>< ?= $data_all["cnt"] ?></td>-->
      </tr>



    </table>

  </div>
  <div class="card-body">
    <table id="table_id<?= $tnums ?>" class="display cell-border compact mt-5 mb-5 h2 text-center" style="width:100%">
      <thead>
        <tr>
          <th class="pt-3 pb-3 text-center">ลำดับที่</th>
          <th class="pt-3 pb-3 text-center">สัญลักษณ์พรรค</th>
          <th class="pt-3 pb-3 text-center">พรรค</th>
          <th class="pt-3 pb-3 text-center">จำนวนส.ส.</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $num = 0;
        foreach ($data_party as $key => $value) {
          $num++;
          ?>
          <tr>
            <td><?= $num ?></td>
            <td><img src="<?= "../img/" . $value['pp_name'] . ".png" ?>"></td>
            <td class="text-left"><?= $value['pp_name'] ?></td>
            <td class="display-6"><?= $value['cnt'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br><br><br><br><br>
  </div>
</div>


<?php
require '../../require/footer_content.php';
?>

<script>
  var tnums = "<?= $tnums; ?>";
  var i;
  for (i = 1; i <= tnums; i++) {
    var tbl = "#table_id" + i;

    $(tbl).DataTable({
      "ordering": false,
      "dom": '',
      "iDisplayLength": -1
    });

  }
</script>

<script>
  setTimeout(location.reload.bind(location), 60000);
</script>