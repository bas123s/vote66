<!DOCTYPE html>
<html>
  <title><?= $main_class->app_name ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="../../require/css/w3.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">-->
  <link rel="stylesheet" href="../../require/css/google_fonts.css">
  <!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
  <script src='../../require/js/a076d05399.js'></script>
  <!--<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">-->
  <link rel="stylesheet" href="../../require/fa/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../require/DataTables/datatables.min.css"/>
  <script type="text/javascript" src="../../require/DataTables/datatables.min.js"></script>
  <link rel="stylesheet" href="../../require/css/Chart.min.css" />
  <script type="text/javascript" src="../../require/js/Chart.min.js"></script>
  <!--<link rel="stylesheet" href="../../require/css/w3-theme-cyan.css">-->
  <link rel="stylesheet" href="<?= $main_class->app_theme ?>">
  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Prompt', sans-serif;}
  </style>
  <style>
    .ot{
      /*orientation_text*/
      /*      -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);*/
      /*writing-mode: tb-rl;*/
      writing-mode: vertical-rl;
    }
    .txt_ver90{
      -webkit-transform: rotate(-90deg);
      -moz-transform:  rotate(-90deg);
      transform:  rotate(-90deg);
      white-space:nowrap;
    }
  </style>
  <body class="w3-theme-light">
    <!--    <div class="w3-top w3-display">
          <div class="w3-display-topmiddle  w3-black">
            <img src="../../require/images/logo.png" style="width:100px; ">
          </div>
        </div>-->
    <!-- Top container -->

    <div class="w3-top">

      <?php
      /**
       *
       *
       * แก้ไข menu ในไฟล์  menuconfig.php
       *
       *
       *
       * */
      require 'menuconfig.php';
      ?>

      <!-- Top container -->

      <div class="w3-bar <?= $menu_bar["css"] ?>"   style="height: 45px; <?= $menu_bar["style"] ?>">

        <!--<img src="../../require/images/logo.png" style="width:100px;" class="w3-display-topmiddle w3-margin-right w3-margin-top">-->
        <div class="w3-display-topleft">
          <a href="../main/" class="w3-bar-item w3-button w3-large ">หน้าหลัก</a>

          <?php
          foreach ($menubar as $key => $value) {
            if (!isset($value["menu_privilege"])) {
              $value["menu_privilege"] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            }
            if (in_array($user["privilege"], $value["menu_privilege"])) {
              if ($value["dropdown"] === "1") {
                ?>
                <div class="w3-dropdown-hover w3-hide-small ">
                  <button class="w3-button w3-large "><?= $value["label"] ?></button>
                  <div class="<?= $value["css"] ?>" style="<?= $value["style"] ?>">
                    <?php
                    foreach ($value["data"] as $key2 => $value2) {
                      if (!isset($value2["menu_privilege"])) {
                        $showmenu = true;
                      } else {
                        if (in_array($user["privilege"], $value2["menu_privilege"])) {
                          $showmenu = true;
                        } else {
                          $showmenu = false;
                        }
                      }
                      if ($showmenu === true) {
                        ?>
                        <a href="<?= $value2["link"] ?>" class="<?= $value2["css"] ?>"  style="<?= $value2["style"] ?>"><?= $value2["label"] ?></a>
                        <?php
                      }
                    }
                    ?>
                  </div>
                </div>
                <?php
              } else {
                echo"<a href='" . $value["link"] . "' class='w3-bar-item w3-button w3-hide-small w3-large " . $value["css"] . " ' style=' " . $value["style"] . "'>" . $value["label"] . "</a>";
              }
            }
          }
          ?>
          <!--<a href="../main/" class="w3-bar-item w3-button w3-large ">แผนที่</a>-->
          <a href="javascript:void(0)" class="w3-bar-item w3-button w3-left w3-hide-large w3-hide-medium" onmouseover="MenuBar()" >&#9776;</a>
        </div>
        <div class="w3-display-topright">
          <div class="w3-dropdown-hover  ">
            <button class="w3-button w3-large <?= $menu_bar["css"] ?>"><?= $user["username"] ?></button>
            <div class=" w3-dropdown-content w3-bar-block w3-card-4 " style=" ">
              <a href="../user/update_profile.php" class="w3-bar-item w3-button w3-large ">แก้ไขข้อมูล</a>
              <a href="../user/password_change.php" class="w3-bar-item w3-button w3-large ">เปลี่ยนรหัสผ่าน</a>
              <a href="../user/password.php" class="w3-bar-item w3-button w3-large ">ออกจากระบบ</a>
            </div>
          </div>

          <!--<a href="../user/password.php" class="w3-bar-item w3-button w3-large ">ออกจากระบบ</a>-->
        </div>
      </div>

      <div id="menubar" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-animate-left <?= $menu_bar["css"] ?>" style=" <?= $menu_bar["style"] ?>">
        <?php
        foreach ($menubar as $key => $value) {
          if (!isset($value["menu_privilege"])) {
            $value["menu_privilege"] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
          }
          if ($value["dropdown"] === "1") {
            if (in_array($user["privilege"], $value["menu_privilege"])) {
              ?>
              <div class="w3-dropdown-hover">
                <button class="w3-button w3-theme-pantone2 w3-large "><?= $value["label"] ?></button>
                <div class="<?= $value["css"] ?>" style="<?= $value["style"] ?>">
                  <?php
                  foreach ($value["data"] as $key2 => $value2) {
                    if (!isset($value2["menu_privilege"])) {
                      $value2["menu_privilege"] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                    }
                    if (in_array($user["privilege"], $value2["menu_privilege"])) {
                      ?>
                      <a href="<?= $value2["link"] ?>" class="<?= $value2["css"] ?>"  style="<?= $value2["style"] ?>"><?= $value2["label"] ?></a>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
              <?php
            }
          } else {
            if (in_array($user["privilege"], $value["menu_privilege"])) {
              echo"<a href='" . $value["link"] . "' class='w3-bar-item w3-button'>" . $value["label"] . "</a>";
            }
          }
        }
        ?>
      </div>

      <script>
        function MenuBar() {
          var x = document.getElementById("menubar");
          if (x.className.indexOf("w3-show") === -1) {
            x.className += " w3-show";
          } else {
            x.className = x.className.replace(" w3-show", "");
          }
        }
      </script>
    </div>

    <div class="w3-main" style="">
      <div style="padding-top:20px">&nbsp;</div>
      <?php require 'apphead.php'; ?>
      <div style="padding-top:40px">&nbsp;</div>
