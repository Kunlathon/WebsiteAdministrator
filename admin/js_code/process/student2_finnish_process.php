<?php

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_POST);

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');


			$data = array(
				"admin_id" => $aid ,
				"admin_update" => $update,
				"student_status" => 3 
			);

			update("tb_student", $data,"student_id = {$stuid}");

		echo "<meta charset='utf-8'/><script>alert('บันทึกข้อมูลสำเร็จ!!');location.href='../?modules=level_up_show&id=$cid&check_grade=$check_grade';</script>";

?>