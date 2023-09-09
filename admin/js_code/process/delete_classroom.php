<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

extract($_GET);

// Delete tb_classroom_teacher
delete($table,"{$ff} = '{$id}'");

// Delete tb_classroom_detail
$sql = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id='{$id}'";
$list = result_array($sql);

$table2 = "tb_classroom_detail";

foreach ($list as $key => $row) {
	$classroom_detail_id = $row['classroom_detail_id'];
	delete($table2,"classroom_detail_id = '{$classroom_detail_id}'");

}

// Delete tb_course_class
$sqlCC = "SELECT * FROM tb_course_class WHERE classroom_t_id='{$id}'  AND term_id = '{$check_term}' AND grade_id = '{$check_grade}'";
$listCC = result_array($sqlCC);

$tableCC = "tb_course_class";

foreach ($listCC as $key => $rowCC) {
	$course_class_id = $rowCC['course_class_id'];
	delete($tableCC,"course_class_id = '{$course_class_id}'");

	// Delete tb_course_class_detail
	$sqlCCD = "SELECT * FROM tb_course_class_detail WHERE course_class_id='{$course_class_id}'";
	$listCCD = result_array($sqlCCD);

	$tableCCD = "tb_course_class_detail";

	foreach ($listCCD as $key => $rowCCD) {
		$course_class_detail_id = $rowCCD['course_class_detail_id'];
		delete($tableCCD,"course_class_detail_id = '{$course_class_detail_id}'");

		// Delete tb_course_class_level
		$sqlCCL = "SELECT * FROM tb_course_class_level WHERE course_class_detail_id='{$course_class_detail_id}'";
		$listCCL = result_array($sqlCCL);

		$tableCCL = "tb_course_class_level";

			foreach ($listCCL as $key => $rowCCL) {
			$course_class_level_id = $rowCCL['course_class_level_id'];
			delete($tableCCL,"course_class_level_id = '{$course_class_level_id}'");

			// Delete tb_course_student
			$sqlStu = "SELECT * FROM tb_course_student WHERE course_class_id='{$course_class_id}'  AND term_id = '{$check_term}' AND grade_id = '{$check_grade}'";
			$listStu = result_array($sqlStu);

			$tableStu = "tb_course_student";

				foreach ($listStu as $key => $rowStu) {
				$course_s_id = $rowStu['course_s_id'];
				delete($tableStu,"course_s_id = '{$course_s_id}'");

				// Delete tb_course_student_detail
				$sqlStuD = "SELECT * FROM tb_course_student_detail WHERE course_s_id='{$course_s_id}'  AND course_class_detail_id = '{$course_class_detail_id}' AND course_class_level_id = '{$course_class_level_id}'";
				$listStuD = result_array($sqlStuD);

				$tableStuD = "tb_course_student_detail";

					foreach ($listStuD as $key => $rowStuD) {
					$course_s_detail_id = $rowStuD['course_s_detail_id'];
					delete($tableStuD,"course_s_detail_id = '{$course_s_detail_id}'");

					}

				}
			}
	}

}

//echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');window.location.href = document.referrer;</script>";
echo "<meta charset='utf-8'/><script>alert('ลบสำเร็จ!!');location.href='../?modules=classroom_data&id=$check_grade';</script>";

?>