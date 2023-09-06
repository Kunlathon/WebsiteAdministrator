<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sql = "SELECT student_id,student_idcard FROM tb_student WHERE student_password='' ORDER BY student_id ASC";
//echo "$sql<br>";
$list = result_array($sql); 

foreach ($list as $row) {

	$studentid = $row['student_id'];
	$password = "123456";

		$data = array(
			"student_password" => $password ,
			"admin_id" => $aid ,
			"admin_update" => $update
			
		);

		update("tb_student", $data, "student_id = '{$studentid}'");

}
echo "<meta charset='utf-8'/><script>alert('เพิ่มข้อมูลสำเร็จ!!');location.href='../index.php';</script>";
?>
