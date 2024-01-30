<?php

class conn_main_class {

//ประกาศตัวแปรที่ต้องใช้ใน class
  public $server_type = "mysql";
  public $servername = "61.91.5.142";
  public $username = "icad";
  public $password = "ic@d0317";
  //
//  public $servername = "localhost";
//  public $username = "root";
//  public $password = "";
  //
  public $dbname = "vote66";
  public $app_id = "03170008";
  public $app_name = 'Vote 66';
  public $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_PERSISTENT => true);

//  public $app_theme = "../../vendor/w3css/w3-theme-lupis-blue.css";
}
