<!DOCTYPE html>
<html>
  <title><?= $mc->app_name ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="../../vendor/components/jquery/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../../vendor/datatables/datatables/media/css/jquery.dataTables.min.css"/>
  <script type="text/javascript" src="../../vendor/datatables/datatables/media/js/jquery.js"></script>
  <script type="text/javascript" src="../../vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../../vendor/w3css/w3.css">
  <link rel="stylesheet" href="../../vendor/googlefont/css.css?family=Sarabun">
  <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/all.min.css">
  <!--  <link rel="stylesheet" href="../../vendor/css/Chart.min.css" />
    <script type="text/javascript" src="../../vendor/js/Chart.min.js"></script>-->
  <link rel="stylesheet" href="<?= $mc->app_theme ?>">
<!--  <style>
    html,body,h1,h2,h3,h4,h5,h6,hr,div,span,a,button,input {font-family:  'Prompt', sans-serif;}
  </style>-->
  <style>
    body {
      font-family: 'Sarabun';
    }
  </style>

  <body class="w3-theme-l4">
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
          <a href="../../app/main/" class="w3-bar-item w3-button w3-large "><i class="fas fa-home"></i> หน้าหลัก</a>

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
            <button class="w3-button w3-large <?= $menu_bar["css"] ?>" style=" min-width: 200px;"><i class="fas fa-user"></i> <?= $user["username"] ?></button>
            <div class=" w3-dropdown-content w3-bar-block w3-card-4 " style=" ">
              <div class="w3-center w3-large w3-theme-l3 w3-padding-16">
                <?= @$app_privilege[@$user["privilege"]] . "<br>"; ?>
                <?= (@$user["privilege"] < 4) ? @$user["aname"] . "<br>" : ""; ?>
                <?= @$user["pname"] ?>
              </div>
              <a href="../../core/user/update_profile.php" class="w3-bar-item w3-button w3-large "style=" min-width: 200px;"><i class="fas fa-user-edit"></i> แก้ไขข้อมูล</a>
              <a href="../../core/user/password_change.php" class="w3-bar-item w3-button w3-large "style=" min-width: 200px;"><i class="fas fa-key"></i> เปลี่ยนรหัสผ่าน</a>
              <a href="../../core/user/password.php" class="w3-bar-item w3-button w3-large "style=" min-width: 200px;"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
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
