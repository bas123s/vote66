
<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item">
          <a class="nav-link menu-toggle is-active" href="../../app/main/"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
          </a>
        </li>
      </ul>
      <span class="text-primary display-6 fw-bolder"><img class="round" src="../../require/images/logo_mini.png" alt="avatar" height="38" width="38"> <?= $app_name ?></span>

    </div>
    <ul class="nav navbar-nav align-items-center ms-auto">
      <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

<!--      <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 me-auto">Notifications</h4>
              <div class="badge rounded-pill badge-light-primary">6 New</div>
            </div>
          </li>
          <li class="scrollable-container media-list"><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar"><img src="../../template/app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                </div>
              </div>
            </a><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar"><img src="../../template/app-assets/images/portrait/small/avatar-s-3.jpg" alt="avatar" width="32" height="32"></div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                </div>
              </div>
            </a><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar bg-light-danger">
                    <div class="avatar-content">MD</div>
                  </div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                </div>
              </div>
            </a>
            <div class="list-item d-flex align-items-center">
              <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
              <div class="form-check form-check-primary form-switch">
                <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                  <label class="form-check-label" for="systemNotification"></label>
              </div>
            </div><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar bg-light-danger">
                    <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                  </div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
                </div>
              </div>
            </a><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar bg-light-success">
                    <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                  </div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                </div>
              </div>
            </a><a class="d-flex" href="#">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar bg-light-warning">
                    <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                  </div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
        </ul>
      </li>-->
      <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav d-sm-flex d-none">
            <span class="user-name fw-bolder"><?= @$user["username"] ?></span>
            <span class="user-status"><?= @$app_privilege[@$user["privilege"]] ?></span>
          </div>
<!--          <span class="avatar"><img class="round" src="../../template/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
            <span class="avatar-status-online"></span></span>-->

          <span class="text-primary"><i class="fa-solid fa-user-secret fa-2x"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
          <a class="dropdown-item" href="../../core/user/update_profile.php"><i class="fa-solid fa-user-secret fa-2x"></i> ข้อมูลส่วนตัว</a>
          <a class="dropdown-item" href="../../core/user/password_change.php"><i class="fa-solid fa-key fa-2x"></i> เปลี่ยนรหัสผ่าน</a>
          <a class="dropdown-item" href="../../core/user/password.php"><i class="fa-solid fa-power-off fa-2x"></i> ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center"><a href="#">
      <h6 class="section-label mt-75 mb-0">Files</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="me-75"><img src="../../template/app-assets/images/icons/xls.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
        </div>
      </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="me-75"><img src="../../template/app-assets/images/icons/jpg.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="me-75"><img src="../../template/app-assets/images/icons/pdf.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="me-75"><img src="../../template/app-assets/images/icons/doc.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
        </div>
      </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
    </a></li>
  <li class="d-flex align-items-center"><a href="#">
      <h6 class="section-label mt-75 mb-0">Members</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
      <div class="d-flex align-items-center">
        <div class="avatar me-75"><img src="../../template/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
      <div class="d-flex align-items-center">
        <div class="avatar me-75"><img src="../../template/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
      <div class="d-flex align-items-center">
        <div class="avatar me-75"><img src="../../template/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
      <div class="d-flex align-items-center">
        <div class="avatar me-75"><img src="../../template/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
        </div>
      </div>
    </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
    </a></li>
</ul>-->
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="../../app/main/">
          <span ><img class="round" src="../../require/images/logo_mini.png" alt="avatar" height="38" width="38"></span>
          <h2 class="brand-text"><?= @$app_name ?></h2>
        </a></li>
      <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>


  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <!--      <li class=" nav-item">
              <a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
              <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
                </li>
              </ul>
            </li>-->

      <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/main/"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">หน้าหลัก</span></a></li>

      <!--      <li class=" nav-item">
              <a class="d-flex align-items-center" href="index.html"><i data-feather="save"></i><span class="menu-title text-truncate" data-i18n="Dashboards">บันทึกข้อมูล</span> </a>
              <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">บันทึกข้อมูล 1</span></a>
                </li>
                <li class="active"><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">บันทึกข้อมูล 2</span></a>
                </li>
              </ul>
            </li>-->


      <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/place/"><span class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-location-dot"></i>สถานที่จับกุม</span></a></li>

      <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/place/"><span class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-handcuffs"></i> ผู้ถูกควบคุมตัว</span></a></li>

      <li class=" nav-item"><a class="d-flex align-items-center" href="../../template/html/ltr/vertical-menu-template/index.html" target="__blank"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Charts">หน้าตัวอย่าง</span></a></li>

    </ul>
  </div>

</div>
<!-- END: Main Menu-->




<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">

      <!--start content-->

      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">

          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main/index.php">หน้าหลัก</a></li>
                    <?php
                    // /2023_template/app/main/index.php
                    $dir = getcwd();

                    if ($dir !== "/usr/share/nginx/html/0308/arrest/app/main") {
                      if (!isset($module_name)) {
                        $module_name = "หน้าหลักโมดูล";
                      }
                      echo "<li class='breadcrumb-item'><a href='index.php'>$module_name</a></li>";
                      if (basename($_SERVER["PHP_SELF"]) !== "index.php") {
                        if (!isset($title)) {
                          $title = "หน้าปัจจุบัน";
                        }
                        echo "<li class='breadcrumb-item active'><b>" . $title . "</b></li>";
                      }
                    }
                    ?>
                  </ol>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="content-body">