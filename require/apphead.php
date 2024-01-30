<div class="w3-bar w3-container w3-right-align w3-xxlarge w3-hide-small w3-padding-16 <?= @$appname_panel["css"] ?>" style="<?= @$appname_panel["style"] ?>">
  <img src="../../require/images/logo.png" style="width:100px;" class=""><br>
  <?= @$mc->app_name ?>
  <!--  <div class="w3-large">
      < ?= @$user["username"] . "<br>" . " " . @$app_privilege[@$user["privilege"]] . "<br>";
      if (@$user["privilege"] < 4) {
        echo @$user["aname"];
      }
      echo " " . @$user["pname"]; ?>
    </div>-->
</div>

<div class="w3-bar w3-right-align w3-container  w3-large w3-hide-medium w3-hide-large w3-padding-16 <?= @$appname_panel["css"] ?>" style="<?= @$appname_panel["style"] ?>">
  <img src="../../require/images/logo.png" style="width:40px;" class=""><br>
  <?= @$mc->app_name ?>
  <!--  <div class="w3-medium">
  <?=
  // @$user["username"] . "<br>" . " " . @$app_privilege[@$user["privilege"]] . "<br>";
  @$user["username"] . "<br>";
  if (@$user["privilege"] >= 7) {
    echo @$app_privilege[@$user["privilege"]] . "<br>";
  }
  if (@$user["privilege"] < 4) {
    echo @$user["aname"];
  }
  echo " " . @$user["pname"]
  ?></div>-->
</div>