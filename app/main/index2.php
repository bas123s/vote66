<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_html.php';

// $sql = "SELECT
// COUNT( orgcode ) AS countplace 
// FROM
// main_place 
// WHERE
// create_date = (SELECT CURRENT_DATE)";

// if($user['pcode'] <= 10){
//   $acode = "1002";
// }else{
//   $acode = $user['acode'];
// }
// $query2 = "SELECT id AS caname FROM callcenter WHERE acode = '".$user['acode']."'";
// $idcallcenter = $mc->select_1($query2);
// $sql1 = "SELECT COUNT(DISTINCT id) as count FROM main_place WHERE status = '1' AND idcallcenter = '".@$idcallcenter["id"]."'";
$sql1 = "SELECT COUNT(DISTINCT id) as count FROM main_place WHERE status = '1'";
$countplace = $mc->select_1($sql1);
$sql2 = "SELECT COUNT(DISTINCT id) as News FROM `arrest`.`main_place` WHERE `rec_date` = CURDATE()";
$data = $mc->select_1($sql2); 

?>

<div class="row mb-5">


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
  <?php if (in_array($user["privilege"], ["1", "3", "7", "8", "9"], TRUE)) { 
    if($user["ministry_id"] != 16 AND $user["privilege"] != 7){
    ?>
    <div class="col-md-2">
      <a href="../detainee/">
        <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
          <div class="card-body text-center">
            <h1 class=" display-3 "><i class="fa-solid fa-handcuffs "></i> </h1>
            <h6 class=" lead fw-bolder   ">บันทึกข้อมูล<br>การควบคุมตัว</h6>
          </div>
        </div>
      </a>
    </div>


    <div class="col-md-2">
      <a href="../place/">
        <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
          <div class="card-body text-center">
            <h1 class=" display-3 "><i class="fa-solid fa-taxi"></i> </h1>
            <h6 class=" lead fw-bolder   ">รายงานการควบคุมตัว <br> <br></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-2">
      <a href="../report_officer/">
        <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
          <div class="card-body text-center">
            <h1 class=" display-3 "><i class="fa-solid fa-bullhorn"></i> </h1>
            <h6 class=" lead fw-bolder   ">รายชื่อเจ้าหน้าที่ผู้รับผิดชอบ<br></h6>
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

<?php }
} ?>



<?php if (in_array($user["privilege"], ["2", "3", "5", "7", "8"], TRUE)) {
  if($user["ministry_id"] != 16){
 ?>
  <div class="col-md-2">
    <a href="../rep/">
      <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i class="fa-solid fa-file"></i> </h1>
          <h6 class=" lead fw-bolder   ">บันทึกรับแจ้งการควบคุมตัว<br></h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="/report_central/">
      <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
          <h6 class=" lead fw-bolder   ">รายงานการรับการควบคุมตัว<br></h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="../rep/report_arrest.php">
      <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
          <h6 class=" lead fw-bolder   ">รายงานการรับแจ้งการควบคุมตัว<br></h6>
        </div>
      </div>
    </a>
  </div>

<?php }
} ?>
<?php if (in_array($user["privilege"], ["4", "6", "7", "8", "9"], TRUE)) { 
  ?>
  <div class="col-md-2">
    <a href="../report_callcenter/">
      <div class="card  shadow bg-pm text-pm border-secondary py-2  h-75">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i class="fa-solid fa-envelopes-bulk"></i> </h1>
          <h6 class=" lead fw-bolder   ">รายงานการรับแจ้ง<br></h6>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-2">
    <a href="../../core/add_user/form.php">
      <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75 ">
        <div class="card-body text-center">
          <h1 class=" display-3 "><i
            class="fa-solid fa-user-pen"></i></h1>
            <h6 class=" lead fw-bolder   ">จัดการผู้ใช้งาน</h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-2">
      <a href="../../app/org/">
        <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
          <div class="card-body text-center">
            <h1 class=" display-3 "><i
              class="fa-solid fa-users-gear"></i></h1>
              <h6 class=" lead fw-bolder   ">จัดการหน่วยงาน</h6>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    <?php if (in_array($user["privilege"], ["7", "8", "9"], TRUE)) {
     if($user["ministry_id"] != 16){ ?>
      <div class="col-md-2">
        <a href="../callcenter/">
          <div class="card  shadow bg-pm text-pm border-secondary py-2 h-75">
            <div class="card-body text-center">
              <h1 class=" display-3 "><i class="fa-solid fa-building-shield "></i></h1>
              <h6 class=" lead fw-bolder   ">ศูนย์รับแจ้งการควบคุมตัว</h6>
            </div>
          </div>
        </a>
      </div>
    <?php }} ?>
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


  </div>



  <?php
  require '../../require/footer_content.php';
  ?>
  <script>
    setInterval(function(){
      document.getElementById("notification2").innerHTML = <?= $data['count'] ?>;
    }, 30000);
  </script>