<?php
require '../../require/head_php.php';
require '../../require/head_html.php'; //แก้ไข menu ในไฟล์  menuconfig.php
?>

<div class="section mt-2" >

  <?php for ($i = 1; $i <= 5; $i++) { ?>
    <div class="form-group boxed">
      <div class="input-wrapper my-1">
        <!-- <input type="text" class="form-control ps-1 fname" name="fname[]" id="fname[]" value="<?= $i ?>"> -->
        <input type="text" class="form-control ps-1 fname" name="fname[]" id="fname" value="<?= $i ?>">
        <input type="text" class="form-control ps-1 behavior" name="behavior[]" id="behavior[]" value="<?= $i * $i ?>">
      </div>
    </div>
    <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#editUser" onclick="update_modal('<?= $i ?>', '<?= ($i * $i) ?>');">Show <?= $i ?></button>
  <?php } ?>

</div>





<!--MODAL-->
<div class="modal fade show" id="editUser" tabindex="-1" aria-modal="true" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
        <form action="" id="form-1" method="POST">
          <div id="fname"></div>
          <div id="behavior"></div>


          <br>
          num1 : <input type='text' id='num1' value=''><br>
          num 2 : <input type="text" id="num2" value="">

        </form>


      </div>
    </div>
  </div>
</div>

<!--MODAL-->


<script>
  function update_modal() {

    // $("#num1").val(num1);
    // $("#num2").val(num2);
    // var fname_text = "";
    var behavior_text = "";


    // $.each($(".fname"), function (i, data) {
    //   console.log("fname " + i + ": " + $(data).val());
    //   fname_text += "fname " + i + ": <input id='fname' value='" + $(data).val() + "'><br>";
    // });

    // $("#fname").html(fname_text);

    // $.each($(".behavior"), function (i, data)
    // {
    //   console.log("behavior " + i + ": " + $(data).val());
    //   behavior_text += "behavior " + i + ": <label id='behavior'>" + $(data).val() + "</label><br>";
    // });

    // $("#behavior").html(behavior_text);
    
    var input_c = document.getElementsByName("fname[]");
    var input_b = document.getElementsByName("behavior[]");
    console.log(input_c.length);
    for (var i =0; i < input_c.length; i++) {
      behavior_text += "behavior " + i + ": <label>ชื่อ: " + input_c[i].value + "</label><label>นามสกุล: " + input_b[i].value + "</label><br>";
      console.log(input_c[i].value);
    }
     $("#behavior").html(behavior_text);
  }
</script>

<script src="../../../app-assets/js/scripts/pages/modal-edit-user.js"></script>
<!--ปิดแก้ไข javascript ที่นี่-->

<!-- footer content -->
<?php require '../../require/footer_content.php'; ?>
<!-- /footer content -->
