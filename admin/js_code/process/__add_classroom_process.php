<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

$sql = "SELECT * FROM tb_course_class ORDER BY course_class_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$course_class_id = $row['course_class_id'];
	$classroom_id = $row['classroom_id'];

	$_sqlScor = "SELECT * FROM tb_score WHERE course_class_id='$course_class_id' AND classroom_id='0'";
	$_rowScor = result_array($_sqlScor); 

		foreach ($_rowScor as $_row) {

			$score_id = $_row['score_id'];
			$cc_id = $_row['course_class_id'];


		$data = array(
				"classroom_id" => $classroom_id
		);

		update("tb_score", $data, "score_id = '{$score_id}' AND course_class_id='$cc_id'");
	}
}
?>
