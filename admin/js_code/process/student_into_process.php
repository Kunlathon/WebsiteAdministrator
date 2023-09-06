<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

			$data = array(
				"student_class" => $id ,
				"grade_id" => $check_grade ,	
				"admin_id" => $aid ,
				"admin_update" => $update	,
				"student_status" => 1
			);

			update("tb_student", $data,"student_id = {$stuid}");

		
		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=level_up_list&id=$check_grade';</script>";

?>