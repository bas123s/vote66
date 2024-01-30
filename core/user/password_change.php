<?php
$title = "แก้ไขรหัสผ่าน";
$module_name = "ข้อมูลส่วนตัว";
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ menu ที่นี่
//$covid19->check_variable();
?>

<!-- แก้ไขแบบฟอร์มที่นี่ -->
<div class="row">
  <div class="col-md-4 offset-md-4">
    <div class="card">

      <div class="card-header">
        <h2>เปลี่ยนรหัสผ่าน</h2>
      </div>

      <div class="card-body">
        <!--        <form action="password.php"  method="POST">
                  <input type="hidden" name="x" value="h" >
                    <input type="text" name="password" id="password" value="" class="w3-input w3-margin-bottom w3-xlarge" placeholder="กรุณากรอกรหัสผ่าน" onkeypress="btn(this.value);" onchange="btn(this.value);">
                      <button class="w3-button w3-block w3-theme-d1 w3-xlarge w3-margin-bottom" id="btn1" disabled>ยืนยันการเปลี่ยนรหัสผ่าน</button>
                      </form>-->


        <form class="auth-reset-password-form mt-2" action="password.php"  method="POST" novalidate="novalidate">
          <input type="hidden" name="x" value="h" >
            <div class="mb-1">
              <!--< ?= $_SESSION[session_id()][$mc->app_id]['mem_id'] ?>-->
              <div class="d-flex justify-content-between">
                <label class="form-label" for="reset-password-new">รหัสผ่านใหม่</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="reset-password-new" name="password" placeholder="············" aria-describedby="reset-password-new" tabindex="1" autofocus="">
                  <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
              </div>
            </div>
            <div class="mb-1">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="reset-password-confirm">ยืนยันรหัสผ่านใหม่</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="reset-password-confirm" placeholder="············" aria-describedby="reset-password-confirm" tabindex="2">
                  <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
              </div>
            </div>
            <button class="btn btn-primary w-100 waves-effect waves-float waves-light mt-3" tabindex="3" id="btn1" >เปลี่ยนรหัสผ่าน</button>
        </form>
      </div>

      <!--      <footer class="w3-container w3-blue">
              <h5>Footer</h5>
            </footer>-->

    </div>
  </div>
</div>


<?php
//$drug->check_array($data, "data");
//$drug->check_array($user, "user");
//$drug->check_variable();
?>
<!-- ปิดแก้ไขแบบฟอร์มที่นี่ -->

<?php require '../../require/footer_js.php'; ?>
<!--เปิดแก้ไข javascript ที่นี่-->
<!--<script>
  function btn(val) {
    if (val.length > 0) {
      document.getElementById("btn1").disabled = false;
    } else {
      document.getElementById("btn1").disabled = true;
    }
  }
</script>-->
<!--ปิดแก้ไข javascript ที่นี่-->


<script src="../../template/app-assets/js/scripts/pages/auth-reset-password.js"></script>

<!-- footer content -->
<?php require '../../require/footer_content.php'; ?>
<!-- /footer content -->