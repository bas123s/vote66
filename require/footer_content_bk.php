<div id="modal_request" class="w3-modal ">
  <div class="w3-modal-content w3-card-4  w3-animate-zoom">
    <div class="w3-container w3-green ">
      <p class="w3-xxlarge w3-center"><?= @$_REQUEST["a"] ?></p>
    </div>
  </div>
</div>

<script>
  // Get the modal
  var modal1 = document.getElementById('modal_request');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target === modal1) {
      document.getElementById('modal_request').style.display = "none";
    }
  }

<?php
if (isset($_REQUEST["a"])) {
  echo "document.getElementById('modal_request').style.display = 'block';";
}
?>
</script>

</div>
</div>
<!-- footer content -->
<div style="height: 200px;">&nbsp;</div>
<div class="w3-bottom">
  <div class="w3-bar <?= $footer_bar["css"] ?>"  style="height: 100%; <?= $footer_bar["style"] ?>">
    <div  class="w3-large w3-row w3-center w3-hide-small">
      <h6>
        <div class=""><i class="far fa-copyright"></i> ออกแบบและพัฒนาโดย ศูนย์สารสนเทศเพื่อการบริหารงานปกครอง</div>
      </h6>
    </div>
    <div  class="w3-large w3-row w3-hide-medium w3-hide-large">
      <h6>
        <div class="w3-col s12 m6 w3-center"><i class="far fa-copyright"></i> ออกแบบและพัฒนาโดย<br>ศูนย์สารสนเทศเพื่อการบริหารงานปกครอง</div>
      </h6>
    </div>
  </div>
</div>
<!-- /footer content -->

</body>
</html>
<?php $mc = null; ?>