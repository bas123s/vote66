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

              <div class="row ">
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
                      <label class="">ชื่อ-นามสกุล:</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control  " name="Zperson" value="<?=@$Zperson; ?>" required>
                      </div>
                      <div class="col-lg-2">
                        <button type="button" class="btn btn-primary " onclick="addInput()">Add Member</button>
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
            <div><b>เจ้าหน้าที่ของรัฐผู้ออกคำสั่งควบคุมตัว</b></div>
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
  <section class="modern-vertical-wizard">
                    <div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details-vertical-modern" role="tab" id="account-details-vertical-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Account Details</span>
                                        <span class="bs-stepper-subtitle">Setup Account Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#personal-info-vertical-modern" role="tab" id="personal-info-vertical-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Personal Info</span>
                                        <span class="bs-stepper-subtitle">Add Personal Info</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#address-step-vertical-modern" role="tab" id="address-step-vertical-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="map-pin" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Address</span>
                                        <span class="bs-stepper-subtitle">Add Address</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#social-links-vertical-modern" role="tab" id="social-links-vertical-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="link" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Social Links</span>
                                        <span class="bs-stepper-subtitle">Add Social Links</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="account-details-vertical-modern" class="content" role="tabpanel" aria-labelledby="account-details-vertical-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Account Details</h5>
                                    <small class="text-muted">Enter Your Account Details.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-username">Username</label>
                                        <input type="text" id="vertical-modern-username" class="form-control" placeholder="johndoe" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-email">Email</label>
                                        <input type="email" id="vertical-modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-modern-password">Password</label>
                                        <input type="password" id="vertical-modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-modern-confirm-password">Confirm Password</label>
                                        <input type="password" id="vertical-modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="personal-info-vertical-modern" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Personal Info</h5>
                                    <small>Enter Your Personal Info.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-first-name">First Name</label>
                                        <input type="text" id="vertical-modern-first-name" class="form-control" placeholder="John" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-last-name">Last Name</label>
                                        <input type="text" id="vertical-modern-last-name" class="form-control" placeholder="Doe" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-country">Country</label>
                                        <select class="select2 w-100" id="vertical-modern-country">
                                            <option label=" "></option>
                                            <option>UK</option>
                                            <option>USA</option>
                                            <option>Spain</option>
                                            <option>France</option>
                                            <option>Italy</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-language">Language</label>
                                        <select class="select2 w-100" id="vertical-modern-language" multiple>
                                            <option>English</option>
                                            <option>French</option>
                                            <option>Spanish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="address-step-vertical-modern" class="content" role="tabpanel" aria-labelledby="address-step-vertical-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Address</h5>
                                    <small>Enter Your Address.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-address">Address</label>
                                        <input type="text" id="vertical-modern-address" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-landmark">Landmark</label>
                                        <input type="text" id="vertical-modern-landmark" class="form-control" placeholder="Borough bridge" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pincode4">Pincode</label>
                                        <input type="text" id="pincode4" class="form-control" placeholder="658921" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="city4">City</label>
                                        <input type="text" id="city4" class="form-control" placeholder="Birmingham" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="social-links-vertical-modern" class="content" role="tabpanel" aria-labelledby="social-links-vertical-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Social Links</h5>
                                    <small>Enter Your Social Links.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-twitter">Twitter</label>
                                        <input type="text" id="vertical-modern-twitter" class="form-control" placeholder="https://twitter.com/abc" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-facebook">Facebook</label>
                                        <input type="text" id="vertical-modern-facebook" class="form-control" placeholder="https://facebook.com/abc" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-google">Google+</label>
                                        <input type="text" id="vertical-modern-google" class="form-control" placeholder="https://plus.google.com/abc" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-linkedin">Linkedin</label>
                                        <input type="text" id="vertical-modern-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
</div>
 
<?php
require '../../require/footer_content.php';
?>