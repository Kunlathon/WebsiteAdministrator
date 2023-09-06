<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

$aid = check_session("admin_id");
$update = date('Y-m-d H:i:s');

$sql = "SELECT * FROM tb_course_detail ORDER BY course_detail_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
		$course_detail_id = $row['course_detail_id'];

		$data = array(
				"course_detail_id" => $course_detail_id ,
				"course_level_name" => 'Normal' ,
				"sort" => 1,
				"admin_id" => $aid ,
				"admin_update" => $update,
				"course_level_status" => 1
		);

		insert("tb_course_level", $data);
}

$sql = "SELECT * FROM tb_course_class_detail ORDER BY course_class_detail_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
		$course_class_detail_id = $row['course_class_detail_id'];

		$data = array(
				"course_class_detail_id" => $course_class_detail_id ,
				"course_class_level_name" => 'Normal' ,
				"sort" => 1,
				"admin_id" => $aid ,
				"admin_update" => $update,
				"course_class_level_status" => 1
		);

		insert("tb_course_class_level", $data);
}
?>
