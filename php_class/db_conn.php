<?php

require 'html.php';

class db_conn extends html {

  public $conn, $table_name, $primary_key, $app_id, $app_name;
  public $data, $field = array();

//constructor class (เอาไว้ connect data base)
  public function __construct($file_name) {
    require $file_name . '.php';
    $conn_file = new $file_name();
    $this->app_id = $conn_file->app_id;
    $this->app_name = $conn_file->app_name;
//    $this->app_theme = $conn_file->app_theme;
    try {
      if ($this->conn == null) {///////******check connection*******////////
        if ($conn_file->server_type === "oracle") {
          $this->conn = new PDO($conn_file->servername, $conn_file->username, $conn_file->password);
        } else {
          $this->conn = new PDO("mysql:host=$conn_file->servername;dbname=$conn_file->dbname", $conn_file->username, $conn_file->password, $conn_file->options);
        }
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors("", $e->getMessage(), $e->getCode());
      exit();
    }
  }

//end public function oop_db
//เอาไว้เช็คเวลาของ session ถ้าหมดเวลาจะทำการทำลาย session ทิ้ง
  public function check_session($session_id, $app_id) {

    if (isset($_SESSION[$session_id][$app_id]['timeout'])) {
      // ตั้งเวลา session ที่จะตรวจสอบ (หน่วยเป็นวินาที)
      $inactive = 432000000;

      $session_life = time() - $_SESSION[$session_id][$app_id]['timeout'];
//      $this->check_array($_SESSION, "session_id = " . $session_id . " and app_id = " . $app_id . " and time = " . time() . " and timeout = " . $_SESSION[$session_id][$app_id]['timeout'] . " session_life = " . $session_life);
      if ($session_life > $inactive) {
        session_unset($_SESSION[$session_id][$app_id]);
        header("Location: ../../core/user/index.php");
      } else {
        $_SESSION[$session_id][$app_id]['timeout'] = time();
      }
    } else {
      //session_destroy();
      header("Location: ../../core/user/");
    }
  }

//เอาไว้ กำหนด session กลางของระบบ
  public function set_session($url, $user_data, $session_id) {
    //session_start();
    $_SESSION[$session_id][$this->app_id] = array();
    //$_SESSION[$app[0]]=$app[0];
    $_SESSION[$session_id][$this->app_id]['app_name'] = $this->app_name;

    foreach ($user_data as $key => $value) {
      $_SESSION[$session_id][$this->app_id][$key] = $value;
    }

    $_SESSION[$session_id][$this->app_id]['timeout'] = time();
    session_write_close();
//    header("location: " . $url . "?a=คุณเข้าสู่ระบบด้วยผู้ใช้ " . $user_data["name"]);
    header("location: " . $url);
    //exit();
  }

//public function get_reclog เอาไว้สร้าง log เก็บใน table ต่างๆ
  protected function get_reclog($action) {
    if (!isset($_SESSION)) {
      session_start();
    }
    $reclog = "#$action#" . date("Y-m-d H:i:s") . "#" . $_SERVER['REMOTE_ADDR'] . "#" . @$_SESSION[session_id()][$this->app_id]['pid'] . "#";
    return $reclog;
  }

//end public function get_reclog
//public function select1 ทำการ select ข้อมูลแบบ 1 ชุด
  public function select_1($sql) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    try {
      $Tmp->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }

    return $Tmp->fetch(PDO::FETCH_ASSOC);
  }

//end public function select1

  /* select_2 ทำการ select ข้อมูลแบบ หลายชุด
   * @return ตัวอย่าง array
   * [1] => เมืองนนทบุรี
   * [2] => บางกรวย
   * [3] => บางใหญ่
   */
  public function select_2($sql) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    $i = 1;
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$i] = $row;
        $i++;
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

//end public function select_2

  /**
    [select_3 เอา id ชี้ค่า value]
   * @return ตัวอย่าง array
   * [12010000] => เมืองนนทบุรี
   * [12020000] => บางกรวย
   * [12030000] => บางใหญ่
   */
  public function select_3($sql, $id, $name) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }

    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$id]] = $row[$name];
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_4 ดึงข้อมูลตามคำสั่ง sql]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_4($sql, $id1, $id2, $name) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }

    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$id1]][$row[$id2]] = $row[$name];
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_5 ดึงข้อมูลตามคำสั่ง sql]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_5($sql, $id) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$id]] = $row;
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_6 ดึงข้อมูลตามคำสั่ง sql]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_6($sql, $id1, $id2) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$id1]][$row[$id2]] = $row;
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_7 ดึงข้อมูลตามคำสั่ง sql (index 3 level ) ]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_7($sql, $array_id) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$array_id[0]]][$row[$array_id[1]]][$row[$array_id[2]]] = $row;
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_8 ดึงข้อมูลตามคำสั่ง sql (index 3 level ) ]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_8($sql, $array_id, $name) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$array_id[0]]][$row[$array_id[1]]][$row[$array_id[2]]] = $row[$name];
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

  /**
   * [select_9 ดึงข้อมูลตามคำสั่ง sql (index 4 level ) ]
   * @param  [type] $sql [รับค่าคำสั่ง sql]
   * @return [type]      [ข้อมูลตามคำสั่ง sql]
   */
  public function select_9($sql, $array_id, $name) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$array_id[0]]][$row[$array_id[1]]][$row[$array_id[2]]][$row[$array_id[3]]] = $row[$name];
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

//public function select_all ทำการ select แบบ หลายแถว
  public function select_all($sql) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    try {
      $Tmp->execute();
      $row = $Tmp->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $row;
  }

//end public function select_all
//public function select_all_2 ทำการ select แบบ หลายแถว และใช้ key ชี้ข้อมูล
  public function select_all_2($sql) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    try {
      $Tmp->execute();
      $row = $Tmp->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $row;
  }

//end public function select_all
  //public function select_multi_key ทำการ select แบบ เอาข้อมูลทั้งหมด และใช้ keyหลายตัว ชี้ข้อมูล
  //************ ยังใช้ไม่ได้ *************
  public function select_multi_key($sql, $array_key) {
    //$this->save_to_log($sql);
    $Tmp = $this->conn->prepare($sql);
    if (!$Tmp) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }

    $record = [];
    try {
      $Tmp->execute();
      while ($row = $Tmp->fetch(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION)) {
        $record[$row[$id1]][$row[$id2]] = $row;
      }
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $record;
  }

//************ ยังใช้ไม่ได้ *************
//end public function select_multi_key
//public function get_page หาเลขหน้าที่มี
  public function get_page($offset, $sql) {
    //$this->save_to_log($sql);
    $result = $this->conn->query($sql);
    $row = $result->fetch(PDO::FETCH_NUM);
    $page = ($row[0] / $offset);
    return ceil($page);
  }

//end public function  get_page
//public function public function clear_conn เอาไว้ตัดการเชื่อมต่อฐานข้อมูล
  public function clear_conn() {
    $this->conn = NULL;
  }

//end public function clear_conn
//public function delete  ลบข้อมูลตามคำสั่ง sql
  public function delete($sql) {
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
  }

//end public function delete
  //public function any_query  ประมวลผลตามคำสั่ง sql ที่ส่งมา
  public function any_query($sql) {
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
      return false;
    }
  }

//end public function any_query
//private function delete_query  ลบข้อมูล
  private function delete_query($id, $id_name, $tb_name) {
    $sql = "DELETE FROM `$tb_name` WHERE $id_name = $id ";
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
  }

//end private function delete

  public function delete_by_id($id, $id_name, $tb_name) {
    $this->delete_query($id, $id_name, $tb_name);
  }

  //*** set_data เอาไว้รับค่าตัวแปรที่ post มาแล้วจัดเรียงเข้า array ของ table ที่เราต้องการ***
  private function set_data($sql_command) {
    $field = $this->field;
    $data = $this->data = array();
    foreach ($field as $key => $value) {
      if (($sql_command === "UPDATE") && (!isset($_POST[$value]))) {
        if ($value !== "log") {
          unset($field[$key]);
          unset($data[$key]);
        } else {
          $data[':' . $key] = $this->get_reclog($sql_command);
        }
      } else {
        switch ($value) {
          case 'log':
            $data[':' . $key] = $this->get_reclog($sql_command);
            break;

          default :
            if (isset($_POST[$value])) {
              if ($_POST[$value] !== "") {
                $data[':' . $key] = @$_POST[$value];
              } else {
                $data[':' . $key] = NULL;
              }
            } else {
              if ($sql_command !== "INSERT") {
                if ($_POST[$value] !== null) {
                  $data[':' . $key] = $_POST[$value];
                } else {
                  $data[':' . $key] = NULL;
                }
              } else {
                $data[':' . $key] = NULL;
              }
            }
        }//end switch
      }//end for
    }//end if
    $this->data = $data;
    $this->field = $field;
    return $data;
  }

//*** set_field เอาไว้ส่งค่าฟิลด์ของตารางที่ต้องการ ***
//*** เอาไว้สำหรับ class ที่มีแค่ตารางเดียว
  private function set_field() {
    $sql = "DESCRIBE " . $this->table_name;
    $q = $this->conn->prepare($sql);
    try {
      $q->execute();
      $this->field = $q->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
//    $this->check_array($this->field, "DESCRIBE table");
  }

//*** set_field_2 เอาไว้ส่งค่าฟิลด์ของตารางที่ต้องการ ***
//*** เอาไว้สำหรับ class ที่มีหลายตาราง
  private function set_field_2($table_name) {
    $sql = "DESCRIBE " . $table_name;
    $q = $this->conn->prepare($sql);
    if (!$q) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->errorInfo());
    }
    try {
      $q->execute();
      $field = $q->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
    return $field;
  }

  protected function create_sql($sql_command) {
    $field = $this->field;
    $field_text = "";
    $bindarray = '';
    switch ($sql_command) {
      case 'INSERT':
        foreach ($field as $key => $value) {
          if ($key != 0) {
            $field_text .= "`" . $value . "` ";
            $bindarray .= ":" . $key;
            if ($value != "log") {
              $field_text .= ",";
              $bindarray .= ",";
            }
          }
        }
        $sql = " INSERT INTO `" . $this->table_name . "` (" . $field_text . ") VALUES (" . $bindarray . ")";
        break;
      case 'UPDATE':
        foreach ($field as $key => $value) {
          if ($key != 0) {
            $field_text .= "`" . $value . "` =:" . $key . " ";
            if ($value != "log") {
              $field_text .= ",";
              $bindarray .= ",";
            }
          }
        }
        $sql = " UPDATE `" . $this->table_name . "` SET " . $field_text . "  WHERE `" . $field[0] . "`=:0 ";
        break;
    }
    return $sql;
  }

  public function basic_query($debug, $sql_command) {
//    $this->check_array($_POST, "post");
    $this->set_field();
    $data = $this->set_data($sql_command);

    $sql = $this->create_sql($sql_command);

//    $data2 = array();
    //$key[0] คือ Primary Key แบบ auto เลยกำหนดให้ข้ามไป
    if ($sql_command === 'INSERT') {
      unset($data[':0']);
    }

    if ($debug == 1) {
      $this->check_array($data, $sql);
    }

    try {
      //$this->save_to_log($sql);
      $stmt = $this->conn->prepare($sql);
      if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($this->errorInfo());
      }
      $stmt->execute($data);
      $return = true;
    } catch (PDOException $e) {
      if ($e->errorInfo[1] == 1062) {
        echo "<br><br><br><br><br><br><center><h1 style='color:red;'>****** ข้อมูลซ้ำไม่สามารถบันทึกได้ ******</h1></center><br><br><br><br><br><br>";
        $this->handle_sql_errors($sql, $e);
        $return = false;
      } else {
        $this->handle_sql_errors($sql, $e);
        $return = false;
      }
    }
    unset($data);
    return $return;
  }

  public function update_status($id, $status) {
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `" . $this->table_name . "` SET "
            . "`status`= :status, "
            . "`log`= :log "
            . " WHERE `id`= :id ";
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':log', $reclog);
    $stmt->bindParam(':id', $id);

    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
  }

  public function handle_sql_errors($query, $e) {
    echo '<pre><hr>';
    print_r($query);
    echo '</pre><hr><pre>';
    print_r($e);
    echo '<hr></pre>';
    die;
  }

  //$this->update_data("member_privilege", ["key" => "mem_id", "value" => $_POST['mem_id']], ["privilege" => $_POST["privilege"]], ["app_id" => $drug->app_id,]);
  //update_data(ชื่อตาราง, รหัสข้อมูล, $data, where )
  public function update_data($table_name, $id, $data, $where) {
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `" . $table_name . "` SET ";
    foreach ($data as $key1 => $value1) {
      $sql .= "`" . $key1 . "`= :" . $key1 . ", ";
    }
    $sql .= "`log`= :log ";
    $sql .= " WHERE  ";
    foreach ($where as $key2 => $value2) {
      $sql .= "`" . $key2 . "`= :" . $key2 . " AND ";
    }
    $sql .= "`" . $id["key"] . "`= :" . $id["key"] . " ";
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    foreach ($data as $key1 => $value1) {
      $stmt->bindParam(':' . $key1, $value1);
    }
    foreach ($where as $key2 => $value2) {
      $stmt->bindParam(':' . $key2, $value2);
    }
    $stmt->bindParam(':log', $reclog);
    $stmt->bindParam(':' . $id["key"], $id["value"]);
    try {
      $stmt->execute();
//      $stmt->debugDumpParams();
//      exit();
    } catch (PDOException $e) {
      $this->handle_sql_errors($stmt->debugDumpParams(), $e);
    }
  }

  //$this->update_data("member_privilege", ["key" => "mem_id", "value" => $_POST['mem_id']], ["privilege" => $_POST["privilege"]], ["app_id" => $drug->app_id,],"1");
  //update_data(ชื่อตาราง, รหัสข้อมูล, $data, where ,debug)
  public function update_data2($table_name, $id, $data, $where, $debug) {
    if ($debug === "1") {
      echo "<hr><pre>";
      var_dump($data);
      echo "</pre><hr>";
    }
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `" . $table_name . "` SET ";
    foreach ($data as $key1 => $value1) {
      $sql .= "`" . $key1 . "`= :" . $key1 . ", ";
    }
    $sql .= "`log`= :log ";
    if (!is_null($where)) {
      $sql .= " WHERE  ";
      foreach ($where as $key2 => $value2) {
        $sql .= "`" . $key2 . "`= :" . $key2 . " AND ";
      }
    }
    $sql .= "`" . $id["key"] . "`= :" . $id["key"] . " ;";

    if ($debug === "1") {
      echo "<pre><hr>" . $sql . "<hr>";
      $this->check_array($data, "data");
      var_dump($data);
      echo "<hr><hr></pre>";
    }

    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    foreach ($data as $key1 => $value1) {
      $this_key1 = ':' . $key1;
      $stmt->bindParam($this_key1, $value1);
    }
    foreach ($where as $key2 => $value2) {
      $this_key2 = ':' . $key2;
      $stmt->bindParam($this_key2, $value2);
    }
    $stmt->bindParam(':log', $reclog);
    $this_id = ':' . $id["key"];
    $stmt->bindParam($this_id, $id["value"]);
    try {
      $stmt->execute();
//      $stmt->debugDumpParams();
//      exit();
    } catch (PDOException $e) {
      $this->handle_sql_errors($stmt->debugDumpParams(), $e);
    }
  }

  public function insert_field($post) {
    $reclog = $this->get_reclog('INSERT');
    $sql = "INSERT INTO " . $this->table_name . " (";
    foreach ($post as $key => $value) {
      if ($value != null || $value != "") {
        $sql .= '`' . $key . "`, ";
      }
    }
    $sql .= " log ) VALUES (";
    foreach ($post as $key => $value) {
      if ($value != null || $value != "") {
        $sql .= '"' . $value . "\", ";
      }
    }
    $sql .= ":log )";
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':log', $reclog);
    //echo $sql;
    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
      return false;
    }
  }

  public function save_to_log($sql_command) {
    $reclog = $this->get_reclog('INSERT');
    $sql = "INSERT INTO `log`"
            . "(`sql_command`,`http_x_real_ip`, `user`, `request_uri`,`script_name`, `server`,`log`)"
            . " VALUES "
            . "(:sql_command, "
            . " '" . @$_SERVER["REMOTE_HOST"] . "', "
            . " '" . @$_SESSION[session_id()][$this->app_id]['pid'] . "', "
            . " '" . $_SERVER["REQUEST_URI"] . "', "
            . " '" . $_SERVER["SCRIPT_NAME"] . "', "
            . " '" . json_encode($_SERVER) . "', "
            . "'" . $reclog . "')";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':sql_command', $sql_command);
    try {
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
      return false;
    }
  }

  public function last_active($mem_id) {
    $reclog = $this->get_reclog('UPDATE');
    $sql = "UPDATE `user` SET "
            . "`last_active`= :last_active, "
            . "`log`= :log "
            . " WHERE `mem_id`= :mem_id ";
    //$this->save_to_log($sql);
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':last_active', date('Y-m-d H:i:s'));
    $stmt->bindParam(':log', $reclog);
    $stmt->bindParam(':mem_id', $mem_id);

    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $this->handle_sql_errors($sql, $e);
    }
  }

}

//end class db_conn
?>