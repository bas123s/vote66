<?php
require '../../require/head_html.php';

//    require '../../../require/head_php.php';
?>

<main class="flex-shrink-0 bg-light">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php"><span class="fw-bolder text-gradient ">VOTE 66</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadSection('map')">หน้าหลัก</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadSection('result')">ผลการเลือกตั้ง</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadSection('score')">คะแนน</a></li>

                </ul> -->
            </div>
        </div>
    </nav>
    
    <!-- Header-->
    <!-- <div id="section-content"></div> -->
    <!-- About Section-->

    <?php require 'map.php';
    require 'result.php';
    require 'score.php';
     ?>
           
            

</main>

<?php require '../../require/footer_html.php' ?>