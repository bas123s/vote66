<?php
require '../../require/head_user.php';
//require '../../require/head_html.php'; //แก้ไข menu ในไฟล์  menuconfig.php
//$mc_user->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
$sql = "SELECT `mcode`,`mname` FROM `mm` where `tcode` ='" . $user["tcode"] . "';";
$mm = $mc_user->select_3($sql, "mcode", "mname");
//$mc_user->check_array($mm, "mm");
?>

<div id="appCapsule">

  <div class="section mt-1 text-center">
    <div class="d-flex justify-content-center">
      <form action="register_query.php" method="post">
        <div class="card col mb-5">
          <div class="card-header p-3">
            <h1 class="text-center text-primary">เพิ่มผู้จัดเก็บข้อมูล</h1>
          </div>
          <div class="card-body p-3">
            <div class="form-group  basic animated">
              <div class="input-wrapper">
                <label class="label" for="pid">รหัสประชาชน</label>
                <input class="form-control ps-1" type="number" name="pid" id="pid" placeholder="รหัสประชาชน" required="" step="1" min="1000000000000" max="9999999999999" >
                <i class="clear-input pe-3">
                  <i class="fa-solid fa-circle-xmark"></i>
                </i>
              </div>
            </div>

            <div class="form-group  basic animated">
              <div class="input-wrapper">
                <label class="label" for="username">ชื่อ - นามสกุล</label>
                <input class="form-control ps-1" type="text" name="username" id="username" placeholder="ชื่อ - นามสกุล" required="" >
                <i class="clear-input pe-3">
                  <i class="fa-solid fa-circle-xmark"></i>
                </i>
              </div>
            </div>
            <div class="form-group  basic animated">
              <div class="input-wrapper">
                <label class="label" for="mobile">เบอร์ติดต่อ</label>
                <input class="form-control ps-1" type="text" name="mobile" id="mobile" placeholder="เบอร์ติดต่อ" required="" >
                <i class="clear-input pe-3">
                  <i class="fa-solid fa-circle-xmark"></i>
                </i>
              </div>
            </div>
            <div class="form-group  basic animated">
              <div class="input-wrapper">
                <label class="label" for="position">ตำแหน่ง</label>
                <input class="form-control ps-1" type="text" name="position" id="position" placeholder="ตำแหน่ง" required="" >
                <i class="clear-input pe-3">
                  <i class="fa-solid fa-circle-xmark"></i>
                </i>
              </div>
            </div>

            <div class="input-wrapper mt-3 mb-5">
              <label class="label" for="mcode">หมู่บ้าน/ชุมชน</label>
              <select class='form-control custom-select ps-1'  name="mcode" id="mcode">
                <?php foreach ($mm as $key => $value) { ?>
                  <option value="<?= $key ?>"><?= $value ?></option>
                <?php } ?>
              </select>
            </div>




            <div class="card-footer mt-2">
              <input type="hidden" name='pcode' value="<?= $user["pcode"] ?>">
              <input type="hidden" name='acode' value="<?= @$user["acode"] ?>">
              <input type="hidden" name='tcode' value="<?= @$user["tcode"] ?>">
              <input type="hidden" name='privilege' value="1">
              <input type="hidden" name="action" value="INSERT">
              <button class="btn btn-primary btn-block" type="submit">บันทึก</button>
            </div>

          </div>

        </div>
      </form>
    </div>

  </div>


  <!-- footer content -->
  <?php require '../../require/footer_user.php'; ?>
  <!-- /footer content -->