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
if ((preg_match("/check_subject.php/", $_SERVER['PHP_SELF']))) {
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

                        <a href="?modules=check_subject" class="breadcrumb-item"> จัดการเช็ครายวิชา</a>

                        <a href="#" class="breadcrumb-item"> เช็ครายวิชา</a>


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

            if ($list == "1" || $list == "2" || $list == "3") {

                $grade_key = $list;

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
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ข้อมูลห้องเรียน ภาคเรียน <?php echo $term; ?> <?php echo $grade; ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-6">
                        <div class="btn-group">
                            <button type="button" name="term_data" id="term_data" class="btn btn-outline-success btn-sm" value="">ภาคเรียน</button>&nbsp;&nbsp;
                            <button type="button" name="grade_data" id="grade_data" class="btn btn-outline-success btn-sm" value="">ระดับชั้น</button>&nbsp;&nbsp;
                            <button type="button" name="course_data" id="course_data" class="btn btn-outline-success btn-sm" value="">จัดเช็ครายวิชา</button>&nbsp;&nbsp;
                            <button type="button" name="check_subject" id="check_subject" class="btn btn-outline-success btn-sm" value="">เช็ครายวิชาหลัก</button>
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
            } else {
                ?>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <h4>จัดเช็ครายวิชา</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-6">
                            <div class="btn-group">
                                <button type="button" name="teach_data" id="teach_data" class="btn btn-outline-success btn-sm" value="">เช็คการสอน</button>&nbsp;&nbsp;
                                <button type="button" name="check_subject" id="check_subject" class="btn btn-outline-success btn-sm" value="">เช็ครายวิชา</button>
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
                                                @$listSD = filter_input(INPUT_GET, 'list');
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
                @$list = filter_input(INPUT_GET, 'list');
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
                                        <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลจัดเช็ครายวิชา ระดับชั้น<?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="check_subject">

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

                                                                $classroom_t_id = $row['classroom_t_id'];

                                                                $sql1 = "SELECT * FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.classroom_t_id='{$classroom_t_id}' AND a.classroom_detail_status='1' AND b.student_status='1' ORDER BY b.student_no ASC";
                                                                $cc1 = result_array($sql1);

                                                                $tid1 = $row['teacher_id1'];
                                                                $sqlT1 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid1}'";
                                                                $rowT1 = row_array($sqlT1);

                                                                $tid2 = $row['teacher_id2'];
                                                                $sqlT2 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid2}'";
                                                                $rowT2 = row_array($sqlT2);

                                                                $tid3 = $row['teacher_id3'];
                                                                $sqlT3 = "SELECT * FROM tb_teacher WHERE teacher_id = '{$tid3}'";
                                                                $rowT3 = row_array($sqlT3);

                                                                $sqlCou = "SELECT * FROM tb_course_class a INNER JOIN tb_term b ON a.term_id = b.term_id  WHERE b.term_id = '{$term_key}' AND a.grade_id='{$grade_key}' AND a.classroom_t_id = '{$classroom_t_id}' ORDER BY a.course_class_name ASC, a.course_class_year ASC";
                                                                $Cou = row_array($sqlCou);

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
                                                                        <div><?php echo count($cc1); ?></div>
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

                                                                    <td style="width: 16%;" align="center">
                                                                        <div align="center">
                                                                            <button type="button" name="show_<?php echo $Cou['course_class_id']; ?>" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=show&id=<?php echo $Cou['course_class_id']; ?>&rid=<?php echo $classroom_t_id; ?>&term_key=<?php echo $term_key; ?>&grade_key=<?php echo $grade_key; ?>';" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายวิชา" data-placement="bottom" value=""><i class="icon-search4"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>
                                                        </tbody>

                                                    </table>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    <?php    } ?>
                    <!------------------------------------------------------------------------------->
                <?php    }elseif(($list=="show_structure")){ ?>
<!------------------------------------------------------------------------------->
                
                <?php
                	$id=filter_input(INPUT_GET,'id');         
                    $cid=filter_input(INPUT_GET,'cid');              
                    $rid=filter_input(INPUT_GET,'rid');          
                    $cdid=filter_input(INPUT_GET,'cdid');     
                    
                    if (isset($_GET['check_grade'])){
                        $check_grade=filter_input(INPUT_GET,'check_grade');
                        $sql = "SELECT * 
                                FROM `tb_grade` 
                                WHERE `grade_id` = '{$check_grade}'";
                        $row = row_array($sql);	
                        $grade="ระดับชั้น".$row["grade_name"];
                    }elseif(!isset($_GET['check_grad'])) {
                        $grade="";
                    }else{} 

                    if (isset($_GET['check_term'])) {
                        $check_term=filter_input(INPUT_GET,'check_term');
                        $sql = "SELECT * 
                                FROM `tb_term` 
                                WHERE `term_id` = '{$check_term}' 
                                AND `grade_id` = '{$check_grade}' 
                                ORDER BY `year` 
                                DESC , `term` DESC";
                        $row = row_array($sql);	
                        $term=$row["term"]."/".$row["year"];
                    } else if (!isset($_GET['check_term'])) {
                        $sql = "SELECT * 
                                FROM `tb_term` 
                                WHERE `term_status` = '1' 
                                AND `grade_id` = '{$check_grade}' 
                                ORDER BY `year` 
                                DESC , `term` DESC";
                        $row = row_array($sql);
                        $check_term=$row["term_id"];
                        $term=$row["term"]."/".$row["year"];
                    }else{}

                ?>


                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="card">
                                    <div class="card-header bg-success text-white header-elements-inline">
                                        <div class="col-<?php echo $grid;?>-6 card-title">ตารางข้อมูลหลักสูตร ภาคเรียน <?php echo $term;?></div>
                                        <div class="col-<?php echo $grid;?>-6 card-title"></div>                                    
                                    </div>

                                    <div class="card-body">

                <?php 
					$sql = "SELECT * FROM tb_term a INNER JOIN tb_course_class b ON a.term_id = b.term_id WHERE a.term_id = '{$check_term}' AND b.course_class_id = '{$cid}' AND b.course_class_status = '1' ORDER BY b.course_class_name ASC";
					$row = row_array($sql);

					$course_type = $row['course_class_type'];

                    $sqlS = "SELECT * FROM tb_subject a INNER JOIN tb_subject_type b ON a.subt_id=b.subt_id WHERE a.subject_id='{$id}' AND a.grade_id = '{$check_grade}' ORDER BY a.subt_id ASC , a.subject_name ASC";
                    $rowS = row_array($sqlS);

				?>

                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-12" style="font-size: 20px;">
                                                <div><?php  echo $row["course_class_name"];?> ประจำภาคการศึกษาที่ <?php  echo $row["term"];?> ปีการศึกษา <?php  echo $row["year"];?></div>
                                                <div>รหัสวิชา <?php  echo "$rowS[subject_code]";?> ชื่อวิชา <?php  echo "$rowS[subject_name]";?> ชื่อวิชา(Eng) <?php  echo "$rowS[subject_name_eng]";?> ประเภท <?php  echo "$rowS[subt_name]";?> เวลาเรียน/ปี <?php  echo "$rowS[unit]";?> หน่วยกิต <?php  echo "$rowS[weight]";?></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-button-html5-basic">
                                                        <thead>
                                                            <tr>
                                                                <th><div>ลำดับ</div></th>
                                                                <th><div>ระดับ</div></th>
                                                                <th><div>ครูผู้สอน</div></th>
                                                                <th><div>หน่วยกิตคะแนน</div></th>
                                                                <th><div>คะแนนเก็บ</div></th>
                                                                <th><div>คะแนนสอบ</div></th>
                                                                <th><div>ตำแหน่ง</div></th>
                                                                <th><div>แผนก</div></th>
                                                                <th><div>เบอร์โทร</div></th>
                                                                <th><div>คะแนน 1</div></th>
                                                                <th><div>คะแนน 2</div></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                <?php 

                    $sql = "SELECT * , check_status AS CHECK_STATUS , check_status2 AS CHECK_STATUS2 FROM tb_course_class_level WHERE course_class_detail_id='{$cdid}' AND course_class_level_status='1' ORDER BY course_class_level_name ASC";

                    //$sql = "SELECT * FROM tb_course_class_detail a INNER JOIN tb_course_class_level b ON a.course_class_detail_id = b.course_class_detail_id WHERE a.course_class_detail_id='{$cdid}' AND a.course_class_id='{$cid}' AND a.subject_id='{$id}' AND a.course_class_detail_status='1'";
                    //echo $sql;
                    $list = result_array($sql); ?>

                <?php foreach ($list as $key => $row) { 

                $course_class_lid = $row['course_class_level_id'];
                $course_class_detail_id = $row['course_class_detail_id'];

                                                                
                        $sqlT = "SELECT * , COUNT(teacher_id) AS COUNTT FROM tb_teacher WHERE teacher_id = '$row[teacher_id1]' AND teacher_status='1'";
                        $rowT = row_array($sqlT);

                        $teacher_type = $rowT['teacher_type'];

                        $secid=$rowT['teacher_section_id'];
                        $sqlS = "SELECT * FROM tb_teacher_section WHERE teacher_section_id = '{$secid}'";
                        $rowS= row_array($sqlS);

                        $count_tea = $rowT['COUNTT'];

                        $check_status = $row['CHECK_STATUS'];

                        $check_status2 = $row['CHECK_STATUS2'];

                ?>

                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $row['course_class_level_name'];?></td>
                                                                <td><?php echo $rowT['teacher_name'];?>&nbsp;<?php echo $rowT['teacher_surname'];?></td>
                                                                <td><?php echo $row['rate1'];?>%</td>
                                                                <td><?php echo $row['score1_1'];?>%</td>
                                                                <td><?php echo $row['score1_2'];?>%</td>
                                                                <td><?php echo $rowT['position'];?></td>
                                                                <td align="center"><?php echo $rowS['teacher_section_name'];?></td>
                                                                <td align="center"><?php echo $rowT['mobile'];?></td>
                                                                <td align="center"> 

                                                                <?php
                                                                if($count_tea >0){
                                                                ?>
                                                                
                                                                <div><a  href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id1'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=1&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="badge badge-yellow p-1" title="คะแนนสอบครั้งที่ 1" ><i class="icon-search4"></i></a></div>

                                                                <!--<a c="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id1'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=1&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="btn blue btn-sm" title="คะแนนสอบครั้งที่ 1">
                                                                        <i class="icon-search4"></i> </a>-->

                                                                        <?php 
                                                                                if($check_status=='1') { ?>
                                                                                       <div><font color='green'>Checked</font><div>
                                                                        <?php   }elseif($check_status=='0') { ?>		
                                                                                       <div><font color='red'>Not Checked</font><div>
                                                                        <?php   }else{ ?>
                                                                                       <div><font color='red'></font><div>
                                                                        <?php   } ?>	


                                                                <?php } ?>

                                                                </td>
                                                                <td align="center"> 

                                                                <?php
                                                                if($count_tea >0){
                                                                ?>
                                                                      
                                                                      <div><a  href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id1'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=2&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="badge badge-yellow p-1" title="คะแนนสอบครั้งที่ 2" ><i class="icon-search4"></i></a></div>

                                                                <!--<a href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id1'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=2&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="btn green btn-sm" title="คะแนนสอบครั้งที่ 2">
                                                                        <i class="icon-search4"></i> </a>-->

                                                                        <?php 
                                                                                if(($check_status2=='1')) { ?>
                                                                                    <div><font color='green'>Checked</font></div>  
                                                                       <?php    }elseif(($check_status2=='0')) { ?>			
                                                                                    <div><font color='red'>Not Checked</font></div>
                                                                       <?php    }else{ ?>
                                                                                    <div><font color='red'></font></div>
                                                                        <?php   }?>	

                                                                <?php } ?>

                                                                </td>
                                                            </tr>
                <?php 							
                                                
                        $sqlT2 = "SELECT * , COUNT(teacher_id) AS COUNTT2 FROM tb_teacher WHERE teacher_id = '$row[teacher_id2]' AND teacher_status='1'";
                        $rowT2 = row_array($sqlT2);

                        $teacher_type2 = $rowT2['teacher_type'];

                        $secid2=$rowT2['teacher_section_id'];
                        $sqlS2 = "SELECT * FROM tb_teacher_section WHERE teacher_section_id = '{$secid2}'";
                        $rowS2= row_array($sqlS2);

                        $count_tea2 = $rowT2['COUNTT2'];

                        $check_status = $row['CHECK_STATUS'];

                        $check_status2 = $row['CHECK_STATUS2'];
                ?>

                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td><?php echo $row['course_class_level_name'];?></td>
                                                                <td><?php echo $rowT2['teacher_name'];?>&nbsp;<?php echo $rowT2['teacher_surname'];?></td>
                                                                <td><?php echo $row['rate2'];?>%</td>
                                                                <td><?php echo $row['score2_1'];?>%</td>
                                                                <td><?php echo $row['score2_2'];?>%</td>
                                                                <td><?php echo $rowT2['position'];?></td>
                                                                <td align="center"><?php echo $rowS2['teacher_section_name'];?></td>
                                                                <td align="center"><?php echo $rowT2['mobile'];?></td>
                                                                <td align="center"> 

                                                                <?php
                                                                if($count_tea2 >0){
                                                                ?>

                                                                    <div><a  href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id2'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=1&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="badge badge-yellow p-1" title="คะแนนสอบครั้งที่ 1" ><i class="icon-search4"></i></a></div>

                                                              

                                                                <!--<a href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id2'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=1&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="btn blue btn-sm" title="คะแนนสอบครั้งที่ 1">
                                                                        <i class="icon-search4"></i> </a>-->

                                                                        <?php 
                                                                                if(($check_status=='1')) { ?>
                                                                                       
                                                                    <div><font color='green'>Checked</font></div>
                                                                                     
                                                                        <?php   }elseif(($check_status=='0')) {	?>		
                                                                                        
                                                                    <div><font color='red'>Not Checked</font></div>       
                                                                       
                                                                        <?php   }else{ ?>
                                                                    <div><font color='red'></font></div> 
                                                                        <?php   }  ?>	

                                                                
                                                                <?php } ?>

                                                                </td>
                                                                <td align="center">
                                                                
                                                                <?php
                                                                if($count_tea2 >0){
                                                                ?>

                                                                <div><a  href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id2'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=2&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="badge badge-yellow p-1" title="คะแนนสอบครั้งที่ 2" ><i class="คะแนนสอบครั้งที่ 2"></i></a></div>

                                                                <!--<a href="?modules=subject_teach_detail&id=<?php echo $id;?>&idd=<?php echo $teacher_type;?>&tid=<?php echo $row['teacher_id2'];?>&cdid=<?php echo $cdid;?>&cid=<?php echo $cid;?>&cl_id=<?php echo $course_class_lid;?>&clid=<?php echo $rid;?>&exam_no=2&typec=<?php echo $course_type ;?>&check_term=<?php echo $check_term;?>&check_grade=<?php echo $check_grade;?>" class="btn green btn-sm" title="คะแนนสอบครั้งที่ 2">
                                                                        <i class="c"></i> </a>-->

                                                                        <?php 
                                                                                if(($check_status2=='1')) { ?>
                                                                            <div><font color='green'>Checked</font></div>   
                                                                        <?php   }elseif(($check_status2=='0')) {	?>	
                                                                            <div><font color='red'>Not Checked</font></div>	     
                                                                        <?php   }else{ ?>
                                                                            <div><font color='red'></font></div>	
                                                                        <?php   } ?>	


                                                                <?php } ?>

                                                                </td>
                                                            </tr>

            <?php 
                }								 
            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
							    </div>
                            </div>
                        </div>

<!------------------------------------------------------------------------------->
                <?php    }elseif(($list == "show")) { ?>

                    <?php
                    $id = filter_input(INPUT_GET, 'id');
                    $check_class = filter_input(INPUT_GET, 'rid');
                    $term_key = filter_input(INPUT_GET, 'term_key');
                    $grade_key = filter_input(INPUT_GET, 'grade_key');
                    if (($id != null)) {

                        $sqlC = "SELECT * FROM tb_classroom_teacher WHERE classroom_t_id = '{$check_class}'";
                        $rowC = row_array($sqlC);

                        $clid = $rowC['classroom_id'];
                        $class = $rowC['classroom_name'];

                        if (isset($term_key)) {
                            //$term_key = $term_key;
                            $sql = "SELECT * FROM tb_term WHERE term_id = '{$term_key}' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                            $row = row_array($sql);
                            $term = "$row[term]/$row[year]";
                        } else if (!isset($term_key)) {
                            $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade_key}' ORDER BY year DESC , term DESC";
                            $row = row_array($sql);
                            $term_key = $row['term_id'];
                            $term = "$row[term]/$row[year]";
                        }

                    ?>
                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ข้อมูลหลักสูตร ภาคเรียน <?php echo $term; ?> <?php echo $grade; ?> / <?php echo $rowC['classroom_name']; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=<?php echo $grade_key; ?>&grade_key=<?php echo $grade_key; ?>&term_key=<?php echo $term_key; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">

                                                <!-- BEGIN PROJECT2-->

                                                <?php
                                                $sql = "SELECT * FROM tb_term a INNER JOIN tb_course_class b ON a.term_id = b.term_id WHERE a.term_id = '{$term_key}' AND b.course_class_id = '{$id}' AND b.classroom_t_id = '{$check_class}' AND b.course_class_status = '1' ORDER BY b.course_class_name ASC";
                                                //echo $sql;
                                                $row = row_array($sql);

                                                $course_name = $row['course_class_name'];
                                                $course_type = $row['course_class_type'];
                                                $memo = $row['memo'];
                                                $classroom = $check_class;

                                                ?>

                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12" align="center">
                                                        <h4><?php echo $course_name; ?></h4>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-<?php echo $grid; ?>-12">


                                                        <!-- Begin: life time stats -->
                                                        <div class="">

                                                            <div class="portlet-body">
                                                                <!--<div class="table-responsive">-->

                                                                    <?php
                                                                    $sqlSub = "SELECT * FROM tb_subject_type ORDER BY subt_id ASC";
                                                                    $listSub = result_array($sqlSub);
                                                                    ?>
                                                                    <?php foreach ($listSub as $key_Sub => $_row) {

                                                                        $subt_id = $_row['subt_id'];
                                                                    ?>


                                                                        <div class="row">
                                                                            <div class="col-<?php echo $grid;?>-12">
                                                                                <div class="card">
                                                                                    <div class="card-header bg-success text-white header-elements-inline">
                                                                                        <h6 class="card-title"><strong><?php echo $_row['subt_name']; ?> (<?php echo $_row['subt_name_eng']; ?>)</strong></h6>
                                                                                    </div>

                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-<?php echo $grid;?>-12">
                                                                                                <!--<div class="table-responsive">-->

                                                                                                    <table class="table table-bordered ">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th> ลำดับ </th>
                                                                                                                <th> รหัสวิชา</th>
                                                                                                                <th> ชื่อวิชา </th>
                                                                                                                <th> ชื่อวิชา(Eng) </th>
                                                                                                                <th> ประเภท</th>
                                                                                                                <th> เวลาเรียน/ปี</th>
                                                                                                                <th> หน่วยกิต</th>
                                                                                                                <th> สำเนา</th>
                                                                                                                <th class="no-print"> จัดการ </th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <?php
                                                                                                            $sql = "SELECT * , a.subject_code AS subject_code , a.subject_name AS subject_name , a.subject_name_eng AS subject_name_eng , a.unit AS unit , a.weight AS weight FROM tb_course_class_detail a INNER JOIN tb_subject b ON a.subject_id = b.subject_id WHERE a.course_class_id='{$id}' AND b.subt_id='{$_row['subt_id']}' AND b.grade_id = '$grade_key' AND a.course_class_detail_status='1' ORDER BY a.sort ASC ,b.subject_id ASC";
                                                                                                            $list = result_array($sql);
                                                                                                            ?>
                                                                                                            <?php foreach ($list as $key => $row) { ?>

                                                                                                                <tr>
                                                                                                                    <!--<td align="center"><?php echo $key + 1; ?></td>-->
                                                                                                                    <td align="center"><?php echo $row['sort']; ?></td>
                                                                                                                    <td align="center"><?php echo $row['subject_code']; ?>&nbsp;</td>
                                                                                                                    <td align="left"><?php echo $row['subject_name']; ?></td>
                                                                                                                    <td align="left"><?php echo $row['subject_name_eng']; ?></td>
                                                                                                                    <td align="center"><?php echo $_row['subt_name']; ?></td>
                                                                                                                    <td align="center"><?php echo $row['unit']; ?></td>
                                                                                                                    <td align="center"><?php echo $row['weight']; ?></td>
                                                                                                                    <td align="center" class="no-print">

                                                                                                                        <!--<a href="" class="btn btn-sm yellow-gold" title="สำเนา">
                                                                                                                                <i class="fa fa-copy"></i> สำเนา</a>-->

                                                                                                                        <!--<a href="ajax/get_copy_subject_score.php?id=<?php echo $row['subject_id']; ?>&cdid=<?php echo $row['course_class_detail_id']; ?>&cid=<?php echo $row['course_class_id']; ?>&rid=<?php echo $classroom; ?>&check_term=<?php echo $check_term; ?>&check_grade=<?php echo $check_grade; ?>" data-toggle="modal" data-id="<?php echo $row['student_id']; ?>" data-target="#CopyScore" class="btn btn-sm yellow-gold" title="สำเนา">
                                                                                                                                <i class="fa fa-copy"></i> สำเนา</a>-->

                                                                                                                    </td>
                                                                                                                    <td align="center" class="no-print">
<form name="form_show_structure" id="form_show_structure" method="GET" action="<?php echo $RunLink->Call_Link_System();?>/?modules=check_subject" accept-charset="utf-8">

                                                                                                                        
                                                                                                                        <input type="hidden" name="modules" id="modules" value="check_subject">
                                                                                                                        <input type="hidden" name="list" id="list" value="show_structure"> 
                                                                                                                        <input type="hidden" name="id" id="id" value="<?php echo $row['subject_id'];?>">
                                                                                                                        <input type="hidden" name="cdid" id="cdid" value="<?php echo $row['course_class_detail_id'];?>">
                                                                                                                        <input type="hidden" name="cid" id="cid" value="<?php echo $row['course_class_id'];?>">
                                                                                                                        <input type="hidden" name="rid" id="rid" value="<?php echo $classroom;?>">   
                                                                                                                        <input type="hidden" name="check_term" id="check_term" value="<?php echo $term_key;?>">
                                                                                                                        <input type="hidden" name="check_grade" id="check_grade" value="<?php echo $grade_key;?>">
                                                                                                                        

                                                                                                                        <button type="submit" name="show_structure" id="show_structure" class="btn btn-outline-primary btn-sm" data-popup="tooltip" title="รายละเอียด" data-placement="bottom" value=""><i class="icon-search4"></i></button>
</form>
                                                                                                                        <!--<a href="?modules=check_subject_teach&id=<?php echo $row['subject_id']; ?>&cdid=<?php echo $row['course_class_detail_id']; ?>&cid=<?php echo $row['course_class_id']; ?>&rid=<?php echo $classroom; ?>&check_term=<?php echo $check_term; ?>&check_grade=<?php echo $check_grade; ?>" class="btn btn-sm green" title="รายละเอียด">
                                                                                                                            <i class="icon-search4"></i> รายละเอียด</a>-->

                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                            <?php } ?>

                                                                                                        </tbody>
                                                                                                    </table>

                                                                                                <!--</div>-->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        




                                                                    <?php } ?>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-<?php echo $grid;?>-12">
                                                                                <div><strong>หมายเหตุ :</strong>&nbsp;<?php echo $memo; ?></div>                                                                        
                                                                            </div>
                                                                        </div>
                                                                                                                

                                                                <!--</div>-->
                                                            </div>
                                                        </div>

                                                        <!-- End: life time stats -->


                                                    </div>
                                                </div>

                                                <!-- END PROJECT2-->

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Success modal -->
                        <div id="modal_theme_success_Add<?php echo $grade_key; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h6 class="modal-title">ฟอร์มข้อมูลรายวิชา</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <form name="subject-data-add" id="subject-data-add" method="post" accept-charset="utf-8">

                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-3">รายวิชา</label>
                                                <div class="col-<?php echo $grid; ?>-9">
                                                    <select class="form-control select" name="subjectid" id="subjectid" data-placeholder="รายวิชา..." required="required">
                                                        <option></option>
                                                        <optgroup label="รายวิชา">
                                                            <?php
                                                            $classSJ_Sql = "SELECT `subject_id`,`subject_code`,`subject_name`,`subject_name_eng` FROM `tb_subject` WHERE `grade_id` = '$grade_key' ORDER BY `subject_name` ASC";
                                                            $classSJ_Row = result_array($classSJ_Sql);
                                                            foreach ($classSJ_Row as $key => $classSJ_Print) {
                                                                if ((is_array($classSJ_Print) && count($classSJ_Print))) {
                                                                    if (($classSJ_Print["subject_id"] == $subject_id)) {
                                                                        $sj_selected = 'selected="selected"';
                                                                    } else {
                                                                        $sj_selected = null;
                                                                    }
                                                            ?>
                                                                    <option value="<?php echo $classSJ_Print["subject_id"]; ?>" <?php echo $sj_selected; ?>><?php echo $classSJ_Print["subject_code"]; ?>-<?php echo $classSJ_Print["subject_name"]; ?>&nbsp;<?php echo $classSJ_Print["subject_name_eng"]; ?></option>
                                                            <?php       } else {
                                                                }
                                                            } ?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>


                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        <button type="button" name="Add_Subject_Data" id="Add_Subject_Data" class="btn btn-primary">บันทึกข้อมูล</button>
                                        <input type="hidden" name="course_key" id="course_key" value="<?php echo $course_id; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /success modal -->


                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    } ?>


                <?php    } elseif (($list == "form_update")) { ?>

                    <?php
                    $id = base64_decode(filter_input(INPUT_GET, 'id'));
                    if (($id != null)) {
                        $sql = "SELECT * FROM tb_course WHERE course_id = '{$id}'";
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
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลจัดเช็ครายวิชา <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=<?php echo $grade_key; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มจัดเช็ครายวิชา</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="check_subject_list_1123_up" id="check_subject_list_1123_up" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เช็ครายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['course_name']; ?>" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลเช็ครายวิชา เช่น โครงสร้างเช็ครายวิชา ระดับชั้นประถมศึกษาปีที่ 1</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เช็ครายวิชาภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="<?php echo $row['course_name_eng']; ?>" placeholder="" required="">
                                                                            <span>กรอกข้อมูลเช็ครายวิชาภาษาอังกฤษ</span>
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
                                                                            <optgroup label="จัดเช็ครายวิชา">
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
                                                                            <input type="text" name="cy" id="cy" class="form-control" value="<?php echo $row['course_year']; ?>" placeholder="" required="required">
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
                                                                    <button type="button" name="Update_check_subject" id="Update_check_subject" class="btn btn-info" value="<?php echo $id; ?>">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    <input type="hidden" name="course_key" id="course_key" value="<?php echo $row['course_id']; ?>">
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
                                        <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลจัดเช็ครายวิชา <?php echo $txt_grade_name; ?></div>
                                        <div class="col-<?php echo $grid; ?>-6" align="right">
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                            <!-- <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=form_add&gid=<?php echo $list; ?>';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มจัดเช็ครายวิชา</button> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <form name="check_subject_list_1123_add" id="check_subject_list_1123_add" method="post" accept-charset="utf-8">
                                                    <div class="row">
                                                        <div class="col-<?php echo $grid; ?>-12">
                                                            <fieldset class="mb-3">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เช็ครายวิชา</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-name-null">
                                                                            <input type="text" name="name" id="name" class="form-control" value="โครงสร้างเช็ครายวิชา ระดับชั้น" placeholder="" required="required">
                                                                            <span>กรอกข้อมูลเช็ครายวิชา เช่น โครงสร้างเช็ครายวิชา ระดับชั้นประถมศึกษาปีที่ 1</span>
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
                                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เช็ครายวิชาภาษาอังกฤษ</label>
                                                                    <div class="col-<?php echo $grid; ?>-10">
                                                                        <div id="add-ename-null">
                                                                            <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="" required="">
                                                                            <span>กรอกข้อมูลเช็ครายวิชาภาษาอังกฤษ</span>
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
                                                                            <optgroup label="จัดเช็ครายวิชา">
                                                                                <?php
                                                                                $sql = "SELECT * FROM  tb_grade ORDER BY grade_name ASC";
                                                                                $tst = result_array($sql);
                                                                                ?>
                                                                                <?php foreach ($tst as $_tst) { ?>
                                                                                    <option <?php echo $_tst['grade_id'] == $list ? "selected" : ""; ?> value="<?php echo $_tst['grade_id'] ?>"><?php echo "$_tst[grade_name]"; ?></option>
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
                                                                            <input type="text" name="cy" id="cy" class="form-control" value="" placeholder="" required="required">
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
                                                                            <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                                                            <span>กรอกข้อมูลหมายเหตุ</span>
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
                                                                    <button type="button" name="Add_check_subject" id="Add_check_subject" class="btn btn-info">บันทึก</button>&nbsp;
                                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
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
<form name="list_class<?php echo $count_color;?>" id="list_class<?php echo $count_color;?>" method="GET" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject">
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

<input name="modules" type="hidden" value="check_subject">
<input name="list"  type="hidden" value="<?php echo $class_Print['grade_id']; ?>">

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