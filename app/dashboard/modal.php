
<?php
if (isset($_REQUEST["username"]) || isset($_SESSION["username"])) {
  $_SESSION["username"] = $_REQUEST["username"];
} else {
  ?>
  <!-- begin modal -->
  <div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <!--            <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>-->
        <div class="modal-body card mb-0">
          <!--<div class="card mb-0">-->
          <div class="card-body pb-2">
            <img src="../../require/images/logo_mini.png" class="mb-2" alt="Avatar" style="width:100%; max-width:300px;">


            <form id="form1" class="auth-login-form mt-2" action="" method="POST">
              <div class="mb-1">
                <label for="username" class="form-label fw-bolder">รหัสผู้ใช้งาน</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="กรอกรหัสผู้ใช้งาน" aria-describedby="กรอกรหัสผู้ใช้งาน" tabindex="1" autofocus="">
              </div>
              <button type="submit" class="btn btn-primary w-100 waves-effect waves-float waves-light mt-3" tabindex="4">เข้าสู่ระบบ</button>
            </form>

            <!--</div>-->
          </div>
        </div>
        <!--            <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>-->
      </div>
    </div>
  </div>
  <!-- / end modal -->

  <script type="text/javascript">
    $(window).on('load', function () {
      $('#shareProject').modal('show');
    });
  </script>
<?php } ?>
