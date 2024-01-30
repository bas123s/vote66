<?php

$sql_party = "SELECT * from political_party";
$data_party = $mc->select_all_2($sql_party);

function cmp($a, $b)
{
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
            <section class="py-5" >
                <div class="container px-5 pb-5 ">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">
                                <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Vote &middot; 66 &middot; Dashboard</div></div>
                                <div class="fs-3 fw-light text-muted">ผลเลือกตั้ง ส.ส.ทั่วประเทศ</div>
                                <?php
        $sql_1 = "SELECT SUM(1+2+3+4+5+6+7+8+9+10+11+12+13+14+15+16+17+18+19+20)as score FROM `vote66`.`unit` ";
        $data_all = $mc->select_1($sql_1);
        ?>
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">นับคะแนนไปแล้ว <?= number_format($data_all["score"]) ?> ใบ</span></h1>
                                <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <!-- Header profile picture-->
                            <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                <div class=" profile bg-white shadow">
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           