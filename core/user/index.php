<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../template/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../template/app-assets/images/ico/favicon.ico">
    <!--<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">-->
    <link href="../../require/google_font.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/assets/css/style.css">
    <!-- END: Custom CSS-->


    <!-- Font Awesome Solid + Brands -->
    <link href="../../vendor/components/font-awesome/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome Solid + Brands -->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="vertical-layout bg-black vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-basic px-2">
            <div class="auth-inner my-2">
              <!-- Login basic -->
              <div class="card mb-0">
                <div class="card-body pb-5">
                  <a href="index.html" class="brand-logo">
                    <img src="../../require/images/logo_mini.png" class="mb-2" alt="Avatar"
                         style="width:100%; max-width:300px;">
                  </a>

                  <form id='form1' class="auth-login-form mt-2" action="password.php" method="POST">
                    <div class="mb-1">
                      <label for="username" class="form-label fw-bolder">รหัสผู้ใช้งาน</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="กรอกรหัสผู้ใช้งาน"
                             aria-describedby="กรอกรหัสผู้ใช้งาน" tabindex="1" autofocus />
                    </div>

                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                        <label class="form-label fw-bolder" for="password">รหัสผ่าน</label>

                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="password" name="password"
                               tabindex="2"
                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                               aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>




                    <button type="submit" class="btn btn-primary w-100" tabindex="4">เข้าสู่ระบบ</button>
                    <br>
                    <input type="hidden" name="x" value="L">
                    <input type="hidden" name="chx" value="1">


                  </form>


                </div>

              </div>

              <!-- /Login basic -->
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <?php if (isset($_REQUEST["a"])) { ?>
      <!-- begin modal -->
      <div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa-solid fa-gear"></i> ระบบ</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>
              <h4>
                <?= @$_REQUEST["a"] ?>
              </h4>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                  class="fa-regular fa-circle-xmark"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- / end modal -->
    <?php } ?>


    <!-- BEGIN: Vendor JS-->
    <script src="../../template/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../template/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../template/app-assets/js/core/app-menu.js"></script>
    <script src="../../template/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../template/app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load', function () {
        if (feather) {
          feather.replace({
            width: 14,
            height: 14
          });
        }
      })
    </script>


    <?php if (isset($_REQUEST["a"])) { ?>
      <script type="text/javascript">
        window.onload = () => {
          $('#shareProject').modal('show');
        };
      </script>
    <?php } ?>
  </body>
</body>
<!-- END: Body-->

</html>