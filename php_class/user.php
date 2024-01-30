<?php

require 'db_conn.php';

class user extends db_conn {

  /**
   * [login ทำการเข้าสู่ระบบ]
   * @param  [type] username [รหัสสำนักทะเบียน]
   * @param  [type] password    [password]
   * @return [type]         [ส่งค่า ที่ login ได้  ไป 1 แถว]
   */
//check password
  public function ck_pwd($username, $password, $url, $app_id) {

    $user_data = $this->get_pw($username, $app_id);
    if (!empty($user_data)) {
//      $this->check_variable();
//      $this->check_array($user_data, "user_data");
//      echo $user_data['password'] . " pass db<hr>" . $this->hash($password) . "&nbsp;pass login<hr>";
      if ($user_data['password'] == $this->hash($password)) {
//        echo "login pass";
        if (!isset($_SESSION)) {
          session_start();
        }
//        echo session_id() . "<hr>";
        $this->last_active($user_data['mem_id']);
        $this->set_session($url, $user_data, session_id());
      } else {
        //echo "error username or password<br>";
        //echo $username . " | " . $password;
        session_destroy();
        header('Location: index.php?a=รหัสผ่านผิด');
        //header('Location: http://mis.dopa.go.th/palad/index.php?a=error1');
      }
    } else {
//      session_destroy();
//      header('Location: index.php?a=ไม่มีผู้ใช้ในระบบ หรือ ถูกระงับการใช้งาน');
      $hr_url = "http://172.28.254.61/api/personal_linkage/EForeignAPI/EForeign@12ce0170743ab8fa5e307d3659e7646c/" . $username;
      $response = file_get_contents($hr_url);
      $response = json_decode($response);

      if ($response->response_status == "200") {
//      $this->check_array($response, $url);
        $sql = "SELECT `thai_name`, `eng_name` FROM `dopa_directory`.`position_all` WHERE `thai_name` LIKE '" . $response->data->PL_NAME . "%" . $response->data->LEVEL_NAME . "' ;";
        $position = $this->select_1($sql);

        $sql2 = "SELECT CONCAT(`name1`,' ',`name2`) AS `name`,"
                . "CONCAT( `ename2`, ' of ', `ename1` ) AS `ename`  "
                . "FROM `dopa_directory`.`org` "
                . "WHERE `name1` LIKE '%" . $response->data->ORG_NAME . "%' AND `name2` LIKE '%" . $response->data->ORG_1_NAME . "%'  ;";
        $org = $this->select_1($sql2);

        $user_data = [
            "pid" => $username,
            "username" => $response->data->PN_NAME . " " . $response->data->PER_NAME . " " . $response->data->PER_SURNAME,
            "username_eng" => @$response->data->PN_ENG_NAME . " " . @$response->data->PER_ENG_NAME . " " . @$response->data->PER_ENG_SURNAME,
            "position" => @$position["thai_name"],
            "position_eng" => @$position["eng_name"],
            "org" => @$org["name"],
            "org_eng" => @$org["ename"],
            "privilege" => 1,
        ];

        $this->check_array($response, $url);
        $this->check_array($user_data, "userdata");
//        $this->set_session($url, $user_data, session_id());
      } else {
        session_destroy();
        header('Location: index.php?a=ไม่มีผู้ใช้ในระบบ หรือ ถูกระงับการใช้งาน');
      }
    }
  }

  /**
   * [function อัพเดท password]
   */
  private function update_pass($username, $password) {
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `user` SET "
            . "`password`= :password, "
            . "`log`= :log "
            . " WHERE `mem_id`= :mem_id ";
//    echo $sql;
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':log', $reclog);
    $stmt->bindParam(':mem_id', $username);
//    $stmt->execute();
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
  }

//end function update_pass


  public function get_user($username) {
    $sql = "SELECT * FROM `user` WHERE `username` ='" . $username . "'";
    $result = parent::select_1($sql);
    return $result;
  }

  //hash password
  public function hash($password) {
    $salt1 = "dopaic@d";
    $salt2 = "ic@d0317";
    $hash = hash('sha256', $salt1 . $password . $salt2);
    return $hash;
  }

  //change password
  public function ch_pwd($username, $password, $url) {
//    $this->check_variable();
    $this->update_pass($username, $this->hash($password));
//    $this->check_array($password, $password);
//    exit();
    session_destroy();
    header('Location: ' . $url);
//        header('Location: http://mis.dopa.go.th/palad/main.php?a=cpwd');
    return;
  }

  //reset password
  public function reset_password($username, $url) {
    $this->update_pass($username, $this->hash("D@P@0315"));
//    header('Location: ' . $url);
//        header('Location: http://mis.dopa.go.th/palad/main.php?a=reset');
    return;
  }

  //get password
  private function get_pw($username, $app_id) {
    $sql = "SELECT * "
            . "FROM `user` "
            . "WHERE ("
            . "(`pid`='$username')"
            . " and (`app_id`='" . $app_id . "')"
            . " and (`mem_status`='2')"
            . ")  limit 1 ;";
//    echo $sql;
    $result = parent::select_1($sql);
    return $result;
  }

  public function change_status_member($pid, $mem_status, $url) {
    $this->update_status_member($pid, $mem_status);
//    header('Location: ' . $url);
//        header('Location: http://mis.dopa.go.th/palad/main.php?a=reset');
    return;
  }

  private function update_status_member($pid, $mem_status) {
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `user` SET "
            . "`mem_status`= :mem_status, "
            . "`log`= :log "
            . " WHERE `pid`= :pid ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':mem_status', $mem_status);
    $stmt->bindParam(':log', $reclog);
    $stmt->bindParam(':pid', $pid);
    $stmt->execute();
  }

  public function check_user_status($pid) {
    $sql = "SELECT `pid`,`mem_status` "
            . "FROM `user` "
            . "WHERE `pid`=:pid ; ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':pid', $pid);

    $this->save_to_log($sql);
    if (!$stmt) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($data)) {
      return $data["mem_status"];
    } else {
      return 3;
    }
  }

  public function check_server($pcode) {
//    echo $pcode . "<hr>";
//    exit();
    $url = "";
    switch (substr($pcode, 0, 1)) {
      case "0":
        $url = "https://www.thaiqm.com/core/user/password.php";
        break;

      case "5": case "6":
        $url = "https://thaiqm1.dopa.go.th/core/user/password.php";
        break;

      case "3":
        $url = "https://thaiqm3.dopa.go.th/core/user/password.php";
        break;

      case "4":
        $url = "https://thaiqm4.dopa.go.th/core/user/password.php";
        break;

      case "8": case "9":
        $url = "https://thaiqm5.dopa.go.th/tqm/core/user/password.php";
        break;

      default:
        $url = "https://thaiqm2.dopa.go.th/core/user/password.php";
        break;
    }
    $_POST["chx"] = "0";

    echo "<form id='myForm' action='" . @$url . "' method='post'>";

    foreach ($_POST as $a => $b) {
      echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
    }
    echo "</form>";
//    exit();
    echo "
    <script type='text/javascript'>
      document.getElementById('myForm').submit();
    </script>";
    exit();
  }

  function show_privilege($user) {
    $variable = $this->get_variable();
    $app_privilege = $variable["app_privilege"];
    switch ($user["privilege"]) {
      case "1":
        echo $app_privilege[$user["privilege"]] . @$user["mname"];
        break;
      case "2":
        echo $app_privilege[$user["privilege"]] . @$user["lname"];
        break;
      case "3":
        echo $app_privilege[$user["privilege"]] . @$user["tname"];
        break;
      case "4":
        echo $app_privilege[$user["privilege"]] . @$user["aname"];
        break;
      case "5" :
      case "6":
        echo $app_privilege[$user["privilege"]] . @$user["pname"];
        break;

      default:
        echo $app_privilege[$user["privilege"]];
    }
  }

}

//end class user
//$user = new user("conn_user_class");
////$user = new user();
//$user->ck_pwd("3102002472231", "1", "", $user->app_id);
?>