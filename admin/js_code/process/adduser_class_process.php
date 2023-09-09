<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

function fnc_count($term,$grade,$stuid)   
{
    $s = "SELECT * FROM tb_course_student WHERE term_id='$term' AND grade_id='$grade' AND student_id='$stuid' AND course_s_status='1'";
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$sql = "SELECT * FROM tb_course_class WHERE course_class_id = '{$cid}' AND course_class_status='1' ";
$row = row_array($sql);

$course_class_id = $row['course_class_id'];
$term = $row['term_id'];
$grade = $row['grade_id'];
$cy = $row['course_class_year'];
$memo = $row['memo'];

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

//$stuid = $row['student_id'];

$check = fnc_count($term,$grade,$stuid);
	
	if ($check) {

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

			$course_class_detail_id = $row['course_class_detail_id'];

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

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$classroom&check_term=$term&check_grade=$grade';</script>";

	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }

?>