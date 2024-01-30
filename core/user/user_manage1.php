<?php
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ไข menu ในไฟล์  menuconfig.php
// $drug ชื่อ class ที่ต้องเรียกใช้  .
//
//$drug->check_array($data, "data");  เอาไว้เช็คตัวแปร data ที่ query มาแล้ว .
//
//$drug->check_array($user, "user");  เอาไว้เช็ค userที่ login เข้ามา .
//
//$drug->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
//$sql = "SELECT * FROM `drugreport`.`province` where `pcode` not in ('01','03');";
//$data = $drug->select_3($sql, "pcode", "pname");
//$drug->check_array($data, "data");
?>
<?php
//$drug->check_variable();
//echo $drug->app_id . "<hr>";
//exit();
if (isset($_POST["action"])) {
  $x = $_POST['action'];
  switch ($x) {
    case "reset_password"://reset password
      $drug->reset($_POST['mem_id'], "user_manage.php");
      //echo "reset_password";
      break;
    case "mem_status"://reset password
      $drug->change_status_member($_POST['mem_id'], $_POST["mem_status"], "user_manage.php");
//        echo $_POST["status_member"] . "<hr>";
      break;
    case "privilege"://reset password
      $drug->update_data("user", ["key" => "mem_id", "value" => $_POST['mem_id']], ["privilege" => $_POST["privilege"]], ["app_id" => $drug->app_id,]);
//      exit();
//        echo $_POST["status_member"] . "<hr>";
      break;
    default:
      session_destroy();
      header("location:index.php");
  }
}
//$drug->check_array($user, "user");
//$drug->check_variable();
if (isset($_REQUEST["pcode"])) {
  $pcode = $_REQUEST["pcode"];
} else {
  $pcode = $user["pcode"];
}

//$sql1 = "SELECT * FROM `db_user`.`type_org`  where   (`type_org_id`<'6')  ORDER BY `type_org_id` ";
//      echo $sql . "<hr>";
//$type_org = $drug->select_3($sql1, 'type_org_id', 'type_org');
//  $drug->check_array($type_org, "type_org");
$sql2 = "SELECT * FROM `province` ORDER BY `pname`  ";
//      echo $sql . "<hr>";
$province = $drug->select_3($sql2, 'pcode', 'pname');
//$drug->check_array($province, "province");
$sql3 = "SELECT * FROM `db_user`.`amphoe` ORDER BY `acode`  ";
//      echo $sql . "<hr>";
$amphoe = $drug->select_3($sql3, 'acode', 'aname');
//$drug->check_array($amphoe, "amphoe");
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
//      $drug->check_array($user, "ข้อมูลตัวแปร \$user <br>");
$condition = " (`app_id`='" . $drug->app_id . "') ";
if ($user["privilege"] !== "9") {
  $condition .= " and (`privilege`<>'9') ";
}
if ($user["privilege"] > "3") {
  $condition .= " and (`pcode`='" . $pcode . "') ";
}
if (in_array($user["privilege"], ["2", "3"])) {
  $condition .= " and (`acode`='" . $user["acode"] . "') ";
  $condition .= " and (`privilege`<='" . $user["privilege"] . "') ";
}

if (isset($_REQUEST["mem_id"])) {
  $condition .= " and (`mem_id`='" . $_REQUEST["mem_id"] . "') ";
}

if (isset($_REQUEST["filter"])) {
  $condition .= " and (`mem_status`='" . $_REQUEST["filter"] . "') ";
}

$sql2 = "SELECT `pcode`,count(`mem_status`) as `cnt` FROM `user` WHERE  " . $condition . "    group by `pcode` order by `pcode` ";
$data2 = $drug->select_3($sql2, 'pcode', 'cnt');
//$drug->check_array($data2, $sql2);
//      $sql = "select * from `user` where  (`status_member` <> '0') and (`app_id`='0306001') " . $condition . " order by `acode` ";
//if (isset($_REQUEST["pcode"])) {
//  $condition .= " and (`pcode`='" . $_REQUEST["pcode"] . "') ";
//} else {
//  $condition .= " and (`pcode`='" . $user["pcode"] . "') ";
//}
$sql = "SELECT * FROM `user` WHERE  " . $condition . " order by `acode` ";
$data = $drug->select_all($sql);
//echo $sql;
//$drug->check_array($data, $sql);
?>


<!-- แก้ไขแบบฟอร์มที่นี่ -->
<div class="w3-row w3-animate-bottom w3-container " >
  <?php //$drug->check_variable();     ?>

  <div class="w3-card-4 s12">
    <header class="w3-container w3-theme-d5 w3-xxlarge w3-center w3-padding-32">จัดการผู้เข้าใช้ระบบ
      <?= @$filter_text; ?></header>
    <div class="w3-container w3-margin-top">
      <?php if ($user["privilege"] > "7") { ?>
        <form action="" method="POST">
          <select class="w3-select w3-border w3-xlarge" name="pcode" onchange="this.form.submit()">
            <?php foreach ($province as $key3 => $value3) { ?>
              <option
                value="<?= $key3 ?>"
                <?= ($pcode == $key3) ? " selected " : "  "; ?>
                ><?= $value3 ?><?= (isset($data2[$key3])) ? " *** " . $data2[$key3] . " คน *** " : ""; ?></option>
              <?php } ?>
          </select>
        </form>
        <br><br>
      <?php } ?>
      <div class="w3-bar w3-large w3-row s12">
        <a href="?filter=0"  class="w3-bar-item w3-button w3-red w3-col s12 m6 l3">ดูเฉพาะระงับการใช้งาน</a>
        <a href="?filter=1"  class="w3-bar-item w3-button w3-orange w3-col s12 m6 l3">ดูเฉพาะรอการอนุมัติ</a>
        <a href="?filter=2"  class="w3-bar-item w3-button w3-green w3-col s12 m6 l3">ดูเฉพาะอนุมัติการใช้งานแล้ว</a>
        <a href="?"  class="w3-bar-item w3-button w3-blue w3-col s12 m6 l3">ดูทั้งหมด</a>
      </div>
      <br><br><br>




                    <!--<table id="example9" class="table table-bordered text-black" name="example9" width="100%">-->
      <table id="example" class="w3-table-all w3-centered w3-bordered" name="example" width="100%" border="1">
        <thead class="text-center">
          <tr>
            <th class="text-center">ลำดับที่</th>
            <th class="text-center">รายละเอียดผู้เข้าใช้ระบบ</th>
            <th class="text-center">สิทธิการใช้งาน</th>
            <th class="text-center">สถานะการใช้งาน</th>
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
//          $drug->check_array($app_option, "app_option");
          $i = 0;
          foreach ($data as $key => $value) {
            $i++;
            ?>
            <tr  class="w3-hover-blue">
              <td class="text-center"><?= $i; ?></td>
              <td class="w3-left-align"><?=
                $value["pid"]
                . "<br>" . $value["username"]
                . "<br>" . $value["position"]
                . "<br>" . $amphoe[$value["acode"]]
                . "<br>" . $province[$value["pcode"]];
                ?></td>
  <!--              <td>< ?= $value["username"]; ?></td>
              <td>< ?= $value["position"]; ?></td>
              <td class="text-left">< ?= $amphoe[$value["acode"]]["pname"] . "<br>" . $amphoe[$value["acode"]]["aname"]; ?></td>-->
              <!--<td>< ?= $type_org[$value["type_org"]]; ?></td>-->
              <td>
                <?php
                if ($value["privilege"] !== "9") {
                  if ($value["mem_id"] !== $user["mem_id"]) {
                    ?>
                    <form action="" method="POST">
                      <input type="hidden" name="action" value="privilege">
                      <input type="hidden" name="mem_status" value="2">
                      <input type="hidden" name="mem_id" value="<?= $value["mem_id"]; ?>">
                      <select class="w3-select w3-border" name="privilege" onchange="this.form.submit()">
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
              $sm = [0 => "ระงับการใช้งาน", 1 => "รอการอนุมัติ", 2 => "อนุมัติการใช้งาน"];
              $smv = $value["mem_status"];
              ?>
              <td class="text-center">
                <?php if ($value["privilege"] !== "9" || $user["privilege"] === "9") { ?>
                  <form action="" method="POST">
                    <input type="hidden" name="action" value="mem_status">
                    <input type="hidden" name="mem_id" value="<?= $value["mem_id"]; ?>">
                    <div class="w3-bar">
                      <button type="submit" name="mem_status" value="2" class="w3-block w3-button w3-green w3-tiny"<?= ($smv === "2") ? " disabled " : "  "; ?>>อนุมัติการใช้งาน</button>
                      <button type="submit"  name="mem_status" value="1" class="w3-block w3-button w3-yellow  w3-tiny"<?= ($smv === "1") ? " disabled " : "  "; ?>>รอการอนุมัติ</button>
                      <button type="submit"  name="mem_status"  value="0" class="w3-block w3-button w3-red   w3-tiny"<?= ($smv === "0") ? " disabled " : "  "; ?>>ระงับการใช้งาน</button>
                    </div>
                  </form>
                <?php } ?>
              </td>

              <td class="text-center"><?php if ($value["password"] !== "e83b6debc7e954674419ee05e9ba4107c3ad44d4d59e24d34329bb0c6f06d6d5") { ?>
                  <form action="" method="post">
                    <input type="hidden" name="action" value="reset_password">
                    <input type="hidden" name="mem_id" value="<?= $value["mem_id"]; ?>">
                    <input type="submit" name="submit" class="w3-button w3-red " onclick="confirm('ต้องการรีเซ็ตรหัสผ่านของ <?= $value["username"]; ?>')" value="รีเซ็ตรหัสผ่าน">
                  </form>
                <?php } ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div><br><br><br><br>
  </div>


</div>
<?php
//$drug->check_array($user, "user");
//$drug->check_variable();
?>
<!-- ปิดแก้ไขแบบฟอร์มที่นี่ -->

<?php require '../require/footer_js.php'; ?>
<!--เปิดแก้ไข javascript ที่นี่-->
<script>
  $(document).ready(function () {
    $("#example").DataTable({
      "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
      "scrollX": true,
      dom: 'lfrtip',
    });
  });
</script>
<!--ปิดแก้ไข javascript ที่นี่-->

<!-- footer content -->
<?php require '../require/footer_content.php'; ?>
<!-- /footer content -->
