<?php
$title = "ข้อมูลส่วนตัว";
$module_name = "ข้อมูลส่วนตัว";
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ menu ที่นี่
//$mc->check_variable();
//$mc->check_array($user, "user");
//$mc->check_variable();    //เอาไว้เช็คตัวแปร global $_session , $_post , $_get , $_request .
//$sql = "SELECT `mcode`,`mname` FROM `mm` where `tcode` ='" . $user["tcode"] . "';";
//$mm = $mc->select_3($sql, "mcode", "mname");
//$mc->check_array($mm, "mm");

require '../add_user/response.php';
?>

<!-- แก้ไขแบบฟอร์มที่นี่ -->
<div class="section row mt-5 mb-5">
  <div class="col col-md-6 offset-md-3">
    <form action="update_profile_query.php"  method="POST">
      <div class="card">

        <div class="card-body p-3 pt-0">
          <h1 class=" display-6 pt-3 pb-3"><i class="fa-solid fa-user-pen"></i> แก้ไขประวัติ</h1>

          <?php
          $name = "username";
          $label = "ชื่อ นามสกุล";
          ?>
          <div class="mb-2 ">
            <label for="<?= $name ?>" class="form-label"><b><?= $label ?></b></label>
            <input type="text" class="form-control form-control-lg" id="<?= $name ?>" name="<?= $name ?>" placeholder="กรุณากรอก <?= $label ?>" value="<?= $user[$name] ?>">
          </div>

          <?php
          $name = "position";
          $label = "ตำแหน่ง";
          ?>
          <div class="mb-2 ">
            <label for="<?= $name ?>" class="form-label"><b><?= $label ?></b></label>
            <input type="text" class="form-control form-control-lg" id="<?= $name ?>" name="<?= $name ?>" placeholder="กรุณากรอก <?= $label ?>" value="<?= $user[$name] ?>">
          </div>

          <!--          < ?php if ($user["privilege"] == 1) { ?>
                      <div class="mb-3">
                        <label class="form-label" for="mcode">หมู่บ้าน/ชุมชน</label>
                        <select class='form-control form-control-lg custom-select ps-1'  name="mcode" id="mcode">
                          < ?php foreach ($mm as $key => $value) { ?>
                            <option value="< ?= $key ?>" < ?= ($user["mcode"] == $key) ? "selected" : "" ?>>< ?= $value ?></option>
                          < ?php } ?>
                        </select>
                      </div>
                    < ?php } ?>-->

          <?php
          
          if ($user["ministry_id"] == "15") {
            if ($user["privilege"] > 3) {
              ?>
              <div  class="mb-2 ">
                <label class="form-label"><b>จังหวัด</b></label>
                <div id='pcode'>
                  <?php
                  $mc->list_option5($province, "pcode", " form-select form-control-lg ps-1 ", $user["pcode"], " onChange=\"dochange('amphoe', this.value);\" ", "จังหวัด");
                  ?>
                </div>
              </div>
            <?php } ?>

            <div  class="mb-2 ">
              <label class="form-label"><b>อำเภอ</b></label>
              <div id='amphoe'>
                <?php
                $mc->list_option5($amphoe, "acode", " form-select form-control-lg ps-1 ", $user["acode"], " ", "อำเภอ");
                ?>
              </div>
            </div>
            <?php
          } else {
            if ($user["privilege"] > 3) {
              ?>
              <div  class="mb-2 ">
                <label class="form-label"><b>กระทรวง</b></label>
                <div id='ministry'>
                  <?php
                  $sql3 = "SELECT `ministry_id`, `ministry` FROM `ministry`;";
                  $ministry = $mc->select_3($sql3, 'ministry_id', 'ministry');
                  $option_css = " form-select ps-1 ";
                  $selected = @$user["ministry_id"];
                  if ($user["privilege"] < 7) {
                    $disabled = " disabled ";
                  } else {
                    $disabled = "";
                  }
                  $mc->list_option5($ministry, "ministry_id", $option_css, $selected, " onChange=\"dochange('department', this.value,'');\" " . $disabled . " ", "กรุณาเลือกกระทรวง");
                  ?>
                </div>
              </div>
            <?php } ?>

            <div  class="mb-2 ">
              <label class="form-label"><b>กรม</b></label>
              <div id='department'>
                <?php
                $sql3 = "SELECT `department_id`, `department` FROM `department` WHERE `ministry_id` = '" . @$user["ministry_id"] . "' ;";
                $department = $mc->select_3($sql3, 'department_id', 'department');
                $option_css = " form-select ps-1 ";
                $selected = @$user["department_id"];
                $mc->list_option5($department, "department_id", $option_css, $selected, " ", "กรุณาเลือกกรม");
//                $mc->check_array($department, $sql3);
                ?>
              </div>
            </div>
          <?php } ?>

          <input type="hidden" name="mem_id" value="<?= $user["mem_id"] ?>">
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-success btn-lg waves-effect waves-float waves-light p-1"><i class="fa-regular fa-floppy-disk"></i> ยืนยันการแก้ไขประวัติ</button>
        </div>




      </div>
    </form>
  </div>
</div>

<!--<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-animate-opacity w3-card-4">
    <header class="w3-container w3-blue w3-xlarge w3-center w3-padding-64">
      <span onclick="document.getElementById('id01').style.display = 'none'"
            class="w3-button w3-display-topright"><i class="fas fa-times"></i></span>
      <p id="a"></p>
    </header>
  </div>
</div>-->


<!-- ปิดแก้ไขแบบฟอร์มที่นี่ -->

<?php require '../../require/footer_js.php'; ?>
<!--เปิดแก้ไข javascript ที่นี่-->
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

  function dochange(src, val) {
    console.log(src, val);
    var req = Inint_AJAX();
    req.onreadystatechange = function () {
      if (req.readyState == 4) {
        if (req.status == 200) {
          document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
        }
      }
    };
    //alert("get_select.php?data=" + src + "&val=" + val);
    req.open("GET", "../../require/get_select.php?data_type=" + src + "&data_value=" + val); //สร้าง connection
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
  }
  //  window.onLoad = dochange('pcode', "< ?= $user["pcode"] ?>");
  //  window.onLoad = dochange('acode', "< ?= $user["acode"] ?>");
<?php
if (isset($_REQUEST["a"])) {
  echo "document.getElementById('id03').style.display = 'block';";
}
?>


</script>

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
<!--ปิดแก้ไข javascript ที่นี่-->

<!-- footer content -->
<?php require '../../require/footer_content.php'; ?>
<!-- /footer content -->