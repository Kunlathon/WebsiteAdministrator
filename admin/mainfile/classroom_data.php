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
if ((preg_match("/classroom_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>

        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=classroom_data" class="breadcrumb-item"> จัดการหลักสูตร</a>

                        <a href="#" class="breadcrumb-item"> หลักสูตร</a>


                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            if ((filter_input(INPUT_POST, 'list') != null and filter_input(INPUT_POST, 'list') != "")) {
                $list = filter_input(INPUT_POST, 'list');
            } else {
                $list = filter_input(INPUT_GET, 'list');
            }
            // $list = filter_input(INPUT_POST, 'list');

            if ($list == "1" || $list == "2" || $list == "3" || $list == "form_add" || $list == "form_update") {

                if ($list == "1" || $list == "2" || $list == "3") {
                    $grade_key = $list;
                } else {

                    if ((filter_input(INPUT_POST, 'gid') != null and filter_input(INPUT_POST, 'gid') != "")) {
                        $gid = filter_input(INPUT_POST, 'gid');
                    } else {
                        $gid = filter_input(INPUT_GET, 'gid');
                    }
                    $grade_key = $gid;
                }

                // if ((filter_input(INPUT_POST, 'grade_key') != null and filter_input(INPUT_POST, 'grade_key') != "")) {
                //     $grade_key = filter_input(INPUT_POST, 'grade_key');
                // } else {
                //     $grade_key = filter_input(INPUT_GET, 'grade_key');
                // }

                if ((filter_input(INPUT_POST, 'term_key') != null and filter_input(INPUT_POST, 'term_key') != "")) {
                    $term_key = filter_input(INPUT_POST, 'term_key');
                } else {
                    $term_key = filter_input(INPUT_GET, 'term_key');
                }

                // $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                // $grade_key = filter_input(INPUT_POST, 'grade_key');
                // $term_key = filter_input(INPUT_GET, 'term_key');

                if (isset($grade_key)) {
                    $grade_key = $grade_key;
                    $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$grade_key}'";
                    $row = row_array($sql);
                    $grade = "ระดับชั้น$row[grade_name]";
                } else if (!isset($grade_key)) {
                    $grade = "";
                }

                if (isset($term_key)) {
                    //$term_key = $term_key;
                    $sql = "SELECT * FROM `tb_term` WHERE `term_id` = '{$term_key}' AND `grade_id` = '{$grade_key}' ORDER BY `year` DESC , `term` DESC";
                    $row = row_array($sql);
                    $term = $row["term"]."/".$row["year"];
                    $year = "$row[year]";
                } else if (!isset($term_key)) {
                    $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                    $row = row_array($sql);
                    $term_key = $row['term_id'];
                    $term = "$row[term]/$row[year]";
                    $year = "$row[year]";
                }

            ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ข้อมูลห้องเรียน ภาคเรียน <?php echo $term; ?> <?php echo $grade; ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-6">
                        <div class="btn-group">
                            <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                            <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                            <button type="button" name="course_data" id="course_data" class="btn btn-success btn-sm" value="">จัดหลักสูตร</button>&nbsp;&nbsp;
                            <button type="button" name="classroom_data" id="classroom_data" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>
                        </div>
                    </div>


                    <div class="col-<?php echo $grid; ?>-6">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-<?php echo $grid; ?>-4">ภาคเรียน </label>
                                <div class="col-<?php echo $grid; ?>-8">
                                    <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                    <input type="hidden" name="list" id="list" value="<?php echo $list; ?>">
                                    <input type="hidden" name="manage" id="manage" value="classroom_show">


                                    <select class="form-control select" name="term_key" id="term_key" data-placeholder="เลือกภาคเรียน..." required="required">
                                        <option></option>
                                        <optgroup label="เลือกภาคเรียน">

                                            <?php
                                            $CT_sql = "SELECT * FROM tb_term WHERE grade_id = '$grade_key' ORDER BY year DESC , term DESC";
                                            $CT_list = result_array($CT_sql);
                                            foreach ($CT_list as $key => $CT_row) { ?>
                                                <?php
                                                if (($term_key == $CT_row["term_id"])) { ?>
                                                    <option value="<?php echo $CT_row["term_id"]; ?>" selected="selected"><?php echo $CT_row['term']; ?>/<?php echo $CT_row['year']; ?></option>
                                                <?php    } else { ?>
                                                    <option value="<?php echo $CT_row["term_id"]; ?>"><?php echo $CT_row['term']; ?>/<?php echo $CT_row['year']; ?></option>
                                                <?php    } ?>


                                            <?php   } ?>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>
            <?php
            } elseif ($list == "show") {
            } else {
            ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>จัดหลักสูตร</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-6">
                        <div class="btn-group">
                            <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                            <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                            <button type="button" name="course_data" id="course_data" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                            <button type="button" name="classroom_data" id="classroom_data" class="btn btn-success btn-sm" value="">จัดหลักสูตร</button>
                        </div>
                    </div>
                    <div class="col-<?php echo $grid; ?>-6">
                        <fieldset class="mb-3">
                            <div class="form-group row">
                                <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น</label>
                                <div class="col-<?php echo $grid; ?>-9">
                                    <select class="form-control select" name="classSD" id="classSD" data-placeholder="ระดับชั้น..." required="required">
                                        <option></option>
                                        <optgroup label="ระดับชั้น">

                                            <?php
                                            $listSD = filter_input(INPUT_GET, 'list');
                                            $classSD_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` FROM `tb_grade` ORDER BY `grade_id` ASC";
                                            $classSD_Row = result_array($classSD_Sql);
                                            foreach ($classSD_Row as $key => $classSD_Print) {
                                                if ((is_array($classSD_Print) && count($classSD_Print))) { ?>
                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                    <?php
                                                    if (($listSD == $classSD_Print["grade_id"])) { ?>
                                                        <option value="<?php echo $classSD_Print["grade_id"]; ?>" selected="selected"><?php echo $classSD_Print["grade_name"]; ?></option>
                                                    <?php   } else { ?>
                                                        <option value="<?php echo $classSD_Print["grade_id"]; ?>"><?php echo $classSD_Print["grade_name"]; ?></option>
                                                    <?php   } ?>

                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <?php       } else {
                                                }
                                            } ?>


                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div><br>

            <?php
            }
            ?>

            <?php
            //@$list=base64_decode(filter_input(INPUT_GET,'list'));
            $list = filter_input(INPUT_GET, 'list');
            if ((is_numeric($list))) {
                $grade_key = $list;
                $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                $class_Row = result_array($class_Sql);
                foreach ($class_Row as $key => $class_Print) {
                    if ((is_array($class_Print) && count($class_Print))) {
                        $txt_grade_name = $class_Print["grade_name"];
                        $txt_grade_name_eng = $class_Print["grade_name_eng"];
                    } else {
                        $txt_grade_name = "-";
                        $txt_grade_name_eng = "-";
                    }
                }

            ?>
                <!------------------------------------------------------------------------------->
                <?php
                $manage = filter_input(INPUT_GET, 'manage');
                if (($manage == "create")) {
                } else { ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลจัดหลักสูตร ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มห้องเรียน</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <!--<form name="classroom_data">-->

                                                <table class="table table-bordered datatable-button-html5-columns-STD">
                                                    <thead>
                                                        <tr align="center">
                                                            <th style="width: 4%;">
                                                                <div>ลำดับ</div>
                                                            </th>
                                                            <th>
                                                                <div>ห้องเรียน</div>
                                                            </th>

                                                            <th>
                                                                <div>นิสิต</div>
                                                            </th>
                                                            <th>
                                                                <div>ครูประจำชั้น(Eng)</div>
                                                            </th>
                                                            <th>
                                                                <div>ครูประจำชั้น(Tha)</div>
                                                            </th>
                                                            <th>
                                                                <div>ฝ่ายวิชาการ</div>
                                                            </th>
                                                            <th>
                                                                <div>หลักสูตร</div>
                                                            </th>

                                                            <?php
                                                            if ($grade_key == '1') {
                                                                if ((check_session("admin_username_lcm")) == "snaper" || (check_session("admin_username_lcm") == "krusoh")) {
                                                            ?>

                                                                    <th>
                                                                        <div>สำเนา</div>
                                                                    </th>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <th style="width: 16%;">
                                                                <div>จัดการ</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $sql = "SELECT * FROM tb_classroom_teacher WHERE term_id = '{$term_key}' AND grade_id = '{$grade_key}' AND classroom_status ='1' ORDER BY classroom_name ASC";
                                                    $list = result_array($sql);
                                                    ?>
                                                    <tbody>
                                                        <?php foreach ($list as $key => $row) {


                                                            $sql1 = "SELECT * FROM `tb_classroom_detail` a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$row['classroom_t_id']}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') AND b.student_status='1' ORDER BY b.student_no ASC";
                                                            $cc1 = result_array($sql1);

                                                            $tid1 = $row['teacher_id1'];
                                                            $sqlT1 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid1}'";
                                                            $rowT1 = row_array($sqlT1);

                                                            $tid2 = $row['teacher_id2'];
                                                            $sqlT2 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid2}'";
                                                            $rowT2 = row_array($sqlT2);

                                                            $tid3 = $row['teacher_id3'];
                                                            $sqlT3 = "SELECT * FROM `tb_teacher` WHERE `teacher_id` = '{$tid3}'";
                                                            $rowT3 = row_array($sqlT3);


                                                            $key = $key + 1;
                                                        ?>

                                                            <tr>
                                                                <td style="width: 4%;" align="center">
                                                                    <div><?php echo $key; ?></div>
                                                                </td>

                                                                <?php if ($row['classroom_class'] != "") {; ?>
                                                                    <td align="left">
                                                                        <div><?php echo $row['classroom_name']; ?>&nbsp;ชั้น&nbsp;<?php echo $row['classroom_class']; ?></div>
                                                                    </td>

                                                                <?php } else if ($row['classroom_class'] == "") {; ?>
                                                                    <td align="left">
                                                                        <div><?php echo $row['classroom_name']; ?></div>
                                                                    </td>
                                                                <?php } ?>

                                                                <td align="center">
                                                                    <div><span class="badge badge-flat badge-pill border-primary text-primary"><?php echo count($cc1);?></span></div>
                                                                </td>

                                                                <td align="left">
                                                                    <div>
                                                                        <?php echo $rowT1['teacher_name']; ?>&nbsp;<?php echo $rowT1['teacher_surname']; ?><br>

                                                                        <?php
                                                                        if ($row['position_id1'] == '1') {
                                                                            echo "English Homeroom Teacher";
                                                                        } else if ($row['position_id1'] == '2') {
                                                                            echo "Academic Affairs";
                                                                        }

                                                                        ?>
                                                                    </div>
                                                                </td>

                                                                <td align="left">
                                                                    <div><?php echo $rowT2['teacher_name']; ?>&nbsp;<?php echo $rowT2['teacher_surname']; ?></div>
                                                                </td>

                                                                <td align="left">
                                                                    <div><?php echo $rowT3['teacher_name']; ?>&nbsp;<?php echo $rowT3['teacher_surname']; ?></div>
                                                                </td>

                                                                <td align="center">

                                                                    <div class="btn-group">

                                                                        <button type="button" name="show_level_<?php echo $row['classroom_t_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=<?php echo base64_encode($row['classroom_t_id']); ?>';" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="รายละเอียดหลักสูตร" data-placement="bottom" value=""><i class="icon-cog"></i></button>

                                                                    </div>

                                                                </td>

                                                                <?php
                                                                if ($grade_key == '1') {

                                                                    if ((check_session("admin_username_lcm")) == "snaper" || (check_session("admin_username_lcm") == "krusoh")) {
                                                                ?>

                                                                        <td align="center">
                                                                            <div><a href="ajax/get_copycourse_data.php?id=<?php echo $row['classroom_t_id']; ?>&term_key=<?php echo $row['term_id']; ?>&grade_key=<?php echo $grade_key; ?>" data-toggle="modal" data-id="<?php echo $row['classroom_t_id']; ?>" data-target="#CopyCoursedata" class="btn btn-sm yellow-gold">
                                                                                    <i class="fa fa-copy"></i> สำเนา</a></div>
                                                                        </td>
                                                                <?php
                                                                    }else{}
                                                                }
                                                                ?>


                                                                <td style="width: 16%;" align="center">
                                                                    <div align="center">

                                                                        <button type="button" name="show_<?php echo $row['classroom_t_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=<?php echo base64_encode($row['classroom_t_id']); ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายชื่อนิสิต" data-placement="bottom" value=""><i class="icon-search4"></i></button>

                                                                        <button type="button" name="update_<?php echo $row['classroom_t_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_update&id=<?php echo base64_encode($row['classroom_t_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                                                        <?php
                                                                        if (check_session("admin_status_lcm") == '1') {
                                                                        ?>
                                                                            <button type="button" name="delete_<?php echo $row['classroom_t_id']; ?>" data-toggle="modal" data-target="#modal_theme_success_Delete<?php echo $row['classroom_t_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- /dangermodal -->
                                                            <div id="modal_theme_success_Delete<?php echo $row['classroom_t_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white">
                                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="classroom-data-delete" id="classroom-data-delete" method="post" accept-charset="utf-8">
                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                ต้องการลบข้อมูลจัดหลักสูตร <?php echo $row['classroom_name']; ?> หรือไม่
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row" style="text-align: center;">
                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                <button type="button" id="delete_<?php echo $row['classroom_t_id']; ?>" name="delete_<?php echo $row['classroom_t_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['classroom_t_id']; ?>">ใช่</button>
                                                                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete-->
                                                                                        <script>
                                                                                            var SA_DeleteClassroomData<?php echo $row['classroom_t_id']; ?> = function() {
                                                                                                var _componentSA_DeleteClassroomData = function() {
                                                                                                    if (typeof swal == 'undefined') {
                                                                                                        console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                        return;
                                                                                                    }
                                                                                                    // Defaults
                                                                                                    var swalInitDeleteClassroomData = swal.mixin({
                                                                                                        buttonsStyling: false,
                                                                                                        customClass: {
                                                                                                            confirmButton: 'btn btn-primary',
                                                                                                            cancelButton: 'btn btn-light',
                                                                                                            denyButton: 'btn btn-light',
                                                                                                            input: 'form-control'
                                                                                                        }
                                                                                                    });
                                                                                                    // Defaults End

                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                    $('#delete_<?php echo $row['classroom_t_id']; ?>').on('click', function() {

                                                                                                        //var course_name="<?php echo $row['course_name']; ?>";
                                                                                                        var action = "delete";
                                                                                                        var grade_key = "<?php echo $grade_key; ?>";
                                                                                                        var classroom_t_key = $("#delete_<?php echo $row['classroom_t_id']; ?>").val();
                                                                                                        var id_key = btoa(classroom_t_key);

                                                                                                        var table = "tb_classroom_teacher";
                                                                                                        var ff = "classroom_t_id";

                                                                                                        if (action == "") {
                                                                                                            swalInitDeleteClassroomData.fire({
                                                                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                icon: 'error'
                                                                                                            });
                                                                                                        } else {

                                                                                                            if (classroom_t_key != "") {

                                                                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                                                                    action: action,
                                                                                                                    grade_key: grade_key,
                                                                                                                    classroom_t_key: classroom_t_key,
                                                                                                                    table: table,
                                                                                                                    ff: ff
                                                                                                                }, function(process_add) {
                                                                                                                    var process_add = process_add;
                                                                                                                    if (process_add.trim() === "no_error") {

                                                                                                                        let timerInterval;
                                                                                                                        swalInitDeleteClassroomData.fire({
                                                                                                                            title: 'ลบสำเร็จ',
                                                                                                                            //html: 'I will close in <b></b> milliseconds.',
                                                                                                                            timer: 1200,
                                                                                                                            icon: 'success',
                                                                                                                            timerProgressBar: true,
                                                                                                                            didOpen: function() {
                                                                                                                                Swal.showLoading()
                                                                                                                                timerInterval = setInterval(function() {
                                                                                                                                    const content = Swal.getContent();
                                                                                                                                    if (content) {
                                                                                                                                        const b_classroom_data = content.querySelector('b_classroom_data')
                                                                                                                                        if (b_classroom_data) {
                                                                                                                                            b_classroom_data.textContent = Swal.getTimerLeft();
                                                                                                                                        } else {}
                                                                                                                                    } else {}
                                                                                                                                }, 100);
                                                                                                                            },
                                                                                                                            willClose: function() {
                                                                                                                                clearInterval(timerInterval)
                                                                                                                            }
                                                                                                                        }).then(function(result) {
                                                                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=" + grade_key;
                                                                                                                            } else {}
                                                                                                                        });

                                                                                                                    } else if (process_add.trim() === "it_error") {
                                                                                                                        swalInitDeleteClassroomData.fire({
                                                                                                                            title: 'ข้อมูลซ้ำ',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    } else {
                                                                                                                        swalInitDeleteClassroomData.fire({
                                                                                                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                                                                            icon: 'error'
                                                                                                                        });
                                                                                                                    }
                                                                                                                })
                                                                                                            } else {}
                                                                                                        }
                                                                                                    });

                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                };
                                                                                                //--------------------------------------------------------------------------------------
                                                                                                return {
                                                                                                    initComponentsDeleteClassroomData: function() {
                                                                                                        _componentSA_DeleteClassroomData();
                                                                                                    }
                                                                                                }
                                                                                            }();
                                                                                            // Initialize module
                                                                                            // ------------------------------
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                SA_DeleteClassroomData<?php echo $row['classroom_t_id']; ?>.initComponentsDeleteClassroomData();
                                                                                            });
                                                                                        </script>
                                                                                        <!--Delete end-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <!--Delete End-->
                                                                                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    </div>
                                                                                </div>


                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /danger modal -->

                                                        <?php } ?>
                                                    </tbody>

                                                </table>

                                            <!--</form>-->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                <?php    } ?>
                <!------------------------------------------------------------------------------->
            <?php    } elseif (($list == "show")) { ?>

                <?php
                $classroom_t_key = base64_decode(filter_input(INPUT_GET, 'id'));
                if (($classroom_t_key != null)) {

                    $sqlCT = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom_t_key}'";
                    $rowCT = row_array($sqlCT);
                    // echo $sqlCT;

                    $grade_key = $rowCT['grade_id'];
                    $term_key = $rowCT['term_id'];
                    $classid = $rowCT['classroom_t_id'];
                    $cid = $rowCT['classroom_id'];
                    $class = $rowCT['classroom_name'];

                    if (isset($grade_key)) {
                        //$grade_key = $grade_key;
                        $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$grade_key}'";
                        $row = row_array($sql);
                        $grade = "ระดับชั้น$row[grade_name]";
                    } else if (!isset($grade_key)) {
                        $grade = "";
                    }

                    if (isset($term_key)) {
                        //$term_key = $term_key;
                        $sql = "SELECT * FROM tb_term WHERE term_id = '{$term_key}' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term = "$row[term]/$row[year]";
                        $year = "$row[year]";
                    } else if (!isset($term_key)) {
                        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term_key = $row['term_id'];
                        $term = "$row[term]/$row[year]";
                        $year = "$row[year]";
                    }

                ?>


                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-9">
                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <h4>บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year; ?> ภาคเรียน <?php echo $term; ?></h4>
                            </div>

                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <h4><?php echo $grade; ?> / <?php echo $rowCT['classroom_name']; ?></h4>
                            </div>

                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <?php
                                $tid1 = $rowCT['teacher_id1'];
                                $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
                                $rowT1 = row_array($sqlT1);
                                ?>
                                <h4>ครูประจำชั้น(Eng) <?php echo $rowT1['teacher_name']; ?>&nbsp;<?php echo $rowT1['teacher_surname']; ?></h4>
                                <?php if ($rowCT['teacher_id2'] != "") { ?>
                                    <?php
                                    $tid2 = $rowCT['teacher_id2'];
                                    $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
                                    $rowT2 = row_array($sqlT2);
                                    ?>
                                    &nbsp;<h4>ครูประจำชั้น(Thai) <?php echo $rowT2['teacher_name']; ?>&nbsp;<?php echo $rowT2['teacher_surname']; ?></h4>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-<?php echo $grid; ?>-3">

                            <div class="btn-group">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <form name="form_show<?php echo $classroom_t_key; ?>" id="form_show<?php echo $classroom_t_key; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=<?php echo base64_encode($classroom_t_key); ?>" method="post">
                                            <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="รายการ" data-placement="bottom"><i class="icon-list-unordered"></i> รายการ</button>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form>
                                            <button type="button" name="modal_student_class_Add<?php echo $classroom_t_key; ?>" data-toggle="modal" data-target="#modal_student_class_Add<?php echo $classroom_t_key; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="จัดนิสิต" data-placement="bottom"><i class="icon-plus3"></i> จัดนิสิต</button>
                                            <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $classroom_t_key; ?>">
                                            <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                            <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
                                            <input type="hidden" name="cid" id="cid<?php echo $classroom_t_key; ?>" value="<?php echo $cid; ?>">

                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form>
                                            <button type="button" name="modal_student_class_Insert<?php echo $classroom_t_key; ?>" data-toggle="modal" data-target="#modal_student_class_Insert<?php echo $classroom_t_key; ?>" class="btn btn-outline-info btn-sm" data-popup="tooltip" title="นำเข้านิสิต" data-placement="bottom"><i class="icon-plus3"></i> นำเข้านิสิต</button>
                                            <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $classroom_t_key; ?>">
                                            <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                            <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
                                            <input type="hidden" name="cid" id="cid<?php echo $classroom_t_key; ?>" value="<?php echo $cid; ?>">

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Add Student Class modal -->

                        <div id="modal_student_class_Add<?php echo $classroom_t_key; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h6 class="modal-title">ฟอร์มข้อมูลจัดนิสิต</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="student-class-add" id="student-class-add" method="post" accept-charset="utf-8">

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">นิสิต</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="student" id="student" data-placeholder="เลือกนิสิต...">
                                                                    <option></option>
                                                                    <optgroup label="นิสิต">
                                                                        <?php
                                                                        $sql = "SELECT * FROM `tb_student` WHERE `grade_id` = '{$grade_key}' AND `student_status`='1' ORDER BY `student_name` ASC";
                                                                        $tt = result_array($sql);
                                                                        foreach ($tt as $_tt) { ?>
                                                                            <option value="<?php echo @$_tt['student_id'] ?>"><?php echo $_tt['student_id']; ?>&nbsp;-&nbsp;<?php echo @$_tt['student_name']; ?>&nbsp;<?php echo $_tt['student_surname']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">หมายเหตุ</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="add-note-null">
                                                                    <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                                                    <span>กรอกข้อมูลหมายเหตุ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        <button type="button" name="Add_student_class" id="Add_student_class<?php echo $classroom_t_key; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                        <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $classroom_t_key; ?>">
                                        <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                        <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
                                        <input type="hidden" name="cid" id="cid<?php echo $classroom_t_key; ?>" value="<?php echo $cid; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Add Student Class modal -->

                        <!-- Add Student Class -->
                        <script>
                            $(document).ready(function() {

                                // Defaults
                                var swalInitAddStudentClass = swal.mixin({
                                    buttonsStyling: false,
                                    customClass: {
                                        confirmButton: 'btn btn-primary',
                                        cancelButton: 'btn btn-light',
                                        denyButton: 'btn btn-light',
                                        input: 'form-control'
                                    }
                                });
                                // Defaults End

                                $('#Add_student_class<?php echo $classroom_t_key; ?>').on('click', function() {
                                    swalInitAddStudentClass.fire({
                                        title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                        //text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        confirmButtonText: 'ใช่',
                                        cancelButtonText: 'ไม่',
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success',
                                            cancelButton: 'btn btn-danger'
                                        }
                                    }).then(function(result) {
                                        if (result.value) {

                                            var action = "add_student_class";
                                            var classroom_t_key = $("#classroom_t_key<?php echo $classroom_t_key; ?>").val();
                                            var student = $("#student").val();
                                            var note = $("#note").val();
                                            var grade_key = $("#grade_key<?php echo $classroom_t_key; ?>").val();
                                            var term_key = $("#term_key<?php echo $classroom_t_key; ?>").val();
                                            var cid = $("#cid<?php echo $classroom_t_key; ?>").val();

                                            var id_key = btoa(classroom_t_key);

                                            if (action == "") {
                                                swalInitAddStudentClass.fire({
                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                    icon: 'error'
                                                });
                                            } else {


                                                if (student != "" && classroom_t_key != "" && grade_key != "" && term_key != "" && cid != "") {
                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                        action: action,
                                                        classroom_t_key: classroom_t_key,
                                                        student: student,
                                                        note: note,
                                                        grade_key: grade_key,
                                                        term_key: term_key,
                                                        cid: cid

                                                    }, function(process_edit) {

                                                        let timerInterval;
                                                        swalInitAddStudentClass.fire({
                                                            title: 'บันทึกสำเร็จ',
                                                            //html: 'I will close in <b></b> milliseconds.',
                                                            timer: 1200,
                                                            icon: 'success',
                                                            timerProgressBar: true,
                                                            didOpen: function() {
                                                                Swal.showLoading()
                                                                timerInterval = setInterval(function() {
                                                                    const content = Swal.getContent();
                                                                    if (content) {
                                                                        const b_course_no = content.querySelector('b_course_no')
                                                                        if (b_course_no) {
                                                                            b_course_no.textContent = Swal.getTimerLeft();
                                                                        } else {}
                                                                    } else {}
                                                                }, 100);
                                                            },
                                                            willClose: function() {
                                                                clearInterval(timerInterval)
                                                            }
                                                        }).then(function(result) {
                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=" + id_key;
                                                            } else {}
                                                        });


                                                    })
                                                } else {}
                                            }
                                        } else if (result.dismiss === swal.DismissReason.cancel) {

                                            //swalInitLogout.fire(
                                            //'Cancelled',
                                            //'Your imaginary file is safe :)',
                                            //'error'
                                            //);
                                        } else {
                                            //--------------------------------------------------------------------------------------					
                                        }
                                    });
                                });

                            })
                        </script>
                        <!-- Add Student Class End-->

                        <!-- Insert Student Class modal -->

                        <div id="modal_student_class_Insert<?php echo $classroom_t_key; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h6 class="modal-title">ฟอร์มนำเข้าข้อมูลนิสิตห้องเรียน <?php echo $classroom_name; ?></h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="student-class-Insert" id="student-class-Insert" method="post" accept-charset="utf-8">

                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกห้องเรียน...">
                                                                    <option></option>
                                                                    <optgroup label="ห้องเรียน">
                                                                        <?php
                                                                        $sql = "SELECT * FROM  tb_classroom_teacher WHERE grade_id = '{$grade_key}' AND term_id = '{$term_key}' ORDER BY classroom_name ASC";
                                                                        $tt = result_array($sql);
                                                                        foreach ($tt as $_tt) { ?>
                                                                            <option value="<?php echo @$_tt['classroom_t_id'] ?>"><?php echo $_tt['classroom_name']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        <button type="button" name="Insert_student_class" id="InsertStudentClass<?php echo $classroom_t_key; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                        <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $row['classroom_t_id']; ?>">
                                        <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                        <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Insert Student Class modal -->

                        <!-- Insert Student Class -->
                        <script>
                            $(document).ready(function() {

                                // Defaults
                                var swalInitInsertStudentClass = swal.mixin({
                                    buttonsStyling: false,
                                    customClass: {
                                        confirmButton: 'btn btn-primary',
                                        cancelButton: 'btn btn-light',
                                        denyButton: 'btn btn-light',
                                        input: 'form-control'
                                    }
                                });
                                // Defaults End

                                $('#Insert_student_class<?php echo $classroom_t_key; ?>').on('click', function() {
                                    swalInitInsertStudentClass.fire({
                                        title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                        //text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        confirmButtonText: 'ใช่',
                                        cancelButtonText: 'ไม่',
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success',
                                            cancelButton: 'btn btn-danger'
                                        }
                                    }).then(function(result) {
                                        if (result.value) {

                                            var action = "insert_student_class";
                                            var classroom_t_key = $("#classroom_t_key<?php echo $classroom_t_key; ?>").val();
                                            var classroom = $("#classroom").val();
                                            var grade_key = $("#grade_key<?php echo $classroom_t_key; ?>").val();
                                            var term_key = $("#term_key<?php echo $classroom_t_key; ?>").val();
                                            var cid = $("#cid<?php echo $classroom_t_key; ?>").val();

                                            var id_key = btoa(classroom_t_key);

                                            if (action == "") {
                                                swalInitInsertStudentClass.fire({
                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                    icon: 'error'
                                                });
                                            } else {


                                                if (classroom != "" && classroom_t_key != "" && grade_key != "" && term_key != "" && cid != "") {
                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                        action: action,
                                                        classroom_t_key: classroom_t_key,
                                                        classroom: classroom,
                                                        grade_key: grade_key,
                                                        term_key: term_key,
                                                        cid: cid

                                                    }, function(process_edit) {

                                                        let timerInterval;
                                                        swalInitInsertStudentClass.fire({
                                                            title: 'บันทึกสำเร็จ',
                                                            //html: 'I will close in <b></b> milliseconds.',
                                                            timer: 1200,
                                                            icon: 'success',
                                                            timerProgressBar: true,
                                                            didOpen: function() {
                                                                Swal.showLoading()
                                                                timerInterval = setInterval(function() {
                                                                    const content = Swal.getContent();
                                                                    if (content) {
                                                                        const b_course_no = content.querySelector('b_course_no')
                                                                        if (b_course_no) {
                                                                            b_course_no.textContent = Swal.getTimerLeft();
                                                                        } else {}
                                                                    } else {}
                                                                }, 100);
                                                            },
                                                            willClose: function() {
                                                                clearInterval(timerInterval)
                                                            }
                                                        }).then(function(result) {
                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=" + id_key;
                                                            } else {}
                                                        });


                                                    })
                                                } else {}
                                            }
                                        } else if (result.dismiss === swal.DismissReason.cancel) {

                                            //swalInitLogout.fire(
                                            //'Cancelled',
                                            //'Your imaginary file is safe :)',
                                            //'error'
                                            //);
                                        } else {
                                            //--------------------------------------------------------------------------------------					
                                        }
                                    });
                                });

                            })
                        </script>
                        <!-- Insert Student Class End-->


                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable-button-html5-columns-STDA">
                                <thead>
                                    <tr align="center">
                                        <th>
                                            <div>เลขที่</div>
                                        </th>
                                        <th>
                                            <div>รหัส</div>
                                        </th>
                                        <th>
                                            <div>รายชื่อ</div>
                                        </th>
                                        <th>
                                            <div>รายชื่อ (Eng)</div>
                                        </th>
                                        <th>
                                            <div>บัตร</div>
                                        </th>
                                        <th>
                                            <div>ชื่อเล่น</div>
                                        </th>
                                        <th>
                                            <div>เพศ</div>
                                        </th>
                                        <th>
                                            <div>เบอร์โทร</div>
                                        </th>
                                        <!-- <th>
                                                <div>อีเมล์</div>
                                            </th> -->
                                        <th>
                                            <div>จัดการ</div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $sql = "SELECT * , b.student_no AS STNO FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$classid}' AND a.term_id='{$term_key}' AND a.grade_id='{$grade_key}' AND a.classroom_detail_status='1' AND b.student_status='1' ORDER BY b.student_no ASC";
                                    // echo $sql;
                                    $list = result_array($sql);
                                    foreach ($list as $key => $row) {
                                        if ((is_array($row) && count($row))) {

                                            if ($row['gender'] == '1') {
                                                $gender = "ชาย";
                                            } else if ($row['gender'] == '2') {
                                                $gender = "หญิง";
                                            }

                                            $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
                                            $rowC = row_array($sqlC);

                                    ?>

                                            <tr>
                                                <td align="center">
                                                    <div><?php echo $row['STNO']; ?></div>
                                                    <form>
                                                        <button type="button" name="modal_student_no_Add<?php echo @$row['student_id']; ?>" data-toggle="modal" data-target="#modal_student_no_Add<?php echo @$row['student_id']; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="แก้ไขเลขที่" data-placement="bottom"><i class="icon-cog"></i></button>
                                                        <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                                        <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $row['classroom_t_id']; ?>">
                                                        <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                        <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                                    </form>

                                                </td>

                                                <td align="center">
                                                    <div><?php echo $row['student_id']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['student_name']; ?>&nbsp;<?php echo $row['student_surname']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['student_name_eng']; ?>&nbsp;<?php echo $row['student_surname_eng']; ?></div>
                                                </td>
                                                <td align="center">
                                                    <div><?php echo $row['student_idcard']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['nickname']; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $gender; ?></div>
                                                </td>
                                                <td>
                                                    <div><?php echo $row['student_tel']; ?></div>
                                                </td>
                                                <!-- <td>
                                                        <div><?php echo $row['student_email']; ?></div>
                                                    </td> -->

                                                <td align="center" style="width: 12%;">
                                                    <div align="center">
                                                        <ul class="nav">
                                                            <li class="nav-item">
<form name="student_update<?php echo $row['student_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_edit&id=<?php echo $row['student_id']; ?>">
                                                                    <button type="submit" name="stu_update<?php echo $row['student_id']; ?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo $row['student_id']; ?>"><i class="icon-pen"></i></button>
                                                                    <input type="hidden" name="student_key" value="<?php echo $row['student_id']; ?>">
                                                                    <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $row['classroom_t_id']; ?>">
</form>
                                                            </li>
                                                            <li class="nav-item">
                                                                <button type="button" name="Delete_Student_Data" data-toggle="modal" data-target="#modal_student_delete<?php echo $row['classroom_detail_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Success modal -->
                                            <?php
                                            $date_now = date('Y-m-d');
                                            ?>
                                            <div id="modal_student_no_Add<?php echo $row['student_id']; ?>" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                            <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลเลขที่</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form name="course-no-add" id="course-no-add" method="post" accept-charset="utf-8">

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสนิสิต </label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <div>
                                                                                        <?php echo $row['student_id']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ-นามสกุล </label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <div>
                                                                                        <?php echo $row['student_name']; ?>&nbsp;<?php echo $row['student_surname']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">Name-Surname </label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <div>
                                                                                        <?php echo $row['student_name_eng']; ?>&nbsp;<?php echo $row['student_surname_eng']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">เลขที่ <font style="color: red;">*</font></label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <div id="stu-no-null">
                                                                                        <input type="number" name="stu_no" id="stu_no<?php echo $row['student_id']; ?>" class="form-control" value="<?php echo $row['student_no']; ?>" placeholder="กรอกข้อมูลเลขที่" required="required">
                                                                                        <span>กรอกข้อมูลเลขที่</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">สถานะนิสิต</label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <select class="form-control select" name="stu_status" id="stu_status<?php echo $row['student_id']; ?>" data-placeholder="เลือกสถานะนิสิต..." required="required">
                                                                                        <option></option>
                                                                                        <optgroup label="สถานะนิสิต">
                                                                                            <option <?php echo $row['student_status'] == 1 ? "selected" : ""; ?> value="1">ปกติ</option>
                                                                                            <option <?php echo $row['student_status'] == 2 ? "selected" : ""; ?> value="2">ลาออก</option>
                                                                                            <option <?php echo $row['student_status'] == 3 ? "selected" : ""; ?> value="3">จบการศึกษา</option>
                                                                                            <option <?php echo $row['student_status'] == 4 ? "selected" : ""; ?> value="4">ลาพัก</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <fieldset class="mb-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">วันที่ลาออก</label>
                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                    <input type="text" name="dateout" id="dateout<?php echo $row['student_id']; ?>" class="form-control pickadate-accessibility rounded-right" value="<?php echo $date_now; ?>" placeholder="เลือกวันที่ลาออก" required="required">
                                                                                    <span>กรอกวันที่ลาออก</span>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>


                                                            </form>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                            <button type="button" name="Add_student_no" id="Add_student_no<?php echo $row['student_id']; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                                            <input type="hidden" name="student_key" id="student_key<?php echo $row['student_id']; ?>" value="<?php echo $row['student_id']; ?>">
                                                            <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $row['student_id']; ?>" value="<?php echo $row['classroom_t_id']; ?>">
                                                            <input type="hidden" name="grade_key" id="grade_key<?php echo $row['student_id']; ?>" value="<?php echo $grade_key; ?>">
                                                            <input type="hidden" name="term_key" id="term_key<?php echo $row['student_id']; ?>" value="<?php echo $term_key; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /success modal -->

                                            <!--แก้ไขลำดับ-->
                                            <script>
                                                $(document).ready(function() {

                                                    // Defaults
                                                    var swalInitAddStudentNo = swal.mixin({
                                                        buttonsStyling: false,
                                                        customClass: {
                                                            confirmButton: 'btn btn-primary',
                                                            cancelButton: 'btn btn-light',
                                                            denyButton: 'btn btn-light',
                                                            input: 'form-control'
                                                        }
                                                    });
                                                    // Defaults End

                                                    $('#Add_student_no<?php echo $row['student_id']; ?>').on('click', function() {
                                                        swalInitAddStudentNo.fire({
                                                            title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                            //text: "You won't be able to revert this!",
                                                            icon: 'warning',
                                                            allowOutsideClick: false,
                                                            showCancelButton: true,
                                                            confirmButtonText: 'ใช่',
                                                            cancelButtonText: 'ไม่',
                                                            buttonsStyling: false,
                                                            customClass: {
                                                                confirmButton: 'btn btn-success',
                                                                cancelButton: 'btn btn-danger'
                                                            }
                                                        }).then(function(result) {
                                                            if (result.value) {

                                                                var action = "change_student_no";
                                                                var student_key = $("#student_key<?php echo $row['student_id']; ?>").val();
                                                                var classroom_t_key = $("#classroom_t_key<?php echo $row['student_id']; ?>").val();
                                                                var stu_no = $("#stu_no<?php echo $row['student_id']; ?>").val();
                                                                var stu_status = $("#stu_status<?php echo $row['student_id']; ?>").val();
                                                                var dateout = $("#dateout<?php echo $row['student_id']; ?>").val();
                                                                var grade_key = $("#grade_key<?php echo $row['student_id']; ?>").val();
                                                                var term_key = $("#term_key<?php echo $row['student_id']; ?>").val();

                                                                var id_key = btoa(classroom_t_key);

                                                                if (action == "") {
                                                                    swalInitAddStudentNo.fire({
                                                                        title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                        icon: 'error'
                                                                    });
                                                                } else {


                                                                    if (student_key != "" && classroom_t_key != "") {
                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                            action: action,
                                                                            student_key: student_key,
                                                                            classroom_t_key: classroom_t_key,
                                                                            stu_no: stu_no,
                                                                            stu_status: stu_status,
                                                                            dateout: dateout,
                                                                            grade_key: grade_key,
                                                                            term_key: term_key

                                                                        }, function(process_edit) {

                                                                            let timerInterval;
                                                                            swalInitAddStudentNo.fire({
                                                                                title: 'บันทึกสำเร็จ',
                                                                                //html: 'I will close in <b></b> milliseconds.',
                                                                                timer: 1200,
                                                                                icon: 'success',
                                                                                timerProgressBar: true,
                                                                                didOpen: function() {
                                                                                    Swal.showLoading()
                                                                                    timerInterval = setInterval(function() {
                                                                                        const content = Swal.getContent();
                                                                                        if (content) {
                                                                                            const b_course_no = content.querySelector('b_course_no')
                                                                                            if (b_course_no) {
                                                                                                b_course_no.textContent = Swal.getTimerLeft();
                                                                                            } else {}
                                                                                        } else {}
                                                                                    }, 100);
                                                                                },
                                                                                willClose: function() {
                                                                                    clearInterval(timerInterval)
                                                                                }
                                                                            }).then(function(result) {
                                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=" + id_key;
                                                                                } else {}
                                                                            });


                                                                        })
                                                                    } else {}
                                                                }
                                                            } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                //swalInitLogout.fire(
                                                                //'Cancelled',
                                                                //'Your imaginary file is safe :)',
                                                                //'error'
                                                                //);
                                                            } else {
                                                                //--------------------------------------------------------------------------------------					
                                                            }
                                                        });
                                                    });

                                                })
                                            </script>
                                            <!--แก้ไขลำดับ จบ-->

                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <!--Delete-->
                                            <div id="modal_student_delete<?php echo $row['classroom_detail_id']; ?>" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form name="student-data-delete" id="student-data-delete" method="post" accept-charset="utf-8">
                                                                <div class="row">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <div class="row" style="text-align: center;">
                                                                            <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                ต้องการลบข้อมูล <?php echo $row['student_name'] . " " . $row['student_surname']; ?> หรือไม่
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row" style="text-align: center;">
                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                        <button type="button" id="delete_<?php echo $row['classroom_detail_id']; ?>" name="delete_<?php echo $row['classroom_detail_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['classroom_detail_id']; ?>">ใช่</button>
                                                                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                        <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $row['classroom_detail_id']; ?>" value="<?php echo $row['classroom_t_id']; ?>">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Delete End-->
                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                            <!--Delete-->
                                            <script>
                                                $(document).ready(function() {
                                                    // Defaults
                                                    var swalInitDeleteStudentData = swal.mixin({
                                                        buttonsStyling: false,
                                                        customClass: {
                                                            confirmButton: 'btn btn-primary',
                                                            cancelButton: 'btn btn-light',
                                                            denyButton: 'btn btn-light',
                                                            input: 'form-control'
                                                        }
                                                    });
                                                    // Defaults End

                                                    $('#delete_<?php echo $row['classroom_detail_id']; ?>').on('click', function() {

                                                        var action = "delete_student_classroom_detail";
                                                        var table = "tb_classroom_detail";
                                                        var ff = "classroom_detail_id";
                                                        var classroom_detail_key = $("#delete_<?php echo $row['classroom_detail_id']; ?>").val();
                                                        var classroom_t_key = $("#classroom_t_key<?php echo $row['classroom_detail_id']; ?>").val();

                                                        var id_key = btoa(classroom_t_key);

                                                        if (action == "") {
                                                            swalInitDeleteStudentData.fire({
                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                icon: 'error'
                                                            });
                                                        } else {

                                                            if (classroom_detail_key != "") {
                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                    action: action,
                                                                    table: table,
                                                                    ff: ff,
                                                                    classroom_detail_key: classroom_detail_key

                                                                }, function(process_add) {
                                                                    var process_add = process_add;
                                                                    if (process_add.trim() === "no_error") {

                                                                        let timerInterval;
                                                                        swalInitDeleteStudentData.fire({
                                                                            title: 'ลบสำเร็จ',
                                                                            //html: 'I will close in <b></b> milliseconds.',
                                                                            timer: 1200,
                                                                            icon: 'success',
                                                                            timerProgressBar: true,
                                                                            didOpen: function() {
                                                                                Swal.showLoading()
                                                                                timerInterval = setInterval(function() {
                                                                                    const content = Swal.getContent();
                                                                                    if (content) {
                                                                                        const b_student_data = content.querySelector('b_student_data')
                                                                                        if (b_student_data) {
                                                                                            b_student_data.textContent = Swal.getTimerLeft();
                                                                                        } else {}
                                                                                    } else {}
                                                                                }, 100);
                                                                            },
                                                                            willClose: function() {
                                                                                clearInterval(timerInterval)
                                                                            }
                                                                        }).then(function(result) {
                                                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=" + id_key;
                                                                            } else {}
                                                                        });

                                                                    } else if (process_add.trim() === "it_error") {
                                                                        swalInitDeleteStudentData.fire({
                                                                            title: 'ข้อมูลซ้ำ',
                                                                            icon: 'error'
                                                                        });
                                                                    } else {
                                                                        swalInitDeleteStudentData.fire({
                                                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                                            icon: 'error'
                                                                        });
                                                                    }
                                                                })

                                                            } else {}

                                                        }
                                                    });

                                                })
                                            </script>
                                            <!--Delete end-->
                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                                    <?php   } else {
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                }
                    ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($list == "form_edit")) { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    //@$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                    @$student_key = filter_input(INPUT_POST, 'student_key');
                    @$classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
                    if (($student_key != null)) {
                        $sql = "SELECT * FROM tb_student WHERE student_id = '{$student_key}'";
                        $row = row_array($sql); ?>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลนิสิต</div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_show<?php echo $classroom_t_key; ?>" id="form_show<?php echo $classroom_t_key; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=<?php echo base64_encode($classroom_t_key); ?>" method="post">
                                                                <button type="submit" class="btn btn-success btn-sm" data-popup="tooltip" title="รายการ" data-placement="bottom"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
<!--<form name="student_data_edit" id="student_data_edit">-->
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">บัตรประชาชน</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <input type="text" name="idcard" id="idcard" class="form-control" value="<?php echo $row['student_idcard']; ?>" placeholder="กรอกข้อมูลบัตรประชาชน" required="required">
                                                                        <span>กรอกข้อมูลบัตรประชาชน</span>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อ <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="name-edit">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['student_name']; ?>" placeholder="กรอกข้อมูลชื่อ" required="required">
                                                                            <span>กรอกข้อมูลชื่อ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุล </label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="surname-edit">
                                                                            <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $row['student_surname']; ?>" placeholder="กรอกข้อมูลนามสกุล" required="required">
                                                                            <span>กรอกข้อมูลนามสกุล</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อภาษาอังกฤษ </label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="ename-edit">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['student_name_eng']; ?>" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">
                                                                            <span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นามสกุลภาษาอังกฤษ </label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="esurname-edit">
                                                                            <input type="text" name="esurname" id="esurname" class="form-control" value="<?php echo $row['student_surname_eng']; ?>" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">
                                                                            <span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ชื่อเล่น </label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="nickname-edit">
                                                                            <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo $row['nickname']; ?>" placeholder="กรอกกรอกข้อมูลชื่อเล่น" required="required">
                                                                            <span>กรอกข้อมูลชื่อเล่น</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">เพศ</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="gender" id="gender" data-placeholder="เลือกเพศ..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="เพศ">
                                                                                <option <?php echo $row['gender'] == 1 ? "selected" : ""; ?> value="1">ชาย</option>
                                                                                <option <?php echo $row['gender'] == 2 ? "selected" : ""; ?> value="2">หญิง</option>
                                                                                <option <?php echo $row['gender'] == 0 ? "selected" : ""; ?> value="0">ไม่ระบุ</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">วันเดือนปีเกิด</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <?php
                                                                        if (($row['birth_day'] != null)) { ?>
                                                                            <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="<?php echo date("Y-m-d", strtotime($row['birth_day'])); ?>" placeholder="เลือกวันเดือนปีเกิด" required="required">
                                                                            <span>กรอกวันเดือนปีเกิด</span>
                                                                        <?php    } else { ?>
                                                                            <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันเดือนปีเกิด" required="required">
                                                                            <span>กรอกวันเดือนปีเกิด</span>
                                                                        <?php    } ?>

                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสนิสิต <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <div id="username-edit">
                                                                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['student_id']; ?>" placeholder="กรอกข้อมูลรหัสนิสิต ใช่เป็น Username" required="required" readonly="readonly">
                                                                            <span>กรอกข้อมูลรหัสนิสิต ใช่เป็น Username</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ระดับชั้น <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ระดับชั้น">
                                                                                <?php
                                                                                $sql = "SELECT * FROM tb_grade ORDER BY grade_id ASC";
                                                                                $cc = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($cc as $_cc) { ?>
                                                                                    <option <?php echo $row['grade_id'] == $_cc['grade_id'] ? "selected" : ""; ?> value="<?php echo $_cc['grade_id']; ?>"><?php echo $_cc['grade_name']; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="grade-edit"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="classroom" id="classroom" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ห้องเรียน">
                                                                                <?php
                                                                                $sql = "SELECT * FROM tb_classroom ORDER BY classroom_name ASC";
                                                                                $cc = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($cc as $_cc) { ?>
                                                                                    <option <?php echo $row['student_class'] == $_cc['classroom_id'] ? "selected" : ""; ?> value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="classroom-edit"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">สถานะนิสิต <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต.." required="required">
                                                                            <option></option>
                                                                            <optgroup label="สถานะนิสิต">
                                                                                <option <?php echo $row['student_status'] == 1 ? "selected" : ""; ?> value="1">ปกติ</option>
                                                                                <option <?php echo $row['student_status'] == 2 ? "selected" : ""; ?> value="2">ลาออก</option>
                                                                                <option <?php echo $row['student_status'] == 3 ? "selected" : ""; ?> value="3">จบการศึกษา</option>
                                                                                <option <?php echo $row['student_status'] == 4 ? "selected" : ""; ?> value="4">ลาพัก</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="status-edit"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Edit_Student_Data" id="Edit_Student_Data" class="btn btn-info">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="student_key" id="student_key" value="<?php echo $row["student_id"]; ?>">
                                                                    <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classroom_t_key; ?>">
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
<!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    } ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php    } elseif (($list == "show_level")) { ?>
                    <!---->
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    $classroom_t_key = base64_decode(filter_input(INPUT_GET, 'id'));
                    if ((!is_null($classroom_t_key))) {

                        $sqlCT = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom_t_key}'";
                        $rowCT = row_array($sqlCT);
                        // echo $sqlCT;

                        $grade_key = $rowCT['grade_id'];
                        $term_key = $rowCT['term_id'];
                        $classid = $rowCT['classroom_t_id'];
                        $cid = $rowCT['classroom_id'];
                        $class = $rowCT['classroom_name'];

                        if (isset($grade_key)) {
                            //$grade_key = $grade_key;
                            $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$grade_key}'";
                            $row = row_array($sql);
                            $grade = "ระดับชั้น$row[grade_name]";
                        } else if (!isset($grade_key)) {
                            $grade = null;
                        } else {
                        }

                        if (isset($term_key)) {
                            //$term_key = $term_key;
                            $sql = "SELECT * FROM tb_term WHERE term_id = '{$term_key}' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                            $row = row_array($sql);
                            $term = "$row[term]/$row[year]";
                            $year = "$row[year]";
                        } else if (!isset($term_key)) {
                            $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                            $row = row_array($sql);
                            $term_key = $row['term_id'];
                            $term = "$row[term]/$row[year]";
                            $year = "$row[year]";
                        } else {
                        }
                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">

                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลหลักสูตร <?php echo $term; ?> <?php echo $grade; ?> / <?php echo $class; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=<?php echo base64_encode($classroom_t_key); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มรายวิชา</button> -->
                                            <button type="button" id="button_add" name="button_add" class="btn btn-secondary btn-sm" style="align: right;" data-toggle="modal" data-target="#modal_course_success_Add<?php echo $classroom_t_key; ?>" data-dismiss="modal"><i class="icon-plus3"></i> จัดหลักสูตร</button>
                                        </div>
                                    </div>

                                    <!-- Add Course Class modal -->
                                    <div id="modal_course_success_Add<?php echo $classroom_t_key; ?>" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success text-white">
                                                    <h6 class="modal-title">ฟอร์มจัดหลักสูตร <?php echo $grade; ?></h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <form name="Course-class-Add" id="Course-class-Add" method="post" accept-charset="utf-8">

                                                        <div class="row">
                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                <fieldset class="mb-3">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-<?php echo $grid; ?>-3">หลักสูตร</label>
                                                                        <div class="col-<?php echo $grid; ?>-9">
                                                                            <select class="form-control select" name="course" id="course" data-placeholder="เลือกหลักสูตร...">
                                                                                <option></option>
                                                                                <optgroup label="หลักสูตร">
                                                                                    <?php
                                                                                    $sql = "SELECT * 
                                                                                            FROM `tb_course` 
                                                                                            WHERE `grade_id`='{$grade_key}' 
                                                                                            ORDER BY `course_name` ASC, `course_year` ASC";
                                                                                    $tt = result_array($sql);
                                                                                    foreach ($tt as $_tt) { ?>
                                                                                        <option value="<?php echo $_tt['course_id'] ?>"><?php echo $_tt['course_name']; ?></option>
                                                                                    <?php } ?>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                    <button type="button" name="CRD_Add_Course<?php echo $classroom_t_key; ?>" id="CRD_Add_Course<?php echo $classroom_t_key; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $classroom_t_key; ?>">
                                                    <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                                    <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
                                                    <input type="hidden" name="type_course" id="type_course<?php echo $classroom_t_key; ?>" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Add Course Class modal -->

                                    <!-- Add Course Class -->
                                    <script>
                                        $(document).ready(function() {

                                            // Defaults
                                            var swalInitAddCourseClass = swal.mixin({
                                                buttonsStyling: false,
                                                customClass: {
                                                    confirmButton: 'btn btn-primary',
                                                    cancelButton: 'btn btn-light',
                                                    denyButton: 'btn btn-light',
                                                    input: 'form-control'
                                                }
                                            });
                                            // Defaults End

                                            $('#CRD_Add_Course<?php echo $classroom_t_key; ?>').on('click', function() {
                                                swalInitAddCourseClass.fire({
                                                    title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                    //text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    allowOutsideClick: false,
                                                    showCancelButton: true,
                                                    confirmButtonText: 'ใช่',
                                                    cancelButtonText: 'ไม่',
                                                    buttonsStyling: false,
                                                    customClass: {
                                                        confirmButton: 'btn btn-success',
                                                        cancelButton: 'btn btn-danger'
                                                    }
                                                }).then(function(result) {
                                                    if (result.value) {

                                                        var action = "Add_Course_class";
                                                        var classroom_t_key = $("#classroom_t_key<?php echo $classroom_t_key; ?>").val();
                                                        var course = $("#course").val();
                                                        var grade_key = $("#grade_key<?php echo $classroom_t_key; ?>").val();
                                                        var term_key = $("#term_key<?php echo $classroom_t_key; ?>").val();
                                                        var type_course = $("#type_course<?php echo $classroom_t_key; ?>").val();

                                                        var id_key = btoa(classroom_t_key);

                                                        if (action == "") {
                                                            swalInitAddCourseClass.fire({
                                                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                icon: 'error'
                                                            });
                                                        } else {

                                                            if (course != "" && classroom_t_key != "" && grade_key != "" && term_key != "") {
                                                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                    action: action,
                                                                    classroom_t_key: classroom_t_key,
                                                                    course: course,
                                                                    grade_key: grade_key,
                                                                    term_key: term_key,
                                                                    type_course: type_course

                                                                }, function(process_edit) {

                                                                    let timerInterval;
                                                                    swalInitAddCourseClass.fire({
                                                                        title: 'บันทึกสำเร็จ',
                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                        timer: 1200,
                                                                        icon: 'success',
                                                                        timerProgressBar: true,
                                                                        didOpen: function() {
                                                                            Swal.showLoading()
                                                                            timerInterval = setInterval(function() {
                                                                                const content = Swal.getContent();
                                                                                if (content) {
                                                                                    const b_course_no = content.querySelector('b_course_no')
                                                                                    if (b_course_no) {
                                                                                        b_course_no.textContent = Swal.getTimerLeft();
                                                                                    } else {}
                                                                                } else {}
                                                                            }, 100);
                                                                        },
                                                                        willClose: function() {
                                                                            clearInterval(timerInterval)
                                                                        }
                                                                    }).then(function(result) {
                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
                                                                        } else {}
                                                                    });


                                                                })
                                                            } else {}
                                                        }
                                                    } else if (result.dismiss === swal.DismissReason.cancel) {

                                                        //swalInitLogout.fire(
                                                        //'Cancelled',
                                                        //'Your imaginary file is safe :)',
                                                        //'error'
                                                        //);
                                                    } else {
                                                        //--------------------------------------------------------------------------------------					
                                                    }
                                                });
                                            });

                                        })
                                    </script>
                                    <!-- Add Course Class End-->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">

                                                <div class="portlet light portlet-fit portlet-datatable bordered">
                                                    <div class="portlet-body">

                                                        <div class="row">
                                                            <div class="col-<?php echo $grid; ?>-12">

                                                                <div class="table-responsive-sm table-container">
                                                                    <table class="table table-striped table-bordered table-hover" id="">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="30"> ลำดับ </th>
                                                                                <th> หลักสูตร </th>
                                                                                <!--<th width="100"> ประเภท </th>-->
                                                                                <th width="100"> ภาคเรียน </th>
                                                                                <?php
                                                                                if ($grade_key == '1') { ?>
                                                                                    <th width="100"> สำเนา </th>

                                                                                <?php   } else {
                                                                                } ?>
                                                                                <th width="250"> นิสิต </th>
                                                                                <th width="120"> จัดการเรียน </th>
                                                                                <th width="180"> จัดการ </th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $sql = "SELECT * FROM tb_course_class a INNER JOIN tb_term b ON a.term_id = b.term_id  WHERE b.term_id = '{$term_key}' AND a.grade_id='{$grade_key}' AND a.classroom_t_id = '{$classroom_t_key}' ORDER BY a.course_class_name ASC, a.course_class_year ASC";
                                                                            $list = result_array($sql);
                                                                            foreach ($list as $key => $row) {

                                                                                $course_type = $row['course_class_type'];

                                                                            ?>

                                                                                <tr>
                                                                                    <td align="center"><?php echo $key + 1; ?></td>
                                                                                    <td><?php echo $row['course_class_name']; ?></td>
                                                                                    <!-- <td>

                                                                                        <?php
                                                                                        // if ($course_type == '1') {
                                                                                        //     echo "&nbsp;ปกติ";
                                                                                        // } else if ($course_type == '2') {
                                                                                        //     echo "&nbsp;TSL";
                                                                                        // } else if ($course_type == '3') {
                                                                                        //     echo "&nbsp;ESL";
                                                                                        // } else if ($course_type == '4') {
                                                                                        //     echo "&nbsp;TSL/ESL";
                                                                                        // } else {
                                                                                        // }
                                                                                        ?>

                                                                                    </td> -->
                                                                                    <td align="center"><?php echo $row['term']; ?>/<?php echo $row['year']; ?></td>
                                                                                    <?php
                                                                                            if ($grade_key == '1') { ?>
                                                                                        <td align="center">
                                                                                            <a href="ajax/get_copycourse_class_detail.php?id=<?php echo $row['grade_id']; ?>&cid=<?php echo $row['course_class_id']; ?>" data-toggle="modal" data-id="<?php echo $row['course_id']; ?>" data-target="#CopyCourse" class="btn btn-sm yellow-gold">
                                                                                                <i class="fa fa-copy"></i> สำเนา</a>
                                                                                        </td>
                                                                                    <?php   } else {} ?>

                                                                                    <td align="center">

<form name="classroom_course_show<?php echo $classroom_t_key; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=<?php echo base64_encode($classroom_t_key); ?>">
                                                                                            <button type="submit" name="classroom_course_show<?php echo $classroom_t_key; ?>" class="btn btn-outline-info btn-sm" data-popup="tooltip" title="รายชื่อนิสิต" data-placement="bottom" value="<?php echo $classroom_t_key; ?>"><i class="icon-search4"></i></button>
                                                                                            <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $classroom_t_key; ?>" value="<?php echo $classroom_t_key; ?>">
                                                                                            <input type="hidden" name="grade_key" id="grade_key<?php echo $classroom_t_key; ?>" value="<?php echo $grade_key; ?>">
                                                                                            <input type="hidden" name="term_key" id="term_key<?php echo $classroom_t_key; ?>" value="<?php echo $term_key; ?>">
</form>
<form>
                                                                                                <button type="button" name="modal_student_course_InsertCRD<?php echo $row['course_class_id']; ?>" data-toggle="modal" data-target="#modal_student_course_InsertCRD<?php echo $row['course_class_id']; ?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="นำเข้านิสิต" data-placement="bottom"><i class="icon-plus3"></i> นำเข้า</button>
                                                                                                <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $row['course_class_id']; ?>" value="<?php echo $row['course_class_id']; ?>">
                                                                                                <input type="hidden" name="grade_key" id="grade_key<?php echo $row['course_class_id']; ?>" value="<?php echo $grade_key; ?>">
                                                                                                <input type="hidden" name="term_key" id="term_key<?php echo $row['course_class_id']; ?>" value="<?php echo $term_key; ?>">
                                                                                                <input type="hidden" name="class_id" id="class_id<?php echo $row['course_class_id']; ?>" value="<?php echo $row['course_class_id']; ?>">
</form>

<form>
                                                                                                <button type="button" name="modal_student_course_Add<?php echo $row['course_class_id']; ?>" data-toggle="modal" data-target="#modal_student_course_Add<?php echo $row['course_class_id']; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="จัดนิสิต" data-placement="bottom"><i class="icon-plus3"></i> จัดนิสิต</button>
                                                                                                <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $row['course_class_id']; ?>" value="<?php echo $row['course_class_id']; ?>">
                                                                                                <input type="hidden" name="grade_key" id="grade_key<?php echo $row['course_class_id']; ?>" value="<?php echo $grade_key; ?>">
                                                                                                <input type="hidden" name="term_key" id="term_key<?php echo $row['course_class_id']; ?>" value="<?php echo $term_key; ?>">
                                                                                                <input type="hidden" name="class_id" id="class_id<?php echo $row['course_class_id']; ?>" value="<?php echo $row['course_class_id']; ?>">
</form>

                                                                                    </td>

                                                                                    <td align="center">
<form name="course_manage<?php echo $row['course_class_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_manage">
                                                                                            <button type="submit" name="course_manage" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="จัดการเรียน" data-placement="bottom" value=""><i class="icon-plus3"></i> จัดการเรียน</button>
                                                                                            <input type="hidden" name="course_class_key"  value="<?php echo $row['course_class_id']; ?>"><!--id-->
                                                                                            <input type="hidden" name="class_key"  value="<?php echo $classid;?>"><!--rid-->
                                                                                            <input type="hidden" name="check_term"  value="<?php echo $term_key; ?>">
                                                                                            <input type="hidden" name="check_grade"  value="<?php echo $grade_key; ?>">
                                                                                           
</form>
                                                                                    </td>

                                                                                    <td align="center">



<form name="course_show_class<?php echo $row['course_class_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class">
                                                                                            <button type="submit" name="course_show_class<?php echo $row['course_class_id']; ?>" class="btn btn-outline-info btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value="<?php echo $classroom_t_key; ?>"><i class="icon-search4"></i></button>
                                                                                            <input type="hidden" name="modules" value="course_show_class">
                                                                                            <input type="hidden" name="manage" value="form_show_course">
                                                                                            <input type="hidden" name="list" value="<?php echo $grade_key;?>">
                                                                                            <input type="hidden" name="course_class_key"  value="<?php echo $row['course_class_id']; ?>">
                                                                                            <input type="hidden" name="classroom_t_key"  value="<?php echo $classroom_t_key; ?>">
                                                                                            <input type="hidden" name="grade_key"  value="<?php echo $grade_key; ?>">
                                                                                            <input type="hidden" name="term_key"  value="<?php echo $term_key; ?>">

                                                                                            <input type="hidden" name="cid" value="<?php echo $row['course_id']; ?>">
</form>

                                                                                        
                                                                                            <button type="button" name="update_course<?php echo $row['course_class_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_update_course&id=<?php echo base64_encode($row['course_class_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                                                                        

                                                                                            <?php
                                                                                            if (check_session("admin_status_lcm") == '1') { ?>

                                                                                                <button type="button" name="delete_class_<?php echo $row['course_class_id']; ?>" data-toggle="modal" data-target="#modal_class_success_Delete<?php echo $row['course_class_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>

                                                                                            <?php   } else {
                                                                                            } ?>

                                                                                    </td>

                                                                                </tr>
                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                <tr>
                                                                                    <td colspan="8">
                                                                                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                        <table class="table table-striped table-hover">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th width="30"> เลขที่ </th>
                                                                                                    <th width="40"> รหัส </th>
                                                                                                    <th> รายชื่อ </th>
                                                                                                    <th width="130"> รายชื่อ(Eng) </th>
                                                                                                    <th width="100"> บัตร </th>
                                                                                                    <th width="100"> ชื่อเล่น </th>
                                                                                                    <th width="50"> เพศ </th>
                                                                                                    <th width="100"> เบอร์โทร </th>
                                                                                                    <!--<th width="120"> อีเมล์ </th>-->
                                                                                                    <th width="100"> ย้ายหลักสูตร </th>
                                                                                                    <th width="120"> จัดการ </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $sqlStu = "SELECT * FROM tb_course_student a INNER JOIN tb_course_class b ON a.course_class_id = b.course_class_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id='{$row['course_class_id']}' AND b.classroom_t_id='{$row['classroom_t_id']}' AND a.course_s_status='1'  AND c.student_status='1' AND (c.student_no !='0' OR c.student_no='') AND a.course_s_status ='1' ORDER BY c.student_no ASC";
                                                                                                $listStu = result_array($sqlStu);
                                                                                                foreach ($listStu as $key => $rowStu) {

                                                                                                    if ($rowStu['gender'] == '1') {
                                                                                                        $gender = "ชาย";
                                                                                                    } else if ($rowStu['gender'] == '2') {
                                                                                                        $gender = "หญิง";
                                                                                                    } else {
                                                                                                        $gender = null;
                                                                                                    }

                                                                                                    $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$rowStu[student_class]'";
                                                                                                    $rowC = row_array($sqlC);

                                                                                                ?>
                                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                    <tr>
                                                                                                        <td align="center"><?php echo $rowStu['student_no']; ?></td>
                                                                                                        <!--<td align="center"><?php echo $key + 1; ?></td>-->
                                                                                                        <td align="center"> <?php echo $rowStu['student_id']; ?></td>
                                                                                                        <td><?php echo $rowStu['student_name']; ?>&nbsp;<?php echo $rowStu['student_surname']; ?></td>
                                                                                                        <td><?php echo $rowStu['student_name_eng']; ?>&nbsp;<?php echo $rowStu['student_surname_eng']; ?></td>
                                                                                                        <td align="center"> <?php echo $rowStu['student_idcard']; ?></td>
                                                                                                        <td><?php echo $rowStu['nickname']; ?></td>
                                                                                                        <td><?php echo $gender; ?></td>
                                                                                                        <td><?php echo $rowStu['student_tel']; ?></td>
                                                                                                        <!--<td><?php echo $rowStu['student_email']; ?></td>-->
                                                                                                        <td align="center">
                                                                                                            <a href="ajax/get_movecourse.php?id=<?php echo $rowStu['student_id']; ?>&cid=<?php echo $rowStu['course_class_id']; ?>&rid=<?php echo "$rowStu[classroom_t_id]"; ?>&term_key=<?php echo "$term_key"; ?>&grade_key=<?php echo "$grade_key"; ?>" data-toggle=" modal" data-id="<?php echo $rowStu['student_id']; ?>" data-target="#MoveCourse" class="btn btn-sm yellow-gold" title="ย้ายหลักสูตร">
                                                                                                                <i class="fa fa-copy"></i> </a>
                                                                                                        </td>
                                                                                                        <td align="center">

                                                                                                            <form>
                                                                                                                <button type="button" name="update_course_student<?php echo $row['course_class_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_update_course&id=<?php echo base64_encode($row['course_class_id']); ?>';" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value=""><i class="icon-pen"></i></button>
                                                                                                            </form>

                                                                                                            <?php
                                                                                                            if (check_session("admin_status_lcm") == '1') { ?>

                                                                                                                <button type="button" name="delete_class_student<?php echo $rowStu['course_s_id']; ?>" data-toggle="modal" data-target="#modal_class_student_success_Delete<?php echo $rowStu['course_s_id']; ?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>

                                                                                                            <?php   } else {
                                                                                                            } ?>

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                                                                                                    <div id="modal_class_student_success_Delete<?php echo $rowStu['course_s_id']; ?>" class="modal fade" tabindex="-1">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header bg-danger text-white">
                                                                                                                    <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                                                                </div>

                                                                                                                <div class="modal-body">
<!--<form name="course-s-delete" id="course-s-delete<?php echo $rowStu['course_s_id']; ?>" method="post" accept-charset="utf-8">-->
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                <div class="row" style="text-align: center;">
                                                                                                                                    <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                                                        ต้องการลบข้อมูล <?php echo $rowStu['course_s_id']; ?> หรือไม่
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <br>
                                                                                                                                <div class="row" style="text-align: center;">
                                                                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                                                                        <button type="button" id="delete_class_student<?php echo $rowStu['course_s_id']; ?>" name="delete_class_student<?php echo $rowStu['course_s_id']; ?>" class="btn btn-outline-success" value="<?php echo $rowStu['course_s_id']; ?>" data-dismiss="modal">ใช่</button>
                                                                                                                                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                                                <!--Delete-->
                                                                                                                                <script>
                                                                                                                                    var SA_DeleteClassStudentData<?php echo $rowStu['course_s_id']; ?> = function() {
                                                                                                                                        var _componentSA_DeleteClassStudentData = function() {
                                                                                                                                            if (typeof swal == 'undefined') {
                                                                                                                                                console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                                                                return;
                                                                                                                                            }
                                                                                                                                            // Defaults
                                                                                                                                            var swalInitDeleteClassData = swal.mixin({
                                                                                                                                                buttonsStyling: false,
                                                                                                                                                customClass: {
                                                                                                                                                    confirmButton: 'btn btn-primary',
                                                                                                                                                    cancelButton: 'btn btn-light',
                                                                                                                                                    denyButton: 'btn btn-light',
                                                                                                                                                    input: 'form-control'
                                                                                                                                                }
                                                                                                                                            });
                                                                                                                                            // Defaults End

                                                                                                                                            //--------------------------------------------------------------------------------------
                                                                                                                                            //--------------------------------------------------------------------------------------
                                                                                                                                            $('#delete_class_student<?php echo $rowStu['course_s_id']; ?>').on('click', function() {

                                                                                                                                                var action = "delete_class_student";
                                                                                                                                                var csid = $("#delete_class_student<?php echo $rowStu['course_s_id']; ?>").val();
                                                                                                                                                var classroom_t_key = "<?php echo $classroom_t_key; ?>";
                                                                                                                                                var term_key = "<?php echo $term_key; ?>";
                                                                                                                                                var grade_key = "<?php echo $grade_key; ?>";

                                                                                                                                                var id_key = btoa(classroom_t_key);

                                                                                                                                                var table = "tb_course_student";
                                                                                                                                                var ff = "course_s_id";

                                                                                                                                                if (action == "") {
                                                                                                                                                    swalInitDeleteClassStudentData.fire({
                                                                                                                                                        title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                                                        icon: 'error'
                                                                                                                                                    });
                                                                                                                                                } else {

                                                                                                                                                    if (csid != "" && classroom_t_key != "") {

                                                                                                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                                                                                                            action: action,
                                                                                                                                                            csid: csid,
                                                                                                                                                            classroom_t_key: classroom_t_key,
                                                                                                                                                            term_key: term_key,
                                                                                                                                                            grade_key: grade_key,
                                                                                                                                                            table: table,
                                                                                                                                                            ff: ff

                                                                                                                                                        }, function(process_add) {
                                                                                                                                                            var process_add = process_add;
                                                                                                                                                            if (process_add.trim() === "no_error") {

                                                                                                                                                                let timerInterval;
                                                                                                                                                                swalInitDeleteClassStudentData.fire({
                                                                                                                                                                    title: 'ลบสำเร็จ',
                                                                                                                                                                    //html: 'I will close in <b></b> milliseconds.',
                                                                                                                                                                    timer: 1200,
                                                                                                                                                                    icon: 'success',
                                                                                                                                                                    timerProgressBar: true,
                                                                                                                                                                    didOpen: function() {
                                                                                                                                                                        Swal.showLoading()
                                                                                                                                                                        timerInterval = setInterval(function() {
                                                                                                                                                                            const content = Swal.getContent();
                                                                                                                                                                            if (content) {
                                                                                                                                                                                const b_classroom_data = content.querySelector('b_classroom_data')
                                                                                                                                                                                if (b_classroom_data) {
                                                                                                                                                                                    b_classroom_data.textContent = Swal.getTimerLeft();
                                                                                                                                                                                } else {}
                                                                                                                                                                            } else {}
                                                                                                                                                                        }, 100);
                                                                                                                                                                    },
                                                                                                                                                                    willClose: function() {
                                                                                                                                                                        clearInterval(timerInterval)
                                                                                                                                                                    }
                                                                                                                                                                }).then(function(result) {
                                                                                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
                                                                                                                                                                    } else {}
                                                                                                                                                                });

                                                                                                                                                            } else if (process_add.trim() === "it_error") {
                                                                                                                                                                swalInitDeleteClassStudentData.fire({
                                                                                                                                                                    title: 'ข้อมูลซ้ำ',
                                                                                                                                                                    icon: 'error'
                                                                                                                                                                });
                                                                                                                                                            } else {

                                                                                                                                                                swalInitDeleteClassStudentData.fire({
                                                                                                                                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้' + process_add.trim(),
                                                                                                                                                                    icon: 'error'
                                                                                                                                                                });
                                                                                                                                                            }
                                                                                                                                                        })
                                                                                                                                                    } else {}
                                                                                                                                                }
                                                                                                                                            });

                                                                                                                                            //--------------------------------------------------------------------------------------
                                                                                                                                        };
                                                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                                                        return {
                                                                                                                                            initComponentsDeleteClassStudentData: function() {
                                                                                                                                                _componentSA_DeleteClassStudentData();
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }();
                                                                                                                                    // Initialize module
                                                                                                                                    // ------------------------------
                                                                                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                                                                                        SA_DeleteClassStudentData<?php echo $row['course_class_id']; ?>.initComponentsDeleteClassStudentData();
                                                                                                                                    });
                                                                                                                                </script>
                                                                                                                                <!--Delete Student End-->
                                                                                                                                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                                            </div>
                                                                                                                        </div>


<!--</form>-->
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- /danger modal -->
                                                                                                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                                                                                                <?php    } ?>

                                                                                            </tbody>
                                                                                        </table>
                                                                                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                    </td>
                                                                                </tr>
                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                <!-- Add Student course modal -->

                                                                                <div id="modal_student_course_Add<?php echo $row['course_class_id']; ?>" class="modal fade" tabindex="-1">

                                                                                    <?php
                                                                                    $sqlCTI = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$classroom_t_key}' AND grade_id = '{$grade_key}' AND term_id = '{$term_key}'";
                                                                                    $rowCTI = row_array($sqlCTI);

                                                                                    $classroom = $rowCTI['classroom_t_id'];
                                                                                    $classroomstu = $rowCTI['classroom_id'];
                                                                                    $classroom_name = $rowCTI['classroom_name'];

                                                                                    ?>

                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-success text-white">
                                                                                                <h6 class="modal-title">ฟอร์มข้อมูลจัดนิสิต <?php echo $classroom_name; ?></h6>
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            </div>

                                                                                            <div class="modal-body">
                                                                                                <form name="student-class-add" id="student-class-add<?php echo $row['course_class_id']; ?>" method="post" accept-charset="utf-8">

                                                                                                    <div class="row">
                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                            <fieldset class="mb-3">
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">นิสิต</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <select class="form-control select" data-fouc name="student" id="student<?php echo $row['course_class_id']; ?>" data-placeholder="เลือกนิสิต...">
                                                                                                                            <option></option>
                                                                                                                            <optgroup label="นิสิต">
                                                                                                                                <?php
                                                                                                                                $sql = "SELECT * FROM tb_student WHERE grade_id = '$grade_key' AND student_class = '{$classroomstu}' AND student_status='1' ORDER BY student_name ASC";
                                                                                                                                $tt = result_array($sql);
                                                                                                                                foreach ($tt as $_tt) { ?>
                                                                                                                                    <option value="<?php echo @$_tt['student_id'] ?>"><?php echo $_tt['student_id']; ?>&nbsp;-&nbsp;<?php echo @$_tt['student_name']; ?>&nbsp;<?php echo $_tt['student_surname']; ?></option>
                                                                                                                                <?php } ?>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </fieldset>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="row">
                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                            <fieldset class="mb-3">
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">หมายเหตุ</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <div id="add-note-null">
                                                                                                                            <textarea class="form-control" rows="3" name="note" id="note<?php echo $row['course_class_id']; ?>"></textarea>
                                                                                                                            <span>กรอกข้อมูลหมายเหตุ</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </fieldset>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </form>
                                                                                            </div>

                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                                                                <button type="button" name="Add_student_course" id="Add_student_course_crd<?php echo $row['course_class_id']; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                                                <input type="hidden" name="classroom_t_key" id="classroom_t_key<?php echo $row['course_class_id']; ?>" value="<?php echo $classroom_t_key; ?>">
                                                                                                <input type="hidden" name="grade_key" id="grade_key<?php echo $row['course_class_id']; ?>" value="<?php echo $grade_key; ?>">
                                                                                                <input type="hidden" name="term_key" id="term_key<?php echo $row['course_class_id']; ?>" value="<?php echo $term_key; ?>">
                                                                                                <input type="hidden" name="class_id" id="class_id<?php echo $row['course_class_id']; ?>" value="<?php echo $class_id; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /Add Student Course modal -->

                                                                                <!-- Add Student Course -->
                                                                                <script>
                                                                                    $(document).ready(function() {

                                                                                        var swalInitAddStudentClass2 = swal.mixin({
                                                                                            buttonsStyling: false,
                                                                                            customClass: {
                                                                                                confirmButton: 'btn btn-primary',
                                                                                                cancelButton: 'btn btn-light',
                                                                                                denyButton: 'btn btn-light',
                                                                                                input: 'form-control'
                                                                                            }
                                                                                        });


                                                                                        $('#Add_student_course_crd<?php echo $row['course_class_id']; ?>').on('click', function() {
                                                                                            swalInitAddStudentClass2.fire({
                                                                                                title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                                                                //text: "You won't be able to revert this!",
                                                                                                icon: 'warning',
                                                                                                allowOutsideClick: false,
                                                                                                showCancelButton: true,
                                                                                                confirmButtonText: 'ใช่',
                                                                                                cancelButtonText: 'ไม่',
                                                                                                buttonsStyling: false,
                                                                                                customClass: {
                                                                                                    confirmButton: 'btn btn-success',
                                                                                                    cancelButton: 'btn btn-danger'
                                                                                                }
                                                                                            }).then(function(result) {
                                                                                                if (result.value) {

                                                                                                    var action = "add_student_course";
                                                                                                    var classroom_t_key = $("#classroom_t_key<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var student = $("#student<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var note = $("#note<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var grade_key = $("#grade_key<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var term_key = $("#term_key<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var class_id = $("#class_id<?php echo $row['course_class_id']; ?>").val();

                                                                                                    var id_key = btoa(classroom_t_key);



                                                                                                    if (action == "add_student_course") {
                                                                                                        swalInitAddStudentClass2.fire({
                                                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                            // text: "Test Set 1->" + classroom_t_key + " 2->" + student + " 3->" + note + " 4->" + grade_key + " 5->" + term_key + " 6->" + class_id,
                                                                                                            icon: 'error'
                                                                                                        });
                                                                                                    } else {

                                                                                                        if (student != "" && classroom_t_key != "" && grade_key != "" && term_key != "" && class_id != "") {
                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                                                                action: action,
                                                                                                                classroom_t_key: classroom_t_key,
                                                                                                                student: student,
                                                                                                                note: note,
                                                                                                                grade_key: grade_key,
                                                                                                                term_key: term_key,
                                                                                                                class_id: class_id

                                                                                                            }, function(process_edit) {

                                                                                                                let timerInterval;
                                                                                                                swalInitAddStudentClass2.fire({
                                                                                                                    title: 'บันทึกสำเร็จ',
                                                                                                                    //html: 'I will close in <b></b> milliseconds.',
                                                                                                                    timer: 1200,
                                                                                                                    icon: 'success',
                                                                                                                    timerProgressBar: true,
                                                                                                                    didOpen: function() {
                                                                                                                        Swal.showLoading()
                                                                                                                        timerInterval = setInterval(function() {
                                                                                                                            const content = Swal.getContent();
                                                                                                                            if (content) {
                                                                                                                                const b_course_no = content.querySelector('b_course_no')
                                                                                                                                if (b_course_no) {
                                                                                                                                    b_course_no.textContent = Swal.getTimerLeft();
                                                                                                                                } else {}
                                                                                                                            } else {}
                                                                                                                        }, 100);
                                                                                                                    },
                                                                                                                    willClose: function() {
                                                                                                                        clearInterval(timerInterval)
                                                                                                                    }
                                                                                                                }).then(function(result) {
                                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
                                                                                                                    } else {}
                                                                                                                });


                                                                                                            })
                                                                                                        } else {}

                                                                                                    }
                                                                                                } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                                                    //swalInitLogout.fire(
                                                                                                    //'Cancelled',
                                                                                                    //'Your imaginary file is safe :)',
                                                                                                    //'error'
                                                                                                    //);
                                                                                                } else {
                                                                                                    //--------------------------------------------------------------------------------------					
                                                                                                }
                                                                                            });
                                                                                        });

                                                                                    })
                                                                                </script>
                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                                                                <!-- Insert Student Course modal -->

                                                                                <div id="modal_student_course_InsertCRD<?php echo $row['course_class_id']; ?>" class="modal fade" tabindex="-1">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-success text-white">
                                                                                                <h6 class="modal-title">ฟอร์มนำเข้าข้อมูลนิสิตห้องเรียน <?php echo $classroom_name; ?></h6>
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            </div>

                                                                                            <div class="modal-body">
                                                                                                <form name="student-class-Insert" id="student-class-Insert<?php echo $row['course_class_id']; ?>" method="post" accept-charset="utf-8">

                                                                                                    <div class="row">
                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                            <fieldset class="mb-3">
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                                                                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                                                                        <select class="form-control select" name="classroom" id="classroom_CRD<?php echo $row['course_class_id']; ?>" data-placeholder="เลือกห้องเรียน...">
                                                                                                                            <option></option>
                                                                                                                            <optgroup label="ห้องเรียน">
                                                                                                                                <?php
                                                                                                                                $sql = "SELECT * FROM  tb_classroom_teacher WHERE grade_id = '{$grade_key}' AND term_id = '{$term_key}' ORDER BY classroom_name ASC";
                                                                                                                                $tt = result_array($sql);
                                                                                                                                foreach ($tt as $_tt) { ?>
                                                                                                                                    <option value="<?php echo $_tt['classroom_t_id'] ?>"><?php echo $_tt['classroom_name']; ?></option>
                                                                                                                                <?php } ?>
                                                                                                                            </optgroup>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </fieldset>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </form>
                                                                                            </div>

                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                                                                                <button type="button" name="Insert_student_class" id="Insert_student_classCRD<?php echo $row['course_class_id']; ?>" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                                                <input type="hidden" name="classroom_t_key" id="classroom_t_key_CRD<?php echo $row['course_class_id']; ?>" value="<?php echo $row['classroom_t_id']; ?>">
                                                                                                <input type="hidden" name="grade_key" id="grade_key_CRD<?php echo $row['course_class_id']; ?>" value="<?php echo $grade_key; ?>">
                                                                                                <input type="hidden" name="term_key" id="term_key_CRD<?php echo $row['course_class_id']; ?>" value="<?php echo $term_key; ?>">
                                                                                                <input type="hidden" name="class_id" id="class_id_CRD<?php echo $row['course_class_id']; ?>" value="<?php echo $row['course_class_id']; ?>">
                                                                                            </div>
                                                                                        </div>

                                                                                    

                                                                                    </div>
                                                                                </div>
                                                                                <!-- /Insert Student Course modal -->
                                                                                <!-- Insert Student Course -->

                                                                                <script>
                                                                                    $(document).ready(function() {
                                                                                        var swalInitInsertStudentCourse2 = swal.mixin({
                                                                                            buttonsStyling: false,
                                                                                            customClass: {
                                                                                                confirmButton: 'btn btn-primary',
                                                                                                cancelButton: 'btn btn-light',
                                                                                                denyButton: 'btn btn-light',
                                                                                                input: 'form-control'
                                                                                            }
                                                                                        });

                                                                                        $('#Insert_student_classCRD<?php echo $row['course_class_id']; ?>').on('click', function() {
                                                                                            swalInitInsertStudentCourse2.fire({
                                                                                                title: 'ต้องการบันทึกข้อมูลหรือไม่',
                                                                                                //text: "You won't be able to revert this!",
                                                                                                icon: 'warning',
                                                                                                allowOutsideClick: false,
                                                                                                showCancelButton: true,
                                                                                                confirmButtonText: 'ใช่',
                                                                                                cancelButtonText: 'ไม่',
                                                                                                buttonsStyling: false,
                                                                                                customClass: {
                                                                                                    confirmButton: 'btn btn-success',
                                                                                                    cancelButton: 'btn btn-danger'
                                                                                                }
                                                                                            }).then(function(result) {
                                                                                                if (result.value) {

                                                                                                    var action = "insert_student_class";
                                                                                                    var classroom_t_key = $("#classroom_t_key_CRD<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var classroom = $("#classroom_CRD<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var grade_key = $("#grade_key_CRD<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var term_key = $("#term_key_CRD<?php echo $row['course_class_id']; ?>").val();
                                                                                                    var class_id = $("#class_id_CRD<?php echo $row['course_class_id']; ?>").val();

                                                                                                    var id_key = btoa(classroom_t_key);

                                                                                                    if (action == "") {
                                                                                                        swalInitInsertStudentCourse2.fire({
                                                                                                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                            icon: 'error'
                                                                                                        });
                                                                                                    } else {

                                                                                                        if (classroom != "" && classroom_t_key != "" && grade_key != "" && term_key != "") {
                                                                                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                                                                action: action,
                                                                                                                classroom_t_key: classroom_t_key,
                                                                                                                classroom: classroom,
                                                                                                                grade_key: grade_key,
                                                                                                                term_key: term_key,
                                                                                                                class_id: class_id

                                                                                                            }, function(process_add) {

                                                                                                                var process_add = process_add;

                                                                                                                if (process_add.trim() === "no_error") {

                                                                                                                    let timerInterval;
                                                                                                                    swalInitInsertStudentCourse2.fire({
                                                                                                                        title: 'บันทึกสำเร็จ',
                                                                                                                        //html: 'I will close in <b></b> milliseconds.',
                                                                                                                        timer: 1200,
                                                                                                                        icon: 'success',
                                                                                                                        timerProgressBar: true,
                                                                                                                        didOpen: function() {
                                                                                                                            Swal.showLoading()
                                                                                                                            timerInterval = setInterval(function() {
                                                                                                                                const content = Swal.getContent();
                                                                                                                                if (content) {
                                                                                                                                    const b_classroom_data = content.querySelector('b_classroom_data')
                                                                                                                                    if (b_classroom_data) {
                                                                                                                                        b_classroom_data.textContent = Swal.getTimerLeft();
                                                                                                                                    } else {}
                                                                                                                                } else {}
                                                                                                                            }, 100);
                                                                                                                        },
                                                                                                                        willClose: function() {
                                                                                                                            clearInterval(timerInterval)
                                                                                                                        }
                                                                                                                    }).then(function(result) {
                                                                                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
                                                                                                                        } else {}
                                                                                                                    });

                                                                                                                } else if (process_add.trim() === "it_error") {
                                                                                                                    swalInitInsertStudentCourse2.fire({
                                                                                                                        title: 'ข้อมูลซ้ำ',
                                                                                                                        icon: 'error'
                                                                                                                    });
                                                                                                                } else {

                                                                                                                    swalInitInsertStudentCourse2.fire({
                                                                                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้' + process_add.trim(),
                                                                                                                        icon: 'error'
                                                                                                                    });
                                                                                                                }
                                                                                                            })
                                                                                                        } else {}
                                                                                                    }
                                                                                                } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                                                    //swalInitLogout.fire(
                                                                                                    //'Cancelled',
                                                                                                    //'Your imaginary file is safe :)',
                                                                                                    //'error'
                                                                                                    //);
                                                                                                } else {
                                                                                                    //--------------------------------------------------------------------------------------					
                                                                                                }
                                                                                            });
                                                                                        });

                                                                                    })
                                                                                </script>
                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                <!-- /dangermodal -->
                                                                                <div id="modal_class_success_Delete<?php echo $row['course_class_id']; ?>" class="modal fade" tabindex="-1">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-danger text-white">
                                                                                                <div><i class="icon-warning" style="font-size :30px;"></i></div>
                                                                                            </div>

                                                                                            <div class="modal-body">
                                                                                                <form name="classroom-data-delete" id="classroom-data-delete<?php echo $row['course_class_id']; ?>" method="post" accept-charset="utf-8">
                                                                                                    <div class="row">
                                                                                                        <div class="col-<?php echo $grid; ?>-12">
                                                                                                            <div class="row" style="text-align: center;">
                                                                                                                <div class="col-<?php echo $grid; ?>-12" style="font-size :18px">
                                                                                                                    ต้องการลบข้อมูลหลักสูตร <?php echo $row['course_class_name']; ?> หรือไม่
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <br>
                                                                                                            <div class="row" style="text-align: center;">
                                                                                                                <div class="col-<?php echo $grid; ?>-12">
                                                                                                                    <button type="button" id="delete_class_<?php echo $row['course_class_id']; ?>" name="delete_class_<?php echo $row['course_class_id']; ?>" class="btn btn-outline-success" value="<?php echo $row['course_class_id']; ?>" data-dismiss="modal">ใช่</button>
                                                                                                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                            <!--Delete-->
                                                                                                            <script>
                                                                                                                var SA_DeleteClassData<?php echo $row['course_class_id']; ?> = function() {
                                                                                                                    var _componentSA_DeleteClassData = function() {
                                                                                                                        if (typeof swal == 'undefined') {
                                                                                                                            console.warn('Warning - sweet_alert.min.js is not loaded.');
                                                                                                                            return;
                                                                                                                        }
                                                                                                                        // Defaults
                                                                                                                        var swalInitDeleteClassData = swal.mixin({
                                                                                                                            buttonsStyling: false,
                                                                                                                            customClass: {
                                                                                                                                confirmButton: 'btn btn-primary',
                                                                                                                                cancelButton: 'btn btn-light',
                                                                                                                                denyButton: 'btn btn-light',
                                                                                                                                input: 'form-control'
                                                                                                                            }
                                                                                                                        });
                                                                                                                        // Defaults End

                                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                                        $('#delete_class_<?php echo $row['course_class_id']; ?>').on('click', function() {

                                                                                                                            var action = "delete_class";
                                                                                                                            var class_id = $("#delete_class_<?php echo $row['course_class_id']; ?>").val();
                                                                                                                            var classroom_t_key = "<?php echo $classroom_t_key; ?>";

                                                                                                                            var id_key = btoa(classroom_t_key);

                                                                                                                            var table = "tb_course_class";
                                                                                                                            var ff = "course_class_id";

                                                                                                                            if (action == "") {
                                                                                                                                swalInitDeleteClassData.fire({
                                                                                                                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                                                                    icon: 'error'
                                                                                                                                });
                                                                                                                            } else {

                                                                                                                                if (class_id != "" && classroom_t_key != "") {

                                                                                                                                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                                                                                                                        action: action,
                                                                                                                                        class_id: class_id,
                                                                                                                                        classroom_t_key: classroom_t_key,
                                                                                                                                        table: table,
                                                                                                                                        ff: ff

                                                                                                                                    }, function(process_add) {
                                                                                                                                        var process_add = process_add;
                                                                                                                                        if (process_add.trim() === "no_error") {

                                                                                                                                            let timerInterval;
                                                                                                                                            swalInitDeleteClassData.fire({
                                                                                                                                                title: 'ลบสำเร็จ',
                                                                                                                                                //html: 'I will close in <b></b> milliseconds.',
                                                                                                                                                timer: 1200,
                                                                                                                                                icon: 'success',
                                                                                                                                                timerProgressBar: true,
                                                                                                                                                didOpen: function() {
                                                                                                                                                    Swal.showLoading()
                                                                                                                                                    timerInterval = setInterval(function() {
                                                                                                                                                        const content = Swal.getContent();
                                                                                                                                                        if (content) {
                                                                                                                                                            const b_classroom_data = content.querySelector('b_classroom_data')
                                                                                                                                                            if (b_classroom_data) {
                                                                                                                                                                b_classroom_data.textContent = Swal.getTimerLeft();
                                                                                                                                                            } else {}
                                                                                                                                                        } else {}
                                                                                                                                                    }, 100);
                                                                                                                                                },
                                                                                                                                                willClose: function() {
                                                                                                                                                    clearInterval(timerInterval)
                                                                                                                                                }
                                                                                                                                            }).then(function(result) {
                                                                                                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
                                                                                                                                                } else {}
                                                                                                                                            });

                                                                                                                                        } else if (process_add.trim() === "it_error") {
                                                                                                                                            swalInitDeleteClassData.fire({
                                                                                                                                                title: 'ข้อมูลซ้ำ',
                                                                                                                                                icon: 'error'
                                                                                                                                            });
                                                                                                                                        } else {

                                                                                                                                            swalInitDeleteClassData.fire({
                                                                                                                                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้' + process_add.trim(),
                                                                                                                                                icon: 'error'
                                                                                                                                            });
                                                                                                                                        }
                                                                                                                                    })
                                                                                                                                } else {}
                                                                                                                            }
                                                                                                                        });

                                                                                                                        //--------------------------------------------------------------------------------------
                                                                                                                    };
                                                                                                                    //--------------------------------------------------------------------------------------
                                                                                                                    return {
                                                                                                                        initComponentsDeleteClassData: function() {
                                                                                                                            _componentSA_DeleteClassData();
                                                                                                                        }
                                                                                                                    }
                                                                                                                }();
                                                                                                                // Initialize module
                                                                                                                // ------------------------------
                                                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                                                    SA_DeleteClassData<?php echo $row['course_class_id']; ?>.initComponentsDeleteClassData();
                                                                                                                });
                                                                                                            </script>
                                                                                                            <!--Delete End-->
                                                                                                            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                                                        </div>
                                                                                                    </div>


                                                                                                </form>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /danger modal -->
                                                                                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                                                            <?php   } ?>

                                                                        </tbody>
                                                                    </table>



                                                                </div>





                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>




                                </div>
                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    } else {
                    }

                    ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php    } elseif (($list == "form_update")) { ?>

                    <?php
                    $id = base64_decode(filter_input(INPUT_GET, 'id'));
                    if (($id != null)) {
                        $sql = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$id}'";
                        $row = row_array($sql);

                        $grade_key = $row['grade_id'];
                        $term_key = $row['term_id'];

                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                        $class_Row = result_array($class_Sql);
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) {
                                $txt_grade_name = $class_Print["grade_name"];
                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                            } else {
                                $txt_grade_name = "-";
                                $txt_grade_name_eng = "-";
                            }
                        }
                    ?>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลจัดหลักสูตร <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=<?php echo $grade_key; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มจัดหลักสูตร</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="classroom_data_list_1123_up" id="classroom_data_list_1123_up" method="post" accept-charset="utf-8">

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="classroomid" id="classroomid" data-placeholder="ห้องเรียน..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ห้องเรียน">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_classroom WHERE grade_id = '$grade_key' ORDER BY classroom_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['classroom_id'] == $row['classroom_id'] ? "selected" : ""; ?> value="<?php echo $_tst['classroom_id'] ?>"><?php echo "$_tst[classroom_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-classroomid-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำชั้น(Eng)</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher1" id="teacher1" data-placeholder="ครูประจำชั้น(Eng)..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำชั้น(Eng)">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['teacher_id'] == $row['teacher_id1'] ? "selected" : ""; ?> value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher1-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ตำแหน่งครูประจำชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="position1" id="position1" data-placeholder="ตำแหน่งครูประจำชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ตำแหน่งครูประจำชั้น">
                                                                                <option <?php echo $row['position_id1'] == 1 ? "selected" : ""; ?> value="1">English Homeroom Teacher</option>
                                                                                <option <?php echo $row['position_id1'] == 2 ? "selected" : ""; ?> value="2">Academic Affairs</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-position1-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำชั้น(Tha)</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher2" id="teacher2" data-placeholder="ครูประจำชั้น(Tha)..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำชั้น(Tha)">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['teacher_id'] == $row['teacher_id2'] ? "selected" : ""; ?> value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher2-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ฝ่ายวิชาการ</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher3" id="teacher3" data-placeholder="ฝ่ายวิชาการ..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ฝ่ายวิชาการ">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['teacher_id'] == $row['teacher_id3'] ? "selected" : ""; ?> value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher3-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <!-- <div id="test1">test1</div> -->

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Update_classroom_data" id="Update_classroom_data" class="btn btn-info" value="<?php echo $row['classroom_t_id']; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $row['classroom_t_id']; ?>">
                                                                    <input type="hidden" name="grade_key_1" id="grade_key_1" value="<?php echo $grade_key; ?>">
                                                                    <input type="hidden" name="term_key_1" id="term_key_1" value="<?php echo $term_key; ?>">
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    } ?>


                    <?php   } elseif (($list == "form_add")) {
                    @$gid = filter_input(INPUT_GET, 'gid');
                    if ((is_numeric($gid))) {

                        $list = $gid;

                        $grade_key = $list;
                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                        $class_Row = result_array($class_Sql);
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) {
                                $txt_grade_name = $class_Print["grade_name"];
                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                            } else {
                                $txt_grade_name = "-";
                                $txt_grade_name_eng = "-";
                            }
                        }
                    ?>

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มห้องเรียน <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มจัดหลักสูตร</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="classroom_data_list_1123_add" id="classroom_data_list_1123_add" method="post" accept-charset="utf-8">

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="classroomid" id="classroomid" data-placeholder="ห้องเรียน..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ห้องเรียน">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_classroom WHERE grade_id = '$grade_key' ORDER BY classroom_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option value="<?php echo $_tst['classroom_id'] ?>"><?php echo "$_tst[classroom_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-classroomid-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำชั้น(Eng)</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher1" id="teacher1" data-placeholder="ครูประจำชั้น(Eng)..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำชั้น(Eng)">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_teacher ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher1-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ตำแหน่งครูประจำชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="position1" id="position1" data-placeholder="ตำแหน่งครูประจำชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ตำแหน่งครูประจำชั้น">
                                                                                <option value="1">English Homeroom Teacher</option>
                                                                                <option value="2">Academic Affairs</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-position1-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ครูประจำชั้น(Tha)</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher2" id="teacher2" data-placeholder="ครูประจำชั้น(Tha)..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ครูประจำชั้น(Tha)">
                                                                                <?php
                                                                                $sql = "SELECT * FROM tb_teacher ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher2-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-3">ฝ่ายวิชาการ</label>
                                                                    <div class="col-<?php echo $grid; ?>-9">
                                                                        <select class="form-control select" name="teacher3" id="teacher3" data-placeholder="ฝ่ายวิชาการ..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ฝ่ายวิชาการ">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_teacher WHERE teacher_section_id = '4' ORDER BY teacher_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option value="<?php echo $_tst['teacher_id'] ?>"><?php echo "$_tst[teacher_name]"; ?>&nbsp;<?php echo "$_tst[teacher_surname]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-teacher3-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <!-- <div id="test1">test1</div> -->

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Add_classroom_data" id="Add_classroom_data" class="btn btn-info">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                                    <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">

                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                    }
                    ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php    } elseif (($list == "form_update_course")) { ?>

                    <?php
                    $id = base64_decode(filter_input(INPUT_GET, 'id'));
                    if (($id != null)) {
                        $sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$id}'";
                        $row = row_array($sql);

                        $grade_key = $row['grade_id'];
                        $class_Sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$grade_key}';";
                        $class_Row = result_array($class_Sql);
                        foreach ($class_Row as $key => $class_Print) {
                            if ((is_array($class_Print) && count($class_Print))) {
                                $txt_grade_name = $class_Print["grade_name"];
                                $txt_grade_name_eng = $class_Print["grade_name_eng"];
                            } else {
                                $txt_grade_name = "-";
                                $txt_grade_name_eng = "-";
                            }
                        }
                    ?>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลหลักสูตรหลัก <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_update_course&id=<?php echo base64_encode(@$id); ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="course_data_list_1123_up" id="course_data_list_1123_up" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ภาคเรียน</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="term" id="term" data-placeholder="เลือกภาคเรียน..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ภาคเรียน">
                                                                                <?php
                                                                                $sql = "SELECT * FROM tb_term ORDER BY year DESC , term DESC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['term_id'] == $row['term_id'] ? "selected" : ""; ?> value="<?php echo $_tst['term_id'] ?>"><?php echo "$_tst[term]/$_tst[year]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-grade-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตร</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['course_class_name']; ?>" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลหลักสูตร เช่น โครงสร้างหลักสูตร ระดับชั้นประถมศึกษาปีที่ 1</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หลักสูตรภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['course_class_name_eng']; ?>" placeholder="" required="">
                                                                            <span>กรอกข้อมูลหลักสูตรภาษาอังกฤษ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="ระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="หลักสูตรหลัก">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['grade_id'] == $row['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="add-grade-null"></div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ปีที่</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-cy-null">
                                                                            <input type="text" name="cy" id="cy" class="form-control" value="<?php echo $row['course_class_year']; ?>" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลปี เช่น 1 , 2 , 3</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">หมายเหตุ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-note-null">
                                                                            <textarea class="form-control" rows="3" name="note" id="note"><?php echo $row['memo']; ?></textarea>
                                                                            <span>กรอกข้อมูลหมายเหตุ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <!-- <div id="test1">test1</div> -->
                                                    <!-- <div id="test2">test2</div> -->

                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <button type="button" name="Update_course_class_data" id="Update_course_class_data" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="course_class_key" id="course_class_key" value="<?php echo $row['course_class_id']; ?>">
                                                                    <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $row['classroom_t_id']; ?>">
                                                                    <input type="hidden" name="type_course" id="type_course" value="1">
                                                                    <input type="hidden" name="course" id="course" value="<?php echo $row['course_id']; ?>">

                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    } ?>

                <?php   } else { ?>


                    <div class="row">

                        <?php
                            $class_Sql = "SELECT `grade_id`,`grade_name`,`grade_name_eng` 
                                        FROM `tb_grade` 
                                        ORDER BY `grade_id` ASC";
                            $class_Row = result_array($class_Sql);

                            $count_color=0;
                            $bg_color=array("bg-primary","bg-success","bg-info");

                            foreach ($class_Row as $key => $class_Print){

                                if ((is_array($class_Print) && count($class_Print))) { ?>
                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    
                                        <div class="col-<?php echo $grid; ?>-4">
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="get" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data">
                                            <button type="submit" class="card card-body <?php echo $bg_color[$count_color];?> btn-block text-white has-bg-image btn-float m-0">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="icon-graduation2 icon-3x opacity-75"></i>
                                                    </div>

                                                    <div class="media-body text-right">
                                                        <h3 class="mb-0">ระดับชั้น<?php echo $class_Print["grade_name"]; ?>&nbsp;</h3>
                                                        <span class="text-uppercase font-size-xs"><?php echo $class_Print["grade_name_eng"];?>&nbsp;</span>
                                                    </div>
                                                </div>
                                            </button>
                        <input name="modules" type="hidden" value="classroom_data">
                        <input name="list"  type="hidden" value="<?php echo $class_Print['grade_id']; ?>">
                        <input name="manage"  type="hidden" value="show" >
</form>
                                        </div>
                                        
                                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <?php
                                $count_color=$count_color+1;
                                    if(($count_color=="3")){
                                        $count_color=0;
                                    }else{}

                            }else{}
                            }
                        ?>


                    </div>


                <?php   } ?>

                    </div>

            <?php   } else {
        }
    } ?>