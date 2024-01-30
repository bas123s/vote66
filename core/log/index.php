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
//$sql = "SELECT * FROM `province` where `pcode` not in ('01','03');";
//$data = $mc->select_3($sql, "pcode", "pname");
//$mc->check_array($data, "data");
//$mc->check_array($user, "user");
?>

<?php
$sql = "SELECT * FROM `view_log`;";
//echo "<hr>dashboard1_level => " . $dashboard1_level . "<hr>";
$data = $mc->select_1($sql);
//$mc->check_array($data, $sql);

$sql2 = "SELECT * FROM `view_log_by_date` ORDER BY `date` DESC ;";
//echo "<hr>dashboard1_level => " . $dashboard1_level . "<hr>";
$data2 = $mc->select_all($sql2);
//$mc->check_array($data2, $sql2);
?>
<div class="w3-row">
  <div class="w3-col l1 w3-hide-small">&nbsp;</div>
  <div class="w3-col l10">
    <div class="w3-card-4 w3-animate-bottom">

      <header class="w3-container w3-theme-d5 w3-center w3-padding-32">
        <h1>ข้อมูลการประมวลผลทั้งหมด</h1>
      </header>

      <div class=" ">
        <div class="w3-row">
          <div class="w3-col m4 w3-padding-16 w3-center w3-jumbo w3-theme-d1">
            <p class="w3-large"><i class="fas fa-database w3-xxxlarge"></i> จำนวนคิวรี่</p>
            <?= number_format($data["count_id"]) ?>
            <p class="w3-large">ครั้ง</p>
          </div>
          <div class="w3-col m4 w3-padding-16 w3-center w3-jumbo w3-theme-d2">
            <p class="w3-large"><i class="fas fa-wifi w3-xxxlarge"></i> ไอพีที่ไม่ซ้ำกัน</p>
            <?= number_format($data["http_x_real_ip"]) ?>
            <p class="w3-large">หมายเลข</p>
          </div>
          <div class="w3-col m4 w3-padding-16 w3-center w3-jumbo w3-theme-d3">
            <p class="w3-large"><i class="fas fa-user-tie w3-xxxlarge"></i> ผู้ใช้งานทั้งหมด</p>
            <?= number_format($data["user"]) ?>
            <p class="w3-large">คน</p>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col m6 w3-padding-16 w3-center w3-jumbo w3-theme-d4">
            <p class="w3-large"><i class="far fa-file-code w3-xxxlarge"></i> request_uri</p>
            <?= number_format($data["request_uri"]) ?>
            <p class="w3-large">request</p>
          </div>
          <div class="w3-col m6 w3-padding-16 w3-center w3-jumbo w3-theme-d5">
            <p class="w3-large"><i class="fas fa-file-code w3-xxxlarge"></i> script_name</p>
            <?= number_format($data["script_name"]) ?>
            <p class="w3-large">script</p>
          </div>
        </div>
      </div>

      <!--      <footer class="w3-container w3-theme w3-padding-16">
              &nbsp;
            </footer>-->

    </div>
    <br><br><br><br>

    <div class="">
      <div class="w3-card-4 w3-animate-bottom">

        <header class="w3-container w3-theme w3-center w3-padding-32">
          <h1>ข้อมูลการประมวลผลแยกรายวัน</h1>
        </header>

        <div class="w3-padding-16 w3-white w3-container">
          <table id="example" class="w3-table-all w3-hoverable s12 display  w3-centered" style="width:100%" border="1">
            <thead>
              <tr>
                <th>วันที่</th>
                <th>จำนวนการคิวรี่</th>
                <th>จำนวนผู้ใช้งาน</th>
                <th>จำนวน ip จริง</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data2 as $key => $value) { ?>
                <tr>
                  <td><a href="log_by_date.php?date=<?= $value["date"]; ?>"><?= $mc->DateThai4($value["date"]); ?></a></td>
                  <td><?= $value["count_id"] ?></td>
                  <td><?= $value["user"] ?></td>
                  <td><?= $value["http_x_real_ip"] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-animate-opacity w3-card-4">
    <header class="w3-container w3-blue w3-xlarge w3-center w3-padding-64">
      <span onclick="document.getElementById('id01').style.display = 'none'"
            class="w3-button w3-display-topright"><i class="fas fa-times"></i></span>
      <p id="a"></p>
    </header>
  </div>
</div>
<!-- ปิดแก้ไขแบบฟอร์มที่นี่ -->

<?php require '../../require/footer_js.php'; ?>
<!--เปิดแก้ไข javascript ที่นี่-->

<script>
  function load_modal(text) {
    document.getElementById('id01').style.display = 'block';
    document.getElementById("a").innerHTML = text;
  }
<?php
if (isset($_REQUEST["a"])) {
  echo "window.onLoad = load_modal(\"" . $_REQUEST["a"] . "\");";
}
?>
</script>
<script>
  $(document).ready(function () {
    $("#example").DataTable({
      "lengthMenu": [[-1], ["All"]],
      "scrollX": true,
      dom: 'Blfrtip',
      buttons: [
        'copy', {extend: 'excel', footer: true}
      ]
    });
  });
</script>
<!--ปิดแก้ไข javascript ที่นี่-->

<!-- footer content -->
<?php require '../../require/footer_content.php'; ?>
<!-- /footer content -->