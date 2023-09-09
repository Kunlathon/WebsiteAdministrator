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

//error_reporting (E_ALL ^ E_NOTICE);
//ini_set('display_errors', 'On');

?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
if ((preg_match("/student_data.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="?modules=student_data" class="breadcrumb-item"> นิสิตทั้งหมด</a>

                        <a href="#" class="breadcrumb-item"> ข้อมูลนิสิตทั้งหมด</a>

                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            $manage = filter_input(INPUT_POST, 'manage');
            if (($manage == "profile")) { ?>

            <?php   } else { ?>
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ข้อมูลนิสิตทั้งหมด</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="btn-group">
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data';" class="btn btn-outline-secondary" value="">นิสิตทั้งหมด</button>&nbsp;&nbsp;
                            <button type="button" name="" id="" class="btn btn-outline-success" value="">ระดับชั้น</button>
                        </div>
                    </div>
                </div><br>
            <?php   } ?>


            <?php
            //$manage = filter_input(INPUT_GET, 'manage');

            //$manage = filter_input(INPUT_POST, 'manage');

            if (($manage == "profile")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <?php
                $student_key = filter_input(INPUT_POST, 'student_key');
                $sql = "SELECT * FROM `tb_student` WHERE `student_id` = '{$student_key}'";
                $row = row_array($sql);
                ?>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data';" class="btn btn-outline-success" value="">รายการ</button>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="form_show" id="form_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                            <button type="submit" name="button_show" id="button_show" class="btn btn-outline-success" value="">ประวัติส่วนตัว</button>
                                            <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                            <input type="hidden" name="manage" id="manage" value="profile">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <form name="update_ta" id="update_ta" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-outline-success" value="">แก้ไขประวัติส่วนตัว</button>
                                            <input type="hidden" name="student_key" id="student_key" value="<?php echo $row['student_id']; ?>">
                                            <input type="hidden" name="manage" id="manage" value="form_edit">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <!--<button type="button" name="profile_student_img" id="profile_student_img" class="btn btn-outline-success" value="img">เปลี่ยนรูป</button>-->
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div><br>


                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ชื่อ-สกุล : <?php echo $row["student_name"] . "&nbsp;" . $row["student_surname"]; ?></h4>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-info">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-12">ประวัติส่วนตัว</div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">บัตรประชาชน&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo $row["student_idcard"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ชื่อ-สกุล&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo $row["student_name"]; ?>&nbsp;<?php echo @$row["student_surname"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">Name-Surname&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo $row["student_name_eng"]; ?>&nbsp;<?php echo @$row["student_surname_eng"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ชื่อเล่น&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo $row["nickname"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">เพศ&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        if (($row["gender"] == 1)) {
                                            echo "ชาย";
                                        } elseif (($row["gender"] == 2)) {
                                            echo "หญิง";
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">วันเดือนปีเกิด&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">

                                        <?php
                                        if (($row["birth_day"] == "" or $row["birth_day"] == "0000-00-00")) {
                                            echo "-";
                                        } else {
                                            $copy_date = date("d-m-Y", strtotime($row["birth_day"]));
                                            $data_age = new dateofbirthRS($copy_date);
                                            echo $row["birth_day"] . " (" . $data_age->agestr . ")";
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">รหัสนิสิต&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9"><?php echo $row["student_id"]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ระดับชั้น&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        $sql = "SELECT `grade_name`,`grade_name_eng` FROM `tb_grade` WHERE `grade_id`='{$row["grade_id"]}'";
                                        $cc = row_array($sql);
                                        if ((is_array($cc) && count($cc))) {
                                            echo $cc["grade_name"] . " (" . $cc["grade_name_eng"] . ")";
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-3">ห้องเรียน&nbsp;:&nbsp;</div>
                                    <div class="col-<?php echo $grid; ?>-9">
                                        <?php
                                        $sql = "SELECT `classroom_name` FROM `tb_classroom` WHERE `classroom_id`='{$row["student_class"]}';";
                                        $cc = row_array($sql);
                                        if ((is_array($cc) && count($cc))) {
                                            echo $cc["classroom_name"];
                                        } else {
                                            echo "-";
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } elseif (($manage == "show_form_excel")) {

                require_once("js_code/tool_js/PHPExcel-1.8/Classes/PHPExcel.php");
                include("js_code/tool_js/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");

                // include 'config/connect.ini.php';
                // include 'config/fnc.php';

                $form_excel_name = $_FILES["upsd"]["tmp_name"];

                $inputFileName = "$form_excel_name";
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objReader->setReadDataOnly(true);
                $objPHPExcel = $objReader->load($inputFileName);

                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
                $highestRow = $objWorksheet->getHighestRow();
                $highestColumn = $objWorksheet->getHighestColumn();

                $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
                $headingsArray = $headingsArray[1];

                $r = -1;
                $namedDataArray = array();
                for ($row = 2; $row <= $highestRow; ++$row) {
                    $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                        ++$r;
                        foreach ($headingsArray as $columnKey => $columnHeading) {
                            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                        }
                    }
                }

            ?>

                <?php
                $aid = check_session("admin_id_lcm");
                $update = date('Y-m-d H:i:s');
                $count_all_esd = 0;
                $count_miss = 0;
                $count_save = 0;
                $count_error = 0;
                foreach ($namedDataArray as $excel_student_data) {


                    if (($excel_student_data["ชื่อ*"] != null and $excel_student_data["รหัสนิสิต"] != null and $excel_student_data["ระดับชั้น"] != null and $excel_student_data["ห้องเรียน"] != null and $excel_student_data["สถานะนิสิต"] != null)) {

                        $txt_grade = $excel_student_data["ระดับชั้น"];
                        $grade_sql = "SELECT `grade_id` FROM `tb_grade` WHERE `grade_name`='{$txt_grade}'";
                        $grade_rs = result_array($grade_sql);
                        foreach ($grade_rs as $grade_row) {
                            if ((is_array($grade_row) && count($grade_row))) {
                                $grade = $grade_row["grade_id"];
                            } else {
                                $grade = null;
                            }
                        }

                        $txt_classroom = $excel_student_data["ห้องเรียน"];
                        $classroom_sql = "SELECT `classroom_id` FROM `tb_classroom` WHERE `classroom_name`='{$txt_classroom}';";
                        $classroom_rs = result_array($classroom_sql);
                        foreach ($classroom_rs as $classroom_row) {
                            if ((is_array($classroom_row) && count($classroom_row))) {
                                $classroom = $classroom_row["classroom_id"];
                            } else {
                                $classroom = null;
                            }
                        }

                        $txt_status = $excel_student_data["สถานะนิสิต"];
                        if (($txt_status == "ปกติ")) {
                            $status = "1";
                        } elseif (($txt_status == "ลาออก")) {
                            $status = "2";
                        } elseif (($txt_status == "จบการศึกษา")) {
                            $status = "3";
                        } elseif (($txt_status == "ลาพัก")) {
                            $status = "4";
                        } else {
                            $status = null;
                        }

                        $txt_gender = $excel_student_data["เพศ"];
                        if (($txt_gender == "ชาย")) {
                            $gender = "1";
                        } elseif (($txt_gender == "หญิง")) {
                            $gender = "2";
                        } else {
                            $gender = "0";
                        }

                        $count_test_error = 0;
                        if (($grade == null)) {
                            $count_test_error = $count_test_error + 1;
                        ?>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="alert alert-yellow alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-4">รหัสนิสิต&nbsp;:&nbsp;<b><?php echo $excel_student_data["รหัสนิสิต"];?></b>&nbsp;</div>
                                            <div class="col-<?php echo $grid;?>-8">ข้อผิดพลาด&nbsp;:&nbsp;ระดับชั้น&nbsp;<b><?php echo $txt_grade;?></b>&nbsp;ไมพบในฐานข้อมูล</div>
                                        </div>
                                </div>                
                            </div>
                        </div>
                        <?php
                        } else {
                            $count_test_error = $count_test_error + 0;
                        }

                        if (($classroom == null)) {
                            $count_test_error = $count_test_error + 1;
                        ?>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="alert alert-yellow alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-4">รหัสนิสิต&nbsp;:&nbsp;<b><?php echo $excel_student_data["รหัสนิสิต"];?></b>&nbsp;</div>
                                            <div class="col-<?php echo $grid;?>-8">ข้อผิดพลาด&nbsp;:&nbsp;ห้องเรียน&nbsp;<b><?php echo $txt_classroom;?></b>&nbsp;ไมพบในฐานข้อมูล</div>
                                        </div>
                                </div>                
                            </div>
                        </div>
                        <?php
                        } else {
                            $count_test_error = $count_test_error + 0;
                        }

                        if (($status == null)) {
                            $count_test_error = $count_test_error + 1; ?> 
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="alert alert-yellow alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-4">รหัสนิสิต&nbsp;:&nbsp;<b><?php echo $excel_student_data["รหัสนิสิต"];?></b>&nbsp;</div>
                                            <div class="col-<?php echo $grid;?>-8">ข้อผิดพลาด&nbsp;:&nbsp;สถานะนิสิต&nbsp;<b><?php echo $txt_status;?></b>&nbsp;ไมพบในฐานข้อมูล</div>
                                        </div>
                                </div>                
                            </div>
                        </div>                        
                        <?php
                        } else {
                            $count_test_error = $count_test_error + 0;
                        }


                        if (($count_test_error >= 1)) {
                            $count_miss = $count_miss + 1;
                            $count_test_error = 0;
                        } else {

                            

                            if((is_null($excel_student_data["บัตรประชาชน"]))){
                                $idcard = $excel_student_data["เลขพาสปอร์ต"];
                            }else{
                                $idcard = $excel_student_data["บัตรประชาชน"];
                            }

                            $name = $excel_student_data["ชื่อ*"];
                            $surname = $excel_student_data["นามสกุล"];
                            $ename = $excel_student_data["ชื่อภาษาอังกฤษ"];
                            $esurname = $excel_student_data["นามสกุลภาษาอังกฤษ"];
                            $birthday = $excel_student_data["วันเดือนปีเกิด ค.ศ. (1994-01-01)"];
                            if (($birthday != null)) {
                                $birthday = date("Y-m-d", strtotime($birthday));
                            } else {
                                $birthday = "null";
                            }
                            $username = $excel_student_data["รหัสนิสิต"];
                            $id = $username;
                            //$password = "aba@123456";
                            $password=trim($idcard);
                            $nickname = $excel_student_data["ชื่อเล่น"];
                            //------------------------------------------------
                            //echo $excel_student_data["ชื่อ*"]."<br>".@$username=$excel_student_data["รหัสนิสิต"]."<br>";
                            //------------------------------------------------
                            $sqlTer = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
                            $rowTer = row_array($sqlTer);
                            if ((is_array($rowTer) && count($rowTer))) {
                                $check_term = $rowTer['term_id'];
                            } else {
                                $check_term = "-";
                            }
                            //------------------------------------------------  

                            if((is_numeric($username))){

                                $sql_username = "SELECT COUNT(`student_id`) AS `count_suername` FROM tb_student WHERE student_id = '{$username}'";
                                $row_username = row_array($sql_username);
                                if ((is_array($row_username) && count($row_username))) {
                                    $count_suername = $row_username["count_suername"];
                                    if (($count_suername >= 1)) {
                                        $count_suername = "-";
                                    } else {
                                        $count_suername=null;
                                    }
                                } else {
                                    $count_suername = "-";
                                }

                            }else{
                                $count_suername = "-";
                            }




                            //------------------------------------------------                            
                            

                            if(($check_term!="-")){

                                $sql_course = "SELECT COUNT(`course_s_id`) AS `course_student` FROM tb_course_student WHERE term_id='{$check_term}' AND grade_id='{$grade}' AND student_id='{$username}' AND course_s_status='1'";
                                $row_course = row_array($sql_course);
                                if ((is_array($row_course) && count($row_course))) {
                                    $course_student = $row_course["course_student"];
                                    if (($course_student >= 1)) {
                                        $course_student = "-";
                                    } else {
                                        $course_student=null;
                                    }
                                } else {
                                    $course_student = "-";
                                }

                            }else{
                                $course_student = 0;
                                //if check_term is null set course_student=0 by beer
                            }



                            $test_count_error = 0;
                            /*if (($check_term == "-")) {
                                $test_count_error = $test_count_error + 1;
                            } else {
                                $test_count_error = $test_count_error + 0;
                            }*/

                            if (($count_suername == "-")) {
                                $test_count_error = $test_count_error + 1;
                            } else {
                                $test_count_error = $test_count_error + 0;
                            }

                            if (($course_student == "-")) {
                                $test_count_error = $test_count_error + 1;
                            } else {
                                $test_count_error = $test_count_error + 0;
                            }

                            if (($test_count_error >= 1)) {
                                $count_error = $count_error + 1;
                                $test_count_error = 0;
                            } else {
                                //-------------------------------------------------------------
 
                                if(($check_term!="-")){


                                    //$pass = MD5($password);
                                    $pass=$password;

                                    if(($birthday!=null)){

                                        $data1 = array(
                                            "student_id" => $username,
                                            "student_idcard" => $idcard,
                                            "student_no" => 0,
                                            "student_class" => $classroom,
                                            "student_username" => $username,
                                            "student_password" => $pass,
                                            "student_name" => $name,
                                            "student_surname" => $surname,
                                            "student_name_eng" => $ename,
                                            "student_surname_eng" => $esurname,
                                            "nickname" => $nickname,
                                            "gender" => $gender,
                                            "grade_id" => $grade,
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "student_status" => 1
                                        );

                                    }else{

                                        $data1 = array(
                                            "student_id" => $username,
                                            "student_idcard" => $idcard,
                                            "student_no" => 0,
                                            "student_class" => $classroom,
                                            "student_username" => $username,
                                            "student_password" => $pass,
                                            "student_name" => $name,
                                            "student_surname" => $surname,
                                            "student_name_eng" => $ename,
                                            "student_surname_eng" => $esurname,
                                            "nickname" => $nickname,
                                            "gender" => $gender,
                                            "birth_day" => $birthday,
                                            "grade_id" => $grade,
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "student_status" => 1
                                        );     

                                    }


    
                                    insert("tb_student", $data1);
    
                                    //Add Classroom
    
                                    $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
                                    $row = row_array($sql);
                                    $check_term = $row['term_id'];
    
                                    $sqlT = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$grade}' ORDER BY classroom_t_id DESC";
                                    $listT = result_array($sqlT);
    
                                    foreach ($listT as $rowT) {
    
                                        $classroomT = $rowT['classroom_t_id'];
    
                                        $data2 = array(
                                            "classroom_t_id" => $classroomT,
                                            "student_no" => 0,
                                            "student_id" => $username,
                                            "term_id" => $check_term,
                                            "grade_id" => $grade,
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "classroom_detail_status" => 1
    
                                        );
    
                                        insert("tb_classroom_detail", $data2);
                                    }
    
                                    //Add Course
    
                                    $sqlC = "SELECT * FROM tb_course_class a INNER JOIN tb_term b ON a.term_id = b.term_id  WHERE b.term_id = '{$check_term}' AND a.grade_id='{$grade}' AND a.classroom_t_id = '{$classroomT}' ORDER BY a.course_class_name ASC, a.course_class_year ASC";
                                    $rowC = row_array($sqlC);
    
                                    $cid = $rowC['course_class_id'];
    
                                    $sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$cid}' AND course_class_status='1' ";
                                    $row = row_array($sql);
    
                                    $course_class_id = $row['course_class_id'];
    
                                    $sqlT = "SELECT *,MAX(course_s_id) AS ID FROM tb_course_student";
                                    $tcrT = row_array($sqlT);
    
                                    $C_ID = $tcrT['ID'] + 1;
    
                                    if((is_null($course_class_id))){

                                        $data3 = array(
                                            "course_s_id" => $C_ID,
                                            "term_id" => $check_term,
                                            "grade_id" => $grade,
                                            "student_id" => $username,
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "course_s_status" => 1,
        
                                        );  

                                    }else{

                                        $data3 = array(
                                            "course_s_id" => $C_ID,
                                            "course_class_id" => $course_class_id,
                                            "term_id" => $check_term,
                                            "grade_id" => $grade,
                                            "student_id" => $username,
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "course_s_status" => 1,
        
                                        );  

                                    }

    
                                    insert("tb_course_student", $data3);
    
                                    $sql = "SELECT * FROM tb_course_class_level a INNER JOIN tb_course_class_detail b ON a.course_class_detail_id = b.course_class_detail_id WHERE b.course_class_id = '{$course_class_id}' AND a.course_class_level_status='1' ";
                                    $list = result_array($sql);
    
                                    foreach ($list as $key => $row) {
    
                                        $course_class_detail_id = $row['course_class_detail_id'];
    
                                        $data4 = array(
                                            "course_s_id" => $C_ID,
                                            "course_class_detail_id" => $row['course_class_detail_id'],
                                            "course_class_level_id" => $row['course_class_level_id'],
                                            "course_class_level_check" => 0,
                                            "score1" => "",
                                            "score2" => "",
                                            "score" => "",
                                            "grade" => "",
                                            "result" => "",
                                            "admin_id" => $aid,
                                            "admin_update" => $update,
                                            "course_s_detail_status" => 1,
                                        );
    
                                        insert("tb_course_student_detail", $data4);
                                    }

                                    $count_save = $count_save + 1;

                                }else{
                                    
                                    //$pass = MD5($password);
                                    $pass=$password;

                                        if((is_null($birthday))){

                                            $data1 = array(
                                                "student_id" => $username,
                                                "student_idcard" => $idcard,
                                                "student_no" => 0,
                                                "student_class" => $classroom,
                                                "student_username" => $username,
                                                "student_password" => $pass,
                                                "student_name" => $name,
                                                "student_surname" => $surname,
                                                "student_name_eng" => $ename,
                                                "student_surname_eng" => $esurname,
                                                "nickname" => $nickname,
                                                "gender" => $gender,
                                                "grade_id" => $grade,
                                                "admin_id" => $aid,
                                                "admin_update" => $update,
                                                "student_status" => 1
                                            );  

                                        }else{

                                            $data1 = array(
                                                "student_id" => $username,
                                                "student_idcard" => $idcard,
                                                "student_no" => 0,
                                                "student_class" => $classroom,
                                                "student_username" => $username,
                                                "student_password" => $pass,
                                                "student_name" => $name,
                                                "student_surname" => $surname,
                                                "student_name_eng" => $ename,
                                                "student_surname_eng" => $esurname,
                                                "nickname" => $nickname,
                                                "gender" => $gender,
                                                "birth_day" => $birthday,
                                                "grade_id" => $grade,
                                                "admin_id" => $aid,
                                                "admin_update" => $update,
                                                "student_status" => 1
                                            );  

                                        }


    
                                    insert("tb_student", $data1);

                                    $count_save = $count_save + 1;

                                }

                                
                                //------------------------------------------------------------------

                            }
                        }
                    } else {
                        $count_miss = $count_miss + 1;
                        ?>
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                        <div class="row">
                                            <div class="col-<?php echo $grid;?>-4">รหัสนิสิต&nbsp;:&nbsp;<b><?php echo $excel_student_data["รหัสนิสิต"];?></b>&nbsp;</div>
                                            <div class="col-<?php echo $grid;?>-8">ข้อผิดพลาด&nbsp;:&nbsp;ข้อมูลส่วนสำคัญยังไม่ได้ระบุ *(ชื่อ/รหัสนิสิต/ระดับชั้น/ห้องเรียน/สถานะนิสิต)&nbsp;ต้องระบุข้อมูล 5 ส่วนนี้ให้ครบ<b><?php echo $txt_classroom;?></b>&nbsp; </div>
                                        </div>
                                </div>                
                            </div>
                        </div>
                        <?php
                    }
                    $count_all_esd = $count_all_esd + 1;
                }
                ?>





                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">รายงานผลการอัพข้อมูล</div>
                                <div class="col-<?php echo $grid; ?>-6">
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
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_all_esd; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">ข้อมูลทั้งหมด</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-refresh icon-3x text-info"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_miss; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">ข้อมูลไม่ครบ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-alert icon-3x text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_save; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">บันทึกข้อมูลสำเร็จ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-check icon-3x text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <div class="card card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="font-weight-semibold mb-0"><?php echo $count_error; ?></h3>
                                                    <span class="text-uppercase font-size-sm text-muted">บันทึกข้อมูลไม่สำเร็จ</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-database-remove icon-3x text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php
                $update_file_time = date("Y_m_d_H_i_s", strtotime($update));
                $excel_name = $_FILES["upsd"]["name"];
                $excel_type = $_FILES["upsd"]["type"];
                //new file Name
                $expFile = explode('.', $excel_name);
                $fileType = $expFile[count($expFile) - 1];
                //new file Name end
                $excel_new_name = "all_student" . "(" . $aid . ")" . $update_file_time . "." . $fileType;
                $excel_tmp = $_FILES["upsd"]["tmp_name"];
                $excel_size = $_FILES["upsd"]["size"];
                move_uploaded_file($excel_tmp, 'uploads/student/' . $excel_new_name);
                ?>





            <?php } elseif (($manage == "form_add_excel")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลนิสิต</div>
                                <div class="col-<?php echo $grid; ?>-6">
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
                                <form name="up_file_student_data" id="up_file_student_data" method="post" enctype="multipart/form-data" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data">
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <div class="card card-body bg-primary text-white has-bg-image">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="mb-0">ดาวน์โหลดไฟส์อัพโหลดข้อมูลนิสิตท้งหมด</h4>
                                                        <span class="text-uppercase font-size-xs">ชนิดไฟส์ Excel นานสกุล <code>.xlsx</code></span>
                                                    </div>

                                                    <div class="ml-3 align-self-center">
                                                        <button type="button" class="btn btn-success btn-float" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/uploads/example/all_student.xlsx';"><i class="icon-file-excel icon-2x"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <div class="form-group row">
                                                <div class="col-<?php echo $grid; ?>-9">
                                                    <input type="file" name="upsd" id="upsd" class="UpdateFile_StudentDate" data-fouc>
                                                    <span class="form-text text-muted">นานสกุลไฟส์ <code>xls</code>,<code>xlsx</code>,<code>csv</code></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="manage" id="manage" value="show_form_excel">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php } elseif (($manage == "form_add")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มข้อมูลนิสิต</div>
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
                                        <form name="student_data_add" id="student_data_add">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">บัตรประชาชน</label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <input type="text" name="idcard" id="idcard" class="form-control" value="" placeholder="กรอกข้อมูลบัตรประชาชน" required="required">
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
                                                                <div id="name-null">
                                                                    <input type="text" name="name" id="name" class="form-control" value="" placeholder="กรอกข้อมูลชื่อ" required="required">
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
                                                                <div id="surname-null">
                                                                    <input type="text" name="surname" id="surname" class="form-control" value="" placeholder="กรอกข้อมูลนามสกุล" required="required">
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
                                                                <div id="ename-null">
                                                                    <input type="text" name="ename" id="ename" class="form-control" value="" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">
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
                                                                <div id="esurname-null">
                                                                    <input type="text" name="esurname" id="esurname" class="form-control" value="" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">
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
                                                                <div id="nickname-null">
                                                                    <input type="text" name="nickname" id="nickname" class="form-control" value="" placeholder="กรอกกรอกข้อมูลชื่อเล่น" required="required">
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
                                                                        <option value="1">ชาย</option>
                                                                        <option value="2">หญิง</option>
                                                                        <option value="0">ไม่ระบุ</option>
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
                                                                <input type="text" name="birthday" id="birthday" class="form-control pickadate-accessibility rounded-right" value="" placeholder="เลือกวันเดือนปีเกิด" required="required">
                                                                <span>กรอกวันเดือนปีเกิด</span>
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
                                                                <div id="username-null">
                                                                    <input type="text" name="username" id="username" class="form-control" value="" placeholder="กรอกข้อมูลรหัสนิสิต ใช่เป็น Username" required="required">
                                                                    <span>กรอกข้อมูลรหัสนิสิต ใช้เป็น Username</span>
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
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">Password <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <div id="password-null">
                                                                    <input type="text" name="password" id="password" class="form-control" value="" placeholder="ข้อมูล Password เบื้องต้น เลขประจำตัวประชาชน" required="required">
                                                                    <span>ข้อมูล Password เบื้องต้น เลขประจำตัวประชาชน</span>
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
                                                                            <option value="<?php echo $_cc['grade_id']; ?>"><?php echo $_cc['grade_name']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="grade-null"></div>
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
                                                                            <option value="<?php echo $_cc['classroom_id']; ?>"><?php echo $_cc['classroom_name']; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="classroom-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <!--<div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-3">สถานะนิสิต <font style="color: red;">*</font></label>
                                                            <div class="col-<?php echo $grid; ?>-9">
                                                                <select class="form-control select" name="status" id="status" data-placeholder="เลือกสถานะนิสิต.." required="required">
                                                                    <option></option>
                                                                    <optgroup label="สถานะนิสิต">
                                                                        <option value="1">ปกติ</option>
                                                                        <option value="2">ลาออก</option>
                                                                        <option value="3">จบการศึกษา</option>
                                                                        <option value="4">ลาพัก</option>
                                                                    </optgroup>
                                                                </select>
                                                                <div id="status-null"></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>-->
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <fieldset class="mb-3">
                                                        <div class="form-group row">
                                                            <button type="button" name="Add_Student_Data" id="Add_Student_Data" class="btn btn-info" value="">บันทึก</button>&nbsp;
                                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
<!--hidden-->
<input type="hidden" name="status" id="status" value="1">
<!--hidden end-->
                                            </from>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--The test-->
                <div id="test_set"></div>
                <!--The test-->
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "form_edit")) { ?>
                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                //@$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                @$student_key = filter_input(INPUT_POST, 'student_key');
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
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=student_data';</script>");
                } ?>

                <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } elseif (($manage == "password")) { ?>

                <?php
                //@$student_key = base64_decode(filter_input(INPUT_GET, 'student_key'));
                @$student_key = filter_input(INPUT_POST, 'student_key');
                if (($student_key != "")) {

                    $sql = "SELECT * FROM tb_student WHERE student_id = '{$student_key}'";
                    $row = row_array($sql);

                ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="toast" style="opacity: 1; max-width: none;">
                                <div class="toast-header bg-success border-success">
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <span class="font-weight-semibold mr-auto">ฟอร์มเปลี่ยนรหัสผ่าน</span>
                                    </div>
                                    <div class="col-<?php echo $grid; ?>-6">
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
                                <div class="toast-body">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">รหัส</label>
                                                    <div class="col-<?php echo $grid; ?>-8">
                                                        <div class="form-group form-group-feedback form-group-feedback-left"><?php echo @$row['student_id']; ?></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">ชื่อ-นามสกุล</label>
                                                    <div class="col-<?php echo $grid; ?>-8">
                                                        <div class="form-group form-group-feedback form-group-feedback-left"><?php echo $row['student_name'] . " " . @$row['student_surname'] . " (" . @$row['nickname'] . ")"; ?></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-4">รหัสผ่านใหม่</label>
                                                    <div class="col-<?php echo $grid; ?>-8">
                                                        <div id="password-edit">
                                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                                <input type="text" name="student_password" id="student_password" class="form-control form-control-lg" value="" required="required">
                                                                <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น เลขประจำตัวประชาชน)</span>
                                                                <div class="form-control-feedback form-control-feedback-lg">
                                                                    <i class="icon-key"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3" style="float: right">
                                                <button type="button" name="student_data_password" id="student_data_password" class="btn btn-info">บันทึก</button>&nbsp;
                                                <button type="reset" name="changepass_cancel" id="changepass_cancel" class="btn btn-danger">ยกเลิก</button>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <input type="hidden" name="student_key" id="student_key" class="form-control form-control-lg" value="<?php echo $row['student_id']; ?>">
                                    <input type="hidden" name="student_name" id="student_name" class="form-control form-control-lg" value="<?php echo $row['student_name'] . " " . $row['student_surname'] . " (" . $row['nickname'] . ")"; ?>" required="required" readonly="readonly">

                                </div>
                            </div>
                        </div>

                        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <?php   } else {
                    $linkcopy = $RunLink->Call_Link_System();
                    exit("<script>window.location='$linkcopy/?modules=student_data';</script>");
                } ?>

                <?php   } else { ?>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลนิสิตทั้งหมด</div>

                                    <div class="col-<?php echo $grid; ?>-6">
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

                                            <div id="run_data_sd"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } ?>

                    </div>

                    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php   } else {
        }
    }
            ?>