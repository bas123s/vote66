<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_htmlx.php';

if ($user["ministry_id"] == '15') {
  $feild_status = "arrest.acceptDopa_status";
  $feild_type = "arrest.acceptDopa_type";
} else if ($user["ministry_id"] == '25006') {
  $feild_status = "arrest.accept_status";
  $feild_type = "arrest.accept_type";
}

$u_pid = $user["pid"];
$condition = "WHERE `rec_date` = CURDATE() ";

if ($user["ministry_id"] == "29006" && $user["privilege"] > 1) {
  $condition .= " AND `mainPlace_place`.`caught_pcode` = '" . $user["pcode"] . "' ";
} else if ($user["ministry_id"] == "15" && $user["privilege"] > 1) {
  $condition .= " AND `mainPlace_place`.`place_acode` = '" . $user["acode"] . "' ";
}

$sql2 = "SELECT COUNT(DISTINCT `id`) as `News` FROM `arrest`.`mainPlace_place` " . $condition;
$data = $mc->select_1($sql2);

$sql3 = "SELECT COUNT(DISTINCT `arrest`.`id`) as `News` FROM `arrest` RIGHT JOIN `mainPlace_place`
ON ( `mainPlace_place`.`id_place1` = `arrest`.`id_place1` AND `mainPlace_place`.`rec_pid` = '" . $user["pid"] . "' AND `mainPlace_place`.`rec_date` = CURDATE()) WHERE `arrest`.`accept_status` = '2' OR `arrest`.`acceptDopa_status` = '2' ;";
$data2 = $mc->select_1($sql3);

if ($user["ministry_id"] == "15") {
  if ($user["privilege"] > 3) {
    $condition = " WHERE `acceptDopa_status` = '1' AND `place_pcode`= '" . $user["pcode"] . "' ";
  } else {
    $condition = " WHERE `acceptDopa_status` = '1' AND `place_acode`= '" . $user["acode"] . "' ";
  }
} elseif ($user["ministry_id"] == "29006") {
  $condition = " WHERE `accept_status` = '1' AND `place_pcode`= '" . $user["pcode"] . "' ";
} else {
  if ($user["privilege"] > 3) {
    $condition = " WHERE `accept_status` = '1' AND `place_pcode`= '" . $user["pcode"] . "' ";
  } else {
    $condition = " WHERE `accept_status` = '1' AND `place_acode`= '" . $user["acode"] . "' ";
  }
}

$sql4 = "SELECT COUNT(`id_mainplace`) as `News` FROM `arrest`.`count_arrest` " . $condition;
$data4 = $mc->select_1($sql4);
?>

<div class="row mt-5 mb-5">


  <!-- <div class="col-md-4">
    <a href="../place/">
      <div class="card bg-primary ">
        <div class="card-body">
          <h1 class=" display-6 mb-5"><i class="fa-solid fa-location-dot"></i> สถานที่จับกุม</h1>
          <h6 class=" lead fw-bolder text-end">จัดการรายละเอียดสถานที่จับกุม</h6>
        </div>
      </div>
    </a>
  </div> -->

  <!-- <div class="col-md-4">
    <a href="../place/main_place1.php">
      <div class="card bg-primary ">
        <div class="card-body">
          <h1 class=" display-6 mb-5"><i class="fa-solid fa-location-dot"></i> บันทึกจับกุม 1 ราย</h1>
          <h6 class=" lead fw-bolder text-end">บันทึกจับกุม 1 ราย</h6>
        </div>
      </div>
    </a>
  </div> -->
  <?php
  if (($user["ministry_id"] != "29006")) {
    if (in_array($user["privilege"], ["1", "2", "7"], false)) {
      if ((($user["privilege"] == "1") && ($user["ministry_id"] == "15")) || ($user["privilege"] == "2") && ($user["ministry_id"] != "15")) {
        ?>
        <div class="col-md-2">
          <a href="../../app/detainee/">
            <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
              <div class="card-body text-center">
                <h1 class=" display-3 "><i class="fa-solid fa-handcuffs "></i> </h1>
                <h6 class=" lead fw-bolder   ">บันทึกข้อมูล<br>การควบคุมตัว</h6>
              </div>
            </div>
          </a>
        </div>
        <?php
      }
      ?>


      <div class="col-md-2">
        <a href="../../app/place/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-taxi"></i>
                <span class="badge rounded-pill bg-primary badge-up" id="notification3">
                  <?= @$data2["News"] ?>
                </span>
              </h1>
              <h6 class=" lead fw-bolder   ">รายงานการควบคุมตัว <br> <br></h6>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-2">
        <a href="../../app/report_officer/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-bullhorn"></i> </h1>
              <h6 class=" lead fw-bolder   ">รายชื่อเจ้าหน้าที่ผู้รับผิดชอบ<br></h6>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-2">
        <!-- <a href="../report/"> -->
        <a href="../../app/report_callcenter/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2  h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
              <h6 class=" lead fw-bolder   ">สถิติการควบคุมตัว<br></h6>
            </div>
          </div>
        </a>
      </div>

      <!--   <div class="col-md-2">
          <a href="../report/">
            <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
              <div class="card-body text-center">
                <h1 class=" display-3 "><i class="fa-solid fa-bullhorn"></i> </h1>
                <h6 class=" lead fw-bolder   ">แบบตอบรับการแจ้ง<br>การควบคุมตัว</h6>
              </div>
            </div>
          </a>
        </div> -->
      <!-- <div class="col-md-2">
        <a href="../update_info/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-handcuffs "></i> </h1>
              <h6 class=" lead fw-bolder   ">ปรับปรุงข้อมูล<br>การควบคุมตัว</h6>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-2">
        <a href="../add_place/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-handcuffs "></i> </h1>
              <h6 class=" lead fw-bolder   ">เพิ่มสถานที่<br>ที่ควบคุมตัว</h6>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-2">
        <a href="../information/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-handcuffs "></i> </h1>
              <h6 class=" lead fw-bolder   ">บันทึกข้อมูล<br>การปล่อยตัว</h6>
            </div>
          </div>
        </a>
      </div> -->

      <?php
    }
  }
  ?>



  <?php
  if (in_array($user["privilege"], ["2", "7"], TRUE)) {
    if ($user["ministry_id"] != "25007" && $user["ministry_id"] != "16") {
      ?>
      <div class="col-md-2">
        <a href="../../app/rep/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-file"></i>
                <span class="badge rounded-pill bg-primary badge-up" id="notification2">
                  <?= @$data4["News"] ?>
                </span>
              </h1>
              <h6 class=" lead fw-bolder   ">บันทึกรับแจ้งการควบคุมตัว<br></h6>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-2">
        <a href="../../app/rep/report_arrest.php">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
              <h6 class=" lead fw-bolder   ">รายงานการรับแจ้งการควบคุมตัว<br></h6>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-2">
        <!-- <a href="../report/"> -->
        <a href="../../app/report_callcenter/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2  h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
              <h6 class=" lead fw-bolder   ">สถิติการรับแจ้ง<br></h6>
            </div>
          </div>
        </a>
      </div>
      <?php
    }
  }
  ?>

  <?php if (in_array($user["privilege"], ["3", "6", "8", "9"], TRUE)) { ?>
    <div class="col-md-2">
      <a href="../../core/add_user/form.php">
        <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
          <div class="card-body text-center">
            <h1 class=" display-3 "><i
                class="fa-solid fa-user-pen"></i></h1>
            <h6 class=" lead fw-bolder ">จัดการผู้ใช้งาน</h6>
          </div>
        </div>
      </a>
    </div>
  <?php } ?>

  <?php if (in_array($user["privilege"], ["6", "8", "9"], TRUE)) { ?>
    <!--    <div class="col-md-2">
          <a href="../../app/org/">
            <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
              <div class="card-body text-center">
                <h1 class=" display-3 "><i
                    class="fa-solid fa-users-gear"></i></h1>
                <h6 class=" lead fw-bolder ">จัดการหน่วยงาน</h6>
              </div>
            </div>
          </a>
        </div>-->
  <?php } ?>

  <?php
  if ($user["ministry_id"] == 15) {
    if (in_array($user["privilege"], ["3", "6", "8", "9"], TRUE)) {
      ?>
      <div class="col-md-2">
        <a href="../../app/callcenter/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-building-shield "></i></h1>
              <h6 class=" lead fw-bolder   ">ศูนย์รับแจ้งการควบคุมตัว</h6>
            </div>
          </div>
        </a>
      </div>
      <?php
    }
  }
  ?>
  <div class="col-md-2">
    <a href="contact.php">
      <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i class="fa-solid fa-circle-question"></i> </h1>
          <h6 class=" lead fw-bolder   ">ติดต่อสอบถาม <br></h6>
        </div>
      </div>
    </a>
  </div>

  <?php
//  echo $sql4;
  ?>
</div>





<script>
  setInterval(function () {
    location.reload();
  }, 30000);
</script>

<?php
require '../../require/footer_content.php';
?>