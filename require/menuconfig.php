<?php

$menu_privilege = [
    "manage_user" => ["2", "3", "6", "8", "9"],
];
?>



<?php

//      เพิ่มเมนูที่นี่
$menubar = [
    [
        "label" => '<i class="fas fa-users"></i> บันทึกข้อมูล',
        "link" => "../../app/form/index.php",
        "css" => " w3-bar-item w3-button w3-small",
        "dropdown" => "0",
        "style" => " ",
        "menu_privilege" => [1],
    ],
    [
        "label" => '<i class="fas fa-users"></i> รายละเอียด',
        "link" => "../../app/form/form_detail.php",
        "css" => " w3-bar-item w3-button w3-small",
        "dropdown" => "0",
        "style" => " ",
        "menu_privilege" => [1],
    ],
    [
        "label" => '<i class="fas fa-users"></i> เพิ่มผู้เข้าใช้ระบบ',
        "link" => "../../core/user/register.php",
        "css" => " w3-bar-item w3-button w3-small",
        "dropdown" => "0",
        "style" => " ",
        "menu_privilege" => [2, 3, 6, 8, 9],
    ],
    [
        "label" => '<i class="fas fa-users"></i> จัดการผู้เข้าใช้ระบบ',
        "link" => "../../core/user/user_manage.php",
        "css" => " w3-bar-item w3-button w3-small",
        "dropdown" => "0",
        "style" => " ",
        "menu_privilege" => [2, 3, 6, 8, 9],
    ],
    [
        "label" => '<i class="far fa-copy"></i> รายงาน',
        "css" => " w3-dropdown-content w3-bar-block w3-card-4 ",
        "style" => " ",
        "dropdown" => "1",
        "menu_privilege" => [1, 2, 3, 4, 5, 6, 7, 8, 9],
        "data" => [
            [
                "label" => ' <i class="far fa-copy"></i> ระดับตำบล',
                "link" => "../../app/report/report_tambol.php",
                "css" => " w3-bar-item w3-button w3-large ",
                "style" => " ",
                "menu_privilege" => [1, 2, 3, 4, 5, 6, 7, 8, 9],
            ],
            [
                "label" => ' <i class="far fa-copy"></i> ระดับอำเภอ',
                "link" => "../../app/report/report_district.php",
                "css" => " w3-bar-item w3-button w3-large ",
                "style" => " ",
                "menu_privilege" => [1, 3, 9],
            ],
            [
                "label" => ' <i class="far fa-copy"></i> ระดับจังหวัด',
                "link" => "../../app/report/report_province.php",
                "css" => " w3-bar-item w3-button w3-large ",
                "style" => " ",
                "menu_privilege" => [4, 5, 6, 9],
            ],
        ],
    ],
];
//if ($user["privilege"] === "1") {
//  $menubar[] = ["label" => "การบันทึกผลรอบที่ 1/2563", "link" => "../main/menu_report.php?times=1&year=2563", "css" => " ", "style" => " ","dropdown"=>"0"];
//}
if (($user["acode"] === "0317") || (in_array($user["privilege"], $menu_privilege["manage_user"]))) {
  $sql = "SELECT "
          . "COUNT(`mem_status`) as num_mem "
          . "FROM `user` "
          . "WHERE (`app_id` = '" . $mc->app_id . "') "
          . "AND (`mem_status`=1) ";
  if ($user["privilege"] === "6") {
    $sql .= " and (`pcode`='" . $user["pcode"] . "') ";
  }
  $num_mem = $mc->select_1($sql);
  if (isset($num_mem["num_mem"]) && ($num_mem["num_mem"] !== "0")) {
    $tag = "<span class='w3-badge w3-red'>" . $num_mem["num_mem"] . "</span>";
  } else {
    $tag = "";
  }


  $menubar[] = [
      "label" => '<i class="fas fa-tools"></i> เครื่องมือผู้ดูแลระบบ',
      "css" => " w3-dropdown-content w3-bar-block w3-card-4 ",
      "style" => " ",
      "dropdown" => "1",
      "menu_privilege" => [6, 8, 9],
      "data" => [
          [
              "label" => '<i class="fas fa-book"></i> จัดการหนังสือสั่งการ',
              "link" => "../../core/doc/index.php",
              "css" => " w3-bar-item w3-button w3-small",
              "style" => " ",
              "menu_privilege" => [8, 9],
          ],
          [
              "label" => '<i class="fas fa-users"></i> จัดการผู้เข้าใช้ระบบ',
              "link" => "../../core/user/user_manage.php",
              "css" => " w3-bar-item w3-button w3-small",
              "style" => " ",
              "menu_privilege" => [6, 8, 9],
          ],
          [
              "label" => '<i class="fas fa-th-list"></i> ตรวจสอบ log ทั้งหมด',
              "link" => "../../core/log/index.php",
              "css" => " w3-bar-item w3-button w3-small",
              "style" => " ",
              "menu_privilege" => [8, 9],
          ],
      ],
  ];
}

//        ******  แก้ css เมนูที่นี่   ******
$menu_bar = [
    "css" => " w3-theme-d3 ",
    "style" => " ",
    "dropdown" => "0"
];

$footer_bar = [
    "css" => " w3-theme-d3 ",
    "style" => " ",
    "dropdown" => "0"
];

$appname_panel = [
    "css" => "  w3-theme ", // w3-hide-small
    "style" => " ",
    "dropdown" => "0"
];
?>