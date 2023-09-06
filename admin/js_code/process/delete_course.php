<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

// Delete Course
delete($table,"{$ff} = '{$id}'");

$sql = "SELECT * FROM tb_course_detail WHERE course_id='{$id}'";
$list = result_array($sql);

$table2 = "tb_course_detail";

foreach ($list as $key => $row) {
	$course_detail_id = $row['course_detail_id'];
	delete($table2,"course_detail_id = '{$course_detail_id}'");

	$sql = "SELECT * FROM tb_course_level WHERE course_detail_id='{$course_detail_id}'";
	$list = result_array($sql);

	$table3 = "tb_course_level";

	foreach ($list as $key => $row) {

		$course_level_id = $row['course_level_id'];
		delete($table3,"course_level_id = '{$course_level_id}'");

	}

}

echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";

?>