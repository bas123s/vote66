<?php
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ไข menu ในไฟล์  menuconfig.php
// $mc ชื่อ class ที่ต้องเรียกใช้  .
//
//$mc->check_array($data, "data");  เอาไว้เช็คตัวแปร data ที่ query มาแล้ว .
//
//$mc->check_array($user, "user");  เอาไว้เช็ค userที่ login เข้ามา .
//
//$mc->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
//$sql = "SELECT * FROM `drugreport`.`province` where `pcode` not in ('01','03');";
//$data = $mc->select_3($sql, "pcode", "pname");
//$mc->check_array($data, "data");
require_once ("../../require/response3.php");
?>
<?php
//$mc->check_variable();
//echo $mc->app_id . "<hr>";
//exit();
if (isset($_POST["action"])) {
  $x = $_POST['action'];
  switch ($x) {
    case "reset_password"://reset password
      $mc->reset_password($_POST['mem_id'], "user_manage.php?a=รีเซ็ตรหัสผ่านเรียบร้อยแล้ว");
      //echo "reset_password";
      break;
    case "mem_status"://reset password
      $mc->change_status_member($_POST['mem_id'], $_POST["mem_status"], "user_manage.php");
//        echo $_POST["status_member"] . "<hr>";
      break;
    case "privilege"://reset password
//      $mc->check_variable();
      $mc->update_data("user", ["key" => "mem_id", "value" => $_POST['mem_id']], ["privilege" => $_POST["privilege"]], ["app_id" => $mc->app_id,]);
//      exit();
//        echo $_POST["status_member"] . "<hr>";
      break;
    case "delete_user"://reset password
//      $mc->check_variable();
//      exit();
//      $mc->delete_query($_POST["pid"], "pid", "user");
      $sql = "DELETE FROM `user` WHERE `mem_id` = '" . $_POST["mem_id"] . "' ;";
//      echo $sql . "<hr>";
      $mc->any_query($sql);
      break;
    default:
      session_destroy();
      header("location:index.php");
  }
}
//$mc->check_array($user, "user");
//$mc->check_variable();
if (isset($_REQUEST["pcode"])) {
  $pcode = $_REQUEST["pcode"];
} else {
  $pcode = $user["pcode"];
}

require '../../require/response3.php';
////$sql1 = "SELECT * FROM `type_org`  where   (`type_org_id`<'6')  ORDER BY `type_org_id` ";
////      echo $sql . "<hr>";
////$type_org = $mc->select_3($sql1, 'type_org_id', 'type_org');
////  $mc->check_array($type_org, "type_org");
//$sql2 = "SELECT * FROM `province` ORDER BY `pname`  ";
////      echo $sql . "<hr>";
//$province = $mc->select_3($sql2, 'pcode', 'pname');
////$mc->check_array($province, "province");
//$sql3 = "SELECT * FROM `amphoe` ORDER BY `acode`  ";
////      echo $sql . "<hr>";
//$amphoe = $mc->select_3($sql3, 'acode', 'aname');
////$mc->check_array($amphoe, "amphoe");
?>

<?php
if (isset($_REQUEST["filter"])) {
  $filter_text = " - ";
  switch ($_REQUEST["filter"]) {
    case "2":
      $filter_text .= "ดูเฉพาะอนุมัติการใช้งานแล้ว";
      break;
    case "1":
      $filter_text .= "ดูเฉพาะรอการอนุมัติ " . @$tag;
      break;
    case "0":
      $filter_text .= "ดูเฉพาะระงับการใช้งาน";
      break;
    default:
      $filter_text = "";
      break;
  }
}
?>
<?php
//      $mc->check_array($user, "ข้อมูลตัวแปร \$user <br>");
$condition = " (`app_id`='" . $mc->app_id . "') ";
if ($user["privilege"] !== "9") {
  $condition .= " and (`privilege`<>'9') ";
}

//if (in_array($user["privilege"], ["1"])) {
//  $condition .= " and (`mcode`='" . $user["mcode"] . "') ";
////  $condition .= " and (`privilege`<='" . $user["privilege"] . "') ";
//}

if ($user["privilege"] == "2") {
  $condition .= " and (`lcode`='" . $user["lcode"] . "') ";
  $condition .= " and (`privilege`<='" . $user["privilege"] . "') ";
}

if ($user["privilege"] == "3") {
  $condition .= " and (`tcode`='" . $user["tcode"] . "') ";
  $condition .= " and (`privilege`<='" . $user["privilege"] . "') ";
}

if ($user["privilege"] == "4") {
  $condition .= " and (`acode`='" . $user["acode"] . "') ";
  $condition .= " and (`privilege`<='" . $user["privilege"] . "') ";
}

if (isset($_REQUEST["mem_id"])) {
  $condition .= " and (`mem_id`='" . $_REQUEST["mem_id"] . "') ";
}

if (isset($_REQUEST["filter"])) {
  $condition .= " and (`mem_status`='" . $_REQUEST["filter"] . "') ";
}

if ($user["privilege"] > "4") {
  $sql2 = "SELECT `pcode`,count(`mem_status`) as `cnt` FROM `user` WHERE  " . $condition . " group by `pcode` order by `pcode` ;";
  $data2 = $mc->select_3($sql2, 'pcode', 'cnt');
} else {
  $data2 = [];
}
//$mc->check_array($data2, $sql2);
//      $sql = "select * from `user` where  (`status_member` <> '0') and (`app_id`='0306001') " . $condition . " order by `acode` ";
//if (isset($_REQUEST["pcode"])) {
//  $condition .= " and (`pcode`='" . $_REQUEST["pcode"] . "') ";
//} else {
//  $condition .= " and (`pcode`='" . $user["pcode"] . "') ";
//}
if ($user["privilege"] > "4") {
  $condition .= " and (`pcode`='" . $pcode . "') ";
}
$sql = "SELECT * FROM `user` WHERE  " . $condition . " order by `acode` ;";
$data = $mc->select_all($sql);
//echo "<hr>" . $sql . "<hr>";
//$mc->check_array($data, $sql);
//exit();
?>
<?php
//    if ($user["privilege"] == "9") {
//$status = $mc->conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
//    }
?>

<!-- แก้ไขแบบฟอร์มที่นี่ -->
<div class="section mt-2" >
  <?php //$mc->check_variable();     ?>
  <div class="card col-12  ">
    <div class="card-header text-center ">
      <span class='h3 mt-2'><i class="fas fa-users"></i> จัดการผู้เข้าใช้ระบบ <?= @$filter_text; ?></span>
    </div>
    <div class="card-body">
      <?php if ($user["privilege"] > "7") { ?>
        <label for="pcode" class="label mt-3 text-primary">กรองตามหน่วยงานหลัก</label>
        <form action="" method="POST">
          <select class="form-control custom-select" name="pcode" id="pcode" onchange="this.form.submit()">
            <?php foreach ($province as $key3 => $value3) { ?>
              <option
                value="<?= $key3 ?>"
                <?= ($pcode == $key3) ? " selected " : "  "; ?>
                ><?= $value3 ?>
                  <?= (isset($data2[$key3])) ? " *** " . $data2[$key3] . " คน *** " : ""; ?>
              </option>
            <?php } ?>
          </select>
        </form>
      <?php } ?>

      <?php if ($user["privilege"] > "4") { ?>
        <div class="row mt-3 mb-3">
          <div class="col col-12 btn-group " role="group">
            <a href="?filter=0"  class="btn btn-outline-danger  btn-block"><i class="fas fa-user-times"></i> ผู้ถูกระงับ</a>
            <a href="?filter=1"  class="btn btn-outline-warning  btn-block"><i class="fas fa-hourglass"></i> ผู้รออนุมัติ</a>
            <a href="?filter=2"  class="btn btn-outline-info  btn-block"><i class="fas fa-user-check"></i> ผู้อนุมัติแล้ว</a>
            <a href="?"  class="btn btn-outline-success  btn-block"><i class="fas fa-list-ol"></i> ทั้งหมด</a>
          </div>
        </div>
      <?php } ?>


      <div class="table-responsive">

                    <!--<table id="example9" class="table table-bordered text-black" name="example9" width="100%">-->
        <table id="example" class="table table-striped " name="example" width="100%" >
          <thead class="text-center">
            <tr class=" ">
              <th class="text-center">#</th>
              <th class="text-center">รายละเอียดผู้เข้าใช้ระบบ</th>
              <?php
              if ($user["privilege"] > "3") {
                ?>
                <th class="text-center">สิทธิการใช้งาน</th>
                <th class="text-center">สถานะการใช้งาน</th>
              <?php } ?>
              <th class="text-center">รีเซ็ตรหัสผ่าน</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 1; $i < $user["privilege"]; $i++) {
              if (isset($app_privilege[$i])) {
                $app_option[$i] = $app_privilege[$i];
              }
            }
//          unset($app_option["9"]);
//          $mc->check_array($app_option, "app_option");
            $i = 0;
            foreach ($data as $key => $value) {
              $i++;
              ?>
              <tr  class="w3-hover-blue w3-theme-l5">
                <td class="text-center"><?= $i; ?>
                  <?php if ($user["privilege"] == "9") { ?>
                    <form action="" method="POST">
                      <input type="hidden" name="action" value="delete_user">
                      <input type="hidden" name="pid" value="<?= $value["pid"]; ?>">
                      <div class="row mt-3">
                        <div class="col col-12 btn-group " role="group">
                          <button type="submit" name="delete" onclick="return confirm('ยืนยันการลบ <?= $value["pid"] . ' ' . $value["username"] ?>')" value="2" class="btn btn-danger  btn-block"><i class="fa-solid fa-user-xmark"></i> ลบผู้ใช้งาน</button>
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                </td>
                <td class="w3-left-align"><?=
                  $value["pid"]
                  . "<br>" . $value["username"]
//                . "<br>" . $value["position"]
                  . "<br>" . $amphoe[$value["pcode"]][$value["acode"]]
                  . "<br>" . $province[$value["pcode"]]
                  . "<hr class='text-black h3'>สิทธิการใช้งาน"
                  . "<br>" . $app_privilege[$value["privilege"]];
                  ?>
                  <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#editUser" onclick="update_modal('<?= $value["pid"] ?>');">Show</button>
                </td>
    <!--              <td>< ?= $value["username"]; ?></td>
                <td>< ?= $value["position"]; ?></td>
                <td class="text-left">< ?= $amphoe[$value["acode"]]["pname"] . "<br>" . $amphoe[$value["acode"]]["aname"]; ?></td>-->
                <!--<td>< ?= $type_org[$value["type_org"]]; ?></td>-->
                <?php
                if ($user["privilege"] > "6") {
                  ?>
                  <td>
                    <?php
                    if ($value["privilege"] !== "9") {
                      if ($value["pid"] !== $user["pid"]) {
                        ?>

                        <form action="" method="POST">
                          <input type="hidden" name="action" value="privilege">
                          <input type="hidden" name="mem_status" value="2">
                          <input type="hidden" name="pid" value="<?= $value["pid"]; ?>">

                          <select class="form-control custom-select" name="privilege" onchange="this.form.submit()">
                            <?php foreach ($app_option as $key2 => $value2) { ?>
                              <option value="<?= $key2 . " " . @$data2[$key2]['cnt'] ?>" <?= ($value["privilege"] == $key2) ? " selected " : "  "; ?>><?= $value2 ?></option>
                            <?php } ?>
                          </select>
                        </form>
                        <?php
                      }
                    }
                    ?>
                  </td>
                  <?php
                }
                ?>
                <?php
                if ($user["privilege"] > "3") {
                  $sm = [0 => "ระงับการใช้งาน", 1 => "รอการอนุมัติ", 2 => "อนุมัติการใช้งาน"];
                  $smv = $value["mem_status"];
                  ?>
                  <td class="text-center">
                    สถานะการใช้งานปัจจุบัน : <span class="lead"><?= $sm[$smv] ?></span><br>
                    <?php if ($value["privilege"] !== "9" || $user["privilege"] === "9") { ?>
                      <form action="" method="POST">
                        <input type="hidden" name="action" value="mem_status">
                        <input type="hidden" name="pid" value="<?= $value["pid"]; ?>">
                        <div class="row mt-3 mb-3">
                          <div class="col col-12 btn-group " role="group">
                            <button type="submit" name="mem_status" value="2" class="btn btn-outline-info  btn-block"<?= ($smv === "2") ? " disabled " : "  "; ?>><i class="fas fa-user-check"></i> อนุมัติการใช้งาน</button>
                            <button type="submit"  name="mem_status" value="1" class="btn btn-outline-warning  btn-block"<?= ($smv === "1") ? " disabled " : "  "; ?>><i class="fas fa-hourglass"></i> รอการอนุมัติ</button>
                            <button type="submit"  name="mem_status"  value="0" class="btn btn-outline-danger  btn-block"<?= ($smv === "0") ? " disabled " : "  "; ?>><i class="fas fa-user-times"></i> ระงับการใช้งาน</button>
                          </div>
                        </div>
                      </form>
                    <?php } ?>
                  </td>
                <?php } ?>
                <td class="text-center">
                  <?php if ($value["password"] !== "e406bb0da445882fb812666cdb3cb47f896ef828b7eb0e34bbcf910603a898e7") { ?>
                    <form action="" method="post">
                      <input type="hidden" name="action" value="reset_password">
                      <input type="hidden" name="mem_id" value="<?= $value["mem_id"]; ?>">
                      <button type="submit" name="submit" class="btn btn-outline-danger me-1 mb-1" onclick="return confirm('ต้องการรีเซ็ตรหัสผ่านของ <?= $value["username"]; ?>');"><i class="fas fa-undo"></i> รีเซ็ตรหัสผ่าน</button>
                    </form>
                    <br>
                    <b class="w3-text-black ">*** รหัสตั้งต้นคือ 'D@P@0315' ***</b>
                  <?php } ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div><br><br><br><br>



  </div>


</div>


<div class="modal fade show" id="editUser" tabindex="-1" aria-modal="true" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50" id="editUser_body">

        สถานะการใช้งานปัจจุบัน : <span class="lead"><?= $sm[$smv] ?></span><br>
        <?php if ($value["privilege"] !== "9" || $user["privilege"] === "9") { ?>
          <form action="" method="POST">
            <input type="hidden" name="action" value="mem_status">
            <input type="hidden" name="pid" id="update_status_pid" value="">
            <div class="row mt-3 mb-3">
              <div class="col col-12 btn-group " role="group">
                <button type="submit" name="mem_status" value="2" class="btn btn-outline-info  btn-block"<?= ($smv === "2") ? " disabled " : "  "; ?>><i class="fas fa-user-check"></i> อนุมัติการใช้งาน</button>
                <button type="submit"  name="mem_status" value="1" class="btn btn-outline-warning  btn-block"<?= ($smv === "1") ? " disabled " : "  "; ?>><i class="fas fa-hourglass"></i> รอการอนุมัติ</button>
                <button type="submit"  name="mem_status"  value="0" class="btn btn-outline-danger  btn-block"<?= ($smv === "0") ? " disabled " : "  "; ?>><i class="fas fa-user-times"></i> ระงับการใช้งาน</button>
              </div>
            </div>
          </form>
        <?php } ?>


      </div>
    </div>
  </div>
</div>
<?php
//$mc->check_array($user, "user");
//$mc->check_variable();
?>
<!-- ปิดแก้ไขแบบฟอร์มที่นี่ -->

<!--เปิดแก้ไข javascript ที่นี่-->
<script>
  $(document).ready(function () {
    $("#example").DataTable({
      "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
      "scrollX": true,
      dom: 'lfrtip'
    });
  });
</script>

<script>
  function update_modal(pid) {
    $("#update_status_pid").val(pid);
  }
</script>

<script src="../../../app-assets/js/scripts/pages/modal-edit-user.js"></script>
<!--ปิดแก้ไข javascript ที่นี่-->

<!-- footer content -->
<?php require '../../require/footer_content.php'; ?>
<!-- /footer content -->
