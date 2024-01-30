<?php
$title = "รายการโครงการ"; //title ของหน้าที่จะแสดง
require '../../require/headdata.php'; //ดึงข้อมูล user และเรียกใช้ฟังก์ชั่นของระบบ
require '../../require/headhtml.php'; //เรียกใช้ html และ css หลักๆ
if (isset($_GET['update_data'])) {
  if ($_GET['update_data'] == "success") {
    echo "<script>alert('แก้ไขเรียบร้อยแล้ว');</script>";
  }
}
//
//
//เรียกคลาสเช็คข้อมูลตัวแปรที่ส่งมา ไม่ใช้แล้ว ลบทิ้งได้เลย
require("../../require/class_utility.php");
$utility = new class_utility();
//*******************************************
require("../../require/class_project.php");
$project = new class_project();

if ($acode == '1991') {
  $list_project = $project->get_all_project();
} elseif (substr($acode, 2, 3) == '00') {
  $list_project = $project->get_all_project_by_pcode($pcode);
} else {
  $list_project = $project->get_all_project_by_acode($acode);
}
//echo $acode;
//$utility->check_array($list_project, "list_project");
//exit();
require("../../require/class_default_data.php");
$default_data = new class_default_data();
//$type = $default_data->get_all_type();
//$sub_type = $default_data->get_all_sub_type();
$sql1 = "select * from `mike_take_budget` where `pcode` = '" . $_SESSION["pcode"] . "'  ";
//echo $sql2;
$province = $default_data->get_data_all($sql1, "acode");
//$utility->check_array($province, "province");
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- main header -->
    <?php require ("../../require/main_header.php"); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar"><?php require('../require/rightmenu.php'); ?></section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php require '../../require/section.php'; ?>

      <!-- Main content -->

      <section class="content">

        <!-- Info boxes -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="row-border" style="width:100%" border="1">
                  <thead>
                    <tr>
                      <th <?php if ($_SESSION['rules'] == 1) { ?>rowspan="2"<?php } ?> class="text-center">#</th>
                      <th <?php if ($_SESSION['rules'] == 1) { ?>rowspan="2"<?php } ?> class="text-center">อำเภอ</th>
                      <th <?php if ($_SESSION['rules'] == 1) { ?>rowspan="2"<?php } ?> class="text-center">งบประมาณ</th>
                      <th colspan="2" class="text-center">ปรับปรุงข้อมูล</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($province as $key => $data) {
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td>อำเภอ : <?php echo $data["aname"]; ?></td>
                        <td class="text-right"><?php echo $data["sum_budget"]; ?> บาท</td>
                        <?php if ($_SESSION['rules'] == 2) { ?>
                          <td class="text-center"><a href="take_budget_input_form.php?take_acode=<?= $key; ?>" class="btn btn-primary ">ปรับปรุ่งข้อมูล</a></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $i++;
                    }
                    ?>
                  </tbody>
  <!--                <tfoot>
                    <tr>
                      <th>#</th>
                      <th>จังหวัด</th>
                      <th>สร้างอาชีพสร้างรายได้</th>
                      <th>แหล่งน้ำเพื่อการเกษตร</th>
                      <th>สาธารณูปโภค</th>
                      <th>สาธารณสุข</th>
                      <th>สิ่งแวดล้อม</th>
                      <th>อื่นๆ</th>
                      <th>รวม</th>
                    </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    </div>



    <footer class="main-footer">
      <?php require('../require/footer.php'); ?>
    </footer>

  </div>
  <!-- ./wrapper -->

  <?php require '../../require/js_footer.php'; ?>
  <!-- DataTables -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "lengthMenu": [[100], ["All"]],
        "scrollX": true,
        dom: 'Bftlpi',
        buttons: [
          'copy', 'print', 'excel'
        ]
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>


  <?php
  mysql_close();
  $db->closedb();
  ?>
</body>
</html>
