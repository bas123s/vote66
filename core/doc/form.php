<?php
require '../../require/head_php.php';
if (isset($_REQUEST["id"]) && ($_REQUEST["id"] !== "")) {
  $title = "แก้ไข" . @$_REQUEST["gun_id"];
  $action = "UPDATE";
  $sql = "SELECT * FROM `doc`where `id`='" . $_REQUEST["id"] . "';";
  $data = $mc->select_1($sql);
//              $mc->check_array($data, "data");
} else {
  $title = "เพิ่มหนังสือสั่งการ";
  $action = "INSERT";
}
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
  <div class="w3-row">
    <div class="w3-col m4">&nbsp;</div>
    <div class="w3-col m4 w3-theme-l3">
      <div class=" w3-card-4">
        <header class="w3-theme w3-padding-32 w3-xlarge w3-center">
          <?= $title ?>
        </header>

        <div class="w3-padding-16 w3-container">
          <form method="post" action="form_query.php" enctype="multipart/form-data">
            <div>
              <label for="name" class="w3-large w3-margin-top">ชื่อหนังสือสั่งการ</label>
              <input type="text" class="w3-input" name="name" value="<?= @$data["name"] ?>" alt="ชื่อหนังสือสั่งการ" placeholder="ชื่อหนังสือสั่งการ" required="">
            </div><div class="w3-margin-top">
              <label for="file" class="w3-large w3-margin-top">ไฟล์</label>
              <input type="file" class="w3-input" name="file" value="<?= @$data["file"] ?>" alt="ไฟล์" placeholder="ไฟล์" required="" accept="application/pdf">
            </div><div class="w3-margin-top">
              <label for="detail" class="w3-large w3-margin-top">รายละเอียดหนังสือสั่งการ</label>
              <textarea name="detail" class="w3-input" alt="รายละเอียดหนังสือสั่งการ" placeholder="รายละเอียดหนังสือสั่งการ"><?= @$data["detail"] ?></textarea>
            </div>
            <div class="w3-margin-top">
              <label class="w3-large">ระดับที่จะแสดงผล</label>
              <?php
              $mc->list_radio($mc_variable["doc_level"], "doc_level", @$data["doc_level"], " w3-large ", " w3-margin-top w3-margin-bottom ");
              ?>
            </div>
            <?php if ($action === "UPDATE") { ?>
              <input type="hidden" name="id" value="<?= @$data["id"] ?>">
            <?php } ?>
            <input type="hidden" name="action" value="<?= $action ?>">
            <button type="submit" class="w3-bar-block w3-button w3-green w3-margin-top w3-col s12" >บันทึก</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script language=Javascript>
  function Inint_AJAX() {
    try {
      return new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    } //IE
    try {
      return new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {
    } //IE
    try {
      return new XMLHttpRequest();
    } catch (e) {
    } //Native Javascript
    alert("XMLHttpRequest not supported");
    return null;
  }


  function dochange(src, val, selected) {
    var req = Inint_AJAX();
    req.onreadystatechange = function () {
      if (req.readyState == 4) {
        if (req.status == 200) {
          document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
        }
      }
    };
    console.log("../../require/get_select4.php?data_type=" + src + "&data_value=" + val + "&selected=" + selected);
    req.open("GET", "../../require/get_select4.php?data_type=" + src + "&data_value=" + val + "&selected=" + selected); //สร้าง connection
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
  }

  window.onLoad = dochange('province', '<?= $prov ?>', '<?= $prov ?>');
  window.onLoad = dochange('amphoe', '<?= $prov ?>', '<?= $amp ?>');
</script>
<?php
require '../../require/footer_content.php';
?>

<!-- /footer content -->