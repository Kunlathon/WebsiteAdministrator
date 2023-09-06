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

<?php include '../../config/connect.ini.php'; ?>
<?php include '../../config/fnc.php'; ?>

<?php check_login('admin_username_aba', 'login.php'); ?>

<?php
$aid = check_session("admin_id_aba");
$update_date = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action == "create")) {

    $classroomid = filter_input(INPUT_POST, 'classroomid');
    $teacher1 = filter_input(INPUT_POST, 'teacher1');
    $position1 = filter_input(INPUT_POST, 'position1');
    $teacher2 = filter_input(INPUT_POST, 'teacher2');
    $teacher3 = filter_input(INPUT_POST, 'teacher3');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');

    function fnc_count($classroomid, $teacher1, $teacher2, $term_key, $grade_key)
    {
        $s = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '$classroomid' AND teacher_id1 = '$teacher1' AND teacher_id2 = '$teacher2' AND term_id = '$term_key' AND grade_id = '$grade_key'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($classroomid, $teacher1, $teacher2, $term_key, $grade_key);

    if (($check)) {

        $sql = "SELECT * FROM tb_classroom WHERE classroom_id = '$classroomid'";
        $row = row_array($sql);

        $name = $row['classroom_name'];
        $ename = $row['classroom_name_eng'];

        $data = array(
            "classroom_id" => $classroomid,
            "classroom_name" => $name,
            "classroom_name_eng" => $ename,
            //"classroom_name_eng" => $ename ,
            //"classroom_class" => $class ,
            //"student_num" => $num ,						
            //"building_id" => $building ,
            "teacher_id1" => $teacher1,
            "position_id1" => $position1,
            "teacher_id2" => $teacher2,
            "teacher_id3" => $teacher3,
            "term_id" => $term_key,
            "grade_id" => $grade_key,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "classroom_status" => 1

        );

        insert("tb_classroom_teacher", $data);
        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "update")) {

    $classroomid = filter_input(INPUT_POST, 'classroomid');
    $teacher1 = filter_input(INPUT_POST, 'teacher1');
    $position1 = filter_input(INPUT_POST, 'position1');
    $teacher2 = filter_input(INPUT_POST, 'teacher2');
    $teacher3 = filter_input(INPUT_POST, 'teacher3');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');

    $sql = "SELECT * FROM tb_classroom WHERE classroom_id = '$classroomid'";
    $row = row_array($sql);

    $name = $row['classroom_name'];
    $ename = $row['classroom_name_eng'];

    $data = array(
        "classroom_id" => $classroomid,
        "classroom_name" => $name,
        "classroom_name_eng" => $ename,
        //"classroom_name_eng" => $ename ,
        //"classroom_class" => $class ,
        //"student_num" => $num ,						
        //"building_id" => $building ,
        "teacher_id1" => $teacher1,
        "position_id1" => $position1,
        "teacher_id2" => $teacher2,
        "teacher_id3" => $teacher3,
        "term_id" => $term_key,
        "grade_id" => $grade_key,
        "admin_id" => $aid,
        "admin_update" => $update_date

    );

    update("tb_classroom_teacher", $data, "classroom_t_id = '{$classroom_t_key}'");
    echo "no_error";
} elseif (($action == "delete")) {
    // Delete tb_classroom_teacher
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$classroom_t_key}'");

    echo "no_error";
} elseif (($action == "change_student_no")) {

    $student_key = filter_input(INPUT_POST, 'student_key');
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $stu_no = filter_input(INPUT_POST, 'stu_no');
    $stu_status = filter_input(INPUT_POST, 'stu_status');
    $dateout = filter_input(INPUT_POST, 'dateout');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');

    if ($stu_status == "2") {
        //$dateout = date('Y-m-d');    
        $data = array(
            "student_no" => $stu_no,
            "date_out" => $dateout,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "student_status" => $stu_status
        );
    } else {
        $data = array(
            "student_no" => $stu_no,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "student_status" => $stu_status
        );
    }

    update("tb_student", $data, "student_id = '{$student_key}'");

    $data2 = array(
        "student_no" => $stu_no,
        "admin_id" => $aid,
        "admin_update" => $update_date

    );
    update("tb_classroom_detail", $data2, "student_id = '{$student_key}'");

    /*$data3 = array(
                "student_no" => $stu_no
    
        );
    
        update("tb_assessment_classroom_detail", $data3, "student_id = '{$id}'");*/

    if ($stu_status == "2") {
        $table = "tb_classroom_detail";
        delete($table, "classroom_t_id = '{$classroom_t_key}' AND student_id = '{$student_key}' AND term_id = '{$term_key}' AND grade_id = '{$grade_key}'");
    }

    echo "no_error";
} elseif (($action == "update_student")) {

    $name = filter_input(INPUT_POST, 'name'); //*
    //--------------------------------------------------------
    $username = filter_input(INPUT_POST, 'username'); //*
    //--------------------------------------------------------
    $password = filter_input(INPUT_POST, 'password'); //*
    $grade = filter_input(INPUT_POST, 'grade'); //*
    $classroom = filter_input(INPUT_POST, 'classroom'); //*
    $status = filter_input(INPUT_POST, 'status'); //*

    $student_key = filter_input(INPUT_POST, 'student_key'); //

    if ((filter_input(INPUT_POST, 'idcard') != null)) {
        $idcard = filter_input(INPUT_POST, 'idcard');
    } else {
        $idcard = "-";
    }

    if ((filter_input(INPUT_POST, 'surname') != null)) {
        $surname = filter_input(INPUT_POST, 'surname');
    } else {
        $surname = "-";
    }

    if ((filter_input(INPUT_POST, 'ename') != null)) {
        $ename = filter_input(INPUT_POST, 'ename');
    } else {
        $ename = "-";
    }

    if ((filter_input(INPUT_POST, 'esurname') != null)) {
        $esurname = filter_input(INPUT_POST, 'esurname');
    } else {
        $esurname = "-";
    }

    if ((filter_input(INPUT_POST, 'gender') != null)) {
        $gender = filter_input(INPUT_POST, 'gender');
    } else {
        $gender = "0";
    }

    $birthday = filter_input(INPUT_POST, 'birthday');

    if ((filter_input(INPUT_POST, 'birthday') != null)) {
        $birthday = date("Y-m-d", strtotime($birthday));
    } else {
        $birthday = date("Y-m-d", strtotime("0000-00-00"));
    }

    if ((filter_input(INPUT_POST, 'nickname') != null)) {
        $nickname = filter_input(INPUT_POST, 'nickname');
    } else {
        $nickname = "-";
    }

    if (($status == 2)) {

        $dateout = date('Y-m-d');
        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "date_out" => $dateout, "admin_id" => $aid, "admin_update" => $update_date, "student_status" => $status
        );
    } else {

        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "admin_id" => $aid, "admin_update" => $update_date, "student_status" => $status
        );
    }

    update("tb_student", $data, "student_id = '{$student_key}'");
    echo "no_error";
} elseif (($action == "delete_student_classroom_detail")) {
    // Delete tb_classroom_teacher
    $classroom_detail_key = filter_input(INPUT_POST, 'classroom_detail_key');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$classroom_detail_key}'");

    echo "no_error";
} elseif (($action == "add_student_class")) {

    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $student = filter_input(INPUT_POST, 'student');
    $note = filter_input(INPUT_POST, 'note');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $cid = filter_input(INPUT_POST, 'cid');

    function fnc_count($student, $term_key, $grade_key)
    {
        $s = "SELECT * FROM tb_classroom_detail WHERE student_id = '$student' AND term_id = '$term_key' AND grade_id= '$grade_key'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($student, $term_key, $grade_key);

    if ($check) {

        $sql = "SELECT * FROM tb_student WHERE student_id = '{$student}' AND student_status = '1'";
        $row = row_array($sql);

        $studentid = $row['student_id'];
        $stu_no = $row['student_no'];

        $data = array(
            "classroom_t_id" => $classroom_t_key,
            "student_no" => $stu_no,
            "student_id" => $studentid,
            "memo" => $note,
            "term_id" => $term_key,
            "grade_id" => $grade_key,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "classroom_detail_status" => 1,

        );

        insert("tb_classroom_detail", $data);

        $data2 = array(
            "student_class" => $cid,
            "memo" => $note,
            "admin_id" => $aid,
            "admin_update" => $update_date

        );

        update("tb_student", $data2, "student_id = '{$student}'");
        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "insert_student_class")) {

    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    //$classroom = filter_input(INPUT_POST, 'classroom');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $course_class_id = filter_input(INPUT_POST, 'class_id');
    $stu_no=0;



    //update code by beer
        $ClassroomTeacherSql="SELECT `classroom_id`,`classroom_name`
                              FROM `tb_classroom_teacher` 
                              WHERE `classroom_t_id`='{$classroom_t_key}';";
        $ClassroomTeacherRs=result_array($ClassroomTeacherSql);
        foreach($ClassroomTeacherRs as $key => $ClassroomTeacherRow){
            $classroom_key=$ClassroomTeacherRow["classroom_id"];
            $classroom_name=$ClassroomTeacherRow["classroom_name"];
        }    
    //update code by beer end
    
    $sql = "SELECT * FROM tb_student WHERE student_class = '{$classroom_key}' AND student_status = '1' ORDER BY student_id ASC";
    $list = result_array($sql);         

    foreach ($list as $key => $row) {

        $studentid = $row['student_id'];
        $stu_no = $key + 1;

        $sqlClass = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id = '$classroom_t_key' AND student_id = '$studentid' AND term_id = '$term_key' AND grade_id = '$grade_key'";
        $resultClass = row_array($sqlClass);

            if ($resultClass > 0) {

            } else {

                $data = array(
                    "classroom_t_id" => $classroom_t_key,
                    "student_no" => $stu_no,
                    "student_id" => $studentid,
                    "memo" => $note,
                    "term_id" => $term_key,
                    "grade_id" => $grade_key,
                    "admin_id" => $aid,
                    "admin_update" => $update_date,
                    "classroom_detail_status" => 1,

                );

                insert("tb_classroom_detail", $data);

                $data2 = array(
                    "student_class" => $classroom_key,
                    "memo" => $note,
                    "admin_id" => $aid,
                    "admin_update" => $update_date

                );

                update("tb_student", $data2, "student_id = '{$studentid}'");

    //test code
                $sqlT = "SELECT *,MAX(course_s_id) AS ID FROM tb_course_student";
                $tcrT = row_array($sqlT);

                $C_ID = $tcrT['ID'] + 1;

                $data = array(
                    "course_s_id" => $C_ID ,
                    "course_class_id" => $course_class_id ,
                    "term_id" => $term ,
                    "grade_id" => $grade ,
                    "student_id" => $stuid ,
                    "admin_id" => $aid ,
                    "admin_update" => $update ,
                    "course_s_status" => 1 ,		

                );

                insert("tb_course_student", $data);

                $sql = "SELECT * FROM tb_course_class_level a INNER JOIN tb_course_class_detail b ON a.course_class_detail_id = b.course_class_detail_id WHERE b.course_class_id = '{$course_class_id}' AND a.course_class_level_status='1' ";
                $list = result_array($sql);

                foreach ($list as $key => $row) { 

                    $data = array(
                        "course_s_id" => $C_ID ,
                        "course_class_detail_id" => $row['course_class_detail_id'] ,	
                        "course_class_level_id" => $row['course_class_level_id'] ,	
                        "course_class_level_check" => 0 ,	
                        "score1" => "" ,	
                        "score2" => "" ,	
                        "score" => "" ,	
                        "grade" => "" ,	
                        "result" => "" ,	
                        "admin_id" => $aid ,
                        "admin_update" => $update ,
                        "course_s_detail_status" => 1 ,		
                    );

                    insert("tb_course_student_detail", $data);

                }
    //test code

            }

    }

    echo "no_error";

} elseif (($action == "Add_Course_class")) {

    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $course = filter_input(INPUT_POST, 'course');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $type_course = filter_input(INPUT_POST, 'type_course');

    // echo "$classroom_t_key - $course - $grade_key - $term_key - $type_course";
    // exit();

    $sqlCourse = "SELECT * FROM tb_course WHERE course_id = '{$course}'";
    $rowCourse = row_array($sqlCourse);

    $course_id = $rowCourse['course_id'];
    $name = $rowCourse['course_name'];
    $ename = $rowCourse['course_name_eng'];
    //$term = $rowCourse['term_id'];
    //$grade = $rowCourse['grade_id'];
    $cy = $rowCourse['course_year'];
    $memo = $rowCourse['memo'];

    function fnc_count($term_key, $grade_key, $cy, $name, $classroom_t_key)
    {
        $s = "SELECT * FROM tb_course_class WHERE term_id = '$term_key' AND grade_id = '$grade_key' AND course_class_year = '$cy' AND course_class_name = '$name' AND classroom_t_id = '$classroom_t_key'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }


    $check = fnc_count($term_key, $grade_key, $cy, $name, $classroom_t_key);

    if ($check) {

        $sqlT = "SELECT *,MAX(course_class_id) AS ID  FROM tb_course_class";
        $tcrT = row_array($sqlT);

        $C_ID = $tcrT['ID'] + 1;

        $data1 = array(
            "course_class_id" => $C_ID,
            "course_id" => $course_id,
            "classroom_t_id" => $classroom_t_key,
            "course_class_name" => $name,
            "course_class_name_eng" => $ename,
            "term_id" => $term_key,
            "grade_id" => $grade_key,
            "course_class_year" => $cy,
            "memo" => $memo,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "course_class_type" => $type_course,
            "course_class_sub_type" => 1,
            "course_class_status" => 1

        );

        insert("tb_course_class", $data1);

        $sqlCD = "SELECT * FROM tb_course_detail WHERE course_id = '{$course_id}' AND course_detail_status='1'";
        //echo $sql;
        $listCD = result_array($sqlCD);

        foreach ($listCD as $key => $rowCD) {

            $course_d_id = $rowCD['course_detail_id'];
            $subject_id = $rowCD['subject_id'];
            $sort = $rowCD['sort'];

            $sqlD = "SELECT *,MAX(course_class_detail_id) AS DID FROM tb_course_class_detail";
            $tcrD = row_array($sqlD);

            $C_DID = $tcrD['DID'] + 1;

            /*$sqlS = "SELECT * FROM tb_subject WHERE subject_id='$subject_id'";
            $rowS = row_array($sqlS);*/

            $data2 = array(
                "course_class_detail_id" => $C_DID,
                "course_class_id" => $C_ID,
                "subject_id" => $subject_id,
                "subject_code" => $rowCD['subject_code'],
                "subject_name" => $rowCD['subject_name'],
                "subject_name_eng" => $rowCD['subject_name_eng'],
                "unit" => $rowCD['unit'],
                "weight" => $rowCD['weight'],
                "subt_id" => $rowCD['subt_id'],
                "grade_id" => $rowCD['grade_id'],
                "sort" => $sort,
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "course_class_detail_status" => 1
            );

            insert("tb_course_class_detail", $data2);

            $sqlCL = "SELECT * FROM tb_course_level WHERE course_detail_id = '{$course_d_id}' AND course_level_status='1' ";
            $listCL = result_array($sqlCL);

            foreach ($listCL as $key => $rowCL) {

                $sqlD = "SELECT *,MAX(course_class_level_id) AS LID FROM tb_course_class_level";
                $tcrD = row_array($sqlD);

                $C_LID = $tcrD['LID'] + 1;

                $data3 = array(
                    "course_class_level_id" => $C_LID,
                    "course_class_detail_id" => $C_DID,
                    "course_class_level_name" => $row['course_level_name'],
                    "teacher_id1" => $rowCL['teacher_id1'],
                    "rate1" => $rowCL['rate1'],
                    "teacher_id2" => $rowCL['teacher_id2'],
                    "rate2" => $rowCL['rate2'],
                    "teacher_id3" => $rowCL['teacher_id3'],
                    "rate3" => $rowCL['rate3'],
                    "sort" => $rowCL['sort'],
                    "admin_id" => $aid,
                    "admin_update" => $update_date,
                    "course_class_level_status" => 1
                );

                insert("tb_course_class_level", $data3);
            }
        }

        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "delete_class")) {
    // Delete tb_classroom_teacher
    $class_id = filter_input(INPUT_POST, 'class_id');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$class_id}'");

    $sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id='{$class_id}'";
    $list = result_array($sql);

    $table2 = "tb_course_class_detail";

    foreach ($list as $key => $row) {

        $csid = $row['course_class_detail_id'];

        delete($table2, "course_class_detail_id = '{$csid}'");

        $sql = "SELECT * FROM tb_course_class_level WHERE course_class_detail_id='{$csid}'";
        $list = result_array($sql);

        $table3 = "tb_course_class_level";

        foreach ($list as $key => $row) {

            $cclid = $row['course_class_level_id'];

            delete($table3, "course_class_level_id = '{$cclid}' AND course_class_detail_id = '{$csid}'");

            // Delete tb_course_student
            $sqlStu = "SELECT * FROM tb_course_student WHERE course_class_id='{$class_id}'";
            $listStu = result_array($sqlStu);

            $tableStu = "tb_course_student";

            foreach ($listStu as $key => $rowStu) {
                $course_s_id = $rowStu['course_s_id'];
                delete($tableStu, "course_s_id = '{$course_s_id}'");

                // Delete tb_course_student_detail
                $sqlStuD = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$course_s_id}'  AND course_class_detail_id = '{$csid}' AND course_class_level_id = '{$cclid}'";
                $listStuD = result_array($sqlStuD);

                $tableStuD = "tb_course_student_detail";

                foreach ($listStuD as $key => $rowStuD) {
                    $course_s_detail_id = $rowStuD['course_s_detail_id'];
                    delete($tableStuD, "course_s_detail_id = '{$course_s_detail_id}'");
                }
            }
        }
    }

    // Delete Course_Student
    //$sql = "SELECT * FROM tb_course_student WHERE course_class_id = '{$id}'";
    // $list = result_array($sql);

    // foreach ($list as $key => $row) {

    //     $csid = $row['course_s_id'];
    //     $sql = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$csid}'";
    //     $list = result_array($sql);

    //     $table2 = "tb_course_student_detail";

    //     foreach ($list as $key => $row) {

    //         $cdid = $row['course_s_detail_id'];

    //         delete($table2,"course_s_detail_id = '{$cdid}' AND course_s_id = '{$csid}'");

    //     }

    //     $table1 = "tb_course_student";

    //     delete($table1,"course_class_id = '{$id}'");

    // }

    echo "no_error";
} elseif (($action == "add_student_course")) {

    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $student = filter_input(INPUT_POST, 'student');
    $note = filter_input(INPUT_POST, 'note');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $class_id = filter_input(INPUT_POST, 'class_id');

    function fnc_count($term_key, $grade_key, $student)
    {
        $s = "SELECT * FROM tb_course_student WHERE term_id='$term_key' AND grade_id='$grade_key' AND student_id='$student' AND course_s_status='1'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    $sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$class_id}' AND course_class_status='1' ";
    $row = row_array($sql);

    $course_class_id = $row['course_class_id'];
    $term = $row['term_id'];
    $grade = $row['grade_id'];
    $cy = $row['course_class_year'];
    $memo = $row['memo'];


    //$stuid = $row['student_id'];

    $check = fnc_count($term_key, $grade_key, $student);

    if ($check) {

        $sqlT = "SELECT *,MAX(course_s_id) AS ID FROM tb_course_student";
        $tcrT = row_array($sqlT);

        $C_ID = $tcrT['ID'] + 1;

        $data1 = array(
            "course_s_id" => $C_ID,
            "course_class_id" => $course_class_id,
            "term_id" => $term,
            "grade_id" => $grade,
            "student_id" => $stuid,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "course_s_status" => 1,

        );

        insert("tb_course_student", $data1);

        $sqlCCL = "SELECT * FROM tb_course_class_level a INNER JOIN tb_course_class_detail b ON a.course_class_detail_id = b.course_class_detail_id WHERE b.course_class_id = '{$course_class_id}' AND a.course_class_level_status='1' ";
        $listCCL = result_array($sqlCCL);

        foreach ($listCCL as $key => $rowCCL) {

            $course_class_detail_id = $rowCCL['course_class_detail_id'];

            $data2 = array(
                "course_s_id" => $C_ID,
                "course_class_detail_id" => $rowCCL['course_class_detail_id'],
                "course_class_level_id" => $rowCCL['course_class_level_id'],
                "course_class_level_check" => 0,
                "score1" => "",
                "score2" => "",
                "score" => "",
                "grade" => "",
                "result" => "",
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "course_s_detail_status" => 1,
            );

            insert("tb_course_student_detail", $data2);
        }

        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "insert_student_course")) {

    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $student = filter_input(INPUT_POST, 'student');
    $note = filter_input(INPUT_POST, 'note');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $class_id = filter_input(INPUT_POST, 'class_id');

    function fnc_count($class_id, $term_key, $grade_key, $stuid)
    {
        $s = "SELECT * FROM tb_course_student WHERE course_class_id = '$class_id' AND term_id='$term_key' AND grade_id='$grade_key' AND student_id='$stuid' AND course_s_status='1'";
        $q = row_array($s);

        return is_array($q) ? "0" : "1";
    }

    $sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$class_id}' AND course_class_status='1' ";
    $row = row_array($sql);

    $course_class_id = $row['course_class_id'];
    $term = $row['term_id'];
    $grade = $row['grade_id'];
    $cy = $row['course_class_year'];
    $memo = $row['memo'];

    $sql = "SELECT * FROM tb_classroom_teacher a INNER JOIN tb_classroom_detail b ON a.classroom_t_id = b.classroom_t_id INNER JOIN tb_student c ON b.student_id = c.student_id WHERE a.term_id = '{$term}' AND a.grade_id='{$grade}' AND a.classroom_t_id = '{$classroom}'";
    $list = result_array($sql);
    foreach ($list as $key => $row) {

        $stuid = $row['student_id'];

        $check = fnc_count($class_id, $term, $grade, $stuid);

        if ($check) {

            $sqlT = "SELECT *,MAX(course_s_id) AS ID FROM tb_course_student";
            $tcrT = row_array($sqlT);

            $C_ID = $tcrT['ID'] + 1;

            $data1 = array(
                "course_s_id" => $C_ID,
                "course_class_id" => $course_class_id,
                "term_id" => $term,
                "grade_id" => $grade,
                "student_id" => $stuid,
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "course_s_status" => '1',

            );

            insert("tb_course_student", $data1);

            $sql = "SELECT * FROM tb_course_class_level a INNER JOIN tb_course_class_detail b ON a.course_class_detail_id = b.course_class_detail_id WHERE b.course_class_id = '{$course_class_id}' AND a.course_class_level_status='1' ";
            $list = result_array($sql);

            foreach ($list as $key => $row) {

                $data2 = array(
                    "course_s_id" => $C_ID,
                    "course_class_detail_id" => $row['course_class_detail_id'],
                    "course_class_level_id" => $row['course_class_level_id'],
                    "course_class_level_check" => '0',
                    "score1" => "",
                    "score2" => "",
                    "score" => "",
                    "grade" => "",
                    "result" => "",
                    "admin_id" => $aid,
                    "admin_update" => $update_date,
                    "course_s_detail_status" => '1',
                );

                insert("tb_course_student_detail", $data2);
            }

            echo "no_error";
        } else {
            echo "it_error";
        }
    }
} elseif (($action == "update_course_class")) {

    $term = filter_input(INPUT_POST, 'term');
    $name = filter_input(INPUT_POST, 'name');
    $ename = filter_input(INPUT_POST, 'ename');
    $grade = filter_input(INPUT_POST, 'grade');
    $cy = filter_input(INPUT_POST, 'cy');
    $note = filter_input(INPUT_POST, 'note');
    $course_class_key = filter_input(INPUT_POST, 'course_class_key');
    $course = filter_input(INPUT_POST, 'course');   
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');  
    $type_course = filter_input(INPUT_POST, 'type_course');    

    $data = array(
        "course_id" => $course,
        "classroom_t_id" => $classroom_t_key,
        "course_class_name" => $name,
        "course_class_name_eng" => $ename,
        "term_id" => $term,
        "grade_id" => $grade,
        "course_class_year" => $cy,
        "memo" => $note,
        "admin_id" => $aid,
        "admin_update" => $update_date,
        "course_class_type" => $type_course

    );

    update("tb_course_class", $data, "course_class_id = '{$course_class_key}'");

    echo "no_error";
} elseif (($action == "delete_class_student")) {

    $csid = filter_input(INPUT_POST, 'csid');
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    
    // Delete Course_student_detail
	$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id WHERE a.course_s_id = '{$csid}' AND a.course_s_status='1'";
	$list = result_array($sql);

	foreach ($list as $row) {

		$csdid = $row['course_s_detail_id'];
		
		$table2 = "tb_course_student_detail";

		delete($table2,"course_s_detail_id = '{$csdid}'");

	}

	$table1 = "tb_course_student";

	delete($table1,"course_s_id = '{$csid}'");

    echo "no_error";
} else {
}
?>


