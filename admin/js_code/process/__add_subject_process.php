<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';

check_login('admin_username_aba','login.php');

$sql = "SELECT * FROM tb_score WHERE subject_id = '' OR subject_id ='0' ORDER BY score_id ASC";
$list = result_array($sql); 

foreach ($list as $row) {
	$score_id = $row['score_id'];

	$_sqlScor = "SELECT * FROM tb_score_detail WHERE score_id='$score_id'";
	$_rowScor = result_array($_sqlScor);  

		foreach ($_rowScor as $_row) {

			$ccd_id = $_row['course_class_detail_id'];

			echo "$ccd_id<br>";

			$_sqlScor1 = "SELECT * FROM tb_course_class_detail WHERE course_class_detail_id='$ccd_id'";
			$_rowScor1 = row_array($_sqlScor1);  

			$subject_id = $_rowScor1['subject_id'];

			//echo $subject_id;

		$data = array(
				"subject_id" => $subject_id
		);

		update("tb_score", $data, "score_id = '{$score_id}'");
	}
}
?>
