<?php
$title = "บันทึกผู้ใช้งาน";
$module_name = "จัดการผู้ใช้งาน";
require '../../require/head_php.php';
$page_privilege = [3, 4, 6, 7, 8, 9];
if (!in_array($user["privilege"], $page_privilege)) {
  header("Location: ../../app/main/");
}
require '../../require/head_html.php';

if (isset($_POST["pid"])) {
  $sql = "SELECT * FROM `arrest`.`user` WHERE `pid` = '" . $_POST["pid"] . "' ;";
  $data = $mc->select_1($sql);
  $action = "UPDATE";
} else {
  $action = "INSERT";
}


if ($user["privilege"] == "9") {
  $sql2 = "SELECT * FROM `user` ; ";
} else {
  $condition = " `ministry_id`='" . $user["ministry_id"] . "' AND ";
  if ($user["ministry_id"] == "15") {
    if ($user["privilege"] < "3") {
      $condition .= " `pcode` = '" . $user["pcode"] . "' ";
    } else {
      $condition .= " `acode` = '" . $user["acode"] . "' ";
    }
  } else {
    if ($user["privilege"] < '3') {
      $condition .= " `department_id` = '" . $user["department_id"] . "' ";
    } else {
      $condition .= " `division_id` = '" . $user["division_id"] . "' ";
    }
  }
  $sql2 = "SELECT * FROM `user` WHERE " . $condition . " ORDER BY `mem_id` DESC ; ";
}

$data2 = $mc->select_all($sql2);

$form_css = " mb-2 ";
?>

<section id="basic-datatable">

  <div class="row">
    <div class="col col-lg-3 col-md-5">
      <form class="" action="query.php" method="post" enctype="multipart/form-data" >
<!--        <input type="hidden" name="ministry_id" value="< ?= $user["ministry_id"]; ?>">
        <input type="hidden" name="department_id_a" value="< ?= $user["department_id"]; ?>">
        <input type="hidden" name="department_a" value="< ?= $user["pcode"]; ?>">
        <input type="hidden" name="division_id_a" value="< ?= $user["division_id"]; ?>">
        <input type="hidden" name="division_a" value="< ?= $user["acode"]; ?>">-->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">บันทึกผู้ใช้งาน</h4><br>
          </div>
          <div class="card-body">
            <header class="d-flex justify-content-end fs-12 text-danger text-right">
              <div align="right"></div>
            </header>
            <div class="form-group mt-2">
              <div class="row">

                <?php //$mc->check_array($data, $sql);    ?>
                <div class="<?= $form_css ?>">
                  <label> รหัสประชาชน <span style="color:red;" >*</span></label>
                  <div class="form-group boxed">
                    <input type="text" class="form-control ps-1" id="pid" name="pid" required value="<?= @$data["pid"]; ?>" placeholder="รหัสประชาชน">
                  </div>
                </div>
                <div class="<?= $form_css ?>">
                  <label> ชื่อ - นามสกุล <span style="color:red;" >*</span></label>
                  <div class="form-group boxed">
                    <input type="text" class="form-control ps-1" id="username" name="username" required value="<?= @$data["username"]; ?>" placeholder="ชื่อ - นามสกุล">
                  </div>
                </div>

                <div class="<?= $form_css ?>">
                  <label> ตำแหน่ง <span style="color:red;" >*</span></label>
                  <div class="form-group boxed">
                    <input type="text" class="form-control ps-1" id="position" name="position" required value="<?= @$data["position"]; ?>" placeholder="ตำแหน่ง">
                  </div>
                </div>

                <div class="<?= $form_css ?>">
                  <label> เบอร์ติดต่อ <span style="color:red;" >*</span></label>
                  <div class="form-group boxed">
                    <input type="text" class="form-control ps-1" id="tel" name="tel" required value="<?= @$data["tel"]; ?>" placeholder="เบอร์ติดต่อ">
                  </div>
                </div>

                <div class="<?= $form_css ?>">
                  <label> กระทรวง <span style="color:red;" >*</span></label>
                  <div class="form-group boxed">
                    <?php
                    $sql3 = "SELECT	`ministry_id`, `ministry` FROM `ministry`;";
                    $ministry_id = $mc->select_3($sql3, 'ministry_id', 'ministry');
                    $option_css = " form-select ps-1 ";
                    if ($action == "INSERT") {
                      $selected = @$user["ministry_id"];
                    } else {
                      $selected = @$data["ministry_id"];
                    }
                    if ($user["privilege"] < 9) {
                      $disabled = " disabled ";
                    } else {
                      $disabled = "";
                    }

                    $mc->list_option5($ministry_id, "ministry_id", $option_css, $selected, " onChange=\"dochange('department', this.value,'','1'); dochange('app_privilege', this.value,'','1');\" " . $disabled . " ", "กรุณาเลือกกระทรวง");
                    ?>
                  </div>
                </div>

                <div id="org_0">
                  <div class="<?= $form_css ?>"> <label> จังหวัด <span style="color:red;">*</span></label>
                    <div class="form-group boxed">
                      <div class="input-wrapper " id="province"></div>
                      <input type="hidden" name="pname" id="pname" >
                    </div>
                  </div>
                  <div class="<?= $form_css ?>"> <label> อำเภอ <span style="color:red;">*</span></label>
                    <div class="form-group boxed">
                      <div class="input-wrapper " id="amphoe"></div>
                      <input type="hidden" name="aname" id="aname">
                    </div>
                  </div>
                </div>
                <div id="org_1" >
                  <div class="<?= $form_css ?>"> <label> กรม <span style="color:red;">*</span></label>
                    <div class="form-group boxed">
                      <div class="input-wrapper " id="department"></div>
                    </div>
                  </div>

                  <div class="<?= $form_css ?>"> <label> หน่วยงาน</label>
                    <div class="form-group boxed">
                      <div class="input-wrapper " id="division"></div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="<?= $form_css ?>"> <label> สิทธิ์การเข้าใช้งาน</label>
                    <div class="form-group boxed">
                      <div class="input-wrapper " id="app_privilege">
                        <?php
                        if ($user["ministry_id"] == "29006") {
                          if ($user["privilege"] == "6") {
                            $sql3 = "SELECT `app_privilege_id`, `app_privilege_name` FROM `app_privilege` WHERE `ministry_id` = '" . $user["ministry_id"] . "' AND `department_id` = '" . $user["department_id"] . "' AND `app_privilege_id` > 2 AND `app_privilege_id` < '" . $user["privilege"] . "';";
                          } else {
                            $sql3 = "SELECT `app_privilege_id`, `app_privilege_name` FROM `app_privilege` WHERE `ministry_id` = '" . $user["ministry_id"] . "' AND `department_id` = '" . $user["department_id"] . "' AND `app_privilege_id` = 2 ;";
                          }
                        } else if ($user["ministry_id"] == "15") {
                          $sql3 = "SELECT `app_privilege_id`, `app_privilege_name` FROM `app_privilege` "
                                  . "WHERE `ministry_id` = '" . $user["ministry_id"] . "' "
                                  . "AND `app_privilege_id` < '" . $user["privilege"] . "' ;";
                        } else {
                          $sql3 = "SELECT `app_privilege_id`, `app_privilege_name` FROM `app_privilege` "
                                  . "WHERE `ministry_id` = '" . $user["ministry_id"] . "' "
                                  . "AND `department_id` = '" . $user["department_id"] . "' "
                                  . "AND `app_privilege_id` < '" . $user["privilege"] . "' ;";
                        }

//                        echo $sql3;
                        $app_privilege = $mc->select_3($sql3, 'app_privilege_id', 'app_privilege_name');
                        if ($action == "INSERT") {
                          $selected = 1;
                        } else {
                          $selected = @$data["privilege"];
                        }
//    $mc->list_option5($department, "department_id", $option_css, $selected, " ", "กรุณาเลือกกรม");
                        $mc->list_option5($app_privilege, "app_privilege_id", $option_css, $selected, " ", "กรุณาเลือกสิทธิ์การเข้าใช้งาน");
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                  <!--                <div class="< ?= $form_css ?>"> <label> ตำบล <span style="color:red;">*</span></label>
                                    <div class="form-group boxed">
                                      <div class="input-wrapper " id="tambol">
                                        <select class="form-select" name="tcode" id="tcode" value="< ?= @$data["tname"]; ?>"><option value="" disabled selected>---- ----</option></select>
                                        <input type="hidden" name="tname" id="tname">
                                      </div>
                                    </div>
                                  </div>-->

              </div>
            </div>
            <div class="d-grid col-12 mb-1 mb-lg-0 mt-3">
              <button type="submit" class="btn btn-success waves-effect waves-float waves-light"><i class="fa-regular fa-floppy-disk"></i> บันทึก</button>
            </div>
          </div>
        </div>

        <input type="hidden" value="<?= $action ?>" name="action">
        <?php if (isset($_POST["pid"])) { ?>
          <input type="hidden" value="<?= $_POST["pid"] ?>" name="pid">
        <?php } ?>
      </form>
    </div>

    <div class="col col-lg-9 col-md-7">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">รายชื่อผู้ใช้งานระบบ</h4><br>
        </div>
        <div class="card-body">
          <header class="d-flex justify-content-end fs-12 text-danger text-right">
            <div align="right"></div>
          </header>
          <div class="row">

            <table id="example" class="table table-hover table-striped" style="width:100%">
              <thead>
                <tr align="center">
                  <th >ที่</th>
                  <th >จัดการ</th>
                  <th >ชื่อ - นามสกุล</th>
                  <th >หน่วยงาน</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($data2 as $key => $value) {
                  ?>
                  <tr align="center">
                    <td><?= $key + 1; ?></td>
                    <td><form action="form.php" method="post"><input type="hidden" name="pid" value="<?= $value["pid"] ?>"><button type="submit" class="btn btn-success waves-effect waves-float waves-light"><i class="fa-solid fa-user-pen"></i> แก้ไข</button></form></td>
                    <td><?= @$value["username"]; ?></td>
                    <td><?= (@$value["division"] == 0) ? @$value["pname"] . "<br>" . @$value["aname"] : @$value["department"] . "<br>" . @$value["division"]; ?></td>
                    <!--<td>< ?= @$value["c_arrest"]; ?></td>-->
                    <!-- <td>< ?= @$mc->status_arrest[@$value["status"]]; ?></td> -->
  <!--                                        <td>
        <form method="post" action="report_arrest_place.php">
            <input type="hidden" name="start_date" value="< ?= @$start_date; ?>">
            <input type="hidden" name="end_date" value="< ?= @$end_date; ?>">
            <input type="hidden" name="orgname" value="< ?= @$value["orgname"]; ?>">
            <input type="hidden" name="orgcode" value="< ?= @$value["orgcode"]; ?>">
            <input type="submit" class="btn btn-primary" value="รายละเอียด">
        </form>
      </td>-->
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
//  $mc->check_variable();
//  $mc->check_array($data2, $sql2);
  ?>
</section>

<?php
require '../../require/footer_content.php';
?>
<!-- BEGIN: Page JS-->
<script>
  $(document).ready(function () {
    $('#example').DataTable({
      "oLanguage": {
        "sSearch": "ค้นหา"
      }
    });
  });
</script>
<script>
  $("#organization").change(function () {
    console.log($("#organization").find("option:selected").text());
    $("#organization_name").val($("#organization").find("option:selected").text());
  });
</script>
<script>
  $("#pcode").change(function () {
    console.log($("#pcode").find("option:selected").text());
    $("#pname").val($("#pcode").find("option:selected").text());
  });
</script>
<script>
  $("#acode").change(function () {
    console.log($("#acode").find("option:selected").text());
    $("#aname").val($("#acode").find("option:selected").text());
  });
</script>
<script>
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
    console.log("XMLHttpRequest not supported");
    return null;
  }

  function dochange(id, data_value, data_select, test) {
    console.log(test);
    var req = Inint_AJAX();
    req.onreadystatechange = function () {
      if (req.readyState == 4) {
        if (req.status == 200) {
          document.getElementById(id).innerHTML = req.responseText; //รับค่ากลับมา
        }
      }
    };
    var link = "get_select.php?id=" + id + "&data_value=" + data_value + "&selected=" + data_select;
    console.log("https://detention.dopa.go.th/0308/arrest/core/add_user/" + link);
    req.open("GET", link); //สร้าง connection
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
  }
</script>

<script>
<?php if ($action == "INSERT") { ?>
    window.onLoad = dochange('province', "<?= @$user["pcode"] ?>", "<?= @$user["pcode"] ?>");
    window.onLoad = dochange('amphoe', "<?= @$user["pcode"] ?>", "<?= @$user["acode"] ?>");
<?php } else { ?>
    window.onLoad = dochange('province', "<?= @$data["pcode"] ?>", "<?= @$data["pcode"] ?>");
    window.onLoad = dochange('amphoe', "<?= @$data["pcode"] ?>", "<?= @$data["acode"] ?>");
<?php } ?>
</script>

<script>
<?php if ($action == "INSERT") { ?>
    window.onLoad = dochange('department', "<?= @$user["ministry_id"] ?>", "<?= @$user["department_id"] ?>");
<?php } else { ?>
    window.onLoad = dochange('department', "<?= @$data["ministry_id"] ?>", "<?= @$data["department_id"] ?>");
<?php } ?>
</script>

<script>
<?php if ($action == "INSERT") { ?>
    window.onLoad = dochange('division', "<?= @$user["department_id"] ?>", "<?= @$user["division_id"] ?>");
<?php } else { ?>
    window.onLoad = dochange('division', "<?= @$data["department_id"] ?>", "<?= @$data["division_id"] ?>");
<?php } ?>
</script>

<script>
  function check_ministry() {
    if ($("#ministry_id").val() == 15) {
      $("#org_0").show();
      $("#org_1").hide();
    } else {
      $("#org_0").hide();
      $("#org_1").show();
    }
  }
</script>

<script>
  $("#ministry_id").change(function () {
    console.log($("#ministry_id").find("option:selected").text());
    check_ministry();
  });
</script>

<script>
<?php
//if (isset($_POST["pid"])) {
//  echo "check_ministry();";
//} else {
//  echo "check_ministry();";
//  //echo '$("#org_0").hide();  $("#org_1").show();';
//}
?>
  check_ministry();
</script>
<!-- END: Page JS-->