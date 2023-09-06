<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

$sql = "SELECT * FROM tb_classroom_teacher ORDER BY classroom_t_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$classroomT = $row['classroom_t_id'];
	$term = $row['term_id'];
	$grade = $row['grade_id'];

	$_sqlScor = "SELECT * FROM tb_classroom_detail WHERE classroom_t_id='$classroomT'";
	$_rowScor = result_array($_sqlScor); 

		foreach ($_rowScor as $_row) {

			$classroomD = $_row['classroom_detail_id'];

		$data = array(
				"term_id" => $term ,
				"grade_id" => $grade
		);

		update("tb_classroom_detail", $data, "classroom_detail_id = '{$classroomD}' AND classroom_t_id='$classroomT'");
	}
}
?>
