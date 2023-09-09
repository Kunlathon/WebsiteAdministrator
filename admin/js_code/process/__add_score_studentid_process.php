<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_lcm','login.php');

$sql = "SELECT * FROM tb_course_student ORDER BY course_s_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$course_s_id = $row['course_s_id'];
	$student_id = $row['student_id'];

	$_sqlScor = "SELECT * FROM tb_score_detail WHERE course_s_id='$course_s_id' AND student_id='0'";
	$_rowScor = result_array($_sqlScor); 

		foreach ($_rowScor as $_row) {

			$sdetail_id = $_row['score_detail_id'];
			$cs_id = $_row['course_s_id'];


		$data = array(
				"student_id" => $student_id
		);

		update("tb_score_detail", $data, "score_detail_id = '{$sdetail_id}' AND course_s_id='$cs_id'");
	}
}
?>
