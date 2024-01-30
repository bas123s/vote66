<?php
$title = "ดูรายละเอียดโครงการ";
$module_name = "โครงการ";
require '../../require/head_php.php';
require '../../require/head_html.php';

if (isset($_POST["start_date"])) {
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
} else {
  $start_date = date("Y-m-d");
  $end_date = date("Y-m-d");
}


$sql = "SELECT * FROM `unit` WHERE `acode` = '" . @$user["acode"] . "'; ";
$data = $mc->select_all($sql);

$i = 1;
// echo $sql;
?>

<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header border-bottom p-1">
          <div class="head-label">
            <h6 class="mb-0"></h6>
          </div>

        </div>
        <!--<div align="center"><form action="index.php" method="post" enctype="multipart/form-data">
          <br><h3>รายงานการแจ้งการควบคุมตัว<br>
          กรุณาเลือกช่วงที่ต้องการค้นหา</h3><br>
          <input type="date" name="start_date" value="<?= $start_date; ?>"> ถึง <input type="date" name="end_date" value="<?= $end_date; ?>">
          <input type="submit" value="ค้นหา" class="dt-button create-new btn btn-primary">
          </form>ระหว่าง <?= $mc->DateThai2($start_date); ?> ถึง <?= $mc->DateThai2($end_date); ?>
        </div>-->
        <div class="card-body p-1">
          <table id="example" class="table table-hover table-striped" style="width:100%">

            <thead class="table-primary" align="center">
              <tr align="center">
                <th>ที่</th>
                <th>จังหวัด</th>
                <th>เขต</th>
                <th>ตำบล/เทศบาล</th>
                <th>หน่วย</th>
              </tr>
            </thead>
            <tbody class="table-striped">

              <?php foreach ($data as $key => $value) { ?>

                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value['pname']; ?></td>
                  <td><?= $value['district']; ?> </td>
                  <td><?= $value['ename']; ?></td>
                  <td><?= $value['unit']; ?></td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
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
      },
    });
  });
</script>
<!-- END: Page JS-->