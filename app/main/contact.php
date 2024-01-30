<?php
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ไข menu ในไฟล์  menuconfig.php
// $mc ชื่อ class ที่ต้องเรียกใช้  .
//
//$mc->check_array($data, "data");  เอาไว้เช็คตัวแปร data ที่ query มาแล้ว .
//
//$mc->check_array($user, "user");  เอาไว้เช็ค userที่ login เข้ามา .
//
//$mc->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
//$sql = "SELECT * FROM `drugreport`.`province` where `pcode` not in ('01','03');";
//$data = $mc->select_3($sql, "pcode", "pname");
//$mc->check_array($data, "data");
//$mc->check_array($user, "user");
?>

<div class="row mb-5">


  <!--  <div class="col">
      <div class="d-flex justify-content-center">
        <div class="card  ">
          <div class="card-header">
            <h2 class="text-primary text-center">ไลน์ติดต่อสอบถาม</h2>
          </div>
          <div class="card-body text-center">
            <div class="p-1">
              <a href='https://lin.ee/fJ71HSi' class="text-success h2"><i class="fa-brands fa-line fa-8x"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>-->

  <div class="col col-md-12 col-lg-4">
    <div class="d-flex justify-content-center">
      <div class="card  ">
        <div class="card-header">
          <h2 class="text-primary text-center">QR code ไลน์ติดต่อสอบถาม</h2>
        </div>
        <div class="card-body text-center">
          <div class="p-1">

            <img src="../../require/images/qr.jpg" alt="image" class="imaged w-100" >

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col col-md-12 col-lg-8">
    <div class="d-flex justify-content-center">
      <div class="card ">
        <div class="card-header"><h2 class="text-primary">ที่อยู่</h2></div>
        <div class="card-body text-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2769448798194!2d100.51510155653965!3d13.759780677577206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x36e617fae101d4a3!2z4LiB4Lij4Lih4LiB4Liy4Lij4Lib4LiB4LiE4Lij4Lit4LiHICjguKfguLHguIfguYTguIrguKLguLIp!5e0!3m2!1sth!2sth!4v1673588516321!5m2!1sth!2sth" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <h3 class="mt-5">
            สำนักการสอบสวนและนิติการ กรมการปกครอง (วังไชยา) ถนนนครสวรรค์ แขวงสี่แยกมหานาค เขตดุสิต กรุงเทพ 10300
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- * App Capsule -->


<?php
//$mc->check_array($user, "user");
require '../../require/footer_content.php';
?>
</html>