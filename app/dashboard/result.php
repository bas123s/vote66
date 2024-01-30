<?php
$sql_party = "SELECT * from political_party";
$data_party = $mc->select_all_2($sql_party);

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

<div class="ps-5 pe-5 ">
  <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-2">
    <div class="col ">
      <div style="background-color: #2D2C41;" class="p-3    rounded    text-center shadow-lg">
        <?php
        $sql_1 = "SELECT SUM(1+2+3+4+5+6+7+8+9+10+11+12+13+14+15+16+17+18+19+20) AS score FROM `vote66`.`unit` ";
        $data_all = $mc->select_1($sql_1);
        ?>

        <div class="p-3  " style=" color:#DDB55C;">นับคะแนนไปแล้ว</div>
        <h1 class=" fw-bolder  "><span class=" d-inline text-white ">
            <?= number_format($data_all["score"], 0, '.', ',') ?> ใบ
          </span></h1>
		  <span class="text-white d-inline"><br>
		  </span>
        <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                        </div> -->
      </div>
    </div>
    <?php
    $sql_1 = "SELECT count(DISTINCT `pcode`) as `cnt` FROM `unit`;";
    $data_all = $mc->select_1($sql_1);
    ?>
    <div class="col  ">
      <div style="background-color: #2D2C41;" class="p-3    rounded    text-center shadow-lg">

        <div class="p-3  " style=" color:#DDB55C;">จังหวัด</div>
        <h1 class=" fw-bolder "><span class="text-white d-inline">
            <?php
            if (isset($data_all["cnt"]) >= '76') {
              echo "76";
            } else {
              echo $data_all["cnt"];
            }
            ?>
          </span></h1>
		  <span class="text-white d-inline"><br>
		  </span>
        <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                        </div> -->
      </div>
    </div>
    <?php
    $sql_1 = "SELECT count(DISTINCT `acode`) as `cnt` FROM `unit`;";
    $data_all = $mc->select_1($sql_1);
    ?>
    <div class="col ">
      <div style="background-color: #2D2C41;" class="p-3    rounded    text-center shadow-lg">

        <div class="p-3  " style=" color:#DDB55C;">อำเภอ</div>
        <h1 class=" fw-bolder "><span class="text-white d-inline">
            <?php
            if ($data_all["cnt"] > 878) {
              echo "878";
            } else {
              echo $data_all["cnt"];
            }
            ?>
          </span></h1>
		  <span class="text-white d-inline"><br>
		  </span>
        <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                        </div> -->
      </div>
    </div>
    <?php
    $sql_1 = "SELECT count( `district` ) AS `cnt` FROM (SELECT `pcode`,`district` FROM `unit` GROUP BY `pcode`,`district`) as `unit`";
    $data_all = $mc->select_1($sql_1);
    ?>
    <div class="col  ">
      <div style="background-color: #2D2C41;" class="p-3    rounded    text-center shadow-lg">

          <div class="p-3  " style=" color:#DDB55C;">เขต</div>
        <h1 class=" fw-bolder "><span class="text-white d-inline">
            <?php
			//percentage
			
            if ($data_all["cnt"] > 367) {
				$x=367;
              echo "367";
            } else {
				$x=$data_all["cnt"];
              echo $data_all["cnt"];
            }
			$percentage_show1=($x*100)/367;
			
            ?>
          </span></h1>
		  <span class="text-white d-inline">
		  คิดเป็น <?php echo number_format($percentage_show1, 0);?> % ของเขตเลือกตั้ง 367 เขต
		  </span>
        <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                        </div> -->
      </div>
    </div>

    <?php
    $sql_1 = "SELECT count( `unit` ) AS `cnt`  FROM `unit`;";
    $data_all = $mc->select_1($sql_1);
    ?>
    <div class="col  ">
      <div style="background-color: #2D2C41;" class="p-3    rounded    text-center shadow-lg">
         <div class="p-3  " style=" color:#DDB55C;">หน่วย</div>
        <h1 class=" fw-bolder "><span class="text-white d-inline">

            <?= number_format($data_all["cnt"], 0, '.', ',');
			$x=$data_all["cnt"];			
			$percentage_show2=($x*100)/88848;?>
          </span></h1>
		 <span class="text-white d-inline">
		  คิดเป็น <?php echo number_format($percentage_show2, 0);?> % ของหน่วยเลือกตั้งทั้งหมด
		  </span>
        <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                        </div> -->
      </div>
    </div>



  </div>
</div>

<section class="py-2 ">
  <div class=" px-5 pb-5">
    <div class="row gx-5 align-items-center">

      <div class="col-xxl-7 my-2 " style=" height: 600px;">
        <!-- Header text content-->
        <?php require 'maps/test_map.php' ?>

      </div>
      <div class="col-xxl-5  my-2 bg-white rounded" style="background-color: #FFFEFE; height: 600px;">

        <table id="table_id<?= $tnums ?>" class="hover mt-5 mb-5 scmini row-border  " style="width:100%">
          <thead>
            <tr>
              <th class="p-3">อันดับที่</th>
              <th class="p-3">สัญลักษณ์พรรค</th>
              <th class="p-3">พรรค</th>
              <th class="p-3">จำนวนส.ส.</th>
              <th class="p-3">สีประจำพรรค</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $num = 0;
            $series = []; //สร้างตัวแปรเพื่อนำไปใส่ progress bar
            foreach ($data_party as $key => $value) {
              $num++;
              ?>

              <tr class="border-bottom">
                <td class="">
                  <?= $num ?>
                </td>

                <td><img src="<?= "../img/" . $value['pp_name'] . ".png" ?>"></td>

                <td>
                  <?= $value['pp_name'] ?>
                </td>
                <td class="display-6">
                  <?= $value['cnt'] ?>
                </td>
                <td><i class="fa-solid fa-circle fa-lg" style="color: <?= $pp_color[$value['pp_no']] ?>; "> </i></td>
              </tr>

              <?php
              if ($num <= 10) {
                $series[$num]["name"] = $value['pp_name'];
                $series[$num]["data"] = $value['cnt'];
                $series[$num]["color"] = $pp_color[$value['pp_no']];
              }
            }
            ?>
          </tbody>
        </table>

      </div>
      <?php require 'charts/progessbar.php'; ?>

    </div>
  </div>
</section>

<script>
  var tnums = "<?= $tnums; ?>";
  var i;
  for (i = 1; i <= tnums; i++) {
    var tbl = "#table_id" + i;

    $(tbl).DataTable({
      scrollY: '500px',
      scrollCollapse: true,
      paging: false,
      info: false,
      border: false,
      searching: false,
      responsive: true,

      columnDefs: [{
          "targets": '_all',
          "createdCell": function (td, cellData, rowData, row, col) {
            $(td).css('padding', '10px')
          }
        }]
    });

  }
</script>