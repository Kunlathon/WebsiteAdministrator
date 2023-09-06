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
include("../../config/connect.ini.php");
include("../../config/fnc.php");

include("../../structure/link.php");
$RunLink = new link_system(); ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<script type="text/javascript">
    function setScreenHWCookie() {
        $.cookie('sw', screen.width);
        //$.cookie('sh',screen.height);
        return true;
    }
    setScreenHWCookie();
</script>

<?php
$width_system = filter_input(INPUT_COOKIE, 'sw');
if (($width_system >= 1200)) {
    $grid = "xl";
} elseif (($width_system >= 992)) {
    $grid = "lg";
} elseif (($width_system <= 768)) {
    $grid = "md";
} elseif (($width_system <= 576)) {
    $grid = "sm";
} else {
    $grid = "xs";
}
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
$check_grade = filter_input(INPUT_POST, 'class_id');
$class_gn = filter_input(INPUT_POST, 'class_gn');

if ((is_null(filter_input(INPUT_POST, 'check_year')))) {
    $sql = "SELECT *
                    FROM `tb_term` 
                    WHERE `term_status` = '1' 
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` 
                    DESC , `term` DESC";
    $row = row_array($sql);
    $check_year = $row['year'];
    $term = $row["term"];
    $year = $row["year"];
    $check_term = $row["term_id"];
} else {
    $check_year = filter_input(INPUT_POST, 'class_gn');
    $sql = "SELECT * 
                    FROM `tb_term` 
                    WHERE `year` = '{$check_year}' 
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` 
                    DESC , `term` DESC";
    $row = row_array($sql);
    $term = $row["term"];
    $year = $row["year"];
    $check_term = $row["term_id"];
} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function() {
        $('#check_year').on('change', function() {
            var cy_key = $("#check_year").val();
            var cg_key = "<?php echo $check_grade; ?>";
            if ((cy_key != "")) {
                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/report_score/report_score_classroom.php", {
                    cy_key: cy_key,
                    cg_key: cg_key
                }, function(run_ct) {
                    if (run_ct != "") {
                        $("#classroom").html(run_ct)
                    } else {}
                })
            } else {}


        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#classroom').on('change', function() {
            var check_year = $("#check_year").val();
            var check_classroom = $("#classroom").val();
            var check_grade = "<?php echo $check_grade; ?>";
            var class_gn = "<?php echo $class_gn; ?>";
            if ((check_year != "" && check_classroom != "" && check_grade != "" && class_gn != "")) {
                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/report_score/report_score_table.php", {
                    check_year: check_year,
                    check_classroom: check_classroom,
                    check_grade: check_grade,
                    class_gn: class_gn
                }, function(run_data_classroom) {
                    if (run_data_classroom != "") {
                        $("#run_data_classroom").html(run_data_classroom)
                    } else {}
                })
            } else {


            }
        })
    })
</script>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php if ((is_numeric($check_grade))) { ?>

    <div class="row">

        <div class="col-<?php echo $grid; ?>-4">
            <h4>ผลคะแนนระดับชั้น <?php echo @$class_gn; ?></h4>
        </div>

        <div class="col-<?php echo $grid; ?>-4">
            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-3">ปีการศึกษา</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select" name="check_year" id="check_year" data-placeholder="เลือกปีการศึกษา..." required="required">
                            <option></option>
                            <optgroup label="ปีการศึกษา">
                                <?php
                                $sql = "SELECT * FROM tb_term WHERE grade_id = '$check_grade' GROUP BY year DESC ORDER BY year DESC , term DESC";
                                $cc = result_array($sql);
                                ?>
                                <?php foreach ($cc as $_cc) { ?>
                                    <option value="<?php echo $_cc['year']; ?>"><?php echo $_cc['year']; ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-<?php echo $grid; ?>-4">

            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน..." required="required">
                            <option></option>
                            <optgroup label="เลือกห้องเรียน">
                                <option value="">ไม่พบข้อมูลห้องเรียน</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </fieldset>

        </div>

    </div>


    <div id="run_data_classroom"></div>


<?php   } else {
}
?>