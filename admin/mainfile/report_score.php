<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>

<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/report_score.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=report_score" class="breadcrumb-item"> ผลคะแนน</a>

                        <a href="#" class="breadcrumb-item"> แบบรายงานผลคะแนน</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <h4>แบบรายงานผลคะแนน</h4>
                </div>
            </div>

            <?php
            $manage = "-";
            if (($manage == "score_data_show")) {
            } else { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div id="run_class_student">
                    <div class="row">
                        <?php
                        $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                        $class_Row = result_array($class_Sql);
                        $count_color = 0;
                        $bg_color = array("bg-primary", "bg-success", "bg-info");
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) { ?>

                                <div class="col-<?php echo $grid; ?>-4">
                                    <button type="button" id="button_class<?php echo $class_Print["grade_id"]; ?>" value="<?php echo $class_Print["grade_id"]; ?>" class="card card-body <?php echo $bg_color[$count_color]; ?> btn-block text-white has-bg-image btn-float m-0">
                                        <div class="media">
                                            <div class="mr-3 align-self-center">
                                                <i class="icon-graduation2 icon-3x opacity-75"></i>
                                            </div>

                                            <div class="media-body text-right">
                                                <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?>&nbsp;</h3>
                                                <span class="text-uppercase font-size-xs"><?php echo $class_Print["grade_name_eng"]; ?>&nbsp;</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#button_class<?php echo @$class_Print["grade_id"]; ?>').on('click', function() {
                                            var cp_class = $("#button_class<?php echo @$class_Print["grade_id"]; ?>").val();
                                            var cp_grade_name = "<?php echo @$class_Print["grade_name"]; ?>";
                                            var manage = "read";
                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/report_score/report_score_show<?php echo $class_Print["grade_id"]; ?>.php", {
                                                class_id: cp_class,
                                                class_name: cp_grade_name
                                            }, function(class_student) {
                                                $("#run_class_student").html(class_student);
                                            })

                                        })
                                    })
                                </script>

                        <?php   } else {
                            }
                            $count_color = $count_color + 1;
                        } ?>

                    </div>
                </div>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } ?>




        </div>


<?php   } else {
    }
}
?>