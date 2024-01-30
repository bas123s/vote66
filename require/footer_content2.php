<?php if (isset($_REQUEST["a"])) { ?>
  <script>
    $(document).ready(function () {
      notification('notification-12', 5000);
    });

  </script>
<?php } ?>

<!-- ios style 12 -->
<div id="notification-12" class="notification-box  tap-to-close">
  <div class="notification-dialog ios-style">
    <div class="notification-header">
      <div class="in ps-1">
        <i class="fa-solid fa-circle-exclamation"></i>
        <div class="h6 pt-1 ps-1">ปิดอัตโนมัติใน 5 วินาที.</div>
      </div>
      <div class="right">
        <!--<span>5 mins ago</span>-->
        <a href="#" class="close-button">
          <i class="fa-solid fa-circle-xmark"></i>
        </a>
      </div>
    </div>
    <div class="notification-content">
      <div class="in col-12">
        <div class="text h5 text-center pt-2"><?= $_REQUEST["a"] ?></div>
      </div>
    </div>
  </div>
</div>
<!-- * ios style 12 -->


<!-- app footer -->
<div class="appFooter pb-5">
  <div class="footer-title">
    ศูนย์สารสนเทศเพื่อการบริหารงานปกครอง
  </div>
  กรมการปกครอง กระทรวงมหาดไทย
  <br><br><br>
</div>
<!-- * app footer -->

</div>
<!-- * App Capsule -->


<!-- App Bottom Menu -->
<?php require 'appbottommenu.php'; ?>
<!-- * App Bottom Menu -->

<!-- App Sidebar -->
<?php require 'appsidebar.php'; ?>
<!-- * App Sidebar -->







<!--<div id="cookiesbox" class="offcanvas offcanvas-bottom cookies-box" tabindex="-1" data-bs-scroll="true"
     data-bs-backdrop="false">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">We use cookies</h5>
  </div>
  <div class="offcanvas-body">
    <div>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non lacinia quam. Nulla facilisi.
      <a href="#" class="text-secondary"><u>Learn more</u></a>
    </div>
    <div class="buttons">
      <a href="#" class="btn btn-primary btn-block" data-bs-dismiss="offcanvas">I understand</a>
    </div>
  </div>
</div>-->

<!-- ========= JS Files =========  -->
<!-- Bootstrap -->
<script src="../../template/tqm/assets/js/lib/bootstrap.bundle.min.js"></script>
<!-- Splide -->
<script src="../../template/tqm/assets/js/plugins/splide/splide.min.js"></script>
<!-- Base Js File -->
<script src="../../template/tqm/assets/js/base.js"></script>

<script type="text/javascript" src="../../vendor/components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../../vendor/datatables/datatables/media/js/jquery.js"></script>
<script type="text/javascript" src="../../vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>


</body>

</html>
<?php
//$mc = null; ?>