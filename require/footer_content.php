</div></div>

<!--end content-->

</div></div></div>
<!-- END: Content-->

<?php if (isset($_REQUEST["a"])) { ?>
  <!-- begin modal -->
  <div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa-solid fa-gear"></i><?= @$app_name ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><h4><?= @$_REQUEST["a"] ?></h4></p>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- / end modal -->
<?php } ?>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<!--<footer class="footer footer-static footer-light text-center">
  <div class="footer-title text-primary lead">
    <i class="fa-solid fa-copyright"></i> สำนักการสอบสวนและนิติการ กรมการปกครอง<br>
    <i class="fa-solid fa-copyright"></i> ศูนย์สารสนเทศเพื่อการบริหารงานปกครอง
  </div>
</footer>-->
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->



<!-- BEGIN: Vendor JS-->
<script src="../../template/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- BEGIN: Page Vendor JS-->
<!-- <script src="../../template/app-assets/vendors/js/charts/apexcharts.min.js"></script> -->
<script src="../../template/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../../template/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="../../template/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../template/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="../../template/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<script src="../../template/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../template/app-assets/js/core/app-menu.js"></script>
<script src="../../template/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- <script src="../../template/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script> -->
<script src="../../template/app-assets/js/scripts/pages/modal-add-new-cc.js"></script>
<script src="../../template/app-assets/js/scripts/pages/page-pricing.js"></script>
<script src="../../template/app-assets/js/scripts/pages/modal-add-new-address.js"></script>
<script src="../../template/app-assets/js/scripts/pages/modal-create-app.js"></script>
<script src="../../template/app-assets/js/scripts/pages/modal-two-factor-auth.js"></script>
<script src="../../template/app-assets/js/scripts/pages/modal-edit-user.js"></script>
<script src="../../template/app-assets/js/scripts/pages/modal-share-project.js"></script>
<!--  แก้ไข toast ที่นี่  -->
<!-- END: Page JS-->

<!-- BEGIN: Page Vendor JS-->
<!--<script src="../../vendor/components/jquery/jquery.min.js"></script>-->
<!--<script src="../../template/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="../../template/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
-->
<script src="../../template/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

<script src="../../require/datatable/jquery-3.6.4.min.js"></script>
<!--<link href="../../require/datatable/bootstrap.min.css" rel="stylesheet"/>
<link href="../../require/datatable/datatables.min.css" rel="stylesheet"/>-->
<script src="../../require/datatable/bootstrap.bundle.min.js"></script>
<script src="../../require/datatable/datatables.min.js"></script>
<!-- END: Page Vendor JS-->

<script>
  $(window).on('load', function () {
    if (feather) {
      feather.replace({
        width: 14,
        height: 14
      });
    }
  });
</script>


<?php if (isset($_REQUEST["a"])) { ?>
  <script type="text/javascript">
    window.onload = () => {
      $('#shareProject').modal('show');
    };
  </script>
<?php } ?>
</body>
<!-- END: Body-->

</html>