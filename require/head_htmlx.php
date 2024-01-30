<?php
$app_name = "ระบบรับแจ้งการควบคุมตัว ตามพระราชบัญญิติป้องกันและปราบปราม <br>การทรมานและการกระทำให้บุคคลสูญหาย พ.ศ. 2565";
// $app_name = "ระบบรับแจ้งการควบคุมตัว";
// $app_name = @$mc->app_name;
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= @$title ?></title>
    <!--<link rel="apple-touch-icon" href="../../template/app-assets/images/ico/apple-icon-120.png">-->
    <!--<link rel="shortcut icon" type="image/x-icon" href="../../template/app-assets/images/ico/favicon.ico">-->
    <link rel="shortcut icon" type="image/x-icon" href="../../require/images/logo_mini.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../template/app-assets/images/ico/favicon.ico">
    <!--<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">-->
    <!-- <link rel="stylesheet" type="text/css" href="../../require/google_font.css" > -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/vendors.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/charts/apexcharts.css"> -->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/pages/dashboard-ecommerce.css">
    <!-- <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/plugins/charts/chart-apex.css"> -->
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../template/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/core/menu/menu-types/vertical-menu.css" >
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../template/app-assets/css/plugins/forms/form-wizard.css">


    <!-- END: Custom CSS-->


    <!-- Font Awesome Solid + Brands -->
    <link href="../../vendor/components/font-awesome/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome Solid + Brands -->

    <link rel="stylesheet" type="text/css" href="../../require/google_font.css" >
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <?php require '../../require/main_menux.php'; ?>