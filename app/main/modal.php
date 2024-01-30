<?php
$title = "หน้าหลัก";
require '../../require/head_php.php';
require '../../require/head_html.php';
?>


<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">

    <div class="content-body">
      <section id="modal-examples">
        <div class="row">
          <!-- share project card -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <i data-feather="file-text" class="font-large-2 mb-1"></i>
                <h5 class="card-title">Share Project</h5>
                <p class="card-text">Elegant Share Project options modal popup example, easy to use in any page.</p>

                <!-- modal trigger button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shareProject">
                  Show
                </button>
              </div>
            </div>
          </div>
          <!-- / share project card -->

        </div>
      </section>
      <!-- begin modal -->
      <div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa-solid fa-gear"></i> ระบบ</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><?= @$_REQUEST["a"] ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- / end modal -->

    </div>
  </div>
</div>
<!-- END: Content-->


<?php
require '../../require/footer_content.php';
?>
<?php if (isset($_REQUEST["a"])) { ?>
  <script type="text/javascript">
    window.onload = () => {
      $('#shareProject').modal('show');
    };
  </script>
  <?php
}?>