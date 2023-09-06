<?php
include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

extract($_GET);

// Delete Score
$sql = "SELECT * FROM tb_score WHERE score_id = '{$id}' AND classroom_t_id = '{$clid}' AND subject_id = '{$sid}' AND teacher_id = '{$tid}'";
$list = result_array($sql);

foreach ($list as $key => $row) {
	$score_id = $row['score_id'];
	$sql = "SELECT * FROM tb_score_detail WHERE score_id='{$score_id}'";
	$list = result_array($sql);

	$table2 = "tb_score_detail";

	foreach ($list as $key => $row) {

		$score_detail_id = $row['score_detail_id'];
		delete($table2,"score_detail_id = '{$score_detail_id}'");

	}

	// Delete Score_Detail

	$table1 = "tb_score";

	delete($table1,"score_id = '{$score_id}'");

}

echo "<meta charset='utf-8'/><script>alert('Deleted successfully!!');window.location.href = document.referrer;</script>";

?>