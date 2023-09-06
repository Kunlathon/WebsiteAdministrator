<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sql = "SELECT * , b.student_no AS STNO FROM tb_classroom_detail a INNER JOIN tb_student b ON a.student_id = b.student_id WHERE a.term_id = '{$term}' AND a.grade_id='{$grade}' AND a.classroom_t_id='{$classroom}' AND a.classroom_detail_status='1' AND (b.student_no != '0' OR b.student_no != '') ORDER BY b.student_no ASC";

//echo $sql;
$list = result_array($sql);

foreach ($list as $key => $row) { 

$student_id = $row['student_id'];
$memo = "";
		
		$sqlST = "SELECT * FROM tb_student WHERE student_id = '$student_id'";
		$rowST = row_array($sqlST);

		$data = array(
			"a_classroom_id" => $id ,
			"student_no" => $rowST['student_no'] ,
			"student_id" => $rowST['student_id'] ,
			"a_student_type" => 1 ,
			"memo" => $memo ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update,
			"a_classroom_detail_status" => 1 ,		

		);

		insert("tb_assessment_classroom_detail", $data);

}

echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=assessment_classroom_show&id=$id&check_term=$term&check_grade=$grade';</script>";
?>
