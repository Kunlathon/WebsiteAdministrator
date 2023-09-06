<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

// Delete Course_class
delete($table,"{$ff} = '{$id}'");

$sql = "SELECT * FROM tb_course_class_detail WHERE course_class_id='{$id}'";
$list = result_array($sql);

$table2 = "tb_course_class_detail";

foreach ($list as $key => $row) {

	$csid = $row['course_class_detail_id'];
	
	delete($table2,"course_class_detail_id = '{$csid}'");

	$sql = "SELECT * FROM tb_course_class_level WHERE course_class_detail_id='{$csid}'";
	$list = result_array($sql);

	$table3 = "tb_course_class_level";

	foreach ($list as $key => $row) {

		$cclid = $row['course_class_level_id'];

		delete($table3,"course_class_level_id = '{$cclid}' AND course_class_detail_id = '{$csid}'");

			// Delete tb_course_student
			$sqlStu = "SELECT * FROM tb_course_student WHERE course_class_id='{$id}'";
			$listStu = result_array($sqlStu);

			$tableStu = "tb_course_student";

				foreach ($listStu as $key => $rowStu) {
				$course_s_id = $rowStu['course_s_id'];
				delete($tableStu,"course_s_id = '{$course_s_id}'");

				// Delete tb_course_student_detail
				$sqlStuD = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$course_s_id}'  AND course_class_detail_id = '{$csid}' AND course_class_level_id = '{$cclid}'";
				$listStuD = result_array($sqlStuD);

				$tableStuD = "tb_course_student_detail";

					foreach ($listStuD as $key => $rowStuD) {
					$course_s_detail_id = $rowStuD['course_s_detail_id'];
					delete($tableStuD,"course_s_detail_id = '{$course_s_detail_id}'");

					}

				}

	}

}

// Delete Course_Student
/*$sql = "SELECT * FROM tb_course_student WHERE course_class_id = '{$id}'";
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

	delete($table1,"course_class_id = '{$id}'");

}*/

echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";

?>