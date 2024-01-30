<?php
$title = "บันทึกข้อมูลสถานที่จับกุม";
$module_name = "ข้อมูลสถานที่จับกุม";
require '../../require/head_php.php';
require '../../require/head_html.php';
?>

<div class="row">

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Vertical Form</h4>
    </div>
    <div class="card-body">
      <form class="form form-vertical" action="form_query.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <div class=" fs-5 ">
            <b>ม.๒๓ (๒)
            </b>
            <div>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <label> สถานที่บันทึก</label>
              <div class="form-group boxed">
                <div class="input-wrapper my-1">
                  <input type="text" class="form-control ps-1" name="Prac" id="Prac" value="<?=@$Prac; ?>" required>
                </div>
              </div>
            </div>
            <div class="col-lg-4"> <label> วัน/เดือน/ปี ที่บันทึก </label>
              <div class="form-group boxed">
                <div class="input-wrapper my-1">
                  <input type="date" class="form-control" min="2022-03-01" name="Drac" value="<?=@$Drac; ?>" required>
                </div>
              </div>
            </div>
            <div class="col-lg-4"> <label> วัน/เดือน/ปี ที่ควบคุมตัว</label>
              <div class="form-group boxed">
                <div class="input-wrapper my-1">
                  <input type="date" class="form-control" name="Dpac" value="<?=@$Dpac; ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group basic animated">
            <div class="input-wrapper ">
              <div class="row">
                <div class="col-lg-3">
                  <label class="my-1">เวลา</label>
                  <input type="time" class="form-control" name="Tpac" value="<?=@$Tpac; ?>" required>
                </div>

                <div class="col-lg-4">
                  <label class="my-1">
                    สถานที่/ท้องที่ ที่ควบคุมตัว
                  </label>
                  <input type="text" class="form-control ps-1" name="Z1" value="<?=@$Z1; ?>" required>
                </div>

                <div class="col-lg-3">
                  <label class="my-1">บ้านเลขที่</label> <input type="text" class="form-control ps-1" name="Zaddress1"
                    value="<?=@$Zaddress1; ?>" required>
                </div>

                <div class="col-lg-2">
                  <label class="my-1" for="" class="class">หมู่ </label> <input type="text" class="form-control ps-1"
                    name="Zaddress2" value="<?=@$Zaddress2; ?>" required>
                </div>

              </div>

              <div class="row my-2">
                <div class=" col-lg-4">
                  <label class="my-1" class="">แขวง/ตำบล</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                <div class=" col-lg-4">
                  <label class="my-1" class="">เขต/อำเภอ</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                <div class=" col-lg-4">
                  <label class="my-1" class="">จังหวัด</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <label class="my-1">หน่วยงานที่ควบคุมตัว</label>
                  <input type="text" class="form-control ps-1" name="Zdep" value="<?=@$Zdep; ?>" required>

                </div>

                <div class=" my-2 ">
                  <label> <b>เจ้าหน้าที่ผู้ทำการควบคุมตัว</b></label>


                  <div id="memberForm">
                    <div class="row">
                      <label class="my-1">ชื่อ-นามสกุล:</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control my-1 " name="Zperson" value="<?=@$Zperson; ?>" required>
                      </div>
                      <div class="col-lg-2">
                        <button type="button" class="btn btn-primary my-1" onclick="addInput()">Add Member</button>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            </div>

          </div>

          <div class=" fs-5 "><b>ม.๒๓(๔)
            </b>
            <div></div>
          </div>
          <br>


          <div class="  ">
            <div>เจ้าหน้าที่ของรัฐผู้ออกคำสั่งควบคุมตัว</div>
            <label class="">ชื่อ-นามสกุล:</label>
            <div class="">
              <div id="memberForm2">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="text" class="form-control " name="SE1" value="<?=@$SE1; ?>" required>
                  </div>
                  <div class="col-lg-2">
                    <button type="button" class="btn btn-primary " onclick="addInput2()">Add Member</button>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div class="form-group basic ">
            <div class="input-wrapper my-2">
              <label>เครื่องมือหรืออุปกรณ์บันทึกภาพและเสียง</label>
              <input type="text" class="form-control ps-1" name="PM3" value="<?=@$PM3; ?>" required>
            </div>
          </div>
          <div class="form-group basic ">
            <div class="input-wrapper my-2">
              <div class="my-2">
              <label for="" class="form-label">อัปโหลดสิ่งบันทึกภาพและเสียงอย่างต่อเนื่องในขณะจับและควบคุมตัว Download ได้จาก QR Code
              </label>
              <input type="file" class="form-control form-control-md" id="" name="PM4" accept=".jpg, .jpeg .mp4">
              </div>
           <div class="my-1">
           <label> อัปโหลดสิ่งบันทึกภาพและเสียงอย่างต่อเนื่องในขณะจับและควบคุมตัว Download ได้จากระบบ
              </label>
              <input type="file" class="form-control form-control-md" id="" name="PM4Q" accept=".jpg, .jpeg .mp4">
           </div>
            
             <div class="my-1">
             <label> Link สิ่งบันทึกภาพและเสียงอย่างต่อเนื่องในขณะจับและควบคุมตัว</label>
              <input type="text" class="form-control ps-1" name="PM4L" value="<?=@$PM4L; ?>">
             </div>
            
            </div>
          </div>
          <div class="form-group basic ">
            <div class="input-wrapper my-2">
              <div>เหตุสุดวิสัยหรือเหตุอื่นใดที่ทำให้ไม่สามารถทำการบันทึกภาพและเสียง
              </div>
              <input type="text" class="form-control ps-1" name="PM5" value="<?=@$PM5; ?>" required>
            </div>
            <div class="col-sm-12 text-center mb-4">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<?php
require '../../require/footer_content.php';
?>