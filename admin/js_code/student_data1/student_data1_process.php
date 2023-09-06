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
$update = date('Y-m-d H:i:s');
$action = filter_input(INPUT_POST, 'action');
if (($action == "create")) {

    $name = filter_input(INPUT_POST, 'name'); //*
    //--------------------------------------------------------
    @$username = filter_input(INPUT_POST, 'username'); //*
    @$id = $username;
    //--------------------------------------------------------
    @$password = filter_input(INPUT_POST, 'password'); //*
    @$grade = filter_input(INPUT_POST, 'grade'); //*
    @$classroom = filter_input(INPUT_POST, 'classroom'); //*
    @$status = filter_input(INPUT_POST, 'status'); //*

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

    //$sql_ter = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
    //$row_ter = row_array($sql_ter);
    //if ((is_array($row_ter) && count($row_ter))) {
    //$check_term = $row_ter['term_id'];
    //} else {
    //$check_term = "0";
    //}

    //function
    function fnc_count($username)
    {
        $s = "SELECT * FROM `tb_student` WHERE `student_id` = '{$username}'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }
    function fnc_count_course($check_term, $grade, $username)
    {
        $s = "SELECT * FROM `tb_course_student` WHERE `term_id`='{$check_term}' AND `grade_id`='{$grade}' AND `student_id`='{$username}' AND `course_s_status`='1'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }
    //function end

    $check = fnc_count($username);

    if ($check) {

        //Add Classroom

        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];


        $sqlT = "SELECT * FROM tb_classroom_teacher WHERE classroom_id = '{$classroom}' AND term_id = '{$check_term}' AND grade_id = '{$grade}' ORDER BY classroom_t_id DESC";
        $listT = result_array($sqlT);

        $count_classroom = count($listT);

        //echo "999999999999999999999-$count_classroom $sqlT";

        //check ห้องว่าง

        if ($count_classroom >= 1) {

            $pass = MD5($password);

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

            insert("tb_student", $data1);


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

                //insert("tb_classroom_detail", $data2);
            }

            //Add Course

            $sqlC = "SELECT * FROM tb_course_class a INNER JOIN tb_term b ON a.term_id = b.term_id  WHERE b.term_id = '{$check_term}' AND a.grade_id='{$grade}' AND a.classroom_t_id = '{$classroomT}' ORDER BY a.course_class_name ASC, a.course_class_year ASC";
            $rowC = row_array($sqlC);

            $cid = $rowC['course_class_id'];

            $sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$cid}' AND course_class_status='1' ";
            $row = row_array($sql);

            $course_class_id = $row['course_class_id'];

            $check_course = fnc_count_course($check_term, $grade, $username);

            if ($check_course) {

                $sqlT = "SELECT *,MAX(course_s_id) AS ID FROM tb_course_student";
                $tcrT = row_array($sqlT);

                $C_ID = $tcrT['ID'] + 1;

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
            } else {
            }

            //Add Assessment

            /*$data3 = array(
                    "a_classroom_id" => $classroom ,
                    "student_no" => 0 ,	
                    "student_id" => $username ,
                    "a_classroom_detail_status" => 1

                );

                insert("tb_assessment_classroom_detail", $data3);*/
        } else {

            echo "error_classroom";
        } //end เช็คห้อง

        //echo "no_error";
    } else {
        echo "it_error";
    }

} elseif (($action == "update")) {

    $name = filter_input(INPUT_POST, 'name');//*
    $username = filter_input(INPUT_POST, 'username');//*
    $student_key= filter_input(INPUT_POST, 'student_key');//*
    $grade = filter_input(INPUT_POST, 'grade');//*
    $classroom = filter_input(INPUT_POST, 'classroom');//*
    $status = filter_input(INPUT_POST, 'status');//*

    if((filter_input(INPUT_POST, 'idcard')!=null)){
        $idcard=filter_input(INPUT_POST, 'idcard');
    }else{
        $idcard="-";
    }

    if((filter_input(INPUT_POST, 'surname')!=null)){
        $surname=filter_input(INPUT_POST, 'surname');
    }else{
        $surname="-";
    }

    if((filter_input(INPUT_POST, 'ename')!=null)){
        $ename=filter_input(INPUT_POST, 'ename');
    }else{
        $ename="-";
    }
   
    if((filter_input(INPUT_POST, 'esurname')!=null)){
        $esurname=filter_input(INPUT_POST, 'esurname');
    }else{
        $esurname="-";
    }

    if((filter_input(INPUT_POST, 'gender')!=null)){
        $gender=filter_input(INPUT_POST, 'gender');
    }else{
        $gender="0";
    }

    $birthday = filter_input(INPUT_POST, 'birthday');

    if ((filter_input(INPUT_POST, 'birthday') != null)) {
        $birthday = date("Y-m-d", strtotime($birthday));
    } else {
        $birthday = date("Y-m-d", strtotime("0000-00-00"));
    }

    if((filter_input(INPUT_POST, 'nickname')!=null)){
        $nickname=filter_input(INPUT_POST, 'nickname');
    }else{
        $nickname="-";
    }

    if (($status == 2)) {

        $dateout = date('Y-m-d');
        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "date_out" => $dateout, "admin_id" => $aid, "admin_update" => $update, "student_status" => $status
        );
    } else {

        $data = array(
            "student_idcard" => $idcard, "student_class" => $classroom, "student_name" => $name, "student_surname" => $surname, "student_name_eng" => $ename, "student_surname_eng" => $esurname, "nickname" => $nickname, "gender" => $gender, "birth_day" => $birthday, "grade_id" => $grade, "admin_id" => $aid, "admin_update" => $update, "student_status" => $status
        );
    }

    update("tb_student", $data, "student_id = '{$student_key}'");
    echo "no_error";
    
} elseif (($action == "delete")) {
    @$table = filter_input(INPUT_POST, 'table');
    @$ff = filter_input(INPUT_POST, 'ff');
    @$student_key = filter_input(INPUT_POST, 'student_key');

    delete($table, "{$ff} = '{$student_key}'");

    echo "no_error";
}elseif(($action=="password")){

    @$password=filter_input(INPUT_POST, 'student_password');
    @$id=filter_input(INPUT_POST, 'student_key');

    $data = array(
        "student_password" => $password ,
        "admin_id" => $aid ,
        "admin_update" => $update);

    update("tb_student", $data, "student_id = '{$id}'");
    echo "no_error";

}else{}
?>