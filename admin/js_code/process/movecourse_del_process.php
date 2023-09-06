<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);
z
// Delete Course_Student
$sql = "SELECT * FROM tb_course_student WHERE course_class_id = '{$id}' AND student_id='{$stuid}'";
$list = result_array($sql);

foreach ($list as $key => $row) {

	$csid = $row['course_s_id'];

	$sql = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$csid}'";
	$list = result_array($sql);

	$table2 = "tb_course_student_detail";

	foreach ($list as $key => $row) {

		$cdid = $row['course_s_detail_id'];

		delete($table2,"course_s_detail_id = '{$cdid}' AND course_s_id = '{$csid}'");

	}

	$table1 = "tb_course_student";

	delete($table1,"course_class_id = '{$id}' AND student_id='{$stuid}'");

}

// Move Course_Student
function fnc_count($course_new,$term,$grade,$stuid)   
{
    $s = "SELECT * FROM tb_course_student WHERE course_class_id = '$course_new' AND term_id='$term' AND grade_id='$grade' AND student_id='$stuid' AND course_s_status='1'";
	echo 
    $q = row_array($s);

    return is_array($q) ? "0" : "1";
}

$aid = check_session("admin_id");


$check = fnc_count($course_new,$term,$grade,$stuid);
	
	if ($check) {

		$sqlT = "SELECT *,MAX(course_s_id) AS SID FROM tb_course_student";
		$tcrT = row_array($sqlT);

		$C_ID = $tcrT['SID'] + 1;

		$sql = "SELECT * FROM tb_course_class WHERE course_class_id='{$course_new}'";
		$tcr = row_array($sql);

		$data = array(
			"course_s_id" => $C_ID ,
			"course_class_id" => $tcr['course_class_id'] ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"student_id" => $stuid ,
			"admin_id" => $aid ,
			"course_s_status" => 1 ,		

		);

		insert("tb_course_student", $data);

		$sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id = '{$course_new}' AND course_class_detail_status='1'";
		$list = result_array($sql);

		foreach ($list as $key => $row) { 

			$data = array(
				"course_s_id" => $C_ID ,
				"course_class_detail_id" => $row['course_class_detail_id'] ,	
				"score1" => "" ,	
				"score2" => "" ,	
				"score" => "" ,	
				"grade" => "" ,	
				"result" => "" ,	
				"course_s_detail_status" => 1 ,		
			);

			insert("tb_course_student_detail", $data);

		}

		echo "<meta charset='utf-8'/><script>alert('ย้ายข้อมูลสำเร็จ!!');location.href='../?modules=course_data_class&id=$grade&cid=$classroom&check_term=$term';</script>";
	
	} else {
        echo "<meta charset='utf-8'/><script>alert('ข้อมูลซ้ำ!!');window.history.back();</script>";
    }
		

?>