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
if ((preg_match("/payment_show.php/", $_SERVER['PHP_SELF']))) {
    Header("Location:../index.php");
    die();
} else {
    if ((check_session("admin_status_aba") == '1') || (check_session("admin_status_aba") == '2') || (check_session("admin_status_aba") == '3') || (check_session("admin_status_aba") == '4') || (check_session("admin_status_aba") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=teach_data" class="breadcrumb-item"> เช็คการสอน</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลเช็คการสอน</a>
                        


                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">
            <?php
            $id = filter_input(INPUT_GET, 'id');
            $idd = filter_input(INPUT_GET, 'idd');
            $tid = filter_input(INPUT_GET, 'tid');
            $exam_no = filter_input(INPUT_GET, 'exam_no');
            $clid = filter_input(INPUT_GET, 'clid');
            $cid = filter_input(INPUT_GET, 'cid');
            $cl_id = filter_input(INPUT_GET, 'cl_id');
            $cdid = filter_input(INPUT_GET, 'cdid');
            $typec = filter_input(INPUT_GET, 'typec');
            $check_grade = filter_input(INPUT_GET, 'check_grade');
            $check_term = filter_input(INPUT_GET, 'check_term');
            $subject_id = filter_input(INPUT_GET, 'id');

            if ((isset($check_grade))) {
                //$check_grade=$_REQUEST['check_grade'];
                $sql = "SELECT * FROM tb_grade WHERE grade_id = '{$check_grade}'";
                $row = row_array($sql);
                $grade = "ระดับชั้น$row[grade_name]";
            } else if ((!isset($check_grad))) {
                $grade = null;
            } else {
            }

            if ((isset($check_term))) {
                //$check_term=$_REQUEST['check_term'];
                $sql = "SELECT * 
                    FROM `tb_term` 
                    WHERE `term_id` = '{$check_term}' 
                    AND `grade_id` = '{$check_grade}' 
                    ORDER BY `year` DESC , `term` DESC";
                $row = row_array($sql);
                $term = "$row[term]/$row[year]";
            } else if ((!isset($check_term))) {
                $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$check_grade}' ORDER BY year DESC , term DESC";
                $row = row_array($sql);
                $check_term = $row['term_id'];
                $term = "$row[term]/$row[year]";
            } else {}

            $sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id = '{$subject_id}'";
            $rowS = row_array($sqlS);

            ?>
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="row">
                <div class="col-<?php echo $grid; ?>-6">
                    <h4>ข้อมูลรายวิชา <small><?php echo $rowS['subject_code']; ?> - <?php echo $rowS['subject_name']; ?> ภาคเรียน <?php echo $term; ?> <?php echo $grade; ?></small></h4>
                </div>
                <div class="col-<?php echo $grid; ?>-6">

                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid; ?>-12">
                    <div class="card border border-purple">

                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลรายวิชา <?php echo $rowS['subject_code']; ?> - <?php echo $rowS['subject_name']; ?> <?php echo $grade; ?> ภาคเรียน <?php echo $term; ?></div>
                            <div class="col-<?php echo $grid; ?>-6" align="right">
                                <table>
                                    <tr>
                                        <td>
                                            <div>
                                                <form name="form_list" method="GET" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail" charset="UTF-8">
                                                    <button type="submit" class="btn btn-success btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    <input type="hidden" name="modules" value="teach_show_detail">
                                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                                    <input type="hidden" name="idd" value="<?php echo $idd;?>">
                                                    <input type="hidden" name="tid" value="<?php echo $tid;?>">
                                                    <input type="hidden" name="exam_no" value="<?php echo $exam_no;?>">
                                                    <input type="hidden" name="clid" value="<?php echo $clid;?>">
                                                    <input type="hidden" name="cid" value="<?php echo $cid;?>">
                                                    <input type="hidden" name="cl_id" value="<?php echo $cl_id;?>">
                                                    <input type="hidden" name="cdid" value="<?php echo $cdid;?>">
                                                    <input type="hidden" name="typec" value="<?php echo $typec;?>">
                                                    <input type="hidden" name="check_grade" value="<?php echo $check_grade;?>">
                                                    <input type="hidden" name="check_term" value="<?php echo $check_term;?>">
                                                </form>


                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <form action="document/Grade_Report<?php echo $check_grade; ?>.php" name="Grade_Report" target="_blank" method="POST">

                                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">
                                                    <input type="hidden" name="cdid" id="cdid" value="<?php echo $cdid; ?>">
                                                    <input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
                                                    <input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>">
                                                    <input type="hidden" name="cl_id" id="cl_id" value="<?php echo $cl_id; ?>">
                                                    <input type="hidden" name="rid" id="rid" value="<?php echo $clid; ?>">
                                                    <input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">
                                                    <input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">
                                                    <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                    <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">

                                                    <button type="submit" name="Grade_Report" class="btn btn-success btn-sm" style="align: right;"><i class="icon-list-unordered"></i> พิมพ์</button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card-body">

                            <?php
                            $sql = "SELECT * 
                FROM `tb_term` 
                WHERE `term_id` = '{$check_term}'";
                            $row = row_array($sql);
                            $term1 = $row['term'];
                            $year1 = $row['year'];
                            ?>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                    <?php

                                    $sqlT = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid}'";
                                    //echo $sqlT;
                                    $rowT = row_array($sqlT);

                                    $sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$id}' AND a.grade_id = '$check_grade' ORDER BY a.subt_id ASC , a.subject_name ASC";
                                    //echo $sqlS;
                                    $rowS = row_array($sqlS);

                                    $sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id  INNER JOIN tb_subject c ON b.subject_id = c.subject_id INNER JOIN tb_course_class_level d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  b.subject_id='{$subject_id}' AND b.course_class_detail_status='1' AND a.course_class_type='$typec' AND (d.teacher_id1 = '$tid' OR d.teacher_id2 = '$tid') GROUP BY b.subject_id";

                                    //echo $sql;
                                    $row = row_array($sql);

                                    //echo $row['course_class_id'];

                                    if ($row['teacher_id1'] == $tid && $row['teacher_id2'] != $tid) {

                                        //echo "T1";
                                        $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id1']}'";
                                        $rowT1 = row_array($sqlT1);

                                        $rate_name1 = $row['rate1'];

                                        $teacher1 = "ชื่อครูผู้สอน/Teacher $rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name1%)<br>";

                                        $teacherid1 = $rowT1['teacher_id'];

                                        if ($row['teacher_id2'] == "" || $row['teacher_id2'] == '0') {
                                            $teacher2 = "";
                                        } else if ($row['teacher_id2'] != "") {

                                            $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row['teacher_id2']}'";
                                            $rowT2 = row_array($sqlT2);

                                            $rate_name2 = $row['rate2'];

                                            $teacher2 = "ชื่อครูผู้สอน/Teacher $rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name2%)<br>";

                                            $teacherid2 = $rowT2['teacher_id'];
                                        }

                                    ?>

                                        <div>รายงานผลการเรียน (GRADE REPORT)</div>
                                        <div>ภาคเรียนที่/Semester <?php echo $term1; ?> ปีการศึกษา/Academic Year <?php echo $year1; ?></div>
                                        <div>ชื่อวิชา/Subject <?php echo $rowS['subject_name']; ?> (<?php echo $rowS['subject_name_eng']; ?>) </div>
                                        <div>รหัสวิชา/Subject Code <?php echo $rowS['subject_code']; ?> จำนวนหน่วยกิต/Subject Credits <?php echo $rowS['weight']; ?> </div>
                                        <div><?php echo $teacher1; ?></div>
                                        <!--<?php echo $teacher2; ?>-->


                                    <?php

                                    }
                                    if ($row['teacher_id1'] != $tid && $row['teacher_id2'] == $tid) {

                                        //echo "T2";

                                        if ($row['teacher_id1'] == "" || $row['teacher_id1'] == '0') {
                                            $teacher1 = "";
                                        } else if ($row['teacher_id1'] != "") {

                                            $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row["teacher_id1"]}'";
                                            $rowT1 = row_array($sqlT1);

                                            $rate_name1 = $row['rate1'];

                                            $teacher1 = "ชื่อครูผู้สอน/Teacher $rowT1[teacher_name]&nbsp;$rowT1[teacher_surname]&nbsp;(สัดส่วนคะแนนRatio&nbsp;$rate_name1%)<br>";

                                            $teacherid1 = $rowT1['teacher_id'];
                                        }

                                        $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$row["teacher_id2"]}'";
                                        $rowT2 = row_array($sqlT2);

                                        $rate_name2 = $row['rate2'];

                                        $teacher2 = "ชื่อครูผู้สอน/Teacher $rowT2[teacher_name]&nbsp;$rowT2[teacher_surname]&nbsp;(สัดส่วนคะแนน Ratio&nbsp;$rate_name2%)<br>";

                                        $teacherid2 = $rowT2['teacher_id'];
                                    ?>

                                        <div>รายงานผลการเรียน (GRADE REPORT)</div>
                                        <div>ภาคเรียนที่/Semester <?php echo $term1; ?> ปีการศึกษา/Academic Year <?php echo $year1; ?></div>
                                        <div>ชื่อวิชา/Subject <?php echo $rowS['subject_name']; ?> (<?php echo $rowS['subject_name_eng']; ?>) </div>
                                        <div>รหัสวิชา/Subject Code <?php echo $rowS['subject_code']; ?> จำนวนหน่วยกิต/Subject Credits <?php echo $rowS['weight']; ?> </div>
                                        <!--<?php echo $teacher1; ?>-->
                                        <div><?php echo $teacher2; ?></div>


                                    <?php
                                    }

                                    ?>
                                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive">


                    <?php

                    if ($row['teacher_id1'] == $tid && $row['teacher_id2'] != $tid) {

                        $check_teacher = 1;

                    ?>

                        <table class="table table-striped table-bordered table-sm" id="">
                            <tbody>
                                <tr>
                                    <td colspan="3">

                                        <?php

                                        if ($exam_no == '1') {

                                            $sqlC1 = "SELECT * , c.teacher_check AS TEACHER_CHECK, c.check_status AS CHECK_STATUS  , c.admin_check AS A_CHECK, c.admin_check_status AS A_CHECK_STATUS FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id1 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND a.classroom_t_id='$clid'";
                                        } else if ($exam_no == '2') {

                                            $sqlC1 = "SELECT * , c.teacher_check2 AS TEACHER_CHECK, c.check_status2 AS CHECK_STATUS , c.admin_check2 AS A_CHECK, c.admin_check_status2 AS A_CHECK_STATUS FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id1 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND a.classroom_t_id='$clid'";
                                        }

                                        //$sqlC1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id1 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec'";

                                        //echo $sqlC1;
                                        $listC1 = result_array($sqlC1);
                                        foreach ($listC1 as $key => $rowC1) {

                                            $course_cid = $rowC1['course_class_id'];

                                            $clid = $rowC1['classroom_t_id'];

                                            $course_class_lid = $rowC1['course_class_level_id'];
                                            $course_class_detail_id = $rowC1['course_class_detail_id'];

                                            //echo "$clid - $course_class_lid";

                                            $teacher_check = $rowC1['TEACHER_CHECK'];
                                            $check_status = $rowC1['CHECK_STATUS'];

                                            $admin_check = $rowC1['A_CHECK'];
                                            $admin_check_status = $rowC1['A_CHECK_STATUS'];

                                            if ($exam_no == '1') {

                                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                            } else if ($exam_no == '2') {

                                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                            }

                                            //echo $sqlSco;
                                            $rowSco = result_array($sqlSco);
                                        ?>

                                            <table class="table table-striped table-bordered table-sm" id="">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">
                                                            <div class="btn-group btn-group-devided" data-toggle="">

                                                                <?php

                                                                //if($row['teacher_id1'] == $tid && $row['teacher_id2'] != $tid) {	
                                                                //if($exam_no=='1') { 
                                                                //if($exam_no=='2') { 
                                                                ?>

                                                                <!--<a href="ajax/get_addscore_1.php?course_cid=<?php echo $course_cid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo $check_term; ?>&checkt=<?php echo $check_teacher; ?>" data-toggle="modal" data-id="<?php echo $course_cid; ?>" data-target="#GetAddScore1" class="btn btn-sm green">
                                <i class="fa fa-plus"></i> เพิ่มคะแนน</a>-->

                                                                <button type="button" class="btn btn-info btn-sm" data-target="#GetAddScore1" data-toggle="modal"><i class="icon-plus3"></i> เพิ่มตัวชี้วัด</button>

                                                                <!--<a class="btn green btn-sm" data-toggle="modal" href="#AddScore1">
                                <i class="fa fa-plus"></i> เพิ่มคะแนน</a>-->

                                                                <!--<a href="ajax/get_copyscore.php?id=<?php echo $id; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&clid=<?php echo $clid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>" data-toggle="modal" data-id="<?php echo $row['subject_id']; ?>" data-target="#CopyScore" class="btn btn-sm yellow-gold">
                                <i class="fa fa-copy"></i> สำเนาคะแนน</a>-->

                                                                <?php
                                                                //}
                                                                //}

                                                                ?>

                                                            </div>

                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3">

                                                            <div>Academic Affairs : </div>

                                                            <div class="btn-group btn-group-devided" data-toggle="">

                                                                <?php
                                                                if ($admin_check_status == '1') {
                                                                    $sqlAdm = "SELECT * FROM tb_admin WHERE admin_id = '{$admin_check}'";
                                                                    $rowAdm = row_array($sqlAdm);

                                                                    $admin_name = "$rowAdm[admin_name]&nbsp;&nbsp;$rowAdm[admin_lastname]";

                                                                ?>
                                                                    <a href="" class="btn btn-sm green" title="Checked">
                                                                        <i class="fa fa-check"></i> Check</a>&nbsp;

                                                                <?php
                                                                    echo "Status : <font color='green'>Checked</font> By $admin_name";
                                                                } else if ($admin_check_status == '0') {
                                                                ?>

                                                                    <a href="" class="btn btn-sm purple" title="Checked">
                                                                        <i class="fa fa-check"></i> Check</a>&nbsp;

                                                                <?php
                                                                    echo "Status : <font color='red'>Not Checked</font>";
                                                                }
                                                                ?>
                                                            </div>

                                                            <div>Teacher : </div>

                                                            <div class="btn-group btn-group-devided" data-toggle="">

                                                                <?php
                                                                if ($check_status == '1') {
                                                                    $sqlTc = "SELECT * FROM tb_teacher WHERE teacher_id = '{$teacher_check}'";
                                                                    $rowTc = row_array($sqlTc);

                                                                    $teacher_name = "$rowTc[teacher_name]&nbsp;&nbsp;$rowTc[teacher_surname]";

                                                                ?>
                                                                    <a href="process/uncheckscore2_process.php?ccid=<?php echo $course_class_lid; ?>&cdid=<?php echo $course_class_detail_id; ?>&id=<?php echo $id; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo "$check_term"; ?>" class="btn btn-sm red" onclick="return confirm('Confirm Verification!!')" title="Uncheck">
                                                                        <i class="fa fa-remove"></i> Uncheck</a>&nbsp;


                                                                    <!--<a href="" class="btn btn-sm green" title="Checked">
                                                    <i class="fa fa-check"></i> Check</a>&nbsp;-->

                                                                <?php
                                                                    echo "Status : <font color='green'>Checked</font> By $teacher_name";
                                                                } else if ($check_status == '0') {
                                                                ?>

                                                                    <!--<a href="process/checkscore1_process.php?ccid=<?php echo $course_class_lid; ?>&cdid=<?php echo $course_class_detail_id; ?>&id=<?php echo $id; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo "$check_term"; ?>" class="btn btn-sm purple" onclick="return confirm('Confirmation of verification!!')" title="Check">
                                        <i class="fa fa-check"></i> Check</a>&nbsp;-->
                                                                    <a href="" class="btn btn-sm purple" title="Checked">
                                                                        <i class="fa fa-check"></i> Check</a>&nbsp;

                                                                <?php
                                                                    echo "Status : <font color='red'>Not Checked</font>";
                                                                }
                                                                ?>
                                                            </div>

                                                            <div>After filling the scores completely , please click “check” to confirm. / เมื่อกรอกคะแนนสมบูรณ์แล้ว กรุณากด “Check” เพื่อยืนยันการส่งคะแนน</div>

                                                            </th>
                                                    </tr>
                                                </thead>
                                            </table>






                                            <table class="table table-striped table-bordered table-hover table-sm" id="">
                                                <thead>
                                                    <tr bgcolor="#dcdcdc">
                                                        <th width="50" align="center"> เลขที่ </th>
                                                        <th width="40" align="center"> รหัส </th>
                                                        <th> รายชื่อ </th>
                                                        <th width="100" align="center"> ชื่อเล่น </th>
                                                        <th width="100" align="center"> ห้องเรียน </th>
                                                        <?php foreach ($rowSco as $_rowSco) { ?>
                                                            <th width="50" align="center">
                                                                <?php echo $_rowSco['score_name']; ?>


                                                                <?php
                                                                if (($_rowSco['score_lock'] == '0') || ($_rowSco['score_lock'] == '1')) {

                                                                ?>
                                                                    <br>
                                                                    <!--<a href="ajax/get_editscore.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_id']; ?>" data-target="#EditScore" class="btn btn-sm purple" title="แก้ไขตัวชี้วัด <?php echo $_rowSco['score_name']; ?>">
                        <i class="icon-pen6"></i> </a>-->

                                                                    <div><a data-toggle="modal" data-target="#EditScore<?php echo $_rowSco['score_id']; ?>" title="ฟอร์มแก้ไขข้อมูลตัวชี้วัด" class="badge badge-purple p-1"><i class="icon-pen6"></i></a></div>

                                                                    <!--<button type="button" data-toggle="modal" data-target="#EditScore<?php //echo $_rowSco['score_id']; ?>" class="btn btn-purple btn-xs"><i class="icon-pen6"></i> </button>-->
                                                                    <!--form -->

                                                                    <?php //echo $_rowSco['score_id'];
                                                                    ?>

                                                                    <div id="EditScore<?php echo $_rowSco['score_id']; ?>" class="modal fade" tabindex="-1">

                                                                        <?php
                                                                        $id = $_rowSco['score_id'];
                                                                        //$idd = $idd;
                                                                        $tid = $_rowSco['teacher_id'];
                                                                        $sid = $subject_id;
                                                                        //$clid = $clid;
                                                                        //$exam_no = $exam_no;
                                                                        //$typec = $typec;
                                                                        //$type = $_GET['type'];
                                                                        $cclid = $course_class_lid;


                                                                        $es_sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$id}' AND a.teacher_id = '{$tid}'  AND a.subject_id = '{$sid}' AND a.classroom_t_id = '{$clid}' AND b.course_class_type='$typec'";

                                                                        //$sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$id}' AND a.classroom_t_id = '{$clid}'";
                                                                        $es_row = row_array($es_sql);

                                                                        $es_cid = $es_row['course_class_id'];
                                                                        $es_clid = $es_row['classroom_t_id'];
                                                                        $es_check_grade = $es_row['grade_id'];
                                                                        $es_check_term = $es_row['term_id'];
                                                                        $es_type = $es_row['score_type'];


                                                                        ?>
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-indigo text-white">
                                                                                    <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลตัวชี้วัด</h6>
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                </div>

                                                                                <div class="modal-body">

                                                                                    <div class="form-group">
                                                                                        <label class="col-md-4 control-label">ตัวชี้วัด</label>

                                                                                        <div class="col-md-8">
                                                                                            <input class="form-control form-control-inline" size="16" type="text" name="name" id="name<?php echo $_rowSco['score_id']; ?>" value="<?php echo $_rowSco['score_name']; ?>" required />
                                                                                            <span class="help-block"> กรอกข้อมูลตัวชี้วัด</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>&nbsp;</div>

                                                                                    <!--<div class="form-group">
                                                                <label class="col-md-4 control-label">หัวข้อการสอบภาษาอังกฤษ</label>

                                                                <div class="col-md-8">
                                                                    <input class="form-control form-control-inline" size="16" type="text" name="ename" value="<?php echo $_rowSco['score_name_eng']; ?>" />
                                                                    <span class="help-block"> กรอกข้อมูลหัวข้อการสอบภาษาอังกฤษ</span>
                                                                </div>
                                                            </div>
                                                            <div>&nbsp;</div>-->

                                                                                    <div class="form-group">
                                                                                        <label class="col-md-4 control-label">คะแนนเต็ม</label>

                                                                                        <div class="col-md-8">
                                                                                            <input class="form-control form-control-inline" size="16" type="number" name="unit" id="unit<?php echo $_rowSco['score_id']; ?>" value="<?php echo $_rowSco['score_max']; ?>" required />
                                                                                            <span class="help-block"> กรอกข้อมูลคะแนนเต็ม เช่น 10 20 </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>&nbsp;</div>

                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                                                                    <button type="button" name="but_EditScore<?php echo $_rowSco['score_id']; ?>" id="but_EditScore<?php echo $_rowSco['score_id']; ?>" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!----->
                                                                    <script>
                                                                        $(document).ready(function() {

                                                                            // Defaults
                                                                            var swalInitBut_EditScore = swal.mixin({
                                                                                buttonsStyling: false,
                                                                                customClass: {
                                                                                    confirmButton: 'btn btn-primary',
                                                                                    cancelButton: 'btn btn-light',
                                                                                    denyButton: 'btn btn-light',
                                                                                    input: 'form-control'
                                                                                }
                                                                            });
                                                                            // Defaults End

                                                                            $('#but_EditScore<?php echo $_rowSco['score_id']; ?>').on('click', function() {

                                                                                swalInitBut_EditScore.fire({
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

                                                                                        var id = "<?php echo $_rowSco['score_id']; ?>";
                                                                                        var idd = "<?php echo $idd; ?>";
                                                                                        var sid = "<?php echo $subject_id; ?>";
                                                                                        var tid = "<?php echo $id; ?>";
                                                                                        var clid = "<?php echo $clid; ?>";
                                                                                        var exam_no = "<?php echo $exam_no; ?>";
                                                                                        var cclid = "<?php echo $course_class_lid; ?>";
                                                                                        var grade = "<?php echo $es_check_grade; ?>";
                                                                                        var term = "<?php echo $es_check_term; ?>";
                                                                                        var typec = "<?php echo $typec; ?>";
                                                                                        var type = "<?php echo $es_type; ?>";
                                                                                        var name = $("#name<?php echo $_rowSco['score_id']; ?>").val();
                                                                                        var unit = $("#unit<?php echo $_rowSco['score_id']; ?>").val();

                                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/score_edit_process.php", {

                                                                                            id: id,
                                                                                            idd: idd,
                                                                                            sid: sid,
                                                                                            tid: tid,
                                                                                            clid: clid,
                                                                                            exam_no: exam_no,
                                                                                            cclid: cclid,
                                                                                            grade: grade,
                                                                                            term: term,
                                                                                            typec: typec,
                                                                                            type: type,
                                                                                            name: name,
                                                                                            unit: unit

                                                                                        }, function(process_add) {
                                                                                            var test_process = process_add;
                                                                                            if (test_process.trim() === "no_error") {
                                                                                                let timerInterval;
                                                                                                swalInitBut_EditScore.fire({
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
                                                                                                                const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                                                                                if (b_teacher_data1) {
                                                                                                                    b_teacher_data1.textContent = Swal.getTimerLeft();
                                                                                                                } else {}
                                                                                                            } else {}
                                                                                                        }, 100);
                                                                                                    },
                                                                                                    willClose: function() {
                                                                                                        clearInterval(timerInterval)
                                                                                                    }
                                                                                                }).then(function(result) {
                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade=<?php echo $grade; ?>&check_term=<?php echo $term; ?>";
                                                                                                    } else {}
                                                                                                });

                                                                                            } else if (test_process.trim() === "it_error") {
                                                                                                swalInitBut_EditScore.fire({
                                                                                                    title: 'ข้อมูลซ้ำ',
                                                                                                    icon: 'error'
                                                                                                });
                                                                                            } else {
                                                                                                swalInitBut_EditScore.fire({
                                                                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                                                                    icon: 'error'
                                                                                                });
                                                                                            }
                                                                                        })

                                                                                    } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                                    } else {}
                                                                                })

                                                                            })


                                                                        })
                                                                    </script>
                                                                    <!--form end-->

                                                                    <!--delete-->

                                                                    <!--<a href="process/delete_score1.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>" class="btn btn-sm red" onclick="return confirm('การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน ยืนยันการลบ!!')" title="ลบตัวชี้วัด">
                        <i class="icon-trash"></i> </a>	-->

                                                                    <div><a id="DeleteScores<?php echo $_rowSco['score_id']; ?>" title="ลบตัวชี้วัด" class="badge badge-danger p-1"><i class="icon-trash"></i></a></div>

                                                                    <script>
                                                                        $(document).ready(function() {

                                                                            // Defaults
                                                                            var swalInitDeleteScores = swal.mixin({
                                                                                buttonsStyling: false,
                                                                                customClass: {
                                                                                    confirmButton: 'btn btn-primary',
                                                                                    cancelButton: 'btn btn-light',
                                                                                    denyButton: 'btn btn-light',
                                                                                    input: 'form-control'
                                                                                }
                                                                            });
                                                                            // Defaults End

                                                                            $('#DeleteScores<?php echo $_rowSco['score_id']; ?>').on('click', function() {

                                                                                var id = "<?php echo $_rowSco['score_id']; ?>";
                                                                                var idd = "<?php echo $idd; ?>";
                                                                                var tid = "<?php echo $_rowSco['teacher_id']; ?>";
                                                                                var clid = "<?php echo $clid; ?>";
                                                                                var sid = "<?php echo $subject_id; ?>";
                                                                                var score_name = "<?php echo $_rowSco['score_name']; ?>";

                                                                                var grade = "<?php echo $es_check_grade; ?>";
                                                                                var term = "<?php echo $es_check_term; ?>";

                                                                                swalInitDeleteScores.fire({
                                                                                    title: 'ต้องการลบตัวชี้วัด ' + score_name + ' หรือไม่',
                                                                                    text: "การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน!!",
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


                                                                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/delete_score1.php", {
                                                                                            id: id,
                                                                                            idd: idd,
                                                                                            tid: tid,
                                                                                            clid: clid,
                                                                                            sid: sid
                                                                                        }, function(process_add) {
                                                                                            var test_process = process_add;
                                                                                            if (test_process.trim() === "no_error") {
                                                                                                let timerInterval;
                                                                                                swalInitDeleteScores.fire({
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
                                                                                                                const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                                                                                if (b_teacher_data1) {
                                                                                                                    b_teacher_data1.textContent = Swal.getTimerLeft();
                                                                                                                } else {}
                                                                                                            } else {}
                                                                                                        }, 100);
                                                                                                    },
                                                                                                    willClose: function() {
                                                                                                        clearInterval(timerInterval)
                                                                                                    }
                                                                                                }).then(function(result) {
                                                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade="+grade+"&check_term="+term;

                                                                                                    } else {}
                                                                                                });

                                                                                            } else if (test_process.trim() === "it_error") {
                                                                                                swalInitDeleteScores.fire({
                                                                                                    title: 'ข้อมูลซ้ำ',
                                                                                                    icon: 'error'
                                                                                                });
                                                                                            } else {
                                                                                                swalInitDeleteScores.fire({
                                                                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                                                                    icon: 'error'
                                                                                                });
                                                                                            }
                                                                                        })

                                                                                    } else if (result.dismiss === swal.DismissReason.cancel) {

                                                                                    } else {}
                                                                                })

                                                                            })


                                                                        })
                                                                    </script>


                                                                    <!--delete-->

                                                                    <!--<a href="ajax/get_addscore.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['course_id']; ?>" data-target="#AddScores" class="btn btn-sm blue" title="คะแนน">
                        <i class="icon-file-text2"></i> </a>-->
                                                                    <div><a data-toggle="modal" data-target="#AddScores<?php echo $_rowSco['score_id']; ?>" title="คะแนน" class="badge badge-info p-1"><i class="icon-file-text2"></i></a></div>
                                                                    <!--<button type="button" data-toggle="modal" data-target="#AddScores<?php echo $_rowSco['score_id']; ?>" class="btn btn-info btn-xs" title="คะแนน"><i class="icon-file-text2"></i> </button>-->
                                                                    <!--<a href="process/update_course_class.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $_rowSco['classroom_id']; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=1" class="btn btn-sm yellow-gold" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
                        <i class="fa fa-refresh"></i> </a>-->

                                                                    <div id="AddScores<?php echo $_rowSco['score_id']; ?>" class="modal fade" tabindex="-1">


                                                                        <?php
                                                                        $gas_type = 1;
                                                                        $gas_ts_sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$_rowSco['score_id']}' AND a.teacher_id = '{$_rowSco['teacher_id']}' AND c.subject_id = '{$subject_id}' AND b.classroom_t_id = '{$clid}' AND a.score_no='{$exam_no}' AND a.grade_id = '{$check_grade}' AND b.course_class_type='{$typec}'";
                                                                        $gas_ts_row = row_array($gas_ts_sql);

                                                                        //echo $sql;

                                                                        if ($gas_ts_row['score_name'] != "") {
                                                                            $gas_name_score = "ตัวชี้วัด $gas_ts_row[score_name]";
                                                                        } else {
                                                                        }

                                                                        //$course=$row['course_class_id'];
                                                                        $gas_coursedetail = $gas_ts_row['course_class_detail_id'];

                                                                        $gas_ts_sqlS = "SELECT * FROM tb_subject WHERE subject_id='{$subject_id}'";
                                                                        $gas_ts_rowS = row_array($gas_ts_sqlS);

                                                                        $gas_subject_name = $gas_ts_rowS['subject_name'];


                                                                        $gas_ts_sqlCla = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_status='1'";
                                                                        $gas_ts_rowCla = row_array($gas_ts_sqlCla);

                                                                        $gas_class_name = $gas_ts_rowCla['classroom_name'];

                                                                        $gas_ts_sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$_rowSco['score_id']}' AND d.course_class_detail_id='{$gas_coursedetail}' AND c.subject_id='{$subject_id}' AND a.teacher_id = '{$_rowSco['teacher_id']}' AND b.classroom_t_id = '{$clid}' AND a.score_no='{$exam_no}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='{$gas_type}' AND a.score_status='1'  AND b.course_class_type='{$typec}' AND d.course_class_level_id = '{$course_class_lid}' GROUP BY a.score_id ASC";

                                                                        //echo $sqlSco;
                                                                        $gas_ts_rowSco = row_array($gas_ts_sqlSco);
                                                                        $gas_courseclasslevel = $gas_ts_rowSco['course_class_level_id'];


                                                                        $gas_aid = check_session("admin_id_aba");
                                                                        $gas_update = date('Y-m-d H:i:s');
                                                                        ?>

                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">

                                                                                <form name="but_sap_scores<?php echo $_rowSco['score_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/scores_add_process.php" method="post" onsubmit="return form_scores<?php echo $gas_ts_rowSco['score_id']; ?>()">
                                                                                    <div class="modal-header bg-info text-white">
                                                                                        <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลคะแนน&nbsp;วิชา&nbsp;<?php echo $gas_subject_name; ?>&nbsp;(<?php echo  $gas_name_score; ?>)</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>

                                                                                    <div class="modal-body">

                                                                                        <input type="hidden" name="sid" id="sid" value="<?php echo $subject_id; ?>">
                                                                                        <input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">
                                                                                        <input type="hidden" name="tid" id="tid" value="<?php echo $gas_ts_rowSco['teacher_id']; ?>">

                                                                                        <input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
                                                                                        <input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">
                                                                                        <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                                                                                        <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
                                                                                        <input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">
                                                                                        <input type="hidden" name="type" id="type" value="<?php echo $gas_type; ?>">
                                                                                        <input type="hidden" name="coursedetail" id="coursedetail" value="<?php echo $gas_coursedetail; ?>">
                                                                                        <input type="hidden" name="courseclasslevel" id="courseclasslevel" value="<?php echo $gas_courseclasslevel; ?>">

                                                                                        <div class="form-group">

                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <tr bgcolor="#dcdcdc">
                                                                                                        <th align="center"> เลขที่ </th>
                                                                                                        <th align="center"> รหัส </th>
                                                                                                        <th align="center"> รายชื่อ </th>
                                                                                                        <th align="center"> ชื่อเล่น </th>
                                                                                                        <th align="center"><?php echo $gas_ts_rowSco['score_name']; ?></th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th colspan="4">&nbsp;</th>
                                                                                                        <th align="center">
                                                                                                            <?php
                                                                                                            echo $gas_ts_rowSco['score_max'];
                                                                                                            $max = $gas_ts_rowSco['score_max'];
                                                                                                            ?>
                                                                                                        </th>
                                                            </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                                    $gas_sum_s = 0;

                                                                    $gas_sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE (c.teacher_id1='{$gas_ts_rowSco['teacher_id']}' OR c.teacher_id2='{$gas_ts_rowSco['teacher_id']}') AND a.classroom_t_id='{$clid}' AND b.course_class_detail_id='{$gas_coursedetail}' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '{$gas_courseclasslevel}'";

                                                                    //echo $sql1;
                                                                    $gas_list1 = result_array($gas_sql1);
                                                                    foreach ($gas_list1 as $key => $gas_row1) {

                                                                        $gas_cc_id = $gas_row1['course_class_id'];
                                                                        $gas_cd_id = $gas_row1['course_class_detail_id'];
                                                                        $gas_cl_id = $gas_row1['course_class_level_id'];

                                                                        $gas1_sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$gas_cc_id}' AND b.course_class_detail_id = '{$gas_cd_id}' AND b.course_class_level_id = '{$gas_cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') AND c.student_status = '1' ORDER BY c.student_class ASC , c.student_no ASC";

                                                                        //echo $sql;
                                                                        $gas1_list = result_array($gas1_sql);
                                                    ?>
                                                        <?php foreach ($gas1_list as $key => $gas1_row) { ?>
                                                            <?php
                                                                            if ($gas1_row['gender'] == 1) {
                                                                                $gas_gender = "ชาย";
                                                                            } else if ($gas1_row['gender'] == 2) {
                                                                                $gas_gender = "หญิง";
                                                                            }

                                                                            $gas_stuid = $gas1_row['student_id'];

                                                                            $gas_course_s_id = $gas1_row['course_s_id'];
                                                            ?>




                                                            <tr>
                                                                <td align="center"><?php echo $gas1_row['student_no']; ?></td>
                                                                <td align="center"><?php echo $gas1_row['student_id']; ?></td>
                                                                <td align="left"><?php echo  $gas1_row['student_name']; ?>&nbsp;<?php echo  $gas1_row['student_surname']; ?></td>
                                                                <td align="left"><?php echo $gas1_row['nickname']; ?></td>

                                                                <?php

                                                                            $gas1_sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$gas_ts_rowSco['score_id']}' AND d.course_class_detail_id='{$gas_coursedetail}' AND a.subject_id = '{$sid}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='{$gas_type}' AND a.score_status='1' AND b.course_class_type='{$typec}' GROUP BY a.score_id ASC";

                                                                            //echo "$sqlSco<br>";
                                                                            $gas1_sqlSco = result_array($gas1_sqlSco);

                                                                            foreach ($gas1_sqlSco as $gas1_sqlSco) {

                                                                                $gas1_scoreid =  $gas1_sqlSco['score_id'];
                                                                                $gas1_coursedetail =  $gas1_sqlSco['course_class_detail_id'];

                                                                                $gas1_sqlScor = "SELECT * , COUNT(a.student_id) AS STUID FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$gas1_scoreid}' AND a.course_class_detail_id='{$gas1_coursedetail}' AND a.course_class_level_id='{$gas_courseclasslevel}' AND a.student_id = '{$gas_stuid}' AND a.score_type='{$gas_type}' AND a.score_detail_status='1'";

                                                                                $gas1_rowScorC = row_array($gas1_sqlScor);

                                                                                $STUID = $gas1_rowScorC['STUID'];

                                                                                if ($STUID == 0) {

                                                                                    $gas1_data = array(
                                                                                        "score_id" => $gas1_scoreid,
                                                                                        "course_s_id" => $gas_course_s_id,
                                                                                        "student_id" => $gas_stuid,
                                                                                        "course_class_detail_id" => $gas1_coursedetail,
                                                                                        "course_class_level_id" => $gas_courseclasslevel,
                                                                                        "score1" => "0",
                                                                                        "score2" => "0",
                                                                                        "score" => 0,
                                                                                        "result" => "0",
                                                                                        "score_type" => $gas_type,
                                                                                        "score_detail_status" => 1,
                                                                                        "admin_id" => $gas_aid,
                                                                                        "admin_update" => $gas_update
                                                                                    );

                                                                                    insert("tb_score_detail", $gas1_data);
                                                                                }

                                                                                //echo $sqlScor;
                                                                                $gas1_rowScor = row_array($gas1_sqlScor);
                                                                            }
                                                                ?>

                                                                <td>
                                                                    <input id="<?php echo $gas1_rowScor['score_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $gas1_rowScor['score']; ?>" min="0" max="<?php echo $max; ?>">
                                                                    <input type="hidden" name="id[]" id="id" value="<?php echo $gas1_rowScor['score_detail_id']; ?>">
                                                                </td>
                                                            </tr>

                                                    <?php
                                                                        }
                                                                    }
                                                    ?>

                                                </tbody>
                                            </table>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
            </form>
        </div>
        </div>
        </div>


    <?php } ?>

    </th>

    <!--js code -->



    <!--js code-->




<?php } ?>
<th width="50" align="center"> รวม </th>
<th width="50" align="center"> คะแนนเก็บ </th>
<th width="50" align="center"> คะแนนสอบ
    <br>
    <?php

                                            if ($exam_no == '1') {

                                                $sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                            } else if ($exam_no == '2') {

                                                $sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                            }

                                            //echo $sqlSco3;
                                            $_rowSco3 = row_array($sqlSco3);
    ?>

    <?php
                                            if (($_rowSco['score_lock'] == '0') || ($_rowSco['score_lock'] == '1')) {
    ?>

        <!--<a href="ajax/get_editscore.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&type=2" data-toggle="modal" data-id="<?php echo $_rowSco3['score_id']; ?>" data-target="#AddScores" class="btn btn-sm purple" title="คะแนนสอบ">
                        <i class="icon-pen6"></i> </a>-->

        <div><a data-toggle="modal" data-target="#get_edit_score_test" class="badge badge-purple p-1" title="ตัวชี้วัดคะแนนสอบ"><i class="icon-pen6"></i></a></div>
        <!--<button type="button" data-toggle="modal" data-target="#get_edit_score_test" class="btn btn-purple btn-xs" title="คะแนนสอบ"><i class="icon-pen6"></i> </button>-->

        <!---->
        <div id="get_edit_score_test" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-purple text-white">
                        <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลตัวชี้วัด</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-<?php echo $grid; ?>-4 control-label">ตัวชี้วัด</label>
                            <div class="col-<?php echo $grid; ?>-8">
                                <input class="form-control form-control-inline" size="16" type="text" name="score_test_name" id="score_test_name" value="<?php echo $_rowSco3['score_name']; ?>" required />
                                <span class="help-block"> กรอกข้อมูลตัวชี้วัด</span>
                            </div>
                        </div>
                        <div>&nbsp;</div>

                        <div class="form-group">
                            <label class="col-<?php echo $grid; ?>-4 control-label">คะแนนเต็ม</label>
                            <div class="col-<?php echo $grid; ?>-8">
                                <input class="form-control form-control-inline" size="16" type="number" name="score_test_unit" id="score_test_unit" value="<?php echo $_rowSco3['score_max']; ?>" required />
                                <span class="help-block"> กรอกข้อมูลคะแนนเต็ม เช่น 10 20 </span>
                            </div>
                        </div>
                        <div>&nbsp;</div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" name="but_get_edit_score_test" id="but_get_edit_score_test" class="btn btn-success">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                // Defaults
                var swalInitGetEditScoreTest = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
                // Defaults End

                $('#but_get_edit_score_test').on('click', function() {

                    var id = "<?php echo $_rowSco3['score_id']; ?>";
                    var idd = "<?php echo $idd; ?>";
                    var tid = "<?php echo $_rowSco3['teacher_id']; ?>";
                    var clid = "<?php echo $clid; ?>";
                    var sid = "<?php echo $subject_id; ?>";
                    var exam_no = "<?php echo $exam_no; ?>";
                    var cclid = "<?php echo $course_class_lid; ?>";
                    var grade = "<?php echo $row["grade_id"]; ?>";
                    var term = "<?php echo $row["term_id"]; ?>";
                    var typec = "<?php echo $typec; ?>";
                    var type = "<?php $row['score_type']; ?>";
                    var name = $("#score_test_name").val();
                    var unit = $("#score_test_unit").val();

                    swalInitGetEditScoreTest.fire({
                        title: 'ต้องการบันทึกข้อมูลหรือไม่',
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


                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/score_edit_process.php", {
                                id: id,
                                idd: idd,
                                tid: tid,
                                clid: clid,
                                sid: sid,
                                exam_no: exam_no,
                                cclid: cclid,
                                grade: grade,
                                term: term,
                                typec: typec,
                                type: type,
                                name: name,
                                unit: unit
                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitDeleteScores.fire({
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
                                                    const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                    if (b_teacher_data1) {
                                                        b_teacher_data1.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade="+grade+"&check_term="+term;

                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitGetEditScoreTest.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitGetEditScoreTest.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                        icon: 'error'
                                    });
                                }
                            })

                        } else if (result.dismiss === swal.DismissReason.cancel) {

                        } else {}
                    })

                })


            })
        </script>

        <!--delete_score2--->


        <!--<a href="process/delete_score2.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>" class="btn btn-sm red" onclick="return confirm('การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน ยืนยันการลบ!!')" title="ลบตัวชี้วัด">
                        <i class="icon-trash"></i> </a>-->



        <div><a id="DeleteScores2<?php echo $_rowSco3['score_id']; ?>" class="badge badge-danger p-1" title="ลบตัวชี้วัดคะแนนสอบ"><i class="icon-trash"></i></a></div>
        <!--<button type="button" id="DeleteScores2<?php echo $_rowSco3['score_id']; ?>" class="btn btn-danger btn-xs" title="ลบตัวชี้วัดคะแนนสอบ"><i class="icon-trash"></i> </button>-->

        <script>
            $(document).ready(function() {

                // Defaults
                var swalInitDeleteScores = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
                });
                // Defaults End

                $('#DeleteScores2<?php echo $_rowSco3['score_id']; ?>').on('click', function() {

                    var id = "<?php echo $_rowSco3['score_id']; ?>";
                    var idd = "<?php echo $idd; ?>";
                    var tid = "<?php echo $_rowSco3['teacher_id']; ?>";
                    var clid = "<?php echo $clid; ?>";
                    var sid = "<?php echo $subject_id; ?>";
                    var score_name = "<?php echo $_rowSco3['score_name']; ?>";

                    var grade = "<?php echo $row["grade_id"]; ?>";
                    var term = "<?php echo $row["term_id"]; ?>";
                    
                    swalInitDeleteScores.fire({
                        title: 'ต้องการลบตัวชี้วัด ' + score_name + ' หรือไม่',
                        text: "การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน!!",
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


                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/delete_score2.php", {
                                id: id,
                                idd: idd,
                                tid: tid,
                                clid: clid,
                                sid: sid
                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitDeleteScores.fire({
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
                                                    const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                    if (b_teacher_data1) {
                                                        b_teacher_data1.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade="+grade+"&check_term="+term;

                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitDeleteScores.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitDeleteScores.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                        icon: 'error'
                                    });
                                }
                            })

                        } else if (result.dismiss === swal.DismissReason.cancel) {

                        } else {}
                    })

                })


            })
        </script>







        <!--<a href="ajax/get_addscore.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&typec=<?php echo $typec; ?>&type=2" data-toggle="modal" data-id="<?php echo $_rowSco3['score_id']; ?>" data-target="#AddScores" class="btn btn-sm blue" title="คะแนนสอบ">
                        <i class="icon-file-text2"></i> </a>-->

        <div><a data-toggle="modal" data-target="#AddScoresTest<?php echo $_rowSco3['score_id']; ?>" class="badge badge-info p-1" title="คะแนนสอบ"><i class="icon-file-text2"></i></a></div>
        <!--<button type="button" data-toggle="modal" data-target="#AddScoresTest<?php echo $_rowSco3['score_id']; ?>" class="btn btn-info btn-xs" title="คะแนนสอบ"><i class="icon-file-text2"></i> </button>-->

        <!---->

        <div id="AddScoresTest<?php echo $_rowSco3['score_id']; ?>" class="modal fade" tabindex="-1">


            <?php
                                                $gas_type = 2;
                                                $gas_ts_sql = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id INNER JOIN tb_course_class_detail c ON b.course_class_id=c.course_class_id WHERE a.score_id = '{$_rowSco3['score_id']}' AND a.teacher_id = '{$_rowSco3['teacher_id']}' AND c.subject_id = '{$subject_id}' AND b.classroom_t_id = '{$clid}' AND a.score_no='{$exam_no}' AND a.grade_id = '{$check_grade}' AND b.course_class_type='{$typec}'";
                                                $gas_ts_row = row_array($gas_ts_sql);

                                                //echo $sql;

                                                if ($gas_ts_row['score_name'] != "") {
                                                    $gas_name_score = "ตัวชี้วัด $gas_ts_row[score_name]";
                                                } else {
                                                }

                                                //$course=$row['course_class_id'];
                                                $gas_coursedetail = $gas_ts_row['course_class_detail_id'];

                                                $gas_ts_sqlS = "SELECT * FROM tb_subject WHERE subject_id='{$subject_id}'";
                                                $gas_ts_rowS = row_array($gas_ts_sqlS);

                                                $gas_subject_name = $gas_ts_rowS['subject_name'];


                                                $gas_ts_sqlCla = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id WHERE a.classroom_t_id='{$clid}' AND a.classroom_status='1'";
                                                $gas_ts_rowCla = row_array($gas_ts_sqlCla);

                                                $gas_class_name = $gas_ts_rowCla['classroom_name'];

                                                $gas_ts_sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$_rowSco3['score_id']}' AND d.course_class_detail_id='{$gas_coursedetail}' AND c.subject_id='{$subject_id}' AND a.teacher_id = '{$_rowSco3['teacher_id']}' AND b.classroom_t_id = '{$clid}' AND a.score_no='{$exam_no}' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='{$gas_type}' AND a.score_status='1'  AND b.course_class_type='{$typec}' AND d.course_class_level_id = '{$course_class_lid}' GROUP BY a.score_id ASC";

                                                //echo $sqlSco;
                                                $gas_ts_rowSco = row_array($gas_ts_sqlSco);
                                                $gas_courseclasslevel = $gas_ts_rowSco['course_class_level_id'];


                                                $gas_aid = check_session("admin_id_aba");
                                                $gas_update = date('Y-m-d H:i:s');
            ?>

            <div class="modal-dialog">
                <div class="modal-content">

                    <form name="but_sap_scores<?php echo $_rowSco3['score_id']; ?>" action="<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/scores_add_process.php" method="post">
                        <div class="modal-header bg-info text-white">
                            <h6 class="modal-title">ฟอร์มแก้ไขข้อมูลคะแนน&nbsp;วิชา&nbsp;<?php echo $gas_subject_name; ?>&nbsp;(<?php echo  $gas_name_score; ?>)</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">

                            <input type="hidden" name="sid" id="sid" value="<?php echo $subject_id; ?>">
                            <input type="hidden" name="idd" id="idd" value="<?php echo $idd; ?>">
                            <input type="hidden" name="tid" id="tid" value="<?php echo $gas_ts_rowSco['teacher_id']; ?>">

                            <input type="hidden" name="clid" id="clid" value="<?php echo $clid; ?>">
                            <input type="hidden" name="exam_no" id="exam_no" value="<?php echo $exam_no; ?>">
                            <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $check_grade; ?>">
                            <input type="hidden" name="check_term" id="check_term" value="<?php echo $check_term; ?>">
                            <input type="hidden" name="typec" id="typec" value="<?php echo $typec; ?>">
                            <input type="hidden" name="type" id="type" value="<?php echo $gas_type; ?>">
                            <input type="hidden" name="coursedetail" id="coursedetail" value="<?php echo $gas_coursedetail; ?>">
                            <input type="hidden" name="courseclasslevel" id="courseclasslevel" value="<?php echo $gas_courseclasslevel; ?>">

                            <div class="form-group">



                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr bgcolor="#dcdcdc">
                                            <th align="center"> เลขที่ </th>
                                            <th align="center"> รหัส </th>
                                            <th align="center"> รายชื่อ </th>
                                            <th align="center"> ชื่อเล่น </th>
                                            <th align="center"><?php echo $gas_ts_rowSco['score_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">&nbsp;</th>
                                            <th align="center">
                                                <?php
                                                echo $gas_ts_rowSco['score_max'];
                                                $max = $gas_ts_rowSco['score_max'];
                                                ?>
                                            </th>
</th>
</tr>
</thead>
<tbody>
    <?php
                                                $gas_sum_s = 0;

                                                $gas_sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE (c.teacher_id1='{$gas_ts_rowSco['teacher_id']}' OR c.teacher_id2='{$gas_ts_rowSco['teacher_id']}') AND a.classroom_t_id='{$clid}' AND b.course_class_detail_id='{$gas_coursedetail}' AND b.subject_id = '{$sid}' AND a.course_class_type='$typec' AND c.course_class_level_id = '{$gas_courseclasslevel}'";

                                                //echo $sql1;
                                                $gas_list1 = result_array($gas_sql1);
                                                foreach ($gas_list1 as $key => $gas_row1) {

                                                    $gas_cc_id = $gas_row1['course_class_id'];
                                                    $gas_cd_id = $gas_row1['course_class_detail_id'];
                                                    $gas_cl_id = $gas_row1['course_class_level_id'];

                                                    $gas1_sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id WHERE a.course_class_id = '{$gas_cc_id}' AND b.course_class_detail_id = '{$gas_cd_id}' AND b.course_class_level_id = '{$gas_cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') AND c.student_status = '1' ORDER BY c.student_class ASC , c.student_no ASC";

                                                    //echo $sql;
                                                    $gas1_list = result_array($gas1_sql);
    ?>
        <?php foreach ($gas1_list as $key => $gas1_row) { ?>
            <?php
                                                        if ($gas1_row['gender'] == 1) {
                                                            $gas_gender = "ชาย";
                                                        } else if ($gas1_row['gender'] == 2) {
                                                            $gas_gender = "หญิง";
                                                        }

                                                        $gas_stuid = $gas1_row['student_id'];

                                                        $gas_course_s_id = $gas1_row['course_s_id'];
            ?>




            <tr>
                <td align="center"><?php echo $gas1_row['student_no']; ?></td>
                <td align="center"><?php echo $gas1_row['student_id']; ?></td>
                <td align="left"><?php echo  $gas1_row['student_name']; ?>&nbsp;<?php echo  $gas1_row['student_surname']; ?></td>
                <td align="left"><?php echo $gas1_row['nickname']; ?></td>

                <?php

                                                        $gas1_sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_course_class b ON a.classroom_t_id=b.classroom_t_id  INNER JOIN tb_score_detail d ON a.score_id=d.score_id INNER JOIN tb_course_class_detail c ON d.course_class_detail_id=c.course_class_detail_id WHERE a.score_id = '{$gas_ts_rowSco['score_id']}' AND d.course_class_detail_id='{$gas_coursedetail}' AND a.subject_id = '{$sid}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id = '{$clid}' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND  a.score_type='{$gas_type}' AND a.score_status='1' AND b.course_class_type='{$typec}' GROUP BY a.score_id ASC";

                                                        //echo "$sqlSco<br>";
                                                        $gas1_sqlSco = result_array($gas1_sqlSco);

                                                        foreach ($gas1_sqlSco as $gas1_sqlSco) {

                                                            $gas1_scoreid =  $gas1_sqlSco['score_id'];
                                                            $gas1_coursedetail =  $gas1_sqlSco['course_class_detail_id'];

                                                            $gas1_sqlScor = "SELECT * , COUNT(a.student_id) AS STUID FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$gas1_scoreid}' AND a.course_class_detail_id='{$gas1_coursedetail}' AND a.course_class_level_id='{$gas_courseclasslevel}' AND a.student_id = '{$gas_stuid}' AND a.score_type='{$gas_type}' AND a.score_detail_status='1'";

                                                            $gas1_rowScorC = row_array($gas1_sqlScor);

                                                            $STUID = $gas1_rowScorC['STUID'];

                                                            if ($STUID == 0) {

                                                                $gas1_data = array(
                                                                    "score_id" => $gas1_scoreid,
                                                                    "course_s_id" => $gas_course_s_id,
                                                                    "student_id" => $gas_stuid,
                                                                    "course_class_detail_id" => $gas1_coursedetail,
                                                                    "course_class_level_id" => $gas_courseclasslevel,
                                                                    "score1" => "0",
                                                                    "score2" => "0",
                                                                    "score" => 0,
                                                                    "result" => "0",
                                                                    "score_type" => $gas_type,
                                                                    "score_detail_status" => 1,
                                                                    "admin_id" => $gas_aid,
                                                                    "admin_update" => $gas_update
                                                                );

                                                                insert("tb_score_detail", $gas1_data);
                                                            }

                                                            //echo $sqlScor;
                                                            $gas1_rowScor = row_array($gas1_sqlScor);
                                                        }
                ?>

                <td>
                    <input id="<?php echo $gas1_rowScor['score_detail_id']; ?>" name="score[]" type="number" class="form-control input-xsmall" value="<?php echo $gas1_rowScor['score']; ?>" min="0" max="<?php echo $max; ?>">
                    <input type="hidden" name="id[]" id="id" value="<?php echo $gas1_rowScor['score_detail_id']; ?>">
                </td>
            </tr>

    <?php
                                                    }
                                                }
    ?>

</tbody>
</table>

</div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
    <button type="submit" class="btn btn-success">บันทึก</button>
</div>
</form>
</div>
</div>
</div>

<!---->
<!--<a href="process/update_course_class.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $_rowSco3['classroom_id']; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=2" class="btn btn-sm yellow-gold" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
                        <i class="fa fa-refresh"></i> </a>-->



<?php if (check_session("admin_username") == "snaper") { ?>

    <a href="process/update_courses_class.php?cid=<?php echo $course; ?>&cdid=<?php echo $coursedetail; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $clid; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=2" class="btn btn-sm red" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
        <i class="fa fa-plus"></i> </a>

<?php } ?>

<?php } ?>
</th>
<th width="50" align="center"> รวม </th>
<th width="50" align="center"> เกรด </th>
</tr>
<tr>
    <th colspan="5">&nbsp;</th>
    <?php
                                            $max = 0;
                                            foreach ($rowSco as $_rowSco) {
    ?>
        <th align="center" width="50" bgcolor="#e2e2e2">
            <?php echo $_rowSco['score_max']; ?>
        </th>

    <?php

                                                $max = $max + $_rowSco['score_max'];
                                            }

                                            $score1_1 = $rowC1['score1_1'];
                                            $score1_2 = $rowC1['score1_2'];

                                            $max_s = $max;

    ?>

    <th width="50" align="center" bgcolor="#b5bffd"><?php echo $max_s; ?></a></th>
    <th width="50" align="center" bgcolor="#dab0fb"><?php echo $score1_1; ?></a></th>
    <th width="50" align="center" bgcolor="#fcbbfb"><?php echo $score1_2; ?></a></th>
    <?php

                                            $sum_score = $score1_1 + $score1_2;

                                            $scoreid = $rowSco1['score_id'];

    ?>

    <th width="50" align="center" bgcolor="#fae59e"><?php echo $sum_score; ?></a></th>
    <th width="50">&nbsp;</a></th>
</tr>
</thead>
<tbody>
    <?php
                                            $sum_s = 0;

                                            $sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id1 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND c.course_class_level_id = '$course_class_lid'";

                                            //echo "$sql1 <br>";
                                            $list1 = result_array($sql1);
                                            foreach ($list1 as $key => $row1) {

                                                $cc_id = $row1['course_class_id'];
                                                $cd_id = $row1['course_class_detail_id'];
                                                $cl_id = $row1['course_class_level_id'];

                                                $sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '{$cc_id}' AND  a.course_s_status = '1' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') AND c.student_status='1' AND d.subject_id = '{$subject_id}' ORDER BY c.student_class ASC , c.student_no ASC";

                                                //echo $sql;
                                                $list = result_array($sql);
    ?>
        <?php foreach ($list as $key => $row) { ?>
            <?php
                                                    if ($row['gender'] == '1') {
                                                        $gender = "ชาย";
                                                    } else if ($row['gender'] == '2') {
                                                        $gender = "หญิง";
                                                    }

                                                    $stuid = $row['student_id'];

                                                    $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
                                                    $rowC = row_array($sqlC);
            ?>

            <tr>
                <td align="center"><?php echo $row['student_no']; ?></td>
                <td align="center"><?php echo $row['student_id']; ?></td>
                <td align="left"><?php echo $row['student_name']; ?>&nbsp;<?php echo $row['student_surname']; ?></td>
                <td align="left"><?php echo $row['nickname']; ?></td>
                <td align="left"><?php echo $rowC['classroom_name']; ?></td>

                <?php

                                                    if ($exam_no == '1') {

                                                        $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";
                                                    } else if ($exam_no == '2') {

                                                        $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";
                                                    }

                                                    //echo "$sqlSco<br>";
                                                    $sqlSco = result_array($sqlSco);

                                                    foreach ($sqlSco as $_sqlSco) {

                                                        $scoreid =  $_sqlSco['score_id'];

                                                        $sqlScor = "SELECT *  , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='1' AND a.score_detail_status='1'";

                                                        //echo "$sqlScor<br>";
                                                        $_rowScor = row_array($sqlScor);

                ?>
                    <td align="center">
                        <div><?php echo $_rowScor['score']; ?><div>
                        <!--<input id="<?php echo $_rowScor['score_detail_id']; ?>" name="qty" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor['score']; ?>" min="0" max="<?php echo $max; ?>">-->
                        <!--<a href="ajax/get_commentscore_1.php?id=<?php echo $scoreid; ?>&dsid=<?php echo $_rowScor['score_detail_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_detail_id']; ?>" data-target="#CommentScore1" class="btn btn-sm" title="<?php echo $_rowScor['MEMO']; ?>">
                        <i class="icon-pen6"></i> </a>-->
                        <div><a data-toggle="modal" data-target="#CommentscoreTest1<?php echo $_rowScor['score_id']; ?>" class="badge badge-purple p-1" title="หมายเหตุข้อมูลคะแนน"><i class="icon-pen6"></i></a></div>
                        <!--<button type="button" data-toggle="modal" data-target="#CommentscoreTest1<?php //echo $_rowScor['score_id']; ?>" class="btn btn-purple btn-xs"><i class="icon-pen6"></i> </button>-->

                        <!---->
                        <div id="CommentscoreTest1<?php echo $_rowScor['score_id']; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-indigo text-white">
                                        <h6 class="modal-title">ฟอร์มหมายเหตุข้อมูลคะแนน</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">หมายเหตุ</label>

                                            <div class="col-md-8">
                                                <input class="form-control form-control-inline" size="16" type="text" name="memo" id="cst_memo_<?php echo $_rowScor['score_id']; ?>" value="<?php echo $memo; ?>" />
                                                <!--<input class="form-control form-control-inline" size="16" type="text" name="memo1" value="Rescore" Disabled/>
																<input type="hidden" class="form-control form-control-inline" size="16" type="text" name="memo" value="Rescore" />-->
                                                <span class="help-block"> กรอกข้อมูลหมายเหตุ</span>
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="button" name="but_memo" id="but_memo_<?php echo $_rowScor['score_id']; ?>" class="btn btn-indigo">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {

                                // Defaults
                                var swalInitGetEditScoreTest = swal.mixin({
                                    buttonsStyling: false,
                                    customClass: {
                                        confirmButton: 'btn btn-primary',
                                        cancelButton: 'btn btn-light',
                                        denyButton: 'btn btn-light',
                                        input: 'form-control'
                                    }
                                });
                                // Defaults End

                                $('#but_memo_<?php echo $_rowScor['score_id']; ?>').on('click', function() {

                                    var id = "<?php echo $scoreid; ?>";
                                    var dsid = "<?php echo $_rowScor['score_detail_id']; ?>";
                                    var idd = "<?php echo $idd; ?>";
                                    var sid = "<?php echo $subject_id; ?>";
                                    var tid = "<?php echo $_rowSco['teacher_id']; ?>";
                                    var clid = "<?php echo $clid; ?>";

                                    var exam_no = "<?php echo $exam_no; ?>";
                                    var grade = "<?php echo $check_grade; ?>";
                                    var term = "<?php echo $check_term; ?>";
                                    var typec = "<?php echo $typec; ?>";
                                    var type = "1";

                                    var memo = $("#cst_memo_<?php echo $_rowScor['score_id']; ?>").val();

                                    swalInitGetEditScoreTest.fire({
                                        title: 'ต้องการบันทึกข้อมูลหรือไม่',
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


                                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/score_comment1_process.php", {
                                                id: id,
                                                dsid: dsid,
                                                idd: idd,
                                                sid: sid,
                                                tid: tid,
                                                clid: clid,
                                                exam_no: exam_no,
                                                grade: grade,
                                                term: term,
                                                typec: typec,
                                                type: type,
                                                memo: memo
                                            }, function(process_add) {
                                                var test_process = process_add;
                                                if (test_process.trim() === "no_error") {
                                                    let timerInterval;
                                                    swalInitDeleteScores.fire({
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
                                                                    const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                                    if (b_teacher_data1) {
                                                                        b_teacher_data1.textContent = Swal.getTimerLeft();
                                                                    } else {}
                                                                } else {}
                                                            }, 100);
                                                        },
                                                        willClose: function() {
                                                            clearInterval(timerInterval)
                                                        }
                                                    }).then(function(result) {
                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade=<?php echo $grade; ?>&check_term=<?php echo $term; ?>";

                                                        } else {}
                                                    });

                                                } else if (test_process.trim() === "it_error") {
                                                    swalInitGetEditScoreTest.fire({
                                                        title: 'ข้อมูลซ้ำ',
                                                        icon: 'error'
                                                    });
                                                } else {
                                                    swalInitGetEditScoreTest.fire({
                                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                        icon: 'error'
                                                    });
                                                }
                                            })

                                        } else if (result.dismiss === swal.DismissReason.cancel) {

                                        } else {}
                                    })

                                })


                            })
                        </script>


                        <!---->
                    </td>
                <?php

                                                        $sum_s = $sum_s + $_rowScor['score'];
                                                    }
                ?>
                <td align="center" bgcolor="#b5bffd"><?php echo $sum_s; ?></td>
                <?php

                                                    if ($max_s == "") {
                                                        $summary_s = 0;
                                                    } else if ($max_s != "") {
														
														if ($sum_s != 0) {
															$summary_s = ($score1_1*$sum_s)/$max_s;
														} else {
															// $sum_s is zero.
														}

                                                        //$summary_s = ($score1_1*$sum_s)/$max_s;

                                                        //echo "$summary_s = ($score1_1*$sum_s)/$max_s";
                                                    }

                ?>

                <td align="center" bgcolor="#dab0fb"><?php echo number_format($summary_s, 0); ?></td>
                <td align="center" bgcolor="#fcbbfb">
                    <?php
                                                    $max2 = $score1_2;

                                                    if ($exam_no == '1') {

                                                        $_sqlScor3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";

                                                        //echo $_sqlScor3;

                                                        $_rowScor3 = row_array($_sqlScor3);

                                                        $scoreid31 = $_rowScor3['score_id'];

                                                        $sqlScor3 = "SELECT * , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";
                                                    } else if ($exam_no == '2') {

                                                        $_sqlScor3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";

                                                        //echo $_sqlScor3;

                                                        $_rowScor3 = row_array($_sqlScor3);

                                                        $scoreid31 = $_rowScor3['score_id'];

                                                        $sqlScor3 = "SELECT * , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";
                                                    } else {
                                                    }

                                                    //echo "$sqlScor3<br>";

                                                    $_rowScor3 = row_array($sqlScor3);
                    ?>

                    <div><?php echo $_rowScor3['score']; ?></div>
                    <!--<input id="<?php echo $_rowScor3['score_detail_id']; ?>" name="qty2" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor3['score']; ?>" min="0" max="<?php echo $max2; ?>">-->
                    <!--<a href="ajax/get_commentscore_1.php?id=<?php echo $scoreid31; ?>&dsid=<?php echo $_rowScor3['score_detail_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_detail_id']; ?>" data-target="#CommentScore1" class="btn btn-sm" title="<?php echo $_rowScor3['MEMO']; ?>">
                        <i class="icon-pen6"></i> </a>-->
                    <div><a data-toggle="modal" data-target="#CommentscoreTest<?php echo $_rowScor3['score_id']; ?>" class="badge badge-purple p-1"><i class="icon-pen6"></i></a></div>
                    <!--<button type="button" data-toggle="modal" data-target="#CommentscoreTest<?php echo $_rowScor3['score_id']; ?>" class="btn btn-purple btn-xs"><i class="icon-pen6"></i> </button>-->


                    <div id="CommentscoreTest<?php echo $_rowScor3['score_id']; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">ฟอร์มหมายเหตุข้อมูลคะแนน</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">หมายเหตุ</label>

                                        <div class="col-md-8">
                                            <input class="form-control form-control-inline" size="16" type="text" name="memo" id="cst_memo_test<?php echo $_rowScor3['score_id']; ?>" value="<?php echo $memo; ?>" />
                                            <!--<input class="form-control form-control-inline" size="16" type="text" name="memo1" value="Rescore" Disabled/>
																<input type="hidden" class="form-control form-control-inline" size="16" type="text" name="memo" value="Rescore" />-->
                                            <span class="help-block"> กรอกข้อมูลหมายเหตุ</span>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" name="but_memo" id="but_memo_test<?php echo $_rowScor3['score_id']; ?>" class="btn btn-indigo">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function() {

                            // Defaults
                            var swalInitGetEditScoreTest = swal.mixin({
                                buttonsStyling: false,
                                customClass: {
                                    confirmButton: 'btn btn-primary',
                                    cancelButton: 'btn btn-light',
                                    denyButton: 'btn btn-light',
                                    input: 'form-control'
                                }
                            });
                            // Defaults End

                            $('#but_memo_test<?php echo $_rowScor3['score_id']; ?>').on('click', function() {

                                var id = "<?php echo $scoreid31; ?>";
                                var dsid = "<?php echo $_rowScor3['score_detail_id']; ?>";
                                var idd = "<?php echo $idd; ?>";
                                var sid = "<?php echo $subject_id; ?>";
                                var tid = "<?php echo $_rowSco['teacher_id']; ?>";
                                var clid = "<?php echo $clid; ?>";

                                var exam_no = "<?php echo $exam_no; ?>";
                                var grade = "<?php echo $check_grade; ?>";
                                var term = "<?php echo $check_term; ?>";
                                var typec = "<?php echo $typec; ?>";
                                var type = "1";

                                var memo = $("#cst_memo_test<?php echo $_rowScor3['score_id']; ?>").val();

                                swalInitGetEditScoreTest.fire({
                                    title: 'ต้องการบันทึกข้อมูลหรือไม่',
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


                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/score_comment1_process.php", {
                                            id: id,
                                            dsid: dsid,
                                            idd: idd,
                                            sid: sid,
                                            tid: tid,
                                            clid: clid,
                                            exam_no: exam_no,
                                            grade: grade,
                                            term: term,
                                            typec: typec,
                                            type: type,
                                            memo: memo
                                        }, function(process_add) {
                                            var test_process = process_add;
                                            if (test_process.trim() === "no_error") {
                                                let timerInterval;
                                                swalInitDeleteScores.fire({
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
                                                                const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                                                if (b_teacher_data1) {
                                                                    b_teacher_data1.textContent = Swal.getTimerLeft();
                                                                } else {}
                                                            } else {}
                                                        }, 100);
                                                    },
                                                    willClose: function() {
                                                        clearInterval(timerInterval)
                                                    }
                                                }).then(function(result) {
                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade=<?php echo $grade; ?>&check_term=<?php echo $term; ?>";

                                                    } else {}
                                                });

                                            } else if (test_process.trim() === "it_error") {
                                                swalInitGetEditScoreTest.fire({
                                                    title: 'ข้อมูลซ้ำ',
                                                    icon: 'error'
                                                });
                                            } else {
                                                swalInitGetEditScoreTest.fire({
                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                    icon: 'error'
                                                });
                                            }
                                        })

                                    } else if (result.dismiss === swal.DismissReason.cancel) {

                                    } else {}
                                })

                            })


                        })
                    </script>


                </td>

                <?php

                                                    $sum_s1 = $_rowScor2['score'];
                                                    $sum_s2 = $_rowScor3['score'];
                                                    $summary_g = $summary_s + $sum_s1 + $sum_s2;
                                                    $summary_grade = number_format($summary_g, 0);
                ?>
                <td align="center" bgcolor="#fae59e"><?php echo number_format($summary_grade, 0); ?></td>
                <td align="center">
                    <?php

                                                    if (($summary_grade >= 79.5) && ($summary_grade <= 100)) {
                                                        $show_grade = "4.0";
                                                    } else if (($summary_grade >= 74.5) && ($summary_grade < 79.5)) {
                                                        $show_grade = "3.5";
                                                    } else if (($summary_grade >= 69.5) && ($summary_grade < 74.5)) {
                                                        $show_grade = "3.0";
                                                    } else if (($summary_grade >= 64.5) && ($summary_grade < 69.5)) {
                                                        $show_grade = "2.5";
                                                    } else if (($summary_grade >= 59.5) && ($summary_grade < 64.5)) {
                                                        $show_grade = "2.0";
                                                    } else if (($summary_grade >= 54.5) && ($summary_grade < 59.5)) {
                                                        $show_grade = "1.5";
                                                    } else if (($summary_grade >= 49.5) && ($summary_grade < 54.5)) {
                                                        $show_grade = "1.0";
                                                    } else if (($summary_grade >= 0) && ($summary_grade < 49.5)) {
                                                        $show_grade = "0.0";
                                                    } else {
                                                        $show_grade = "-";
                                                    }

                                                    echo $show_grade;

                    ?>
                </td>
            </tr>

    <?php

                                                    $sum_s = 0;
                                                    $summary_s = 0;
                                                    $summary_grade = 0;
                                                }
                                            }
    ?>

</tbody>
</table>

<?php
                                        }
?>

<table class="table table-striped table-bordered table-hover table-sm" id="">
    <tbody>
        <tr>
            <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm purple" title="แก้ไขตัวชี้วัด"><i class="icon-pen6"></i></a> : เมนูสำหรับแก้ไขตัวชี้วัด</td>
            <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm red" title="ลบตัวชี้วัด"><i class="icon-trash"></i></a> : เมนูสำหรับการลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน</td>
            <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm blue" title="คะแนน"><i class="icon-file-text2"></i></a> : เมนูสำหรับกรอกคะแนน</td>
            <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm yellow-gold" title="ปรับปรุงข้อมูล"><i class="fa fa-refresh"></i></a> : เมนูสำหรับปรับปรุงข้อมูลคะแนน (กรณีที่ไม่สามารถกรอกคะแนนได้)</td>
        </tr>
    </tbody>
</table>

<?php

                    } else if ($row['teacher_id1'] != $tid && $row['teacher_id2'] == $tid) {

                        $check_teacher = 2;

?>

    <table class="table table-striped table-bordered table-sm" id="">
        <tbody>
            <tr>
                <td colspan="3">

                    <?php

                        if ($exam_no == '1') {

                            $sqlC1 = "SELECT * , c.teacher_check AS TEACHER_CHECK, c.check_status AS CHECK_STATUS  , c.admin_check AS A_CHECK, c.admin_check_status AS A_CHECK_STATUS FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id2 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND a.classroom_t_id='$clid'";
                        } else if ($exam_no == '2') {

                            $sqlC1 = "SELECT * , c.teacher_check2 AS TEACHER_CHECK, c.check_status2 AS CHECK_STATUS , c.admin_check2 AS A_CHECK, c.admin_check_status2 AS A_CHECK_STATUS FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id2 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND a.classroom_t_id='$clid'";
                        }

                        //$sqlC1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE c.teacher_id2 = '{$tid}' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec'";

                        //echo $sqlC1;
                        $listC1 = result_array($sqlC1);
                        foreach ($listC1 as $key => $rowC1) {

                            $course_cid = $rowC1['course_class_id'];

                            $clid = $rowC1['classroom_t_id'];

                            $course_class_lid = $rowC1['course_class_level_id'];
                            $course_class_detail_id = $rowC1['course_class_detail_id'];

                            //echo "$clid - $course_class_lid";

                            $teacher_check = $rowC1['TEACHER_CHECK'];
                            $check_status = $rowC1['CHECK_STATUS'];

                            $admin_check = $rowC1['A_CHECK'];
                            $admin_check_status = $rowC1['A_CHECK_STATUS'];

                            if ($exam_no == '1') {

                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                            } else if ($exam_no == '2') {

                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                            }

                            //echo $sqlSco;
                            $rowSco = result_array($sqlSco);
                    ?>

                        <table class="table table-striped table-bordered" id="">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        <div class="btn-group btn-group-devided" data-toggle="">

                                            <?php

                                            //if($row['teacher_id1'] != $tid && $row['teacher_id2'] == $tid) {	
                                            //if($exam_no=='1') { 
                                            //if($exam_no=='2') { 
                                            ?>

                                            <a href="ajax/get_addscore_2.php?course_cid=<?php echo $course_cid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo $check_term; ?>&checkt=<?php echo $check_teacher; ?>" data-toggle="modal" data-id="<?php echo $course_cid; ?>" data-target="#GetAddScore2" class="btn btn-sm green">
                                                <i class="fa fa-plus"></i> เพิ่มคะแนน</a>

                                            <!--<a class="btn green btn-sm" data-toggle="modal" href="#AddScore1">
                                <i class="fa fa-plus"></i> เพิ่มคะแนน</a>-->

                                            <!--<a href="ajax/get_copyscore.php?id=<?php echo $id; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&clid=<?php echo $clid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>" data-toggle="modal" data-id="<?php echo $row['subject_id']; ?>" data-target="#CopyScore" class="btn btn-sm yellow-gold">
                                <i class="fa fa-copy"></i> สำเนาคะแนน</a>-->

                                            <?php
                                            //}
                                            //}

                                            ?>

                                        </div>

                                    </th>
                                </tr>

                                <tr>
                                    <td colspan="3">

                                        <div>Academic Affairs : </div>

                                        <div class="btn-group btn-group-devided" data-toggle="">

                                            <?php
                                            if ($admin_check_status == '1') {
                                                $sqlAdm = "SELECT * FROM tb_admin WHERE admin_id = '{$admin_check}'";
                                                $rowAdm = row_array($sqlAdm);

                                                $admin_name = "$rowAdm[admin_name]&nbsp;&nbsp;$rowAdm[admin_lastname]";

                                            ?>
                                                <a href="" class="btn btn-sm green" title="Checked">
                                                    <i class="fa fa-check"></i> Check</a>&nbsp;

                                            <?php
                                                echo "Status : <font color='green'>Checked</font> By $admin_name";
                                            } else if ($admin_check_status == '0') {
                                            ?>

                                                <a href="" class="btn btn-sm purple" title="Checked">
                                                    <i class="fa fa-check"></i> Check</a>&nbsp;

                                            <?php
                                                echo "Status : <font color='red'>Not Checked</font>";
                                            }
                                            ?>
                                        </div>

                                        <div>Teacher : </div>

                                        <div class="btn-group btn-group-devided" data-toggle="">

                                            <?php
                                            if ($check_status == '1') {
                                                $sqlTc = "SELECT * FROM tb_teacher WHERE teacher_id = '{$teacher_check}'";
                                                $rowTc = row_array($sqlTc);

                                                $teacher_name = "$rowTc[teacher_name]&nbsp;&nbsp;$rowTc[teacher_surname]";

                                            ?>
                                                <a href="process/uncheckscore2_process.php?ccid=<?php echo $course_class_lid; ?>&cdid=<?php echo $course_class_detail_id; ?>&id=<?php echo $id; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo "$check_term"; ?>" class="btn btn-sm red" onclick="return confirm('Confirm Verification!!')" title="Uncheck">
                                                    <i class="fa fa-remove"></i> Uncheck</a>&nbsp;


                                                <!--<a href="" class="btn btn-sm green" title="Checked">
                                                    <i class="fa fa-check"></i> Check</a>&nbsp;-->

                                            <?php
                                                echo "Status : <font color='green'>Checked</font> By $teacher_name";
                                            } else if ($check_status == '0') {
                                            ?>

                                                <!--<a href="process/checkscore1_process.php?ccid=<?php echo $course_class_lid; ?>&cdid=<?php echo $course_class_detail_id; ?>&id=<?php echo $id; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&grade=<?php echo $check_grade; ?>&term=<?php echo "$check_term"; ?>" class="btn btn-sm purple" onclick="return confirm('Confirmation of verification!!')" title="Check">
                                        <i class="fa fa-check"></i> Check</a>&nbsp;-->
                                                <a href="" class="btn btn-sm purple" title="Checked">
                                                    <i class="fa fa-check"></i> Check</a>&nbsp;

                                            <?php
                                                echo "Status : <font color='red'>Not Checked</font>";
                                            }
                                            ?>
                                        </div>

                                        <div>After filling the scores completely , please click “check” to confirm. / เมื่อกรอกคะแนนสมบูรณ์แล้ว กรุณากด “Check” เพื่อยืนยันการส่งคะแนน</div>

                                        </th>
                                </tr>
                            </thead>
                        </table>

                        <table class="table table-striped table-bordered table-hover table-sm" id="">
                            <thead>
                                <tr bgcolor="#dcdcdc">
                                    <th width="50" align="center"> เลขที่ </th>
                                    <th width="40" align="center"> รหัส </th>
                                    <th> รายชื่อ </th>
                                    <th width="100" align="center"> ชื่อเล่น </th>
                                    <th width="100" align="center"> ห้องเรียน </th>
                                    <?php foreach ($rowSco as $_rowSco) { ?>
                                        <th width="50" align="center">
                                            <?php echo $_rowSco['score_name']; ?>

                                            <?php
                                            if (($_rowSco['score_lock'] == '0') || ($_rowSco['score_lock'] == '1')) {

                                            ?>
                                                <br>
                                                <a href="ajax/get_editscore.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_id']; ?>" data-target="#EditScore" class="btn btn-sm purple" title="แก้ไขตัวชี้วัด <?php echo $_rowSco['score_name']; ?>">
                                                    <i class="icon-pen6"></i> </a>

                                                <a href="process/delete_score1.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>" class="btn btn-sm red" onclick="return confirm('การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน ยืนยันการลบ!!')" title="ลบตัวชี้วัด">
                                                    <i class="icon-trash"></i> </a>

                                                <a href="ajax/get_addscore.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['course_id']; ?>" data-target="#AddScores" class="btn btn-sm blue" title="คะแนน">
                                                    <i class="icon-file-text2"></i> </a>
                                                <button type="button" class="btn btn-info btn-sm"><i class="icon-file-text2"></i> </button>

                                                <!--<a href="process/update_course_class.php?id=<?php echo $_rowSco['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $_rowSco['classroom_id']; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=1" class="btn btn-sm yellow-gold" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
                        <i class="fa fa-refresh"></i> </a>-->

                                            <?php } ?>

                                        </th>
                                    <?php } ?>
                                    <th width="50" align="center"> รวม </th>
                                    <th width="50" align="center"> คะแนนเก็บ </th>
                                    <th width="50" align="center"> คะแนนสอบ
                                        <br>
                                        <?php

                                        if ($exam_no == '1') {

                                            $sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                        } else if ($exam_no == '2') {

                                            $sqlSco3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' GROUP BY a.score_id ASC";
                                        }

                                        //echo $sqlSco3;
                                        $_rowSco3 = row_array($sqlSco3);
                                        ?>

                                        <?php
                                        if (($_rowSco['score_lock'] == '0') || ($_rowSco['score_lock'] == '1')) {
                                        ?>

                                            <a href="ajax/get_editscore.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&typec=<?php echo $typec; ?>&type=2" data-toggle="modal" data-id="<?php echo $_rowSco3['score_id']; ?>" data-target="#AddScores" class="btn btn-sm purple" title="คะแนนสอบ">
                                                <i class="icon-pen6"></i> </a>


                                            <a href="process/delete_score2.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>" class="btn btn-sm red" onclick="return confirm('การลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน ยืนยันการลบ!!')" title="ลบตัวชี้วัด">
                                                <i class="icon-trash"></i> </a>

                                            <a href="ajax/get_addscore.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&cclid=<?php echo $course_class_lid; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&typec=<?php echo $typec; ?>&type=2" data-toggle="modal" data-id="<?php echo $_rowSco3['score_id']; ?>" data-target="#AddScores" class="btn btn-sm blue" title="คะแนนสอบ">
                                                <i class="icon-file-text2"></i> </a>
                                            <button type="button" class="btn btn-info btn-sm"><i class="icon-file-text2"></i> </button>

                                            <!--<a href="process/update_course_class.php?id=<?php echo $_rowSco3['score_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco3['teacher_id']; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $_rowSco3['classroom_id']; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=2" class="btn btn-sm yellow-gold" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
                        <i class="fa fa-refresh"></i> </a>-->

                                            <?php if (check_session("admin_username") == "snaper") { ?>

                                                <a href="process/update_courses_class.php?cid=<?php echo $course; ?>&cdid=<?php echo $coursedetail; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&sid=<?php echo $subject_id; ?>&clid=<?php echo $clid; ?>&exam_no=<?php echo $exam_no; ?>&check_grade=<?php echo $check_grade; ?>&check_term=<?php echo $check_term; ?>&type=2" class="btn btn-sm red" onclick="return confirm('ยืนยันการปรับปรุงข้อมูล!!')" title="ปรับปรุงข้อมูล">
                                                    <i class="fa fa-plus"></i> </a>

                                            <?php } ?>

                                        <?php } ?>
                                    </th>
                                    <th width="50" align="center"> รวม </th>
                                    <th width="50" align="center"> เกรด </th>
                                </tr>
                                <tr>
                                    <th colspan="5">&nbsp;</th>
                                    <?php
                                    $max = 0;
                                    foreach ($rowSco as $_rowSco) {
                                    ?>
                                        <th align="center" width="50" bgcolor="#e2e2e2">
                                            <?php echo $_rowSco['score_max']; ?>
                                        </th>

                                    <?php

                                        $max = $max + $_rowSco['score_max'];
                                    }

                                    $score1_1 = $rowC1['score1_1'];
                                    $score1_2 = $rowC1['score1_2'];

                                    $max_s = $max;

                                    ?>

                                    <th width="50" align="center" bgcolor="#b5bffd"><?php echo $max_s; ?></a></th>
                                    <th width="50" align="center" bgcolor="#dab0fb"><?php echo $score1_1; ?></a></th>
                                    <th width="50" align="center" bgcolor="#fcbbfb"><?php echo $score1_2; ?></a></th>
                                    <?php

                                    $sum_score = $score1_1 + $score1_2;

                                    $scoreid = $rowSco1['score_id'];

                                    ?>

                                    <th width="50" align="center" bgcolor="#fae59e"><?php echo $sum_score; ?></a></th>
                                    <th width="50">&nbsp;</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sum_s = 0;

                                $sql1 = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id INNER JOIN tb_course_class_level c ON b.course_class_detail_id=c.course_class_detail_id WHERE a.course_class_id='{$course_cid}' AND c.teacher_id2 = '{$tid}' AND a.classroom_t_id='$clid' AND b.subject_id = '{$subject_id}' AND a.course_class_type='$typec' AND c.course_class_level_id = '$course_class_lid'";

                                //echo "$sql1 <br>";
                                $list1 = result_array($sql1);
                                foreach ($list1 as $key => $row1) {

                                    $cc_id = $row1['course_class_id'];
                                    $cd_id = $row1['course_class_detail_id'];
                                    $cl_id = $row1['course_class_level_id'];

                                    $sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id=b.course_s_id INNER JOIN tb_student c ON a.student_id = c.student_id INNER JOIN tb_course_class_detail d ON b.course_class_detail_id = d.course_class_detail_id WHERE a.course_class_id = '{$cc_id}' AND  a.course_s_status = '1' AND b.course_class_detail_id = '{$cd_id}' AND b.course_class_level_id = '{$cl_id}' AND b.course_class_level_check = '1' AND (c.student_no != '0' OR c.student_no != '') AND c.student_status='1' AND d.subject_id = '{$subject_id}' ORDER BY c.student_class ASC , c.student_no ASC";

                                    //echo $sql;
                                    $list = result_array($sql);
                                ?>
                                    <?php foreach ($list as $key => $row) { ?>
                                        <?php
                                        if ($row['gender'] == '1') {
                                            $gender = "ชาย";
                                        } else if ($row['gender'] == '2') {
                                            $gender = "หญิง";
                                        }

                                        $stuid = $row['student_id'];

                                        $sqlC = "SELECT * FROM tb_classroom WHERE classroom_id = '$row[student_class]'";
                                        $rowC = row_array($sqlC);
                                        ?>

                                        <tr>
                                            <td align="center"><?php echo $row['student_no']; ?></td>
                                            <td align="center"><?php echo $row['student_id']; ?></td>
                                            <td align="left"><?php echo $row['student_name']; ?>&nbsp;<?php echo $row['student_surname']; ?></td>
                                            <td align="left"><?php echo $row['nickname']; ?></td>
                                            <td align="left"><?php echo $rowC['classroom_name']; ?></td>

                                            <?php

                                            if ($exam_no == '1') {

                                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";
                                            } else if ($exam_no == '2') {

                                                $sqlSco = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='1' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";
                                            }

                                            //echo "$sqlSco<br>";
                                            $sqlSco = result_array($sqlSco);

                                            foreach ($sqlSco as $_sqlSco) {

                                                $scoreid =  $_sqlSco['score_id'];

                                                $sqlScor = "SELECT *  , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='1' AND a.score_detail_status='1'";

                                                //echo "$sqlScor<br>";
                                                $_rowScor = row_array($sqlScor);

                                            ?>
                                                <td align="center">
                                                    <?php echo $_rowScor['score']; ?>
                                                    <!--<input id="<?php echo $_rowScor['score_detail_id']; ?>" name="qty" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor['score']; ?>" min="0" max="<?php echo $max; ?>">-->
                                                    <a href="ajax/get_commentscore_2.php?id=<?php echo $scoreid; ?>&dsid=<?php echo $_rowScor['score_detail_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_detail_id']; ?>" data-target="#CommentScore2" class="btn btn-sm" title="<?php echo $_rowScor['MEMO']; ?>">
                                                        <i class="icon-pen6"></i> </a>
                                                </td>
                                            <?php

                                                $sum_s = $sum_s + $_rowScor['score'];
                                            }
                                            ?>
                                            <td align="center" bgcolor="#b5bffd"><?php echo $sum_s; ?></td>
                                            <?php

                                            if ($max_s == "") {
                                                $summary_s = 0;
                                            } else if ($max_s != "") {
														
														if ($sum_s != 0) {
															$summary_s = ($score1_1*$sum_s)/$max_s;
														} else {
															// $sum_s is zero.
														}

                                                        //$summary_s = ($score1_1*$sum_s)/$max_s;

                                                //echo "$summary_s = ($score1_1*$sum_s)/$max_s";
                                            }

                                            ?>

                                            <td align="center" bgcolor="#dab0fb"><?php echo number_format($summary_s, 0); ?></td>
                                            <td align="center" bgcolor="#fcbbfb">
                                                <?php
                                                $max2 = $score1_2;

                                                if ($exam_no == '1') {

                                                    $_sqlScor3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";

                                                    //echo $_sqlScor3;

                                                    $_rowScor3 = row_array($_sqlScor3);

                                                    $scoreid31 = $_rowScor3['score_id'];

                                                    $sqlScor3 = "SELECT * , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";
                                                } else if ($exam_no == '2') {

                                                    $_sqlScor3 = "SELECT * FROM tb_score a INNER JOIN tb_score_detail b ON a.score_id=b.score_id INNER JOIN tb_course_class_detail c ON b.course_class_detail_id=c.course_class_detail_id INNER JOIN tb_course_class d ON a.classroom_t_id=d.classroom_t_id WHERE a.course_class_id='{$course_cid}' AND a.subject_id='{$subject_id}' AND a.teacher_id = '{$tid}' AND a.classroom_t_id='$clid' AND a.score_no='$exam_no' AND a.grade_id = '{$check_grade}' AND a.term_id = '{$check_term}' AND a.score_type='2' AND a.score_status='1' AND b.course_class_level_id = '$course_class_lid' AND d.course_class_type='$typec' GROUP BY a.score_id ASC";

                                                    //echo $_sqlScor3;

                                                    $_rowScor3 = row_array($_sqlScor3);

                                                    $scoreid31 = $_rowScor3['score_id'];

                                                    $sqlScor3 = "SELECT * , a.memo AS MEMO FROM tb_score_detail a INNER JOIN tb_course_student b ON a.course_s_id=b.course_s_id WHERE a.score_id='{$scoreid31}' AND a.course_class_detail_id='{$cd_id}' AND a.course_class_level_id='{$cl_id}' AND b.student_id = '{$stuid}' AND a.score_type='2' AND a.score_detail_status='1'";
                                                }

                                                //echo "$sqlScor3<br>";

                                                $_rowScor3 = row_array($sqlScor3);
                                                ?>

                                                <?php echo $_rowScor3['score']; ?>
                                                <!--<input id="<?php echo $_rowScor3['score_detail_id']; ?>" name="qty2" type="number" class="form-control input-xsmall" value="<?php echo $_rowScor3['score']; ?>" min="0" max="<?php echo $max2; ?>">-->
                                                <a href="ajax/get_commentscore_2.php?id=<?php echo $scoreid31; ?>&dsid=<?php echo $_rowScor3['score_detail_id']; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $_rowSco['teacher_id']; ?>&clid=<?php echo $clid; ?>&sid=<?php echo $subject_id; ?>&exam_no=<?php echo $exam_no; ?>&typec=<?php echo $typec; ?>&type=1" data-toggle="modal" data-id="<?php echo $_rowSco['score_detail_id']; ?>" data-target="#CommentScore2" class="btn btn-sm" title="<?php echo $_rowScor3['MEMO']; ?>">
                                                    <i class="icon-pen6"></i> </a>
                                            </td>

                                            <?php

                                            $sum_s1 = $_rowScor2['score'];
                                            $sum_s2 = $_rowScor3['score'];
                                            $summary_g = $summary_s + $sum_s1 + $sum_s2;
                                            $summary_grade = number_format($summary_g, 0);
                                            ?>
                                            <td align="center" bgcolor="#fae59e"><?php echo number_format($summary_grade, 0); ?></td>
                                            <td align="center">
                                                <?php

                                                if (($summary_grade >= 79.5) && ($summary_grade <= 100)) {
                                                    $show_grade = "4.0";
                                                } else if (($summary_grade >= 74.5) && ($summary_grade < 79.5)) {
                                                    $show_grade = "3.5";
                                                } else if (($summary_grade >= 69.5) && ($summary_grade < 74.5)) {
                                                    $show_grade = "3.0";
                                                } else if (($summary_grade >= 64.5) && ($summary_grade < 69.5)) {
                                                    $show_grade = "2.5";
                                                } else if (($summary_grade >= 59.5) && ($summary_grade < 64.5)) {
                                                    $show_grade = "2.0";
                                                } else if (($summary_grade >= 54.5) && ($summary_grade < 59.5)) {
                                                    $show_grade = "1.5";
                                                } else if (($summary_grade >= 49.5) && ($summary_grade < 54.5)) {
                                                    $show_grade = "1.0";
                                                } else if (($summary_grade >= 0) && ($summary_grade < 49.5)) {
                                                    $show_grade = "0.0";
                                                } else {
                                                }

                                                echo $show_grade;

                                                ?>
                                            </td>
                                        </tr>

                                <?php

                                        $sum_s = 0;
                                        $summary_s = 0;
                                        $summary_grade = 0;
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    <?php
                        }
                    ?>


                    <table class="table table-striped table-bordered table-hover table-sm" id="">
                        <tbody>
                            <tr>
                                <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm purple" title="แก้ไขตัวชี้วัด"><i class="icon-pen6"></i></a> : เมนูสำหรับแก้ไขตัวชี้วัด</td>
                                <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm red" title="ลบตัวชี้วัด"><i class="icon-trash"></i></a> : เมนูสำหรับการลบตัวชี้วัดอาจมีผลกระทบต่อคะแนน</td>
                                <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm blue" title="คะแนน"><i class="icon-file-text2"></i></a> : เมนูสำหรับกรอกคะแนน</td>
                                <td align="left" width="25%"><a href="" data-toggle="modal" data-id="" data-target="" class="btn btn-sm yellow-gold" title="ปรับปรุงข้อมูล"><i class="fa fa-refresh"></i></a> : เมนูสำหรับปรับปรุงข้อมูลคะแนน (กรณีที่ไม่สามารถกรอกคะแนนได้)</td>
                            </tr>
                        </tbody>
                    </table>

                <?php

                    } // end Check
                ?>

                </td>
            </tr>

        </tbody>
    </table>

    <!--</div>
    </div>
    </div>
    </div>-->

    <!--<div align="center"><a href="#"><img src="../assets/pages/img/btn_top.png" width="40" height="40" border="0" alt="Top"></a></div>-->

    <!-- END SAMPLE TABLE PORTLET-->

    <!--</div>
    </div>
    </div>-->

    <!-- End: life time stats -->


    <!--</div>
    </div>-->

    <!-- END PROJECT2-->
    </th>
    </tr>
    </thead>
    </table>


    </div>
    </div>


    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    </div>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else {
    }
}
?>




<!--ฟอร์มเพิ่มข้อมูลตัวชี้วัด-->

<div id="GetAddScore1" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h6 class="modal-title">ฟอร์มเพิ่มข้อมูลตัวชี้วัด</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label class="col-md-4 control-label">ตัวชี้วัด</label>

                    <div class="col-md-8">
                        <input class="form-control form-control-inline" size="16" type="text" name="score_keep_name" id="score_keep_name" value="" required />
                        <span class="help-block"> กรอกข้อมูลตัวชี้วัด</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">คะแนนเต็ม</label>

                    <div class="col-md-8">
                        <input class="form-control form-control-inline" size="16" type="number" name="score_keep_unit" id="score_keep_unit" value="" required />
                        <span class="help-block"> กรอกข้อมูลคะแนนเต็ม เช่น 10 20 </span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="button" name="ButGetAddScore1" data-dismiss="modal" id="ButGetAddScore1" class="btn btn-success">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Defaults
        var swalInitButGetAddScore1 = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        // Defaults End

        $('#ButGetAddScore1').on('click', function() {

            swalInitButGetAddScore1.fire({
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

                    var course_cid = "<?php echo $course_cid; ?>";
                    var idd = "<?php echo $idd; ?>";
                    var tid = "<?php echo $tid; ?>";
                    var clid = "<?php echo $clid; ?>";
                    var sid = "<?php echo $subject_id; ?>";
                    var exam_no = "<?php echo $exam_no; ?>";
                    var cclid = "<?php echo $course_class_lid; ?>";
                    var typec = "<?php echo $typec; ?>";
                    var grade = "<?php echo $check_grade; ?>";
                    var term = "<?php echo $check_term; ?>";
                    var checkt = "<?php echo $check_teacher; ?>";
                    var name = $("#score_keep_name").val();
                    var unit = $("#score_keep_unit").val();

                    $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/process/score_t1_process.php", {
                        course_cid: course_cid,
                        idd: idd,
                        tid: tid,
                        clid: clid,
                        sid: sid,
                        exam_no: exam_no,
                        cclid: cclid,
                        typec: typec,
                        grade: grade,
                        term: term,
                        checkt: checkt,
                        name: name,
                        unit: unit
                    }, function(process_add) {
                        var test_process = process_add;
                        if (test_process.trim() === "no_error") {
                            let timerInterval;
                            swalInitButGetAddScore1.fire({
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
                                            const b_teacher_data1 = content.querySelector('b_teacher_data1')
                                            if (b_teacher_data1) {
                                                b_teacher_data1.textContent = Swal.getTimerLeft();
                                            } else {}
                                        } else {}
                                    }, 100);
                                },
                                willClose: function() {
                                    clearInterval(timerInterval)
                                }
                            }).then(function(result) {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_show_detail&id=<?php echo $sid; ?>&idd=<?php echo $idd; ?>&tid=<?php echo $tid; ?>&exam_no=<?php echo $exam_no; ?>&clid=<?php echo $clid; ?>&typec=<?php echo $typec; ?>&check_grade="+grade+"&check_term="+term;
                                } else {}
                            });

                        } else if (test_process.trim() === "it_error") {
                            swalInitButGetAddScore1.fire({
                                title: 'ข้อมูลซ้ำ',
                                icon: 'error'
                            });
                        } else {
                            swalInitButGetAddScore1.fire({
                                title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                icon: 'error'
                            });
                        }
                    })

                } else if (result.dismiss === swal.DismissReason.cancel) {

                } else {}
            })

        })


    })
</script>

<!--form ฟอร์มเพิ่มข้อมูลตัวชี้วัด จบ-->