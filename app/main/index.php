<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_html.php';
?>

<div class="row mt-5 mb-5">
<div align="center">
    <font color="red">ทดสอบนำเข้าข้อมูล 30% ของหน่วยเลือกตั้งทั้งหมด ในอำเภอของท่าน เริ่มทดสอบนำเข้าข้อมูลตั้งแต่เวลา 13.00 - 15.00 น.</red>
  </div>
  <div class="col-md-12">
    <a href="../../app/form/1.php">
      <div class="card  shadow text-pm border-secondary py-2 h-75" style="background-color: #66B032;">
        <div class="card-body text-center">
          <!--<h1 class=" display-3 text-black"><i class="fa-solid fa-bullhorn"></i> </h1>-->
          <h6 class=" display-3 text-white">แบบแบ่งเขตเลือกตั้ง<br></h6>
        </div>
      </div>
    </a>
  </div>
  <!--<div class="col-md-4">
    <a href="../../app/form/2.php">
      <div class="card  shadow text-pm border-secondary py-2  h-75" style="background-color: #6600FF;">
        <div class="card-body text-center">
          <h6 class=" display-3 text-white">บัญชีรายชื่อ<br></h6>
        </div>
      </div>
    </a>
  </div>-->

  <div class="col-md-12">

      <div class="card  shadow text-pm border-secondary py-2 h-75">
        <div class="card-body text-center">
          <!--<h1 class=" display-3 text-black"><i class="fa-solid fa-bullhorn"></i> </h1>-->
          <h4 class="mb-1"><b>ติดต่อสอบถาม กรุณาแอดไลน์ <a href="https://line.me/ti/p/%40ThaiQM" target="_blank">@ThaiQM</a></b><br></h4>
          <a href="https://line.me/ti/p/%40ThaiQM" target="_blank"><img class="mb-3" width="270px" height="270px" src="../../require/images/thaiqm.png"></a>
        </div>
      </div>

  </div>

  <?php
//  echo $sql4;
//  $mc->check_array($mc_variable["political_party"], "พรรค");
  ?>
</div>





<script>
  setInterval(function () {
    document.getElementById("notification2").innerHTML = <?= $data4['News'] ?>;
    document.getElementById("notification3").innerHTML = <?= $data2['News'] ?>;
  }, 30000);
</script>

<?php
require '../../require/footer_content.php';
?>