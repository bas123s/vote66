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
//$mc->check_array($user, "user");
?>
<div class="w3-container">
  <div class="w3-white">
    <div class="w3-center  w3-card-4">
      <header class="w3-theme w3-padding-32 w3-xlarge">
        <i class="fas fa-book"></i> หนังสือสั่งการ
        <?php if ($user["privilege"] > 7) { ?>
          <br><br>
          <a href="form.php" class="w3-button w3-bar-block w3-green w3-padding-16 w3-medium"><i class="fas fa-plus"></i> เพิ่มหนังสือสั่งการ</a>
        <?php } ?>
      </header>

      <div class="w3-padding-16 w3-container">
        <table id="example" class="display " style="width:100%">
          <thead>
            <tr>
              <?php if ($user["privilege"] > 7) { ?><th style="width: 100px;">จัดการ</th><?php } ?>
              <th style="width: 100px;">ลำดับที่</th>
              <th>หนังสือสั่งการ</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <?php if ($user["privilege"] > 7) { ?><th>จัดการ</th><?php } ?>
              <th>ลำดับที่</th>
              <th>หนังสือสั่งการ</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <?php
              $sql2 = "SELECT * FROM `doc`order by `id`;";
              $data2 = $mc->select_all_2($sql2);
//              $mc->check_array($data, "data");

              foreach ($data2 as $key => $value) {
                ?>
                <?php if ($user["privilege"] > 7) { ?>
                  <td>
                    <a class="w3-button w3-bar-block w3-green " style="width: 100px;" href="form.php?id=<?= $key ?>"><i class="far fa-edit"></i> แก้ไข</a>
                    <?php if ($user["privilege"] > "7") { ?>
                      <a class="w3-button w3-bar-block w3-red " style="width: 100px;" onclick="return confirm('ยืนยันการลบ <?= $value["id"] ?>');" href="delete.php?id=<?= $key ?>"><i class="far fa-trash-alt"></i> ลบ</a>
                    <?php } ?>
                  </td>
                <?php } ?>
                <td class="w3-right-align"><?= $key ?></td>
                <td class="w3-left-align">
                  <a href="uploads/<?= $value["file"] ?>">
                    <?= $value["name"] ?>
                  </a>
                </td>
                <!--<td class="w3-left-align"><?= $value["detail"] ?></td>-->
              </tr>
            <?php } ?>

          </tbody>

        </table>

        <script>$(document).ready(function () {
            $('#example').DataTable();
          });
        </script>
      </div>
    </div>
  </div>
</div>
<?php
require '../../require/footer_content.php';
?>

<!-- /footer content -->