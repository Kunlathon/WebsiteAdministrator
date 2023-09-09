<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$memo = "";

$sql = "SELECT * FROM tb_student WHERE student_class = '{$cid}' AND student_status = '1' ORDER BY student_id ASC";
$list = result_array($sql);

foreach ($list as $key => $row) {

		$student = $row['student_id'];
		$stu_no = $key+1;

	$sqlClass = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id = '$ctid' AND student_id = '$student' AND term_id = '$term' AND grade_id = '$grade'";
	$resultClass = row_array($sqlClass);

	if($resultClass > 0){

	} else {
		

		$data = array(
			"classroom_t_id" => $ctid ,
			"student_no" => $stu_no ,
			"student_id" => $student ,
			"memo" => $memo ,
			"term_id" => $term ,
			"grade_id" => $grade ,
			"admin_id" => $aid ,
			"admin_update" => $update ,
			"classroom_detail_status" => 1 ,		

		);

		insert("tb_classroom_detail", $data);

		$data2 = array(
			"student_class" => $cid ,
			"memo" => $memo ,		
			"admin_id" => $aid ,
			"admin_update" => $update

		);

		update("tb_student", $data2, "student_id = '{$student}'");

	}

}

		echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../?modules=classroom_show&id=$ctid&check_term=$term&check_grade=$grade';</script>";

?>