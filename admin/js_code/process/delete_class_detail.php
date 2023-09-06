<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

$id=isset($_GET['id']) ? $_GET['id'] : '';
$sid=isset($_GET['sid']) ? $_GET['sid'] : '';

// Delete Course_class_detail
$sql = "SELECT * FROM tb_course_class a INNER JOIN tb_course_class_detail b ON a.course_class_id = b.course_class_id WHERE b.course_class_detail_id = '{$id}' AND b.subject_id = '{$sid}' AND a.course_class_status='1'";
echo $sql;
$list = result_array($sql);

foreach ($list as $row) {

	$clid = $row['course_class_id'];
	$cdid = $row['course_class_detail_id'];

	// Delete Course_student_detail
	$sql1 = "SELECT * FROM tb_course_student a INNER JOIN tb_course_student_detail b ON a.course_s_id = b.course_s_id WHERE a.course_class_id = '{$clid}' AND a.course_s_status='1'";
	echo $sql1;
	$list1 = result_array($sql1);

	foreach ($list1 as $row1) {

		$cdid2 = $row1['course_class_detail_id'];
		
		$table3 = "tb_course_student_detail";

		delete($table3,"course_class_detail_id = '{$cdid2}'");

	}

	$table1 = "tb_course_class_detail";

	delete($table1,"course_class_detail_id = '{$id}'");

}

echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";

?>