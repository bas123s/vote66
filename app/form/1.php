<?php
$title = "ข้อมูลทั่วไป";
$module_name = "บันทึกโครงการ";
require '../../require/head_php.php';
require '../../require/head_html.php';

$sql = "SELECT * FROM `unit_master` WHERE `acode` = '".$user["acode"]."' GROUP BY `ecode` ORDER BY `ecode`; ";
$data = $mc->select_all($sql);

if (isset($_REQUEST['id'])) {
  $sql = "SELECT * FROM `unit` WHERE `id` = '" . $_REQUEST["id"] . "'; ";
  $data = $mc->select_1($sql);
}

?>
<script src="https://dopa-ldbox.longdo.com/map2/"></script>
<style>
  /* Customize the label (the container) */
  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    font-size: 20px;
    padding-bottom: 5px;
    padding-top: 10px;

    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #fff;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }

  .container .checkmark1:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  hr.new1 {
    border-top: 1px solid black;
  }

  .column {
    float: left;
    width: 49%;
  }
  .columnr {
    float: right;
    width: 49%;
  }
  .column1 {
    float: left;
    padding-left: 1%;
    width: 33.33%;
  }
  .column2 {
    float: left;
    padding-left: 1%;
    width: 20%;
  }
</style>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
 
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
<section id="nav-tabs-aligned">
  <div class="row match-height">
    <!-- Centered Aligned Tabs starts -->
    <div class="col-lg-12">
        <!--<div class="card-header">
          <h4 class="card-title"><?php $mc->check_array($user, "0"); ?></h4>
        </div>-->

          <form class="form form-vertical" action="query.php" method="post" enctype="multipart/form-data">
            <div class="tab-content">
              <div class="tab-pane active" id="home-center" aria-labelledby="home-tab-center" role="tabpanel">
                <section id="basic-horizontal-layouts">
                  <div class="row mx-auto">

                    <div class="card">

                      <div class="card-header">
                        <h1 class="card-title">รายงานผลการเลือกตั้งแบบแบ่งเขตเลือกตั้ง อำเภอ<?=$user["aname"];?> จังหวัด<?=$user["pname"];?></h1>
                      </div>

                      <div class="card-body">

                        <div class="col-12">
                          <div class="mb-0 row">
                            <div class="col-sm-3">
                              <label class="col-form-label" for="district"><b>เขตเลือกตั้งที่</b></label>
                              <input class="form-control" type="number" name="district" min="1" max="33" step="1" value="<?= @$data["district"]; ?>" required>
                            </div>
                            <div class="col-sm-4">
                              <label class="col-form-label" for="district"><b>เทศบาล/ตำบล</b></label>
                              <select class="form-select"  name="ecode">
                                <?php foreach ($data as $key => $value) { ?>
                                  <option value="<?=$value['ecode'];?>"><?=$value["ename"];?> (ตำบล<?=$value["tname"];?>)</option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-sm-3">
                              <label class="col-form-label" for="unit"><b>หน่วยที่</b></label>
                              <input class="form-control" type="number" name="unit" min="1" max="425" step="1" value="<?= @$data["unit"]; ?>" required>
                            </div>
                          </div>
                        </div>

                        <hr>
                        <div class="col-12">
                          <div class="mb-1 row">
                            <div class="col-sm-12">
                            <table id="example2" class="display cell-border compact" style="width:100%">
                              <thead>
                                <tr>
                                  <th><b>คะแนนสูงสุดลำดับที่</b></th>
                                  <th><b>หมายเลขผู้สมัคร</b></th>
                                  <th><b>คะแนน</b></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><div align="center">1</div></td>
                                  <td><input class="form-control" type="number" name="1n" min="1" max="20" step="1" value="<?= @$data["1n"]; ?>" required></td>
                                  <td><input class="form-control" type="number" name="1p" min="0" max="2832" step="1" value="<?= @$data["1p"]; ?>" required></td>
                                </tr>
                                <tr>
                                  <td><div align="center">2</div></td>
                                  <td><input class="form-control" type="number" name="2n" min="1" max="20" step="1" value="<?= @$data["2n"]; ?>" required></td>
                                  <td><input class="form-control" type="number" name="2p" min="0" max="2832" step="1" value="<?= @$data["2p"]; ?>" required></td>
                                </tr>
                                <tr>
                                  <td><div align="center">3</div></td>
                                  <td><input class="form-control" type="number" name="3n" min="1" max="20" step="1" value="<?= @$data["3n"]; ?>" required></td>
                                  <td><input class="form-control" type="number" name="3p" min="0" max="2832" step="1" value="<?= @$data["3p"]; ?>" required></td>
                                </tr>
                                <tr>
                                  <td><div align="center">4</div></td>
                                  <td><input class="form-control" type="number" name="4n" min="1" max="20" step="1" value="<?= @$data["4n"]; ?>" required></td>
                                  <td><input class="form-control" type="number" name="4p" min="0" max="2832" step="1" value="<?= @$data["4p"]; ?>" required></td>
                                </tr>
                                <tr>
                                  <td><div align="center">5</div></td>
                                  <td><input class="form-control" type="number" name="5n" min="1" max="20" step="1" value="<?= @$data["5n"]; ?>" required></td>
                                  <td><input class="form-control" type="number" name="5p" min="0" max="2832" step="1" value="<?= @$data["5p"]; ?>" required></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          </div>
                        </div>

                        <div >
                          <button type="submit" style="width:100%;" class="btn btn-primary btn-lg btn-block" <?php if(@$_REQUEST["id"]!=""){echo "disabled";} ?>>รายงานผล</button>
                        </div>

                      </div>
                    </div>

                  </div>
                </section>

            </div>

          </form>
        </div> 
    </div>
    <!-- Centered Aligned Tabs ends -->
  </div>
</section>

<?php
require '../../require/footer_content.php';
?>

<script>
  $(document).ready(function () {
    $('#example2').DataTable({
      "oLanguage": {
        "sSearch": "ค้นหา"
      },
      "ordering": false,
      "dom": '',
      "columns": [
    { "width": "10%" },
    { "width": "30%" },
    { "width": "40%" }
  ]
    });
  });
</script>