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

header("Content-Type: text/html;charset=UTF-8");

//error_reporting(E_ALL ^ E_NOTICE);
//ini_set('display_errors', 'On');



include("../../config/connect.ini.php");
include("../../config/fnc.php");
check_login('admin_username_aba', 'login.php');

?>

<?php
$aid = check_session("admin_id_aba");
$update_date = date('Y-m-d H:i:s');
$update = date("Y-m-d H:i:s");
$action = filter_input(INPUT_POST, 'action');

if (($action == "create")) {

    $name = filter_input(INPUT_POST, 'class_name');
    $grade = filter_input(INPUT_POST, 'grade_key');

    function fnc_count($name)
    {
        $s = "SELECT * FROM tb_classroom WHERE classroom_name = '{$name}'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($name);

    if ($check) {

        $sqlT = "SELECT *,MAX(classroom_id) AS ID FROM tb_classroom";
        $tcrT = row_array($sqlT);

        $C_ID = $tcrT['ID'] + 1;

        $data1 = array(
            "classroom_id" => $C_ID,
            "classroom_name" => $name,
            "classroom_name_eng" => $name,
            "grade_id" => $grade,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "classroom_status" => 1

        );

        insert("tb_classroom", $data1);

        $sql = "SELECT * FROM tb_term WHERE term_status = '1' AND grade_id = '{$grade}' ORDER BY year DESC , term DESC";
        $row = row_array($sql);
        $check_term = $row['term_id'];

        $data2 = array(
            "classroom_id" => $C_ID,
            "classroom_name" => $name,
            "classroom_name_eng" => $name,
            "term_id" => $check_term,
            "grade_id" => $grade,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "classroom_status" => 1

        );

        insert("tb_classroom_teacher", $data2);

        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "create_class_student")) {

    $student = filter_input(INPUT_POST, 'student1');
    $studentno = filter_input(INPUT_POST, 'studentno1');
    $memo = filter_input(INPUT_POST, 'memo1');
    $cid = filter_input(INPUT_POST, 'cid1');
    $classid = filter_input(INPUT_POST, 'classid1');
    $class = filter_input(INPUT_POST, 'class1');
    $term = filter_input(INPUT_POST, 'term_key1');
    $grade = filter_input(INPUT_POST, 'grade_key1');

    function fnc_count($student, $term, $grade)
    {
        $s = "SELECT * 
                      FROM `tb_classroom_detail` 
                      WHERE `student_id` = '{$student}' 
                      AND term_id = '{$term}' 
                      AND grade_id= '{$grade}'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($student, $term, $grade);

    if ($check) {

        $sqlStu = "SELECT * FROM tb_student WHERE student_id = '{$student}'";
        $rowStu = row_array($sqlStu);

        $studentno = $rowStu['student_no'];

        $data = array(
            "classroom_t_id" => $classid,
            "student_no" => $studentno,            
            "student_id" => $student,
            "memo" => $memo,
            "term_id" => $term,
            "grade_id" => $grade,
            "admin_id" => $aid,
            "admin_update" => $update_date,
            "classroom_detail_status" => 1,

        );

        insert("tb_classroom_detail", $data);

        $data2 = array(
            "student_class" => $cid,
            "memo" => $memo,
            "admin_id" => $aid,
            "admin_update" => $update_date

        );

        update("tb_student", $data2, "student_id = '{$student}'");

        echo "no_error";
    } else {
        echo "it_error";
    }
} elseif (($action == "create_classroom_student")) {

    
    $classid = filter_input(INPUT_POST, 'classroom2');
    $cid=filter_input(INPUT_POST,'cid1');
    $ccid=filter_input(INPUT_POST,'ccid1');
    $term_key = filter_input(INPUT_POST, 'term_key1');
    $grade_key = filter_input(INPUT_POST, 'grade_key1');

    function fnc_count($term_key, $grade_key, $stuid ,$classid)
    {
        $s = "SELECT * 
                      FROM `tb_classroom_detail` 
                      WHERE `classroom_t_id` = '{$classid}'                       
                      AND student_id = '{$stuid}' 
                      AND term_id = '{$term_key}' 
                      AND grade_id= '{$grade_key}'";
        $q = row_array($s);
        return is_array($q) ? "0" : "1";
    }

    $sqlCT = "SELECT * FROM tb_student WHERE student_class = '{$cid}' AND grade_id='{$grade_key}'";
    //echo "$sqlCT<br>";
    $listCT = result_array($sqlCT);
    $no_error = 0;    
    $it_error = 0;
    $test_count=0;
    foreach ($listCT as $key => $rowCT) {
        $test_count=$test_count+1;

        
        $stuid = $rowCT['student_id'];
        $stuno = $rowCT['student_no'];

        $check = fnc_count($term_key, $grade_key, $stuid, $classid);

        if($check){

            $sqlT = "SELECT *,MAX(classroom_detail_id) AS ID FROM tb_classroom_detail";
            $tcrT = row_array($sqlT);

            $CD_ID = $tcrT['ID'] + 1;

            $data1 = array(
                "classroom_detail_id" => $CD_ID,
                "classroom_t_id" => $classid,
                "student_no" => $stuno,          
                "student_id" => $stuid,
                "term_id" => $term_key,
                "grade_id" => $grade_key,
                "admin_id" => $aid,
                "admin_update" => $update_date,
                "classroom_detail_status" => 1,

            );

            insert("tb_classroom_detail", $data1);           

            $no_error=$no_error+1;
        } else {
            $it_error=$it_error+1;
        }
    }
        echo "&nbsp;นักเรียนนำเข้าสำเร็จ&nbsp;&#9989;&nbsp;".$no_error."&nbsp;คน&nbsp;<br>&nbsp;"."&nbsp;นักเรียนซ้ำ&nbsp;&#9940;&nbsp;".$it_error."&nbsp;คน";

        //echo "no_error";
} elseif (($action == "update")) {

    $name = filter_input(INPUT_POST, 'class_name');
    $grade = filter_input(INPUT_POST, 'grade_key');
    $classroom_key = filter_input(INPUT_POST, 'classroom_key');

    $data = array(
        "classroom_name" => $name,
        "classroom_name_eng" => $name,
        "grade_id" => $grade,
        "admin_id" => $aid,
        "admin_update" => $update_date
    );

    update("tb_classroom", $data, "classroom_id = '{$classroom_key}'");
    echo "no_error";
} elseif (($action == "delete")) {

    $classroom_key = filter_input(INPUT_POST, 'classroom_key');
    $table = filter_input(INPUT_POST, 'table');
    $ff = filter_input(INPUT_POST, 'ff');

    delete($table, "{$ff} = '{$classroom_key}'");
    echo "no_error";

} elseif (($action == "student_no")) {    

    $student_key = filter_input(INPUT_POST, 'student_key');
    $classroom_key = filter_input(INPUT_POST, 'classroom_key');
    $classroom_t_key = filter_input(INPUT_POST, 'classroom_t_key');
    $grade_key = filter_input(INPUT_POST, 'grade_key');
    $term_key = filter_input(INPUT_POST, 'term_key');
    $stu_no = filter_input(INPUT_POST, 'stu_no');
    $status = filter_input(INPUT_POST, 'status');
    $dateout = filter_input(INPUT_POST, 'dateout');

    if($status==2){

        //$dateout = date('Y-m-d');
    
        $data = array(
                "student_no" => $stu_no ,
                "date_out" => $dateout ,	
                "admin_id" => $aid ,
                "admin_update" => $update_date,
                "student_status" => $status 
                
        );
    
    } else {
    
        $data = array(
                "student_no" => $stu_no ,
                "admin_id" => $aid ,
                "admin_update" => $update_date,
                "student_status" => $status 
                
        );
    
    }
    
        update("tb_student", $data, "student_id = '{$student_key}'");
    
        $data2 = array(
                "student_no" => $stu_no ,
                "admin_id" => $aid ,
                "admin_update" => $update_date
                
        );
    
        update("tb_classroom_detail", $data2, "student_id = '{$student_key}'");
    
        /*$data3 = array(
                "student_no" => $stu_no
    
        );
    
        update("tb_assessment_classroom_detail", $data3, "student_id = '{$student_key}'");*/
    
        // if($status==2){
    
        //     $table = "tb_classroom_detail";
    
        //     delete($table,"classroom_t_id = '{$classroom_t_key}' AND student_id = '{$student_key}' AND term_id = '{$term_key}' AND grade_id = '{$grade_key}'");
    
        // }
        
    echo "no_error";
} else {
}
?>