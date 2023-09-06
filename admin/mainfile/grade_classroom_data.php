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

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');



if ((preg_match("/grade_classroom_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) {
       
       
        $link_gd = $RunLink->Call_Link_System();
        if ((filter_input(INPUT_POST, 'grade_key') != null)) {
            $grade_key = filter_input(INPUT_POST, 'grade_key');
            // $grade_name = filter_input(INPUT_POST, 'grade_name');
            $grade_sql = "SELECT `grade_name` FROM `tb_grade` WHERE `grade_status`='1' AND `grade_id`='{$grade_key}';";
            $grade_list = result_array($grade_sql);
            foreach ($grade_list as $key => $grade_row) {
                if ((is_array($grade_row) && count($grade_row))) {
                    $grade_name = $grade_row["grade_name"];
                } else {
                    $grade_name = "-";
                }
            }
        } elseif ((filter_input(INPUT_GET, 'grade_key') != null)) {
            $grade_key = filter_input(INPUT_GET, 'grade_key');
            $grade_sql = "SELECT `grade_name` FROM `tb_grade` WHERE `grade_status`='1' AND `grade_id`='{$grade_key}';";
            $grade_list = result_array($grade_sql);
            foreach ($grade_list as $key => $grade_row) {
                if ((is_array($grade_row) && count($grade_row))) {
                    $grade_name = $grade_row["grade_name"];
                } else {
                    $grade_name = "-";
                }
            }
        } else {

            /*$grade_key = base64_decode(filter_input(INPUT_GET, 'grade_key'));

            $grade_sql = "SELECT `grade_name` FROM `tb_grade` WHERE `grade_status`='1' AND `grade_id`='{$grade_key}';";
            $grade_list = result_array($grade_sql);
            foreach ($grade_list as $key => $grade_row) {
                if ((is_array($grade_row) && count($grade_row))) {
                    $grade_name = $grade_row["grade_name"];
                } else {
                    $grade_name = "-";
                }
            }*/
        }

        if ((isset($grade_key))) { ?>
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="page-header page-header-light">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                                <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                            <a href="?modules=grade_data" class="breadcrumb-item"> จัดการระดับชั้น</a>

                            <a href="?modules=grade_classroom_data&grade_key=<?php echo $grade_key; ?>" class="breadcrumb-item"> ข้อมูลระดับชั้น</a>

                            <a href="#" class="breadcrumb-item">รายละเอียดระดับชั้น</a>

                        </div>
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>

            <div class="content">

                <?php
                if ((filter_input(INPUT_POST, 'manage') != null and filter_input(INPUT_POST, 'manage') != "")) {
                    $manage = filter_input(INPUT_POST, 'manage');
                } else {
                    $manage = filter_input(INPUT_GET, 'manage');
                }
                // $manage = filter_input(INPUT_POST, 'manage');

             
                if (($manage == "classroom_show")) {


                    if ((filter_input(INPUT_POST, 'classroom_key') != null and filter_input(INPUT_POST, 'classroom_key') != "")) {
                        $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    } else {
                        $classroom_key = base64_decode(filter_input(INPUT_GET, 'classroom_key'));
                    }

                    if ((filter_input(INPUT_POST, 'grade_key') != null and filter_input(INPUT_POST, 'grade_key') != "")) {
                        $grade_key = filter_input(INPUT_POST, 'grade_key');
                    } else {
                        $grade_key = base64_decode(filter_input(INPUT_GET, 'grade_key'));
                    }

                    if ((filter_input(INPUT_POST, 'term_key') != null and filter_input(INPUT_POST, 'term_key') != "")) {
                        $term_key = filter_input(INPUT_POST, 'term_key');
                    } else {

                        if ((isset($_GET["term_key"]))) {
                            $term_key = base64_decode(filter_input(INPUT_GET, 'term_key'));
                        } else {
                            $term_key = "";
                        }
                    }

                    // echo "5555 / ".$term_key;

                    // $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    // $grade_key = filter_input(INPUT_POST, 'grade_key');
                    // $term_key = filter_input(INPUT_GET, 'term_key');

                    if (isset($grade_key)) {
                        //$grade_key = $grade_key;
                        $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$grade_key}'";
                        $row = row_array($sql);
                        $grade = "ระดับชั้น" . $row['grade_name'];
                    } else {
                        $grade = "";
                    }

                    if ((isset($term_key))) {
                        //$term_key = $term_key;
                        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND term_id = '{$term_key}' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term = $row["term"] . "/" . $row["year"];
                        $year = $row["year"];
                    } else if (!isset($term_key)) {
                        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term_key = $row["term_id"];
                        $term = $row["term"] . "/" . $row["year"];
                        $year = $row["year"];
                    }

                    if (isset($classroom_key)) {
                        //$classroom_key = $classroom_key;
                        $sqlC = "SELECT * 
                                     FROM `tb_classroom_teacher` 
                                     WHERE `classroom_id` = '{$classroom_key}' 
                                     AND term_id = '{$term_key}' 
                                     AND grade_id = '{$grade_key}' 
                                     ORDER BY `classroom_t_id` DESC";
                        $rowC = row_array($sqlC);

                        if ((isset($rowC["classroom_t_id"]))) {
                            $classid = $rowC["classroom_t_id"];
                        } else {
                            $classid = "";
                        }

                        if ((isset($rowC["classroom_id"]))) {
                            $cid = $rowC["classroom_id"];
                        } else {
                            $cid = "";
                        }

                        if ((isset($rowC['classroom_name']))) {
                            $class_name = $rowC['classroom_name'];
                        } else {
                            $class_name = "";
                        }
                    }

                ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-8">
                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <h4>บัญชีรายชื่อนิสิต ประจำปีการศึกษา <?php echo $year; ?> ภาคเรียน <?php echo $term; ?></h4>
                            </div>

                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <h4><?php echo $grade; ?> / <?php echo $class_name; ?></h4>
                            </div>

                            <div class="btn-group col-<?php echo $grid; ?>-12">
                                <?php
                                $tid1 = $rowC['teacher_id1'];
                                $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
                                $rowT1 = row_array($sqlT1);
                                ?>
                                <h4>ครูประจำชั้น(Eng) <?php echo $rowT1['teacher_name']; ?>&nbsp;<?php echo $rowT1['teacher_surname']; ?></h4>
                                <?php if ($rowC['teacher_id2'] != "") { ?>
                                    <?php
                                    $tid2 = $rowC['teacher_id2'];
                                    $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
                                    $rowT2 = row_array($sqlT2);
                                    ?>
                                    &nbsp;<h4>ครูประจำชั้น(Thai) <?php echo $rowT2['teacher_name']; ?>&nbsp;<?php echo $rowT2['teacher_surname']; ?></h4>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-<?php echo $grid; ?>-4">
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ภาคเรียน </label>
                                    <div class="col-<?php echo $grid; ?>-8">
                                        <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                        <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $classroom_key; ?>">
                                        <input type="hidden" name="manage" id="manage" value="classroom_show">

                                        <select class="form-control select" name="term_key" id="term_key" data-placeholder="เลือกภาคเรียน..." required="required">
                                            <option></option>
                                            <optgroup label="เลือกภาคเรียน">

                                                <?php
                                                $CT_sql = "SELECT * FROM `tb_term` WHERE `grade_id` = '{$grade_key}' ORDER BY `year` DESC , `term` DESC";
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

                            <div class="btn-group">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <form>
                                            <button type="button" name="copy_grade_classroom" id="copy_grade_classroom" class="btn btn-outline-warning btn-sm" value="">สำนา</button>&nbsp;&nbsp;
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form name="form_show<?php echo $classroom_key; ?>" id="form_show<?php echo $classroom_key; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data" method="post">
                                            <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="รายการ" data-placement="bottom"><i class="icon-list-unordered"></i> รายการ</button>
                                            <input type="hidden" name="manage" id="manage" value="<?php echo $manage; ?>">
                                            <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $classroom_key; ?>">
                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                            <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                        </form>
                                    </li>
                                    <li class="nav-item">


                                        <?php
                                        $sqlCC = "SELECT * FROM tb_course_class a INNER JOIN tb_term b ON a.term_id = b.term_id  WHERE b.term_id = '{$term_key}' AND a.grade_id='{$grade_key}' AND a.classroom_t_id = '{$classid}' ORDER BY a.course_class_name ASC, a.course_class_year ASC";
                                        $rowCC = row_array($sqlCC);


                                        $ccid = $rowCC['course_class_id'];
                                        ?>

                                        <form name="form_manage_student<?php echo $classroom_key; ?>" id="form_manage_student<?php echo $classroom_key; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data" method="post">
                                            <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="รายการ" data-placement="bottom"><i class="icon-plus3"></i> จัดนิสิต</button>
                                            <input type="hidden" name="manage" id="manage" value="manage_student">

                                            <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $classroom_key; ?>">
                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                            <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                            <input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
                                            <input type="hidden" name="ccid" id="ccid" value="<?php echo $ccid; ?>">
                                            <input type="hidden" name="classid" id="classid" value="<?php echo $classid; ?>">
                                            <input type="hidden" name="class" id="class" value="<?php echo $class_name; ?>">

                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    //echo $classroom_key."/".$grade_key."/".$term_key."/".$cid."/".$classid."/".$class_name."<br>";
                    ?>


                <?php
                } else {
                ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">

                            <?php
                            //set null by beer
                            if ((!isset($grade_name))) { ?>
                                <h4>ตารางข้อมูลห้องเรียน : </h4>
                            <?php   } else { ?>
                                <h4>ตารางข้อมูลห้องเรียน : <?php echo $grade_name; ?></h4>
                            <?php   }
                            //set null by beer end
                            ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-6">
                            <div class="btn-group">
                                <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                                <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                                <button type="button" name="course_data" id="course_data" class="btn btn-outline-success btn-sm" value="">หลักสูตรหลัก</button>&nbsp;&nbsp;
                                <button type="button" name="classroom_data" id="classroom_data" class="btn btn-outline-success btn-sm" value="">จัดหลักสูตร</button>
                            </div>
                        </div>
                        <div class="col-<?php echo $grid; ?>-6"></div>
                    </div><br>

                <?php
                }
                ?>

                <?php
                if (($manage == "form_add")) { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลห้องเรียน</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <form name="butt_form" id="butt_form" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                            <button type="submit" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>"> <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                            </from>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มห้องเรียน</button>
                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                            <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
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
                                            <form name="grade_classroom_data_add" id="grade_classroom_data_add" accept-charset="utf-8" method="post">
                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ห้องเรียน <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <div id="class_name-null">
                                                                        <input type="text" name="class_name" id="class_name" class="form-control" value="" placeholder="กรอกข้อมูลห้องเรียน" required="required">
                                                                        <span>กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>
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
                                                                <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-10">
                                                                    <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                        <option></option>
                                                                        <optgroup label="ระดับชั้น">
                                                                            <?php
                                                                            $sql = "SELECT * FROM `tb_grade` ORDER BY `grade_name` ASC";
                                                                            $tf = result_array($sql);
                                                                            foreach ($tf as $_tf) {
                                                                                if ((is_array($_tf) && count($_tf))) {

                                                                                    if (($_tf["grade_id"] == $grade_key)) {
                                                                                        $gk_selected = 'selected="selected"';
                                                                                    } else {
                                                                                        $gk_selected = null;
                                                                                    }


                                                                            ?>
                                                                                    <option value="<?php echo $_tf["grade_id"]; ?>" <?php echo $gk_selected; ?>><?php echo $_tf["grade_name"]; ?></option>
                                                                            <?php   } else {
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="grade_key-null">
                                                                        <span>กรอกข้อมูลห้องเรียน</span>
                                                                    </div>
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
                                                                <button type="button" name="Add_grade_classroom_data" id="Add_grade_classroom_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                </from>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($manage == "form_up")) { ?>
                    <?php
                    $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    if ((!is_null($classroom_key))) {

                        $sql = "SELECT * FROM tb_classroom WHERE classroom_id = '{$classroom_key}'";
                        $row = row_array($sql);

                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">

                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลห้องเรียน</div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="butt_form" id="butt_form" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                                <button type="submit" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                                <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>"> <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                                </from>
                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                            <div>
                                                                <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                                    <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มห้องเรียน</button>
                                                                    <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>"> <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                                </form>
                                                            </div>
                                                        </td> -->
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="grade_classroom_data_add" id="grade_classroom_data_add" accept-charset="utf-8" method="post">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ห้องเรียน <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="class_name-null">
                                                                            <input type="text" name="class_name" id="class_name" class="form-control" value="<?php echo $row["classroom_name"]; ?>" placeholder="กรอกข้อมูลห้องเรียน" required="required">
                                                                            <span>กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">ระดับชั้น <font style="color: red;">*</font></label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <select class="form-control select" name="grade" id="grade" data-placeholder="เลือกระดับชั้น..." required="required">
                                                                            <option></option>
                                                                            <optgroup label="ระดับชั้น">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  `tb_grade` ORDER BY `grade_name` ASC";
                                                                                $tt = result_array($sql);
                                                                                ?>

                                                                                <?php foreach ($tt as $_tt) { ?>
                                                                                    <option <?php echo $row['grade_id'] == $_tt['grade_id'] ? "selected" : ""; ?> value="<?php echo $_tt['grade_id'] ?>"><?php echo "$_tt[grade_name]"; ?></option>
                                                                                <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                        <div id="grade_key-null">
                                                                            <span>กรอกข้อมูลห้องเรียน</span>
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
                                                                    <button type="button" name="Up_grade_classroom_data" id="Up_grade_classroom_data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $row["classroom_id"]; ?>">

                                                    </from>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        exit("<script>window.location='$link_gd/?modules=grade_classroom_data';</script>");
                    }
                    ?>

                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($manage == "classroom_show")) { ?>

                    <?php
                    if ((filter_input(INPUT_POST, 'classroom_key') != null)) {
                        $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    } else {
                        if ((isset($_GET["classroom_key"]))) {
                            $classroom_key = base64_decode(filter_input(INPUT_GET, 'classroom_key'));
                        } else {
                        }
                    }

                    if ((filter_input(INPUT_POST, 'grade_key') != null)) {
                        $grade_key = filter_input(INPUT_POST, 'grade_key');
                    } else {
                        if ((isset($_GET["grade_key"]))) {
                            $grade_key =  base64_decode(filter_input(INPUT_GET, 'grade_key'));
                        } else {
                        }
                    }

                    if ((filter_input(INPUT_POST, 'term_key') != null)) {
                        $term_key = filter_input(INPUT_POST, 'term_key');
                    } else {
                        if ((isset($_GET["term_key"]))) {
                            $term_key = base64_decode(filter_input(INPUT_GET, 'term_key'));
                        } else {
                        }
                    }

                    // $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    // $grade_key = filter_input(INPUT_POST, 'grade_key');
                    // $term_key = filter_input(INPUT_GET, 'term_key');

                    if (isset($grade_key)) {
                        //$grade_key = $grade_key;
                        $sql = "SELECT * FROM `tb_grade` WHERE `grade_id` = '{$grade_key}'";
                        $row = row_array($sql);
                        $grade = "ระดับชั้น".$row["grade_name"];
                    } else if (!isset($grade_key)) {
                        $grade = "";
                    }

                    if ((isset($term_key))) {
                        //$term_key = $term_key;
                        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND term_id = '{$term_key}' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term = $row["term"] . "/" . $row["year"];
                        $year = $row["year"];
                    } else if (!isset($term_key)) {
                        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                        $row = row_array($sql);
                        $term_key = $row["term_id"];
                        $term = $row["term"] . "/" . $row["year"];
                        $year = $row["year"];
                    }

                    if (isset($classroom_key)) {
                        $sqlC = "SELECT * 
                                        FROM `tb_classroom_teacher` 
                                        WHERE `classroom_id` = '{$classroom_key}' 
                                        AND term_id = '{$term_key}' 
                                        AND grade_id = '{$grade_key}' 
                                        ORDER BY `classroom_t_id` DESC";
                        //echo "$sqlC";
                        $rowC = row_array($sqlC);

                        if ((isset($rowC["classroom_t_id"]))) {
                            $classid = $rowC["classroom_t_id"];
                        } else {
                            $classid = "";
                        }

                        if ((isset($rowC["classroom_id"]))) {
                            $cid = $rowC["classroom_id"];
                        } else {
                            $cid = "";
                        }

                        if ((isset($rowC['classroom_name']))) {
                            $class_name = $rowC['classroom_name'];
                        } else {
                            $class_name = "";
                        }

                    ?>
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">

                                <div class="card border">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="datatable-button-html5-columns-STDA1">
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
                                                    $sql = "SELECT * , b.student_no AS STNO FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$classid}' AND a.term_id='{$term_key}' AND a.grade_id='{$grade_key}' AND a.classroom_detail_status='1' ORDER BY a.student_no ASC";
                                                    //echo $sql;
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

                                                            $cid = $rowC['classroom_id'];                                                 ?>

                                                            <tr>
                                                                <td align="center">
                                                                    <div><?php echo $row['STNO']; ?></div>
                                                                    <div>
                                                                        <button type="button" name="modal_student_no_Add<?php echo $row['student_id']; ?>" data-toggle="modal" data-target="#modal_student_no_Add<?php echo $row['student_id']; ?>" class="btn btn-outline-warning btn-sm" data-popup="tooltip" title="แก้ไขเลขที่" data-placement="bottom"><i class="icon-cog"></i></button>
                                                                        <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                                                        <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $cid; ?>">
                                                                        <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classid; ?>">
                                                                        <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                                        <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                                        <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                                                    </div>
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
                                                                            <div><?php //echo $row['student_email']; 
                                                                                    ?></div>
                                                                        </td> -->

                                                                <td align="center" style="width: 10%;">
                                                                    <div>
                                                                        <form name="student_update<?php echo $row['student_id']; ?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                                            <input type="hidden" name="manage" id="manage" value="form_edit">
                                                                            <input type="hidden" name="student_key" value="<?php echo $row['student_id']; ?>">
                                                                            <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $classroom_key; ?>">
                                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                                            <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                                                            <button type="submit" name="stu_<?php echo $row['student_id']; ?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom" value="<?php echo $row['student_id']; ?>"><i class="icon-pen"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <!-- Success modal -->
                                                            <div id="modal_student_no_Add<?php echo $row['student_id']; ?>" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success text-white">
                                                                            <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลเลขที่</h6>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form name="student-no-add" id="student-no-add" method="post" accept-charset="utf-8">

                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <fieldset class="mb-3">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">รหัสนิสิต </label>
                                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                                    <div id="grade_name-null">
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
                                                                                                    <div id="grade_name-null">
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
                                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">เลขที่ <font style="color: red;">*</font></label>
                                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                                    <div id="grade_name-null">
                                                                                                        <input type="number" name="stu_no" id="stu_no<?php echo $row['student_no']; ?>" class="form-control" value="<?php echo $row['student_no']; ?>" placeholder="กรอกข้อมูลเลขที่" required="required">
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
                                                                                                    <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต..." required="required">
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

                                                                                <?php $date_now = date('Y-m-d'); ?>

                                                                                <div class="row">
                                                                                    <div class="col-<?php echo $grid; ?>-12">
                                                                                        <fieldset class="mb-3">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">วันที่ลาออก</label>
                                                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                                                    <input type="text" name="dateout" id="dateout" class="form-control pickadate-accessibility rounded-right" value="<?php echo $date_now; ?>" placeholder="เลือกวันที่ลาออก">
                                                                                                    <span>เลือกข้อมูลวันที่ลาออก</span>
                                                                                                    <div id="dateout-null"></div>
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
                                                                            <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                                                            <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $cid; ?>">
                                                                            <input type="hidden" name="classroom_t_key" id="classroom_t_key" value="<?php echo $classid; ?>">
                                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                                            <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                                            <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /success modal -->

                                                            <!--แก้ไขเลขที่-->
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

                                                                    $('#Add_student_no<?php echo $row['studnet_id']; ?>').on('click', function() {
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
                                                                                var action = "student_no";
                                                                                var student_key = $("#student_key; ?>").val();
                                                                                var classroom_key = $("#classroom_key; ?>").val();
                                                                                var classroom_t_key = $("#classroom_t_key; ?>").val();
                                                                                var grade_key = $("#grade_key").val();
                                                                                var term_key = $("#term_key").val();
                                                                                var stu_no = $("#stu_no<?php echo $row['student_no']; ?>").val();
                                                                                var status = $("#status").val();
                                                                                var dateout = $("#dateout").val();


                                                                                if (action == "") {
                                                                                    swalInitAddCourseNo.fire({
                                                                                        title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                                                                        icon: 'error'
                                                                                    });
                                                                                } else {


                                                                                    if (student_key != "" && classroom_t_key != "") {
                                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data.php", {
                                                                                            action: action,
                                                                                            student_key: student_key,
                                                                                            classroom_key: classroom_key,
                                                                                            classroom_t_key: classroom_t_key,
                                                                                            grade_key: grade_key,
                                                                                            term_key: term_key,
                                                                                            stu_no: stu_no,
                                                                                            status: status,
                                                                                            dateout: dateout

                                                                                        }, function(process_edit) {

                                                                                            let timerInterval;
                                                                                            swalInitAddCourseNo.fire({
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
                                                                                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&manage=classroom_show&id=" + id_key;
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
                                                            <!--แก้ไขเลขที่ จบ-->


                                                    <?php   } else {
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        exit("<script>window.location='$link_gd/?modules=grade_classroom_data';</script>");
                    }
                    ?>
                <?php   } elseif (($manage == "manage_student")) { ?>

                    <?php
                    $classroom_key = filter_input(INPUT_POST, 'classroom_key');
                    $grade_key = filter_input(INPUT_POST, 'grade_key');
                    $term_key = filter_input(INPUT_POST, 'term_key');
                    $cid = filter_input(INPUT_POST, 'cid');
                    $ccid = filter_input(INPUT_POST, 'ccid');
                    $classid = filter_input(INPUT_POST, 'classid');
                    $class = filter_input(INPUT_POST, 'class');

                    //echo "classroom_key->".$classroom_key."grade_key->".$grade_key."term_key->".$term_key."cid->".$cid."classid->".$classid."class->".$class;

                    if (($classroom_key != null and $grade_key != null and $term_key != null and $cid != null and $classid != null and $class != null)) { ?>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">

                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline">
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <h6 class="card-title">ฟอร์มข้อมูลจัดนิสิต</h6>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_show<?php echo $classroom_key; ?>" id="form_show<?php echo $classroom_key; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data" method="post">
                                                                <button type="submit" class="btn btn-outline-success btn-sm" data-popup="tooltip" title="รายการ" data-placement="bottom"><i class="icon-list-unordered"></i> รายการ</button>
                                                                <input type="hidden" name="manage" id="manage" value="classroom_show">
                                                                <input type="hidden" name="classroom_key" id="classroom_key" value="<?php echo $classroom_key; ?>">
                                                                <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                                <input type="hidden" name="term_key" id="term_key" value="<?php echo $term_key; ?>">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-info rounded-top border-0 mb-0">
                                            <li class="nav-item"><a href="#add-student" class="nav-link rounded-left rounded-bottom-0 active" data-toggle="tab">จัดนิสิตรายบุคคล</a></li>
                                            <li class="nav-item"><a href="#add-student-all" class="nav-link" data-toggle="tab">จัดนิสิตรายห้อง</a></li>
                                        </ul>

                                        <div class="tab-content card card-body rounded-top-0 border-top-0 mb-0">

                                            <div class="tab-pane fade active show" id="add-student">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        จัดนิสิตรายบุคคล
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">นิสิต <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select-search" data-placeholder="ค้นหารายชื่อนิสิต..." name="student1" id="student1" data-fouc>
                                                                        <option value=""></option>
                                                                        <optgroup label="รายชื่อนิสิต">
                                                                            <?php
                                                                            $sql = "SELECT * 
                                                                                        FROM `tb_student` 
                                                                                        WHERE `grade_id` = '{$grade_key}' 
                                                                                        AND `student_status`='1' 
                                                                                        ORDER BY `student_name` ASC";
                                                                            $sj = result_array($sql);

                                                                            foreach ($sj as $_sj) { ?>
                                                                                <option value="<?php echo $_sj['student_id'] ?>"><?php echo $_sj['student_id']; ?>&nbsp;-&nbsp;<?php echo $_sj['student_name']; ?>&nbsp;<?php echo $_sj['student_surname']; ?></option>
                                                                                </option>
                                                                            <?php } ?>

                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="student1-null"></div>
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
                                                                    <div id="memo1-null">
                                                                        <textarea class="form-control " cols="100%" rows="5" name="memo1" id="memo1"></textarea>
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
                                                                <button type="button" name="add_class_student" id="add_class_student" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="add-student-all">

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        จัดนิสิตรายห้อง
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-<?php echo $grid; ?>-3">ห้องเรียน <font style="color: red;">*</font></label>
                                                                <div class="col-<?php echo $grid; ?>-9">
                                                                    <select class="form-control select-search" data-placeholder="ค้นหาห้องเรียน..." name="classroom2" id="classroom2" data-fouc>
                                                                        <option value=""></option>
                                                                        <optgroup label="รายการห้องเรียน">
                                                                            <?php
                                                                            $sql = "SELECT * 
                                                                                        FROM  `tb_classroom_teacher` 
                                                                                        WHERE grade_id = '{$grade_key}' 
                                                                                        AND term_id = '{$term_key}' 
                                                                                        ORDER BY classroom_name ASC";
                                                                            $tt = result_array($sql);

                                                                            foreach ($tt as $_tt) { ?>

                                                                                <option <?php echo $_tt["classroom_t_id"]; ?> value="<?php echo $_tt['classroom_t_id'] ?>"><?php echo $_tt["classroom_name"]; ?></option>

                                                                            <?php    } ?>

                                                                        </optgroup>
                                                                    </select>
                                                                    <div id="classroom2-null"></div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <fieldset class="mb-3">
                                                            <div class="form-group row">
                                                                <button type="button" name="add_classroom_student" id="add_classroom_student" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- set give run jquery-->
                        <input type="hidden" name="cid1" id="cid1" value="<?php echo $cid; ?>">
                        <input type="hidden" name="ccid1" id="ccid1" value="<?php echo $ccid; ?>">
                        <input type="hidden" name="classid1" id="classid1" value="<?php echo $classid; ?>">
                        <input type="hidden" name="class1" id="class1" value="<?php echo $class; ?>">
                        <input type="hidden" name="term_key1" id="term_key1" value="<?php echo $term_key; ?>">
                        <input type="hidden" name="grade_key1" id="grade_key1" value="<?php echo $grade_key; ?>">
                        <!-- set give run jquery end-->

                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    } ?>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } elseif (($manage == "form_edit")) { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php
                    //@$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                    $student_key = filter_input(INPUT_POST, 'student_key');
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
                                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="butt_form_up" id="butt_form_up" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                                                <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="butt_form_excel" id="butt_form_excel" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                                                <button type="submit" name="manage" id="manage" value="form_add_excel" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลนิสิต(Excel)</button>
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
                                                <form name="student_data_edit" id="student_data_edit">
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
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="student_key" id="student_key" value="<?php echo $row["student_id"]; ?>">
                                                    </from>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                        exit("<script>window.location='$link_gd/?modules=grade_classroom_data';</script>");
                    } ?>

                <?php   } else { ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                    <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">

                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลห้องเรียน</div>
                                    <div class="col-<?php echo $grid; ?>-6" align="right">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <form name="butt_form" id="butt_form" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                            <button type="submit" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>"> <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
                                                            </from>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <form name="butt_form_add" id="butt_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data">
                                                            <button type="submit" name="manage" id="manage" value="form_add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มห้องเรียน</button>
                                                            <input type="hidden" name="grade_key" id="grade_key" value="<?php echo $grade_key; ?>">
                                                            <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $grade_name; ?>">
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
                                            <div id="run_data_sd"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>

                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } ?>

            </div>

            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            </div>
<?php       } else {
            exit("<script>window.location='$link_gd/?modules=grade_classroom_data';</script>");
        }
    } else {
        //-------------------------------------------
    }
}
?>