<?php
$menu_config = [
    [
        "title" => "บันทึกข้อมูลการควบคุมตัว",
        "url" => "../../app/detainee/",
        "icon_class" => "fa-solid fa-handcuffs", //fontawesome class
        "show" => [
            [
                "ministry_id" => "15",
                "privilege" => [1],
            ],
            [
                "ministry_id" => "all",
                "privilege" => [2],
            ],
        ],
        "hide" => [
            [
                "ministry_id" => "29006",
            ],
        ],
    ],
];
?>
<!-- BEGIN: Header-->

<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item">
          <a class="nav-link menu-toggle is-active" href="../../app/main/"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
          </a>
        </li>
      </ul>
      <img class="rounded float-start" src="../../require/images/logo_mini.png" alt="avatar" height="60" width="60">
        <span ><h4 class="text-secondary ms-2"><b>ระบบรับแจ้งการควบคุมตัว ตามพระราชบัญญิติป้องกันและปราบปราม <br>การทรมานและการกระทำให้บุคคลสูญหาย พ.ศ. 2565</b></h4></span>

    </div><br><br>

        <ul class="nav navbar-nav align-items-center ms-auto">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

          <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name fw-bolder">
                  <?= @$user["username"] ?>
                </span>
                <span class="user-status">
                  <?= @$app_privilege[@$user["privilege"]] ?>
                </span>
                <span class="user-status">
                  <?= @$user["division"]; ?>
                </span>
              </div>


              <span class="text-secondary"><i class="fa-solid fa-user-secret fa-2x"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
              <?php if ($user["privilege"] === "9") { ?>
                <a class="dropdown-item" href="../../core/user/user_manage.php"><i class="fa-solid fa-users-gear fa-2x"></i>
                  ข้อมูลส่วนตัว</a>
              <?php } ?>
              <a class="dropdown-item" href="../../core/user/update_profile.php"><i
                  class="fa-solid fa-user-secret fa-2x"></i> ข้อมูลส่วนตัว</a>
              <a class="dropdown-item" href="../../core/user/password_change.php"><i class="fa-solid fa-key fa-2x"></i>
                เปลี่ยนรหัสผ่าน</a>
              <a class="dropdown-item" href="../../core/user/password.php"><i class="fa-solid fa-power-off fa-2x"></i>
                ออกจากระบบ</a>
            </div>
          </li>
        </ul>
        </div>
        </nav>
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
          <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
              <li class="nav-item me-auto">
                <a class="navbar-brand" href="../../app/main/">
                  <span><img class="round" src="../../require/images/logo_mini.png" alt="avatar" height="38" width="38"><img
                        class="round" src="../../require/images/logo_2.png" alt="avatar" height="38" width="38"></span>
                        <h2 class="brand-text"></h2>
                        </a>
                        </li>
                        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                              class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                              class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                              data-ticon="disc"></i></a></li>
                        </ul>
                        </div>
                        <div class="shadow-bottom"></div>


                        <div class="main-menu-content">
                          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                            <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/main/"><i
                                  class="fa-solid fa-home"></i><span class="menu-title text-truncate"
                                  data-i18n="Dashboards">หน้าหลัก</span></a>
                            </li>
                            <?php
                            if (($user["ministry_id"] != "29006")) {
                              if (in_array($user["privilege"], ["1", "2", "7"], false)) {
                                if ((($user["privilege"] == "1") && ($user["ministry_id"] == "15")) || ($user["privilege"] == "2") && ($user["ministry_id"] != "15")) {
                                  ?>
                                  <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/detainee/"><span class="menu-title text-truncate" data-i18n="Charts">
                                        <i class="fa-solid fa-handcuffs"></i> บันทึกข้อมูลการควบคุมตัว</span></a>
                                  </li>
                                  <li class=" nav-item">
                                    <a class="d-flex align-items-center" href="../../app/place/"><span class="menu-title text-truncate" data-i18n="Charts">
                                        <i class="fa-solid fa-taxi "></i> รายงานการควบคุมตัว</span></a>
                                  </li>
                                  <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/report_officer/"><span
                                        class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-bullhorn"></i>
                                        รายชื่อเจ้าหน้าที่ผู้รับผิดชอบ
                                        <?= @$idcallcenter["id"] ?>
                                      </span></a>
                                  </li>
                                  <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/report_callcenter/" target="__blank"><i class="fa-solid fa-envelopes-bulk"></i>
                                      <span class="menu-title text-truncate"  ta-i18n="Charts">สถิติการควบคุมตัว</span></a>
                                  </li>
                                  <?php
                                }
                              }
                            }
                            ?>


                            <?php
                            if (in_array($user["privilege"], ["2", "5", "7"], TRUE)) {
                              if ($user["ministry_id"] != "25007" && $user["ministry_id"] != "16") {
                                ?>

                                <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/rep/"><span
                                      class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-file"></i>
                                      บันทึกรับแจ้งการควบคุมตัว<div id="notification" align="left" class="badge rounded-pill bg-primary"
                                                                    style="margin-left: 10px;"><?= @$data['count'] ?></div></span></a>
                                </li>
                                <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/rep/report_arrest.php"><span
                                      class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-envelopes-bulk"></i>
                                      รายงานการรับแจ้งการควบคุมตัว</span></a>
                                </li>
                                <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/report_callcenter/" target="__blank"><i class="fa-solid fa-envelopes-bulk"></i>
                                    <span class="menu-title text-truncate"  ta-i18n="Charts">สถิติการรับแจ้ง</span></a>
                                </li>
                                <?php
                              }
                            }
                            ?>


                            <?php if (in_array($user["privilege"], ["3", "6", "8", "9"], TRUE)) { ?>
                              <li class=" nav-item"><a class="d-flex align-items-center" href="../../core/add_user/form.php" target="__blank"><i
                                    class="fa-solid fa-user-pen"></i><span class="menu-title text-truncate"
                                    data-i18n="Charts">จัดการผู้ใช้งาน</span></a>
                              </li>
                            <?php } ?>

                            <?php if (in_array($user["privilege"], ["8", "9"], TRUE)) { ?>
                                                                                              <!--                                          <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/org/" target="__blank"><i
                                                                                                                                              class="fa-solid fa-users-gear"></i> <span class="menu-title text-truncate"
                                                                                                                                              data-i18n="Charts">จัดการหน่วยงาน</span></a>
                                                                                                                                        </li>-->
                            <?php } ?>


                            <?php if ($user["privilege"] == "9") { ?>
                              <li class=" nav-item"><a class="d-flex align-items-center"
                                                       href="../../template/html/ltr/vertical-menu-template/index.html" target="__blank"><i
                                    data-feather="calendar"></i><span class="menu-title text-truncate"
                                    data-i18n="Charts">หน้าตัวอย่าง</span></a>
                              </li>
                            <?php } ?>
                            <?php
                            if ($user["ministry_id"] == "15") {
                              if (in_array($user["privilege"], ["3", "7", "8", "9"], TRUE)) {
                                ?>
                                <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/callcenter/"><span
                                      class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-building-shield"></i>
                                      ศูนย์รับแจ้งการควบคุมตัว</span></a>
                                </li>
                                <?php
                              }
                            }
                            ?>
                            <li class=" nav-item"><a class="d-flex align-items-center" href="../../app/main/contact.php"><span
                                  class="menu-title text-truncate" data-i18n="Charts"><i class="fa-solid fa-circle-question"></i>
                                  ติดต่อสอบถาม</span></a>
                            </li>

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

                                  <div class="content-header-left col-md-9 col-12 mb-2 mt-2">
                                    <div class="row breadcrumbs-top">
                                      <div class="col-12">
                                        <div class="breadcrumb-wrapper">
                                          <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="../../app/main/index.php"><b>หน้าหลัก</b></a></li>
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