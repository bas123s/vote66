<?php
$project_type = [
        //ประเภทโครงการ
        "1" => "โครงการTop-Down",
        "2" => "โครงการBottom-Up",
        "3" => "โครงการเร่งด่วน",
        "4" => "โครงการระยะยาว",
        "5" => "อื่นๆ"
];

//$sql_1 = "SELECT *
//	-- sum( project_type_1 ) AS project_type_1,
//	-- sum( project_type_2 ) AS project_type_2,
//	-- sum( project_type_3 ) AS project_type_3,
//	-- sum( project_type_4 ) AS project_type_4,
//	-- sum( project_type_5 ) AS project_type_5
//FROM
//          `unit`";
//$data_all = $mc->select_1($sql_1);
?>


<div id="chart"></div>

<!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->
<script src="js/apexcharts.js"></script>
<script>
        var options = {
                series: [

                        <?php foreach ($series as $key => $value) { ?>


                                <?= $value["data"] ?>
                                ,
                        <?php } ?>

                ],
                chart: {
                        type: 'pie',
                },
                labels: [<?php foreach ($series as $key => $value) { ?>


                        ['<?= $value["name"] ?>']
                                ,
                        <?php } ?>],

                colors: [
                        <?php foreach ($series as $key => $value) { ?>
                                                    '<?= $value["color"] ?>',
                        <?php } ?>
                        //          '#1F4498', '#ED1D24', '#F0741D', '#ffc107', '#17a2b8', '#1F4498', '#ED1D24', '#F0741D', '#ffc107', '#17a2b8'

                ],



        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>