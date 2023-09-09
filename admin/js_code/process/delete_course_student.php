<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_GET);

$id=isset($_GET['id']) ? $_GET['id'] : '';
$cid=isset($_GET['cid']) ? $_GET['cid'] : '';

	// Delete Course_student_detail
	$sql = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id WHERE a.course_s_id = '{$cid}' AND a.student_id = '{$id}' AND a.course_s_status='1'";
	$list = result_array($sql);

	foreach ($list as $row) {

		$csid = $row['course_s_detail_id'];
		
		$table2 = "tb_course_student_detail";

		delete($table2,"course_s_detail_id = '{$csid}'");

	}

	$table1 = "tb_course_student";

	delete($table1,"course_s_id = '{$cid}' AND student_id = '{$id}'");

echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";

?>