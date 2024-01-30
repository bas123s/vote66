<?php
require 'php_utility.php';

class html extends php_utility {

//public function list_option
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  public function list_option($data, $select_name, $css_class_name, $selected, $js_function) {
    echo"<select class='$css_class_name' name='$select_name' onchange='$js_function' required>";
    echo"<option>------กรุณาเลือก------</option>";
    $this->loop_option($data, $selected);
  }

//end public function list_option
  //public function list_option2
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  public function list_option2($data, $select_name, $css_class_name) {
    echo"<select class='$css_class_name' name='$select_name'  required='required'>";
    foreach ($data as $key => $value) {
      echo "<option value='$key' >$value</option>";
    }
    echo "</select>";
  }

//end public function list_option2
//public function list_option3
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  public function list_option3($data, $select_name, $css_class_name, $selected, $js_function) {
    echo"<select class='$css_class_name' name='$select_name'  id='$select_name' onchange='$js_function'   required='required'>";
    $this->loop_option($data, $selected);
  }

//end public function list_option3
//public function list_option4
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  //$text = คำอธิบาย
  public function list_option4($data, $select_name, $css_class_name, $selected, $js_function, $text) {
    echo"<select class='$css_class_name' name='$select_name'  id='$select_name'  " . $js_function . "  >";
    echo"<option value='' disabled='' selected=''>" . $text . "</option>";
    $this->loop_option($data, $selected);
  }

  //public function list_option5
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  //$text = คำอธิบาย
  //ต่างจาก 4 ตรง require
  public function list_option5($data, $select_name, $css_class_name, $selected, $js_function, $text) {
    echo"<select class='$css_class_name' name='$select_name'  id='$select_name'  " . $js_function . "  required='required'>";
    echo"<option value='' disabled='' selected=''>" . $text . "</option>";
    $this->loop_option($data, $selected);
  }

  //public function list_option4
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  //$text = คำอธิบาย
  public function list_option6($data, $select_name, $css_class_name, $selected, $js_function, $text) {
    echo"<select class='$css_class_name' name='$select_name'  id='$select_name'  " . $js_function . "  >";
    echo"<option value='' disabled='' >" . $text . "</option>";
    $this->loop_option($data, $selected);
  }

//public function list_ccaatt_option
  //$data = array ข้อมูล
  //$select_name = ชื่อของ select
  //$css_class_name = class css ที่จะให้ select ใช้
  //$selected = id ที่จะให้ selected (ถ้ามี)
  //$js_public function = ชื่อฟังก์ชั่นของ javascript ที่จะเรียกใช้
  //$text = คำอธิบาย
  public function list_ccaatt_option($data, $select_name, $css_class_name, $selected, $js_function, $text) {
    echo"<select class='$css_class_name' name='$select_name' onchange='$js_function'  required='required'>";
    switch ($text) {
      case 'aa':echo"<option>อำเภอ/เขต</option>";
        break;
      case 'tt':echo"<option>ตำบล/แขวง</option>";
        break;
      default : echo"<option>จังหวัด</option>";
        break;
    }
    $this->loop_option($data, $selected);
  }

//end public function list_option

  private function loop_option($data, $selected) {
    foreach ($data as $key => $value) {
      echo "<option value='$key' ";
      if ((string) $key === $selected) {
        echo" selected ";
      }//else{echo" $selected ";}
      echo" >$value</option>";
    }
    echo "</select>";
  }

  //public function list_radio
  //$data = array ข้อมูล
  //$name = ชื่อฟิลด์ที่จะส่ง
  //$check_id = id ของ radio ที่จะ checked
  public function list_radio($data, $name, $check_id, $css, $css_label) {
    foreach ($data as $key => $value) {
      echo "<br><input class = 'w3-radio " . $css . "' type = 'radio' name = '" . $name . "' id='$name$key' value='$key' required='required'   ";
      if ($check_id == $key) {
        echo " checked ";
      }
      echo "> <label class='" . $css_label . "'>" . $value . "</label>";
    }
  }

//public function list_insert_text
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะจัด
//$input_name = ชื่อ input ที่จะแสดง
//$last_label = คำตามท้าย input (ถ้ามี)
//$data = ข้อมูลของ input ถ้ามี
  public function list_insert_text($first_label, $css, $input_name, $last_label, $data) {
    foreach ($input_name as $key => $value) {
      echo "<div class='form-group'><div class='" . $css[0] . "'>" . $first_label[$key] . "</div>
					<div class='" . $css[1] . "'>
					<input name='$value' type='text' class='" . $css[2] . "' value='" . @$data[$value] . "' ";
      if ($key == 0) {
        echo " autofocus ";
      }
      echo "  required='required'></div>";
      if ($last_label != '') {
        echo "<div class='" . $css[3] . "'>$last_label</div>";
      }
      echo"</div>";
    }
  }

//public function list_insert_text
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะจัด
//$input_name = ชื่อ input ที่จะแสดง
//$last_label = คำตามท้าย input (ถ้ามี)
//$data = ข้อมูลของ input ถ้ามี
  public function list_text($first_label, $css, $input_name, $last_label, $data) {
    foreach ($input_name as $key => $value) {
      echo "<div class='form-group row m_b_5 m_r_5'>
									<div class='" . $css[0] . "'>" . $first_label[$key] . "</div>
									<div class='" . $css[1] . "'>" . number_format(@$data[$value]) . "</div>";
      if ($last_label != '') {
        echo "<div class='" . $css[2] . "'>$last_label</div>";
      }
      echo"</div>";
    }
  }

//public function list_insert_text
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะจัด
//$input_name = ชื่อ input ที่จะแสดง
//$last_label = คำตามท้าย input (ถ้ามี) (แบบ ARRAY)
//$data = ข้อมูลของ input ถ้ามี
  public function list_text2($first_label, $css, $input_name, $last_label, $data) {
    foreach ($input_name as $key => $value) {
      echo "<div class='form-group row m_b_5 m_r_5'>
									<div class='" . $css[0] . "'>" . $first_label[$key] . "</div>
									<div class='" . $css[1] . "'>" . number_format(@$data[$value]) . "</div>";
      if ($last_label != '') {
        echo "<div class='" . $css[2] . "'>$last_label[$key]</div>";
      }
      echo"</div>";
    }
  }

//public function list_insert_text
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะจัด
//$input_name = ชื่อ input ที่จะแสดง
//$last_label = คำตามท้าย input (ถ้ามี)
//$data = ข้อมูลของ input ถ้ามี
  public function list_insert_number($first_label, $css, $input_name, $last_label, $data, $min, $max, $required) {
    foreach ($input_name as $key => $value) {
      echo "<div class='form-group'><div class='" . $css[0] . "'>" . $first_label[$key] . "</div>
					<div class='" . $css[1] . "'>
                    <input name='$value' type='number' class='" . $css[2] . "' value='";
      if (!empty($data[$value])) {
        echo @$data[$value] . "'";
      } else {
        echo "0'";
      }
      if ($key == 0) {
        echo " autofocus ";
      }
      echo " min='$min' max='$max' ";
      if ($required == 1) {
        echo " required ";
      }
      echo"  required='required'></div>";
      if ($last_label != '') {
        echo "<div class='" . $css[3] . "'>$last_label</div>";
      }
      echo"</div>";
    }
  }

//public function list_insert_text
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะจัด
//$input_name = ชื่อ input ที่จะแสดง
//$last_label = คำตามท้าย input (ถ้ามี)
//$data = ข้อมูลของ input ถ้ามี
  public function list_group($first_label, $css, $input_name, $last_label, $data) {
    foreach ($input_name as $key => $value) {
      echo "<ul class='list-group m_b_0'>
<li class='list-group-item'><span class='badge'>" . @$data[$value] . " $last_label</span>" . $first_label[$key] . "</li></ul>";
    }
  }

//public function list_checkbox
//$first_label = array คำนำหน้า input
//$css = array css ที่ต้องการจะใช้ "checkbox","checkbox-inline"
//$last_label = คำตามท้าย input (ถ้ามี)
//$data = ข้อมูลของ input ถ้ามี
  public function list_checkbox($first_label, $css, $last_label, $data) {
    foreach ($data as $key => $value) {
      echo"<div class='$css' ><label><input type='checkbox' value='$key'>" . $value . ' ' . $first_label[$key] . "</label></div>";
    }
  }

  public function get_modal($text_header, $text_body, $modal_id) {
    ?>
    <!-- The Modal -->
    <div class='modal fade' id='<?= $modal_id ?>'>
      <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content '>

          <!-- Modal Header -->
          <div class='modal-header bg-danger'>
            <h4 class='modal-title'><?= $text_header ?></h4>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
          </div>
          <!-- Modal body -->
          <div class='modal-body' id='modal-body'><?= $text_body ?></div>
          <!-- Modal footer -->
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary bg-danger' data-dismiss='modal'>ปิด</button>
          </div>

        </div>
      </div>
    </div>
    <?php
    echo"
    <script>
      $(document).ready(function () {
        $('#" . $modal_id . "').modal();
      });
    </script>";
  }

}

//end class html