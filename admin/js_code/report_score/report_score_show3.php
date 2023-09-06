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
error_reporting(error_reporting() & ~E_NOTICE);
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
<script>
    $(document).ready(function() {
        $('.select-search').select2();
    })
</script>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
$check_grade = filter_input(INPUT_POST, 'class_id');
$class_name = filter_input(INPUT_POST, 'class_name');

if ((is_null(filter_input(INPUT_POST, 'check_term')))) {
    $sql = "SELECT *
                    FROM `tb_term` 
                    WHERE `term_status` = '1' 
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` 
                    DESC , `term` DESC";
    $row = row_array($sql);
    $check_term = $row['year'];
    $term = $row["term"];
    $year = $row["year"];
    $check_term = $row["term_id"];
} else {
    $check_term = filter_input(INPUT_POST, 'class_name');
    $sql = "SELECT * 
                    FROM `tb_term` 
                    WHERE `year` = '{$check_term}' 
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
        $('#check_term').on('change', function() {
            var ct_key = $("#check_term").val();
            var cg_key = "<?php echo $check_grade; ?>";
            if ((ct_key != "")) {
                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/report_score/report_score_classroom3.php", {
                    ct_key: ct_key,
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
            var check_term = $("#check_term").val();
            var check_classroom = $("#classroom").val();
            var check_grade = "<?php echo $check_grade; ?>";
            var class_name = "<?php echo $class_name; ?>";
            if ((check_term != "" && check_classroom != "" && check_grade != "" && class_name != "")) {
                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/report_score/report_score_table3.php", {
                    check_term: check_term,
                    check_classroom: check_classroom,
                    check_grade: check_grade,
                    class_name: class_name
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

        <div class="col-<?php echo $grid; ?>-12">
            <h4>ผลคะแนนระดับชั้น<?php echo @$class_name; ?>&nbsp;
                <?php if ($year == "") {
                } else {
                    echo "ภาคเรียนที่ $term/$year";
                }
                ?>
            </h4>
        </div>

        <div class="col-<?php echo $grid; ?>-6">
            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-3">ภาคเรียน</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select-search" name="check_term" id="check_term" data-placeholder="เลือกภาคเรียน..." required="required">
                            <option></option>
                            <optgroup label="ภาคเรียน">
                                <?php
                                $sql = "SELECT * FROM tb_term WHERE grade_id = '$check_grade'  ORDER BY year DESC , term DESC";
                                $cc = result_array($sql);
                                ?>
                                <?php foreach ($cc as $_cc) { ?>
                                    <option value="<?php echo $_cc["term_id"]; ?>"><?php echo $_cc['term'] . "/" . $_cc['year']; ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-<?php echo $grid; ?>-6">

            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                    <div class="col-<?php echo $grid; ?>-9">
                        <select class="form-control select-search" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน..." required="required">
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