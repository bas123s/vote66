<?php

class php_utility {

//ประกาศตัวแปรกลาง
  public $strMonth = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  public $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
  public $day, $strMonthThai, $year;
  public $var_progress = array(0 => 'ยังไม่เริ่มดำเนินการ', 1 => 'ระหว่างดำเนินการ', 2 => 'ดำเนินการเสร็จสิ้น');
  public $status_arrest = array(0 => 'ยังไม่เริ่มดำเนินการ', 1 => 'ยังไม่ได้ตรวจสอบ', 2 => 'ตรวจสอบแล้ว');
  public $range = array(6 => "ระยะเร่งด่วน (ภายใน 6 เดือน)", 12 => "ระยะกลาง (ภายใน 12 เดือน)", 18 => "ระยะยาว (ภายใน 18 เดือน)");

//สิ้นสุดการประกาศตัวแปรกลาง

  public function curPageName() { //เอาไว้เช็คชื่อไฟล์ เพื่อเปลี่ยนสี link
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
  }

//end curPageName

  public function change_date_time($date, $time) {//เปลี่ยน format วันที่
    $date_time = $date . " " . $time;
    $date_time_format = date_create_from_format("Y-m-d H:i:s", $date_time);
    return date_format($date_time_format, "d/m/Y H:i");
  }

//end change_date_time

  public function turn_ce_to_be($d) {//เปลี่ยน ค.ศ. เป็น พ.ศ.
    $date = new DateTime($d);
//$date->modify('+543 year');
    return $date->format('Y-m-d');
  }

//end turn_ce_to_be

  public function convert_date($strDate) {
    $this->day = date_parse_from_format("Y-m-d", $strDate);
    $this->strMonthThai = $this->strMonth[$this->day['month']];
    if ($this->day['year'] > date("Y")) {
      $this->year = $this->day['year'];
    } else {
      $this->year = $this->day['year'] + 543;
    }
  }

  public function convert_month_year($my) {
    $this->day = date_parse_from_format("m/Y", $strDate);
    $this->strMonthThai = $this->strMonth[$this->day['month']];
    if ($this->day['year'] > date("Y")) {
      $this->year = $this->day['year'];
    } else {
      $this->year = $this->day['year'] + 543;
    }
  }

  public function get_m_y_Thai($strDate) {//public function DateThai
    $this->convert_month_year($strDate);
    return " $this->strMonthThai พ.ศ. " . $this->year . "";
  }

  public function convert_date2($strDate) {
    $this->day = date_parse_from_format("Y-m-d", $strDate);
    $this->strMonthThai = $this->strMonthCut[$this->day['month']];
    if ($this->day['year'] > date("Y")) {
      $this->year = $this->day['year'];
    } else {
      $this->year = $this->day['year'] + 543;
    }
  }

  public function DateThai($strDate) {//public function DateThai
    $this->convert_date($strDate)+0;
    // return "วันที่ " . sprintf('%02d', $this->day['day']). " $this->strMonthThai พ.ศ. " . $this->year . "";
    return "วันที่ " . $this->day['day']." เดือน$this->strMonthThai พ.ศ. " . $this->year . "";
  }

//end public function DateThai

  public function DateThai2($strDate) {//public function DateThai2
    $this->convert_date($strDate);
    return "วันที่ " . sprintf($this->day['day']) . " $this->strMonthThai " . $this->year . "";
  }

//end public function DateThai2

  public function DateThai3($strDate) {//public function DateThai
    $day = date_parse_from_format("Y-m-d", $strDate);
    return $day;
  }

//end public function DateThai

  public function DateThai4($strDate) {//public function DateThai4
    $this->convert_date($strDate);
    return sprintf('%02d', $this->day['day']) . " $this->strMonthThai " . $this->year . "";
  }

//end public function DateThai4


  public function DateThai5($strDate) {//public function DateThai
    $this->convert_date($strDate);
    return "วันที่ " . sprintf('%02d', $this->day['day']) . " เดือน$this->strMonthThai พ.ศ. " . $this->year . "";
  }

//end public function DateThai5

  public function DateThai6($strDate) {//public function TimeThai
    $this->convert_date($strDate);
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
//    $strSeconds = date("s", strtotime($strDate));
    // return "วันที่ " . sprintf('%02d', $this->day['day']) . " $this->strMonthThai พ.ศ. " . $this->year . " เวลา $strHour.$strMinute น.";
    return "วันที่ " . sprintf($this->day['day']) . " $this->strMonthThai พ.ศ. " . $this->year . " เวลา $strHour.$strMinute น.";
  }

  public function DateThai7($strDate) {//public function DateThai6
    $this->convert_date2($strDate);
    // return sprintf('%02d', $this->day['day']) . " $this->strMonthThai " . $this->year . "";
    return sprintf( $this->day['day']) . " $this->strMonthThai " . substr($this->year, 2) . "";
  }
    public function DateThai8($strDate) {//public function DateThai6
      $this->convert_date2($strDate);
      $strHour = date("H", strtotime($strDate));
      $strMinute = date("i", strtotime($strDate));
      return sprintf( $this->day['day']) . " $this->strMonthThai " . substr($this->year, 2) . "<br> เวลา $strHour.$strMinute น.";
    }


//end public function DateThai6

  public function TimeThai($strDate) {//public function TimeThai
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    return "$strHour นาฬิกา $strMinute นาที";
  }

//end public function TimeThai
// รูปแบบของเวลาที่ใช้คำนวณ แบบ
// อยู่ในรูปแบบ 00:00:00 ถึง 23:59:59


  public function diff2time($time_a, $time_b) {//public function diff2time
    $now_time1 = strtotime($time_a);
    $now_time2 = strtotime($time_b);
//echo "<br>".date("Y-m-d ".$time_a);
//echo "<br>".$now_time2;
    $time_diff = abs($now_time2 - $now_time1);
    $time_diff_d = floor($time_diff / 86400); // จำนวนวันที่ต่างกัน
    $time_diff_h = floor(($time_diff / 3600) % 24); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m = floor(($time_diff % 3600) / 60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s = ($time_diff % 3600) % 60; // จำนวนวินาทีที่ต่างกัน
    return $time_diff_d . " วัน " . $time_diff_h . " ชั่วโมง "; //.$time_diff_m." นาที ".$time_diff_s." วินาที";
  }

//public function diff2time

  public function convert_money($number) { //public function convert_money
    $txtnum1 = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ');
    $txtnum2 = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
    $number = str_replace(",", "", $number);
    $number = str_replace(" ", "", $number);
    $number = str_replace("บาท", "", $number);
    $number = explode(".", $number);

    if (sizeof($number) > 2) {
      return 'ทศนิยมหลายตัวนะจ๊ะ';
      exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for ($i = 0; $i < $strlen; $i++) {
      $n = substr($number[0], $i, 1);
      if ($n != 0) {
        if ($i == ($strlen - 1) AND $n == 1) {
          $convert .= 'เอ็ด';
        } elseif ($i == ($strlen - 2) AND $n == 2) {
          $convert .= 'ยี่';
        } elseif ($i == ($strlen - 2) AND $n == 1) {
          $convert .= '';
        } else {
          $convert .= $txtnum1[$n];
        }
        $convert .= $txtnum2[$strlen - $i - 1];
      }
    }
    $convert .= 'บาท';
    if ($number[1] == '0' || $number[1] == '00' || $number[1] == '') {
      $convert .= 'ถ้วน';
    } else {
      $strlen = strlen($number[1]);
      for ($i = 0; $i < $strlen; $i++) {
        $n = substr($number[1], $i, 1);
        if ($n != 0) {
          if ($i == ($strlen - 1) AND $n == 1) {
            $convert .= 'เอ็ด';
          } elseif ($i == ($strlen - 2) AND
            $n == 2) {
            $convert .= 'ยี่';
          } elseif ($i == ($strlen - 2) AND
            $n == 1) {
            $convert .= '';
          } else {
            $convert .= $txtnum1[$n];
          }
          $convert .= $txtnum2[$strlen - $i - 1];
        }
      }
      $convert .= 'สตางค์';
    }
    return $convert;
  }

//end public function convert_money
//public function check_variable เอาไว้เช็คตัวแปรหลัก session ,post ,get
  public function check_variable() {
    $this->check_array($_SESSION, 'SESSION');
    $this->check_array($_REQUEST, 'REQUEST');
    $this->check_array($_POST, 'POST');
    $this->check_array($_GET, 'GET');
//$this->check_array($_SERVER, 'server');
  }

//end public function check_variable

  public function var_piority() {//public function var_piority
    $var_piority = array(1 => 'ด่วนที่สุด', 2 => 'ปกติ', 3 => 'ระยะยาว');
    return $var_piority;
  }

//end public function var_piority

  public function var_progress() {//public function var_progress
    return $this->var_progress;
  }

//end public function var_progress

  public function var_progress2($progress) {//public function var_progress
    return $this->var_progress[$progress];
  }

//end public function var_progress2

  public function option_progress($data) {//public function option_progress
    $var_progress = $this->var_progress();
    foreach ($var_progress as $key => $value) {
      echo "<option value='$key'";
      if ($data == $key) {
        echo " selected";
      }
      echo">$value</option>";
    }
  }

//end public function option_progress


  public function for_th($h, $j, $Y) {
    $Y = $this->convert_year($Y);
    for ($i = 1; $i <= $j; $i++) {
      $k = $h % 12;
      $l = 100 / $j;
      if ($k == 0) {
        $k = 12;
      }
      echo "<th class='h80'><div class='";
      if ($j == '18') {
        echo "txt_ver60 txt_80";
      } else {
        echo "txt_100 text-center";
      }
      echo "'>" . $this->strMonthCut[$k] . "&nbsp;" . substr($Y, 2) . "</div></th>";
      $h++;
      if ($k == 12) {
        $Y++;
      }
    }
  }

  public function get_progress_color() {
    $progress_color = array("bg_tb1", "bg_tb2", "bg_tb3");
    return $progress_color;
  }

  public function get_month_name($num_month) {
    return $this->strMonth[$num_month];
  }

  public function convert_year($num_year) {
    $year = $num_year + 543;
    return $year;
  }

  public function select_range($select_name, $range_value) {
    if ($range_value == "") {
      $range_value = 6;
    }
    echo"<select name='$select_name'>";
    foreach ($this->range as $key => $value) {
      echo "<option value='$key'";
      if ($range_value == $key) {
        echo " selected";
      }
      echo">$value</option>";
    }
    echo"</select>";
  }

  public function check_page() {
    global $page, $offset;
    if (isset($_REQUEST['page'])) {
      $page = $_REQUEST['page'];
    } else {
      $page = '1';
    }
    if (isset($_REQUEST['offset'])) {
      $offset = $_REQUEST['offset'];
    } else {
      $offset = '10';
    }
  }

  public function check_var($var) {//เอาไว้เช็คค่าตัวแปรที่เราต้องการจะเช็ค
    global $$var;
    if (isset($_REQUEST[$var])) {
      $$var = $_REQUEST[$var];
    } else {
      $$var = '';
    }
//echo $var ." => ".$$var;
  }

  public function check_array($data, $sql) {//เอาไว้เช็คค่าภายในของ array ที่ต้องการดู
    echo "<hr><pre>$sql<hr>";
    print_r($data);
    echo "</pre><hr>";
  }

//เอาไว้แสดงสไลด์ เลื่อนลงมาเพื่อแสดงให้ user ทราบสถานะการดำเนินการของระบบ ส่งค่าด้วยตัวแปรชื่อ $a
  public function modal($a) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body text-center txt_120">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <b class="txt_blue"><?php echo $a ?></b>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_REQUEST['a'])) { ?>
      <script>
        $(document).ready(function () {
          $("#myModal").modal();
        });
      </script>
    <?php } ?>
    <!-- END Modal -->
    <?php
  }

//เช็คว่ามีการส่งตัวแปรนี้ขึ้นมาหรือไม่แล้วเซ็ตค่ากลับไป
  public function set_variable($var_name) {
    if (isset($_REQUEST[$var_name])) {
      $data = $_REQUEST[$var_name];
    } else {
      $data = '';
    }
    return $data;
  }

//รับ url เพื่อทำการ redircet ไปหน้าที่ต้องการ
  public function re_url($url) {
    header('Location: ' . $url);
  }

  public function get_zero($num) {
    $zero = array();
    for ($i = 0; $i <= $num; $i++) {
      array_push($zero, 0);
    }
    return $zero;
  }

  public function switch_tb_color($color) {
    if ($color === "#ffffff") {
      $color = "#dddddd";
    } else {
      $color = "#ffffff";
    }
    return $color;
  }

  public function check_pid($pid1) {
    $sql = "select `per_cardno`  from `dpis_master_search`  where `per_cardno`='$pid1' limit 1 ";
//  echo $sql . "<hr>";
    $q1 = mysql_query($sql)or die("Error Query [" . $sql . "]");
    if (mysql_fetch_assoc($q1)) {
      return 1;
    } else {
      return 0;
    }
  }

  public function set_data_from_request($check) {
    if ($check) {
      $data = $_REQUEST;
      unset($data["submit"]);
//    $data["rec_log"] = date("Y-m-d H:i:s");
    }
  }

  // $column_name = $utility->get_column_name_to_array(['log'], 'project');
  public function get_column_name($skip, $table_name) {
    $sql = "DESCRIBE $table_name ";
    mysql_query("SET NAMES UTF8");
//    echo $sql . "<hr>";
    $q1 = mysql_query($sql)or die("Error Query [" . $sql . "]");
    $data1 = array();
    $i = 0;
    while ($req1 = mysql_fetch_assoc($q1)) {
      if (!in_array($req1["Field"], $skip)) {
        $data1[$i] = $req1["Field"];
        $i++;
      }
    }
    return $data1;
  }

  // $column_name = $utility->get_column_name_to_array(['log'], 'project');
  public function get_column_name2($skip, $table_name) {
    $sql = "DESCRIBE $table_name ";
    mysql_query("SET NAMES UTF8");
//    echo $sql . "<hr>";
    $q1 = mysql_query($sql)or die("Error Query [" . $sql . "]");
    $data1 = "";
    while ($req1 = mysql_fetch_assoc($q1)) {
      if (!in_array($req1["Field"], $skip)) {
        $data1 .= " '" . $req1["Field"] . "',";
      }
    }
    return $data1;
  }

  public function prepare_data($tb_name) {
    foreach ($tb_name as $value) {
      if (isset($_POST[$value])) {
        $data[$value] = mysql_real_escape_string(@$_POST[$value]);
      }
    }
    return $data;
  }

  /* format input_text =
    $input1 = [
    ['รหัสโครงการ', 'project_id','value'=>''],
    ['ชื่อโครงการ', 'project_name','value'=>''],
    ];
   */

    public function input_text($input) {
      foreach ($input as $data1) {
        ?>
        <div class="form-group <?php echo $data1['css'] ?>">
          <label for="<?php echo $data1[1]; ?>"><?php echo $data1[0]; ?></label>
          <input type="text" class="form-control" placeholder="<?php echo $data1[0]; ?>" name="<?php echo $data1[1]; ?>" id="<?php echo $data1[1]; ?>" value="<?php echo $data1["value"]; ?>">
        </div>
        <?php
      }
    }

  /* format input_date =
    $date1 = [
    ['label' => 'ระยะเวลาการเตรียมการดำเนินงาน', 'input_name' => 'date_prepare', "min_date" => "2018-1-1", "max_date" => "2018-12-31"],
    ];
   */

    public function input_date($date) {
      foreach ($date as $data1) {
        ?>
        <div class="form-group <?php echo $data1['css'] ?>">
          <label><?php echo $data1["label"] ?></label>
          <div class="input-group date">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <input type="date" name="<?php echo $data1['input_name'] ?>" class="form-control pull-right" min="<?php echo $data1['min_date'] ?>" max="<?php echo $data1['max_date'] ?>" required   value="<?php echo @$data1['value']; ?>">
          </div>
          <!-- /.input group -->
        </div>
        <?php
      }
    }

    public function input_time($time) {
      foreach ($time as $data1) {
        ?>
        <div class="bootstrap-timepicker <?php echo $data1['css'] ?>">
          <div class="form-group"><label><?php echo $data1[0] ?></label>
            <div class="input-group"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <input name="<?php echo $data1[1] ?>" type="time" class="form-control timepicker" required  value="<?php echo @$data1['value']; ?>">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->
      </div>
      <?php
    }
  }

  //$number ตัวอย่าง format  ['label' => 'ร้อยละ', 'input_name' => 'percent', 'min' => '1', 'max' => '100', 'step' => '1','value'=>'' ,"req"=>'1'],
  public function input_number($number) {
    foreach ($number as $data1) {
      ?>
      <div class="form-group <?php echo $data1['css'] ?>">
        <label for="<?php echo $data1['input_name']; ?>"><?php echo $data1['label']; ?></label>
        <input type="number" min="<?php echo $data1['min']; ?>" max="<?php echo $data1['max']; ?>" step="<?php echo $data1['step']; ?>" class="form-control" placeholder="<?php echo $data1['label']; ?>" name="<?php echo $data1['input_name']; ?>" id="<?php echo $data1['input_name']; ?>" value="<?php echo $data1['value']; ?>" <?php
        if ($data1["req"] == "1") {
          echo " required='required' ";
        }
      ?>>
    </div>
    <?php
  }
}

  //$number ตัวอย่าง format  ['label' => 'ร้อยละ', 'input_name' => 'percent', 'min' => '1', 'max' => '100', 'step' => '1','value'=>'' ,"req"=>'1',"js"=>"function()"],
  //แบบแสดงตารางต่อกัน
public function input_number2($number) {
  foreach ($number as $data1) {
    ?>
    <td>
      <input type="number" value="<?= $data1["value"] ?>" name="<?= $data1["input_name"] ?>" id="<?= $data1["input_name"] ?>" class="col-sm-12 text-right" step="<?= $data1['step'] ?>" min="<?= $data1["min"] ?>" max="<?= $data1["max"] ?>" onchange="<?= $data1['js'] ?>">
    </td>
    <?php
  }
}

  /* format input_hidden =
    $hidden = [
    [ 'pcode','30'],
    ];
   */

    public function input_hidden($input_hidden) {
      foreach ($input_hidden as $data1) {
        echo "<input type='hidden'  name='" . $data1[0] . "' id='" . $data1[0] . "' value='" . $data1[1], "'>";
      }
    }

    public function input_checkbox($input_checkbox) {
      foreach ($input_checkbox as $data1) {
        echo "<div class=' form-group " . $data1['css'] . "' >\n"
        . "<span class='h4'>" . $data1[1] . ". " . $data1[0] . "</span><br>"
        . "\n";
        foreach ($data1[2] as $data2) {
          echo "\n<label class=\"col col-sm-11 col-sm-offset-1\" >";
//        echo "\n<label >";
          echo "\n<input type='checkbox' name='" . $data2[1] . "' id='" . $data2[1] . "' ";
          if ($data2["checked"] == "1") {
            echo " checked='checked' ";
          }
          echo ">\n"
          . "<span class='h5'> " . $data2[0] . "</span>"
          . "</label>";
        }
        echo "\n</div>"
        . "<br>";
      }
    }

  /*
    $textarea1 = [
    ['label' => 'ผลที่คาดว่าจะได้รับ', 'input_name' => 'result','value'=>''],
    ['label' => 'ขั้นตอนการดำเนินงานโครงการ', 'input_name' => 'step','value'=>''],
  ]; */

  public function input_textarea($textarea) {
    foreach ($textarea as $data1) {
      ?>
      <div class="form-group <?php echo $data1['css'] ?>">
        <label for="<?php echo $data1["input_name"]; ?>" class="h4"><?php echo $data1["label"]; ?></label>
        <textarea name="<?php echo $data1["input_name"]; ?>" id="<?php echo $data1["input_name"]; ?>" class="form-control" rows="5" ><?php echo $data1["value"]; ?></textarea>
      </div>
      <?php
    }
  }

  /* format input_select =
    $select1 = [
    ['ประเภทของโครงการ', 'type_id', $type, 'req' => 1, 'js' => "get_sub_type('sub_type_id',this.value);" ,'select'='1'],
    ];
   */

    public function input_select($select) {
      foreach ($select as $data1) {
        $i = 1;
        ?>
        <div class="form-group <?php echo $data1['css'] ?>">
          <label for="<?php echo $data1[1]; ?>"><?php echo $data1[0]; ?></label>
          <select name="<?php echo $data1[1]; ?>" id="<?php echo $data1[1]; ?>" class="form-control" onchange="<?php echo $data1["js"] ?>"     >
            <option disabled="disabled">--- กรุณาเลือก <?php echo $data1[0]; ?> ---</option>
            <?php foreach ($data1[2] as $key2 => $value2) { ?>
              <option value="<?php echo $key2 ?>" <?php
              if (isset($data1["select"])) {
                if ($data1["select"] == $key2) {
                  echo " selected ";
                }
              }
              $i++;
              if ($data1["req"] == "1") {
                echo " required='required' ";
              }
            ?>><?php echo $value2 ?></option>
          <?php } ?>
        </select>
      </div>
      <?php
    }
  }

  /* format input_radio =
    $radio1 = [
    //    ['label' => "เพศ", 'input_name' => "gender", 0 => ["m" => 'ชาย', "f" => 'หญิง'], 1 => 'm'],
    ['label' => 'มีการก่อให้เกิดการกระตุ้นเศรษฐกิจฐานราก หรือสร้างรายได้เพิ่มแก่คนในหมู่บ้าน/ชุมชน',
    'input_name' => 'economic',
    0 => [0 => "ไม่มี การกระตุ้นเศรษฐกิจฐานราก หรือสร้างรายได้เพิ่มแก่คนในหมู่บ้าน/ชุมชน", 1 => "มี การกระตุ้นเศรษฐกิจฐานราก หรือสร้างรายได้เพิ่มแก่คนในหมู่บ้าน/ชุมชน"],
    1 => 0],
    ];
   */

    public function input_radio($input) {
      foreach ($input as $data1) {
        ?>
        <div class="form-group <?php echo $data1['css'] ?>"><label class="h4 col-sm-12"><?php echo $data1['label']; ?></label>
          <div class="col col-sm-offset-1 col-sm-11">
            <?php
            foreach ($data1[0] as $key => $value) {
              ?>

              <label class="radio-inline">
                <input type = "radio" name = "<?php echo $data1['input_name']; ?>" id = "<?php echo $data1['input_name']; ?>" value = "<?php
                echo $key . '"';
                if ($data1[1] == $key) {
                 echo " checked >";
               } else {
                 echo " >";
               }
               echo "" . $value . "</label>\n";
             }
             echo "\n</div>";
             echo "\n</div>";
           }
         }

         public function get_column_name_to_array($skip, $table_name) {
           $sql = "SHOW FULL COLUMNS FROM $table_name ";
           mysql_query("SET NAMES UTF8");
                 //echo $sql . "<hr>";
           $q1 = mysql_query($sql)or die("Error Query [" . $sql . "]");
//                 $data1 = array();
           $data1 = "";
//                 $i = 0;
           while ($req1 = mysql_fetch_assoc($q1)) {
             if (!in_array($req1["Field"], $skip)) {
//                     $data1[$i] = [$req1["Comment"], $req1["Field"]];
               $data1 .= " ['" . $req1["Comment"] . "','" . $req1["Field"] . "'],<br>";
//                     $i++;
             }
           }
           return $data1;
         }

         public function get_column_name_to_array2($skip, $table_name) {
           $sql = "SHOW FULL COLUMNS FROM `$table_name` ";
           mysql_query("SET NAMES UTF8");
                 //echo $sql . "<hr>";
           $q1 = mysql_query($sql)or die("Error Query [" . $sql . "]");
//                 $data1 = array();
           $data1 = "";
//                 $i = 0;
           while ($req1 = mysql_fetch_assoc($q1)) {
             if (!in_array($req1["Field"], $skip)) {
//                     $data1[$i] = [$req1["Comment"], $req1["Field"]];
               $data1 .= " ['field'=>'" . $req1["Field"] . "','comment'=>'" . $req1["Comment"] . "'],<br>";
//                     $i++;
             }
           }
           return $data1;
         }

         public function show_option($data) {
           $option = "";
           foreach ($data as $key => $value) {
             $option .= "<option value='$key' ";
             if ($key == $data['sel']) {
               $option .= " selected ";
             }
             $option .= ">$value</option>";
           }
           return $option;
         }

               /* format set_css_input =
                 $input1 = $utility->set_css_input($input1, 'col col-sm-4');
                */

                 public function set_css_input($data, $css) {
                   foreach ($data as $key => $value) {
                     $data[$key] += ['css' => $css];
                   }
                   return $data;
                 }

               /* format set_min_max_input =
                 $date1 = $utility->set_min_max_input($date1, "2018-1-1", "2018-12-31");
                */

                 public function set_min_max_input($data, $min, $max) {
                   foreach ($data as $key => $value) {
                     $data[$key] += ['min' => $min];
                     $data[$key] += ['max' => $max];
                   }
                   return $data;
                 }

               public function efz($data) {// empty_fill_zero()
                 return empty($data) ? 0 : $data;
               }

               /* ตัวอย่าง
                 $data_array = ["ProvinceCode" => "11000000", "UserName" => "moi", "PassWord" => "p@ss1q2w3e4r"];
                 $make_call = callAPI("POST", "http://moi.nsf.or.th:8881/nsfmoi/province/", json_encode($data_array));
                */

                 function callAPI($method, $url, $data) {
                   $curl = curl_init();

                   switch ($method) {
                     case "POST":
                     curl_setopt($curl, CURLOPT_POST, 1);
                     if ($data)
                       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                     break;
                     case "PUT":
                     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                     if ($data)
                       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                     break;
                     default:
                     if ($data)
                       $url = sprintf("%s?%s", $url, http_build_query($data));
                   }

                 // OPTIONS:
                   curl_setopt($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//                     'APIKEY: 111111111111111111111',
                     'Content-Type: application/json',
                   ));
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

                 // EXECUTE:
                   $result = curl_exec($curl);
                   if (!$result) {
                     die("Connection Failure");
                   }
                   curl_close($curl);
                   return $result;
                 }

                 function progress_bar($percent) {
                   if ($percent < 40) {
                     $css = " progress-bar-danger";
                   } elseif ($percent < 60) {
                     $css = " progress-bar-warning";
                   } elseif ($percent < 100) {
                     $css = " progress-bar-info";
                   } else {
                     $css = " progress-bar-success";
                   }
                   return $css;
                 }

               /*
                 $data_array = ["UserName" => "moi", "PassWord" => "p@ss1q2w3e4r"];
                 $call_url = "http://moi.nsf.or.th:8881/nsfmoi/province_all/";
                 $request_mothod = "POST" ;
                */

                 function call_api($data_array, $call_url, $request_mothod) {
                   $make_call = $this->callAPI($request_mothod, $call_url, json_encode($data_array));
                   $response = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $make_call), true);
                   return $response;
                 }

               // เอาไว้อ่านไฟล์ json มาเป็น php array
               // $json_file_name = "all.json";
                 function read_json($json_file_name) {
                   $prepare = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', file_get_contents($json_file_name));
                   $response = json_decode($prepare, true);
                   return $response;
                 }

                 function encrypt_data($plaintext) {
                   $key = "dopakey1234";
//                 $plaintext = "ioagertujha;lekjhglkjsdhf;kgjah;ekjhglkasdhlksahd'flka'glkdj'lkag'klh";
                   $cipher = "aes-192-cfb8";
                   $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_ZERO_PADDING);
                   return $ciphertext;
                 }

                 function decrypt_data($ciphertext) {
                   $key = "dopakey1234";
                   $cipher = "aes-192-cfb8";
                   $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options = OPENSSL_ZERO_PADDING);
                   return $original_plaintext;
                 }

                 public function hide_pid($var) {
                   if (strlen($var) == 13) {
                     $a = "x";
//                   $b = substr($var, 1, 4);
                     $b = "xxxx";
//                   $c = substr($var, 5, 5);
                     $c = "xxx" . substr($var, 9, 1);
                     $d = substr($var, 10, 2);
                     $e = substr($var, 12, 1);
                     return $a . "-" . $b . "-" . $c . "-" . $d . "-" . $e;
                   } else {
                     return strtoupper($var);
                   }
                 }

                 public function pid2($var) {
                   if (strlen($var) == 13) {
                     $a = substr($var, 0, 1);
//                   $b = substr($var, 1, 4);
                     $b = "xxxx";
//                   $c = substr($var, 5, 5);
                     $c = substr($var, 5, 1) . "xxx";
                     $d = substr($var, 10, 2);
                     $e = substr($var, 12, 1);
                     return $a . "-" . $b . "-" . $c . "-" . $d . "-" . $e;
                   } else {
                     return strtoupper($var);
                   }
                 }

                 public function show_pid($var) {
                   if (strlen($var) == 13) {
                     $a = substr($var, 0, 1);
                     $b = substr($var, 1, 4);
//                   $b = "xxxx";
                     $c = substr($var, 5, 5);
//                   $c = substr($var, 5, 1) . "xxx";
                     $d = substr($var, 10, 2);
                     $e = substr($var, 12, 1);
                     return $a . "-" . $b . "-" . $c . "-" . $d . "-" . $e;
                   } else {
                     return strtoupper($var);
                   }
                 }

               }
