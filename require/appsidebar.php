<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-0 ">
        <!-- profile box -->
        <div class="profileBox pt-2 pb-2">
          <div class="icon-box ">
            <i class="fa-solid fa-user-tie fa-3x me-1"></i>
          </div>
          <div class="in">
            <strong><?= $user["username"] ?></strong>
            <div class="text-muted"><?= $mc->hide_pid($user["pid"]) ?></div>
          </div>
          <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
            <i class="fa-regular fa-circle-xmark fa-2x"></i>
          </a>
        </div>
        <!-- * profile box -->
        <!-- balance -->
        <div class="sidebar-balance text-center border-3">
          <div class="icon-box pt-5 pb-3">
            <!--<i class="fa-solid fa-building-columns fa-4x mt-2"></i>-->
            <!--<img src="../../require/images/thai_mini.png" class="" alt="Avatar" style="width:100%; max-width:80px;" >-->
            <img src="../../require/images/certificate3.png" class="mb-2" alt="Avatar" style="width:100%; max-width:200px;" >
          </div>
          <div class="listview-title">
            <!--< ?= (isset($user["tname"])) ? "ตำบล" . $user["tname"] : "" ?>-->
            <?= (isset($user["aname"])) ? $user["aname"] . "<br>" : "" ?>
            <?= (isset($user["pname"])) ? $user["pname"] . "<br>" : "" ?>
            <?= (isset($user["org"])) ? $user["org"] . "<br>" : "" ?>
            <!--< ?= (isset($user["org_eng"])) ? $user["org_eng"] . "<br>" : "" ?>-->
          </div>
          <div class="in">
            <h3 class="amount lh-base">
              สิทธิ์ : <?= $mc->show_privilege($user); ?>
            </h3>
          </div>
        </div>
        <!-- * balance -->



        <!-- menu -->
        <div class="listview-title mt-1">เมนู</div>
        <ul class="listview flush transparent no-line image-listview">



          <li>
            <a href="../../core/user/update_profile.php" class="item">
              <div class="icon-box">
                <i class="fa-solid fa-user-pen text-secondary"></i>
              </div>
              <div class="in">
                แก้ไขประวัติ
              </div>
            </a>
          </li>
          <?php if ($user["privilege"] > 7) { ?>
            <li>
              <a href="../../core/user/user_manage.php" class="item">
                <div class="icon-box">
                  <i class="fa-solid fa-users text-secondary"></i>
                </div>
                <div class="in">
                  จัดการผู้ใช้งาน
                </div>
              </a>
            </li>

          <?php } ?>

          <li>
            <a href="../../core/user/password.php" class="item">
              <div class="icon-box">
                <i class="fa-solid fa-right-from-bracket text-secondary"></i>
              </div>
              <div class="in">
                ออกจากระบบ
              </div>
            </a>
          </li>
        </ul>
        <!-- * menu -->

        <!-- others -->
        <div class="listview-title mt-1">สนับสนุนการปฏิบัติงาน</div>
        <ul class="listview flush transparent no-line image-listview">
          <li>
            <a href="../../app/main/faq.php" class="item">
              <div class="icon-box">
                <i class="fa-regular fa-circle-question"></i>
              </div>
              <div class="in">
                ขั้นตอนการบันทึกข้อมูล
              </div>
            </a>
          </li>
          <li>
            <a href="../../app/main/contact.php" class="item">
              <div class="icon-box">
                <i class="fa-regular fa-comment-dots"></i>
              </div>
              <div class="in">
                ติดต่อเจ้าหน้าที่
              </div>
            </a>
          </li>



        </ul>
        <!-- * others -->


        <?php if (($user["privilege"] == 9) || ($user["pid"] == "3102002472231")) { ?>
          <div class="listview-title mt-5">&nbsp;</div>
          <!-- programmer -->
          <div class="listview-title mt-5">สนับสนุนการพัฒนาระบบ</div>
          <ul class="listview flush transparent no-line image-listview">
            <li>
              <a href="../../app/main/chart.php" class="item">
                <div class="icon-box">
                  <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div class="in">
                  ตัวอย่าง chart
                </div>
              </a>
            </li>

            <li>
              <a href="../../template_html/" class="item">
                <div class="icon-box">
                  <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div class="in">
                  ตัวอย่างโค๊ดพัฒนาระบบ
                </div>
              </a>
            </li>
          </ul>
          <!-- *programmer -->

        <?php } ?>
      </div>
    </div>
  </div>
</div>