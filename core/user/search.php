<?php
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ menu ที่นี่

$status_a = @$_REQUEST["status_a"];

$sql = "SELECT * FROM `covid19`.`tracking` ";
//echo $sql;
$data = $covid19->select_all_2($sql);

$i = 1;
?>

<!-- แก้ไขแบบฟอร์มที่นี่ -->
<div class="w3-card-4 w3-animate-bottom">
  <header class="w3-container w3-theme-f1 w3-center w3-padding-20">
    <h3 class=" w3-margin-bottom text-center">
      <i class="fa fa-search" style="font-size:36px"></i>  ค้นหารายชื่อ
    </h3>
  </header>

  <br>
  <div class="w3-container">
    <div class="w3-card-4 w3-round-large">

      <header class="w3-container w3-light-grey">
        <h4>
          ระบุเงื่อนไขการค้นหา
        </h4>
      </header>
      <div class="w3-container">
        <form action="list.php" method="POST">

          <?php if ($user["privilege"] >= 3) { ?>
            <label for="province_search">จังหวัด</label>
            <div id="province_search"></div>
            <label for="amphoe_search">อำเภอ</label>
            <div id="amphoe_search"></div>
          <?php } ?>
          <?php if ($user["privilege"] == 2) { ?>
            <label for="amphoe_search">อำเภอ</label>
            <div id="amphoe_search"></div>
          <?php } ?>
          <label for="tambol_search">ตำบล</label>
          <div id="tambol_search"></div>

          <label for="mcode_search">หมู่บ้าน/ชุมชน</label>
          <div id="mcode_search">
            <select class="w3-select w3-border w3-round-large w3-margin-bottom" name="mcode">
              <option value="" selected disabled>กรุณาเลือกหมู่บ้าน/ชุมชน</option>
            </select>
          </div>

          <label for="country_travel">อื่นๆ (Case, เพศ, อายุ)</label>
          <input class="w3-input w3-border w3-round-large w3-margin-bottom" type="text" name="search" placeholder="อื่นๆ (Case, เพศ, อายุ)">

          <br>
          </div>
          <input type="hidden" name="status_a" value="<?= $status_a; ?>">
          <button class="w3-button w3-block w3-dark-grey" type="submit"><i class='fa fa-search'></i>  ค้นหา</button>

      </div>

      </form>
    </div>
  </div>

  <!--< ?php
//$drug->check_array($data, "data");
//$drug->check_array($user, "user");
//$drug->check_variable();
  ?>-->
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
        if (req.readyState === 4) {
          if (req.status === 200) {
            document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
          }
        }
      };
      //alert("get_select.php?data=" + src + "&val=" + val);
      console.log("../../require/get_select.php?data_type=" + src + "&data_value=" + val);
      req.open("GET", "../../require/get_select.php?data_type=" + src + "&data_value=" + val); //สร้าง connection
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
      req.send(null); //ส่งค่า
    }
<?php if ($user["privilege"] == "1") { ?>
  window.onLoad = dochange('tambol_search', "<?= $user["acode"]; ?>");
<?php } else if ($user["privilege"] == "2") { ?>
  window.onLoad = dochange('amphoe_search', "<?= $user["pcode"]; ?>");
  window.onLoad = dochange('tambol_search', "<?= $user["acode"]; ?>");
<?php } else { ?>
  window.onLoad = dochange('province_search', "10");
  window.onLoad = dochange('amphoe_search', "1001");
  window.onLoad = dochange('tambol_search', "100101");
<?php } ?>
<?php
if (isset($_REQUEST["a"])) {
  echo "document.getElementById('id03').style.display = 'block';";
}
?>
  </script>
  <script>
    $(document).ready(function () {
      $("#example").DataTable({
        "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
        "scrollX": true,
        dom: 'Blfrtip',
        buttons: [
          'copy', 'print'
        ]
      });

      var groupColumn = 0;
      var table = $('#example1').DataTable({
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        dom: 'Blfrtip',
        buttons: [
          'copy', 'print'
        ],
        "columnDefs": [
          {"visible": false, "targets": groupColumn}
        ],
        "order": [[groupColumn, 'asc']],
        "displayLength": 25,
        "drawCallback": function (settings) {
          var api = this.api();
          var rows = api.rows({page: 'current'}).nodes();
          var last = null;

          api.column(groupColumn, {page: 'current'}).data().each(function (group, i) {
            if (last !== group) {
              $(rows).eq(i).before(
                      '<tr class="group w3-center w3-xxlarge"><td colspan="4" class="w3-gray w3-center">' + group + '</td></tr>'
                      );

              last = group;
            }
          });
        }
      });

      // Order by the grouping
      $('#example tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
          table.order([groupColumn, 'desc']).draw();
        } else {
          table.order([groupColumn, 'asc']).draw();
        }
      });
    });
  </script>


  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("กรุณาเปิด gps บนมือถือด้วย.");
      }
    }

    function showPosition(position) {
      var lat = document.getElementById("lat");
      var long = document.getElementById("long");
      lat.value = position.coords.latitude;
      long.value = position.coords.longitude;
      console.log(position.coords.latitude, position.coords.longitude);


    }
    window.onLoad = getLocation();
  </script>
  <!--ปิดแก้ไข javascript ที่นี่-->

  <!-- footer content -->
  <?php require '../../require/footer_content.php'; ?>
  <!-- /footer content -->